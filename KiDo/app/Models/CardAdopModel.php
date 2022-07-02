<?php

namespace App\Models;

use CodeIgniter\Model;

class CardAdopModel extends Model
{
    protected $table            = 'adopcion';
    protected $primaryKey       = 'idAdopcion';
    protected $returnType       = 'object';
    protected $allowedFields    = ['Fecha','Direccion','DescripcionExtra','idDepartamento','idMascota','idUsuario'];

    function join()
    {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT a.idAdopcion idAdopcion, a.Fecha fecha, m.Nombre petname, m.Foto foto, d.Nombre deptoname
        FROM departameto d
        INNER JOIN adopcion a on d.idDepartamento=a.idDepartamento
        INNER JOIN mascota m on m.idMascota=a.idMascota');
        $results = $query->getResult();
        return $results;
    }
}