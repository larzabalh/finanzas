@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo De Gasto
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'tipoDeGastos.store']) !!}

                        @include('tipo_de_gastos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
