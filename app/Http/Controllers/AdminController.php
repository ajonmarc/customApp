<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return Inertia::render('admin/Dashboard');
    }

    public function users()
    {
        return Inertia::render('admin/Users');
    }

    public function content()
    {
        return Inertia::render('admin/Content');
    }

    public function reports()
    {
        return Inertia::render('admin/Reports');
    }

    public function settings()
    {
        return Inertia::render('admin/Settings');
    }
}