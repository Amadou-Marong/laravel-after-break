<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request){
        $filters = [
            'deleted' => $request->boolean('deleted')
        ];

        return inertia(
            'Realtor/Index', 
            ['listings' => Auth::user()
                ->listings()
                ->filter($filters)
                ->withCount('images')
                ->withCount('offers')
                ->paginate(6)
                ->withQueryString()
            ]
        );
    }

    public function show(Listing $listing)
    {
        return inertia(
            'Realtor/Show',
            ['listing' => $listing->load('offers', 'offers.bidder')]
        );

    }

    public function create()
    {
        return inertia('Realtor/Create');
    }

    public function edit(Listing $listing)
    {
        return inertia(
            'Realtor/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    public function store(Request $request)
    {
        Auth::user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:1000',
                'baths' => 'required|integer|min:0|max:1000',
                'area' => 'required|numeric|min:0|max:9000000000000000000000000000',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required',
                'price' => 'required|integer|min:1',
                // 'listing_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ])
        );
        return redirect()->route('realtor.listing.index')
            ->with('success', 'Listing created successfully.');
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:1000',
                'baths' => 'required|integer|min:0|max:1000',
                'area' => 'required|numeric|min:15|max:9000000000000000000000000000',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required',
                'price' => 'required|integer|min:1',
                // 'listing_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ])
        );
        // return redirect()->route('listing.index')
        return redirect()->route('realtor.listing.index')
            ->with('success', 'Listing updated successfully.');
    }
    
// ///////////////////
    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();
        return redirect()->route('realtor.listing.index')
            ->with('success', 'Listing deleted successfully.');
    }

}
