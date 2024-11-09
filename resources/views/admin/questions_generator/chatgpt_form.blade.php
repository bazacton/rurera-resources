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

	<input type="hidden" name="api_id" value="{{$AiApiCallObj->id}}">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h2 class="font-20 font-weight-bold mb-15">Prompt</h2>
					<button type="button" class="copy-prompt btn btn-primary">Copy</button>
				</div>
				<div class="col-md-12 col-lg-12">
						<pre class="prompt-text">{!! $generatePrompt !!}</pre>

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
	
document.querySelector('.copy-prompt').addEventListener('click', function() {
        // Get the content inside the <pre> tag
        const promptText = document.querySelector('.prompt-text').innerText;

        // Create a temporary <textarea> element to copy text from
        const tempTextarea = document.createElement('textarea');
        tempTextarea.value = promptText;
        document.body.appendChild(tempTextarea);
        
        // Select the text and copy it
        tempTextarea.select();
        tempTextarea.setSelectionRange(0, 99999); // For mobile devices

        try {
            document.execCommand('copy');
        } catch (error) {
        }

        // Remove the temporary <textarea> element
        document.body.removeChild(tempTextarea);
    });
    $(document).ready(function () {
		
		
		
		
    });
	
	
</script>

@endpush