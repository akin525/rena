<?php

use App\Http\Controllers\admin\AdminpdfController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\UserStatementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
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

});

Route::get('/logout', function(){
    Auth::logout();
    Alert::success('Logout Successful');
    return redirect('login')->with('status', 'logout successful');
});
require __DIR__.'/auth.php';
