@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Nouveau tweet</div>
                {!! Form::open(['url' => 'tweets', 'method' => 'post']) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('auteur', 'Auteur') !!}
                        {!! Form::text('auteur', null, ['class' => 'form-control']) !!}
                        @error('auteur')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('Tags', 'Hashtags') !!}
                        <select class="form-control form-select" multiple="multiple" name="tags[]" id="Tags">
                            @foreach($list_tag as $tag)
                                <option value="{!!$tag->id!!}">{!!$tag->tag!!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! Form::label('message', 'Message') !!}
                        {!! Form::textarea('message', null, ['class' => 'form-control', 'aria-label' =>'With textarea']) !!}
                        @error('message')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    {!! Form::submit('Tweeter', ['class'=>'btn btn-success btn-md']); !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
