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
				
				<div class="years-group populated-data mb-30">
					<div class="radio-buttons">
						<label class="card-radio">
							<input type="radio" name="example_question_id" id="example_question_id_13061" class="example_question_id" value="13061" checked>
							<span class="radio-btn"><i class="las la-check"></i>
								<div class="card-icon">
								 <img src="/assets/default/img/assignment-logo/practice.png">
									<h3 class="mt-10">13061</h3>
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
								<button class="nav-link active" id="prompts-tab" data-toggle="tab" data-target="#prompts" type="button" role="tab" aria-controls="prompts" aria-selected="false">Prompts</button>
							</li>
							
						</ul>
						<div class="tab-content" id="myTabContent">

							<div class="tab-pane fade show active py-0" id="prompts" role="tabpanel" aria-labelledby="prompts-tab">
								<div id="accordion">
									<div class="similarity-content-block-data">
										@if($QuestionsBulkListObj->prompts->count() > 0 )
											@foreach($QuestionsBulkListObj->prompts as $promptObj)
												<div class="card">
													<div class="card-header" id="heading{{$promptObj->id}}">
														<h5 class="mb-0">
														<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$promptObj->id}}" aria-expanded="true" aria-controls="collapse{{$promptObj->id}}">
															<div class="d-flex w-100">
																<div class="similarity-serial blue font-16 font-weight-bold">
																	<label for="api_id_{{$promptObj->id}}">
																	{{isset( $promptObj->TopicPartsItem->id)? $promptObj->TopicPartsItem->title : ''}}
																	@if(isset($promptObj->TopicPartsItem->id))
																		<br>Prompt: {{$promptObj->prompt_title}} -- {{$promptObj->TopicPartsItem->id}}<br>
																		<br>Generated: {{$promptObj->TopicPartsItem->topicPartItemQuestions->count()}}
																		<br>Expected: {{getPartQuestions($promptObj->TopicPartsItem->difficulty_level)}}
																	@endif
																	</label>
																</div>
																<input type="radio" class="rurera-hide" name="api_id" id="api_id_{{$promptObj->id}}" value="{{$promptObj->id}}">
																
															</div>
														</button>
														</h5>
													</div>
													<div id="collapse{{$promptObj->id}}" class="collapse" aria-labelledby="heading{{$promptObj->id}}" data-parent="#accordion">
														<div class="card-body">
															<button type="button" class="copy-prompt btn btn-primary">Copy</button>
															<pre class="prompt-text">{!! $promptObj->prompt_text !!}</pre>
														</div>
													</div>
												</div>
											@endforeach
										@endif
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
		
		
		
		
    });
	
	
</script>

@endpush