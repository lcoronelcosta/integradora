@extends("crudbooster::admin_template")
@section("content")
<div>

<div class="col-sm-12">
    <div class="alert alert-success" style="display:none"></div>
         <div id="statistic-area">
            <?php
                date_default_timezone_set('America/Guayaquil');
                $diaDeLaSemana = date("N");
                $dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
                $firstday = "";
                $aux="";
                if ($diaDeLaSemana == 1){
                    $firstday = date('Y-m-d');      
                }
                else{
                    $firstday = date('Y-m-d', strtotime('last Monday'));
                }
                $g=0;$r=0;$p=0;$ga=0;
                for ($i=0; $i < 7; $i++) { 
                    $efectivo = 0;
                    $prestadoD = 0;
                    $recaudadoD = 0;
                    $gastosD = 0;
                    ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="font-size: 20px; text-align: center;">{{$dias[$i]}} <?php echo $firstday?></div>
                    </div>
                        <div class="statistic-row row">
                            <!-- Recaudado -->
                            <div id='area2' class='col-sm-2 connectedSortable col-md-offset-1'>
                                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                                    <div class='small-box bg-green'>
                                        <div class='inner inner-box' id='1'> 
                                            <h3>
                                                <?php 
                                                    if($recaudado[$r]->fecha == $firstday){
                                                        echo $recaudado[$r]->valor;
                                                        $recaudadoD = $recaudado[$r]->valor;
                                                        $r++;

                                                    }else{echo "00.00";
                                                        $recaudadoD = 0;
                                                    }
                                                ?>
                                                            
                                            </h3>
                                            <p>RECAUDADO    </p>
                                        </div>
                                        <div class='icon'>
                                            <i class='ion ion-cash'></i>
                                        </div>
                                        <a href="{{ url('/admin/reportediarioDetalle/').'/'.$firstday }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Gastos -->
                            <div id='area2' class='col-sm-2 connectedSortable'>
                                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                                    <div class='small-box bg-red'>
                                        <div class='inner inner-box' id='1'> 
                                            <h3>
                                                <?php 
                                                    if($gastos[$g]->fecha == $firstday){
                                                        echo $gastos[$g]->valor;
                                                        $gastosD = $gastos[$g]->valor;
                                                        $g++;

                                                    }else{echo "00.00";
                                                        $gastosD = 0;
                                                    }
                                                ?>
                                                            
                                            </h3>
                                            <p>GASTOS    </p>
                                        </div>
                                        <div class='icon'>
                                            <i class='ion ion-cash'></i>
                                        </div>
                                        <a href="{{ url('/admin/reportediarioDetalleGastos/').'/'.$firstday }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Prestado -->
                            <div id='area2' class='col-sm-2 connectedSortable'>
                                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                                    <div class='small-box bg-yellow'>
                                        <div class='inner inner-box' id='1'> 
                                            <h3>
                                                <?php 
                                                    if($prestado[$p]->fecha == $firstday){
                                                        echo $prestado[$p]->valor;
                                                        $prestadoD = $prestado[$p]->valor; 
                                                        $p++;

                                                    }else{echo "00.00";
                                                        $prestadoD = 0;
                                                    }
                                                    
                                                ?>
                                                            
                                            </h3>
                                            <p>PRESTADO    </p>
                                        </div>
                                        <div class='icon'>
                                            <i class='ion ion-cash'></i>
                                        </div>
                                        <a href="{{ url('/admin/reportediarioDetallePrestamos/').'/'.$firstday }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Efectivo -->
                            <div id='area2' class='col-sm-2 connectedSortable'>
                                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                                    <div class='small-box bg-red'>
                                        <div class='inner inner-box' id='1'> 
                                            <h3>
                                                <?php 
                                                
                                                    $efectivo = $recaudadoD - $prestadoD - $gastosD;
                                                    echo $efectivo;
                                                ?>
                                                            
                                            </h3>
                                            <p>EFECTIVO    </p>
                                        </div>
                                        <div class='icon'>
                                            <i class='ion ion-cash'></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Ganado -->
                            <div id='area2' class='col-sm-2 connectedSortable'>
                                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                                    <div class='small-box bg-aqua'>
                                        <div class='inner inner-box' id='1'> 
                                            <h3>
                                                <?php 
                                                    if($ganado[$ga]->fecha == $firstday){
                                                        echo $ganado[$ga]->valor;
                                                        $ga++;

                                                    }else{echo "00.00";}
                                                    
                                                ?>
                                                            
                                            </h3>
                                            <p>GANADO    </p>
                                        </div>
                                        <div class='icon'>
                                            <i class='ion ion-cash'></i>
                                        </div>
                                        <a href="{{ url('/admin/reportediarioDetalleGanados/').'/'.$firstday }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    <?php
                    $firstday = date("Y-m-d",strtotime($firstday." + 1 days"));
                }
            ?>

        </div>  
</div>


@endsection
