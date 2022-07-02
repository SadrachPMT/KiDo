<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MascotasModel;

class MasxUser extends BaseController
{
    public function index()
    {
        //aqui van todas las mascotas de cada usuario
        session();
        
        //$userid= $_GET("idmascota");
        $userid=session()->get('loggedUser');
        $model=model('MascotasModel');
        $result = $model->listar($userid);
        echo view('mascotas/MasxUser', [
            'mascotas'=>$result,
        ]);
    }
}
