@php use App\Models\QuizzesQuestion; @endphp
@extends('admin.layouts.app')

@push('libraries_top')
<style>
    .hide {
        display: none;
    }
	
	.defined-searches {
		background: #efefef;
		padding: 10px;
	}
	.defined-searches .apply-template-field {
		margin-right: 10px;
		padding-top: 9px;
		display: inline-block;
	}

	.save-template {
		float: right;
	}
</style>
<style>
        .table-container { margin-top: 20px; }
        .dropdown-menu { padding: 15px; width: 300px; max-height: 400px; overflow-y: auto; }
        .dropdown-menu h5 { margin-top: 10px; font-weight: bold; }
        .search-input { width: 100%; margin-bottom: 10px; padding: 5px; border: 1px solid #ccc; border-radius: 4px; }
        .toggle-switch { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
        .drag-handle { cursor: move; padding: 0 5px; color: #007bff; font-weight: bold; margin-right: 10px; }
        .dropdown-toggle { background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
        .hidden-column { display: none; }
    </style>
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>API Requests</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">API Requests</div>
        </div>
    </div>


    <div class="section-body">

        <section class="card">
            <div class="card-body">
                <form action="/admin/topics_parts" id="topic_parts_search_form" method="get" class="row mb-0">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="input-label">{{trans('admin/main.category')}}</label>
                            <select name="category_id" data-plugin-selectTwo class="form-control populate ajax-category-courses" data-course_id="{{get_filter_request('subject_id', 'topics_search')}}">
                                <option value="">{{trans('admin/main.all_categories')}}</option>
                                @foreach($categories as $category)
                                @if(!empty($category->subCategories) and count($category->subCategories))
                                <optgroup label="{{  $category->title }}">
                                    @foreach($category->subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" @if(get_filter_request('category_id', 'topics_search') == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                    @endforeach
                                </optgroup>
                                @else
                                <option value="{{ $category->id }}" @if(get_filter_request('category_id', 'topics_search') == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
					
					
					
					

					<div class="col-md-4">
					<div class="form-group">
						<label>Subjects</label>
						<select data-return_type="option"
								data-default_id="{{request()->get('subject_id')}}" data-chapter_id="{{get_filter_request('chapter_id', 'topics_search')}}"
								class="ajax-courses-dropdown year_subjects form-control select2 @error('subject_id') is-invalid @enderror"
								id="subject_id" name="subject_id">
							<option disabled selected>Subject</option>
						</select>
						@error('subject_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					</div>
					
					
					<div class="col-md-4">
					<div class="form-group">
						<label class="input-label">Topic</label>
						<select data-sub_chapter_id="{{get_filter_request('sub_chapter_id', 'topics_search')}}" id="chapter_id"
								class="form-control populate ajax-chapter-dropdown @error('chapter_id') is-invalid @enderror"
								name="chapter_id">
							<option value="">Please select year, subject</option>
						</select>
						@error('chapter_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror

					</div>
					</div>
					
					
					<div class="col-md-4">
					<div class="form-group">
						<label class="input-label">Sub Topic</label>
						<select id="chapter_id"
							class="form-control populate ajax-subchapter-dropdown @error('sub_chapter_id') is-invalid @enderror"
							name="sub_chapter_id">
						<option value="">Please select year, subject, Topic</option>
					</select>
					@error('sub_chapter_id')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
					

					</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">	
							<label class="input-label">Author</label>
							<select name="user_id" data-search-option="display_name" class="form-control "
									data-placeholder="Search author">

									<option value="">Select Author</option>
								@if(!empty($users_list) and $users_list->count() > 0)
									@foreach($users_list as $userObj)
										@php $checked = (get_filter_request('user_id', 'topics_search') == $userObj->id)? 'selected' : ''; @endphp
										<option value="{{ $userObj->id }}" {{$checked}}>{{ $userObj->get_full_name() }}</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>


                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn btn-primary w-100">{{ trans('admin/main.show_results') }}</button>
						
                    </div>
                </form>
            </div>
				@php $saved_templates = $user->saved_templates;
				$saved_templates = json_decode( $saved_templates );
				$saved_templates = isset( $saved_templates->topics_search )? $saved_templates->topics_search : array();
				@endphp
				<div class="defined-searches mt-20" style="display:none">
				<span><strong>Defined Searches:</strong></span>
					@if( !empty( $saved_templates ) )
						@foreach( $saved_templates  as $template_name => $template_data)
							@php $template_array = json_decode($template_data); 
							$url_params = '<span>'.$template_name.'</span>'; 
							if( isset( $template_array->url_params )){
								$url_params = '<a href="'.(string) url("").'/admin/topics_parts/?'.$template_array->url_params.'">'.$template_name.'</a>';
							}
							@endphp
							<span class="apply-template-field" data-form_id="topic_parts_search_form" data-template_type="topics_search" data-template_data="{{$template_data}}"> {!! $url_params !!} <a href="javascript:;" data-template_name="{{$template_name}}" class="remove-template"><i class="fas fa-times"></i></a></span>
						@endforeach
					@endif
					<button type="button" class="btn btn-success save-template" data-form_id="topic_parts_search_form" data-template_type="topics_search" ><i class="fas fa-save"></i> Save Template</button>
				</div>
        </section>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
				
					<div class="card-header">
						<div class="columns-settings">
							<div class="dropdown">
								<button class="dropdown-toggle" type="button" data-toggle="dropdown">
									<img src="/assets/default/svgs/grid-plus.svg">
								</button>
								<div class="dropdown-menu">
									<input type="text" class="search-input" id="searchInput" placeholder="Search by item..." onkeyup="filterColumns()">
									
									<h5>Shown Attributes</h5>
									<ul id="shownAttributes" class="column-list"></ul>

									<h5>Hidden Attributes</h5>
									<ul id="hiddenAttributes" class="column-list"></ul>

									<button class="btn btn-secondary w-100 mt-3" onclick="restoreDefault()">Restore Default</button>
									<button class="btn btn-primary w-100 mt-2" onclick="saveChanges()">Save Changes</button>
								</div>
							</div>

						</div>
                    @can('admin_topic_parts_create')
                        <div class="text-right">
                            <a href="/admin/questions-generator/prompt" class="btn btn-primary">New API Request</a>
                        </div>
                    @endcan
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped font-14" id="myTable">
                                <tr id="tableHeader">
                                    <th class="text-left">API Type</th>
                                    <th class="text-left">Category</th>
                                    <th class="text-left">Questions Type</th>
									<th class="text-left">Total Questions</th>
									<th class="text-left">Generated / Waiting / Rejected</th>
                                    <th class="text-left">Added by</th>
                                    <th class="text-left">Added Date</th>
                                    <th>{{ trans('admin/main.actions') }}</th>
                                </tr>

                                @foreach($AiApiCalls as $AiApiCallObj)
								
								
                                <tr>
                                    <td data-id="api_type">
                                        <span>{{ $AiApiCallObj->api_type }}</span>
                                    </td>
									<td data-id="category" class="text-left">{{ (isset($AiApiCallObj->category->id))? $AiApiCallObj->category->getTitleAttribute() : '-' }}
									<br>
										<small>
										{{ (isset($AiApiCallObj->subject->id))? $AiApiCallObj->subject->getTitleAttribute() : '-' }} / 
										{{ (isset($AiApiCallObj->chapter->id))? $AiApiCallObj->chapter->getTitleAttribute() : '-' }} / 
										{{ (isset($AiApiCallObj->subChapter->id))? $AiApiCallObj->subChapter->sub_chapter_title : '-' }}
										</small>
									</td>
									<td class="text-left" data-id="question_type">{{ $AiApiCallObj->question_type }}</td>
									<td class="text-left" data-id="total_questions">{{ $AiApiCallObj->total_questions }}</td>
									<td class="text-left" data-id="generated_questions">{{ $AiApiCallObj->generated_questions }} / {{ $AiApiCallObj->waiting_questions }} / {{ $AiApiCallObj->rejected_questions }}</td>
                                    <td class="text-left" data-id="user">{{ $AiApiCallObj->user->get_full_name() }}</td>
                                    <td class="text-left" data-id="created_at">{{ dateTimeFormat($AiApiCallObj->created_at, 'j M y | H:i') }}</td>
                                    <td data-id="action">
                                        @can('admin_topic_parts_edit')
										@if($AiApiCallObj->status == 'active')
											@if($AiApiCallObj->api_response == '')
												<a href="/admin/questions-generator/add-response/{{ $AiApiCallObj->id }}" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
													Add Response
												</a>
											@else
												<a href="/admin/questions-generator/view-api-response/{{ $AiApiCallObj->id }}" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
													Generate Questions
												</a>
											@endif
										@endif
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        {{ $AiApiCalls->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="template_save_modal" class="template_save_modal modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-body">
			  <div class="modal-box">
				<h3 class="font-24 font-weight-normal mb-10">Save the Template</h3>
				<p class="mb-15 font-16">
					<input type="text" name="template_name" class="template_name form-control">
				</p>
				<input type="hidden" name="form_data_encoded" class="form_data_encoded">
				<input type="hidden" name="template_type" class="template_type">
				<input type="hidden" name="form_id" class="form_id">
				
				<div class="inactivity-controls">
					<a href="javascript:;" class="continue-btn save-template-btn button btn btn-primary">Save Template</a>
					<a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a>
				</div>
			  </div>
			</div>
        </div>
    </div>
</div>
@endsection

@push('scripts_bottom')


<script>
	$(document).ready(function () {
		const defaultColumns = [
			{ id: 'api_type', text: 'API Type', visible: true },
			{ id: 'category', text: 'Category', visible: true },
			{ id: 'question_type', text: 'Questions Type', visible: true },
			{ id: 'total_questions', text: 'Total Questions', visible: true },
			{ id: 'generated_questions', text: 'Generated', visible: true },
			{ id: 'user', text: 'Added by', visible: true },
			{ id: 'created_at', text: 'Added Date', visible: true },
			{ id: 'action', text: 'Action', visible: true }
		];

		let columns = $.extend(true, [], defaultColumns); // Deep copy of default columns
		const $shownAttributes = $('#shownAttributes');
		const $hiddenAttributes = $('#hiddenAttributes');
		const $tableHeader = $('#tableHeader');
		const $searchInput = $('#searchInput');
		let currentOrder = columns.map(col => col.id);

		function renderTableHeaders() {
			$tableHeader.empty();
			columns.forEach(col => {
				const $th = $('<th>').text(col.text).data('id', col.id);
				$th.toggleClass('hidden-column', !col.visible);
				$tableHeader.append($th);
			});

			$('#myTable tbody tr').each(function () {
				$(this).children().each(function (index) {
					$(this).toggleClass('hidden-column', !columns[index].visible);
				});
			});
		}

		function renderColumnLists() {
			$shownAttributes.empty();
			$hiddenAttributes.empty();

			columns.forEach(col => {
				const $li = $('<li>').addClass('toggle-switch').data('id', col.id).attr('draggable', true);
				const $label = $('<span>').text(col.text);
				const $toggle = $('<input>').attr('type', 'checkbox').prop('checked', col.visible);
				const $dragHandle = $('<span>').text('☰').addClass('drag-handle');

				$toggle.change(() => toggleColumnVisibility(col.id));
				$li.append($dragHandle, $label, $toggle);

				if (col.visible) {
					$shownAttributes.append($li);
				} else {
					$hiddenAttributes.append($li);
				}

				$li.on('dragstart', handleDragStart)
					.on('dragover', handleDragOver)
					.on('drop', handleDrop)
					.on('dragend', handleDragEnd);
			});
		}

		let draggedItem = null;

		function handleDragStart(event) {
			draggedItem = $(event.target);
			event.originalEvent.dataTransfer.effectAllowed = 'move';
			setTimeout(() => draggedItem.addClass('dragging'), 0);
		}

		function handleDragOver(event) {
			event.preventDefault();
			const $target = $(event.target).closest('li');
			if ($target.length && $target[0] !== draggedItem[0]) {
				const bounding = $target[0].getBoundingClientRect();
				const offset = event.originalEvent.clientY - bounding.top;
				if (offset > bounding.height / 2) {
					$target.after(draggedItem);
				} else {
					$target.before(draggedItem);
				}
			}
		}

		function handleDrop(event) {
			event.preventDefault();
			draggedItem.removeClass('dragging');
			updateCurrentOrder();
			renderTableHeaders();
		}

		function handleDragEnd() {
			draggedItem = null;
		}

		function toggleColumnVisibility(id) {
			const col = columns.find(col => col.id === id);
			col.visible = !col.visible;
			renderTableHeaders();
			renderColumnLists();
		}

		function updateCurrentOrder() {
			currentOrder = $shownAttributes.children('li').map((_, li) => $(li).data('id')).get();
			columns.sort((a, b) => currentOrder.indexOf(a.id) - currentOrder.indexOf(b.id));
		}

		function filterColumns() {
			const filter = $searchInput.val().toLowerCase();
			columns.forEach(col => {
				const $li = $(`li[data-id="${col.id}"]`);
				if (col.text.toLowerCase().includes(filter)) {
					$li.show();
				} else {
					$li.hide();
				}
			});
		}

		function restoreDefault() {
			columns = $.extend(true, [], defaultColumns); // Reset to default columns
			currentOrder = defaultColumns.map(col => col.id); // Reset to default order
			renderTableHeaders();
			renderColumnLists();
			
			const visibleColumns = columns.filter(col => col.visible).map(col => col.id);
			const hiddenColumns = columns.filter(col => !col.visible).map(col => col.id);
			$('#output').html(`
				<p>Visible Columns (Default): ${visibleColumns.join(', ')}</p>
				<p>Hidden Columns (Default): ${hiddenColumns.join(', ')}</p>
				<p>Current Order (Default): ${currentOrder.join(', ')}</p>
			`);
		}

		function saveChanges() {
			const visibleColumns = columns.filter(col => col.visible).map(col => col.id);
			const hiddenColumns = columns.filter(col => !col.visible).map(col => col.id);
			$('#output').html(`
				<p>Visible Columns: ${visibleColumns.join(', ')}</p>
				<p>Hidden Columns: ${hiddenColumns.join(', ')}</p>
				<p>Current Order: ${currentOrder.join(', ')}</p>
			`);
		}

		$searchInput.on('input', filterColumns);
		$('#restoreDefault').on('click', restoreDefault);
		$('#saveChanges').on('click', saveChanges);

		renderTableHeaders();
		renderColumnLists();
	});

</script>
<script type="text/javascript">

    $(document).ready(function () {
		
		
		$(document).on('change', '.ajax-category-courses', function () {
			var category_id = $(this).val();
			var course_id = $(this).attr('data-course_id');
			$.ajax({
				type: "GET",
				url: '/admin/webinars/courses_by_categories',
				data: {'category_id': category_id, 'course_id': course_id},
				success: function (return_data) {
					$(".ajax-courses-dropdown").html(return_data);
					$(".ajax-chapter-dropdown").html('<option value="">Please select year, subject</option>');
					$('.ajax-courses-dropdown').change();
				}
			});
		});

		$(document).on('change', '.ajax-courses-dropdown', function () {
			var course_id = $(this).val();
			var chapter_id = $(this).attr('data-chapter_id');

			$.ajax({
				type: "GET",
				url: '/admin/webinars/chapters_by_course',
				data: {'course_id': course_id, 'chapter_id': chapter_id},
				success: function (return_data) {
					$(".ajax-chapter-dropdown").html(return_data);
					$('.ajax-chapter-dropdown').change();
				}
			});
		});

		$(document).on('change', '.ajax-chapter-dropdown', function () {
			var chapter_id = $(this).val();
			var sub_chapter_id = $(this).attr('data-sub_chapter_id');
			$.ajax({
				type: "GET",
				url: '/admin/webinars/sub_chapters_by_chapter',
				data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id},
				success: function (return_data) {
					$(".ajax-subchapter-dropdown").html(return_data);
				}
			});
		});
        $(".ajax-category-courses").change();
		
    });
	
	
</script>

@endpush
