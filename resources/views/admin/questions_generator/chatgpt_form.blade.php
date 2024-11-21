@php use App\Models\QuizzesQuestion; @endphp
@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')

<section class="section">
	<div class="col-md-12 col-lg-12">
		<div class="section-header">
			<h1>Import Questions</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
				</div>
				<div class="breadcrumb-item">Import Questions</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-body px-0 pt-30">
				
					

	<form action="/admin/questions-generator/submit-response" method="POST" id="question-generator-form" class="px-25" onsubmit="return validateJSON()">
	@csrf

	<input type="hidden" name="bulk_id" value="{{$QuestionsBulkListObj->id}}">
	<div class="row">
		<div class="col-md-7 col-lg-7">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					
				</div>
				
				<div class="col-md-12 col-lg-12">
						<pre class="prompt-text"></pre>

				</div>
				<div class="col-md-12 col-lg-12">
					<div class="years-group populated-data mb-30">
						<label class="group-lable mb-15">Multi Response:</label>
						<div class="radio-buttons">
							@if($example_questions->count() > 0)
								@php $counter = 1; @endphp
								@foreach($example_questions as $example_type => $exampleQuestions)	
									@php 
									$template_type = $example_type;
									$template_type  = ($template_type == 'checkbox')? 'Multi Select' : $template_type;
									$thumbnail = '';
									$thumbnail  = ($example_type == 'checkbox')? '/assets/default/img/multiple-choice.jfif' : $thumbnail; 
									@endphp
									<label class="card-radio">
										<span class="radio-btn" data-toggle="modal" data-target="#multi-choice-template-modal"><i class="las la-check"></i>
											<div class="card-icon">
												<img src="{{$thumbnail}}">
												<h3 class="pt-10">{{$template_type}}</h3>
											</div>
										</span>
									</label>
								@php $counter++; @endphp
								@endforeach
							@endif
						</div>
					</div>
					
					<div class="years-group populated-data mb-30 selected-template">
						
					</div>
					<input type="hidden" name="example_question_id" class="example_question_id" value="0">
					<div class="multi-choice-template-modal modal fade" id="multi-choice-template-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-xl">
							<div class="modal-content">
								<div class="modal-header">
									<div class="section-header p-0 ml-0">
										<h1>Questions Template</h1>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<div class="search-filed">
													<i class="fas fa-search"></i>
													<input type="text" placeholder="Search Templates" class="form-control">
												</div>
											</div>
										</div>
										@if($example_questions->count() > 0)
											@php $counter = 1; @endphp
											@foreach($example_questions as $example_type => $exampleQuestions)	
													@if($exampleQuestions->count() > 0)
														@foreach($exampleQuestions as $exampleQuestionObj)		
															<div class="col-12 col-lg-3 col-md-6 template-item templates-list-{{$example_type}}">
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
																		<button type="button" class="preview-template-btn">Preview template</button>
																		<button type="button" class="template-btn" data-template_image="{{$exampleQuestionObj->example_thumbnail}}" data-template_name="{{$exampleQuestionObj->getTitleAttribute()}}" data-template_id="{{$exampleQuestionObj->id}}">Select Template</button>
																	</div>
																	<div class="template-data-info">
																		<span>{{$exampleQuestionObj->search_tags}}</span>
																	</div>
																</div>
															</div>
														@endforeach
													@endif
													@php $counter++; @endphp
											@endforeach
										@endif
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
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<!-- Difficulty Level -->
						<label>Select Difficulty Level:</label>
						<div class="list-group list-in-row">
							<div class="row-field">
								<input type="radio" name="difficulty" id="Emerging" value="Emerging" checked>
								<label for="Emerging">Emerging</label>
							</div>
							<div class="row-field">
								<input type="radio" name="difficulty" id="Expected" value="Expected">
								<label for="Expected">Expected</label>
							</div>
							<div class="row-field">
								<input type="radio" name="difficulty" id="Exceeding" value="Exceeding">
								<label for="Exceeding">Exceeding</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="upload-msg success">
						<div class="msg-box">
							<span class="msg-icon">
								<i class="fas fa-check"></i>
							</span>
							<p>
								<span>Import completed</span>
								<a href="#">Got to Online store - Pages</a>
							</p>
						</div>
						<button type="button" class="close"><span>&times;</span></button>
					</div>
					<div class="form-group">
						<!-- Content Text Area -->
						<label for="chatgpt_response">Chatgpt Response:</label>
						<textarea class="w-100 form-control" name="chatgpt_response" id="chatgpt_response" rows="20" style="background-color:#999;"></textarea>
					</div>
				</div>
					<div class="col-md-12 col-lg-12">
						<button type="submit" class="submit-btn mt-0">Submit Response</button>
					</div>
				</div>
			</div>
			</div>
			
			<div class="col-5 col-md-5">

				<div class="similarity-content-block mb-30">
					<div class="similarity-content-tabs">
						<ul class="nav" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active rurera-hide" id="prompts-tab" data-toggle="tab" data-target="#prompts" type="button" role="tab" aria-controls="prompts" aria-selected="false">Prompts</button>
							</li>
							
						</ul>
						<div class="tab-content" id="myTabContent">

							<div class="tab-pane fade show active py-0" id="prompts" role="tabpanel" aria-labelledby="prompts-tab">
							
								<div id="accordion" class="topic-parts-data">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>Topic Part Item</th>
													<th>Expected Questions</th>
													<th>No of Questions</th>
												</tr>
											 </thead>
											  <tbody id="topic_part_1">
													@if($sub_topic_parts->count() > 0 )
														@foreach($sub_topic_parts as $subTopicObj)											  
															<tr class="topic_parts accordion-parent" data-child_class="subtopic_prompts_{{$subTopicObj->id}}">
															  <td><span class="topic-part-title"><i class="fas fa-chevron-right"></i>&nbsp;{{$subTopicObj->title}}</span></td>
															  <td>{{$subTopicObj->difficulty_level}} ({{getPartQuestions($subTopicObj->difficulty_level)}})</td>
															  <td>{{$subTopicObj->topicPartItemQuestions->count()}}</td>
															</tr>
															@if($subTopicObj->topicPartItemPrompts->count() > 0 )
																@foreach($subTopicObj->topicPartItemPrompts as $promptObj)			
																	@php $prompt_title = $promptObj->title;
																	$prompt_title = ($prompt_title == '')? 'Prompt' : $prompt_title;
																	@endphp
																	<tr style="display:none;" class="subtopic_prompts_{{$subTopicObj->id}}" id="subtopic_prompts_{{$subTopicObj->id}}">
																	  <td>
																		<span class="list-group">
																			<input type="radio" name="api_id" id="topic_subpart_{{$promptObj->id}}" value="{{$promptObj->id}}">
																			<label for="topic_subpart_{{$promptObj->id}}">{{$prompt_title}}</label>
																		</span>
																	  </td>
																	  <td colspan="2"><span class="copy-to-text" data-copy_to="prompt-text-{{$promptObj->id}}">Click to Copy Prompt</span><pre class="rurera-hide prompt-text-{{$promptObj->id}}">{!! $promptObj->prompt_text !!}</pre></td>
																	</tr>
																@endforeach
															@else
																<tr style="display:none;" class="subtopic_prompts_{{$subTopicObj->id}}" id="subtopic_prompts_{{$subTopicObj->id}}">
																  <td colspan="3">
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
						</div>
					</div>
				</div>
			</div>
									
			</div>
		</div>

        <!-- Other fields (ranges, difficulty, language) are the same as before -->
		
    </form>
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
		console.log(prompt_id);
		if(prompt_id == 0 || prompt_id == 'undefined' || prompt_id == undefined){
			alert('Please Choose Prompt');
			return false; // Prevents form submission if JSON is invalid
		}
		if($(".example_question_id").val() == 0){
			alert('Please Choose Example Question');
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
			var response = '<label class="group-lable mb-15">Selected Template:</label><label class="card-radio"><span class="radio-btn"><i class="las la-check"></i><div class="card-icon"><img src="'+template_image+'"><h3 class="pt-10">'+template_name+'</h3></div></span></label>';
			$(".example_question_id").val(template_id);
			$('.selected-template').html(response);
			$(this).closest('.template-item').addClass('active');
			$(".multi-choice-template-modal").modal('hide');
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