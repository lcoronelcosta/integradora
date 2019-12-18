@extends("crudbooster::admin_template")
@section("content")
<div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
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
                  url: "{{ url('/admin/reporte') }}",
                  method: 'post',
                  data: {
                     fecha: jQuery('#fecha').val(),
                     fecha2: jQuery('#fecha2').val()
                  },
                  success: function(result){
                     jQuery('.statistic-row').show();
                     jQuery('.statistic-row').html(result.success);
                  }});
               });
            });
    </script>


<script type="text/javascript">
        var lang = 'es';
        $(function () {
            $('.input_date').datepicker({
                format: 'yyyy-mm-dd',
                language: lang
            });

            $('.open-datetimepicker').click(function () {
                $(this).next('.input_date').datepicker('show');
            });

        });

    </script>
<div class="col-sm-12">
    <div class="alert alert-success" style="display:none"></div>
         <form id="myForm">
              <div class="panel panel-primary">
                <div class="panel-heading">REPORTE PERSONALIZADO</div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Fecha Inicio</label>
                              <div class="input-group">
                                            <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span>
                                            <input type="text" title="Fecha" readonly="" required class="form-control notfocus input_date" name="fecha" id="fecha" value="">
                                        </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Fecha Fin</label>
                              <div class="input-group">
                                            <span class="input-group-addon open-datetimepicker"><a><i class="fa fa-calendar "></i></a></span>
                                            <input type="text" title="Fecha" readonly="" required class="form-control notfocus input_date" name="fecha2" id="fecha2" value="">
                                        </div>
                           </div>
                        </div>
                     </div>
                    <button class="btn btn-primary" id="ajaxSubmit">CONSULTAR</button>
                  </div>
               </div>
               </form>
               
               
    <div id="statistic-area">
        <div class="statistic-row row">
        </div>
    </div>     
          
</div>


@endsection