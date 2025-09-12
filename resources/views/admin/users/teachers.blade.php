@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')

    <div class="section-body skeleton">
        <section class="section">
            <div class="section-header">
                <div class="heading-holder">
                    <h1>Teachers {{ trans('admin/main.list') }}</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a>Teachers</a></div>
                    </div>
                </div>
            </div>
        </section>

        <div class="teacher-listing">

            <div class="row w-100">
                <div class="col-12 col-md-12">
                    <div class="admin-rurera-tabs-holder">
                        <ul data-target_class="admin-rurera-tabs-teachers" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="teachers-tab-teachers" href="javascript:;">
                                    <span class="tab-title">Teachers / Admins</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="invites-tab-teachers" href="javascript:;">
                                    <span class="tab-title">Pending invites</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12">
                <div class="admin-rurera-tabs-teachers teachers-tab-teachers">
                    <div class="teacher-table">
                        <div class="card">
                            <div class="card-header justify-content-end">
                                <div class="bulk-actions mr-auto">
                                    <span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span>
                                    <div class="dropdown-box">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle bulk-actions-btn disabled" href="#" data-toggle="dropdown" aria-expanded="false">
                                                Bulk Actions <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                                            </a>
                                            <div class="dropdown-menu">
                                                <a  class="dropdown-item unlink-teachers" href="javascript:;" data-type_class="sections-teachers"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="teacher-search-filter-holder ml-auto d-inline-flex align-items-center">
                                    <div class="invite-faculty">
                                        <div class="dropdown-box">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    Invite Faculty <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item teachers-invitation-modal-btn" href="javascript:;" data-toggle="modal" data-target="#invite-teacher-modal"><img src="/assets/default/svgs/link-svgrepo-com.svg" alt="link-svgrepo-com"> Invite faculty</a>
                                                    <a class="dropdown-item create-class-btn" href="javascript:;" data-toggle="modal" data-target="#createTeacherModal"><img src="/assets/default/svgs/plus+.svg" alt="plus+"> Add faculty</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="teacher-search-filter border-0 p-0">
                                        <div class="search-field">
                                    <span class="icon-box">
                                        <img src="/assets/default/svgs/search.svg" alt="search">
                                    </span>
                                            <input type="text" class="search-teachers" placeholder="Search Teachers">
                                        </div>
                                    </div>
                                    <div class="form-group ml-0">
                                        <div class="select-holder">
                                            <select name="class_id" data-plugin-selectTwo class="form-control populate rurera_self_submitted_field form-control classes_filter" data-field_key="class_id">
                                                <option value="all">All Classes</option>
                                                @if( $filter_classes_list->count() > 0)
                                                    @foreach($filter_classes_list as $classObj)
                                                        <option value="{{$classObj->id}}" @if(request()->get('class_id') == $classObj->id)
                                                            selected @endif>{{$classObj->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body p-0 table-sm">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>
                                            <div class="check-box">
                                                <input type="checkbox" class="check-uncheck-all" data-target_class="sections-teachers" name="check-two">
                                            </div>
                                            Teacher
                                        </th>
                                        <th>Role</th>
                                        <th>Last Login</th>
                                        <th>Classes</th>
                                        <th>School</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="teachers-list">

                                    @if($users->count() > 0)
                                        @foreach($users as $user)
                                            <tr>
                                                <td data-th="Teacher/Admin">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                        <div class="check-box">
                                                            @if($user->id != $userObj->id)
                                                            <input type="checkbox" class="sections-teachers" value="{{ $user->id }}">
                                                            @endif
                                                        </div>
                                                        <strong>
                                                        <span class="user-lable">
                                                            <a href="javascript:;" class="edit-teacher-btn" data-id="{{$user->id}}">{{ $user->get_full_name() }}</a>
                                                            <span class="user-email">{{ $user->email }}</span>
                                                        </span>
                                                        </strong>
                                                    </div>
                                                </td>
                                                <td data-th="Role">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>{{isset($user->role->caption)? $user->role->caption : '-'}}</span>
                                                    </div>
                                                </td>
                                                <td data-th="Last Login">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>{{($user->last_login > 0)? dateTimeFormat($user->last_login, 'j M y | H:i') : '-'}}</span>
                                                    </div>
                                                </td>
                                                <td data-th="Classes">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>{{$user->getTeacherClasses->count()}}</span>
                                                    </div>
                                                </td>
                                                <td data-th="School">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>{{isset($user->userSchool->id)? $user->userSchool->title : '-'}}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                <div class="pending-invites-controls">
                                                    @if(!auth()->user()->isTeacherPanel())
                                                        <button class="teacher-edit-modal" data-id="{{$user->id}}" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Edit Teacher">
                                                            <img src="/assets/default/svgs/edit-pencil.svg" alt="edit-pencil">
                                                        </button>

                                                        <button data-id="{{$user->id}}" class="delete-teacher" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Delete Teacher">
                                                            <img src="/assets/default/svgs/delete-menu.svg" alt="delete-menu">
                                                        </button>
                                                    @endif
                                                </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <span class="table-counts">{{$users->count()}} Teachers</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="admin-rurera-tabs-teachers invites-tab-teachers rurera-hide">
                    <div class="teacher-table">
                        <div class="card">
                            <div class="card-header">
                                <div class="bulk-actions">
                                    <span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span>
                                    <div class="dropdown-box">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle bulk-actions-btn disabled" href="#" data-toggle="dropdown" aria-expanded="false">
                                                Bulk Actions <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item delete-invitations" data-type_class="invitations_list" href="javascript:;"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-sm">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>
                                                <div class="check-box">
                                                    <input type="checkbox" class="check-uncheck-all" data-target_class="invitations_list" name="check-two">
                                                </div>
                                                Teacher/Admin
                                            </th>
                                            <th>School - Class</th>
                                            <th>Role</th>
                                            <th>Date Invited</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if($invitations->count() > 0)
                                            @foreach($invitations as $invitationObj)
                                                <tr>
                                                    <td data-th="Teacher/Admin">
                                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                            <div class="check-box">
                                                                <input type="checkbox" name="check-one" class="invitations_list" value="{{$invitationObj->id}}">
                                                            </div>
                                                            <strong>
                                                                <span class="user-lable">
                                                                    <span class="user-email">{{$invitationObj->email}}</span>
                                                                </span>
                                                            </strong>
                                                        </div>
                                                    </td>
                                                    <td data-th="SchoolClass">
                                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>{{isset($invitationObj->InvitationSchool->title)? $invitationObj->InvitationSchool->title : '-'}} - {{isset($invitationObj->InvitationClass->title)? $invitationObj->InvitationClass->title : '-'}}</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Role">
                                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>{{isset($invitationObj->role->caption)? $invitationObj->role->caption : '-'}}</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Last Login">
                                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>{{($invitationObj->created_at > 0)? dateTimeFormat($invitationObj->created_at, 'j M y | H:i') : '-'}}</span>
                                                        </div>
                                                    </td>
                                                    <td class="has-controls">
                                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                            <div class="pending-invites-controls">
                                                                <button class="copy-to-text" data-copy_to="invitation-link-{{$invitationObj->id}}" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Copy invite link">
                                                                    <img src="/assets/default/svgs/link-file.svg" alt="link-file">
                                                                    <span class="rurera-hide invitation-link-{{$invitationObj->id}}">{{url('signup-teacher?token='.$invitationObj->invitation_token.'&email='.$invitationObj->email)}}</span>
                                                                </button>
                                                                <button data-id="{{$invitationObj->id}}" class="delete-invitation" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Delete invite">
                                                                    <img src="/assets/default/svgs/delete-menu.svg" alt="delete-menu">
                                                                </button>
                                                                <button type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Re-send Invite">
                                                                    <img src="/assets/default/svgs/envelope-mail-svgrepo-com.svg" alt="envelope-mail-svgrepo-com">
                                                                    Re-send Invite
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td data-th="no-records" colspan="5" class="no-records-found">No Records Found!</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="analytics-progress-list">
            <div class="row">
                <div class="col-12">
                    <div class="analytics-progress-card">
                        <div class="progress-media">
                            <div class="img-holder">
                                <img src="/assets/default/img/ecommerce-img.webp" alt="ecommerce">
                            </div>
                            <div class="text-holder">
                                <h5><a href="#">Discord Homepage</a></h5>
                                <span>discord.com</span>
                            </div>
                        </div>
                        <div class="analytics-progress">
                            <div class="metrics">
                                <div class="metric">
                                    <span class="metric-label">GOOD (CRUX)</span>
                                    <div class="progress-bar">
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block"></div>
                                    </div>
                                    <span class="metric-value">87%</span>
                                </div>
                                <div class="metric">
                                    <span class="metric-label">FCP</span>
                                    <div class="progress-bar">
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block"></div>
                                        <div class="progress-block"></div>
                                        <div class="progress-block"></div>
                                    </div>
                                    <span class="metric-value">1.2s</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="analytics-progress-card">
                        <div class="progress-media">
                            <div class="img-holder">
                                <img src="/assets/default/img/quiz-start.webp" alt="quiz-start">
                            </div>
                            <div class="text-holder">
                                <h5><a href="#">Quickbooks Homepage</a></h5>
                                <span>quickbooks.com</span>
                            </div>
                        </div>
                        <div class="analytics-progress">
                            <div class="metrics">
                                <div class="metric">
                                    <span class="metric-label">GOOD (CRUX)</span>
                                    <div class="progress-bar">
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                    </div>
                                    <span class="metric-value">94%</span>
                                </div>
                                <div class="metric">
                                    <div class="metric-label">FCP</div>
                                    <div class="progress-bar">
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block"></div>
                                    </div>
                                    <span class="metric-value">0.9s</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="analytics-progress-card">
                        <div class="progress-media">
                            <div class="img-holder">
                                <img src="/assets/default/img/video.png" alt="video">
                            </div>
                            <div class="text-holder">
                                <h5><a href="#">web.dev - Desktop</a></h5>
                                <span>web.dev.com</span>
                            </div>
                        </div>
                        <div class="analytics-progress">
                            <div class="metrics">
                                <div class="metric">
                                    <div class="metric-label">GOOD (CRUX)</div>
                                    <div class="progress-bar">
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block partial"></div>
                                        <div class="progress-block partial"></div>
                                        <div class="progress-block partial"></div>
                                        <div class="progress-block"></div>
                                    </div>
                                    <div class="metric-value">68%</div>
                                </div>
                                <div class="metric">
                                    <div class="metric-label">FCP</div>
                                    <div class="progress-bar">
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block filled"></div>
                                        <div class="progress-block"></div>
                                        <div class="progress-block"></div>
                                        <div class="progress-block"></div>
                                        <div class="progress-block"></div>
                                        <div class="progress-block"></div>
                                    </div>
                                    <div class="metric-value">2.1s</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="students-classroom-activity">
            <div class="students-classroom">
                <div class="classroom-card" data-label="total">
                    <span class="icon-box">
                        <img src="/assets/default/svgs/user.svg" alt="">
                        <em>15</em>
                    </span>
                    <p>Total <br /> Students</p>
                </div>
                <div class="classroom-card" data-label="idle">
                    <span class="icon-box">
                        <img src="/assets/default/svgs/user.svg" alt="">
                        <em>2</em>
                    </span>
                    <p>Students <br /> Idle</p>
                </div>
                <div class="classroom-card" data-label="help">
                    <span class="icon-box">
                        <img src="/assets/default/svgs/user.svg" alt="">
                        <em>2</em>
                    </span>
                    <p>Students May <br /> need help</p>
                </div>
                <div class="classroom-card" data-label="skill">
                    <span class="icon-box">
                        <img src="/assets/default/svgs/user.svg" alt="">
                        <em>2</em>
                    </span>
                    <p>Skills <br /> in Practice</p>
                </div>
                <div class="classroom-card" data-label="questions">
                    <span class="icon-box">
                        <img src="/assets/default/svgs/user.svg" alt="">
                        <em>2</em>
                    </span>
                    <p>Questions Practiced <br /> (Past Hour)</p>
                </div>
            </div>
            <div class="students-activity">
                <div class="row">
                    <div class="col-12">
                        <div class="activity-filter-area">
                            <div class="activity-heading">
                                <h3>Student activity wall</h3>
                            </div>
                            <div class="activity-filters">
                                <div class="sort-by">
                                    <div class="select-holder">
                                        <select>
                                            <option value="Sort by">Sort by</option>
                                            <option value="Sort by">Sort by</option>
                                            <option value="Sort by">Sort by</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="js-switch-parent">
                                    <label class="js-switch cursor-pointer" for="skill">Group by skill:</label>
                                    <div class="custom-control custom-switch">
                                        <input id="skill" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="skill"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-3">
                        <div class="activity-card alert">
                            <div class="card-heading-area">
                                <h5>Bryce Carlson</h5>
                                <span>5th (BB.3) Choose the antonym</span>
                            </div>
                            <div class="card-footer-area">
                                <div class="student-q-progress">
                                    <span>11 questions answered</span>
                                    <div class=""></div>
                                </div>
                                <div class="num-of-q">
                                    <span>38</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-3">
                        <div class="activity-card paused">
                            <div class="card-heading-area">
                                <h5>Jessica Moore</h5>
                                <span>5th (BB.3) Choose the antonym</span>
                            </div>
                            <div class="card-footer-area">
                                <div class="student-q-progress">
                                    <span>15 questions answered</span>
                                    <div class=""></div>
                                </div>
                                <div class="num-of-q">
                                    <span>67</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-3">
                        <div class="activity-card low">
                            <div class="card-heading-area">
                                <h5>Katie Cho</h5>
                                <span>5th (J.1) Divide by powers of ten</span>
                            </div>
                            <div class="card-footer-area">
                                <div class="student-q-progress">
                                    <span>6 questions answered</span>
                                    <div class=""></div>
                                </div>
                                <div class="num-of-q">
                                    <span>67</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-3">
                        <div class="activity-card low">
                            <div class="card-heading-area">
                                <h5>Craig Garza</h5>
                                <span>5th (J.1) Divide by powers of ten</span>
                            </div>
                            <div class="card-footer-area">
                                <div class="student-q-progress">
                                    <span>12 questions answered</span>
                                    <div class=""></div>
                                </div>
                                <div class="num-of-q">
                                    <span>60</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade invite-teacher-modal add-student-modal" id="invite-teacher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><img src="/assets/default/svgs/user-alt-2-svgrepo-com.svg" alt="user-account">Invite New Members</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="invite-text-field invitation-form-area">
                        <form action="javascript:;" method="POST" class="mb-0 teachers-invites-form" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="form-group {{(!auth()->user()->isDistricAdmin() && !auth()->user()->isAdminRole())? 'rurera-hide' : ''}}">
                                <label>Select School</label>
                                <div class="select-box">
                                    <select name="school_id" class="student-school-change schools-list-ajax" data-next_target="school-classes-list" data-selected_value="0">
                                        @if($schools_list->count() > 0)
                                            @php $row_no = 0; @endphp
                                            @foreach($schools_list as $schoolObj)
                                                @php $is_checked = ($row_no == 0)? 'checked' : ''; @endphp
                                                @if(!auth()->user()->isDistricAdmin() && !auth()->user()->isAdminRole())
                                                    @php $is_checked = ($schoolObj->id == $userObj->school_id)? 'checked' : $is_checked; @endphp
                                                @endif
                                                <option value="{{$schoolObj->id}}" {{$is_checked}}>{{$schoolObj->title}}</option>
                                                @php $row_no++; @endphp
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Select a Class</label>
                                <div class="select-box">
                                    <select name="class_id" class="student-class-change school-classes-list">
                                        <option value="">Select Class</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <h6>Choose Faculty Role</h6>
                                <div class="input-group">
                                    <div class="radio-buttons">
                                            <input type="radio" id="teacher_role" name="role_id"
                                                   class="assignment_subject_check" value="7" checked>
                                        <label for="teacher_role">Teacher</label>
                                    </div>
                                </div>
                                @if(auth()->user()->isDistricAdmin())
                                <div class="input-group">
                                    <div class="radio-buttons">
                                        <input type="radio" id="school_admin_role" name="role_id"
                                               class="assignment_subject_check" value="14">
                                        <label for="school_admin_role">School Admin</label>
                                    </div>
                                </div>
                                @endif
                            </div>

                        <div class="textarea-field">
                            <textarea name="teachers_email" class="teachers_email_input" placeholder="Add Email address of the Member you want to invite" required></textarea>
                            <p>List one member work email per line. You can also copy/paste from Word Exel</p>
                            <p>Maximum no of emails allowed is 20</p>
                        </div>
                        <div class="review-btn-holder d-flex align-items-center justify-content-end">
                            <button type="button" class="review-btn teacher-invites-btn" type="button">Review Invites</button>
                        </div>
                        </form>
                    </div>
                    <div class="invitation-response-area rurera-hide">
                        <div class="invitation-response-block"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade create-class-modal" id="createTeacherModal" tabindex="-1" role="dialog" aria-labelledby="createTeacherModalLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTeacherModalLabel">Create a New Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/users/store" method="POST" class="mb-0" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="hidden" name="status" value="active">
                        <input type="hidden" name="page_type" value="teachers">
                        <div class="form-group {{(!auth()->user()->isDistricAdmin() && !auth()->user()->isAdminRole())? 'rurera-hide' : ''}}">
                            <label>Select School</label>
                            <div class="select-box">
                                <select name="school_id" class="student-school-change schools-list-ajax" data-next_target="school-classes-list" data-selected_value="0">
                                    @if($schools_list->count() > 0)
                                        @php $row_no = 0; @endphp
                                        @foreach($schools_list as $schoolObj)
                                            @php $is_checked = ($row_no == 0)? 'checked' : ''; @endphp
                                            @if(!auth()->user()->isDistricAdmin() && !auth()->user()->isAdminRole())
                                                @php $is_checked = ($schoolObj->id == $userObj->school_id)? 'checked' : $is_checked; @endphp
                                            @endif
                                            <option value="{{$schoolObj->id}}" {{$is_checked}}>{{$schoolObj->title}}</option>
                                            @php $row_no++; @endphp
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="select-holder">
                                <label class="input-label">Select a Class</label>
                                <div class="select-box input-group">
                                    <select name="class_id" class="student-class-change school-classes-list">
                                        <option value="">Select Class</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="input-label">Role</label>
                            <div class="input-group">
                                <div class="radio-buttons">
                                    <input type="radio" id="teacher_role-add" name="role_id"
                                           class="assignment_subject_check" value="7" checked>
                                    <label for="teacher_role-add">Teacher</label>
                                </div>
                            </div>
                            @if(auth()->user()->isDistricAdmin())

                            <div class="input-group">
                                <div class="radio-buttons">
                                    <input type="radio" id="school_admin_role-add" name="role_id"
                                           class="assignment_subject_check" value="14">
                                    <label for="school_admin_role-add">School Admin</label>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Full Name</label>
                            <div class="form-field">
                                <span class="icon-box">
                                    <img src="/assets/default/img/user.png" alt="user">
                                </span>
                                <input type="text" name="full_name" class="form-control  " value="" placeholder="Full name of the new member" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <div class="form-field">
                                <span class="icon-box">
                                    <img src="/assets/default/img/envelope.jpg" alt="envelope">
                                </span>
                                <input name="email" type="text" class="form-control" placeholder="Email for login & updates" id="email" value="" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="input-label">Password</label>
                            <div class="input-group">
                                <span class="icon-box">
                                    <img src="/assets/default/img/key-lock.jpg" alt="key-lock">
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Create a strong password" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="text-right mt-4">
                            <button class="simple-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade edit-teacher-modal add-student-modal" id="edit-teacher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body student-modal-box">

                        <div id="section4" class="modal-section edit-teacher-form-block active">
                            <form action="/admin/users/update_faculty" method="POST" class="mb-0 edit-teacher-form">
                                {{ csrf_field() }}
                                <div class="edit-teacher-block"></div>
                                <div class="teacher-buttons mt-30">
                                    <button type="submit" class="btn btn-primary edit-teacher-btn">Update Teacher</button>
                                </div>
                            </form>
                        </div>
                        <div class="messages-layout-teacher-block rurera-hide mt-30"></div>
                    </div>
                </div>
            </div>
        </div>
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

<script>
    /*Skelton Loading Fungtion Start*/
    $(document).ready(function () {
        const $el = document.querySelector(".section-body");

        setTimeout(() => {
        $el.classList.remove("skeleton");
        $el
            .querySelectorAll(".skelton-hide")
            .forEach((el) => el.classList.remove("skelton-hide"));
        }, 1000);

        $('body').on('click', '.unlink-teachers', function (e) {
            var type_class = $(this).attr('data-type_class');
            var teachers_ids = [];
            $('input.' + type_class + ':checked').each(function() {
                teachers_ids.push($(this).val());
            });

            $(".confirm-title").html('Are you sure you want to remove?');
            $(".confirm-approve-btn").attr('href', '/admin/users/unlink_teachers?teachers_ids='+teachers_ids);
            $(".rurera-confirm-modal").modal('show');
        });


        $(document).on('click', '.admin-rurera-tabs li a', function (e) {
            var target_class = $(this).closest('.admin-rurera-tabs').attr('data-target_class');
            var target_div = $(this).attr('id');
            $("."+target_class).addClass('rurera-hide');
            $("."+target_div).removeClass('rurera-hide');
            $(this).closest('.admin-rurera-tabs').find('li').find('a').removeClass('active');
            $(this).addClass('active');
            window.location.hash = target_div;
        });

        $(document).on('click', '.delete-invitation', function (e) {
            var invitation_id = $(this).attr('data-id');
            var class_id = $(this).attr('data-class_id');
            $(".confirm-title").html('Are you sure you want to delete?');
            $(".confirm-approve-btn").attr('href', '/admin/users/delete_invitation?invitation_id='+invitation_id);
            $(".rurera-confirm-modal").modal('show');
        });

        $(document).on('click', '.delete-invitations', function (e) {
            var type_class = $(this).attr('data-type_class');
            var invitation_ids = [];
            $('input.' + type_class + ':checked').each(function() {
                invitation_ids.push($(this).val());
            });

            $(".confirm-title").html('Are you sure you want to remove?');
            $(".confirm-approve-btn").attr('href', '/admin/users/delete_invitations?invitation_ids='+invitation_ids);
            $(".rurera-confirm-modal").modal('show');
        });


        $(document).on('click', '.delete-teacher', function (e) {
            var teachers_ids = $(this).attr('data-id');
            $(".confirm-title").html('Are you sure you want to remove?');
            $(".confirm-approve-btn").attr('href', '/admin/users/unlink_teachers?teachers_ids='+teachers_ids);
            $(".rurera-confirm-modal").modal('show');
        });


        $(document).on('change', '.check-uncheck-all', function (e) {
            var target_class = $(this).attr('data-target_class');
            var isChecked = $(this).is(':checked');
            $('.' + target_class).prop('checked', isChecked);
        });

        $(document).on('input keyup keydown paste', '.search-teachers', function () {
            var value = $(this).val().toLowerCase();
            $('tbody.teachers-list tr').each(function () {
                var rowText = $(this).text().toLowerCase();
                $(this).toggle(rowText.includes(value));
            });
        });
        $(document).on('click', '.teacher-invites-btn', function (e) {
            //
            var form = $(this).closest('form')[0];

            // Manually trigger HTML5 validation
            if (!form.checkValidity()) {
                form.reportValidity(); // shows the validation error messages
                return;
            }
            var formData = new FormData($(this).closest('form')[0]);
            $.ajax({
                type: "POST",
                url: '/admin/users/teachers_invitation',
                data: formData,
                processData: false,
                contentType: false,
                success: function (return_data) {
                    $(".invitation-form-area").addClass('rurera-hide');
                    $(".invitation-response-area").removeClass('rurera-hide');
                    $(".invitation-response-block").html(return_data);
                    console.log(return_data);
                }
            });
        });

        $(document).on('click', '.invitation-back-btn', function () {
            $(".invitation-form-area").removeClass('rurera-hide');
            $(".invitation-response-area").addClass('rurera-hide');
        });



        $(document).on('click', '.teachers-invitation-modal-btn', function () {
            $(".invitation-form-area").removeClass('rurera-hide');
            $(".invitation-response-area").addClass('rurera-hide');
            $(".teachers_email_input").val('');
        });


        //bulk-actions-btn



    });

    $(document).ready(function() {
        $(".schools-list-ajax").change();
        var hash = window.location.hash;
        if (hash) {
            $(hash + '.nav-link').trigger('click');
        }
    });

    $('body').on('click', '.teacher-edit-modal', function (e) {

        $(".edit-teacher-form-block").addClass('active');
        $(".edit-teacher-form-block").removeClass('rurera-hide');
        $(".messages-layout-teacher-block").removeClass('active');
        $(".messages-layout-teacher-block").addClass('rurera-hide');
        var teacher_id = $(this).attr('data-id');
        jQuery.ajax({
            type: "GET",
            url: '/admin/users/edit_teacher_modal',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {'teacher_id':teacher_id},
            success: function (return_data) {
                $(".edit-teacher-modal").modal('show');
                $('.edit-teacher-block').html(return_data);
            }
        });
        console.log(teacher_id);
    });

    $(document).on('submit', '.edit-teacher-form', function (e) {
        returnType = rurera_validation_process($(this));
        if (returnType == false) {
            return false;
        }
        rurera_loader($(this).find('.edit-teacher-btn'), 'div');
        return true;
    });
    /*Skelton Loading Fungtion End*/
</script>

@endpush
