<?php

use App\Livewire\Admin\AdminRoleCreate;
use App\Livewire\Admin\CreateAdmin;
use App\Livewire\Admin\ListAdmin;
use App\Livewire\Login;
use App\Livewire\SignUp;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

//Route::get('register', SignUp::class)->name('register');

Route::get('/', function () {
    return Redirect::route('dashboard');
});

Route::get('login', Login::class)->name('login');
Route::middleware('auth:admin')->group(callback: function () {

    Route::get('index/admin', ListAdmin::class)->name('index.admin');
    Route::get('create/admin', CreateAdmin::class)->name('create.admin');
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get("admin/role/create", AdminRoleCreate::class)->name('admin-role-create');

});
