@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $survey_name }}</h1>
            <form action="{{ route('survey.create') }}" method="post">
                <input type="hidden" name="user_id" id="user_id" value="{{ $userID }}">
                <input type="hidden" name="survey_id" id="survey_id" value="{{ $survey_id }}">
                <div class="form-group">

                    @for($i=0; $i < count($surveys); $i++)

                        @foreach($surveys[$i]['questions'] as $question_key =>$question_value)
                            <input type="hidden" id="{{$question_key}}" name="question{{ $question_key }}" value="{{$question_value}}">
                            <label for="question{{$question_key}}"> {!!  $question_value !!}</label>

                            @foreach($surveys[$i]['answers'][$question_key] as $answer_key =>$answer_value)
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="question[{{ $question_key }}]" value="{{ $answer_key }}" required>{{ $answer_value }}
                                    </label>
                                </div>

                            @endforeach

                        @endforeach

                    @endfor
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection