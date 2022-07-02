<?php

namespace App\Models;

use CodeIgniter\Model;

class DeptosModel extends Model
{
    protected $table = 'departameto';
    protected $primaryKey = 'idDepartamento';
    protected $returnType = 'object';
    protected $allowedFields = ['Nombre'];

    function actualizar($idAdopcion, $idDepto)
    {
        $db = \Config\Database::connect();
        $cadena='UPDATE adopcion a
        SET a.idDepartamento='."'".$idDepto."'".'
        WHERE a.idAdopcion='.$idAdopcion;
        $db->query($cadena);
    }
}