<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ligne_Commande;
use App\Models\Categorie;
use App\Models\Remise;
use App\Models\Image;


class Produit extends Model
{
    use HasFactory;

    public function ligne_commande()
    {
        return $this->hasOne(Ligne_Commande::class);
    }
    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function remise()
    {
        return $this->belongsTo(Remise::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
