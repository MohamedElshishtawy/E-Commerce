<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Authorization extends Model
{
    protected $table = "user_authorizarion";
    use HasFactory;
    
    
    protected function users(){
        return $this->belongsTo(User::class);
    }

    public function authorizations(){
        return $this->belongsTo(Authorizations::class);
    }
}
