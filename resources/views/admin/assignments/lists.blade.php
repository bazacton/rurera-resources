@extends('admin.layouts.app')

@push('libraries_top')

@endpush


@section('content')
<section class="section skeleton">
    <div class="section-header">
        <h1>Assignments</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">Timestables Assignments</div>
        </div>
    </div>
    <section class="card">
        <div class="card-body">
            <form action="/admin/assignments" id="topic_parts_search_form" method="get" class="row mb-0">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="input-label">{{trans('admin/main.category')}}</label>
                        <div class="select-holder">
                            <select name="category_id" data-plugin-selectTwo class="form-control populate ajax-category-courses form-control" data-course_id="{{get_filter_request('subject_id', 'assignments_search')}}">
                                <option value="">{{trans('admin/main.all_categories')}}</option>
                                @foreach($categories as $category)
                                    @if(!empty($category->subCategories) and count($category->subCategories))
                                        <optgroup label="{{  $category->title }}">
                                            @foreach($category->subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}" @if(get_filter_request('category_id', 'assignments_search') == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                            @endforeach
                                        </optgroup>
                                    @else
                                        <option value="{{ $category->id }}" @if(get_filter_request('category_id', 'assignments_search') == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Subjects</label>
                        <div class="select-box">
                            <select data-return_type="option"
                                    data-default_id="{{request()->get('subject_id')}}" data-chapter_id="{{get_filter_request('chapter_id', 'assignments_search')}}"
                                    class="ajax-courses-dropdown year_subjects form-control select2 @error('subject_id') is-invalid @enderror"
                                    id="subject_id" name="subject_id">
                                <option disabled selected>Subject</option>
                            </select>
                        </div>
                        @error('subject_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="input-label">{{ trans('admin/main.end_date') }}</label>
                        <div class="input-group">
                            <input type="date" id="lsdate" class="text-center form-control" name="to" value="{{ request()->get('to') }}" placeholder="End Date">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-primary w-100">{{ trans('admin/main.show_results') }}</button>
                </div>
            </form>
        </div>
        @php $saved_templates = $user->saved_templates;
				$saved_templates = json_decode( $saved_templates );
				$saved_templates = isset( $saved_templates->assignments_search )? $saved_templates->assignments_search : array();
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
                    <span class="apply-template-field" data-form_id="topic_parts_search_form" data-template_type="assignments_search" data-template_data="{{$template_data}}"> {!! $url_params !!} <a href="javascript:;" data-template_name="{{$template_name}}" class="remove-template"><i class="fas fa-times"></i></a></span>
                @endforeach
            @endif
            <button type="button" class="btn btn-success save-template" data-form_id="topic_parts_search_form" data-template_type="assignments_search" ><i class="fas fa-save"></i> Save Template</button>
        </div>
    </section>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary skelton-hide">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header skelton-hide skelton-height-lg skelton-mb-0">
                        <h4>Total Assignments</h4>
                    </div>
                    <div class="card-body skelton-hide skelton-height-lg skelton-mb-0">
                        {{ $totalAssignments }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12">
            <div class="admin-rurera-tabs-holder">
                <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{($assignment_tab == 'all')? 'active' : ''}}" id="topics-tab" href="/admin/assignments">
                            <i class="fas fa-file mx-0"></i>
                            <span class="tab-title">All Assignments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{($assignment_tab == 'scheduled')? 'active' : ''}}" id="topics-tab" href="/admin/assignments/scheduled" >
                            <i class="fas fa-calendar-week mx-0"></i>
                            <span class="tab-title">Scheduled</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{($assignment_tab == 'running')? 'active' : ''}}" id="topics-tab" href="/admin/assignments/running" >
                            <i class="fas fa-car mx-0"></i>
                            <span class="tab-title">Running</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{($assignment_tab == 'completed')? 'active' : ''}}" id="topics-tab" href="/admin/assignments/completed" >
                            <i class="fas fa-thumbs-up mx-0"></i>
                            <span class="tab-title">Completed</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{($assignment_tab == 'paused')? 'active' : ''}}" id="topics-tab" href="/admin/assignments/paused" >
                            <i class="fas fa-pause mx-0"></i>
                            <span class="tab-title">Paused</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12">
            <div class="assignments-table">
                <div class="card">
                    <div class="card-header bg-light">
                        <h6 class="mb-0"><span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span> Assignments</h6>
                        @can('admin_assignments_create')
                            <div class="text-right ml-auto">
                                <a href="{{ getAdminPanelUrl() }}/assignments/create" class="simple-btn">Create Assignment</a>
                            </div>
                        @endcan
                    </div>

                    <div class="card-body p-0 table-sm">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Type</th>
                                    <th>Questions</th>
                                    <th>Participations</th>
                                    <th>Start & End Date</th>
                                    <th>Accuracy</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($assignments->count() > 0)
                            @foreach($assignments as $assignmentObj)
                                <tr>
                                    <td data-th="Type">
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">{{ getQuizTypeTitle($assignmentObj->assignment_type) }}</div>
                                    </td>
                                    <td data-th="Questions">
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">{{$assignmentObj->no_of_questions}}</div>
                                    </td>
                                    <td data-th="Participations">
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">{{$assignmentObj->students->where('status', '!=', 'inactive')->count()}}</div>
                                    </td>
                                    <td data-th="Start & End Date">
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">{{dateTimeFormat($assignmentObj->assignment_start_date, 'j M Y')}} / {{dateTimeFormat($assignmentObj->assignment_end_date, 'j M Y')}}</div>
                                    </td>
                                    <td data-th="Accuracy">
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                            <div class="circle_percent circle-green" data-percent="50">
                                                <div class="circle_inner">
                                                    <div class="round_per" style="transform: rotate(360deg);"></div>
                                                </div>
                                                <div class="circle_inbox">
                                                    <span class="percent_text">50%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Status" class="text-success font-weight-bold">
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">{{$assignmentObj->status}}</div>
                                    </td>
                                    <td data-th="Actions">
                                        <div class="pending-invites-controls">
                                            <a class="dropdown-item" href="/admin/assignments/{{$assignmentObj->id}}/progress"><img src="/assets/default/svgs/envelope.svg" alt="envelope" class="mr-0"> Progress</a>
                                            <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt="print" class="mr-0"> Print</a>
                                            <a class="dropdown-item" href="#"><img src="/assets/default/svgs/delete-menu.svg" alt="trash-bin" class="mr-0"> Delete</a>
                                            <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope" class="mr-0"> Email To Prent</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td data-th="no-records" colspan="7">
                                        No Records Found!
                                    </td>
                                </tr>
                            @endif


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="rurera-pagination">{{$assignments->links()}}</div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts_bottom')
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
        });
    </script>
    <script>
        /*Skelton Loading Fungtion Start*/
        $(document).ready(function () {
            const $el = document.querySelector(".section");

            setTimeout(() => {
            $el.classList.remove("skeleton");
            $el
                .querySelectorAll(".skelton-hide")
                .forEach((el) => el.classList.remove("skelton-hide"));
            }, 3000);
        });
        /*Skelton Loading Fungtion End*/
    </script>
@endpush
