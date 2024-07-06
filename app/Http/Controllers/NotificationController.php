<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function show($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        return view('notifications.show', compact('notification'));
    }
}
