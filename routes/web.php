<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dashboard');

        Route::get('admin/logout', 'AdminLogout')->name('admin.logout');
    });

    Route::controller(SettingsController::class)->group(function() {
        Route::get('/admin/settings/establishments', 'Establishment')->name('estab');
        Route::get('/admin/settings/PPE-Accounts', 'PPEAccount')->name('ppe_acct');
        Route::get('/admin/settings/Unit Types', 'UnitTypes')->name('unit_type');
        Route::get('/admin/settings/Classification', 'Classification')->name('class');
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';