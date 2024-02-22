<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Offer;
use App\Notifications\OfferMade;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request)
    {
    
        $this->authorize('view', $listing);

        // if($listing->isOwnedBy($request->user())){
        //     return redirect()->back()->with('error', 'You cannot make an offer on your own listing!');
        // }

        // if($listing->hasOfferFrom($request->user())){
        //     return redirect()->back()->with('error', 'You have already made an offer on this listing!');
        // }

        

       $offer = $listing->offers()->save(
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
