@php use App\Models\QuizzesQuestion; @endphp
@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')

<section class="section">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="progress-wrapper mb-30">
				<div class="section-header pb-0">
					<h1 class="mb-0">Import Questions</h1>
					<div class="section-header-breadcrumb mt-10 hide-for-mobile">
						<div class="breadcrumb-item">{{$QuestionsBulkListObj->category->getTitleAttribute()}}</div>
						<div class="breadcrumb-item">{{$QuestionsBulkListObj->subject->getTitleAttribute()}}</div>
						<div class="breadcrumb-item">{{$QuestionsBulkListObj->chapter->title}}</div>
						<div class="breadcrumb-item active">{{$QuestionsBulkListObj->subChapter->sub_chapter_title}}</div>
					</div>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
						</div>
						<div class="breadcrumb-item">Import Questions</div>
					</div>
				</div>
				<div class="progress-holder">
					<div class="progress-box">
						<div class="circle_percent" data-percent="35">
							<div class="circle_inner">
								<div class="round_per"></div>
							</div>
						</div>
						<span class="progress-lable">Emerging</span>
					</div>
					<div class="progress-box">
						<div class="circle_percent circle-orange" data-percent="50">
							<div class="circle_inner">
								<div class="round_per"></div>
							</div>
						</div>
						<span class="progress-lable">Expected</span>
					</div>
					<div class="progress-box">
						<div class="circle_percent circle-yellow" data-percent="70">
							<div class="circle_inner">
								<div class="round_per"></div>
							</div>
						</div>
						<span class="progress-lable">Exceeding</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-body px-0 pt-0">
				
					

	
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					
				</div>
				
				<div class="col-md-12 col-lg-12">
						<pre class="prompt-text"></pre>
						
						<div id="accordion" class="topic-parts-data">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="topic-heading-top">
											<th class="font-14">&nbsp;</th>
											<th class="warning font-14">&nbsp;</th>
											@if(!empty($difficulty_levels))
												@foreach($difficulty_levels as $difficulty_level)
													@php $difficulty_level_class = '';
													$difficulty_level_class = ($difficulty_level == 'Emerging')? 'table-col-red' : $difficulty_level_class;
													$difficulty_level_class = ($difficulty_level == 'Expected')? 'table-col-orange' : $difficulty_level_class;
													$difficulty_level_class = ($difficulty_level == 'Exceeding')? 'table-col-yellow' : $difficulty_level_class;
													@endphp
													<th colspan="3" class="{{$difficulty_level_class}}">{{$difficulty_level}}</th>
												@endforeach
											@endif
											<th class="font-14">&nbsp;</th>
											<th class="font-14">&nbsp;</th>
											<th class="font-14">&nbsp;</th>
										</tr>
										<tr>
											<th>Topic Part Item</th>
											<th>Created Date</th>
											@if(!empty($difficulty_levels))
												@foreach($difficulty_levels as $difficulty_level)
													@php $difficulty_level_class = '';
														$difficulty_level_class = ($difficulty_level == 'Emerging')? 'table-col-red' : $difficulty_level_class;
														$difficulty_level_class = ($difficulty_level == 'Expected')? 'table-col-orange' : $difficulty_level_class;
														$difficulty_level_class = ($difficulty_level == 'Exceeding')? 'table-col-yellow' : $difficulty_level_class;
													@endphp
													<th class="{{$difficulty_level_class}}">Expected</th>
													<th class="{{$difficulty_level_class}}">Total</th>
													<th class="{{$difficulty_level_class}}">Pending</th>
												@endforeach
											@endif
											<th>Total Pending Questions</th>
											<th>Total unreviewed Questions</th>
											<th>Action</th>
										</tr>
									 </thead>
									  <tbody id="topic_part_1">
											@if($sub_topic_parts->count() > 0 )
												@foreach($sub_topic_parts as $subTopicObj)
													@php 
													$total_pending_questions = $total_unreviewed_questions = 0;
													$expected_part_questions = getPartQuestions($subTopicObj->difficulty_level);
													$expected_part_questions = ($expected_part_questions*$subTopicObj->topicPartItemPrompts->count());
													$total_part_questions = $subTopicObj->topicPartItemQuestions->count();
													$pending_part_questions = $expected_part_questions-$total_part_questions;
													$pending_part_questions = ( $pending_part_questions < 0 )? 0 : $pending_part_questions;
													$total_unreviewed_questions = $subTopicObj->topicPartItemQuestions->where('question_status', 'api_pending')->count();
													@endphp
													<tr class="topic_parts accordion-parent" data-child_class="subtopic_prompts_{{$subTopicObj->id}}">
														<td data-label="Topic Part Item">
															<span class="topic-part-title"><i class="fas fa-chevron-down"></i>&nbsp;{{$subTopicObj->title}}</span>
														</td>
														<td data-label="Created Date">-</td>
														@if(!empty($difficulty_levels))
															@foreach($difficulty_levels as $difficulty_level)
																@php $difficulty_level_class = '';
																$difficulty_level_class = ($difficulty_level == 'Emerging')? 'table-col-red' : $difficulty_level_class;
																$difficulty_level_class = ($difficulty_level == 'Expected')? 'table-col-orange' : $difficulty_level_class;
																$difficulty_level_class = ($difficulty_level == 'Exceeding')? 'table-col-yellow' : $difficulty_level_class;
																@endphp
																@php $total_questions = $subTopicObj->topicPartItemQuestions->where('question_difficulty_level', $difficulty_level)->count();
																$pending_questions = $expected_part_questions-$total_questions;
																$pending_questions = ($pending_questions < 0)? 0 : $pending_questions;
																$total_pending_questions += $pending_questions;
																@endphp
																<td class="{{$difficulty_level_class}}" data-label="Expected">{{$expected_part_questions}}</td>
																<td class="{{$difficulty_level_class}}" data-label="Total">{{$total_questions}}</td>
																<td class="{{$difficulty_level_class}} table-col-pending" data-label="Pending">{{$pending_questions}}</td>
															@endforeach
														@endif
														<td data-label="Total Pending Questions">{{$total_pending_questions}}</td>
														<td data-label="Total unreviewed Questions">{{$total_unreviewed_questions}}</td>
														<td data-label="Action">&nbsp;</td>
													</tr>
													@if($subTopicObj->topicPartItemPrompts->count() > 0 )
														@foreach($subTopicObj->topicPartItemPrompts as $promptObj)			
															@php $prompt_title = isset($promptObj->prompt_title )? $promptObj->prompt_title : '';
															$prompt_title = ($prompt_title == '')? 'Prompt' : $prompt_title;
															$unreviewed_questions = $promptObj->promptQuestions->where('question_status', 'api_pending')->count();
															@endphp
															
															<tr class="subtopic_prompts_{{$subTopicObj->id}}" id="subtopic_prompts_{{$subTopicObj->id}}">
															  <td data-label="Topic Part Item">{{$prompt_title}}</td>
															  <td data-label="Created Date">{{ dateTimeFormat($promptObj->created_at, 'j M y | H:i') }}</td>
															  @if(!empty($difficulty_levels))
																@foreach($difficulty_levels as $difficulty_level)
																	@php $total_questions = $promptObj->promptQuestions->where('question_difficulty_level', $difficulty_level)->count();@endphp
																	@php $difficulty_level_class = '';
																	$difficulty_level_class = ($difficulty_level == 'Emerging')? 'table-col-red' : $difficulty_level_class;
																	$difficulty_level_class = ($difficulty_level == 'Expected')? 'table-col-orange' : $difficulty_level_class;
																	$difficulty_level_class = ($difficulty_level == 'Exceeding')? 'table-col-yellow' : $difficulty_level_class;
																	@endphp
																	<td class="{{$difficulty_level_class}}" data-label="Expected">-</td>
																	<td class="{{$difficulty_level_class}}" data-label="Total">{{$total_questions}}</td>
																	<td class="{{$difficulty_level_class}} table-col-pending" data-label="Pending">-</td>
																@endforeach
															  @endif
															  <td data-label="Expected">-</td>
															  <td data-label="Total">{{$unreviewed_questions}}</td>
															  <td data-label="Actions">
																<div class="actions">
																	<a title="Copy Prompt" href="javascript:;" class="btn-transparent btn-sm text-primary copy-to-text" data-copy_to="prompt-text-{{$promptObj->id}}" title="" data-original-title="Copy Prompt"><i class="fas fa-copy"></i></a> 
																	<a title="Search on ChatGPT" href="https://chat.openai.com/?model=gpt-4&q={{ urlencode($promptObj->prompt_text) }}" target="_blank" class="btn-transparent btn-sm text-primary" title="" data-original-title="Search"><i class="fas fa-search"></i></a>
																	<a title="Import Questions" href="javascript:;" class="btn-transparent btn-sm text-primary import-questions" data-prompt_id="{{$promptObj->id}}" title="" data-original-title="Import Questions" data-toggle="modal" data-target="#multi-choice-template-modal"><i class="fas fa-download"></i></a>
																	<a target="_blank" href="/admin/questions-generator/view-api-response/{{$promptObj->questions_bulk_list_id}}/{{$promptObj->topic_part}}" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Questions List"><i class="fas fa-sitemap"></i></a>
																</div>
															  <pre class="rurera-hide prompt-text-{{$promptObj->id}}">{!! $promptObj->prompt_text !!}</pre></td>
															</tr>
														@endforeach
													@else
														<tr class="subtopic_prompts_{{$subTopicObj->id}}" id="subtopic_prompts_{{$subTopicObj->id}}">
														  <td colspan="{{(count($difficulty_levels)*3)+5}}" data-label="">
															No Prompt Found!
														  </td>
														</tr>
													@endif
												@endforeach
											@endif
										</tbody>
									</table>
								</div>
							</div>

				</div>
				<div class="col-md-12 col-lg-12">
					
					<div class="multi-choice-template-modal modal fade" id="multi-choice-template-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<form action="javascript:;" method="POST" id="question-generator-form" class="px-25 question-generator-form">
						@csrf
						<input type="hidden" name="bulk_id" value="{{$QuestionsBulkListObj->id}}">
						<div class="example-selected-questions"></div>
						<input type="hidden" name="prompt_id" class="prompt_id" value="0">
						<div class="modal-dialog modal-xl">
							<div class="modal-content">
								<div class="template-selection">
									<div class="modal-header">
										<div class="section-header p-0 ml-0">
											<h1>Choose Questions Template</h1>
										</div>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-12">
											<ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="section-tabid-Emerging" data-toggle="tab" href="#section-tab-Emerging" role="tab"
                                                       aria-controls="section-tab-Emerging" aria-selected="true"><span class="tab-title">Emerging</span></a>
                                                </li>
												<li class="nav-item">
                                                    <a class="nav-link" id="section-tabid-Expected" data-toggle="tab" href="#section-tab-Expected" role="tab"
                                                       aria-controls="section-tab-Expected" aria-selected="true"><span class="tab-title">Expected</span></a>
                                                </li>
												<li class="nav-item">
                                                    <a class="nav-link" id="section-tabid-Exceeding" data-toggle="tab" href="#section-tab-Exceeding" role="tab"
                                                       aria-controls="section-tab-Exceeding" aria-selected="true"><span class="tab-title">Exceeding</span></a>
                                                </li>
                                            </ul>
											
											<div class="tab-content" id="myTabContent2">
                                                <div class="tab-pane mt-3 fade in active show" id="section-tab-Emerging" role="tabpanel" aria-labelledby="section-tab-Emerging-tab">
													<div class="row">
														<div class="col-12">
															<div class="form-group">
																<div class="search-filed">
																	<i class="fas fa-search"></i>
																	<input type="text" placeholder="Search Templates" class="form-control">
																</div>
															</div>
														</div>
														@if($emerging_example_questions->count() > 0)
															@php $counter = 1; @endphp
															@foreach($emerging_example_questions as $exampleQuestionObj)	
																@php $class = ($exampleQuestionObj->is_shortlisted == 1)? 'shortlisted' : ''; @endphp
																<div class="col-12 col-lg-4 col-md-6 {{$class}} template-item templates-list-{{$exampleQuestionObj->question_type}}">
																	<div class="template-box">
																		<div class="rating-stars">
																			<div class="rating-box">
																				<input type="checkbox" id="star-one">
																				<label for="star-one">
																					<i class="fas fa-star"></i>
																				</label>
																			</div>
																		</div>
																		<div class="card-icon pop">
																			<img src="{{$exampleQuestionObj->example_thumbnail}}">
																		</div>
																		<div class="template-controls">
																			<button type="button" class="preview-template-btn">Preview template (#{{$exampleQuestionObj->id}}) ({{$exampleQuestionObj->question_difficulty_level}})
																			</button>
																			<button type="button" class="template-btn" data-template_image="{{$exampleQuestionObj->example_thumbnail}}" data-template_name="{{$exampleQuestionObj->getTitleAttribute()}}" data-template_id="{{$exampleQuestionObj->id}}">Select Template</button>
																		</div>
																		<div class="template-data-info">
																			<span>{{$exampleQuestionObj->search_tags}}</span>
																		</div>
																	</div>
																</div>
															@php $counter++; @endphp
															@endforeach
														@endif
													</div>
                                                </div>
												
												<div class="tab-pane mt-3 fade" id="section-tab-Expected" role="tabpanel" aria-labelledby="section-tab-Expected-tab">
                                                   <div class="row">
														<div class="col-12">
															<div class="form-group">
																<div class="search-filed">
																	<i class="fas fa-search"></i>
																	<input type="text" placeholder="Search Templates" class="form-control">
																</div>
															</div>
														</div>
														@if($expected_example_questions->count() > 0)
															@php $counter = 1; @endphp
															@foreach($expected_example_questions as $exampleQuestionObj)	
															@php $class = ($exampleQuestionObj->is_shortlisted == 1)? 'shortlisted' : ''; @endphp
																<div class="col-12 col-lg-4 col-md-6 {{$class}} template-item templates-list-{{$exampleQuestionObj->question_type}}">
																	<div class="template-box">
																		<div class="rating-stars">
																			<div class="rating-box">
																				<input type="checkbox" id="star-one">
																				<label for="star-one">
																					<i class="fas fa-star"></i>
																				</label>
																			</div>
																		</div>
																		<div class="card-icon pop">
																			<img src="{{$exampleQuestionObj->example_thumbnail}}">
																		</div>
																		<div class="template-controls">
																			<button type="button" class="preview-template-btn">Preview template (#{{$exampleQuestionObj->id}}) ({{$exampleQuestionObj->question_difficulty_level}})
																			</button>
																			<button type="button" class="template-btn" data-template_image="{{$exampleQuestionObj->example_thumbnail}}" data-template_name="{{$exampleQuestionObj->getTitleAttribute()}}" data-template_id="{{$exampleQuestionObj->id}}">Select Template</button>
																		</div>
																		<div class="template-data-info">
																			<span>{{$exampleQuestionObj->search_tags}}</span>
																		</div>
																	</div>
																</div>
															@php $counter++; @endphp
															@endforeach
														@endif
													</div>
                                                </div>
												
												<div class="tab-pane mt-3 fade" id="section-tab-Exceeding" role="tabpanel" aria-labelledby="section-tab-Exceeding-tab">
                                                   <div class="row">
														<div class="col-12">
															<div class="form-group">
																<div class="search-filed">
																	<i class="fas fa-search"></i>
																	<input type="text" placeholder="Search Templates" class="form-control">
																</div>
															</div>
														</div>
														@if($exceeding_example_questions->count() > 0)
															@php $counter = 1; @endphp
															@foreach($exceeding_example_questions as $exampleQuestionObj)	
															@php $class = ($exampleQuestionObj->is_shortlisted == 1)? 'shortlisted' : ''; @endphp
																<div class="col-12 col-lg-4 col-md-6 {{$class}} template-item templates-list-{{$exampleQuestionObj->question_type}}">
																	<div class="template-box">
																		<div class="rating-stars">
																			<div class="rating-box">
																				<input type="checkbox" id="star-one">
																				<label for="star-one">
																					<i class="fas fa-star"></i>
																				</label>
																			</div>
																		</div>
																		<div class="card-icon pop">
																			<img src="{{$exampleQuestionObj->example_thumbnail}}">
																		</div>
																		<div class="template-controls">
																			<button type="button" class="preview-template-btn">Preview template (#{{$exampleQuestionObj->id}}) ({{$exampleQuestionObj->question_difficulty_level}})
																			</button>
																			<button type="button" class="template-btn" data-template_image="{{$exampleQuestionObj->example_thumbnail}}" data-template_name="{{$exampleQuestionObj->getTitleAttribute()}}" data-template_id="{{$exampleQuestionObj->id}}">Select Template</button>
																		</div>
																		<div class="template-data-info">
																			<span>{{$exampleQuestionObj->search_tags}}</span>
																		</div>
																	</div>
																</div>
															@php $counter++; @endphp
															@endforeach
														@endif
													</div>
                                                </div>

                                            </div>
                                            </div>
										
										
											
										<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">              
													<div class="modal-body">
														<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
														<img src="" class="imagepreview">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<button type="button" class="btn btn-primary template-selection-btn mt-0">Next</button>
										</div>
									</div>
								</div>
							</div>
							
							<div class="api-response-block rurera-hide">
									<div class="modal-header">
										<div class="section-header p-0 ml-0">
											<h1>Input Response JSON</h1>
										</div>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="row">
										<div class="success-msg"></div>
										<div class="col-12">
											<div class="form-group">
												<textarea name="chatgpt_response" id="chatgpt_response" class="form-control chatgpt_response" rows="20" placeholder="Input Response (JSON Only)"></textarea>
											</div>
										</div>
										<div class="col-md-12 col-lg-12">
											<button type="submit" class="submit-btn mt-0">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>
				
				
					
				</div>
			</div>
			</div>
									
			</div>
		</div>

        <!-- Other fields (ranges, difficulty, language) are the same as before -->
		
	</div>
	</div>
	</div>
	</div>
</section>

@endsection

@push('scripts_bottom')
<script type="text/javascript">
function validateJSON() {
		var prompt_id = $('input[name="api_id"]:checked').val();
		if(prompt_id == 0 || prompt_id == 'undefined' || prompt_id == undefined){
			alert('Please Choose Prompt');
			return false; // Prevents form submission if JSON is invalid
		}
		if($(".example_question_id").val() == 0){
			alert('Please Choose Example Question Template');
			return false; // Prevents form submission if JSON is invalid
		}
        const text = document.getElementById("chatgpt_response").value;
        try {
            JSON.parse(text);
            return true; // Submission proceeds if JSON is valid
        } catch (e) {
            alert("Please enter valid JSON.");
            return false; // Prevents form submission if JSON is invalid
        }
    }
	$(document).on('click', '.copy-prompt', function () {
		// Get the content inside the <pre> tag
		const promptText = $(this).closest('.card-body').find('.prompt-text').text();

		// Create a temporary <textarea> element to copy text from
		const tempTextarea = $('<textarea>');
		tempTextarea.val(promptText);
		$('body').append(tempTextarea);
		
		// Select the text and copy it
		tempTextarea.select();
		tempTextarea[0].setSelectionRange(0, 99999); // For mobile devices

		try {
			document.execCommand('copy');
		} catch (error) {
		}

		// Remove the temporary <textarea> element
		tempTextarea.remove();
	});
    $(document).ready(function () {
		
		$(document).on('click', '.accordion-parent', function () {
			var child_class = $(this).attr('data-child_class');
			if($('.'+child_class).is(":visible")) {
				$(this).find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right');
				if ($('.' + child_class).hasClass('accordion-parent')) {
					var sub_child_class = $('.'+child_class).attr('data-child_class');
					$('.'+sub_child_class).hide(300);
					$('.'+child_class).find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right');
				}
			}else{
				$(this).find('.fas').removeClass('fa-chevron-right').addClass('fa-chevron-down');
			}
			$('.'+child_class).toggle(300);
			
		});
		
		$(document).on('click', '.template-btn', function () {
			var template_image = $(this).attr('data-template_image');
			var template_name = $(this).attr('data-template_name');
			var template_id = $(this).attr('data-template_id');
			$(".example-selected-questions").append('<input type="hidden" name="example_question_id[]" class="example_question_id" value="'+template_id+'">');			
			$(this).closest('.template-item').addClass('active');
			//$(".template-selection").addClass('rurera-hide');
			//$(".api-response-block").removeClass('rurera-hide');			
			//$(".multi-choice-template-modal").modal('hide');
		});
		
		
		$(document).on('click', '.template-selection-btn', function () {
			var example_questions_ids = $('[name="example_question_id[]"]').val();
			if($('[name="example_question_id[]"]').length > 0){
				$(".template-selection").addClass('rurera-hide');
				$(".api-response-block").removeClass('rurera-hide');			
			}else{
				alert('Please Choose Example Question');
				return false; // Prevents form submission if JSON is invalid
			}
		});

		
		$(document).on('click', '.import-questions', function () {
			$(".template-selection").removeClass('rurera-hide');
			$(".api-response-block").addClass('rurera-hide');			
			var prompt_id = $(this).attr('data-prompt_id');
			$(".prompt_id").val(prompt_id);
		});
		
		
		$(document).on('submit', '.question-generator-form', function () {
			
			var prompt_id = $('input[name="prompt_id"]').val();
			if(prompt_id == 0 || prompt_id == 'undefined' || prompt_id == undefined){
				alert('Please Choose Prompt');
				return false; // Prevents form submission if JSON is invalid
			}
			if($('[name="example_question_id[]"]').length == 0){
				alert('Please Choose Example Question');
				return false; // Prevents form submission if JSON is invalid
			}
			const text = document.getElementById("chatgpt_response").value;
			try {
				JSON.parse(text);
			} catch (e) {
				alert("Please enter valid JSON.");
				return false; // Prevents form submission if JSON is invalid
			}
			
			var formData = new FormData($('#question-generator-form')[0]);
			var loaderDiv = $(".submit-btn");
			rurera_loader(loaderDiv, 'button');
			$.ajax({
				type: "POST",
				dataType: "json",
				url: '/admin/questions-generator/submit-response',
				data: formData,
				processData: false,
				contentType: false,
				success: function (return_data) {
					$(".chatgpt_response").val('');
					rurera_remove_loader(loaderDiv, 'button');
					$("."+return_data.response_class).html(return_data.response_msg);
				}
			});
		});
		

		$(".circle_percent").each(function() {
			var $this = $(this),
			$dataV = $this.data("percent"),
			$dataDeg = $dataV * 3.6,
			$round = $this.find(".round_per");
		$round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)"); 
		$this.append('<div class="circle_inbox"><span class="percent_text"></span></div>');
		$this.prop('Counter', 0).animate({Counter: $dataV},
		{
			duration: 2000, 
			easing: 'swing', 
			step: function (now) {
					$this.find(".percent_text").text(Math.ceil(now)+"%");
				}
			});
		if($dataV >= 51){
			$round.css("transform", "rotate(" + 360 + "deg)");
			setTimeout(function(){
			$this.addClass("percent_more");
			},1000);
			setTimeout(function(){
			$round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
			},1000);
		} 
		});
		
    });
	
	
</script>
<script>
	$(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
	});
</script>

@endpush