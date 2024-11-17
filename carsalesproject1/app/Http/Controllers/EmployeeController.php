<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Pusher\Pusher;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        return view('employee.dashboard', compact('users'));
    }

    public function sendNotification($message)
    {
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            ['cluster' => env('PUSHER_APP_CLUSTER')]
        );

        $pusher->trigger('employee-notifications', 'new-notification', ['message' => $message]);
    }

    // Additional methods for editing or deleting users if required
}
