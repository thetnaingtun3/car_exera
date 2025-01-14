<?php

use App\Livewire\Admin\AdminRoleCreate;
use App\Livewire\Admin\AdminRoleList;
use App\Livewire\Admin\CreateAdmin;
use App\Livewire\Admin\ListAdmin;
use App\Livewire\Customer\CreateCustomer;
use App\Livewire\Customer\CustomerList;
use App\Livewire\Customer\EditCustomer;
use App\Livewire\Loading\LoadingAction;
use App\Livewire\Login;
use App\Livewire\Login\LoadingLogin;
use App\Livewire\Login\ProductionLogin;
use App\Livewire\Login\TransoperLogin;
use App\Livewire\Production\ProductionAction;
use App\Livewire\SignUp;
use App\Livewire\Dashboard;
use App\Livewire\Transoper\TransoperAction;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

//Route::get('register', SignUp::class)->name('register');

Route::get('/', function () {
    return Redirect::route('dashboard');
});

Route::get('login', Login::class)->name('login');
Route::get('admin/login', Login::class)->name('admin.login');
Route::get('transoper/login', TransoperLogin::class)->name('transoper.login');
Route::get('loading/login', LoadingLogin::class)->name('loading.login');
Route::get('production/login', ProductionLogin::class)->name('production.login');

Route::middleware('auth:admin')->group(callback: function () {

    Route::get('index/admin', ListAdmin::class)->name('index.admin');
    Route::get('loading', LoadingAction::class)->name('index.loading');
    Route::get('transoper', TransoperAction::class)->name('index.transoper');
    Route::get('production', ProductionAction::class)->name('index.production');


    Route::get('create/admin', CreateAdmin::class)->name('create.admin');
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get("admin/role/list", AdminRoleList::class)->name('admin-role-list');
    Route::get("admin/role/create", AdminRoleCreate::class)->name('admin-role-create');


    Route::get('customer/list', CustomerList::class)->name('index.customer');
    Route::get('create/customer', CreateCustomer::class)->name('create.customer');
    Route::get('customer/{customer}', EditCustomer::class)->name('edit.customer');
});
