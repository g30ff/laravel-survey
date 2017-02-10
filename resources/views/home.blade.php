@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                <h1><strong>Surveys</strong>
                    <a href="{{route('survey.index') }}">Take a survey</a>
                </h1>
            </div>
        </div>
    </div>
</div>
@endsection
