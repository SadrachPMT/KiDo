<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';
    protected $allowedFields = ['Nombres','Apellidos','Telefono','Correo','Contraseña','idTipoUsuario'];
    
    function mostrar($iduser)
    {
        $db = \Config\Database::connect();
        $cadena='SELECT u.idUsuario idusuario, u.Nombres nombres, u.Apellidos apellidos, u.Telefono telefono, u.Correo correo, u.Contraseña contraseña, t.Nombre tipousuario, t.idTipoUsuario idtipousuario
        FROM usuario u
        INNER JOIN tipousuario t ON u.idTipoUsuario=t.idTipoUsuario
        WHERE u.idUsuario='.$iduser;
        
        $query   = $db->query($cadena);
        $results = $query->getResult();
        return $results;
    }

    function llenardatos($idusuario, $nombres, $apellidos, $telefono, $correo, $contraseña, $tipousuario)
    {
        $db = \Config\Database::connect();
        $cadena='SELECT u.idUsuario, u.nombres, u.apellidos, u.telefono, u.correo, u.contraseña, u.idTipoUsuario
        FROM usuario u
        WHERE u.idUsuario='.$idusuario;
        $db->query($cadena);
    }

    function actualizar($idusuario, $nombres, $apellidos, $telefono, $correo, $contraseña, $tipousuario)
    {
        $db = \Config\Database::connect();
        $cadena='UPDATE usuario u
        SET u.Nombres='."'".$nombres."'".', u.Apellidos='."'".$apellidos."'".', u.idUsuario='."'".$idusuario."'".', u.Telefono='."'".$telefono."'".', u.Correo='."'".$correo."'".', u.Contraseña='."'".$contraseña."'".', u.idTipoUsuario='."'".$tipousuario."'".'
        WHERE u.idUsuario='.$idusuario;
        $db->query($cadena);
    }
}

?>