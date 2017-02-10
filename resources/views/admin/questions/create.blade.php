@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.questions.create') }}" method="post">
                <div class="form-group">
                    <label for="title">Question</label>
                    <input type="text" class="form-control" id="question" name="question">
                </div>
                @foreach($answers as $answer)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="answers[]" value="{{ $answer->id }}">{{ $answer->answer }}
                        </label>
                    </div>
                @endforeach
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection