@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-2 col-xs-12">
        <div class="well well-side-menu clearfix">
            <div class="clearfix">
                <ul class="nav navbar-nav side-menu">
                    @foreach($questions as $question)
                        <li class="menu-category-item">
                            <a href="javascript:void(0);">{!! $question->name !!}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-8 col-xs-12">
        <div class="well light-box">
            <div class="row">
                {!! Form::open(['route' => 'quiz.store', 'id' => 'quiz-form']) !!}
                    <div class="col-md-12">
                        <h1>בחן את עצמך</h1>
                        @foreach ($questions as $question)
                            @include('partials.question', ['question' => $question, 'answers' => $question->getScrambledAnswers()])
                        @endforeach
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-info btn-block">שאלה הקודמת</button>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3">
                        <button type="button" class="btn btn-info btn-block">שאלה הבאה</button>
                    </div>
                    <div class="col-sm-3">
                        {!! Form::submit('סיום', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>

//    (function($) {
//        $("#quiz-form").steps({
//            headerTag: "h3",
//            bodyTag: "section",
//            transitionEffect: "slideLeft",
//            stepsOrientation: "vertical",
//            showFinishButtonAlways: true,
//            onFinished: function() {
//              $('form').submit();
//            },
//            labels: {
//                cancel: "בטל",
//                current: "השלב הנוכחי:",
//                pagination: "דפדוף",
//                finish: "סיים",
//                next: "הבא",
//                previous: "הקודם",
//                loading: "טוען ..."
//            }
//        });
//    })(jQuery);
//(function($) {
//    $('#quiz-form').easyWizard({
//        showSteps: false
//    });
//})(jQuery);

</script>
@endsection