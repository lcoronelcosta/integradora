@extends("crudbooster::admin_template")
@section("content")
 <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ganado {{$fecha}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Cliente</th>
                  <th>Monto</th>
                  <th>Ganancia</th>
                  <th>Label</th>
                </tr>
                <?php
                 $cont=1;
                 $total = 0;
                 foreach($ganados as $ganado){
                     $total += $ganado->total_pagar - $ganado->monto;
                     ?>
                     <tr>
                      <td>{{$cont}}</td>
                      <td>{{$ganado->nombres}}</td>
                      <td>{{$ganado->monto}}</td>
                      <td>{{$ganado->total_pagar - $ganado->monto}}</td>
                      
                      <td><span class="badge bg-green">Ganancia</span></td>
                    </tr>
                     <?php
                     $cont++;
                 }
                ?>
                <tr>
                  <th colspan="3">TOTAL</th>
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