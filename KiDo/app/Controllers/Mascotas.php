<?php

namespace App\Controllers;

use App\Models\FotosModel;
use App\Models\MascotasModel;

class Mascotas extends BaseController
{
    public function index()
    {
        session();
        //echo view('plantillas/navbar');
        echo view('mascotas/add');
    }

    public function agregar(){

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


        if(!$validation){
            return view('mascotas/add',['validation'=>$this->validator]);
        }
        else{
            //registrando la mascota en la base de datos
            $nombre = $this->request->getPost('nombre');
            $edad = $this->request->getPost('edad');
            $color = $this->request->getPost('color');
            $descripcion = $this->request->getPost('descripcion');
            $genero = $this->request->getPost('genero');
            $caracter = $this->request->getPost('caracter');
            $categoria = $this->request->getPost('categoria');
            $tamaño = $this->request->getPost('tamaño');
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
                'idGenero' =>$genero,
                'idCaracter' =>$caracter,
                'idCategoria' =>$categoria,
                'idTamaño' =>$tamaño,
                'idUsuario' =>$idUsuario,
            ];

            $MascotasModel = new \App\Models\MascotasModel();
            $query = $MascotasModel->insert($values);
            if(!$query){
                return redirect()->back()->with('Error', 'Algo salio mal');
            }else{
                //aqui se mandará al inicio despues de guardar
                $idUsuario = session()->get('loggedUser');
                return redirect()->to('/MasxUser');
            }
        }
    }
    
    public function selectmascota(){

        $mascmodel= model('MascotasModel');
        $loggeduser= session()->get('loggedUser');
        echo view('adopciones/selectpet', ['mascota'=>$mascmodel->where('idUsuario', $loggeduser)->findAll()]);
    }

    public function siguiente()
    {
        $petid = $this->request->getPost('mascota');
        session()->set('mascotaid', $petid);
        return redirect()->to('Adopciones');
    }

    public function cambiar()
    {
        session();
        $mascmodel= model('MascotasModel');
        $loggeduser= session()->get('loggedUser');
        echo view('mascotas/cambiarmascotas', ['mascota'=>$mascmodel->where('idUsuario', $loggeduser)->findAll()]);
    }

    public function actualizar()
    {
        $petid = $this->request->getPost('mascota');
        $idAdopcion=session('idAdopcion');
        $modelo=model('MascotasModel');
        $modelo->actualizar($idAdopcion, $petid);
        return redirect()->to('/ListarxUser');
    }
}