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
                        <label class="input-label skelton-hide skelton-height-lg">{{trans('admin/main.category')}}</label>
                        <div class="select-box skelton-hide skelton-height-lg skelton-mb-0">
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
                        <label class="skelton-hide skelton-height-lg">Subjects</label>
                        <div class="select-box skelton-hide skelton-height-lg skelton-mb-0">
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
                        <label class="input-label skelton-hide skelton-height-lg">{{ trans('admin/main.end_date') }}</label>
                        <div class="input-group skelton-hide skelton-height-lg skelton-mb-0">
                            <input type="date" id="lsdate" class="text-center form-control" name="to" value="{{ request()->get('to') }}" placeholder="End Date">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-primary w-100 skelton-hide skelton-height-lg skelton-mb-0">{{ trans('admin/main.show_results') }}</button>
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
            <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                <li class="nav-item skelton-hide skelton-height-lg">
                    <a class="nav-link active" id="topics-tab" href="/admin/assignments">
                        <span class="tab-title">All assignments</span>
                    </a>
                </li>
                <li class="nav-item skelton-hide skelton-height-lg">
                    <a class="nav-link" id="topics-tab" href="/admin/assignments/scheduled" >
                        <span class="tab-title">Scheduled</span>
                    </a>
                </li>
                <li class="nav-item skelton-hide skelton-height-lg">
                    <a class="nav-link" id="topics-tab" href="/admin/assignments/running" >
                        <span class="tab-title">Running</span>
                    </a>
                </li>
                <li class="nav-item skelton-hide skelton-height-lg">
                    <a class="nav-link" id="topics-tab" href="/admin/assignments/completed" >
                        <span class="tab-title">Completed</span>
                    </a>
                </li>
                <li class="nav-item skelton-hide skelton-height-lg">
                    <a class="nav-link" id="topics-tab" href="/admin/assignments/paused" >
                        <span class="tab-title">Paused</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-12">
            <div class="assignments-table">
                <div class="card">
                    <div class="card-header bg-light">
                        <h6 class="mb-0 skelton-hide skelton-height-lg skelton-mb-0"><span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span> Issue in Testing</h6>
                    </div>
                    <div class="card-body p-0 table-sm">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="skelton-hide skelton-height-lg skelton-mb-0">Type</th>
                                    <th class="skelton-hide skelton-height-lg skelton-mb-0">Questions</th>
                                    <th class="skelton-hide skelton-height-lg skelton-mb-0">Participations</th>
                                    <th class="skelton-hide skelton-height-lg skelton-mb-0">Start & End Date</th>
                                    <th class="skelton-hide skelton-height-lg skelton-mb-0">Accuracy</th>
                                    <th class="skelton-hide skelton-height-lg skelton-mb-0">Status</th>
                                    <th class="skelton-hide skelton-height-lg skelton-mb-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-th="Type" class="skelton-hide skelton-height-lg skelton-mb-0">Vocabulary</td>
                                    <td data-th="Questions" class="skelton-hide skelton-height-lg skelton-mb-0">0</td>
                                    <td data-th="Participations" class="skelton-hide skelton-height-lg skelton-mb-0">50</td>
                                    <td data-th="Start & End Date" class="skelton-hide skelton-height-lg skelton-mb-0">11 Sep 05:00 / 16 Sep 05:00</td>
                                    <td data-th="Accuracy" class="skelton-hide skelton-height-lg skelton-mb-0">
                                        <div class="circle_percent circle-green" data-percent="50">
                                            <div class="circle_inner">
                                                <div class="round_per" style="transform: rotate(360deg);"></div>
                                            </div>
                                            <div class="circle_inbox">
                                                <span class="percent_text">50%</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Status" class="text-success font-weight-bold skelton-hide skelton-height-lg skelton-mb-0">Activ e</td>
                                    <td data-th="Actions" class="skelton-hide skelton-height-lg skelton-mb-0">
                                        <div class="dropdown-box">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt="dots-three"></span>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-th="Type" class="skelton-hide skelton-height-lg skelton-mb-0" >Vocabulary</td>
                                    <td data-th="Questions" class="skelton-hide skelton-height-lg skelton-mb-0">0</td>
                                    <td data-th="Participations" class="skelton-hide skelton-height-lg skelton-mb-0">50</td>
                                    <td data-th="Start & End Date" class="skelton-hide skelton-height-lg skelton-mb-0">11 Sep 05:00 / 16 Sep 05:00</td>
                                    <td data-th="Accuracy" class="skelton-hide skelton-height-lg skelton-mb-0">
                                        <div class="circle_percent circle-green" data-percent="50">
                                            <div class="circle_inner">
                                                <div class="round_per" style="transform: rotate(360deg);"></div>
                                            </div>
                                            <div class="circle_inbox">
                                                <span class="percent_text">50%</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Status" class="text-success font-weight-bold skelton-hide skelton-height-lg skelton-mb-0">Active</td>
                                    <td data-th="Actions" class="skelton-hide skelton-height-lg skelton-mb-0">
                                        <div class="dropdown-box">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt="dots-three"></span>
                                                </a>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <section class="card rurera-hide">
            <div class="card-body">
                <form action="{{ getAdminPanelUrl() }}/quizzes" method="get" class="row mb-0">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.search') }}</label>
                            <input type="text" class="form-control" name="title" value="{{ request()->get('title') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.start_date') }}</label>
                            <div class="input-group">
                                <input type="date" id="fsdate" class="text-center form-control" name="from" value="{{ request()->get('from') }}" placeholder="Start Date">
                            </div>
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

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.filters') }}</label>
                            <select name="sort" data-plugin-selectTwo class="form-control populate">
                                <option value="">{{ trans('admin/main.filter_type') }}</option>
                                <option value="have_certificate" @if(request()->get('sort') == 'have_certificate')
                                    selected @endif>{{ trans('admin/main.quizzes_have_certificate') }}
                                </option>
                                <option value="students_count_asc" @if(request()->get('sort') == 'students_count_asc')
                                    selected @endif>{{ trans('admin/main.students_ascending') }}
                                </option>
                                <option value="students_count_desc" @if(request()->get('sort') == 'students_count_desc')
                                    selected @endif>{{ trans('admin/main.students_descending') }}
                                </option>
                                <option value="passed_count_asc" @if(request()->get('sort') == 'passed_count_asc')
                                    selected @endif>{{ trans('admin/main.passed_students_ascending') }}
                                </option>
                                <option value="passed_count_desc" @if(request()->get('sort') == 'passed_count_desc')
                                    selected @endif>{{ trans('admin/main.passes_students_descending') }}
                                </option>
                                <option value="grade_avg_asc" @if(request()->get('sort') == 'grade_avg_asc') selected
                                    @endif>{{ trans('admin/main.grades_average_ascending') }}
                                </option>
                                <option value="grade_avg_desc" @if(request()->get('sort') == 'grade_avg_desc') selected
                                    @endif>{{ trans('admin/main.grades_average_descending') }}
                                </option>
                                <option value="created_at_asc" @if(request()->get('sort') == 'created_at_asc') selected
                                    @endif>{{ trans('admin/main.create_date_ascending') }}
                                </option>
                                <option value="created_at_desc" @if(request()->get('sort') == 'created_at_desc')
                                    selected @endif>{{ trans('admin/main.create_date_descending') }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.instructor') }}</label>
                            <select name="teacher_ids[]" multiple="multiple" data-search-option="just_teacher_role" class="form-control search-user-select2" data-placeholder="Search teachers">
                                @if(!empty($teachers) and $teachers->count() > 0)
                                @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" selected>{{ $teacher->get_full_name() }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.class') }}</label>
                            <select name="webinar_ids[]" multiple="multiple" class="form-control search-webinar-select2" data-placeholder="Search classes">
                                @if(!empty($webinars) and $webinars->count() > 0)
                                @foreach($webinars as $webinar)
                                <option value="{{ $webinar->id }}" selected>{{ $webinar->title }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.status') }}</label>
                            <select name="statue" data-plugin-selectTwo class="form-control populate">
                                <option value="{{ trans('admin/main.all_status') }}">{{ trans('admin/main.all_status') }}</option>
                                <option value="active" @if(request()->get('status') == 'active') selected @endif>{{
                                    trans('admin/main.active') }}
                                </option>
                                <option value="inactive" @if(request()->get('status') == 'inactive') selected @endif>{{
                                    trans('admin/main.inactive') }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn btn-primary w-100">{{ trans('admin/main.show_results') }}</button>
                    </div>
                </form>
            </div>
        </section>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        @can('admin_assignments_create')
                        <div class="text-right skelton-hide skelton-height-lg skelton-mb-0">
                            <a href="{{ getAdminPanelUrl() }}/assignments/create" class="btn btn-primary ml-2">Create Assignment</a>
                        </div>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped font-14">
                                <tr class="skelton-hide">
                                    <th class="text-left">{{ trans('admin/main.title') }}</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Tables</th>
                                    <th class="text-center">Total Questions</th>
                                    <th class="text-left">Start Date</th>
                                    <th class="text-left">End Date</th>
                                    <th class="text-left">Recurring</th>
                                    <th class="text-center">{{ trans('admin/main.status') }}</th>
                                    <th>{{ trans('admin/main.actions') }}</th>
                                </tr>

                                @foreach($assignments as $assignmentObj)
                                <tr class="skelton-hide">
                                    <td>
                                        <span>{{ $assignmentObj->title }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $assignmentObj->assignment_type }}</span>
                                    </td>
                                    <td>
                                        <span>{{ implode(', ', json_decode($assignmentObj->tables_no)) }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $assignmentObj->no_of_questions }}</span>
                                    </td>
                                    <td>
                                        <span>{{ dateTimeFormat($assignmentObj->assignment_start_date, 'j M Y H:i') }}</span>
                                    </td>
                                    <td>
                                        <span>{{ dateTimeFormat($assignmentObj->assignment_end_date, 'j M Y H:i') }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $assignmentObj->recurring_type }}</span>
                                    </td>

                                    <td class="text-center">
                                        @if($assignmentObj->status != 'inactive')
                                        <span class="text-success">{{ trans('admin/main.active') }}</span>
                                        @else
                                        <span class="text-warning">{{ trans('admin/main.inactive') }}</span>
                                        @endif
                                    </td>

                                    <td>

                                        @can('admin_assignments_edit')
                                        <a href="{{ getAdminPanelUrl() }}/assignments/{{ $assignmentObj->id }}/edit"
                                           class="btn-transparent btn-sm text-primary" data-toggle="tooltip"
                                           data-placement="top" title="{{ trans('admin/main.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ getAdminPanelUrl() }}/assignments/{{ $assignmentObj->id }}/progress"
                                           class="btn-transparent btn-sm text-primary" data-toggle="tooltip"
                                           data-placement="top" title="Progress">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @endcan

                                        @can('admin_assignments_deletesss')
                                        @include('admin.includes.delete_button',['url' =>
                                        getAdminPanelUrl().'/quizzes/'.$assignmentObj->id.'/delete' , 'btnClass' => 'btn-sm'])
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        {{ $assignments->appends(request()->input())->links() }}
                    </div>
                </div>
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
