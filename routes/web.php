<?php

use App\Livewire\Login;
use App\Livewire\SignUp;
use App\Livewire\Dashboard;
use App\Livewire\QrCodePage;
use App\Livewire\LSP\LSPEdit;
use App\Livewire\LSP\LSPList;
use App\Livewire\LSP\LSPCreate;
use App\Livewire\Admin\ListAdmin;
use App\Livewire\Truck\EditTruck;
use App\Livewire\Truck\ListTruck;
use App\Livewire\Admin\CreateAdmin;
use App\Livewire\Truck\CreateTruck;
use App\Livewire\Truck\ImportTruck;
use App\Livewire\Login\LoadingLogin;
use App\Livewire\Admin\AdminRoleList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Login\TransoperLogin;
use App\Livewire\Admin\AdminRoleCreate;
use App\Livewire\Customer\CustomerList;
use App\Livewire\Customer\EditCustomer;
use App\Livewire\Loading\LoadingAction;
use App\Livewire\Login\ProductionLogin;
use Illuminate\Support\Facades\Redirect;
use App\Livewire\Customer\CreateCustomer;
use App\Livewire\Customer\ImportCustomer;
use App\Livewire\Transoper\TransoperAction;
use App\Http\Controllers\QrCodeGenController;
use App\Livewire\CarRegister\CarRegisterHistory;
use App\Livewire\Production\ProductionAction;
use App\Livewire\CarRegister\SubmitCarRegister;

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
    Route::get('import/customer', ImportCustomer::class)->name('import.customer');



    Route::get('import/truck', ImportTruck::class)->name('import.truck');
    Route::get('truck/list', ListTruck::class)->name('index.truck');
    Route::get('create/truck', CreateTruck::class)->name('create.truck');
    Route::get('truck/{truck}', EditTruck::class)->name('edit.truck');

    Route::get('lsp/list', LSPList::class)->name('index.lsp');
    Route::get('create/lsp', LSPCreate::class)->name('create.lsp');
    Route::get('lsp/{lsp}', LSPEdit::class)->name('edit.lsp');




    Route::get('reg/car', SubmitCarRegister::class)->name('reg.car');
    Route::get('/order/history', CarRegisterHistory::class)->name('order.history');
    Route::get('/qrcode/{id}', [QrCodeGenController::class, "qrcodegen"])->name('qrcode.show');
});
