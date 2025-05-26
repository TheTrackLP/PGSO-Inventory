<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ServiceableController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\PrintController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dashboard');
    });

    Route::controller(ServiceableController::class)->group(function(){
        Route::get('/admin/add/serviceables', 'AddServiceables')->name('add.service');
    });

    Route::controller(SettingsController::class)->group(function(){
        Route::get('/admin/settings/offices', 'AllOffices')->name('all.offices');
        Route::post('/admin/settings/offices/add', 'AddOffices')->name('add.offices');
        Route::get('/admin/settings/offices/edit/{id}', 'EditOffices');
        Route::post('/admin/settings/offices/update', 'UpdateOffices')->name('update.offices');
        Route::post('/admin/settings/offices/sequence/offices', 'SequenceOffice')->name('seq.office');
        Route::post('/admin/settings/offices/sequence/hospitals', 'SequenceHospital')->name('seq.hospital');

        Route::get('/admin/settings/PPE', 'AllPPEAccount')->name('all.ppe');
        Route::post('/admin/settings/PPE/Add', 'StorePPEAccount')->name('store.ppe');

        Route::get('/admin/settings/accounts_management', 'AllAccounts')->name('all.acct');

        Route::get('/admin/settings/unit_types', 'AllUnitTypes')->name('all.units');
        Route::post('/admin/settings/unit_types/add', 'AddUnitTypes')->name('store.units');

        Route::get('/admin/settings/classification/reports', 'AllClassReports')->name('all.class');
        Route::post('/admin/settings/classification/reports/add', 'AddClassReports')->name('add.class');
    });

    Route::controller(ServiceableController::class)->group(function(){
        Route::get('/admin/rpcppe/serviceables', 'RPCPPEServiceables')->name('all.rpcppe');
        Route::get('/admin/ics/serviceables', 'ICSServiceables')->name('all.ics');
        
        Route::post('/admin/serviceables/add', 'StoreServiceables')->name('serv.store');
        
        Route::get('/admin/serviceables/edit/{id}', 'EditServiceable')->name('serv.edit');
        Route::post('/admin/serviceables/update', 'UpdateServiceable')->name('serv.update');
    });

    Route::controller(PrintController::class)->group(function(){
        Route::get('/admin/print/ics', 'PrintICSServ')->name('print.ics');
        Route::get('/admin/print/top/ics', 'PrintICSTop')->name('print.topics');
        Route::get('/admin/print/rpcppe', 'PrintRPCPPEServ')->name('print.rpcppe');
        Route::get('/admin/print/top/rpcppe', 'PrintTopRPCPPE')->name('print.toprpcppe');

        Route::get('/admin/print/ics/consolidated/summary', 'PrintICSConsolidated')->name('print.icsconso');
        Route::get('/admin/print/ics/consolidated/code', 'PrintEachCode')->name('print.each');
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