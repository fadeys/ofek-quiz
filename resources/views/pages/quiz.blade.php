@extends('layouts.master')
@section('content')
<!--   Big container   -->
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">
                {!! Form::open() !!}
                <div class="card wizard-card ct-wizard-azzure" id="wizard">

                    <!--        You can switch "ct-wizard-azzure"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->

                    <div class="wizard-header">
                        <h3>
                            אופק מתא״ם - בחן את עצמך<br>
                            <small>כאן תוכל לבדוק היכן אתה עומד וכיצד נוכל לשפר אותך.</small>
                        </h3>
                    </div>
                    <ul>
                        @foreach ($questions as $question)
                            <li><a href="#{{ $question->name .'-'. $question->id }}" data-toggle="tab">{{ $question->name }}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($questions as $question)
                            @include('partials.question', ['question' => $question, 'answers' => $question->getScrambledAnswers()])
                        @endforeach
                    </div>
                    <div class="wizard-footer">
                        <div class="pull-right">
                            <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' />
                            <input type='button' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' name='finish' value='Finish' />

                        </div>
                        <div class="pull-left">
                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div> <!-- wizard container -->
        </div>
    </div> <!-- row -->
</div> <!--  big container -->
@endsection