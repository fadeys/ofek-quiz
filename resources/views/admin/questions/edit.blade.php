@extends('admin.layouts.master')
@section('content')
    <div class="create-question">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">עריכת שאלה -
                    {{ $question->name }}
                </h3>
            </div>
            <div class="panel-body">
                {!! Form::model($question, ['route' => ['admin.questions.update', $question->id], 'method' => 'PUT']) !!}
                <div class="form-group">
                    <label class="control-label" for="question-name">שם השאלה:</label>
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'question-name']) !!}
                </div>
                <div class="form-group">
                    <label class="control-label" for="question-question">תוכן השאלה:</label>
                    {!! Form::ckeditor('question', null, ['class' => 'form-control', 'id' => 'question-question']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('שמור', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    {!! HTML::script('vendor/ckeditor/ckeditor.js') !!}
@endsection