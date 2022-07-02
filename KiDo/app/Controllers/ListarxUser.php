<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdopDetailModel;

class ListarxUser extends BaseController
{
    public function index()
    {
        session();
            $iduser= session()->get('loggedUser');
            $db = \Config\Database::connect();
            $model = new AdopDetailModel($db);
            
            $result = $model->listar($iduser);

            echo view('adopciones/listaradopciones', [
                        'adopciones'=>$result,
                ]);
    }
}
