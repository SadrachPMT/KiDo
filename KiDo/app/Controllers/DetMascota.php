<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MascotasModel;
use App\Models\AdopDetailModel;

class DetMascota extends BaseController
{
    public function index()
    {
        session();
        $iduser=session()->get('loggedUser');
        $idmascota=$_GET['idmascota'];
        session()->set('idmascota', $idmascota);
        $db = \Config\Database::connect();
            $model = new MascotasModel($db);
            
            $result = $model->detalle($iduser, $idmascota);
            echo view('mascotas/DetMxU', [
                        'mascotas'=>$result
                ]);
    }

    public function borrar()
    {
        session();
        $iduser=session()->get('loggedUser');
        $idmascota=session()->get('idmascota');

        $db = \Config\Database::connect();
            $model = new MascotasModel($db);
            $model->borrar($idmascota);

            $model2 = new AdopDetailModel($db);
            $model2->borrar2($idmascota);
            
            //linea de prueba
            /* $ruta=$model->detalle($iduser, $idmascota);
            $imagen="Recursos/img/<?=$ruta.foto[0]?>";
            unlink($imagen); */
            
            return redirect()->to('/MasxUser');
    }

    public function editar()
    {
        session();
        $iduser=session()->get('loggedUser');
        $idmascota=session()->get('idmascota');

        helper (['Form_helper']);

        //validando datos

        $validation = $this->validate([
            'categoria'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'La categoría es requerida'
                ]
            ],
            'nombre'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El nombre es requerido'
                ]
            ],
            'descripcion'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'La descripción es requerida'
                ]
            ],
            'genero'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El género es requerido'
                ]
            ],
            'caracter'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El carácter es requerido'
                ]
            ],
            'tamaño'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El tamaño es requerido'
                ]
            ]
        ]);


        if(!$validation)
        {
            return view('mascotas/edit',['validation'=>$this->validator]);
        }
        else
        {
            //registrando la mascota en la base de datos
            $nombre = $this->request->getPost('nombre');
            $edad = $this->request->getPost('edad');
            $color = $this->request->getPost('color');
            $descripcion = $this->request->getPost('descripcion');
            $idGenero = $this->request->getPost('genero');
            $idCaracter = $this->request->getPost('caracter');
            $idCategoria = $this->request->getPost('categoria');
            $idTamaño = $this->request->getPost('tamaño');
            $idUsuario = session()->get('loggedUser');
            $foto = $this->request->getFile('userfile');
            $nuevonombre = $foto->getRandomName();
            $foto->move('Recursos/img', $nuevonombre);

            $values = [
                'Nombre' =>$nombre,
                'Edad' =>$edad,
                'Color' =>$color,
                'Descripcion' =>$descripcion,
                'Foto' =>$nuevonombre,
                'idGenero' =>$idGenero,
                'idCaracter' =>$idCaracter,
                'idCategoria' =>$idCategoria,
                'idTamaño' =>$idTamaño,
                'idUsuario' =>$idUsuario,
            ];

            $MascotasModel = new \App\Models\MascotasModel();
            $query = $MascotasModel->edit($idmascota, $nombre, $edad, $color, $descripcion, $foto, $idGenero, $idCaracter, $idCategoria, $idTamaño);
            if(!$query)
            {
                return redirect()->back()->with('Error', 'Algo salio mal');
            }
            else
            {
                //aqui se mandará al inicio despues de guardar
                return redirect()->to('/DetMascota');
            }
        }
    }
}