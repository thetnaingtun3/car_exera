<?php

use App\Http\Controllers\LoadingDataController;
use App\Livewire\Admin\EditAdmin;
use App\Livewire\Line\ChangBottlingLineCarton;
use App\Livewire\Line\ChangBottlingLineCrate;
use App\Livewire\Line\ChangCanningLineOne;
use App\Livewire\Line\ChangCanningLineTwo;
use App\Livewire\Line\ChangKegLineOne;
use App\Livewire\Line\ChangKegLineTwo;
use App\Livewire\Line\TapperCanningLineOne;
use App\Livewire\Line\TapperCanningLineTwo;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\LSP\LSPEdit;
use App\Livewire\LSP\LSPList;
use App\Livewire\LSP\LSPCreate;
use App\Livewire\LSP\LSPImports;
use App\Livewire\Admin\ListAdmin;
use App\Livewire\Pallet\BottlinglineCarton;
use App\Livewire\Pallet\BottlinglineCrate;
use App\Livewire\Pallet\CanningLineOne;
use App\Livewire\Pallet\CanningLineTwo;
use App\Livewire\Pallet\KegLineOne;
use App\Livewire\Pallet\KegLineTwo;
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
use App\Livewire\Loading\ImportLoadingData;
use App\Livewire\Transoper\TransoperAction;
use App\Http\Controllers\QrCodeGenController;
use App\Livewire\Production\ProductionAction;
use App\Livewire\CarRegister\SubmitCarRegister;
use App\Livewire\CarRegister\CarRegisterDetials;
use App\Livewire\CarRegister\CarRegisterHistory;
use App\Livewire\PalletResiter\PalletRegisterSubmit;
use App\Livewire\PalletResiter\PalletRegisterHistory;
use App\Livewire\CarRegister\CarRegisterQrCodeHistory;
use App\Livewire\Loading\LoadingDataCreate;
use App\Livewire\Loading\LoadingDataList;
use App\Livewire\PalletResiter\PalletRegisterQrCodeHistory;


Route::get('/', function () {
    return Redirect::route('dashboard');
});

Route::get('login', Login::class)->name('login');
Route::get('admin/login', Login::class)->name('admin.login');
Route::get('registration/login', TransoperLogin::class)->name('registration.login');
Route::get('loading/login', LoadingLogin::class)->name('loading.login');
Route::get('production/login', ProductionLogin::class)->name('production.login');

Route::middleware('auth:admin')->group(callback: function () {

    Route::get('registration', TransoperAction::class)->name('index.transoper');
    Route::get('production', ProductionAction::class)->name('index.production');
    Route::get('loading', LoadingAction::class)->name('index.loading');

    Route::get('index/admin', ListAdmin::class)->name('index.admin');
    Route::get('create/admin', CreateAdmin::class)->name('create.admin');
    Route::get('admin/{admin}', EditAdmin::class)->name('edit.admin');

    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get("admin/role/list", AdminRoleList::class)->name('admin-role-list');
    Route::get("admin/role/create", AdminRoleCreate::class)->name('admin-role-create');

    Route::get('lsp/list', LSPList::class)->name('index.lsp');
    Route::get('create/lsp', LSPCreate::class)->name('create.lsp');
    Route::get('lsp/{lsp}', LSPEdit::class)->name('edit.lsp');
    Route::get('import/lsp', LSPImports::class)->name('import.lsp');

    Route::get('customer/list', CustomerList::class)->name('index.customer');
    Route::get('create/customer', CreateCustomer::class)->name('create.customer');
    Route::get('customer/{customer}', EditCustomer::class)->name('edit.customer');
    Route::get('import/customer', ImportCustomer::class)->name('import.customer');


    Route::get('import/truck', ImportTruck::class)->name('import.truck');
    Route::get('truck/list', ListTruck::class)->name('index.truck');
    Route::get('create/truck', CreateTruck::class)->name('create.truck');
    Route::get('truck/{truck}', EditTruck::class)->name('edit.truck');


    Route::get('reg/car', SubmitCarRegister::class)->name('reg.car');
    Route::get('reg/car/detials/{registration}', CarRegisterDetials::class)->name('reg.car.detials');
    Route::get('/order/history', CarRegisterHistory::class)->name('order.history');
    Route::get('/order/qrcode/history', CarRegisterQrCodeHistory::class)->name('order.qrcode.history');

    Route::get('/qrcode/{id}', [QrCodeGenController::class, "qrcodegen"])->name('qrcode.show');

    // pallet register
    Route::get('pallet/register', PalletRegisterSubmit::class)->name('pallet.register');


    // pallet register line splt start

    Route::get('pallet/bottlingline/', BottlinglineCarton::class)->name('pallet.bottlingline.carton');
    Route::get('pallet/kegline/one', KegLineOne::class)->name('pallet.kegline.one');
    Route::get('pallet/kegline/two', KegLineTwo::class)->name('pallet.kegline.two');
    Route::get('pallet/canningline/one', CanningLineOne::class)->name('pallet.canning-line-one');
    Route::get('pallet/canningline/two', CanningLineTwo::class)->name('pallet.canning-line-two');
    // pallet register line splt end


    // Route::get('/pallet-register/print-qr', [PalletRegisterHistory::class, 'printSelectedQRCodes'])->name('pallet.print.qr');
    Route::get('/pallet/history', PalletRegisterHistory::class)->name('pallet.history');
    Route::get('/pallet/qr/code/history', PalletRegisterQrCodeHistory::class)->name('pallet.qrcode.history');

    Route::get('/pallet/qrcode/{id}', [QrCodeGenController::class, "palletQrCode"])->name('palletqrcode.show');
    Route::get('/pallet/print-qr', [QrCodeGenController::class, 'printQRCodes'])->name('pallet.print.qr');
    Route::get('/car/print-qr', [QrCodeGenController::class, 'printCarQRCodes'])->name('car.print.qr');

    Route::get('car/qrcode/chnage/date', [QrCodeGenController::class, 'qrcodeDateChange'])->name('car.qrcode.date.change');
    Route::post('car/qrcode/chnage/date', [QrCodeGenController::class, 'qrcodeDateChangePost'])->name('car-qr-date-change');

    Route::get('pallet/qrcode/chnage/date', [QrCodeGenController::class, 'palletQrCodeDateChange'])->name('pallet.qrcode.date.change');
    Route::post('pallet/qrcode/chnage/date', [QrCodeGenController::class, 'palletQrCodeDateChangePost'])->name('pallet-qr-date-change');


    Route::get('/loading/data', LoadingDataList::class)->name('loading.data');
    Route::get('/loading/create', LoadingDataCreate::class)->name('loading.create');
// report route start
    Route::get('/chang/canningline/one', ChangCanningLineOne::class)->name('chang.canning.line.one');
    Route::get('/chang/canningline/two', ChangCanningLineTwo::class)->name('chang.canning.line.two');
    Route::get('/chang/bottling/carton', ChangBottlingLineCarton::class)->name('chang.bottling.line.carton');
    Route::get('/chang/keg/one', ChangKegLineOne::class)->name('chang.keg.line.one');
    Route::get('/chang/keg/two', ChangKegLineTwo::class)->name('chang.keg.line.two');
// report route end

//    Route::get('/chang/bottling/crate', ChangBottlingLineCrate::class)->name('chang.bottling.line.create');
//    Route::get('/tapper/line/one', TapperCanningLineOne::class)->name('tapper.canning.line.one');
//    Route::get('/tapper/line/two', TapperCanningLineTwo::class)->name('tapper.canning.line.two');
});
