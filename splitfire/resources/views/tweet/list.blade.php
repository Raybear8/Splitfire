@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {!! Form::open(['url' => 'tweets', 'method' => 'get']) !!}
            <div class="row">
                <div class="col ">
                    <h3>Critères de recherche :</h3>
                </div>
                <div class="col form-group">
                    {!! Form::label('auteur', 'Auteur') !!}
                    {!! Form::text('auteur', $input_auteur, ['class' => 'form-control']) !!}

                </div>
                <div class="col form-group">
                    {!! Form::label('Tag', '#HashTag') !!}
                    <select class="form-control form-select" name="tag" id="Tag">
                        <option value=0>Tous les hashtags</option>
                        @foreach($list_tag as $tag_case)
                            <option value="{!!$tag_case->id!!}">{!!$tag_case->tag!!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col form-group">
                    {!! Form::label('count', 'Tweets par pages') !!}
                    {!! Form::text('count', $input_count, ['class' => 'form-control btn-sm']) !!}

                </div>
                {!! Form::submit('Rechercher', ['class'=>'btn btn-success']); !!}
            </div>
            {!! Form::close() !!}

            <div class="table-responsive">
                <p>&nbsp;</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Message</th>
                        <th>Tags</th>
                        <th>Date de création</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_tweet as $tweet)

                        <tr>
                            <td>{!! $tweet->auteur !!}</td>
                            <td>{!! $tweet->message !!}</td>
                            <td>
                                @foreach($tweet->tags as $tag)
                                    {!! $tag->tag !!}
                                @endforeach
                            </td>
                            <td>{!! $tweet->created_at !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            {{ $list_tweet->links() }}
        </div>
    </div>
    <style>
        .w-5{
            display: none;
        }
    </style>
@endsection
