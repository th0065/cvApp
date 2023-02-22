<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Metier;

class Emplois extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom',
        'metier_id',
        'lieu',
        'logo',
        'details',
       
    ];

    public function user()
    { 
      return $this->belongsTo(User::class); 
    }
    public function metier()
    { 
      return $this->belongsTo(Metier::class); 
    }
}
