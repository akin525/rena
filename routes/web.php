<?php

use App\Http\Controllers\admin\AdminpdfController;
use App\Http\Controllers\admin\CandCController;
use App\Http\Controllers\admin\Easy;
use App\Http\Controllers\admin\LockController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\UserStatementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\verify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::post('log', [AuthController::class, 'customLogin'])->name('log');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

//    switch for airtime control
    Route::get('air', [ProductController::class, 'air'])->name('air');
    Route::get('up1/{id}', [ProductController::class, 'pair'])->name('up1');

//    data server control
    Route::get('server', [UsersController::class, 'server'])->name('server');
    Route::get('up/{id}', [UsersController::class, 'up'])->name('up');
//    bills route
    Route::get('bills', [TransactionController::class, 'bill'])->name('bills');
    Route::get('viewpdf/{id}', [AdminpdfController::class, 'viewpdf'])->name('viewpdf');
    Route::get('dopdf/{id}', [AdminpdfController::class, 'dopdf'])->name('dopdf');

//    statement report
    Route::get('statement1', [UserStatementController::class, 'loadindex1'])->name('statement1');
    Route::get('statement', [UserStatementController::class, 'loadindex'])->name('statement');
    Route::post('state1', [UserStatementController::class, 'customerstatementpurchase'])->name('state1');
    Route::post('state', [UserStatementController::class, 'customerstatementfunding'])->name('state');

//Approve transcation
    Route::get('done/{id}', [\App\Http\Controllers\Marktransaction::class, 'accepttransaction'])->name('admin/done');


//    user details
    Route::get('admin/profile/{username}', [UsersController::class, 'profile'])->name('admin/profile');

//    credit users
    Route::get('credit', [CandCController::class, 'cr'])->name('credit');
    Route::post('cr', [CandCController::class, 'credit'])->name('cr');

//    charge users
    Route::post('ch', [CandCController::class, 'charge'])->name('ch');
    Route::get('charge', [CandCController::class, 'sp'])->name('charge');

//    Product route
    Route::get('product', [productController::class, 'index'])->name('product');
    Route::get('product1', [productController::class, 'index1'])->name('product1');
    Route::get('product2', [productController::class, 'index2'])->name('product2');
    Route::post('do', [ProductController::class, 'edit'])->name('do');
    Route::post('do1', [ProductController::class, 'edit1'])->name('do1');
    Route::post('do2', [ProductController::class, 'edit2'])->name('do2');
    Route::get('editproduct1/{id}', [ProductController::class, 'in1'])->name('editproduct1');
    Route::get('editproduct2/{id}', [ProductController::class, 'in2'])->name('editproduct2');
    Route::get('editproduct/{id}', [ProductController::class, 'in'])->name('editproduct');
    Route::get('pd/{id}', [ProductController::class, 'on'])->name('pd');
    Route::get('pd1/{id}', [ProductController::class, 'on1'])->name('pd1');
    Route::get('pd2/{id}', [ProductController::class, 'on2'])->name('pd2');


//    All Deposit
    Route::get('deposits', [TransactionController::class, 'in'])->name('deposits');
    Route::get('finddeposite', [TransactionController::class, 'index'])->name('finddeposite');
    Route::post('depo', [TransactionController::class, 'finduser'])->name('depo');

//validate transaction
    Route::view('verifybill', 'check');
    Route::view('verifydeposit', 'check1');
    Route::post('check', [verify::class, 'verifypurchase'])->name('check');
    Route::post('check1', [verify::class, 'verifydeposit'])->name('check1');


//    webbook easyaccess
    Route::get('webbook', [Easy::class, 'webook'])->name('webbook');


//    All safelock
    Route::get('allock', [LockController::class, 'index'])->name('allock');
    Route::get('com', [LockController::class, 'wi'])->name('com');
    Route::get('interest', [LockController::class, 'lit'])->name('interest');

});

Route::get('/logout', function(){
    Auth::logout();
    Alert::success('Logout Successful');
    return redirect('login')->with('status', 'logout successful');
});
require __DIR__.'/auth.php';
