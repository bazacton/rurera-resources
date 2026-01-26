@php $rand_no = rand(99,9999); @endphp
<link rel="stylesheet" href="/assets/default/css/panel-pages/dashboard.css?ver={{$rand_no}}">
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
