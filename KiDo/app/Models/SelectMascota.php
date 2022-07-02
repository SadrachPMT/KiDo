<?php

namespace App\Models;

use CodeIgniter\Model;

class SelectMascota extends Model
{
    protected $table = 'mascota';
    protected $primaryKey = 'idMascota';
    protected $allowedFields = ['Nombre'];

}