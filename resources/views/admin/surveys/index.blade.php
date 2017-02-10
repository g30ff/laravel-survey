@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.surveys.create') }}" class="btn btn-success">New Survey</a>
        </div>
    </div>
    <hr>
    @foreach($surveys as $survey)
        <div class="row">
            <div class="col-md-12">
                <p><strong>{{ $survey->survey }}</strong>
                    <a href="{{route('admin.surveys.edit', ['id' => $survey->id]) }}">Edit</a>
                    <a href="{{route('admin.surveys.delete', ['id' => $survey->id]) }}">Delete</a>
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