<?php

namespace App\Controllers;

class Departamentos extends BaseController
{
    public function index()
    {
        session();
        $deptomodel= model('DeptosModel');
        echo view('adopciones/depto', ['departameto'=>$deptomodel->findAll()]);
    }

    public function siguiente()
    {
        $deptoid = $this->request->getPost('depto');
        session()->set('departamentoid', $deptoid);
        return redirect()->to('Mascotas/selectmascota');
    }

    public function cambiar()
    {
        session();
        $deptomodel= model('DeptosModel');
        echo view('adopciones/cambiardepto', ['departameto'=>$deptomodel->findAll()]);
    }

    public function actualizar()
    {
        $idAdopcion=session()->get('idAdopcion');
        $deptoid = $this->request->getPost('depto');
        $modelo=model('DeptosModel');
        $modelo->actualizar($idAdopcion, $deptoid);
        return redirect()->to('/GestionarAdop');
    }
} 