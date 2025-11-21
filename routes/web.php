<?php


use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;

Route::get('/', fn() => Inertia::render('Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
]))->name('home');


// Smart redirect after login – NO MORE RED SQUIGGLES!
Route::get('/dashboard', function () {
    /** @var \App\Models\User $user */
    $user = Auth::user();   // or auth()->user() – both work now

    return match (true) {
        $user->isSuperAdmin() => to_route('superadmin.dashboard'),
        $user->isAdmin()      => to_route('admin.dashboard'),
        default               => to_route('user.dashboard'),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

// Super Admin
Route::middleware(['auth', 'verified', 'SuperAdmin'])
    ->prefix('superadmin')->name('superadmin.')
    ->group(function () {
        Route::get('/dashboard', [SuperAdminController::class, 'SuperAdminDashboard'])
            ->name('dashboard');

        Route::get('/users', [SuperAdminController::class, 'users'])
            ->name('users');

        Route::get('/admins', [SuperAdminController::class, 'admins'])
            ->name('admins');

        Route::get('/roles', [SuperAdminController::class, 'roles'])
            ->name('roles');

        Route::get('/settings', [SuperAdminController::class, 'settings'])
            ->name('settings');

        Route::get('/logs', [SuperAdminController::class, 'logs'])
            ->name('logs');

        Route::get('/analytics', [SuperAdminController::class, 'analytics'])
            ->name('analytics');
    });

// Admin — Full section
Route::middleware(['auth', 'verified', 'Admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])
            ->name('dashboard');

        Route::get('/users', [AdminController::class, 'users'])
            ->name('users');

        Route::get('/content', [AdminController::class, 'content'])
            ->name('content');

        Route::get('/reports', [AdminController::class, 'reports'])
            ->name('reports');

        Route::get('/settings', [AdminController::class, 'settings'])
            ->name('settings');
    });

// User
Route::middleware(['auth', 'verified', 'User'])
    ->prefix('user')->name('user.')
    ->group(function () {
        Route::get('/dashboard', [UserController::class, 'UserDashboard'])
            ->name('dashboard');

        Route::get('/profile', [UserController::class, 'profile'])
            ->name('profile');

        Route::get('/orders', [UserController::class, 'orders'])
            ->name('orders');

        Route::get('/support', [UserController::class, 'support'])
            ->name('support');
    });

require __DIR__ . '/settings.php';
