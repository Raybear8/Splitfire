@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {!! Form::open(['url' => 'generation', 'method' => 'post']) !!}
            {!! Form::submit('Génération des données tweets exemples (2000)', ['class'=>'btn btn-success btn-md']); !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
