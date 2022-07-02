<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
Use App\Models\UsuariosModel;

class GestionarPerfil extends BaseController
{
    public function index()
    {
        $iduser=session()->get('loggedUser');
        $model=model('UsuariosModel');
        $result= $model->mostrar($iduser);
        echo view('auth/gestionar', [
            'result'=>$result
        ]);
    }

    function edit()
    {
        session();
        $nombres=$_GET['nombres'];
        $apellidos=$_GET['apellidos'];
        $contraseña=$_GET['contraseña'];
        $correo=$_GET['correo'];
        $telefono=$_GET['telefono'];
        $idtipousuario=$_GET['idtipousuario'];
        $datos=[
            'nombres'=>$nombres,
            'apellidos'=>$apellidos,
            'contraseña'=>$contraseña,
            'correo'=>$correo,
            'telefono'=>$telefono,
            'idtipousuario'=>$idtipousuario
        ];
        echo view('auth/editar', $datos);
    }

    public function actualizar()
    {
        session();
        helper (['Form_helper']);

        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos'); //no requerida cuando es organizacion
        $telefono = $this->request->getPost('telefono');
        $correo = $this->request->getPost('correo');
        $contraseña = $this->request->getPost('contraseña');
        $pass=Hash::make($contraseña);
        $tipousuario = $this->request->getPost('tipousuario');
        $iduser=session()->get('loggedUser');
        $model= model('UsuariosModel');
        $model->actualizar($iduser, $nombres, $apellidos, $telefono, $correo, $pass, $tipousuario);
        return redirect()->to('/GestionarPerfil');
    }
}
