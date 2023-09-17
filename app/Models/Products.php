<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "user_id",
        "price",
        "catigory",
        "discound",
        "count"
    ];

    public function colors(){
        return $this->hasMany(Colors::class, "product_id");
    }
    protected function images(){
        return $this->hasMany(Images::class, "product_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
}
