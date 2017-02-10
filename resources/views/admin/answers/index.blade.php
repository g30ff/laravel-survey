@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.answers.create') }}" class="btn btn-success">New Answer</a>
        </div>
    </div>
    <hr>
    @foreach($answers as $answer)
        <div class="row">
            <div class="col-md-12">
                <p><strong>{{ $answer->answer }}</strong>
                    <a href="{{ route('admin.answers.edit', ['id' => $answer->id]) }}">Edit</a>
                    <a href="{{ route('admin.answers.delete', ['id' => $answer->id]) }}">Delete</a>

                </p>
            </div>
        </div>
    @endforeach

@endsection