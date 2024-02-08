<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    public function index(Request $request){
        $filters = [
            'deleted' => $request->boolean('deleted')
        ];
        
        return inertia(
            'Realtor/Index', ['listings' => Auth::user()->listings]
        );
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();
        return redirect()->route('listing.index')
            ->with('success', 'Listing deleted successfully.');
    }

}
