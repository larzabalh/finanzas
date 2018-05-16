@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Facturador
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($facturador, ['route' => ['facturadors.update', $facturador->id], 'method' => 'patch']) !!}

                        @include('facturadors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection