@php namespace App\Http\Controllers\Web; @endphp
@extends(getTemplate() .'.panel.layouts.panel_layout')
@php
$i = 0; $j = 1;
$rand_id = rand(99,9999);

@endphp

@push('styles_top')
<link rel="stylesheet" href="/assets/default/css/quiz-common.css">

<style>
.field-holder.correct, .form-field.correct, .form-field.correct label {
    background: #d7fbdf !important;
    color: #333;
    border-color: #5ace75;
}
.field-holder.wrong, .form-field.wrong, .form-field.wrong label {
    background: #fae3e5 !important;
    color: #333;
    border-color: #f97d89;
}
</style>
@endpush


@section('content')

    <div class="section-title mb-15">
        <h2 class="font-22 mb-0">Skill Summary</h2>
    </div>
    @include('web.default.panel.quizzes.analytics_questions_log_inner',
    [
    'question'               => $question,
    'attempted_questions_list' => $attempted_questions_list,
    'time_consumed'          => $time_consumed,
    'incorrect_questions' => $incorrect_questions,
    'QuestionsAttemptController' => $QuestionsAttemptController,
    'results_sessions' => $results_sessions,
    'show_topic_performance' => $show_topic_performance,
    'show_graph' => $show_graph,
    'user' => $user,
    ]
    )

@endsection


