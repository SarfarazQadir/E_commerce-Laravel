<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/category',[CategoryController::class,'index'])->name('admin.category');
    Route::get('admin/manage_category',[CategoryController::class,'manage_category'])->name('admin.category');
    // Route::get('admin/updatepassword',[AdminController::class,'updatepassword']); make password hash route
   
    Route::get('admin/logout', function () {
                    session()->forget('ADMIN_LOGIN');
                    session()->forget('ADMIN_ID');
                    return redirect('admin');
    });
});

