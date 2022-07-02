<?php

namespace App\Models;

use CodeIgniter\Model;

class AdopcionesModel extends Model
{
    protected $table = 'adopcion';
    protected $primaryKey = 'idAdopcion';
    protected $returnType = 'object';
    protected $allowedFields = ['Fecha','Direccion','DescripcionExtra','idDepartamento','idMascota','idUsuario'];
}