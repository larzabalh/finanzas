@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ingreso Mensual
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ingresoMensual, ['route' => ['ingresoMensuals.update', $ingresoMensual->id], 'method' => 'patch']) !!}

                        @include('ingreso_mensuals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection