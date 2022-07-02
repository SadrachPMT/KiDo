<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdopDetailModel;

class DetalleAdopcion extends BaseController
{
    public function index()
    {
        session();
        $idadopcion=$_GET['idadop'];
        $db = \Config\Database::connect();
            $model = new AdopDetailModel($db);
            
            $result = $model->detalle($idadopcion);
            //echo view('plantillas/navbar');
            echo view('adopciones/detalleadopcion', [
                        'detalleadopcion'=>$result,
                ]);
            
        //echo view('adopciones/detalleadopcion');
    }
}
