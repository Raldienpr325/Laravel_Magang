<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CrudController;

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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [CrudController::class, 'dataLayanan']);
Route::get('/checkout/{id}', [CrudController::class, 'checkout']);//->middleware('isUser');
Route::post('/checkout2/{id}', [CrudController::class, 'checkout2']);//->middleware('isUser');
Route::get('/user-deal', [CrudController::class, 'checkoutdeal']);//->middleware('isUser');
Route::get('/keranjang', [CrudController::class, 'keranjang']);//->middleware('isUser');
Route::get('/delete-keranjang/{id}', [CrudController::class, 'delKeranjang']);
Route::get('/dealcheckout', [CrudController::class, 'dealcheckout']);
    

// Route Group Admin 
Route::group(['middleware' => ['isAdmin']], function() {
    Route::get('/admin-1', [CrudController::class, 'crud']);
    Route::get('/admin-2', [CrudController::class, 'crud2']);
    Route::get('/admin-3', [CrudController::class, 'listUser']);
    Route::get('/admin-diagram', [CrudController::class, 'diagram']);
    Route::get('/admin-diagram2', [CrudController::class, 'diagram2']);
    Route::get('/create-vote', [CrudController::class, 'create']);
    Route::post('/simpan-vote', [CrudController::class, 'store']);
    Route::get('/edit-layanan/{id}', [CrudController::class, 'edit']);
    Route::post('/update-layanan/{id}', [CrudController::class, 'update']);
    Route::get('/delete-layanan/{id}', [CrudController::class, 'destroy']);
});
    