<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkDown extends Model
{
    use HasFactory;
    public $table = "remises";
    public $timestamps = false;
    protected $primaryKey = 'id_rem';

    protected $fillable=[
        'statut',
        'pourcentage',
        'date_debut',
        'date_fin'
    ];


    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
