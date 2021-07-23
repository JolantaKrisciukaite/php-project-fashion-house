<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    use HasFactory;
}

public function outfitMaster()
   {
       return $this->belongsTo('App\Models\Master', 'master_id', 'id');
   }

