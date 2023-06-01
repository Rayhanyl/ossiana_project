<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthenticationController,
    CustomerController,
    AdminController,
    ManagerController,
    HomeController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'landing_page'])->name('landing.page');
Route::get('/Login', [AuthenticationController::class, 'login_page'])->name('login.page');
Route::get('/Register', [AuthenticationController::class, 'register_page'])->name('register.page');
Route::get('/Logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::post('/Authentication', [AuthenticationController::class, 'authentication'])->name('authentication');
Route::post('/AuthRegister', [AuthenticationController::class, 'authregister'])->name('auth.register');

Route::middleware(['auth'])->group(function () { 
    Route::get('/DashboardAdmin', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/OrderListAdmin', [AdminController::class, 'admin_order_page'])->name('admin.order.page');
    Route::get('/OrderDetailAdmin/{id}', [AdminController::class, 'admin_detail_page'])->name('admin.detail.page');
    Route::post('/ConfirmationOrder', [AdminController::class, 'confirmation_order'])->name('confirmation.order');
    Route::post('/PriceDp', [AdminController::class, 'price_downpayment'])->name('price.dp');
    Route::post('/PriceFp', [AdminController::class, 'price_fullpayment'])->name('price.fp');
    Route::post('/StatusDP', [AdminController::class, 'status_dp'])->name('status.dp');
    Route::post('/StatusFP', [AdminController::class, 'status_fp'])->name('status.fp');
    Route::get('/InvoiceDownPayment/{id}', [AdminController::class, 'invoice_dp'])->name('invoice.dp');
    Route::get('/InvoiceFullPayment/{id}', [AdminController::class, 'invoice_fp'])->name('invoice.fp');
    Route::get('/DashboardCustomer', [CustomerController::class, 'customer_dashboard'])->name('customer.dashboard');
    Route::get('/OrderPage', [CustomerController::class, 'order_page'])->name('order.page');
    Route::get('/CatalogPage', [CustomerController::class, 'catalog_page'])->name('catalog.page');
    Route::get('/OrderForm', [CustomerController::class, 'order_form'])->name('orderform.page');
    Route::post('/OrderAction', [CustomerController::class, 'order_action'])->name('order.action');
    Route::post('/UploadDP', [CustomerController::class, 'upload_dp'])->name('upload.dp');
    Route::post('/UploadFP', [CustomerController::class, 'upload_fp'])->name('upload.fp');
    Route::get('/OrderDetailCustomer/{id}', [CustomerController::class, 'customer_detail_page'])->name('customer.detail.page');
    Route::get('/DashboardManager', [ManagerController::class, 'manager_dashboard'])->name('manager.dashboard');
    Route::get('/OrderInspectManager', [ManagerController::class, 'manager_inspect_page'])->name('manager.inspect.page');
    Route::get('/OrderDetailManager/{id}', [ManagerController::class, 'manager_detail_page'])->name('manager.detail.page');
    Route::post('/InspectAction', [ManagerController::class, 'manager_inspect_action'])->name('manager.inspect.action');
    Route::get('/SchedullerManager/{id}', [ManagerController::class, 'manager_scheduller_page'])->name('manager.scheduller.page');
    Route::post('/SchedullerAction', [ManagerController::class, 'manager_scheduller_action'])->name('manager.scheduller.action');
    Route::get('/ProductionReportPage', [ManagerController::class, 'manager_production_report_page'])->name('manager.production.report.page');
    Route::get('/ProductionReportPDF', [ManagerController::class, 'manager_production_report_pdf'])->name('manager.production.report.pdf');
    Route::post('/SuccessReparation', [ManagerController::class, 'success_reparation'])->name('success.reparation');
});
