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

class UserController extends Controller
{
        public function UserDashboard()
    {


        return Inertia::render('user/Dashboard', []);
    }

        public function profile()
    {
        return Inertia::render('user/Profile');
    }

    
        public function orders()
    {
        return Inertia::render('user/Orders');
    }

    
        public function support()
    {
        return Inertia::render('user/Support');
    }
}
