<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Metier;
use App\Models\User;
use App\Models\Demande;

class Cvs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'metier_id',
        'fileName',
    ];


    public function user()
    { 
      return $this->belongsTo(User::class); 
    }
    public function metier()
    { 
      return $this->belongsTo(Metier::class); 
    }
    public function demandes()
    { 
      return $this->hasMany(Demande::class); 
    }
   
}
