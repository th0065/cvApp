<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Emplois;
use App\Models\Cvs;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'emploi_id',
        'cvs_id',
       
       
    ];

    public function user()
    { 
      return $this->belongsTo(User::class); 
    }
    
    public function emploi()
    { 
      return $this->belongsTo(Emplois::class); 
    }

    public function cvs()
    { 
      return $this->belongsTo(Cvs::class); 
    }

}
