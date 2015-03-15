@extends('admin.layouts.master')
@section('content')
    <div class="question-display">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">השאלה -
                    {{ $question->name }}
                </h3>
            </div>
            <div class="panel-body">
                <div class="question-wrapper">
                    {!! $question->question !!}
                </div>
                <div class="answers-list">
                    @if(!$question->answers->isEmpty())
                        <h4>תשובות:</h4>
                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                                @if($answer->correct)
                                    <li class="list-group-item list-group-item-success">
                                        {{ $answer->answer }}
                                        @include('admin.partials.answerControls', ['answer' => $answer])
                                    </li>
                                @else
                                    <li class="list-group-item list-group-item-danger">
                                        {{ $answer->answer }}
                                        @include('admin.partials.answerControls', ['answer' => $answer])
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="answer-create-form">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">צור תשובה נכונה</div>
                    <div class="panel-body">
                        @if (!$question->hasCorrectAnswer())
                            {!! Form::open(['route' => 'admin.answers.store', 'method' => 'POST']) !!}
                            {!! Form::hidden('question_id', $question->id) !!}
                            {!! Form::hidden('correct', '1') !!}
                            <div class="form-group">
                                <label class="control-label" for="answer-name">שם התשובה הנכונה: (לא חובה)</label>
                                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'answer-name']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="answer-answer">התשובה הנכונה:</label>
                                {!! Form::textarea('answer', null, ['class' => 'form-control', 'id' => 'answer-answer']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="answer-explanation">הסבר על התשובה הנכונה:</label>
                                {!! Form::ckeditor('explanation', null, ['class' => 'form-control', 'id' => 'answer-explanation']) !!}
                            </div>
                            {!! Form::submit('צור תשובה נכונה', ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}
                        @else
                            <h4>קיימת תשובה נכונה לשאלה זו</h4>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">צור תשובה לא נכונה</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.answers.store', 'method' => 'POST']) !!}
                        {!! Form::hidden('question_id', $question->id) !!}
                        {!! Form::hidden('correct', '0') !!}
                        <div class="form-group">
                            <label class="control-label" for="wrong-answer-name">שם התשובה הלא נכונה (לא חובה):</label>
                            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'wrong-answer-name']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="wrong-answer-answer">התשובה הלא נכונה</label>
                            {!! Form::textarea('answer', null, ['class' => 'form-control', 'id' => 'wrong-answer-answer']) !!}
                        </div>
                        {!! Form::submit('צור תשובה לא נכונה', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection