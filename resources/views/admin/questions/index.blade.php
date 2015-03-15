@extends('admin.layouts.master')
@section('content')
    @if (!$questions->isEmpty())
        <p>
            <a href="{{ URL::route('admin.questions.create') }}" class="btn btn-info">צור שאלה חדשה</a>
        </p>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>שם השאלה</th>
                <th>עריכה</th>
                <th>מחיקה</th>
                <th>מס׳ תשובות</th>
                <th>הוספת תשובות</th>
            </tr>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td><a href="{{ URL::route('admin.answers.create', ['questionId' => $question->id]) }}">{{ $question->name }}</a></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ URL::route('admin.questions.edit', ['id' => $question->id]) }}">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.questions.destroy', $question->id], 'class' => 'question-delete-form']) !!}
                            <button type="submit" class="question-delete btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        {!! Form::close() !!}
                    </td>
                    <td>{{ count($question->answers) }}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{ URL::route('admin.answers.create', ['questionId' => $question->id]) }}">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                        </a>
                    </td>
                </tr>
            @endforeach    
        </table>
    @else
        <div class="well">
            <h2>אין שאלות להציג, כדי להתחיל יש ליצור שאלות חדשות</h2>
            <p>
                <a href="{{ URL::route('admin.questions.create') }}" class="btn btn-info">צור שאלה חדשה</a>
            </p>
        </div>
    @endif
@endsection