@extends('web.default.panel.layouts.panel_layout')
@php use App\Models\Webinar; @endphp
@php $rand_id = rand(0,9999); @endphp
@push('styles_top')
    <link rel="stylesheet" href="/assets/admin/css/jquery.flowchart.css?ver={{$rand_id}}">
@endpush

@section('content')
@php $is_new_added = false; @endphp
<style>

:root {
  --bg-color: #fff;
  --line-color-1: #366;
  --line-color-2: #a9a9a9;
}

*, *::before, *::after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.learning-journey-item{
	position:absolute;
	margin: 0px 15px
}
.level-stage {
    position: relative;
}
.graph-background {
	background-color: var(--bg-color);
	background-image: linear-gradient(var(--line-color-1) 1.5px, transparent 1.5px), linear-gradient(90deg, var(--line-color-1) 1.5px, transparent 1.5px), linear-gradient(var(--line-color-2) 1px, transparent 1px), linear-gradient(90deg, var(--line-color-2) 1px, transparent 1px) !important;
	background-position: -1.5px -1.5px, -1.5px -1.5px, -1px -1px, -1px -1px !important;
	background-size: 100px 100px, 100px 100px, 20px 20px, 20px 20px !important;
}

</style>
<style>
    .flowchart-operator-inputs-outputs {
        position: absolute;
        top:50%;
        z-index:-1;
    }
    .field-data.ui-rotatable {
        position: relative;
    }
    .flowchart-operator-outputs {
        position: absolute;
        left: 0%;
    }
    .flowchart-operator-inputs {
        position: absolute;
        left: 50%;
    }
    .flowchart-operator-outputs {
        left: 0%;
    }
    .flowchart-operator-inputs {
        left: 50%;
    }
    .flowchart-operator{
        display: inline-table;
    }
    .flowchart-operator-connector-arrow1, .flowchart-operator-connector-small-arrow1 {
        visibility: hidden;
    }
    .flowchart-temporary-link-layer{display:none !important;}
    .field-options {
        display: none !important;
    }
    .right-in2 .flowchart-operator-outputs {
        position: absolute;
        right: 0;
    }
    .right-in2 .flowchart-operator-inputs {
        position: absolute;
        left: 0;
    }
    .field-data svg {
        height: auto;
        width: 50%;
    }
    .field-data1 {
        position: relative;
    }.flowchart-operator-inputs1 {
         position: absolute;
         top: 2;
     }
    .roadmap-road .roadmap-default {
        stroke: #000000;
        stroke-width:15px;
    }
    .roadmap-default .roadmap-default, .roadmap-road .roadmap-road, .roadmap-steps .roadmap-steps{
        display:block;
    }
    .roadmap-path{
        display:none;
    }
    .spacer-block{width:0px !important;}
    .spacer-block svg {
        width: 10px !important;
        height: 10px !important;
    }
    .spacer-svg-controls .flowchart-operator-outputs .flowchart-operator-connector-small-arrow {
        right: 10px !important;
    }
    .spacer-svg-controls .flowchart-operator-outputs .flowchart-operator-connector-arrow{
        right:10px !important;
    }
    ul.editor-objects.sets-selection.active {
        background: #b2b2b2;
    }
    .right-in .flowchart-operator-connector-arrow {
        border-right: 10px solid rgb(204, 204, 204);
        border-left: none;
    }
    .right-in1 .flowchart-operator-inputs, .right-in1 .flowchart-operator-outputs {
        display: contents !important;
    }
    .flowchart-operator-inputs-outputs.right-in .flowchart-operator-inputs .flowchart-operator-connector-arrow {
        right: -10px !important;
        left: auto !important;
    }
    .flowchart-operator-inputs-outputs.right-in .flowchart-operator-outputs .flowchart-operator-connector-arrow {
        left: -10px !important;
        right: auto !important;
    }



    .right-filler{
        width: 150px;
        background: #fff;
        display: block;
        height: 100%;
        left: 76%;
        position: absolute;
        z-index: 99999;
    }
    .left-filler{
        width: 187px;
        background: #fff;
        display: block;
        height: 100%;
        left: 0%;
        position: absolute;
        z-index: 99999;
    }
    .top-filler {
        width: 100%;
        background: #fff;
        display: block;
        height: 149px;
        top: 0%;
        position: absolute;
        z-index: 99999;
    }
</style>
<section class="p-0 mt-30 treasure-mission-layout">

	@if( !empty( $items_data ) )
		@php $level_count = 0; @endphp
		@foreach($items_data as $level_id => $itemsRow)
			@php $level_count++; $levelObj = isset( $levels_data[$level_id] )? $levels_data[$level_id] : array();
			$level_data_values = isset( $levelObj->data_values )? json_decode($levelObj->data_values) : array();
			$level_background = isset( $level_data_values->background ) ? $level_data_values->background : '#FFFFFF';
			$level_height = isset( $level_data_values->height ) ? $level_data_values->height : '800';
			$page_graph = isset( $level_data_values->page_graph ) ? $level_data_values->page_graph : 0;
			$page_graph = ( $page_graph == 1)? 'graph-background' : '';
			$subject_slug = isset($course->slug)? $course->slug : '';
			$year_slug = isset($course->categories()->first()->slug)? $course->categories()->first()->slug : '';
            //pre($levelObj, false);

			@endphp

			<div class="learning-journey-levels border-0" data-mission_id="mission_1">
				<div class="panel-subheader">
					<div class="title">
						<h2 class="font-19 font-weight-bold">{{$course->getTitleAttribute()}}</h2>
						<span class="info-modal-btn" data-toggle="modal" data-target="#level_1"> <img src="/assets/default/svgs/info-icon2.svg" alt=""></span>
					</div>
					<div class="stats-list">
						<ul>
							<li>
								<div class="list-box">
									<strong>Lessons</strong>
									<span>{{$topicCount}}</span>
								</div>
							</li>
							<li>
								<div class="list-box">
									<strong>Treasures</strong>
									<span>{{$treasureCount}}</span>
								</div>
							</li>
							<li>
								<div class="list-box">
									<strong>Coins</strong>
									<span>1 per Correct Answer</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				@if(!empty( $itemsRow ) )
				<div class="level-stage frontend-dispaly {{$page_graph}}" style="width: 1015px;left: -100px;height:{{$level_height}}px; background:{{$level_background}}">
                    <div class="top-filler"></div>
                    <div class="left-filler"></div>
                    <div class="right-filler"></div>
                    <div class="level-stage-inner">
                    {!! $level_data_values->svgs_code !!}
                        @php $item_counter = 0; $topic_counter = 0; $total_count = 0; $ul_class = 'ul-rtl'; $already_active = false; $is_active = false; @endphp
                        @foreach($itemsRow as $itemObj)
                            @php $item_counter++;  $total_count++; $is_completed = isset( $itemObj->is_completed )? $itemObj->is_completed : false;
                            $percentage = isset( $itemObj->percentage )? $itemObj->percentage : false;
                            $is_completed = ($percentage >= 70)? true : $is_completed;
                            $item_type = isset( $itemObj->item_type ) ?  $itemObj->item_type : '';
                            $is_last = ($total_count >= count($itemsRow))? true : false;

                            $is_active = ( $is_active == false && $is_completed != true)? true : $is_active;
                            $is_active = ($already_active == false)? $is_active : false;
                            $already_active = ($is_active == true)? true : $already_active;
                            if($item_type == 'topic'){
                                $topic_counter = isset($topic_counter)? $topic_counter+1 : 1;
                            }
                            @endphp
                            @include('web.default.learning_journey.journey_item', ['year_slug' => $year_slug, 'subject_slug' => $subject_slug, 'topic_counter' => $topic_counter, 'site_url' => $site_url, 'item_counter' => $item_counter, 'is_last' => $is_last, 'total_count' => $total_count, 'itemObj' => $itemObj])

                        @endforeach
                    </div>
				</div>
				@endif
			</div>
		@endforeach
	@endif

</section>

@endsection

@push('scripts_bottom')
    <script src="/assets/admin/js/jquery.flowchart.js?ver={{$rand_id}}"></script>
@if (!auth()->subscription('courses'))
    <script>
        if( $(".subscription-modal").length > 0){
            $(".subscription-modal").modal('show');
        }
    </script>
@endif

@endpush
