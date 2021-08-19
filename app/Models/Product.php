<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = "produits";
    public $timestamps = false;
    protected $primaryKey = 'id_prd';


    protected $fillable=[
        'id_ctg',	
        'nom',	
        'prix',	
        'quantite',	
        'description',	
        'id_rem',	

    ];

    public function orderLine()
    {
        return $this->hasOne(OrderLine::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function markDown()
    {
        return $this->belongsTo(MarkDown::class);
    }

    public function picture()
    {
        return $this->hasOne(Picture::class);
    }

   

}
