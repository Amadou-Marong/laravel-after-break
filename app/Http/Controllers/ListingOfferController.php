<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Offer;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request)
    {
        
        $listing->offers()->save(
            Offer::make(
                $request->validate([
                    'amount' => 'required|integer|min:1|max:20000000'
                ])
            )->bidder()->associate($request->user())    
        );

        $listing->owner->notify(new OfferMade($offer));

        return redirect()->back()->with('success', 'Offer was placed!');
    }
}
