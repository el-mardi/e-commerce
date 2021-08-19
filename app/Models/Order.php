<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table='commandes';
    public $timestamps =false;
    protected $pimarykey= 'id_cmd';

    protected $fillables=[
        'id_user',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderLine()
    {
        return $this->hasOne(OrderLine::class);
    }

}
