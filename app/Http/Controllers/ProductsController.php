<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Colors;
use App\Models\Images;
use App\Models\Products;
use App\Models\Catigories;
use App\Models\Sizes;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function show_add_product(){

        

        return view("products/add_product", [
            "catigories" => Catigories::all()
        ]);
    }

    // Store Product
    public function store_product(Request $request){
        $fields = $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "catigory" => "required",
            "discound" => "required",
        ]);

        $fields["user_id"] = auth()->id();

        $new_product = Products::create($fields);


        if ( $request->hasFile("images") ){
            $x = 0;
            foreach($request->file("images") as $image){
                $new_image = $image->store("products", "public_public");
                Images::create([
                    "link" => $new_image,
                    "state" => ++$x,
                    "product_id" => $new_product->id
                ]);
            }
        }


        // Check colors
        if( isset($request->colors) ){

            $fields['count'] = null;

            $count = 0 ;

            while( isset( $request['color'.++$count] ) ){

                Colors::insert([
                    "RGB" => $request['color'.$count],
                    "name" => "color",
                    "product_id" => $new_product->id,
                    "count" => $request['color_count_'.$count],
                    "created_at" => now(),
                    "updated_at" => now()
                ]);

            }

        }

        // Check size
        if( isset($request->sizes) ){

            $fields['count'] = null;

            $count = 0 ;

            while( isset( $request['size'.++$count] ) ){

                Sizes::insert([
                    "name" => $request['size'.$count],
                    "product_id" => $new_product->id,
                    "count" => $request['size_count_'.$count],
                    "created_at" => now(),
                    "updated_at" => now()
                ]);

            }

        }

        return redirect(route("home"))->with("message", "Product is added");
    }

    public function my_products_page(){
        return view("/products/my_products", [
            "products" => Products::all()->where("user_id", auth()->id())
        ]);
    }

    public function delete_product(Products $id){
        // $id->delete(); // Direct Delete from database.
        
        if ( !Schema::hasColumn("products", "deleted_at") ){
            Schema::table("products", function (Blueprint $table){
                $table->softDeletes();
            });
        }
        
        $id->delete();

        return redirect(route("my_products"))->with('message', "Product is deleted | Produtc Name: ".$id->name);
    }

    public function edit_product_page(Products $id){
        return view("products/edit", [
            "product" => $id,
            "catigories" => Catigories::all(),
            "images" => DB::table("images")->where("product_id", $id->id)->get()
        ]);
    }

    public function save_edit (Request $request, Products $id){

        $fields = $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "catigory" => "required",
            "discound" => "required",
            "count" => "required"
        ]);

        if ( $request->hasFile("images") ){
            //delete old images
            $old_images = Images::all()->where("product_id", $id->id);
            if ( $old_images ){
                foreach($old_images as $old_image){
                    if ( Storage::exists("img/".$old_image->link ) ){
                        Storage::delete("img/".$old_image->link);
                    }
                    
                    $old_image->delete();
                }
            }
            // Store new images
            $images = $request->file("images");
            $x = 0;
            foreach($images as $image){
                $new_image = $image->store("products", "public_public");
                Images::create([
                    "link" => $new_image,
                    "state" => ++$x,
                    "product_id" => $id->id
                ]);
            }

        }


        $id->update($fields);

        return redirect(route("edit_product_page", $id->id))->with("message", "Product Is Updated");
    }

    public function add_to_cart(Request $request, Products $id){
        Cart::insert([
            "user_id" => auth()->id(),
            "product_id" => $id->id,
            // "color" => isset($request['color']) ? $request['color'] : null,
            // "size" => isset($request['size']) ? $request['size'] : null,
            // "count" => isset($request['count']) ? $request['count'] : null,
            // "color_count" => isset($request['color_count']) ? $request['color_count'] : null,
            // "size_count" =>  isset($request['size_count']) ? $request['size_count'] : null,
            // "created_at" => now(),
            // "updated_at" => now()
        ]);
        return 1;
    }

    public function show_product($id)
    {
        $product = Products::with('user')->find($id);
        return view("products/product", [
            'product' => $product
        ]);
    }


   
}
