@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.questions.create') }}" class="btn btn-success">New Question</a>
        </div>
    </div>
    <hr>
    @foreach($questions as $question)
        <div class="row">
            <div class="col-md-12">
                <p><strong>{{ $question->question }}</strong>
                    <a href="{{ route('admin.questions.edit', ['id' => $question->id]) }}">Edit</a>
                    <a href="{{ route('admin.questions.delete', ['id' => $question->id]) }}">Delete</a>

                </p>
                @foreach($answers as $answer)
                    <ul class="list-unstyled">
                        @if($question->answers->contains($answer->id)) <li>{{ $answer->answer }}</li> @else {{''}} @endif
                    </ul>
                @endforeach
            </div>
        </div>
    @endforeach

@endsection