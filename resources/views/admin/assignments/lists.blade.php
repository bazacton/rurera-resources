@extends('admin.layouts.app')

@push('libraries_top')
<link rel="stylesheet" href="/assets/admin/vendor/multi-select/comboTreeStyle.css">
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
                <button type="button" class="simple-btn" data-toggle="modal" data-target="#add-member-modal" fdprocessedid="ce95ne">
                Add member
                </button>
                <a href="javascript:;" class="create-assignment-btn simple-btn">Create Assignment</a>
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
                        <form action="/admin/assignments" id="topic_parts_search_form" method="get" class="mb-0">
                            <div class="rurera-search-filters row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="select-holder">
                                            <div class="input-field">
                                            <img src="/assets/default/svgs/category.svg" alt="category">
                                            <label class="input-label">{{trans('admin/main.category')}}</label>
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
                                        <div class="select-holder level-select">

                                            <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="multiSelectDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="/assets/default/svgs/skill-level.svg" alt="skill-level">
                                                <span class="btn-text">Level</span>
                                                <span class="selected-labels" id="selectedLabels"></span>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="multiSelectDropdown">
                                                <div class="dropdown-search">
                                                    <div class="input-holder">
                                                        <img src="/assets/default/svgs/search.svg" alt="search">
                                                        <input type="text" placeholder="Level">
                                                    </div>
                                                </div>
                                                <label class="dropdown-item">
                                                    <input type="checkbox" value="Beginner">
                                                    Beginner
                                                    <span class="counts">20</span>
                                                </label>
                                                <label class="dropdown-item">
                                                    <input type="checkbox" value="Intermediate">
                                                    Intermediate
                                                    <span class="counts">18</span>
                                                </label>
                                                <label class="dropdown-item">
                                                    <input type="checkbox" value="Upper Intermediate">
                                                    Upper Intermediate
                                                    <span class="counts">22</span>
                                                </label>
                                                <label class="dropdown-item">
                                                    <input type="checkbox" value="Advanced">
                                                    Advanced
                                                    <span class="counts">10</span>
                                                </label>
                                                <button class="clear-filter-btn" id="clearSelection">Clear Filter</button>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="select-holder year-select">

                                            <div class="dropdown year-dropdown">
                                                <button class="dropdown-toggle" type="button" id="multiSelectDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="/assets/default/svgs/book-filter.svg" alt="book-filter">
                                                    <span class="btn-text">Year Subject</span>
                                                    <span class="selected-labels" id="yearSelectedLabels"></span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="multiSelectDropdown2">
                                                    <ul>
                                                        <li class="dropdown-submenu">
                                                            <a class="dropdown-link dropdown-toggle" href="#">Year 1</a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <div class="select-list">
                                                                        <div class="dropdown-search">
                                                                            <div class="input-holder">
                                                                                <img src="/assets/default/svgs/search.svg" alt="search">
                                                                                <input type="text" placeholder="Subject">
                                                                            </div>
                                                                        </div>
                                                                        <label class="dropdown-item"><input type="checkbox" value="English"> English</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="Math"> Math</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="History"> History</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="Science"> Science</label>
                                                                        <button class="clear-filter-btn" id="yearClearSelection">Clear Filter</button>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown-submenu">
                                                            <a class="dropdown-link dropdown-toggle" href="#">Year 2</a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <div class="select-list">
                                                                        <div class="dropdown-search">
                                                                            <div class="input-holder">
                                                                                <img src="/assets/default/svgs/search.svg" alt="search">
                                                                                <input type="text" placeholder="Subject">
                                                                            </div>
                                                                        </div>
                                                                        <label class="dropdown-item"><input type="checkbox" value="English"> English</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="Math"> Math</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="History"> History</label>
                                                                        <button class="clear-filter-btn" id="yearClearSelection">Clear Filter</button>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown-submenu">
                                                            <a class="dropdown-link dropdown-toggle" href="#">Year 3</a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <div class="select-list">
                                                                        <div class="dropdown-search">
                                                                            <div class="input-holder">
                                                                                <img src="/assets/default/svgs/search.svg" alt="search">
                                                                                <input type="text" placeholder="Subject">
                                                                            </div>
                                                                        </div>
                                                                        <label class="dropdown-item"><input type="checkbox" value="English"> English</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="Math"> Math</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="History"> History</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="Science"> Science</label>
                                                                        <button class="clear-filter-btn" id="yearClearSelection">Clear Filter</button>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown-submenu">
                                                            <a class="dropdown-link dropdown-toggle" href="#">Year 4</a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <div class="select-list">
                                                                        <div class="dropdown-search">
                                                                            <div class="input-holder">
                                                                                <img src="/assets/default/svgs/search.svg" alt="search">
                                                                                <input type="text" placeholder="Subject">
                                                                            </div>
                                                                        </div>
                                                                        <label class="dropdown-item"><input type="checkbox" value="English"> English</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="History"> History</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="Science"> Science</label>
                                                                        <button class="clear-filter-btn" id="yearClearSelection">Clear Filter</button>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown-submenu">
                                                            <a class="dropdown-link dropdown-toggle" href="#">Year 5</a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <div class="select-list">
                                                                        <div class="dropdown-search">
                                                                            <div class="input-holder">
                                                                                <img src="/assets/default/svgs/search.svg" alt="search">
                                                                                <input type="text" placeholder="Subject">
                                                                            </div>
                                                                        </div>
                                                                        <label class="dropdown-item"><input type="checkbox" value="English"> English</label>
                                                                        <label class="dropdown-item"><input type="checkbox" value="Math"> Math</label>
                                                                        <button class="clear-filter-btn" id="yearClearSelection">Clear Filter</button>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">

                                        <div class="select-holder">
                                            <div class="input-field">
                                                <img src="/assets/default/svgs/subject.svg" alt="subject">
                                                <label>Subjects</label>
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

                                        <div class="input-group">
                                            <div class="input-field">
                                                <img src="/assets/default/svgs/subject.svg" alt="subject">
                                                <label class="input-label">{{ trans('admin/main.end_date') }}</label>
                                                <input type="date" id="lsdate" class="form-control" name="to" value="{{ request()->get('to') }}" placeholder="End Date">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="test-div">
                                        <input type="text" id="justAnInputBox1" placeholder="Select" autocomplete="off" />
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
                                            <th>Assignment Type</th>
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
                                            <td data-th="Assignment">
                                                <div class="skelton-hide skelton-height-lg skelton-mb-0">{{$assignmentObj->title}}</div>
                                            </td>
                                            <td data-th="Type">
                                                <div class="skelton-hide skelton-height-lg skelton-mb-0">{{ getQuizTypeTitle($assignmentObj->assignment_type) }}</div>
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
                                                        @endforeach
                                                            @if($UserAssignedTopics->count() > 5)
                                                                <div class="more-users-no">+5</div>
                                                            @endif
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
                                                <div class="skelton-hide skelton-height-lg skelton-mb-0">{{dateTimeFormat($assignmentObj->assignment_start_date, 'j M Y')}}
                                                    <br><span class="deadline-date"><b>Deadline:</b> {{dateTimeFormat($assignmentObj->assignment_end_date, 'j M Y')}}</span></div>
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


<div class="modal fade add-member-modal" id="add-member-modal" tabindex="-1" role="dialog" aria-labelledby="add-member-modalModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Members</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="add-member-content">
            <div class="form-group">
                <div class="form-field">
                    <img src="/assets/default/svgs/user.svg" alt="user">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                            
            </div>
            <div class="add-members-list-holder">
                <div class="member-selection-info">
                    <div class="selection-text">
                        <span>4 members selected</span>
                    </div>
                    <div class="selection-controls">
                        <button type="button" class="select-all-btn">Select all</button>
                        <button type="button" class="unselect-all-btn">Unselect all</button>
                    </div>
                </div>
                <div class="add-members-list">
                    <div class="list-card">
                        <input type="checkbox" id="list1">
                        <label for="list1">
                            <div class="member-info">
                                <div class="img-holder">
                                    <img class="avatar-img" src="/assets/default/img/avatar-20.jpg" alt="avatar-20">
                                </div>
                                <div class="text-holder">
                                    <a href="#">
                                        Marvin Mckinney
                                        <span>marvinmckinney@mail.com</span>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="list-card">
                        <input type="checkbox" id="list11">
                        <label for="list11">
                            <div class="member-info">
                                <div class="img-holder">
                                    <img class="avatar-img" src="/assets/default/img/avatar-20.jpg" alt="avatar-20">
                                </div>
                                <div class="text-holder">
                                    <a href="#">
                                        Marvin Mckinney
                                        <span>marvinmckinney@mail.com</span>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="list-card">
                        <input type="checkbox" id="list2">
                        <label for="list2">
                            <div class="member-info">
                                <div class="img-holder">
                                    <img class="avatar-img" src="/assets/default/img/avatar-20.jpg" alt="avatar-20">
                                </div>
                                <div class="text-holder">
                                    <a href="#">
                                        Marvin Mckinney
                                        <span>marvinmckinney@mail.com</span>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="list-card">
                        <input type="checkbox" id="list3">
                        <label for="list3">
                            <div class="member-info">
                                <div class="img-holder">
                                    <img class="avatar-img" src="/assets/default/img/avatar-20.jpg" alt="avatar-20">
                                </div>
                                <div class="text-holder">
                                    <a href="#">
                                        Marvin Mckinney
                                        <span>marvinmckinney@mail.com</span>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="list-card">
                        <input type="checkbox" id="list4">
                        <label for="list4">
                            <div class="member-info">
                                <div class="img-holder">
                                    <img class="avatar-img" src="/assets/default/img/avatar-20.jpg" alt="avatar-20">
                                </div>
                                <div class="text-holder">
                                    <a href="#">
                                        Marvin Mckinney
                                        <span>marvinmckinney@mail.com</span>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="list-card">
                        <input type="checkbox" id="list5">
                        <label for="list5">
                            <div class="member-info">
                                <div class="img-holder">
                                    <img class="avatar-img" src="/assets/default/img/avatar-20.jpg" alt="avatar-20">
                                </div>
                                <div class="text-holder">
                                    <a href="#">
                                        Marvin Mckinney
                                        <span>marvinmckinney@mail.com</span>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="list-card">
                        <input type="checkbox" id="list6">
                        <label for="list6">
                            <div class="member-info">
                                <div class="img-holder">
                                    <img class="avatar-img" src="/assets/default/img/avatar-20.jpg" alt="avatar-20">
                                </div>
                                <div class="text-holder">
                                    <a href="#">
                                        Marvin Mckinney
                                        <span>marvinmckinney@mail.com</span>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="list-card">
                        <input type="checkbox" id="list7">
                        <label for="list7">
                            <div class="member-info">
                                <div class="img-holder">
                                    <img class="avatar-img" src="/assets/default/img/avatar-20.jpg" alt="avatar-20">
                                </div>
                                <div class="text-holder">
                                    <a href="#">
                                        Marvin Mckinney
                                        <span>marvinmckinney@mail.com</span>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="list-card">
                        <input type="checkbox" id="list8">
                        <label for="list8">
                            <div class="member-info">
                                <div class="img-holder">
                                    <img class="avatar-img" src="/assets/default/img/avatar-20.jpg" alt="avatar-20">
                                </div>
                                <div class="text-holder">
                                    <a href="#">
                                        Marvin Mckinney
                                        <span>marvinmckinney@mail.com</span>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="list-card">
                        <input type="checkbox" id="list9">
                        <label for="list9">
                            <div class="member-info">
                                <div class="img-holder">
                                    <img class="avatar-img" src="/assets/default/img/avatar-20.jpg" alt="avatar-20">
                                </div>
                                <div class="text-holder">
                                    <a href="#">
                                        Marvin Mckinney
                                        <span>marvinmckinney@mail.com</span>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="add-member-count-holder">
                <button type="button" class="member-selected-btn">Add selected <span>(4)</span></button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="modal fade assignment-create-modal" id="assignment-create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <form action="/admin/assignments/create_assignment"
                          method="Post" class="rurera-form-validation create-assignment-form">
                        {{ csrf_field() }}

                    <div class="row">
                    <div class="col-12">
                        <h3>Create Assignment</h3>
                    </div>
                    <div class="populated-content-area col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="years-group populated-data">
                        <div class="form-group">
                            <label class="input-label">Assignment Type</label>
                            <div class="input-group">
                                <div class="radio-buttons">
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][assignment_practice_type]"
                                               class="assignment_practice_type conditional_field_check" value="practice" checked>
                                        <span class="radio-btn"><i class="las la-check"></i>
                                            <div class="card-icon">
                                                <h3>Practice</h3>
                                            </div>

                                        </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][assignment_practice_type]"
                                               class="assignment_practice_type conditional_field_check" value="test">
                                        <span class="radio-btn"><i class="las la-check"></i>
                                            <div class="card-icon">
                                                <h3>Test</h3>
                                            </div>

                                        </span>
                                    </label>
                                </div>

                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="input-label">Practice Title</label>
                                <input type="text"
                                       name="ajax[new][title]"
                                       value=""
                                       class="js-ajax-title form-control rurera-req-field"
                                       placeholder=""/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-6">
                            <div class="form-group">
                                <label class="input-label">Practice Start Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text " data-input="logo" data-preview="holder">
                                            <i class="fa fa-calendar-week"></i>
                                        </button>
                                    </div>
                                    <input type="text" autocomplete="off"
                                           name="ajax[new][assignment_start_date]"
                                           value=""
                                           class="form-control practice-start-date rureradatepicker rurera-req-field @error('assignment_start_date') is-invalid @enderror"
                                           min="{{date('Y-m-d')}}"
                                           placeholder="" required/>
                                    @error('assignment_start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-6">
                            <div class="form-group">
                                <label class="input-label">Practice Due Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text " data-input="logo" data-preview="holder">
                                            <i class="fa fa-calendar-week"></i>
                                        </button>
                                    </div>
                                    <input type="text" autocomplete="off"
                                           name="ajax[new][assignment_end_date]"
                                           value=""
                                           class="form-control practice-due-date rureradatepicker rurera-req-field" min="{{date('Y-m-d')}}"
                                           placeholder="" required/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit"
                                    class="js-submit-quiz-form btn btn-sm btn-primary">Submit
                            </button>
                        </div>
                    </div>
                    </form>






                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_bottom')
    <script src="/assets/admin/vendor/multi-select/comboTreePlugin.js"></script>
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
        $(document).on('click', '.create-assignment-btn', function () {
            $(".assignment-create-modal").modal('show');
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
    <script>
        $(document).ready(function () {
            const selectedLabelsContainer = $('#selectedLabels');
            const checkboxes = $('.level-select .dropdown-menu input[type="checkbox"]');

            checkboxes.change(function () {
                const selected = [];
                checkboxes.each(function () {
                    if (this.checked) {
                        selected.push($(this).val());
                    }
                });

                if (selected.length > 0) {
                    let badges = selected.map(item => `<span class="badge badge-primary">${item}</span>`).join(' ');
                    selectedLabelsContainer.html(badges);
                } else {
                    selectedLabelsContainer.html('');
                }
            });

            $('#clearSelection').click(function () {
                checkboxes.prop('checked', false);
                selectedLabelsContainer.html('');
            });
        });

        $(document).ready(function () {
            const selectedLabelsContainer = $('#yearSelectedLabels');
            const yearCheckboxes = $('.year-select .dropdown-menu input[type="checkbox"]');

            yearCheckboxes.change(function () {
                const selected = [];
                yearCheckboxes.each(function () {
                    if (this.checked) {
                        selected.push($(this).val());
                    }
                });

                if (selected.length > 0) {
                    let badges = selected.map(item => `<span class="badge badge-primary">${item}</span>`).join(' ');
                    selectedLabelsContainer.html(badges);
                } else {
                    selectedLabelsContainer.html('');
                }
            });

            $('#yearClearSelection').click(function () {
                checkboxes.prop('checked', false);
                selectedLabelsContainer.html('');
            });
        });
    </script>

    <script>
    $('.year-select .dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.year-select .dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.year-select .dropdown-menu');
        $subMenu.toggleClass('show');

        $(this).parents('.year-dropdown.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass('show');
        });


        return false;
    });
    </script>
    <script type="text/javascript">
      const SampleJSONData = [
        {
          id: 5,
          title: "Cats",
          subs: [
            {
              id: 50,
              title: "Kitty",
            },
            {
              id: 51,
              title: "Bigs",
              subs: [
                {
                  id: 510,
                  title: "Cheetah",
                },
                {
                  id: 511,
                  title: "Jaguar",
                },
                {
                  id: 512,
                  title: "Leopard",
                },
              ],
            },
          ],
        },
        {
          id: 6,
          title: "Fish",
        },
      ];
      const SampleJSONData2 = [
        {
          id: 1,
          title: "Four Wheels",
          subs: [
            {
              id: 10,
              title: "Car",
            },
            {
              id: 11,
              title: "Truck",
            },
            {
              id: 12,
              title: "Transporter",
            },
            {
              id: 13,
              title: "Dozer",
            },
          ],
        },
        {
          id: 2,
          title: "Two Wheels",
          subs: [
            {
              id: 20,
              title: "Cycle",
            },
            {
              id: 21,
              title: "Motorbike",
            },
            {
              id: 22,
              title: "Scooter",
            },
          ],
        },
        {
          id: 2,
          title: "Van",
        },
        {
          id: 3,
          title: "Bus",
        },
      ];

      var comboTree1, comboTree2, comboTree3;

      jQuery(document).ready(function ($) {
        comboTree1 = $("#justAnInputBox").comboTree({
          source: SampleJSONData,
          isMultiple: true,
          cascadeSelect: false,
          collapse: false,
          selectAll: true,
        });

        var comboTree3 = $("#justAnInputBox1").comboTree({
            source: SampleJSONData,
            isMultiple: true,
            cascadeSelect: true,
            collapse: true
            });

            $(".ct-input-wrapper").append('<div id="selected-tags" class="mt-2"></div>');

            function findNodeById(data, id) {
            for (var i = 0; i < data.length; i++) {
                if (data[i].id == id) return data[i];
                if (data[i].subs) {
                var found = findNodeById(data[i].subs, id);
                if (found) return found;
                }
            }
            return null;
            }

            $("#justAnInputBox1").on("change", function () {
                var ids = comboTree3.getSelectedIds();
                var names = comboTree3.getSelectedNames();

                // always clear the input field
                $("#justAnInputBox1").val("");

                if (ids.length === 0) {
                    // nothing selected → clear tags
                    $("#selected-tags").html("");
                    return;
                }

                var html = "";
                ids.forEach(function (id, index) {
                    var node = findNodeById(SampleJSONData, id);
                    var extraClass = (node && node.subs) ? " parent" : "";
                    html += `<span class="badge badge-primary mr-1${extraClass}">${names[index]}</span>`;
                });

                $("#selected-tags").html(html);
                });
        

        // comboTree3.setSource(SampleJSONData2);

        comboTree2 = $("#justAnotherInputBox").comboTree({
          source: SampleJSONData,
          isMultiple: false,
        });

        comboTree3.toggleDropDown();
      });
      
    </script>
@endpush
