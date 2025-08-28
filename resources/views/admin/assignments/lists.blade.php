@extends('admin.layouts.app')

@push('libraries_top')

@endpush


@section('content')
<div class="section skeleton">
    <div class="section-header">
        <div class="heading-holder">
            <h1>Assignments</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">Assignments</div>
            </div>
        </div>
        @can('admin_assignments_create')
            <div class="text-right ml-auto">
                <a href="{{ getAdminPanelUrl() }}/assignments/create" class="simple-btn">Create Assignment</a>
            </div>
        @endcan
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-12 col-md-12">
                    <div class="admin-rurera-tabs-holder">
                        <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                            <li class="nav-item">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <a class="nav-link {{($assignment_tab == 'all')? 'active' : ''}}" id="topics-tab" href="/admin/assignments">
                                        <span class="tab-title">All Assignments</span>
                                        <span class="nav-counts">100</span>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <a class="nav-link {{($assignment_tab == 'scheduled')? 'active' : ''}}" id="topics-tab" href="/admin/assignments/scheduled" >
                                        <span class="tab-title">Scheduled</span>
                                        <span class="nav-counts">90</span>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <a class="nav-link {{($assignment_tab == 'running')? 'active' : ''}}" id="topics-tab" href="/admin/assignments/running" >
                                        <span class="tab-title">Running</span>
                                        <span class="nav-counts">1</span>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <a class="nav-link {{($assignment_tab == 'completed')? 'active' : ''}}" id="topics-tab" href="/admin/assignments/completed" >
                                        <span class="tab-title">Completed</span>
                                        <span class="nav-counts">5</span>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <a class="nav-link {{($assignment_tab == 'paused')? 'active' : ''}}" id="topics-tab" href="/admin/assignments/paused" >
                                        <span class="tab-title">Paused</span>
                                        <span class="nav-counts">1</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-12 col-md-12">
                    <div class="card-body pl-0 pr-0 pt-0">
                        <form action="/admin/assignments" id="topic_parts_search_form" method="get" class="row mb-0">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label">{{trans('admin/main.category')}}</label>
                                    <div class="select-holder">
                                        <div class="input-field">
                                            <img src="/assets/default/svgs/category.svg" alt="category">
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
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Subjects</label>
                                    <div class="select-holder">
                                        <div class="input-field">
                                            <img src="/assets/default/svgs/subject.svg" alt="subject">
                                            <select data-return_type="option"
                                                data-default_id="{{request()->get('subject_id')}}" data-chapter_id="{{get_filter_request('chapter_id', 'assignments_search')}}"
                                                class="ajax-courses-dropdown year_subjects form-control select2 @error('subject_id') is-invalid @enderror"
                                                id="subject_id" name="subject_id">
                                                <option disabled selected>Subject</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    @error('subject_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('admin/main.end_date') }}</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <img src="/assets/default/svgs/calendar-days.svg" alt="calendar-days">
                                            <input type="date" id="lsdate" class="form-control" name="to" value="{{ request()->get('to') }}" placeholder="End Date">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="assignments-table">
                        <div class="card">

                            <div class="card-body p-0 table-sm">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Assignment</th>
                                            <th>Learners</th>
                                            <th>Accuracy</th>
                                            <th>Assigned</th>
                                            <th>Assigned By</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($assignments->count() > 0)
                                    @foreach($assignments as $assignmentObj)
                                        <tr>
                                            <td data-th="Type">
                                                <div class="skelton-hide skelton-height-lg skelton-mb-0">{{$assignmentObj->title}} ({{ getQuizTypeTitle($assignmentObj->assignment_type) }})</div>
                                            </td>
                                            <td data-th="Learners">
                                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                    @php
                                                        $UserAssignedTopics = $assignmentObj->students()->where('status', '!=', 'inactive')->get();
                                                    @endphp
                                                    @if($UserAssignedTopics->count() > 0)
                                                        <div class="user-thumbs">
                                                        @foreach($UserAssignedTopics as $UserAssignedTopicObj)
                                                            @php $assignmentStudentObj = $UserAssignedTopicObj->user; @endphp
                                                            <img src="{{url('/').$assignmentStudentObj->getAvatar()}}" alt="">
                                                            <img src="{{url('/').$assignmentStudentObj->getAvatar()}}" alt="">
                                                            <img src="{{url('/').$assignmentStudentObj->getAvatar()}}" alt="">
                                                        @endforeach
                                                            <div class="more-users-no">+5</div>
                                                        </div>
                                                    @endif
                                                </div>
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
                                            <td data-th="Assigned">
                                                <div class="skelton-hide skelton-height-lg skelton-mb-0">{{dateTimeFormat($assignmentObj->assignment_start_date, 'j M Y')}} / {{dateTimeFormat($assignmentObj->assignment_end_date, 'j M Y')}}</div>
                                            </td>
                                            <td data-th="AssignedBy">
                                                <div class="skelton-hide skelton-height-lg skelton-mb-0">{{$assignmentObj->creatorUser->get_full_name()}}</div>
                                            </td>
                                            <td data-th="Status" class="text-success font-weight-bold">
                                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                    <span class="status-lable active">{{$assignmentObj->status}}</span>
                                                </div>
                                            </td>
                                            <td data-th="Actions">
                                                <div class="pending-invites-controls">
                                                    <a class="dropdown-item" href="/admin/assignments/{{$assignmentObj->id}}/progress" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Progress"><img src="/assets/default/svgs/action-progress.svg" alt="envelope" class="mr-0"></a>
                                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Print"><img src="/assets/default/svgs/print-action.svg" alt="print" class="mr-0"></a>
                                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Delete"><img src="/assets/default/svgs/delete-menu.svg" alt="trash-bin" class="mr-0"></a>
                                                    <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Email To Prent"><img src="/assets/default/svgs/envelope.svg" alt="envelope" class="mr-0"></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td data-th="no-records" class="no-records-found" colspan="7">
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
