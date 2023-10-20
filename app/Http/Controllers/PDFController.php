<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\PDF;

class PDFController extends Controller
{
    public function generatePDF(){
        $data = [
            'title' => 'Ficha del usuario',
            'heading' => 'Datos personales',
            'content' => 'Aquí deberían recuperarse los datos de l usuario desde la Base de Datos.'
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf -> download('miarchivo.pdf');
    }
}
