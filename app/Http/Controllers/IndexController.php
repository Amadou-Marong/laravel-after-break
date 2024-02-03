<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Listing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        // dd(auth()->user());
        // return Inertia::render('Index/Index');
        // Listing::create($request->all());
        return inertia(
            'Index/Index',
            [
               'message'=> 'Hello from Laravel'
            ]
        );
    }
    public function show()
    {
        return inertia(
            'Index/Show'
        );
    }
}
