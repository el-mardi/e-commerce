<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;

class Remise extends Model
{
    use HasFactory;

    public function produit()
    {
        return $this->hasOne(Produit::class);
    }
}
