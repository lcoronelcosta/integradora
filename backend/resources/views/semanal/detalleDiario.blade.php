@extends("crudbooster::admin_template")
@section("content")
 <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Recaudado {{$fecha1}}  -  {{$fecha2}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Cliente</th>
                  <th>Prestamo</th>
                  <th>Fecha</th>
                  <th>Abono</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <?php
                 $cont=1;
                 $total = 0;
                 foreach($recaudados as $recaudado){
                     $total += $recaudado->abono;
                     ?>
                     <tr>
                      <td>{{$cont}}</td>
                      <td>{{$recaudado->nombres}}</td>
                      <td>{{$recaudado->codigo}}</td>
                      <td>{{$recaudado->fecha}}</td>
                      <td>{{$recaudado->abono}}</td>
                      
                      <td><span class="badge bg-green">Abonado</span></td>
                    </tr>
                     <?php
                     $cont++;
                 }
                ?>
                <tr>
                  <th colspan="4">TOTAL</th>
                  <th><h4>$ {{$total}}</h4></th>
                  <td><span class="badge bg-red">SUMARIZADO</span></td>
                </tr>
                
                
              </tbody></table>
            </div>
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col -->
        
      </div>
@endsection



   
    
