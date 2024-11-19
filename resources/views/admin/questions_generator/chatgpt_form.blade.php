@php use App\Models\QuizzesQuestion; @endphp
@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')

<section class="section">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-body px-0 pt-10">
				
					

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
				
				<div class="years-group populated-data">
					<div class="radio-buttons">
						<label class="card-radio">
							<input type="radio" name="example_question_id" id="example_question_id_13061" class="example_question_id" value="13061" checked>
							<span class="radio-btn"><i class="las la-check"></i>
								<div class="card-icon">
								 <img src="/assets/default/img/assignment-logo/practice.png">
									<h3>13061</h3>
							   </div>
						  </span>
						</label>
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
					<div class="form-group">
						<!-- Content Text Area -->
						<label for="chatgpt_response">Chatgpt Response:</label>
						<textarea class="w-100 form-control" name="chatgpt_response" id="chatgpt_response" rows="20" ></textarea>
					</div>
				</div>
					<div class="col-md-12 col-lg-12">
						<button type="submit" class="submit-btn mt-0">Submit Response</button>
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
																	  <td colspan="2"><span class="copy-to-text" data-copy_to="prompt-text">Click to Copy Prompt</span><pre class="rurera-hide prompt-text">{!! $promptObj->prompt_text !!}</pre></td>
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
		
    });
	
	
</script>

@endpush