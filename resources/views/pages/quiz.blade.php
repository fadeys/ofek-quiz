@extends('layouts.master')
@section('content')
<!--   Big container   -->
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">


            {!! Form::open(['route' => 'quiz.store']) !!}
                <div id="quiz-form">
                    @foreach ($questions as $question)
                        @include('partials.question', ['question' => $question, 'answers' => $question->getScrambledAnswers()])
                    @endforeach
                </div>

            {!! Form::close() !!}
        </div>
    </div> <!-- row -->
</div> <!--  big container -->
<script>

    (function($) {
        $("#quiz-form").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical",
            showFinishButtonAlways: true,
            onFinished: function() {
              $('form').submit();
            },
            labels: {
                cancel: "בטל",
                current: "השלב הנוכחי:",
                pagination: "דפדוף",
                finish: "סיים",
                next: "הבא",
                previous: "הקודם",
                loading: "טוען ..."
            }
        });
    })(jQuery);


</script>
@endsection