@extends('web.default.layouts.appstart',['appFooter' => false, 'appHeader' => false])
@php
$rand_id = rand(99,9999);
@endphp
<link rel="stylesheet" href="/assets/default/css/panel.css?var={{$rand_id}}">
<link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
@push('styles_top')


<style>
    .dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate{display:none !important;}
	
	.difficulty_level_tr td {
		background: #ffd3d3;
	}
	tr.is_analyzer td {
		background: #b8ced7;
	}
</style>
@endpush
@section('content')

<div class="learning-page type-sats" >


    <div class="d-flex position-relative">


        <div class="learning-page-content flex-grow-1 bg-info-light p-15">
		

                <section class="lms-data-table my-80">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3>Log For "{{$quiz->TopicPartsItem->title}}" -- {{auth()->user()->id}}</h3>
                                <table class="table table-striped table-bordered dataTable display responsive" style="width: 100%;"
                                       aria-describedby="example_info">
                                    <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Attempt #
                                        </th>
										<th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Practice Questions
                                        </th>
										<th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Attempted Questions
                                        </th>
										 <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Incorrect
                                        </th>
										 <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Correct
                                        </th>
										 <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Accuracy
                                        </th>
										 <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Completion Performance
                                        </th>
										 <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Analyzer Counter
                                        </th>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Date
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
									@if($quiz->UserPerformances->where('user_id', auth()->user()->id)->count() > 0)
										@foreach($quiz->UserPerformances->where('user_id', auth()->user()->id) as $UserPerformanceObj)
											@php 
											$completion_performance = $UserPerformanceObj->completion_performance;
											$completion_performance = ($completion_performance > 100)? 100 : $completion_performance; 
											$completion_performance = ($completion_performance < 0)? 0 : $completion_performance; 
											@endphp
											@php $completion_performance = ($UserPerformanceObj->completion_performance > 100)? 100 : $UserPerformanceObj->completion_performance; @endphp
											<tr class="odd difficulty_level_tr" data-user_id="{{auth()->user()->id}}" data-performance_user_id="{{$UserPerformanceObj->user_id}}">
												<td>{{$UserPerformanceObj->difficulty_level}}</td>
												<td>{{$UserPerformanceObj->part_practice_questions}}</td>
												<td>{{$UserPerformanceObj->attempted_questions}}</td>
												<td>{{$UserPerformanceObj->incorrect_questions}}</td>
												<td>{{$UserPerformanceObj->correct_questions}}</td>
												<td>{{$UserPerformanceObj->accuracy}}%</td>
												<td>{{$completion_performance}}%</td>
												<td>{{$UserPerformanceObj->analyze_counter}}</td>
												<td>{{dateTimeFormat($UserPerformanceObj->updated_at, 'j M y | H:i')}}</td>
											</tr>
											@if($UserPerformanceObj->UserPerformanceLog->count() > 0)
												@php $attempt_counter = 1; @endphp
												@foreach($UserPerformanceObj->UserPerformanceLog as $PerformanceLogObj)
													@php $analyzer_class = ($PerformanceLogObj->type == 'analyzer')? 'is_analyzer' : ''; ; @endphp
													@php 
													$log_completion_performance = $PerformanceLogObj->completion_performance;
													$log_completion_performance = ($log_completion_performance > 100)? 100 : $log_completion_performance; 
													$log_completion_performance = ($log_completion_performance < 0)? 0 : $log_completion_performance; 
													@endphp
													<tr class="odd {{$analyzer_class}}">
														<td>{{$attempt_counter}}</td>
														<td>-</td>
														<td>{{$PerformanceLogObj->attempted_questions}}</td>
														<td>{{$PerformanceLogObj->incorrect_questions}}</td>
														<td>{{$PerformanceLogObj->correct_questions}}</td>
														<td>{{$PerformanceLogObj->accuracy}}%</td>
														<td>{{$log_completion_performance}}%</td>
														<td>-</td>
														<td>{{dateTimeFormat($PerformanceLogObj->updated_at, 'j M y | H:i')}}</td>
													</tr>
													@php $attempt_counter++; @endphp
												@endforeach
											@endif
										@endforeach
									@endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
    </div>
</div>

@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/video/video.min.js"></script>
<script src="/assets/default/vendors/video/youtube.min.js"></script>
<script src="/assets/default/vendors/video/vimeo.js"></script>


<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs"
        data-app-key="v5gxvm7qj1ku9la"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script src="/assets/default/js/parts/video_player_helpers.min.js"></script>

@endpush