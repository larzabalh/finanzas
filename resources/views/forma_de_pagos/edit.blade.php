@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Forma De Pago
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($formaDePago, ['route' => ['formaDePagos.update', $formaDePago->id], 'method' => 'patch']) !!}

                        @include('forma_de_pagos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection