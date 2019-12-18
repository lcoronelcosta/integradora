@extends("crudbooster::admin_template")
@section("content")
<?php $i=0; ?>
<div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/admin/refinancear') }}",
                  method: 'post',
                  data: {
                     id: jQuery('#id').text(),
                     totalt: jQuery('#totalt').text()
                  },
                  success: function(result){
                     
                  }});
               });
            });
    </script>

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class="fa fa-money"></i> 1</strong>
            </div>

            <div class="panel-body" style="padding:20px 0px 0px 0px">
            {!! Form::open(['route' => 'refinancear']) !!}
                <input type="hidden" name="id"  id="id" value="{{$row->id}}">
                <div class="box-body" id="parent-form-area">
                    <div class="table-responsive">
                        <table id="table-detail" class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Codigo</td>
                                    <td>{{$row->codigo}}</td>
                                </tr>
                                <tr>
                                    <td>Cliente</td>
                                    <td>{{$row->nombres}}</td>
                                </tr>
                                <tr>
                                    <td>Tasa Interes</td> 
                                    <td>{{$row->interes}}%</td>
                                </tr>
                                <tr>
                                    <td>Interes del Prestamo</td> 
                                    <?php
                                        $tasa = (int)$row->interes;
                                        $int = ($tasa/100)*$row->monto;
                                    ?>
                                    <td>${{$int}}</td>
                                </tr>
                                <tr>
                                    <td>Dias Atrasados</td> 
                                    <?php
                                        
                                        $fecha_actual = new DateTime("now");
                                        $fecha_pres = new DateTime($row->fecha_fin);
                                        $diff = $fecha_pres->diff($fecha_actual);
                                    ?>
                                    <td>{{$diff->days}}</td>
                                </tr>
                                <tr>
                                    <td>Total Atrasado</td>  
                                    <?php
                                        $int = $int/30;
                                        $totalt = round(($int*$diff->days),2);
                                    ?>
                                    <input type="hidden" name="totalt"  id="totalt" value="{{$totalt}}">
                                    <td name ="totalt">${{$totalt}}</td>
                                </tr>
                                <tr>
                                    <td>Forma Pago</td>
                                    <td>{{$row->pago}}</td>
                                </tr>
                                <tr>
                                    <td>Fecha</td>
                                    <td>{{$row->fecha}}</td>
                                </tr>
                                <tr>
                                    <td>Fecha Fin</td>
                                    <td>{{$row->fecha_fin}}</td>
                                </tr>
                                <tr>
                                    <td>Monto</td>
                                    <td>{{$row->monto}}</td>
                                </tr>
                                <tr>
                                    <td>Num Pagos</td>
                                    <td>{{$row->num_pagos}}</td>
                                </tr>
                                <tr>
                                    <td>Total a Pagar</td>
                                    <td>{{$row->total_pagar}}</td>
                                </tr>
                                <tr>
                                    <td>Saldo</td>
                                    <td>{{$row->saldo}}</td>
                                </tr>
                                <tr>
                                    <td>Saldo con Atraso</td>
                                    <?php
                                        $total = round((($int*$diff->days)+$row->saldo),2);
                                    ?>
                                    <td>${{$total}}</td>
                                </tr>
                                 <tr>
                                    <td>Estado</td>
                                    <td>{{$row->estado}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                                            
                </div><!-- /.box-body -->

                <div class="box-footer" style="background: #F5F5F5">

                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                               <button type="submit" class="btn btn-primary">REFINANCEAR</button>
                            </div>
                        </div>


                    </div>

            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection



   
    
