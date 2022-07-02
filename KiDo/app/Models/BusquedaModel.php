<?php

namespace App\Models;

use CodeIgniter\Model;

class BusquedaModel extends Model
{
    protected $table            = 'adopcion';
    protected $primaryKey       = 'idAdopcion';
    protected $returnType       = 'object';
    protected $allowedFields    = ['Fecha','Direccion','DescripcionExtra','idDepartamento','idMascota','idUsuario'];

    function buscar($petname)
    {
        $db = \Config\Database::connect();
        $cadena='SELECT a.idAdopcion idAdopcion, d.Nombre depto, m.Nombre mascota, m.Foto foto, a.Fecha fecha
            FROM adopcion a
            INNER JOIN departameto d ON a.idDepartamento=d.idDepartamento
            INNER JOIN mascota m ON m.idMascota=a.idMascota
            WHERE m.Nombre LIKE '."'".$petname."'";
        
        $query   = $db->query($cadena);
        $results = $query->getResult();
        return $results;
    }
}



