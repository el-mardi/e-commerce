<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $table='admins';
    protected $primarykey='id_adm';

    protected $fillable = [
        'nom',
        'prenom',
        'gsm',
        'email',
        'password',
    ];
}
