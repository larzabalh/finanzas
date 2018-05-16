@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Liquidador
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($liquidador, ['route' => ['liquidadors.update', $liquidador->id], 'method' => 'patch']) !!}

                        @include('liquidadors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection