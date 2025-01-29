@php $objects_list = getSvgFiles('assets/admin/editor/objects/');
$stages_list = getSvgFiles('assets/admin/editor/stages/');
$paths_list = getSvgFiles('assets/admin/editor/paths/');
$topics_list = getSvgFiles('assets/admin/editor/topics/');
$treasures_list = getSvgFiles('assets/admin/editor/treasures/');
$sets_list = getSvgFilesByFolder('assets/admin/editor/sets/');
$data_values = isset( $itemObj->data_values )? json_decode($itemObj->data_values) : array();
$stage_set = isset( $data_values->stage_set )? $data_values->stage_set : 'set2';

 @endphp

<div class="editor-controls-holder">
	<div class="editor-parent-nav">
		<ul class="nav" id="myTab" role="tablist">

		<li class="nav-item" role="presentation">
			<button class="nav-link show active" id="stages-tab" data-toggle="tab" data-target="#stages{{$data_id}}" type="button" role="tab" aria-controls="profile" aria-selected="false">Clipboard</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="layers-tab" data-toggle="tab" data-target="#layers{{$data_id}}" type="button" role="tab" aria-controls="contact" aria-selected="false">Layers</button>
		</li>
        <li class="nav-item hide" role="presentation">
            <button class="nav-link" id="levels-tab" data-toggle="tab" data-target="#levels{{$data_id}}" type="button" role="tab" aria-controls="contact" aria-selected="false">Levels</button>
        </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="stage_settings-tab" data-toggle="tab" data-target="#stage_settings{{$data_id}}" type="button" role="tab" aria-controls="contact" aria-selected="false">Stage Settings</button>
            </li>
		</ul>
	</div>
	<div class="editor-controls tab-pane fade active show" id="stages{{$data_id}}" role="tabpanel" aria-labelledby="profile-tab">
		<ul class="nav nav-pills" id="myTab3" role="tablist">
			<li class="nav-item">
				<a class="nav-link" id="objects-tab{{$data_id}}" data-toggle="tab" href="#objects{{$data_id}}" role="tab" aria-controls="objects{{$data_id}}" aria-selected="true">Objects</a>
			</li>
		</ul>

		<div class="tab-content" id="myTabContent2">
			<div class="tab-pane mt-3 fade show active" id="objects{{$data_id}}" role="tabpanel" aria-labelledby="objects-tab{{$data_id}}">
					<ul class="editor-objects">
                        @if( !empty( $stages_list ) )
                            @foreach( $stages_list as $stageObj)
                                @php $stage_path = isset( $stageObj['path'] )? $stageObj['path'] : '';
							$stage_slug = isset( $stageObj['slug'] )? $stageObj['slug'] : '';
							$stage_title = isset( $stageObj['title'] )? $stageObj['title'] : '';
                                @endphp
                                <li>
                                    <a href="javascript:;" title="{{$stage_title}}" class="control-tool-item"
                                       data-drag_type="stage" data-object_path="/assets/admin/editor/stages/{{$stage_path}}" data-item_path="{{$stage_path}}" data-drag_object="{{$stage_slug}}">
                                        <img src="/assets/admin/editor/stages/{{$stage_path}}" style="width:65px">
                                    </a>
                                </li>
                            @endforeach
                        @endif
					@if( !empty( $objects_list ) )
						@foreach( $objects_list as $objectObj)
							@php $object_path = isset( $objectObj['path'] )? $objectObj['path'] : '';
							$object_slug = isset( $objectObj['slug'] )? $objectObj['slug'] : '';
							$object_title = isset( $objectObj['title'] )? $objectObj['title'] : '';
							@endphp
							<li>
								<a href="javascript:;" title="{{$object_title}}" class="control-tool-item"
								data-drag_type="stage_objects" data-object_path="/assets/admin/editor/objects/{{$object_path}}" data-item_path="{{$object_path}}" data-drag_object="{{$object_slug}}">
									<img src="/assets/admin/editor/objects/{{$object_path}}" style="width:65px">
								</a>
							</li>
						@endforeach
					@endif
					</ul>
			</div>



		</div>

	</div>

	<div class="editor-objects-block tab-pane fade" id="layers{{$data_id}}" role="tabpanel" aria-labelledby="profile-tab">
		<h5>Layers</h5>
        <ul class="nav nav-pills" id="myTab3" role="tablist">
            <li class="nav-item">
                <a class="nav-link show active" id="all_layers-tab{{$data_id}}" data-toggle="tab" href="#all_layers{{$data_id}}" role="tab" aria-controls="all_layers{{$data_id}}" aria-selected="true">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="levels_layers-tab{{$data_id}}" data-toggle="tab" href="#levels_layers{{$data_id}}" role="tab" aria-controls="levels_layers{{$data_id}}" aria-selected="true">Levels</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="clipboard_settings-tab{{$data_id}}" data-toggle="tab" href="#clipboard_settings{{$data_id}}" role="tab" aria-controls="clipboard_settings{{$data_id}}" aria-selected="true">Settings</a>
            </li>
        </ul>

        <div class="tab-pane mt-3 fade show active " id="all_layers{{$data_id}}" role="tabpanel" aria-labelledby="all_layers-tab{{$data_id}}">
            <ul class="editor-objects-list {{$data_id}}">
                @php
                    if( isset( $itemObj->id ) && !empty( $itemObj->LearningJourneyObjects->where('status','active') )){
                        foreach( $itemObj->LearningJourneyObjects->where('status','active') as $learningJourneyItemObj){

                            echo '<li data-id="rand_'.$learningJourneyItemObj->id.'" data-field_postition="2">'.$learningJourneyItemObj->item_slug.'
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                <img src="/assets/default/svgs/dots-three.svg" alt="">
                              </button>
                              <div class="dropdown-menu">
                                <i class="fa fa-trash"></i><i class="lock-layer fa fa-unlock"></i><i class="fa fa-sort"></i><i class="fa fa-copy"></i>
                                </div>
                            </div>
                            </li>
                            ';

                        }
                    }
                @endphp

            </ul>
        </div>

        <div class="tab-pane mt-3 fade" id="levels_layers{{$data_id}}" role="tabpanel" aria-labelledby="levels_layers-tab{{$data_id}}">
            <a href="javascript:;" class="add-level">+</a>
            <ul class="editor-objects-list levels-objects-list {{$data_id}}">
                @php
                    if( isset( $itemObj->id ) && !empty( $itemObj->LearningJourneyObjects->whereIn('item_type', array('topic', 'treasure', 'spacer'))->where('status','active') )){
                        foreach( $itemObj->LearningJourneyObjects->whereIn('item_type', array('topic', 'treasure', 'spacer'))->where('status','active') as $learningJourneyItemObj){

                            echo '<li data-id="rand_'.$learningJourneyItemObj->id.'" data-field_postition="2" data-link_position="left-in">'.$learningJourneyItemObj->item_slug.'
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                <img src="/assets/default/svgs/dots-three.svg" alt="">
                              </button>
                              <div class="dropdown-menu">
                                <i class="fa fa-recycle change-position"></i><i class="fa fa-plus add-spacer"></i><i class="fa fa-trash"></i><i class="lock-layer fa fa-unlock"></i><i class="fa fa-sort"></i>
                            </div>
                            </div>
                            </li>
                            ';

                        }
                    }
                @endphp

            </ul>
        </div>

        <div class="tab-pane mt-3 fade " id="clipboard_settings{{$data_id}}" role="tabpanel" aria-labelledby="clipboard_settings-tab{{$data_id}}">
            @if( !empty( $sets_list ) )
                @foreach( $sets_list as $directory_name => $directoryData)
                    @php $is_selected = ($stage_set == $directory_name)? 'active' : ''; @endphp
                    <ul class="editor-objects sets-selection {{$is_selected}}" data-set="{{$directory_name}}">
                        <h6 class="mt-20">{{$directory_name}}</h6>
                        @foreach( $directoryData as $set_data)
                            @php $object_path = isset( $set_data['path'] )? $set_data['path'] : '';
                $object_slug = isset( $set_data['slug'] )? $set_data['slug'] : '';
                $object_title = isset( $set_data['title'] )? $set_data['title'] : '';
                $svg_code = isset( $set_data['svg_code'] )? $set_data['svg_code'] : '';
                $svg_code = updateSvgDimensions($svg_code, '100%', '100%');
                            @endphp
                            <li>
                                <a href="javascript:;" title="{{$object_title}}" class="stage-tool-item item_{{$object_slug}}"
                                   data-drag_type="treasure" data-object_path="/assets/admin/editor/sets/{{$object_path}}" data-item_path="{{$object_path}}" data-drag_object="{{$object_slug}}">
                                    <img src="/assets/admin/editor/sets/{{$object_path}}" style="width:65px">
                                </a>

                                <div class="svg_code hide">
                                    {!! $svg_code !!}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            @endif

            <h6 class="mt-20">Path Setting</h6>
            <ul>
                <li>
                    <a href="javascript:;" title="Path 1" class="path-tool-item item_path1" data-target_class="default-path">
                        Path 1
                    </a>
                </li>
                <li>
                    <a href="javascript:;" title="Path 2" class="path-tool-item item_path2" data-target_class="roadmap">
                        Path 2
                    </a>
                </li>
            </ul>

            <h6 class="mt-20">Templates Layouts</h6>
            <ul>
                <li>
                    <a href="javascript:;" title="Layout 1" class="layout-template-item item_path1" data-target_layout="layout1">
                        Layout 1
                    </a>
                </li>
                <li>
                    <a href="javascript:;" title="Layout 2" class="layout-template-item item_path2" data-target_layout="layout2">
                        Layout 2
                    </a>
                </li>
            </ul>

        </div>



	</div>

    <div class="editor-objects-block tab-pane fade" id="stage_settings{{$data_id}}" role="tabpanel" aria-labelledby="stage_settings-tab">
    <div class="page-settings-fields">
        <h5>Levels</h5>
        <div class="option-field-item">
            <label>Stage Name</label>
            <div class="input-group">
                <input type="text" name="stage_name" class="form-control trigger_field"
                       value="" data-field_id="stage_name" data-field_name="stage_name"
                       data-field_type="data" data-id="">
            </div>
        </div>
        <div class="option-field-item">
            <label>Background Color</label>
            <div class="input-group">
                <input type="text" name="background_color" class="form-control trigger_field colorpickerinput"
                       value="#ffffff" data-field_id="page_background" data-field_name="background"
                       data-field_type="page_style" data-id="">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <i class="fas fa-fill-drip"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="option-field-item">
            <label>Background Image</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text admin-file-manager" data-input="background_image" data-preview="holder">
                        <i class="fa fa-upload"></i>
                    </button>
                </div>
                <input type="text"  data-field_id="background_image" data-field_name="background_image"
                       data-field_type="page_style" data-id="" name="background_image" id="background_image" value="" class="trigger_field form-control ">
                <div class="input-group-append">
                    <button type="button" class="input-group-text admin-file-view" data-input="background_image">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="option-field-item">
            <label>Height</label>
            <div class="input-group">
                <input type="number" name="page_height" class="form-control trigger_field"
                       value="800" data-field_id="page_height" data-field_name="height" min="800"
                       data-field_type="page_style" data-id="">
            </div>
        </div>

        <div class="option-field-item">
            <label class="custom-switch pl-0">
                <input type="hidden" name="page_graph" class="trigger_field" value="0" data-field_id="page_graph" data-field_name="graph" data-field_type="page_style" data-id="">
                <input type="checkbox" name="page_graph_radio" id="rtlSwitch" value="1" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <label class="custom-switch-description mb-0 cursor-pointer" for="rtlSwitch">Enable Graph</label>
            </label>
        </div>
        <input type="text" name="stage_set" class="form-control trigger_field"
               value="{{$stage_set}}" data-field_id="stage_set" data-field_name="stage_set"
               data-field_type="page_set" data-id="">

        <h6 class="mt-20">Topic Settings</h6>


        <div class="option-field-item">
            <label>Passing Scores (%)</label>
            <div class="input-group">
                <input type="number" name="passing_scores" class="form-control trigger_field"
                       value="90" data-field_id="passing_scores" data-field_name="passing_scores" min="50" max="100"
                       data-field_type="page_data" data-id="">
            </div>
        </div>

        <div class="option-field-item mt-20 mb-20">
            <label class="custom-switch pl-0">
                <input type="hidden" name="shuffle_questions" class="trigger_field" value="0" data-field_id="shuffle_questions" data-field_name="shuffle_questions" data-field_type="page_data" data-id="">
                <input type="checkbox" name="shuffle_questions_radio" id="shuffle_questions" value="1" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <label class="custom-switch-description mb-0 cursor-pointer" for="shuffle_questions">Shuffle Questions</label>
            </label>
        </div>




    </div>
</div>
</div>


<div class="option-fields-block hide">




	@if( !empty( $stages_list ) )
		@foreach( $stages_list as $stageObj)
			@php
			$stage_slug = isset( $stageObj['slug'] )? $stageObj['slug'] : '';
			@endphp
			<div class="infobox-{{$stage_slug}}-fields">
				<div class="option-field-item">
					<label>Size (px)</label>
					<div class="input-group">
						<input type="number" name="stage_width" class="form-control trigger_field"
								   value="500" data-field_id="stage_width" data-field_name="width"
						   data-field_type="style" data-id="">

						</div>
				</div>
				<div class="option-field-item">
					<label>Fill Color</label>
					<div class="input-group">
						<input type="text" name="background_color" class="form-control trigger_field colorpickerinput"
								   value="#ffffff" data-field_id="fill_color" data-field_name="fill"
						   data-field_type="svg_path_style" data-id="">
							<div class="input-group-append">
								<div class="input-group-text">
									<i class="fas fa-fill-drip"></i>
								</div>
							</div>
						</div>
				</div>
			</div>
		@endforeach
	@endif

	@if( !empty( $paths_list ) )
		@foreach( $paths_list as $pathObj)
			@php
			$obj_slug = isset( $pathObj['slug'] )? $pathObj['slug'] : '';
			$svg_code = isset( $pathObj['svg_code'] )? $pathObj['svg_code'] : '';
			@endphp
			<div class="infobox-{{$obj_slug}}-fields">
				<div class="option-field-item">
					<label>Size (px)</label>
					<div class="input-group">
						<input type="number" name="path_width" class="form-control trigger_field"
								   value="300" data-field_id="path_width" data-field_name="width"
						   data-field_type="style" data-id="">

						</div>
				</div>
				<div class="option-field-item">
					<label>Fill Color</label>
					<div class="input-group">
						<input type="text" name="background_color" class="form-control trigger_field colorpickerinput"
								   value="#ffffff" data-field_id="fill_color" data-field_name="fill"
						   data-field_type="svg_path_style" data-id="">
							<div class="input-group-append">
								<div class="input-group-text">
									<i class="fas fa-fill-drip"></i>
								</div>
							</div>
						</div>
				</div>
			</div>
		@endforeach
	@endif

	@if( !empty( $objects_list ) )
		@foreach( $objects_list as $objectObj)
			@php
			$obj_slug = isset( $objectObj['slug'] )? $objectObj['slug'] : '';
			$svg_code = isset( $objectObj['svg_code'] )? $objectObj['svg_code'] : '';
			@endphp
			<div class="infobox-{{$obj_slug}}-fields">
				<div class="option-field-item">
					<label>Size (px)</label>
					<div class="input-group">
						<input type="number" name="object_width" class="form-control trigger_field"
								   value="180" data-field_id="object_width" data-field_name="width"
						   data-field_type="style" data-id="">

						</div>
				</div>
				<div class="option-field-item">
					<label>Fill Color</label>
					<div class="input-group">
						<input type="text" name="background_color" class="form-control trigger_field colorpickerinput"
								   value="#ffffff" data-field_id="fill_color" data-field_name="fill"
						   data-field_type="svg_path_style" data-id="">
							<div class="input-group-append">
								<div class="input-group-text">
									<i class="fas fa-fill-drip"></i>
								</div>
							</div>
						</div>
				</div>
			</div>
		@endforeach
	@endif

	@if( !empty( $topics_list ) )
		@foreach( $topics_list as $topicObj)
			@php
			$obj_slug = isset( $topicObj['slug'] )? $topicObj['slug'] : '';
			$svg_code = isset( $topicObj['svg_code'] )? $topicObj['svg_code'] : '';
			@endphp
			<div class="infobox-{{$obj_slug}}-fields">
				<div class="option-field-item">
					<label>Size (px)</label>
					<div class="input-group">
						<input type="number" name="topic_width" class="form-control trigger_field"
								   value="180" data-field_id="topic_width" data-field_name="width"
						   data-field_type="style" data-id="">

						</div>
				</div>
				<div class="option-field-item">
					<label>Fill Color</label>
					<div class="input-group">
						<input type="text" name="background_color" class="form-control trigger_field colorpickerinput"
								   value="#ffffff" data-field_id="fill_color" data-field_name="fill"
						   data-field_type="svg_path_style" data-id="">
							<div class="input-group-append">
								<div class="input-group-text">
									<i class="fas fa-fill-drip"></i>
								</div>
							</div>
						</div>
				</div>

                <div class="option-field-item">
                    <label>Topic Order No</label>
                    <div class="input-group">
                        <input type="number" name="topic_order_no" class="form-control trigger_field"
                               value="0" data-field_id="topic_order_no" data-field_name="topic_order_no"
                                data-id="">

                    </div>
                </div>


                <div class="option-field-item">
                    <label class="input-label">Chapter</label>
                    <select data-field_id="chapter_id"
                            class="trigger_field form-control ajax-chapter-dropdown" data-field_name="select_chapter" data-field_type="select_chapter"
                            data-placeholder="Search Chapter" data-id="">
                        <option value="">Please select year, subject</option>
                    </select>
                    @error('chapter_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="option-field-item">
                    <label class="input-label">Sub Chapter</label>
                    <select data-field_id="sub_chapter_id"
                            class="trigger_field form-control ajax-subchapter-dropdown" data-field_name="select_subchapter" data-field_type="select_subchapter"
                            data-placeholder="Search Sub Chapter" data-id="">
                        <option value="">Please select year, subject, Topic</option>
                    </select>
                    @error('sub_chapter_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
				<div class="option-field-item">
					<label class="input-label">Topic</label>
					<select data-field_id="topic"
							data-search-option="topic"
							class="trigger_field form-control ajax-topicpart-item-dropdown search_topic1" data-field_name="select_topic" data-field_type="select_topic"
							data-placeholder="Search Topic" data-id="">
					</select>
				</div>
			</div>
		@endforeach
	@endif

    @if( !empty( $treasures_list ) )
        @foreach( $treasures_list as $treasureObj)
            @php
                $obj_slug = isset( $treasureObj['slug'] )? $treasureObj['slug'] : '';
                $svg_code = isset( $treasureObj['svg_code'] )? $treasureObj['svg_code'] : '';
            @endphp
            <div class="infobox-{{$obj_slug}}-fields">
                <div class="option-field-item">
                    <label>Size (px)</label>
                    <div class="input-group">
                        <input type="number" name="topic_width" class="form-control trigger_field"
                               value="180" data-field_id="topic_width" data-field_name="width"
                               data-field_type="style" data-id="">

                    </div>
                </div>
                <div class="option-field-item">
                    <label>Fill Color</label>
                    <div class="input-group">
                        <input type="text" name="background_color" class="form-control trigger_field colorpickerinput"
                               value="#ffffff" data-field_id="fill_color" data-field_name="fill"
                               data-field_type="svg_path_style" data-id="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-fill-drip"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="option-field-item">
                    <label>No of Coins</label>
                    <div class="input-group">
                        <input type="number" name="no_of_coins" class="form-control trigger_field"
                               value="0" data-field_id="no_of_coins" data-field_name="no_of_coins"
                               data-id="">
                    </div>
                </div>

                <div class="option-field-item">
                    <label>Topic Order No</label>
                    <div class="input-group">
                        <select data-field_id="treasure_topic_order_no"
                                class="trigger_field form-control treasure_topic_order_no" data-field_name="treasure_topic_order_no" data-field_type="treasure_topic_order_no"
                                data-placeholder="Select Topic Order No" data-id="">
                        </select>
                    </div>
                </div>
            </div>
        @endforeach
    @endif



</div>



<div class="svgs-data rurera-hide">


	@if( !empty( $stages_list ) )
		@foreach( $stages_list as $stageObj)
			@php
			$stage_slug = isset( $stageObj['slug'] )? $stageObj['slug'] : '';
			$svg_code = isset( $stageObj['svg_code'] )? $stageObj['svg_code'] : '';
			$svg_code = updateSvgDimensions($svg_code, '100%', '100%');
			@endphp
			<div class="{{$stage_slug}}_svg">
				{!! $svg_code !!}
			</div>
		@endforeach
	@endif

	@if( !empty( $paths_list ) )
		@foreach( $paths_list as $pathObj)
			@php
			$obj_slug = isset( $pathObj['slug'] )? $pathObj['slug'] : '';
			$svg_code = isset( $pathObj['svg_code'] )? $pathObj['svg_code'] : '';
			$svg_code = updateSvgDimensions($svg_code, '100%', '100%');
			@endphp
			<div class="{{$obj_slug}}_svg">
				{!! $svg_code !!}
			</div>
		@endforeach
	@endif

	@if( !empty( $objects_list ) )
		@foreach( $objects_list as $objectObj)
			@php
			$obj_slug = isset( $objectObj['slug'] )? $objectObj['slug'] : '';
			$svg_code = isset( $objectObj['svg_code'] )? $objectObj['svg_code'] : '';
			$svg_code = updateSvgDimensions($svg_code, '100%', '100%');
			@endphp
			<div class="{{$obj_slug}}_svg">
				{!! $svg_code !!}
			</div>
		@endforeach
	@endif

	@if( !empty( $topics_list ) )
		@foreach( $topics_list as $topicObj)
			@php
			$obj_slug = isset( $topicObj['slug'] )? $topicObj['slug'] : '';
			$svg_code = isset( $topicObj['svg_code'] )? $topicObj['svg_code'] : '';
			$svg_code = updateSvgDimensions($svg_code, '100%', '100%');
			@endphp
			<div class="{{$obj_slug}}_svg">
				{!! $svg_code !!}
			</div>
		@endforeach
	@endif

    @if( !empty( $treasures_list ) )
        @foreach( $treasures_list as $treasureObj)
            @php
                $obj_slug = isset( $treasureObj['slug'] )? $treasureObj['slug'] : '';
                $svg_code = isset( $treasureObj['svg_code'] )? $treasureObj['svg_code'] : '';
                $svg_code = updateSvgDimensions($svg_code, '100%', '100%');
            @endphp
            <div class="{{$obj_slug}}_svg">
                {!! $svg_code !!}
            </div>
        @endforeach
    @endif

</div>
