<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cvs;
use App\Models\User;

class Metier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        
    ];


    public function cvs() 
    { 
        return $this->hasMany(Cvs::class); 
        
    }
    public function users() 
    { 
        return $this->hasMany(User::class); 
        
    }
}
