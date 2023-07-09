<?php

use App\Http\Controllers\Dashboard\AtributeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\Dashboard\PadCategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SecondSliderController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\SliderInstagramController;
use App\Http\Controllers\Dashboard\TagsController;
use App\Http\Controllers\Dashboard\WordController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\CatalogController;
use App\Http\Controllers\Front\FeedbackController as FrontFeedbackController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use Illuminate\Support\Facades\Route;

//Localization
// Route::get('/ru', function () {
//     session()->put('locale', 'ru');
//     return redirect()->back();
// })->name('languages');
// Route::get('/uz', function () {
//         session()->put('locale', 'uz');
//         return redirect()->back();
// })->name('languages');

Route::get('/languages/{loc}', function ($loc) {
    if (in_array($loc, ['en', 'ru', 'uz'])) {
        session()->put('locale', $loc);
    }
    return redirect()->back();
});

//Front
Route::get('/', [\App\Http\Controllers\Front\FrontController::class, 'index'])->name('main');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/feedback', [FrontFeedbackController::class, 'store']);
// Route::get('/product', [FrontProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}/show', [FrontProductController::class, 'show'])->name('product.show');
Route::get('/padcategory/{id}/show', [FrontProductController::class, 'padshow'])->name('padcategory.show');
Route::get('/catalog/{id}/show', [CatalogController::class, 'show'])->name('catalog.show');

//Dashboard
Route::group(['prefix' => 'dashboard'], function (){
    Route::name('dashboard.')->group(function (){

        Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('index');
        Route::resource('/category', CategoryController::class);
        Route::resource('/feedback', FeedbackController::class);
        Route::resource('/instagramslider', SliderInstagramController::class);
        Route::resource('/secondslider', SecondSliderController::class);
        Route::resource('/slider', SliderController::class);
        Route::resource('/product', ProductController::class);
        Route::resource('/client', ClientController::class);
        Route::resource('/padcategory', PadCategoryController::class);
        Route::get('/product/{id}/atribute', [AtributeController::class, 'index'])->name('atribute.index');
        Route::post('/atribute', [AtributeController::class, 'store'])->name('atribute.store');
        Route::put('/atribute/{id}/update', [AtributeController::class, 'update'])->name('atribute.update');
        Route::delete('/atribute/{id}', [AtributeController::class, 'destroy'])->name('atribute.destroy');
        
        Route::get('dashboard/hometeg', [TagsController::class, 'home'])->name('home.teg');
        Route::put('dashboard/{id}/hometeg', [TagsController::class, 'update'])->name('tags.update');
        Route::get('dashboard/words', [WordController::class, 'index'])->name('words.index');
    });
});


require __DIR__.'/auth.php';
