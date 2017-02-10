@extends('layouts.app')


@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.surveys.create') }}" method="post">
                <div class="form-group">
                    <label for="title">Surveys</label>
                    <input type="text" class="form-control" id="survey" name="survey">
                    <input type="hidden" id="user_id" name="user_id" value="{{$userID}}">
                </div>
                @foreach($questions as $question)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="questions[]" value="{{ $question->id }}">{{ $question->question }}
                        </label>
                    </div>
                @endforeach
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
