<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Support\Facades\Storage;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing){
        $listing->load(['images']);
        return inertia(
            'Realtor/ListingImage/Create', 
            ['listing' => $listing]
        );
    }
    public function store(Listing $listing, Request $request){
        if($request->hasFile('images')){
            $request->validate([
                'images.*' => 'mimes:jpeg,png,jpg|max:5000'
            ], [
                'images.*.mimes' => 'Only jpeg, png and jpg images are allowed',
                'images.*.max' => 'Sorry! Maximum allowed size for an image is 5MB'
            ]);
            foreach($request->file('images') as $file){
                $path = $file->store('images', 'public');
                
                $listing->images()->save(new ListingImage([
                    'filename' => $path
                ]));
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }

    public function destroy(Listing $listing, ListingImage $image) {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success', 'Image was deleted!');
    }
}
