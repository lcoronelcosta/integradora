@extends("crudbooster::admin_template")
@section("content")
 <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Gastos {{$fecha}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Tipo de Gastos</th>
                  <th>Valor</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <?php
                 $cont=1;
                 $total = 0;
                 foreach($gastos as $gasto){
                     $total += $gasto->valor;
                     ?>
                     <tr>
                      <td>{{$cont}}</td>
                      <td>{{$gasto->nombre}}</td>
                      <td>{{$gasto->valor}}</td>
                      
                      <td><span class="badge bg-green">Gasto</span></td>
                    </tr>
                     <?php
                     $cont++;
                 }
                ?>
                <tr>
                  <th colspan="2">TOTAL</th>
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



   
    
