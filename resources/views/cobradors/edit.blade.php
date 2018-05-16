@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cobrador
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cobrador, ['route' => ['cobradors.update', $cobrador->id], 'method' => 'patch']) !!}

                        @include('cobradors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection