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

Route::get('/', function () {
    return view('welcome');
});

/* Coba
Route::get('/hello', function () {
    return 'Hello World';
   });

Route::get('/world', function () {
    return 'World';
   });

Route::get('/world', [WelcomeController::class,'world']);
*/

/*------ Praktikum 1-----
Route::get('/', function () {
    echo "Selamat Datang";
    });

Route::get('/about', function () {
        echo "Nim: 2041723013";
        echo "<br>";
        echo "Nama: Vega Anggaresta";
        });

Route::get('/articles/{id}', function ($id) {
    return 'Halaman Artikel dengan ID->'.$id;
});
*/

/* ----- Praktikum 2 -----
/* NO 2
Route::get('/', [PageController::class,'index']);
Route::get('/about', [PageController::class,'about']);
Route::get('/articles/{id}', [PageController::class,'articles']);
/* No 3
Route::get('/', [HomeController::class,'index']);
Route::get('/about', [AboutController::class,'about']);
Route::get('/articles/{id}', [ArticleController::class,'articles']);
*/

/* ----- Praktikum 3 ----- */
//No 1
Route::get('/home',[WelcomeController::class,'home']);

// No 2
Route::prefix('category')->group(function () {
    Route::get('/{id}', [ProductController::class,'products']);
});

Route::prefix('category')->group(function () {
    Route::get('/', [ProductController::class,'products']);
});

/* No 3
Route::get('/news/{id?}', function ($id = null) {
    if ($id){
        echo '<a href=https://www.educastudio.com/news/'.$id.'>'.$id.'</a>';
    } else{
        echo '<a href=https://www.educastudio.com/news>Beranda News</a>';
    }
   }
);

/* No 4 */
Route::prefix('program')->group(function () {
    Route::get('/{id?}', [ProgramController::class,'program']);
});

/* No 5 */
Route::get('/about-us', function () {
    return '<a href=https://www.educastudio.com/about-us>https://www.educastudio.com/about-us</a>';
   });

/* No 6 */
Route::resource('contact-us', ContactController::class);
