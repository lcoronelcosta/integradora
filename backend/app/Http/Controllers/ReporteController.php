<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CRUDBooster;

class ReporteController extends Controller
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
        
        return view('reporte')->with(compact('page_title'));
       
    }
    
     /**
     * Display a listing of the Asignacion.
     *
     * @param Request $request
     * @return Response
     */
    public function data(Request $request)
    {
    
    $fecha = $request->fecha;
    $fecha2 = $request->fecha2;    
    
    $cadena = "";
    $recaudado= DB::select("select sum(p.abono) as valor from sis_pago as p where p.fecha BETWEEN '$fecha' and '$fecha2' ");
    $gastos = DB::select("select sum(p.valor) as valor from sis_gasto as p where p.fecha  BETWEEN '$fecha' and '$fecha2' ");
    $prestado = DB::select("select sum(p.monto) as valor from sis_prestamo as p where p.fecha  BETWEEN '$fecha' and '$fecha2' ");
    $ganado = DB::select("select sum(p.total_pagar)-sum(p.monto) as valor from sis_prestamo as p where p.fecha_cierre  BETWEEN '$fecha' and '$fecha2' ");
    $efectivo = $recaudado[0]->valor - $gastos[0]->valor - $prestado[0]->valor;
    $cadena = "";
    $cadena = "<div id='area1' class='col-sm-2 connectedSortable col-md-offset-1'>
                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                    <div class='small-box bg-green'>
                        <div class='inner inner-box' id='1'> 
                            <h3>".$recaudado[0]->valor."</h3>
                            <p>RECAUDADO    </p>
                        </div>
                        <div class='icon'>
                            <i class='ion ion-cash'></i>
                        </div>
                        <a href='semanalDetalleRecaudado/".$fecha."/".$fecha2."' class='small-box-footer'>More info <i class='fa fa-arrow-circle-right'></i></a>
                        
                    </div>
                </div>
            </div>
            <div id='area2' class='col-sm-2 connectedSortable'>
                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                    <div class='small-box bg-red'>
                        <div class='inner inner-box' id='1'> 
                            <h3>".$gastos[0]->valor."</h3>
                            <p>GASTOS    </p>
                        </div>
                        <div class='icon'>
                            <i class='ion ion-cash'></i>
                        </div>
                        <a href='semanalDetalleGastos/".$fecha."/".$fecha2."' class='small-box-footer'>More info <i class='fa fa-arrow-circle-right'></i></a>
                    </div>
                </div>
            </div>
            <div id='area3' class='col-sm-2 connectedSortable'>
                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                    <div class='small-box bg-yellow'>
                        <div class='inner inner-box' id='1'> 
                            <h3>".$prestado[0]->valor."</h3>
                            <p>PRESTADO     </p>
                        </div>
                        <div class='icon'>
                            <i class='ion ion-cash'></i>
                        </div>
                        <a href='semanalDetallePrestamos/".$fecha."/".$fecha2."' class='small-box-footer'>More info <i class='fa fa-arrow-circle-right'></i></a>
                        
                    </div>
                </div>
            </div>
            <div id='area3' class='col-sm-2 connectedSortable'>
                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                    <div class='small-box bg-red'>
                        <div class='inner inner-box' id='1'> 
                            <h3>".$efectivo."</h3>
                            <p>EFECTIVO     </p>
                        </div>
                        <div class='icon'>
                            <i class='ion ion-cash'></i>
                        </div>
                        <a href='#' class='small-box-footer'>More info <i class='fa fa-arrow-circle-right'></i></a>
                        
                    </div>
                </div>
            </div>
            <div id='area4' class='col-sm-2 connectedSortable'>
                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                    <div class='small-box bg-aqua'>
                        <div class='inner inner-box' id='1'> 
                            <h3>".$ganado[0]->valor."</h3>
                            <p>GANADO     </p>
                        </div>
                        <div class='icon'>
                            <i class='ion ion-cash'></i>
                        </div>
                        <a href='semanalDetalleGanados/".$fecha."/".$fecha2."' class='small-box-footer'>More info <i class='fa fa-arrow-circle-right'></i></a>
                    </div>
                </div>
            </div>";



        return response()->json(['success'=>$cadena]);
       
    }
    
         /**
     * Display a listing of the Asignacion.
     *
     * @param Request $request
     * @return Response
     */
    public function diario()
    {
        date_default_timezone_set('America/Guayaquil');
        $i=0;
        $diaDeLaSemana = date("N");
        $firstday = "";
        if ($diaDeLaSemana == 1){
            $firstday = date('Y-m-d');      
        }
        else{
            $firstday = date('Y-m-d', strtotime('last Monday'));
        }
        $lastday = date('Y-m-d', strtotime('next Sunday'));
        $recaudado = DB::select("select (p.fecha),sum(p.abono) as valor from sis_pago as p where p.fecha BETWEEN '$firstday' and '$lastday' GROUP BY (p.fecha)");
       
        $gastos = DB::select("select (p.fecha),sum(p.valor) as valor from sis_gasto as p where p.fecha  BETWEEN '$firstday' and '$lastday' GROUP BY (p.fecha)");
        $prestado = DB::select("select (p.fecha),sum(p.monto) as valor from sis_prestamo as p where p.fecha  BETWEEN '$firstday' and '$lastday' GROUP BY (p.fecha)");
        $ganado = DB::select("select (p.fecha_cierre) as fecha,sum(p.total_pagar)-sum(p.monto) as valor from sis_prestamo as p where p.fecha_cierre  BETWEEN '$firstday' and '$lastday' GROUP BY (p.fecha_cierre)");
        return view('diario.index')->with(compact('gastos', 'recaudado', 'prestado', 'ganado'));
       
    }
    
    public function diarioDetalle($fecha)
    {
        $recaudados = DB::select("SELECT cli.nombres, pa.abono, pr.codigo FROM sis_pago as pa inner join sis_prestamo as pr on pa.id_prestamo = pr.id inner join sis_cliente as cli on pr.id_cliente = cli.id where pa.fecha = '$fecha'");
        return view('diario.detalleDiario')->with(compact('recaudados', 'fecha'));
       
    }
    
    public function diarioDetalleGastos($fecha)
    {
        $gastos = DB::select("SELECT tga.nombre, ga.valor FROM sis_gasto as ga 
inner join sis_tipo_gasto as tga on ga.id_tipo_gasto = tga.id
where ga.fecha = '$fecha'");
        return view('diario.detalleDiarioGastos')->with(compact('gastos', 'fecha'));
       
    }
    
    public function diarioDetallePrestamos($fecha)
    {
        $prestamos = DB::select("SELECT cli.nombres, pr.monto FROM sis_prestamo as pr inner join sis_cliente as cli on pr.id_cliente = cli.id where pr.fecha = '$fecha'");
        return view('diario.detalleDiarioPrestamos')->with(compact('prestamos', 'fecha'));
       
    }
    
    public function diarioDetalleGanados($fecha)
    {
        $ganados = DB::select("SELECT cli.nombres, pr.monto, pr.total_pagar FROM sis_prestamo as pr inner join sis_cliente as cli on pr.id_cliente = cli.id where pr.fecha_cierre = '$fecha'");
        return view('diario.detalleDiarioGanado')->with(compact('ganados', 'fecha'));
       
    }
    
    /**
     * Display a listing of the Asignacion.
     *
     * @param Request $request
     * @return Response
     */
    public function semanal()
    {
        date_default_timezone_set('America/Guayaquil');
        $i=0;
        $diaDeLaSemana = date("N");
        $firstday = "";
        if ($diaDeLaSemana == 1){
            $firstday = date('Y-m-d');      
        }
        else{
            $firstday = date('Y-m-d', strtotime('last Monday'));
        }
        $lastday = date('Y-m-d', strtotime('next Sunday'));
        $recaudado = DB::select("select sum(p.abono) as valor from sis_pago as p where p.fecha BETWEEN '$firstday' and '$lastday'");
        $gastos = DB::select("select sum(p.valor) as valor from sis_gasto as p where p.fecha  BETWEEN '$firstday' and '$lastday'");
        $prestado = DB::select("select sum(p.monto) as valor from sis_prestamo as p where p.fecha  BETWEEN '$firstday' and '$lastday'");
        $ganado = DB::select("select sum(p.total_pagar)-sum(p.monto) as valor from sis_prestamo as p where p.fecha_cierre  BETWEEN '$firstday' and '$lastday' ");
        return view('semanal.index')->with(compact('recaudado', 'gastos', 'prestado', 'ganado', 'firstday', 'lastday'));
       
    }
    
    
    /*DETALLE SEMANAL RECAUDADO*/
    public function semanalDetalleRecaudado($fecha1, $fecha2)
    {
        $recaudados = DB::select("SELECT cli.nombres, pa.abono,pa.fecha, pr.codigo FROM sis_pago as pa inner join sis_prestamo as pr on pa.id_prestamo = pr.id inner join sis_cliente as cli on pr.id_cliente = cli.id where pa.fecha BETWEEN '$fecha1' and '$fecha2' order by cli.nombres");
        return view('semanal.detalleDiario')->with(compact('recaudados', 'fecha1', 'fecha2'));
       
    }
    
        public function semanalDetalleGastos($fecha1, $fecha2)
    {
        $gastos = DB::select("SELECT tga.nombre, ga.valor, ga.fecha FROM sis_gasto as ga inner join sis_tipo_gasto as tga on ga.id_tipo_gasto = tga.id where ga.fecha BETWEEN '$fecha1' and '$fecha2' order by tga.nombre");
        return view('semanal.detalleDiarioGastos')->with(compact('gastos', 'fecha1', 'fecha2'));
    }
    
    public function semanalDetallePrestamos($fecha1, $fecha2)
    {
        $prestamos = DB::select("SELECT cli.nombres, pr.monto, pr.fecha FROM sis_prestamo as pr inner join sis_cliente as cli on pr.id_cliente = cli.id where pr.fecha BETWEEN '$fecha1' and '$fecha2' order by pr.fecha");
        return view('semanal.detalleDiarioPrestamos')->with(compact('prestamos', 'fecha1', 'fecha2'));
       
    }
    
    public function semanalDetalleGanados($fecha1, $fecha2)
    {
        $ganados = DB::select("SELECT cli.nombres, pr.monto, pr.total_pagar, pr.fecha_cierre FROM sis_prestamo as pr inner join sis_cliente as cli on pr.id_cliente = cli.id where pr.fecha_cierre BETWEEN '$fecha1' and '$fecha2' order by pr.fecha_cierre");
        return view('semanal.detalleDiarioGanado')->with(compact('ganados', 'fecha1', 'fecha2'));
       
    }
    
    
    
     /**
     * Display a listing of the Asignacion.
     *
     * @param Request $request
     * @return Response
     */
    public function refinancear(Request $request)
    {
        $id = $request->id;
        $totalt = $request->totalt;
        $prestamo = DB::table('sis_prestamo')->where('id', $id)->first();
            $forma_pago = DB::table('sis_forma_pago')->where('id', $prestamo->id_forma_pago)->first();
            $intervalo = '';
            if ($forma_pago->descripcion == 'DIARIO') {
                $intervalo = "+ 1 days";
            }
            if ($forma_pago->descripcion == 'SEMANAL') {
                $intervalo = "+ 1 week";
            }
            if ($forma_pago->descripcion == 'QUINCENAL') {
                $intervalo = "+ 2 week";
            }
            if ($forma_pago->descripcion == 'MENSUAL') {
                $intervalo = "+ 4 week";
            }

            $fecha =  date('Y-m-d');
            $fecha2 =  date('Y-m-d');
            for ($i=0; $i < $prestamo->num_pagos; $i++) {
                $fecha2 = date("Y-m-d",strtotime($fecha2.$intervalo));
                
            } 

            DB::table('sis_prestamo')
                ->where([
                    ['id', '=', $id],
                ])
                ->update(['fecha' => $fecha,'fecha_fin' => $fecha2,'estado' => 'A']); 

             DB::table('sis_intereses_prestamo')->insert(
                    ['id_prestamo' => $id, 'fecha' => $fecha,
                     'monto' => $totalt, 'id_cliente' => $prestamo->id_cliente]
                );  
            return redirect(CRUDBooster::adminPath('sis_prestamo_vencidos'));   
       
    }
    
    
    
}