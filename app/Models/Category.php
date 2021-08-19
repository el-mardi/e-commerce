<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = "categories";
    public $timestamps = false;
    protected $primaryKey = 'id_ctg';

    protected $fillable=[
        'nom',
        'description',
    ];
    
    public function product()
    {
        return $this->hasOne(Product::class);
    }
    
   

}
