<h3>שאלה #{{ $question->id }}</h3>
<section>
    <h4 class="info-text">{!! $question->question !!}</h4>
    <div class="answers">
        @foreach ($answers as $answer)
            <div class="radio">
                <label>
                    <input type="radio" name="question-{{ $question->id }}" id="question-{{ $question->id }}" value="{{ $answer->id }}">
                    {!! $answer->answer !!}
                </label>
            </div>
        @endforeach
    </div>
</section>