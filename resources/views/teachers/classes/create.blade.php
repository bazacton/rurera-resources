@extends('admin.layouts.app')

@push('styles_top')
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.css">
    <style>
        /**********************************************
        Questions Select, Questions Block style Start
        **********************************************/
        .questions-select-option ul {
            overflow: hidden;
        }

        .questions-select-option li {
            position: relative;
            flex: 1 1 0px;
        }

        .questions-select-option label {
            background-color: #e8e8e8;
            padding: 6px 20px;
            margin: 0;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            width: 100%;
            text-align: center;
            height: 100%;
            cursor: pointer;
            min-height: 55px;
        }

        .questions-select-option input,
        .questions-select-number input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .questions-select-option li:first-child label {
            border-radius: 5px 0 0 5px;
        }

        .questions-select-option li:last-child label {
            border-radius: 0 5px 5px 0;
        }

        .questions-select-option input:checked ~ label {
            background-color: var(--primary);
            color: #fff;
        }

        .questions-select-option label strong {
            font-weight: 500;
            font-size: 15px;
        }

        .questions-select-option label span {
            font-size: 14px;
        }

        .questions-select-number li {
            flex-basis: 33%;
            padding: 0 0 10px 10px;
        }

        .questions-select-number label {
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);
            width: 100%;
            text-align: center;
            margin: 0;
            border-radius: 5px;
            min-height: 70px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .questions-select-number label.disabled {
            background-color: inherit;
        }

        .questions-select-number label.selectable {
            background-color: #fff;
        }

        .questions-select-number input:checked ~ label {
            background-color: var(--primary);
            color: #fff;
        }

        .questions-select-number ul {
            margin: 0 0 0 -10px;
            flex-wrap: wrap;
        }

        .questions-submit-btn {
            background-color: var(--primary);
            display: block;
            width: 92%;
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            border-radius: 0;
            position: relative;
            z-index: 0;
            margin: 0 auto;
            height: 55px;
        }

        .questions-submit-btn:hover {
            color: #fff;
        }

        .questions-submit-btn:before,
        .questions-submit-btn:after {
            content: "";
            position: absolute;
            display: block;
            width: 100%;
            height: 105%;
            top: -1px;
            left: -1px;
            z-index: -1;
            pointer-events: none;
            background: var(--primary);
            transform-origin: top left;
            -ms-transform: skew(-30deg, 0deg);
            -webkit-transform: skew(-30deg, 0deg);
            transform: skew(-30deg, 0deg);
        }

        .questions-submit-btn:after {
            left: auto;
            right: -1px;
            transform-origin: top right;
            -ms-transform: skew(30deg, 0deg);
            -webkit-transform: skew(30deg, 0deg);
            transform: skew(30deg, 0deg);
        }
    </style>
@endpush
@php $tables_no = isset( $class->timestables_no)? json_decode($class->timestables_no) : array(); @endphp

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{!empty($class) ?trans('/admin/main.edit'): trans('admin/main.new') }} {{$class->title}}</h1>
            <a href="javascript:;" class="edit-class-btn" data-class_id="{{$class->id}}"><i class="fa fa-cog"></i></a>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{ trans('admin/main.dashboard')
                    }}</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ getAdminPanelUrl() }}/classes">Classes</a>
                </div>
                <div class="breadcrumb-item">{{!empty($class) ?trans('/admin/main.edit'): trans('admin/main.new') }}</div>
            </div>
        </div>
        <div id="class-edit-modal" class="class-edit-modal modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createClassModalLabel">Edit Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body class-edit-content">

                    </div>
                </div>
            </div>
        </div>
        <ul data-target_class="admin-rurera-tabs-page-edit" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
            <li class="nav-item skelton-height-lg">
                <a class="nav-link active" id="dashboard-tab-page-edit" href="javascript:;">
                    <span class="tab-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item skelton-height-lg">
                <a class="nav-link" id="students-tab-page-edit" href="javascript:;">
                    <span class="tab-title">Students</span>
                </a>
            </li>
            <li class="nav-item skelton-height-lg">
                <a class="nav-link" id="teachers-tab-page-edit" href="javascript:;">
                    <span class="tab-title">Teachers</span>
                </a>
            </li>
            <li class="nav-item skelton-height-lg">
                <a class="nav-link" id="assignments-tab-page-edit" href="javascript:;">
                    <span class="tab-title">Assignments</span>
                </a>
            </li>
            <li class="nav-item skelton-height-lg">
                <a class="nav-link" id="reports-tab-page-edit" href="javascript:;">
                    <span class="tab-title">Reports</span>
                </a>
            </li>
        </ul>

        <div class="section-body populated-data">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ getAdminPanelUrl() }}/classes/{{ !empty($class) ? $class->id.'/store' : 'store' }}"
                                  method="Post">
                                {{ csrf_field() }}

                                <div class="admin-rurera-tabs-page-edit dashboard-tab-page-edit">
                                    Dashboard
                                </div>

                                <div class="admin-rurera-tabs-page-edit assignments-tab-page-edit">
                                    Assignments
                                </div>

                                <div class="admin-rurera-tabs-page-edit reports-tab-page-edit">
                                    Reports
                                </div>
                                <div class="admin-rurera-tabs-page-edit students-tab-page-edit">
                                    <div class="col-12">
                                        <div class="teacher-table">
                                            <div class="card">
                                                <div class="teacher-search-filter">
                                                    <div class="sorting-filters">
                                    <span class="icon-box">
                                        <img src="/assets/default/svgs/filters.svg" alt="filters">
                                    </span>
                                                        <select>
                                                            <option value="Filter">Filter</option>
                                                            <option value="Filter 2">Filter 2</option>
                                                            <option value="Filter 3">Filter 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="search-field">
                                    <span class="icon-box">
                                        <img src="/assets/default/svgs/search.svg" alt="search">
                                    </span>
                                                        <input type="text" class="search-students" placeholder="Search Students">
                                                    </div>
                                                </div>
                                                <div class="card-header">
                                                    <div class="bulk-actions">
                                                        <span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span>
                                                        <div class="dropdown-box">
                                                            <div class="dropdown">
                                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                    Bulk Actions <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                                                                </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item print-users-logins" data-type_class="sections-users" href="javascript:;"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                                    <a data-class_id="{{$class->id}}" class="dropdown-item unlink-students" href="javascript:;" data-type_class="sections-users"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="invite-faculty">
                                                        <div class="dropdown-box">
                                                            <div class="dropdown">
                                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                    Invite Faculty <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                                                                </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item print-users-logins" data-type_class="sections-users" href="javascript:;"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                                    <a data-class_id="{{$class->id}}" class="dropdown-item unlink-students" href="javascript:;"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 table-sm">
                                                    <table class="table mb-0">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Student</th>
                                                            <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Role</th>
                                                            <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Last Login</th>
                                                            <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Classes</th>
                                                            <th class="skelton-hide1 skelton-height-lg skelton-mb-0">School</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="students-list">

                                                        @if($class->students->where('status','active')->count() > 0)
                                                            @foreach($class->students->where('status','active') as $studentObj)
                                                                <tr>
                                                                    <td data-th="Teacher/Admin" class="skelton-hide1 skelton-height-lg skelton-mb-0">
                                                                        <div class="check-box">
                                                                            <input type="checkbox" class="sections-users" value="{{ $studentObj->id }}">
                                                                        </div>
                                                                        <strong>
                                                    <span class="user-lable">
                                                        {{ $studentObj->get_full_name() }}
                                                        <span class="user-email">{{ $studentObj->email }}</span>
                                                    </span>
                                                                        </strong>
                                                                    </td>
                                                                    <td data-th="Role" class="skelton-hide1 skelton-height-lg skelton-mb-0">Student</td>
                                                                    <td data-th="Last Login" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{($studentObj->last_login > 0)? dateTimeFormat($studentObj->last_login, 'j M y | H:i') : '-'}}</td>
                                                                    <td data-th="Classes" class="skelton-hide1 skelton-height-lg skelton-mb-0">3</td>
                                                                    <td data-th="School" class="skelton-hide1 skelton-height-lg skelton-mb-0">Khan School</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="admin-rurera-tabs-page-edit curriculum-tab-page-edit">


                                    <div class="form-group assignment_topic_type_fields timestables_fields ">
                                        <label>Learn</label>

                                        <div class="row">
                                            @if($categories->count() > 0)
                                                @foreach($categories as $category)
                                                    @if(!empty($category->subCategories) and count($category->subCategories))
                                                        @foreach($category->subCategories as $subCategory)
                                                            <div class="col-12 col-md-6 col-lg-6">
                                                                {{$subCategory->title}}
                                                                <div class="form-group">
                                                                    @foreach($subCategory->subjects($subCategory->id) as $subjectObj)
                                                                        @php $is_selected = in_array($subjectObj->id, $class_subjects)? 'checked' : ''; @endphp
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input id="{{$subCategory->id}}_{{$subjectObj->id}}" value="{{$subjectObj->id}}" type="checkbox" name="subjects[]"
                                                                                   class="custom-control-input" {{$is_selected}}>
                                                                            <label class="custom-control-label"
                                                                                   for="{{$subCategory->id}}_{{$subjectObj->id}}">{{$subjectObj->getTitleAttribute()}}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif



                                        </div>
                                    </div>

                                </div>
                                <div class="admin-rurera-tabs-page-edit details-tab-page-edit">

                                    <!-- Class Name with Color -->
                                    <div class="form-group">
                                        <label for="className">Enter class name (Required)</label>
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="className"
                                                name="title"
                                                value="{{$class->title}}"
                                                placeholder="E.g., Math Club"
                                                required
                                            />
                                            <div class="input-group-append">
                                                <button
                                                    class="btn btn-light dropdown-toggle"
                                                    type="button"
                                                    name="class_color"
                                                    id="colorPickerDropdown"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                    style="border: 1px solid #ccc;"
                                                >
                                                    <span
                                                        class="color-indicator"
                                                        style="background-color: #bcdad7;"
                                                    ></span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <h5>Class Color Code</h5>
                                                    <input type="text" name="class_color" class="class_color">
                                                    <div class="class-color-box">
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#bcdad7" style="background-color: #bcdad7;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#fbcdb3" style="background-color: #fbcdb3;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#f7efe3" style="background-color: #f7efe3;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#f1d276" style="background-color: #f1d276;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#ef8b8a" style="background-color: #ef8b8a;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#e5d7bb" style="background-color: #e5d7bb;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#bd7967" style="background-color: #bd7967;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#f870b3" style="background-color: #f870b3;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#acd5cd" style="background-color: #acd5cd;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#733a4d" style="background-color: #733a4d;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#4f408e" style="background-color: #4f408e;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#3eb9bd" style="background-color: #3eb9bd;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#e2cd82" style="background-color: #e2cd82;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#f6e9c3" style="background-color: #f6e9c3;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efebe4" style="background-color: #efebe4;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#cda4ad" style="background-color: #cda4ad;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#edc9a7" style="background-color: #edc9a7;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#dad3c5" style="background-color: #dad3c5;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#a96eb0" style="background-color: #a96eb0;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#deb9ae" style="background-color: #deb9ae;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#7d9897" style="background-color: #7d9897;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#6d4e88" style="background-color: #6d4e88;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#a46f82" style="background-color: #a46f82;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#465c60" style="background-color: #465c60;" ></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="ClassNickName">Class Nick Name (Required)</label>
                                        <input
                                            name="class_nick_name"
                                            type="text"
                                            class="form-control"
                                            id="ClassNickName"
                                            value="{{$class->class_nick_name}}"
                                            placeholder="Class Nick Name" required
                                        />
                                    </div>



                                    <div class="form-group rurera-hide">
                                        <div class="custom-control custom-checkbox">
                                            <input id="hasSubCategory2" type="checkbox" name="has_sub"
                                                   class="custom-control-input" checked>
                                            <label class="custom-control-label"
                                                   for="hasSubCategory2">Sections</label>
                                        </div>
                                    </div>

                                    <div id="subCategories"
                                         class="ml-0 rurera-hide ">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <strong class="d-block">Sections</strong>

                                            <button type="button" class="btn btn-success add-btn"><i class="fa fa-plus"></i> Add</button>
                                        </div>

                                        <ul class="draggable-lists list-group">

                                            @if($class->sections->count() > 0)
                                                @foreach($class->sections as $sectionObj)

                                                    <li class="form-group list-group">

                                                        <div class="p-2 border rounded-sm">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text cursor-pointer move-icon">
                                                                        <i class="fa fa-arrows-alt"></i>
                                                                    </div>
                                                                </div>

                                                                <input type="text" name="sections[{{$sectionObj->class_code}}][title]"
                                                                       class="form-control w-auto flex-grow-1"
                                                                       value="{{$sectionObj->title}}"
                                                                       placeholder="{{ trans('admin/main.choose_title') }}"/>

                                                                <input type="text" name="section_code"
                                                                       class="form-control"
                                                                       value="{{$sectionObj->class_code}}" readonly disabled/>

                                                                <select class="form-control select2 select2-hidden-accessible" name="sections[section_code][class_teachers][]" multiple="multiple">

                                                                </select>



                                                                <div class="input-group-append">
                                                                    @include('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl("/classes/111/delete"),
                                                                    'deleteConfirmMsg' => trans('update.category_delete_confirm_msg'),
                                                                    'btnClass' => 'btn btn-danger text-white',
                                                                    'noBtnTransparent' => true
                                                                    ])
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif


                                        </ul>
                                    </div>

                                    <!-- Room -->
                                    <div class="form-group">
                                        <label for="roomName">Room</label>
                                        <input
                                            name="room_no"
                                            type="text"
                                            class="form-control"
                                            id="roomName"
                                            value="{{$class->room_no}}"
                                            placeholder="E.g., Room 101"
                                        />
                                    </div>

                                    <!-- Checkboxes -->
                                    <div class="form-group form-check">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            id="requireGuardianEmail2"
                                        />
                                        <label class="form-check-label custom-checkbox-label" for="requireGuardianEmail2">
                                            Require students to enter a guardian's email address
                                        </label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            id="requireClassCode2"
                                        />
                                        <label class="form-check-label custom-checkbox-label" for="requireClassCode2">
                                            Require students to enter a class code
                                        </label>
                                    </div>
                                    <div class="option-field-item mt-20 mb-20">
                                        <label class="custom-switch pl-0">
                                            @php $is_checked = ($class->status == 'active')? 'checked' : ''; @endphp

                                            <input type="checkbox" name="class_status" id="class_status_{{$class->id}}" value="1" class="custom-switch-input" {{$is_checked}}>
                                            <span class="custom-switch-indicator"></span>
                                            <label class="custom-switch-description mb-0 cursor-pointer" for="class_status_{{$class->id}}">Active / Paused</label>
                                        </label>
                                    </div>
                                </div>

                                <div class="admin-rurera-tabs-page-edit teachers-tab-page-edit">
                                    <div class="teacher-listing d-flex align-items-center flex-wrap">

                                        @if($class->teachers->where('status','active')->count() > 0)
                                            @foreach($class->teachers->where('status','active') as $teacherObj)
                                                <div class="listing-grid-card">
                                                    <div class="img-holder">
                                                        <figure>
                                                            <img src="{{ $teacherObj->user->getAvatar() }}" alt="{{ $teacherObj->user->get_full_name() }}">
                                                        </figure>
                                                    </div>
                                                    <div class="text-holder">
                                                        <div class="author-info">
                            <span class="img-box ">
                                <img src="{{ $teacherObj->user->getAvatar() }}" alt="{{ $teacherObj->user->get_full_name() }}">
                                <span class="country-flag">
                                    <img src="{{ $teacherObj->user->getAvatar() }}" alt="{{ $teacherObj->user->get_full_name() }}">
                                    </span>
                            </span>
                                                            <div class="card-title-holder">
                                                                <h5 class="">{{ $teacherObj->user->get_full_name() }}</h5>
                                                            </div>
                                                            <div class="author-contact-info">
                                                                <a href="#" class=""><i class="fas fa-envelope"></i> {{ $teacherObj->user->email }}</a>
                                                                @if($teacherObj->user->mobile != '')
                                                                    <span class="phone-number-box">
                                    <i class="fas fa-phone"></i>
                                    <span class="phone-number" onclick="togglePhoneNumber(this)" data-full-number="987-654-3210">
                                        {{ $teacherObj->user->mobile }}
                                    </span>
                                </span>
                                                                @endif
                                                            </div>
                                                            <div class="author-designation">
                                                                @if($teacherObj->user->getTeacherClasses->count() > 0)
                                                                    @foreach($teacherObj->user->getTeacherClasses as $classTeacherObj)
                                                                        @php
                                                                            $teacherClass = $classTeacherObj->teacherClass;
                                                                        @endphp
                                                                        <span class="designation-lable">{{isset($teacherClass->category->title)? $teacherClass->category->title : ''}}</span>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="teacher-list-controls">
                                                            <button type="button" class="edit-btn  skelton-height-lg skelton-mb-0 unlink-class-teacher" data-id="{{$teacherObj->id}}">Unlink Teacher</button>
                                                        </div>

                                                        <script>
                                                            function togglePhoneNumber(element) {
                                                                const fullNumber = element.getAttribute('data-full-number');
                                                                const isHidden = element.textContent.includes('XXX');

                                                                if (isHidden) {
                                                                    element.textContent = fullNumber;
                                                                } else {
                                                                    const hiddenNumber = `${fullNumber.slice(0, 3)}-XXX-XXXX`;
                                                                    element.textContent = hiddenNumber;
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>

                                <div class="admin-rurera-tabs-page-edit advance-tab-page-edit">



                                    @php $tables_no = isset( $class->timestables_no)? json_decode($class->timestables_no) : array(); @endphp
                                    <div class="form-group assignment_topic_type_fields timestables_fields ">
                                        <label>Timestables</label>
                                        <div class="questions-select-number">
                                            <ul class="d-flex justify-content-center flex-wrap mb-30">
                                                <li><input type="checkbox" value="10" name="tables_no[]" {{in_array(10,$tables_no)?
                                            'checked' : ''}} id="tables_ten10" /> <label for="tables_ten10">10</label></li>
                                                <li><input type="checkbox" value="2" name="tables_no[]" {{in_array(2,$tables_no)?
                                            'checked' : ''}} id="tables_two2" /> <label for="tables_two2">2</label></li>
                                                <li><input type="checkbox" value="5" name="tables_no[]" {{in_array(5,$tables_no)?
                                            'checked' : ''}} id="tables_five5" /> <label for="tables_five5">5</label></li>
                                                <li><input type="checkbox" value="3" name="tables_no[]" {{in_array(3,$tables_no)?
                                            'checked' : ''}} id="tables_three3" /> <label for="tables_three3">3</label></li>
                                                <li><input type="checkbox" value="4" name="tables_no[]" {{in_array(4,$tables_no)?
                                            'checked' : ''}} id="tables_four4" /> <label for="tables_four4">4</label></li>
                                                <li><input type="checkbox" value="8" name="tables_no[]" {{in_array(8,$tables_no)?
                                            'checked' : ''}} id="tables_eight8" /> <label for="tables_eight8">8</label></li>
                                                <li><input type="checkbox" value="6" name="tables_no[]" {{in_array(6,$tables_no)?
                                            'checked' : ''}} id="tables_six6" /> <label for="tables_six6">6</label></li>
                                                <li><input type="checkbox" value="7" name="tables_no[]" {{in_array(7,$tables_no)?
                                            'checked' : ''}} id="tables_seven7" /> <label for="tables_seven7">7</label></li>
                                                <li><input type="checkbox" value="9" name="tables_no[]" {{in_array(9,$tables_no)?
                                            'checked' : ''}} id="tables_nine9" /> <label for="tables_nine9">9</label></li>
                                                <li><input type="checkbox" value="11" name="tables_no[]" {{in_array(11,$tables_no)?
                                            'checked' : ''}} id="tables_eleven11" /> <label for="tables_eleven11">11</label></li>
                                                <li><input type="checkbox" value="12" name="tables_no[]" {{in_array(12,$tables_no)?
                                            'checked' : ''}} id="tables_twelve12" /> <label for="tables_twelve12">12</label></li>
                                                <li><input type="checkbox" value="13" name="tables_no[]" {{in_array(13,$tables_no)?
                                            'checked' : ''}} id="tables_thirteen13" /> <label for="tables_thirteen13">13</label></li>
                                                <li><input type="checkbox" value="14" name="tables_no[]" {{in_array(14,$tables_no)?
                                            'checked' : ''}} id="tables_fourteen14" /> <label for="tables_fourteen14">14</label></li>
                                                <li><input type="checkbox" value="15" name="tables_no[]" {{in_array(15,$tables_no)?
                                            'checked' : ''}} id="tables_fifteen15" /> <label for="tables_fifteen15">15</label></li>
                                                <li><input type="checkbox" value="16" name="tables_no[]" {{in_array(16,$tables_no)?
                                            'checked' : ''}} id="tables_sixteen16" /> <label for="tables_sixteen16">16</label></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer px-0 pb-0">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update class</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade rurera-confirm-modal" id="rurera-confirm-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-box">
                        <h3 class="font-24 font-weight-normal mb-10 confirm-title"></h3>
                        <p class="mb-15 font-16 confirm-detail"></p>
                        <div class="inactivity-controls">
                            <a href="javascript:;" class="continue-btn" data-dismiss="modal" aria-label="Continue">No</a>
                            <a href="javascript:;" class="confirm-approve-btn">Yes to Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/categories.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script>

        $(document).ready(function () {

            render_rurera_tabs();
            $(document).on('click', '.admin-rurera-tabs li a', function (e) {
                var target_class = $(this).closest('.admin-rurera-tabs').attr('data-target_class');
                var target_div = $(this).attr('id');
                $("."+target_class).addClass('rurera-hide');
                $("."+target_div).removeClass('rurera-hide');
                $(this).closest('.admin-rurera-tabs').find('li').find('a').removeClass('active');
                $(this).addClass('active');
            });

            render_rurera_tabs();

            $(document).on('click', '.edit-class-btn', function (e) {
                //rurera_loader($("#userSettingForm"), 'div');
                var class_id = $(this).attr('data-class_id');
                jQuery.ajax({
                    type: "GET",
                    url: '/admin/classes/edit_modal',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {'class_id':class_id},
                    success: function (return_data) {
                        $(".class-edit-content").html(return_data);
                        $("#class-edit-modal").modal('show');
                        console.log(return_data);
                    }
                });

            });

            $('body').on('click', '.print-users-logins', function (e) {
                var type_class = $(this).attr('data-type_class');
                var student_ids = [];
                $('input.' + type_class + ':checked').each(function() {
                    student_ids.push($(this).val());
                });
                var url = '/admin/students/print_details?users='+student_ids;
                window.open(url, '_blank');

            });

            $('body').on('click', '.unlink-students', function (e) {
                var type_class = $(this).attr('data-type_class');
                var class_id = $(this).attr('data-class_id');
                var student_ids = [];
                $('input.' + type_class + ':checked').each(function() {
                    student_ids.push($(this).val());
                });

                var class_id = $(this).attr('data-class_id');
                $(".confirm-title").html('Are you sure you want to remove?');
                $(".confirm-approve-btn").attr('href', '/admin/classes/unlink_students?class_id='+class_id+'&student_ids='+student_ids);
                $(".rurera-confirm-modal").modal('show');

            });


            $(document).on('input keyup keydown paste', '.search-students', function () {
                var value = $(this).val().toLowerCase();
                $('tbody.students-list tr').each(function () {
                    var rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.includes(value));
                });
            });
        });
        function render_rurera_tabs(){
            if($(".admin-rurera-tabs li a.active").length > 0){
                $(".admin-rurera-tabs li a.active").click();
            }
        }
    </script>
@endpush
