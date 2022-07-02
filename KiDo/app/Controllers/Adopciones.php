<?php

namespace App\Controllers;

use App\Helpers\MascotasModel;
use App\Models\AdopDetailModel;

class Adopciones extends BaseController
{
    public function index()
    {
        session();
        echo view('adopciones/agregar');
    }

    public function agregar()
    {
        helper (['Form_helper']);
        //validando datos
        
        $validation = $this->validate([
            'direccion'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'La dirección es requerida',
                ]
            ],
            'descripcion'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'La descripción es requerida',
                ]
            ]
        ]);

        if(!$validation){
        //echo view('plantillas/navbar');
        echo view('adopciones/agregar',['validation'=>$this->validator]);
        }
        else{
            //registrando la adopcion en la base de datos
            $fecha = date("Y-m-d");
            $direccion = $this->request->getPost('direccion');
            $descripcion = $this->request->getPost('descripcion');
            $iddepto = session()->get('departamentoid');
            $idmascota = session()->get('mascotaid');
            $iduser = session()->get('loggedUser');

            $values = [
                'Fecha' =>$fecha,
                'Direccion' =>$direccion,
                'DescripcionExtra' =>$descripcion,
                'idDepartamento' =>$iddepto,
                'idMascota' => $idmascota,
                'idUsuario' => $iduser,
            ];

            $adopModel = new \App\Models\AdopcionesModel();
            $query = $adopModel->insert($values);
            if(!$query){
                return redirect()->back()->with('Error', 'Algo salio mal');
            }
            else{
                session()->remove('departamentoid');
                session()->remove('mascotaid');
                return redirect()->to('/Inicio');
            }
        }
    }

    public function borraradopcion()
    {
        session();
        $adadopc=$_GET['idadop'];
        $iduser= session()->get('loggedUser');
        $db = \Config\Database::connect();
            $model = new AdopDetailModel($db);
            
            $model->borrar($adadopc);
            return redirect()->to('/ListarxUser');
    }

    // public function borraradopcion2()
    // {
    //     session();
    //     $iduser= session()->get('loggedUser');
    //     $idmascota=session()->get('idmascota');
    //     $db = \Config\Database::connect();
    //         $model = new AdopDetailModel($db);
            
    //         $model->borrar2($idmascota);
    //         return redirect()->to('/MasxUser');
    // }

    public function editmostrardatos()
    {
        session();
        $idadopc=$_GET['idadop'];
        $direc=$_GET['direccion'];
        $desc=$_GET['descripcion'];
        $datos=[
            'idadop'=>$idadopc,
            'direc'=>$direc,
            'descripcion'=>$desc
        ];
        echo view('adopciones/editaradopciones', $datos);
    }

    public function editaradopcion()
    {
        session();
        helper (['Form_helper']);
        //validando datos
        
        $validation = $this->validate([
            'direccion'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'La dirección es requerida',
                ]
            ],
            'descripcion'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'La descripción es requerida',
                ]
            ]
        ]);

        if(!$validation){
        echo view('adopciones/editaradopciones',['validation'=>$this->validator]);
        }
        else{
            $direccion = $this->request->getPost('direccion');
            $descripcion = $this->request->getPost('descripcion');
            $idadopc=session()->get('idAdopcion');
            $adopModel = model('AdopDetailModel');
            $adopModel->edit($idadopc, $direccion, $descripcion);
            return redirect()->to('/ListarxUser');
        }
    }
}