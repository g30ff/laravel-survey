@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.answers.create') }}" method="post">
                <div class="form-group">
                    <label for="title">Answer</label>
                    <input type="text" class="form-control" id="answer" name="answer">
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection