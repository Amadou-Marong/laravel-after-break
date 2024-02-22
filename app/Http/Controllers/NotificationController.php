<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        return inertia('Notifications/Index', [
            'notifications' => $request->user()->notifications()->paginate(10),
        ]);
    }
}
