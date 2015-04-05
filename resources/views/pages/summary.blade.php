@extends('layouts.master')
@section('content')
    <div class="well light-box">
        <h1>תוצאות הבוחן</h1>
        <div class="stats">
            <div>
                <strong>מס׳ שאלות: </strong>
                <span>{!! $stats['numberOfQuestions'] !!}</span>
            </div>
           <div>
               <strong>מתוכן ענית נכון על: </strong>
               <span>{!! $stats['numberOfCorrectAnswers'] !!}</span>
           </div>

            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{!! $stats['percentage'] !!}" aria-valuemin="0" aria-valuemax="{!! $stats['percentage'] !!}" style="width:{!! $stats['percentage'] !!}%;"></div>
            </div>
        </div>
        <div class="summary-of-results">
            @foreach($results as $result)
                @if($result['result'])
                    @include('partials.summary.correct', ['result' => $result])
                @else
                    @include('partials.summary.wrong', ['result' => $result])
                @endif
            @endforeach
        </div>

    </div>

@endsection