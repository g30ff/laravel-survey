@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.questions.update') }}" method="post">
                <div class="form-group">
                    <label for="title">Question</label>
                    <input type="text" class="form-control" id="title" name="question" value="{{$question->question}}">
                </div>
                @foreach($answers as $answer)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="answers[]" value="{{ $answer->id }}" {{
                            $question->answers->contains($answer->id) ? 'checked' : '' }}>{{ $answer->answer }}
                        </label>
                    </div>
                @endforeach
                <input type="hidden" name="id" value="{{ $question->id }}">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection