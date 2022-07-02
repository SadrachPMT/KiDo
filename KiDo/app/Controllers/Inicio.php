<?php

namespace App\Controllers;

use App\Models\CardAdopModel;

class Inicio extends BaseController
{
    public function index()
    {
            session();
            $db = \Config\Database::connect();
            $model = new CardAdopModel($db);
            
            $result = $model->join();

            //echo view('plantillas/navbar');
            echo view('inicio', [
                        'adopcion'=>$result,
                        // 'pager'=>$model->pager
                ]);

        //     return view('inicio', [
        //         'adopcion'=>$model->orderBy('fecha', 'desc')->paginate(20),
        //         'pager'=>$model->pager
        // ]);
    }
}