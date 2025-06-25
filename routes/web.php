<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ServiceablesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dashboard');

        Route::get('admin/logout', 'AdminLogout')->name('admin.logout');
    });

    Route::controller(ServiceablesController::class)->group(function(){
        Route::get('/admin/serviceables/Add','AddServiceables')->name('serv.add');
        Route::post('/admin/serviceables/store','StoreServiceables')->name('serv.store');
        Route::get('/admin/serviceables/edit/{id}','ServiceableManage')->name('serv.edit');
        Route::post('/admin/serviceables/update','ServiceableUpdate')->name('serv.update');

        Route::get('/admin/serviceables/RPCPPE', 'RPCPPEService')->name('serv.rpcppe');
        Route::get('/admin/serviceables/ICS', 'ICSService')->name('serv.ics');
    });

    Route::controller(SettingsController::class)->group(function() {
        Route::get('/admin/settings/establishments', 'Establishment')->name('estab');
        Route::post('/admin/settings/establishments/add','AddEstablishment')->name('estab.add');
        Route::get('/admin/settings/establishments/edit/{id}','EditEstablishment');
        Route::post('/admin/settings/establishments/update','UpdateEstablishment')->name('estab.update');
        Route::get('/admin/settings/establishments/delete/{id}','DeleteEstablishment')->name('estab.delete');
        
        Route::get('/admin/settings/PPE-Accounts', 'PPEAccount')->name('ppe_acct');
        Route::post('/admin/settings/PPE-Accounts/Add', 'AddPPEAccount')->name('ppe.add');
        Route::get('/admin/settings/PPE-Accounts/edit/{id}', 'EditPPEAccount');
        Route::post('/admin/settings/PPE-Accounts/update', 'UpdatePPEAccount')->name('ppe.update');
        Route::get('/admin/settings/PPE-Accounts/delete/{id}','DeletePPEAccount')->name('ppe.delete');


        Route::get('/admin/settings/Unit Types', 'UnitTypes')->name('unit_type');
        Route::post('/admin/settings/Unit Types/Add', 'AddUnitType')->name('unit.add');
        Route::get('/admin/settings/Unit Types/edit/{id}', 'EditUnitType');
        Route::post('/admin/settings/Unit Types/update', 'UpdateUnitType')->name('unit.update');
        Route::get('/admin/settings/Unit Types/delete/{id}', 'DeleteUnitType')->name('unit.delete');
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