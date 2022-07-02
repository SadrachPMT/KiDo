<?php

namespace App\Models;

use CodeIgniter\Model;

class MascotasModel extends Model
{
    protected $table = 'mascota';
    protected $primaryKey = 'idMascota';
    protected $returnType = 'object';
    protected $allowedFields = ['Nombre','Edad','Color','Descripcion','Foto','idGenero','idCaracter','idCategoria','idTamaño','idUsuario'];

    function actualizar($idAdopcion, $idmascota)
    {
        $db = \Config\Database::connect();
        $cadena='UPDATE adopcion a
        SET a.idMascota='."'".$idmascota."'".'
        WHERE a.idAdopcion='.$idAdopcion;
        $db->query($cadena);
    }

    function listar($iduser)
    {
        $db = \Config\Database::connect();
        $cadena='SELECT m.idMascota idmascota, m.Nombre petname, m.Edad edad, m.Color color, m.Descripcion descr, m.Foto foto, g.Nombre genero, c.Nombre caracter, k.Nombre categoria, t.Nombre tamaño, u.idUsuario iduser, u.Nombres nombres, u.Apellidos apellidos
        FROM mascota m
        INNER JOIN caracter c ON c.idCaracter=m.idCaracter
        INNER JOIN categoria k ON k.idCategoria=m.idCategoria
        INNER JOIN  genero g ON g.idGenero=m.idGenero
        INNER JOIN tamaño t ON t.idTamaño=m.idTamaño
        INNER JOIN usuario u ON u.idUsuario=m.idUsuario
        WHERE u.idUsuario='.$iduser.' ORDER BY m.idMascota';
        
        $query   = $db->query($cadena);
        $results = $query->getResult();
        return $results;
    }

    function detalle($iduser, $idmascota)
    {
        $db = \Config\Database::connect();
        $cadena='SELECT m.idMascota idmascota, m.Nombre petname, m.Edad edad, m.Color color, m.Descripcion descr, m.Foto foto, g.Nombre genero, c.Nombre caracter, k.Nombre categoria, t.Nombre tamaño, u.idUsuario iduser, u.Nombres nombres, u.Apellidos apellidos
        FROM mascota m
        INNER JOIN caracter c ON c.idCaracter=m.idCaracter
        INNER JOIN categoria k ON k.idCategoria=m.idCategoria
        INNER JOIN  genero g ON g.idGenero=m.idGenero
        INNER JOIN tamaño t ON t.idTamaño=m.idTamaño
        INNER JOIN usuario u ON u.idUsuario=m.idUsuario
        WHERE u.idUsuario='.$iduser.' AND m.idMascota='.$idmascota;
        //'AND m.idMascota='.$idmascota;

        //WHERE m.Nombre LIKE '."'".$petname."'";
        
        $query   = $db->query($cadena);
        $results = $query->getResult();
        return $results;
    }

    function borrar($idmascota)
    {
        $db = \Config\Database::connect();
        $cadena='DELETE
        FROM mascota
        WHERE mascota.idMascota='.$idmascota.';';
        $db->query($cadena);
    }

    function edit($idmascota, $nombre, $edad, $color, $descripcion, $foto, $idGenero, $idCaracter, $idCategoria, $idTamaño)
    {
        $db = \Config\Database::connect();
        $cadena='UPDATE mascota m
        SET m.Nombre='."'".$nombre."'".', m.Edad='."'".$edad."'"."'".', m.Color='."'".$color."'"."'".', m.Descripcion='."'".$descripcion."'"."'".', m.Foto='."'".$foto."'"."'".', m.idGenero='."'".$idGenero."'"."'".', m.idCaracter='."'".$idCaracter."'"."'".', m.idCategoria='."'".$idCategoria."'"."'".', m.idTamaño='."'".$idTamaño."'".'
        WHERE a.idAdopcion='.$idmascota;
        $db->query($cadena);
    }
}

?>