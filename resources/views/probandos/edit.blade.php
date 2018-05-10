@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Probando
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($probando, ['route' => ['probandos.update', $probando->id], 'method' => 'patch']) !!}

                        @include('probandos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection