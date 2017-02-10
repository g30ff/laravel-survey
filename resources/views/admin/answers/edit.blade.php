@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.answers.update') }}" method="post">
                <div class="form-group">
                    <label for="title">Answer</label>
                    <input type="text" class="form-control" id="answer" name="answer" value="{{$answer->answer}}">
                </div>
                <input type="hidden" name="id" value="{{ $answer->id }}">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection