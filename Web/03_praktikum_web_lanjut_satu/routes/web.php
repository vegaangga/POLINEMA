<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\WelcomeController;
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

/*
// router biasa
Route::get('/home', function () {
    return view('home',['name' => 'Vega']);


});

// jika file view didalam folder, gunakan blog(titik)
Route::get('/hello', function () {
    return view('blog.hello', ['name' => 'Vega']);
    });

// Menampilkan view dari controller
Route::get('/hello',[WelcomeController::class, 'hello']);

// jika file view didalam folder, gunakan blog(titik)
Route::get('/hello', function () {
    return view('blog.hello')
        ->with('name','Vega')
        ->with('occupation','Astronaut');
    });


//Facades
Route::get('/home', function () {
    return View::make('hello', ['name' => 'Test']);

});

*/

/*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
/* 1 */
Route::get('/home', function () {
    return view('prak1.home',['link' => 'https://www.educastudio.com/']);
});


/* 2 */
Route::prefix('category')->group(function () {
    Route::get('/{id?}', [ProductController::class,'products']);
   });

/* 3 */
Route::get('/news/{id?}', function ($id = null) {
    if ($id){
    return view('prak1.news',['link' => $id]);

    } else{
    return view('prak1.news1',['link' => 'https://www.educastudio.com/news']);
    }
    }
   );

   /* 4 */
   Route::prefix('program')->group(function () {
    Route::get('/{id?}', [ProgramController::class,'program']);
   });

   /* 5 */
   Route::get('/about-us',[AboutController::class, 'aboutview']);

   /* 6 */
   Route::resource('contact-us', ContactController::class);
