<?php

namespace App\Http\Controllers;
use App\Models\Listing;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
        // Listing::create($request->all());
        Listing::create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1'
            ])
        );
        return redirect()->route('listing.index')
            ->with('success', 'Listing created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    public function show(Listing $listing)
    {

        return inertia(
            'Listing/Show',
            [
                // 'listing' => Listing::find()
                'listing' => $listing
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
                'price' => 'required|integer|min:1'
            ])
        );
        return redirect()->route('listing.index')
            ->with('success', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->route('listing.index')
            ->with('success', 'Listing deleted successfully.');
    }
}
