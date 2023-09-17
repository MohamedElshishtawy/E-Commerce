<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Products;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'count',
        'user_id',
        'product_id'
    ];



    static public function calculateTotalPriceInCart()
    {
        // Check if user is authenticated
        if (auth()->check()) {
            // Get user ID
            $userId = auth()->id();

            // Get cart items for the authenticated user
            $cartItems = Cart::where('user_id', $userId)->get();

            // Initialize total variable
            $total = 0;

            // Loop through cart items
            foreach ($cartItems as $cartItem) {
                // Get product details
                $productId = $cartItem->product_id;
                $count = $cartItem->count;

                // Get product price
                $product = Products::find($productId);
                $price = $product->price;

                // Calculate subtotal for this product
                $subtotal = $count * $price;

                // Add subtotal to total
                $total += $subtotal;
            }

            return number_format($total, 2);
        }

        return 0; // Return 0 if user is not authenticated
    }

    
    static public function user_cart(){
        if (auth()->check()){
            return [
                "cart" => Cart::all()->where("user_id", auth()->id()),
                "total" => Cart::calculateTotalPriceInCart()
            ];
        }

        return 0;

    }
    
    
    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }

}
