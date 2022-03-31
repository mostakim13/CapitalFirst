<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefferalController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TradeactivationController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth'], 'namespace' => 'Admin'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');

    //deposit
    Route::get('deposit', [DepositController::class, 'index'])->name('deposit-dashboard');
    Route::post('deposit/store', [DepositController::class, 'depositStore'])->name('deposit-store');

    //withdrawals
    Route::get('withdrawals', [WithdrawalController::class, 'index'])->name('withdrawal-dashboard');
    Route::post('withdrawals/store', [WithdrawalController::class, 'withdrawalStore'])->name('withdrawal-store');

    //accounts
    Route::get('accounts', [AccountsController::class, 'index'])->name('account-dashboard');
    Route::get('earning/accounts', [AccountsController::class, 'earningAccounts'])->name('earning-accounts');

    //network
    Route::get('network', [NetworkController::class, 'index'])->name('network-dashboard');

    //awards
    Route::get('rank/awards', [AwardController ::class, 'index'])->name('award-dashboard');
    Route::get('executive/awards', [AwardController ::class, 'executiveAwards'])->name('executive-dashboard');

    //documents
    Route::get('kyc/documents', [DocumentController::class, 'index'])->name('document-dashboard');

    //profle
    Route::get('my/profile', [ProfileController::class, 'index'])->name('profile-dashboard');
    Route::get('my-profile/change-password', [ProfileController::class, 'security'])->name('security');
    Route::get('my-profile/nok', [ProfileController::class, 'nextOfKin'])->name('nextOfKin');

    //refferals
    Route::get('refferal', [RefferalController::class, 'index'])->name('refferals');

    //trade activation
    Route::get('trade/activation', [TradeactivationController::class, 'index'])->name('trade-activation');

    //support
    Route::get('support/new-ticket',[SupportController::class,'index'])->name('new-ticket');

    //download
    Route::get('downloads',[DownloadController::class,'index'])->name('download');

    //education
    Route::get('education',[EducationController::class,'index'])->name('education');

    //suggestions
    Route::get('suggestion',[SuggestionController::class,'index'])->name('suggestions');

});

//=======================Frontend=======================
Route::get('about-us', [FrontendController::class, 'about']);
Route::get('legal-docs', [FrontendController::class, 'docs']);
Route::post('/contact/store', [ContactUsController::class, 'storeContact'])->name('contact-store');
