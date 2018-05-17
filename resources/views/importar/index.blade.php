@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">IMPORTAR</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('gastos.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
          <div class="clearfix"></div>

        @include('flash::message')

          <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                 
              <input type="text" id="route-importar-egresos" name="no-use" value="{{ route('importar.egresos') }}">
              <input type="text" id="route-importar-gastos" name="no-use" value="{{ route('importar.gastos') }}">
              <input type="text" id="route-importar-bancos" name="no-use" value="{{ route('importar.bancos') }}">
              <input type="text" id="route-importar-clientes" name="no-use" value="{{ route('importar.clientes') }}">
              <div class="table-responsive"><br/>
                <div class="row">
                  <div class="col-lg-12">
                    <form name="" id="formulario" method="POST" class="formarchivo" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
                        {{ csrf_field() }}
                        <div class="col-lg-6">
                            <label>IMPORTAR:</label><br>
                            <select class="form-control" id="importar">
                              <option selected></option>
                              <option value='CLIENTES'>CLIENTES</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-2 col-md-3 col-sm-3 col-xs-12">
                          <input type="file" id="archivo" name="archivo" required>
                          <button type="submit" class="btn btn-primary">Cargar Datos</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection


@section('scripts')

<script>
  
  $(document).on("submit",".formarchivo",function(e){

        e.preventDefault();
        var formu=$(this);
        var nombreform=$(this).attr("id");
        var importar = $('#importar').val();
        if(importar=="EGRESOS"){ var url = $("#route-importar-egresos").val().trim(); }
        if(importar=="GASTOS"){ var url = $("#route-importar-gastos").val().trim(); }
        if(importar=="BANCOS"){ var url = $("#route-importar-bancos").val().trim(); }
        if(importar=="CLIENTES"){ var url = $("#route-importar-clientes").val().trim(); }
        
        //información del formulario
        var formData = new FormData($("#"+nombreform+"")[0]);
        console.log(formData)
        console.log(importar)
        //hacemos la petición ajax   
        $.ajax({
            url: url,  
            type: 'POST',
     
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $('#alert_message').html('<center><img src="/cargando.gif" width="50" heigh="50"></center>');   
            },
            //una vez finalizado correctamente
            success: function(data){
              console.log('success ajax DATA:', data);      
            },
            //si ha ocurrido un error
            error: function(data){
               $('#alert_message').html('ERROR'); 
                
            }
        });
        });
</script>

@endsection