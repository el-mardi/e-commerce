<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    public $table='lignes_commandes';
    public $timestamps=false;
    protected $primarykey ='id_lg_cmd';

    protected $fillables=[
        'id_cmd',	
        'id_prd',	
        'prix',	
        'quantite',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
