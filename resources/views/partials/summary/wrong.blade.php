<div class="summary-result-wrapper wrong">
    <h3>{!! $result['question']->name !!}
        {!! $result['question']->question !!}
    </h3>
    <div class="summary-result">טעית בשאלה זו</div>
    <div class="summary-result wrong-answer">
        <strong>התשובה שענית:</strong>
        {!! $result['falseAnswer']->answer !!}
    </div>
    <div class="summary-result true-answer">
        <strong>התשובה הנכונה:</strong>
        {!! $result['trueAnswer']->answer !!}
    </div>
    <div class="summary-result answer-explanation">
        <strong>הסבר על התשובה:</strong>
        {!! $result['trueAnswer']->explanation !!}
    </div>
</div>