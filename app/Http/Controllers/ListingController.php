<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    // since this is a resource controller we can use the authorizeResource method to authorize the resource
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
  /*  public function index(Request $request)
    {
        // we instead define the filters as a variable and pass it to the inertia view
        $filters = $request->only([
            'minPrice', 'maxPrice', 'beds', 'baths', 'minArea', 'maxArea'
        ]);
        //
        $query = Listing::orderByDesc('created_at');

        if ($filters['minPrice'] ?? false) {
            $query->where('price', '>=', $filters['minPrice']);
        }
        
        if ($filters['maxPrice'] ?? false) {
            $query->where('price', '<=', $filters['maxPrice']);
        }
        
        if ($filters['beds'] ?? false) {
            $query->where('beds', $filters['beds']);
        }
        
        if ($filters['baths'] ?? false) {
            $query->where('baths', $filters['baths']);
        }
        
        if ($filters['minArea'] ?? false) {
            $query->where('area','>=', $filters['minArea']);
        }
        
        if ($filters['maxArea'] ?? false) {
            $query->where('area','<=', $filters['maxArea']);
        }
        
        ///////
        // if ($filters['name'] ?? false) {
        //     $query->where('name', 'like', '%' . $filters['name'] . '%');
        // }


        ////////

        return inertia(
            'Listing/Index',
            [
                // 'filters' => request()->only([
                //     'minPrice', 'maxPrice', 'beds', 'baths', 'minArea', 'maxArea'
                // ]),
                'filters' => $filters,
                // 'listings' => Listing::all()
                // 'listings' => Listing::orderBy('created_at')
                //     ->paginate(9)
                'listings' => $query->paginate(9)
                    ->withQueryString()
            ]
        );
    }*/

  /*  public function index(Request $request)
    {
           $filters = $request->only([
                'minPrice', 'maxPrice', 'beds', 'baths', 'minArea', 'maxArea'
           ]);
           $query = Listing::orderByDesc('created_at')
                ->when(
                    $filters['minPrice'] ?? false,
                    fn($query, $value) => $query->where('price', '>=', $value)
                )
                ->when(
                    $filters['maxPrice'] ?? false,
                    fn($query, $value) => $query->where('price', '<=', $value)
                )
                ->when(
                    $filters['beds'] ?? false,
                    fn($query, $value) => $query->where('beds', $value)
                )
                ->when(
                    $filters['baths'] ?? false,
                    fn($query, $value) => $query->where('baths', $value)
                )
                ->when(
                    $filters['minArea'] ?? false,
                    fn($query, $value) => $query->where('area', '>=', $value)
                )
                ->when(
                    $filters['maxArea'] ?? false,
                    fn($query, $value) => $query->where('area', '<=', $value)
                );
        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => $query->paginate(9)
                    ->withQueryString()
            ]
        );

    }*/

    public function index(Request $request)
    {
        $filters = $request->only([
            'minPrice', 'maxPrice', 'beds', 'baths', 'minArea', 'maxArea'
        ]);
        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                    ->filter($filters)
                    ->withoutSold()
                    ->paginate(9)
                    ->withQueryString()
            ]
        );
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia(
            'Listing/Create',
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required',
            'code' => 'required',
            'street' => 'required',
            'street_nr' => 'required|min:1|max:1000',
            'price' => 'required|integer|min:1',
            'listing_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Handle file upload
        if ($request->hasFile('listing_image')) {
            $imagePath = $request->file('listing_image')->store('public');
            $imageName = basename($imagePath);
        } else {
            $imageName = null;
        }
    
        // Create the listing
        $listing = new Listing([
            'beds' => $request->beds,
            'baths' => $request->baths,
            'area' => $request->area,
            'city' => $request->city,
            'code' => $request->code,
            'street' => $request->street,
            'street_nr' => $request->street_nr,
            'price' => $request->price,
            'listing_image' => $imageName
        ]);
        $request->user()->listings()->save($listing);
    
        return redirect()->route('listing.index')->with('success', 'Listing created successfully.');
    }

    /**
     * Display the specified resourc
     * e.
     */
    // public function show(string $id)
    public function show(Listing $listing)
    {
        // since i'm implementing a policy for whether a user can view a listing
        // Auth::user()->can('view', $listing);

        // we check to see if the user cannot view a listing then we do something
       /*if (Auth::user()->cannot('view', $listing)) {
            abort(403);
        }*/

        // another way is to use the authorize method from the controller it would do thesame as the above 
        // it would check if the current user is authorized to perform this view operation on this lisiting if not it woud return 403 error 

        // $this->authorize('view', $listing);

        $listing->load(['images']);
        $offer = !Auth::user() ? null : $listing->offers()->byMe()->first();
        return inertia(
            'Listing/Show',
            [
                // 'listing' => Listing::find()
                'listing' => $listing,
                'offerMade' => $offer
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1',
                'listing_image' => 'required|url'
            ])
        );
        $request->user()->listings()->save($listing);
        
        return redirect()->route('listing.index')
            ->with('success', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // public function destroy(Listing $listing)
    // {
    //     $listing->delete();
    //     return redirect()->route('listing.index')
    //         ->with('success', 'Listing deleted successfully.');
    // }
}
