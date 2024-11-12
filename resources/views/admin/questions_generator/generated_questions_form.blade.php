<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Generator</title>
	<?php $random_id = rand(111,9999); ?>
	<link rel="stylesheet" href="/assets/default/css/quiz-create.css?ver=<?php echo $random_id; ?>">
	<style>
    .droppable_area {
        width: 150px;
        height: 50px;
        border: 1px solid #efefef;
        display: inline-block;
    }
    .image-field, .image-field-box {
        width: fit-content;
    }
    .image-field img, .containment-wrapper {
        position: relative !important;
    }
    .image-field-box {
        position: absolute !important;
    }
    /*.draggable3 {
        width: 150px;
    }*/
    .spreadsheet-area {
        border: 1px solid #efefef;
        padding: 10px;
        background: #fff;
        height: 200px;
    }
    .question-layout-data .rureraform-element{
        outline: none !important;
    }
    .navbar-bg {
        display: none;
    }
    nav.navbar.navbar-expand-lg.main-navbar {
        display: none;
    }
	.modal-open .modal{
		z-index: 99999;
	}
	.rureraform-element-helper{
		width:100% !important;
	}
	
	.rureraform-element-helpers {
    width: fit-content !important;
}

.section-block {
    background: #f5f5f5;
    padding: 5px 10px !important;
	margin: 5px 0px;
	border:1px solid #ccc;
}
iframe{
	border:none;
}
</style>
</head>
<body>
<div class="container">
<h2>Edit Questions </h2>

<!-- Edit-questions Tabs Start -->
<div class="edit-questions-tabs">
  <div class="nav" id="nav-tab" role="tablist">
	@if(!empty( $questions_array) )
		$php $counter = 1; @endphp
		@foreach( $questions_array as $questionData)
			<button class="nav-link active" id="nav-q{{$counter}}-tab" data-toggle="tab" data-target="#nav-q{{$counter}}" type="button" role="tab" aria-controls="nav-q{{$counter}}" aria-selected="true">Question {{$counter}}</button>
		$php $counter++; @endphp
		@endforeach
	@endif
  </div>
  <div class="tab-content" id="nav-tabContent">
	@if(!empty( $questions_array) )
		$php $counter = 1; @endphp
		@foreach( $questions_array as $questionData)
		@php $active_class = ($counter == 1)? 'show active' : ''; @endphp
		<div class="tab-pane fade {{$active_class}}" id="nav-q{{$counter}}" role="tabpanel" aria-labelledby="nav-q{{$counter}}-tab">
			<iframe style="width:100%; height:1000px;" src="/admin/questions-generator/builder/{{$question_id}}">
		</iframe>
		</div>
		$php $counter++; @endphp
		@endforeach
	@endif
  </div>
</div>
<!-- Edit-questions Tabs End -->

</div>

</body>
</html>
