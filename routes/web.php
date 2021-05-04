<?php

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

Route::get('/hello',function(){
    return 'Hello World!';
   });
  
   Route::get('list', 'App\Http\Controllers\AccountController@list');
   Route::get('show/{id}', 'App\Http\Controllers\AccountController@show');
   Route::get('display', [App\Http\Controllers\AccountController::class, 'display'])->name('display_account');
   Route::group(['middleware' => ['auth']], function() {
     Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard'); 
   });


   Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

    Route::get('/adopt', [App\Http\Controllers\AdoptController::class, 'adoptanimal'])->name('adoptanimal');    
    Route::post('/adopt', [App\Http\Controllers\ManageRequestsController::class, 'sendrequests'])->name('sendrequest');

    Route::get('/uploadanimal', [App\Http\Controllers\UploadAnimalController::class, 'UploadAnimal'])->name('UploadAnimal');    
    Route::post('/uploadanimal', [App\Http\Controllers\UploadAnimalController::class, 'AnimalUpload'])->name('uploadanimal');

    Route::get('/managerequests', [App\Http\Controllers\ManageRequestsController::class,'ManageRequest'])->name('ManageRequest');
    Route::post('/managerequests', [App\Http\Controllers\ManageRequestsController::class,'ModifierRequest'])->name('ModifierRequest');

    