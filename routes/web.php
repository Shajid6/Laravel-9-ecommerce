<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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





/*Frontend*/
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::controller(
    App\Http\Controllers\FrontEnd\FrontEndController::class
)->group(function () {

    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
    Route::get('/orders', 'index');
    Route::get('/orders/{order}', 'show');
    Route::get('/thank you', 'thanks');
    Route::get('/new-arrivals', 'newArraival');
    Route::get('/featured-products', 'featuredProducts');
    Route::get('/search', 'searchProducts');
    
});

/* cart wishlist */
Route::middleware(['auth'])->group(function () {
    Route::get('wishlist', [
        App\Http\Controllers\FrontEnd\WishListController::class,
        'index',

    ]);

    Route::get('cart', [
        App\Http\Controllers\FrontEnd\CartController::class,
        'index',

    ]);
    Route::get('checkout', [
        App\Http\Controllers\FrontEnd\CheckoutController::class,
        'index',

    ]);
});
/*site settings*/


/*admin*/

Route::prefix(' admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {

        Route::get('dashboard', [
            App\Http\Controllers\Admin\AdminController::class,
            'index',
        ]);
        Route::get('settings', [
            App\Http\Controllers\Admin\setingController::class,
            'index',
        ]);
        Route::post('settings', [
            App\Http\Controllers\Admin\setingController::class,
            'store',
        ]);

        Route::controller(
            App\Http\Controllers\Admin\SliderController::class
        )->group(function () {
            Route::get('sliders', 'index');
            Route::get('sliders/create', 'create');
            Route::post('sliders/create', 'store');
            Route::get('/sliders/{slider}/edit', 'edit');
            Route::put('/sliders/{slider}', 'update');
            Route::get('/sliders/{slider}/delete', 'destroy');
        });

        // Category Routes

        Route::controller(
            App\Http\Controllers\Admin\CategoryController::class
        )->group(function () {
            Route::get('/category', 'index');
            Route::get('/category/create', 'create');
            Route::post('/category', 'store');
            Route::get('/category/{category_id}/edit', 'edit');
            Route::put('/category/{category_id}','update');
        });
        // Brand Routes

        Route::controller(
            App\Http\Controllers\Admin\BrandController::class
        )->group(function () {
            Route::get('/brands', 'index');
            Route::get('/brands/create', 'create');
            Route::post('/brands', 'store');
            Route::get('/brands/{brand}/edit', 'edit');
            Route::put('/brands/{brand}', 'update');
        });

        Route::controller(
            App\Http\Controllers\Admin\productController::class
        )->group(function () {
            Route::get('/products', 'index');
            Route::get('/products/create', 'create');
            Route::post('/products', 'store');
            Route::get('/products/{product}/edit', 'edit');
            Route::put('/products/{product}', 'Update');
            Route::get('products/{product_id}/delete', 'destroy');
            Route::get(
                'product-image/{product_image_id}/delete',
                'destroyImage'
            );

            Route::post('product-color/{prod_color_id}', 'updateProdColorQty');

            Route::get(
                'product-color/{prod_color_id}/delete',
                'deleteProdColorBtn'
            );
        });

        Route::get('/brands', App\Http\LiveWire\Admin\Brand\Index::class);

        Route::controller(
            App\Http\Controllers\Admin\ColorController::class
        )->group(function () {
            Route::get('/colors', 'index');
            Route::get('/colors/create', 'create');
            Route::post('/colors/create', 'store');
            Route::get('/colors/{color}/edit', 'edit');
            Route::put('/colors/{color_id}', 'Update');
            Route::get('/colors/{color_id}/delete', 'destroy');
        });


        Route::controller(
            App\Http\Controllers\Admin\OrderController::class
        )->group(function () {

            Route::get('/orders', 'index');
            Route::get('/orders/{orderId}', 'show');
            Route::put('/orders/{orderId}', 'updateOrderStatus');
            Route::get('/invoice/{orderId}', 'viewInvoice');
            Route::get('/invoice/{orderId}/generate', 'downloadInvoice');
        });

        Route::controller(
            App\Http\Controllers\Admin\userController::class
        )->group(function () {

            Route::get('/user', 'index');
            Route::get('/user/create', 'create');
            Route::post('/user', 'store');
            Route::get('/user/{user}/edit', 'edit');
            Route::put('/user/{userId}', 'update');
            Route::get('/user/{userId}/delete', 'delete');
        });
    });




