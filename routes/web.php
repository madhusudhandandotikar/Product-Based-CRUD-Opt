<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',[HomeController::class, 'index']);

route::post('/add_product', [HomeController::class, 'add_product']);

route::get('/show_product',[HomeController::class, 'show_product']);

Route::get('delete_product/{id}',[HomeController::class, 'delete_product']
       );

route::get('update_product/{id}', [HomeController::class, 'update_product']
       );

route::post('edit_product/{id}',[HomeController::class,'edit_product']);
