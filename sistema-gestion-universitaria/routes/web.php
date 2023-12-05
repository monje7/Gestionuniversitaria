<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalarySlipController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\TrialBalanceController;
use App\Http\Controllers\GeneralLedgerController;
use App\Http\Controllers\CashBookController;
use App\Http\Controllers\BankStatementController;
use App\Http\Controllers\PettyCashController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SupplierPaymentController;
use App\Http\Controllers\CustomerReceiptController;
use App\Http\Controllers\CustomerDueController;
use App\Http\Controllers\StockReportController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockAdjustmentController;
use App\Http\Controllers\StockTransferController;

use Illuminate\Support\Facades\Route;
use Laravel\Breeze\Http\Controllers\AuthenticatedSessionController;
use Laravel\Breeze\Http\Controllers\RegisteredUserController;
use Laravel\Breeze\Http\Controllers\PasswordResetLinkController;
use Laravel\Breeze\Http\Controllers\PasswordUpdateController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('/reset-password/{token}', [PasswordUpdateController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [PasswordUpdateController::class, 'store'])->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    // Your other routes here
    Route::view('/dashboard', 'admin.index')->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UsersController::class);

    Route::get('/logout', function () {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    })->name('logout');

    Route::prefix('users')->group(function () {
        Route::get('/list', [AdminController::class, 'userList'])->name('users.list');
        Route::get('/add', [AdminController::class, 'addUsers'])->name('users.add');
        Route::post('/save', [AdminController::class, 'saveUsers'])->name('users.save');
        Route::get('/delete/{id}', [AdminController::class, 'deleteUsers'])->name('users.delete');
        Route::get('/edit/{id}', [AdminController::class, 'editUsers'])->name('users.edit');
        Route::put('/update/{id}', [AdminController::class, 'updateUsers'])->name('users.update');

    });

    // Add other resourceful controllers here

});

Route::prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.show');
    Route::put('/profile/edit/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/change_pass/{id}', [ProfileController::class, 'changePass'])->name('profile.change_pass');
    Route::delete('/profile/destroy/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/list', [AdminController::class, 'index'])->name('user.index');
    Route::get('/role/list', [RoleController::class, 'index'])->name('role.index');

    // ...

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';

