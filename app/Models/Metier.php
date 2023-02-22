<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cvs;
use App\Models\User;
use App\Models\Emplois;

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
    public function emploi() 
    { 
        return $this->hasMany(Emplois::class); 
        
    }
}
