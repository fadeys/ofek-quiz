<div class="answer-controls pull-left">
    <a class="btn btn-info btn-sm" href="{{ URL::route('admin.answers.edit', ['id' => $answer->id]) }}">
        <span class="glyphicon glyphicon-edit"></span>
    </a>
    {!! Form::open(['route' => ['admin.answers.destroy', $answer->id], 'method' => 'DELETE', 'class' => 'answer-delete-form']) !!}
        <button type="submit" class="answer-delete-button btn btn-danger btn-sm">
            <span class="glyphicon glyphicon-remove-circle"></span>
        </button>
    {!! Form::close() !!}
</div>