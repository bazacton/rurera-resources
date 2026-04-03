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
        <h2 class="font-22 mb-0">{{$userAssignedTopicObj->StudentAssignmentData->title}} - Summary</h2>
    </div>

    <div class="container mt-4">

        <!-- Tabs Nav -->
        <ul class="nav nav-pills" id="myTab" role="tablist">
            @if($topicAssignmentResults->count() > 0)
                @php $attempt_counter = 1; @endphp
                @foreach($topicAssignmentResults as $topicAssignmentResultObj)
                    <li class="nav-item" role="presentation">
                        <a href="/analytics/set_work/{{$student_assignment_id}}/{{$topic_assignment_id}}:session={{$topicAssignmentResultObj->id}}" class="nav-link {{($active_result_id == $topicAssignmentResultObj->id)? 'active' : ''}}" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button">
                            Attempt {{$attempt_counter}}
                        </a>
                    </li>
                    @php $attempt_counter++; @endphp
                @endforeach
            @endif

        </ul>

        <!-- Tabs Content -->
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home">
                @include('web.default.panel.quizzes.analytics_questions_log_inner',
                    [
                    'question'               => 0,
                    'attempted_questions_list' => $attempted_questions_list,
                    'time_consumed'          => $time_consumed,
                    'incorrect_questions' => $incorrect_questions,
                    'QuestionsAttemptController' => $QuestionsAttemptController,
                    'results_sessions' => $results_sessions,
                    'show_topic_performance' => 0,
                    'show_graph' => 0,
                    'user' => $user,
                    ]
                    )
            </div>


        </div>

    </div>



@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


