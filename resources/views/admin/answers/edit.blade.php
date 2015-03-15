@extends('admin.layouts.master')
@section('content')
    <div class="question-display">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">השאלה -
                    {{ $answer->question->name }}
                </h3>
            </div>
            <div class="panel-body">
                <div class="question-wrapper">
                    {!! $answer->question->question !!}
                </div>
            </div>
        </div>
    </div>
    <div class="answer-create-form">
        <div class="row">
            <div class="col-md-12">
                @if ($answer->correct)
                <div class="panel panel-success">
                    <div class="panel-heading">עריכת תשובה (נכונה):</div>
                @else
                <div class="panel panel-danger">
                   <div class="panel-heading">עריכת תשובה (לא נכונה):</div>
                @endif
                    <div class="panel-body">
                        {!! Form::model($answer, ['route' => ['admin.answers.update', $answer->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label class="control-label" for="answer-name">שם התשובה: (לא חובה)</label>
                            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'answer-name']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="answer-answer">התשובה:</label>
                            {!! Form::textarea('answer', null, ['class' => 'form-control', 'id' => 'answer-answer']) !!}
                        </div>
                        @if ($answer->correct)
                            <div class="form-group">
                                <label class="control-label" for="answer-explanation">הסבר על התשובה:</label>
                                {!! Form::ckeditor('explanation', null, ['class' => 'form-control', 'id' => 'answer-explanation']) !!}
                            </div>
                        @endif
                        {!! Form::submit('עדכן תשובה', ['class' => 'btn btn-info']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection