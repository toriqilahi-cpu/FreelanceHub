<?php

namespace App\Http\Controllers;

class DashboardRedirectController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        if ($role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($role == 'client') {
            return redirect()->route('client.dashboard');
        }

        if ($role == 'freelancer') {
            return redirect()->route('freelancer.dashboard');
        }

        abort(403);
    }
}