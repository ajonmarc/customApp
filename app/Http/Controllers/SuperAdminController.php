<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SuperAdminController extends Controller
{
    public function SuperAdminDashboard()
    {


        return Inertia::render('superAdmin/Dashboard', []);
    }


    public function users()
    {
        return Inertia::render('superAdmin/Users');
    }

    public function admins()
    {
        return Inertia::render('superAdmin/Admins');
    }

    public function roles()
    {
        return Inertia::render('superAdmin/Roles_perm');
    }

       public function settings()
    {
        return Inertia::render('superAdmin/Settings');
    }

       public function logs()
    {
        return Inertia::render('superAdmin/Logs');
    }


    
       public function analytics()
    {
        return Inertia::render('superAdmin/Analytics');
    }

    
}
