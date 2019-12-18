@extends("crudbooster::admin_template")
@section("content")
<div>

<div class="col-sm-12">
    <div class="alert alert-success" style="display:none"></div>
         <div id="statistic-area">
            <div class="statistic-row row">
              <div id='area1' class='col-sm-2 connectedSortable col-md-offset-1'>
                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                  <div class='small-box bg-green'>
                    <div class='inner inner-box' id='1'> 
                      <h3>{{$recaudado[0]->valor}}</h3>
                      <p>RECAUDADO    </p>
                    </div>
                    <div class='icon'>
                      <i class='ion ion-cash'></i>
                    </div>
                    <a href="{{ url('/admin/semanalDetalleRecaudado/').'/'.$firstday.'/'.$lastday }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
              <div id='area2' class='col-sm-2 connectedSortable'>
                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                    <div class='small-box bg-red'>
                        <div class='inner inner-box' id='1'> 
                            <h3>{{$gastos[0]->valor}}</h3>
                            <p>GASTOS    </p>
                        </div>
                        <div class='icon'>
                            <i class='ion ion-cash'></i>
                        </div>
                        <a href="{{ url('/admin/semanalDetalleGastos/').'/'.$firstday.'/'.$lastday }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div id='area3' class='col-sm-2 connectedSortable'>
                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                    <div class='small-box bg-yellow'>
                        <div class='inner inner-box' id='1'> 
                            <h3>{{$prestado[0]->valor}}</h3>
                            <p>PRESTADO     </p>
                        </div>
                        <div class='icon'>
                            <i class='ion ion-cash'></i>
                        </div>
                        <a href="{{ url('/admin/semanalDetallePrestamos/').'/'.$firstday.'/'.$lastday }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div id='area3' class='col-sm-2 connectedSortable'>
                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                    <div class='small-box bg-red'>
                        <div class='inner inner-box' id='1'> 
                            <h3>{{$recaudado[0]->valor - $prestado[0]->valor - $gastos[0]->valor}}</h3>
                            <p>EFECTIVO     </p>
                        </div>
                        <div class='icon'>
                            <i class='ion ion-cash'></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div id='area4' class='col-sm-2 connectedSortable'>
                <div id='2ed7cb27030cca360ca94fd3caf8255e' class='border-box'>
                    <div class='small-box bg-aqua'>
                        <div class='inner inner-box' id='1'> 
                            <h3>{{$ganado[0]->valor}}</h3>
                            <p>GANADO     </p>
                        </div>
                        <div class='icon'>
                            <i class='ion ion-cash'></i>
                        </div>
                        <a href="{{ url('/admin/semanalDetalleGanados/').'/'.$firstday.'/'.$lastday }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            
            </div>

        </div>  
</div>


@endsection
