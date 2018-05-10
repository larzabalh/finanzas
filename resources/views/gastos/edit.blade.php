@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Gasto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($gasto, ['route' => ['gastos.update', $gasto->id], 'method' => 'patch']) !!}

                        @include('gastos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection