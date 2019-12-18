<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CRUDBooster;

class VencidosController extends Controller
{
    /**
     * Display a listing of the Asignacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {

        $page_title = "PRESTAMOS VENCIDOS";
        $prestamos = DB::table('sis_prestamo')->where('estado', 'V')->get();
        
        return view('reporte')->with(compact('prestamos'));
       
    }
}
