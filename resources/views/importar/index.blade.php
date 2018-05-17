@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">IMPORTAR</h1>
    </section>
    <div class="content">
          <div class="clearfix"></div>

        @include('flash::message')

          <div class="clearfix"></div>
            <div class="box box-primary">
              <div class="box-body">
                @include('importar.fields')
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
  @include('importar.scripts')
@endsection