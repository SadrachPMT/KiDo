<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        session();
        return view('auth/login');
    }

    public function registro()
    {
        return view('auth/registro');
    }

    public function guardar()
    {
        //validando datos
        // $validation = $this->validate([
        //     'nombres'=>'required',
        //     'apellidos'=>'required',
        //     'telefono'=>'required|min_length[8]',
        //     'correo'=>'required|valid_email|is_unique[usuario.correo]',
        //     'contraseña'=>'required|min_length[8]',
        //     'ccontraseña'=>'required|min_length[8]|matches[contraseña]',
        //     'tipousuario'=>'required'
        // ]);

        $validation = $this->validate([
                'nombres'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Tu nombre es requerido'
                    ]
                ],
                //no requerida cuando es organizacion
                // 'apellidos'=>[
                //     'rules'=>'required',
                //     'errors'=>[
                //         'required'=>'Tu apellido es requerido'
                //     ]
                // ],
                'telefono'=>[
                    'rules'=>'required|min_length[8]',
                    'errors'=>[
                        'required'=>'Tu apellido es requerido',
                        'min_length'=>'El número debe contener al menos 8 digitos'
                    ]
                ],
                'correo'=>[
                    'rules'=>'required|valid_email|is_unique[usuario.Correo]',
                    'errors'=>[
                        'required'=>'Tu correo electrónico es requerido',
                        'valid_email'=>'Debes ingresar un correo electrónico válido',
                        'is_unique'=>'El correo proporcionado ya está en uso'
                    ]
                ],
                'contraseña'=>[
                    'rules'=>'required|min_length[8]',
                    'errors'=>[
                        'required'=>'La contraseña es requerida',
                        'min_length'=>'La contraseña debe contener al menos 8 digitos de longitud'
                    ]
                ],
                'ccontraseña'=>[
                    'rules'=>'required|min_length[8]|matches[contraseña]',
                    'errors'=>[
                        'required'=>'La confirmación de contraseña es requerida',
                        'min_length'=>'La contraseña debe contener al menos 8 digitos de longitud',
                        'matches'=>'Las contraseñas deben coincidir'
                    ]
                ],
                'tipousuario'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'El tipo de usuario es requerido'
                    ]
                ]
        ]);


        if(!$validation){
            return view('auth/registro',['validation'=>$this->validator]);
        }
        else{
            //registrando al usuario en la base de datos
            $nombres = $this->request->getPost('nombres');
            $apellidos = $this->request->getPost('apellidos'); //no requerida cuando es organizacion
            $telefono = $this->request->getPost('telefono');
            $correo = $this->request->getPost('correo');
            $contraseña = $this->request->getPost('contraseña');
            $tipousuario = $this->request->getPost('tipousuario');

            $values = [
                'Nombres' =>$nombres,
                'Apellidos' =>$apellidos,
                'Telefono' =>$telefono,
                'Correo' =>$correo,
                'Contraseña' =>Hash::make($contraseña),
                'idTipoUsuario' =>$tipousuario,
            ];

            $UsuaiosModel = new \App\Models\UsuariosModel();
            $query = $UsuaiosModel->insert($values);
            if(!$query){
                return redirect()->back()->with('Error', 'Algo salio mal');
                //return redirect()->to('registro')->with('Error', 'Algo salio mal');
            }else{
                //return redirect()->to('auth/registro')->with('Enhorabuena', 'Has sido registrado exitosamente');
                //aqui se mandará al inicio despues de registrarse
                $last_id = $UsuaiosModel->InsertID(); //almacena el ultimo id almacenado
                session()->set('loggedUser', $last_id);
                return redirect()->to('/Inicio');
            }
        }
    }

    function login(){
        
        //validando datos del logueo
        $validation = $this->validate([
            'correo'=>[
                'rules'=>'required|valid_email|is_not_unique[usuario.Correo]',
                'errors'=>[
                    'required'=>'Tu correo electrónico es requerido',
                    'valid_email'=>'Debes ingresar un correo electrónico válido',
                    'is_not_unique'=>'El correo proporcionado no está registrado'
                ]
            ],
            'contraseña'=>[
                'rules'=>'required|min_length[8]',
                'errors'=>[
                    'required'=>'La contraseña es requerida',
                    'min_length'=>'La contraseña debe contener al menos 8 digitos de longitud'
                ]
            ]
        ]);

        if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
        }
        else{
            //consultando datos de logueo
            $correo = $this->request->getPost('correo');
            $contraseña = $this->request->getPost('contraseña');
            $usuariosModel = new \App\Models\UsuariosModel();
            $Usuario_info = $usuariosModel->where('Correo', $correo)->first();
            $check_pass = Hash::check($contraseña, $Usuario_info['Contraseña']);

            if(!$check_pass){
                session()->setFlashdata('Error', 'Contraseña incorrecta');
                return redirect()->to('/auth')->withInput();
            }else{
                $user_id = $Usuario_info['idUsuario'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/Inicio');
            }
        }
    }

    function cerrar_sesion(){
        if(session()->has('loggedUser')){
            session()->destroy();
            return redirect()->to('/Inicio?access=out');
        }
    }
}