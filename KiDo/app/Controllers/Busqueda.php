<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BusquedaModel;

class Busqueda extends BaseController
{
    public function index()
    {
        session();
        $dato= $this->request->getPost('buscar');
        $db = \Config\Database::connect();
            $model = new BusquedaModel($db);
            
            $result = $model->buscar($dato);
            echo view('adopciones/searchresult', [
                        'adopcion'=>$result,
                ]);
    }
}
