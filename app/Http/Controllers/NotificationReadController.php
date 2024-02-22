<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationReadController extends Controller
{
   public function __invoke(DatabaseNotification $notification)
   {
      $this->authorize('update', $notification);
      $notification->markAsRead();
      return redirect()->back();
   }
}
