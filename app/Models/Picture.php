<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    public $table='images';
    public $timestamps=false;
    protected $primarykey ='id_img';

    protected $fillables=[
        	
        'url',	
        'nom',	
        'id_prd',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
