<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authorizations extends Model
{
    use HasFactory;
    public function user_authorization(){
        return $this->hasMany(User_Authorization::class);
    }
}
