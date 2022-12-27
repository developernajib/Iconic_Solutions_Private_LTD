<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return redirect()->route("dashboard");
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Admin routes
Route::prefix('admin')->group(function () {
    // Auth
    Route::get('login', [AdminController::class, 'AdminLogin'])->name('admin_login');
    Route::post('login', [AdminController::class, 'AdminLoginStore'])->name('admin_login_store');
    Route::get('logout', [AdminController::class, 'AdminLogout'])->name('admin_logout')->middleware('admin');
    Route::get('register', [AdminController::class, 'AdminRegister'])->name('admin_register');
    Route::post('register', [AdminController::class, 'AdminRegisterStore'])->name('admin_register_store');

    Route::middleware(['admin'])->prefix('dashboard')->group(function () {
        Route::get('/', [AdminController::class, 'AdminDashboard'])->name('admin_dashboard');
        Route::get('/user', [AdminController::class, 'UserData'])->name('admin_user_data');
        Route::get('/total-supply', [AdminController::class, 'TotalSupply'])->name('admin_total_supply');
        Route::get('/transaction', [AdminController::class, 'TransactionView'])->name('admin_transaction_view');
        Route::get('/deposit', [AdminController::class, 'WalletDeposit'])->name('admin_wallet_deposit');
        Route::post('/deposit/store', [AdminController::class, 'WalletDepositStore'])->name('admin_wallet_deposit_store');
    });
});

Route::middleware(['web'])->prefix('user')->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [UserController::class, 'UserDashboard'])->name('dashboard');
        Route::get('/logout', [UserController::class, 'UserLogout'])->name('user_logout');

        Route::get('/create-wallet', [UserController::class, 'UserCreateWallet'])->name('user_create_wallet');
        Route::post('/create-wallet/set', [UserController::class, 'UserWalletStore'])->name('user_wallet_store');

        Route::prefix('transaction')->group(function () {
            Route::get('/view', [TransactionController::class, 'UserTransactionView'])->name('user_transaction_view');
            Route::get('/create', [TransactionController::class, 'UserTransactionCreate'])->name('user_transaction_create');
            Route::post('/create/store', [TransactionController::class, 'UserTransactionCStore'])->name('user_transaction_create_store');
        });
    });
});
