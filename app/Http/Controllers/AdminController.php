<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function dashboard()
    {
        return view('dashboard.pages.admin.dashboard');
    }
    public function toggleStatus(Request $request, User $user)
    {

            $user->is_active = !$user->is_active;
            $user->save();

            return redirect()->back()->with('success', 'Status updated successfully.');

    }
}
