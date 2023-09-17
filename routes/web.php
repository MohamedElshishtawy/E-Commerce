<?php

use App\Models\Cart;
use App\Models\Products;
use App\Models\Catigories;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use Illuminate\Database\Eloquent\Collection;

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
    $products = Products::with("colors")->get();
    return view('products/index', [
        "catigories" => DB::table("catigories")->get(),
        "last_products" => $products,
        "cart_price" => Cart::calculateTotalPriceInCart()

    ]);
})->name("home");



/* {{-- User Routes Start --}} */

/* {{-- User Routes End --}} */


/* {{-- Products Routes Start --}} */
Route::prefix("/product")->group(function(){
    Route::get("/add", [ProductsController::class, "show_add_product"])->name("add_product")->middleware("can:add-product");
    Route::post("/store_product", [ProductsController::class, "store_product"])->name("store_product");
    Route::get("/my_products", [ProductsController::class, "my_products_page"])->name("my_products");
    Route::get("/product/edit/{id}", [ProductsController::class, "edit_product_page"])->name("edit_product_page");
    Route::put("/product/edit/{id}/save", [ProductsController::class, "save_edit"])->name("edit_product");
    Route::post("/product/delete/{id}", [ProductsController::class, "delete_product"])->name("delete_product"); // Delete
    Route::get("/{id}", [ProductsController::class, "show_product"])->name("show_product");
})->middleware("auth");


/* {{-- Products Routes End --}} */


Route::prefix("user")->group(function(){
    Route::get("/register", [UserController::class, "register"])->name("register")->middleware("guest");
    Route::post("/users", [UserController::class, "store"])->name("store_register_process")->middleware("guest");
    Route::get("/login", [UserController::class, "login"])->name("login")->middleware("guest");
    Route::post("/login/process", [UserController::class, "authonticate"])->name("login_process")->middleware("guest");
    Route::post("/logout", [UserController::class, "logout"])->name("logout")->middleware("auth");
});

Route::prefix("cart")->group(function(){
    Route::get("/", [CartController::class, "index"])->name("cart_page");
    Route::post("/add/{id}", [CartController::class, "add"])->name("add_in_cart");
    Route::get('/mail', [CartController::class , 'mail'])->name("send_in_mail");
})->middleware("auth");