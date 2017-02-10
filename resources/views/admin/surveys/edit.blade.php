@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.surveys.update') }}" method="post">
                <div class="form-group">
                    <label for="title">Question</label>
                    <input type="text" class="form-control" id="title" name="survey" value="{{$survey->survey}}">
                </div>
                @foreach($questions as $question)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="questions[]" value="{{ $question->id }}" {{
                            $survey->questions->contains($question->id) ? 'checked' : '' }}>{{ $question->question }}
                        </label>
                    </div>
                @endforeach
                <input type="hidden" name="id" value="{{ $survey->id }}">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection