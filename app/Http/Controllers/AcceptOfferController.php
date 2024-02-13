<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class AcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        // Accept selected offer
        $offer->update(['accepted_at' => now()]);

        // Reject the rest of the offers
        $offer->listing->offers()->except($offer)->update(['rejected_at' => now()]);

        return redirect()->back()
            ->with(
                'success', 
                "Offer #{$offer->id} accepted, the rest of the offers rejected"
            );

    }
}
