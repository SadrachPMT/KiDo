<?php

namespace App\Models;

use CodeIgniter\Model;

class AdopDetailModel extends Model
{
    protected $table            = 'adopcion';
    protected $primaryKey       = 'idAdopcion';
    protected $returnType       = 'object';
    protected $allowedFields    = ['Fecha','Direccion','DescripcionExtra','idDepartamento','idMascota','idUsuario'];

    function detalle($idadop)
    {
        $db = \Config\Database::connect();
        $cadena='SELECT r.idTipoUsuario idtipousuario, a.idAdopcion idAdopcion, d.Nombre depto, m.Nombre mascota, m.Edad edad, m.Color color, m.Descripcion petdesc, m.Foto foto, a.Fecha fecha, a.Direccion direccion, a.DescripcionExtra descext, g.Nombre genero, c.Nombre caracter, t.Nombre tamaño, u.Nombres nombresuser, u.Apellidos apellidosuser, u.Telefono tel, u.Correo correo, k.Nombre categoria
        FROM adopcion a
        INNER JOIN departameto d ON a.idDepartamento=d.idDepartamento
        INNER JOIN mascota m ON m.idMascota=a.idMascota
        INNER JOIN usuario u ON a.idUsuario=u.idUsuario
        INNER JOIN genero g ON m.idGenero=g.idGenero
        INNER JOIN caracter c ON m.idCaracter=c.idCaracter
        INNER JOIN tamaño t ON m.idTamaño=t.idTamaño
        INNER JOIN categoria k ON m.idCategoria=k.idCategoria
        INNER JOIN tipousuario r ON u.idTipoUsuario=r.idTipoUsuario
        WHERE a.idAdopcion='.$idadop;
        // $cadena='SELECT a.idAdopcion idAdopcion, d.Nombre depto, m.Nombre mascota, m.Edad edad, m.Color color, m.Descripcion petdesc, m.Foto foto, a.Fecha fecha, a.Direccion direccion, a.DescripcionExtra descext, g.Nombre genero, c.Nombre caracter, t.Nombre tamaño, u.Nombres nombresuser, u.Apellidos apellidosuser, u.Telefono tel, u.Correo correo, k.Nombre categoria
        //     FROM adopcion a
        //     INNER JOIN departameto d ON a.idDepartamento=d.idDepartamento
        //     INNER JOIN mascota m ON m.idMascota=a.idMascota
        //     INNER JOIN usuario u ON a.idUsuario=u.idUsuario
        //     INNER JOIN genero g ON m.idGenero=g.idGenero
        //     INNER JOIN caracter c ON m.idCaracter=c.idCaracter
        //     INNER JOIN tamaño t ON m.idTamaño=t.idTamaño
        //     INNER JOIN categoria k ON m.idCategoria=k.idCategoria
        //     WHERE a.idAdopcion='.$idadop;
        
        $query   = $db->query($cadena);
        $results = $query->getResult();
        return $results;
    }

    function borrar($idadop)
    {
        $db = \Config\Database::connect();
        $cadena='DELETE
        FROM adopcion
        WHERE adopcion.idAdopcion='.$idadop.';';
        $db->query($cadena);
    }

    function borrar2($idmascota)
    {
        $db = \Config\Database::connect();
        $cadena='DELETE
        FROM adopcion
        WHERE adopcion.idMascota='.$idmascota.';';
        $db->query($cadena);
    }

    function edit($idadop, $dir, $desc)
    {
        $db = \Config\Database::connect();
        $cadena='UPDATE adopcion a
        SET a.Direccion='."'".$dir."'".', a.DescripcionExtra='."'".$desc."'".'
        WHERE a.idAdopcion='.$idadop;
        $db->query($cadena);
    }

    function listar($iduser)
    {
        $db = \Config\Database::connect();
        $cadena='SELECT a.idAdopcion idAdopcion, a.Direccion direccion, a.DescripcionExtra descripcion, a.Fecha fecha, m.Nombre petname, m.Foto foto, d.Nombre deptoname
        FROM adopcion a
        INNER JOIN departameto d on a.idDepartamento=d.idDepartamento
        INNER JOIN mascota m on m.idMascota=a.idMascota
        WHERE a.idUsuario='.$iduser;
        
        $query   = $db->query($cadena);
        $results = $query->getResult();
        return $results;
    }
}
