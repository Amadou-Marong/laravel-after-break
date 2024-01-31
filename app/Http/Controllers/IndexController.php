<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Listing;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
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
