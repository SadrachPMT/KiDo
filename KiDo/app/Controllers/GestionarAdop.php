<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdopDetailModel;

class GestionarAdop extends BaseController
{
    public function index()
    {
        session();
        //$idadopcion=$_GET['idadop'];
        //session()->set('idAdopcion', $idadopcion);
        $idadopcion=session()->get('idAdopcion');
        $db = \Config\Database::connect();
            $model = new AdopDetailModel($db);
            
            $result = $model->detalle($idadopcion);
            echo view('adopciones/gestionaradopciones', [
                        'detalleadopcion'=>$result,
                ]);
    }
}
