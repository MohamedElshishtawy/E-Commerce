<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable = ["link", "state", "product_id"];

    protected function products()  {
        return $this->belongsTo(Products::class, "product_id");
    }

}
