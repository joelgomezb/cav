@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
          @foreach($eventos as $evento)
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
              <div class="thumbnail">
                <a href="/evento/{{ $evento->id }}"><img src="http://lorempixel.com/200/300" /></a>
                <p style="margin-top: 10px; margin-left: 10px;">{{ $evento->nombre }}</p>
                <p style="margin-left: 10px;">Cupos Máximo: {{ $evento->capacidad }}</p>
                <p style="margin-left: 10px;">Fecha Inicio:{{ Carbon\Carbon::parse($evento->fecha_inicio)->format('d-m-Y H:i') }}</p>
            </div>
          </div>
          @endforeach
        </div>
    </div>
</div>
@endsection
