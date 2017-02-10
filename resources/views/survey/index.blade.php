@extends('layouts.app')

@section('content')
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h3>Choose Survey to Take</h3>
        </div>
    </div>
    <hr>
    @foreach($surveys as $survey)
        <div class="row">
            <div class="col-md-12">
                <p><strong>{{ $survey->survey }}</strong>
                    <a href="{{route('survey.take', ['id' => $survey->id]) }}">Take this one</a>
                </p>
                @foreach($questions as $question)
                    <ul class="list-unstyled">
                        @if($survey->questions->contains($question->id)) <li>{{ $question->question }}</li> @else {{''}} @endif
                    </ul>
                @endforeach
            </div>
        </div>
    @endforeach

@endsection