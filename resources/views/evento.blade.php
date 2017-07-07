@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <evento :id_evento="{{ $evento }}"></evento>
    </div>
</div>
@endsection
