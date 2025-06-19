@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')

    <div class="section-body skeleton">
        <section class="section">
            <div class="section-header">
                <h1>Students {{ trans('admin/main.list') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a>Students</a></div>
                    <div class="breadcrumb-item"><a href="#">{{ trans('admin/main.users_list') }}</a></div>
                    <div class="breadcrumb-item"><a href="/admin/students">Students</a></div>
                </div>
            </div>
        </section>

        <div class="teacher-listing d-flex align-items-center flex-wrap">

            <div class="row w-100">
                <div class="col-12 col-md-12">

                    <ul data-target_class="admin-rurera-tabs-students" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                        <li class="nav-item skelton-height-lg">
                            <a class="nav-link active" id="students-tab-students" href="javascript:;">
                                <span class="tab-title">Students</span>
                            </a>
                        </li>
                        <li class="nav-item skelton-height-lg">
                            <a class="nav-link" id="joining-tab-students" href="javascript:;">
                                <span class="tab-title">Joining Requests</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <div class="admin-rurera-tabs-students students-tab-students">
                    <div class="teacher-table">
                        <div class="card">
                            <div class="teacher-search-filter">

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
                                                <a data-class_id="{{$userObj->class_id}}" class="dropdown-item unlink-students" href="javascript:;" data-type_class="sections-users"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
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
                                                <a data-class_id="{{$userObj->class_id}}" class="dropdown-item unlink-students" href="javascript:;"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
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
                                        <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Last Login</th>
                                        <th class="skelton-hide1 skelton-height-lg skelton-mb-0">School</th>
                                    </tr>
                                    </thead>
                                    <tbody class="students-list">

                                    @if($school->students->count() > 0)
                                        @foreach($school->students as $studentObj)
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
                                                <td data-th="Last Login" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{($studentObj->last_login > 0)? dateTimeFormat($studentObj->last_login, 'j M y | H:i') : '-'}}</td>
                                                <td data-th="School" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{$studentObj->userSchool->title}}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                                {{$school->students->count()}} Students
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="admin-rurera-tabs-students joining-tab-students">
                        <div class="teacher-table">
                            <div class="card">

                                <div class="card-header">
                                    <div class="bulk-actions">
                                        <span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span>
                                        <div class="dropdown-box">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    Bulk Actions <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item print-users-logins1" data-type_class="sections-users" href="javascript:;"><img src="/assets/default/svgs/print.svg" alt="print"> Accept</a>
                                                    <a data-class_id="{{$userObj->class_id}}" class="dropdown-item unlink-students" href="javascript:;" data-type_class="sections-users"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
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
                                            <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Last Login</th>
                                            <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="students-list">

                                        @if($joining_requests->count() > 0)
                                            @foreach($joining_requests as $joiningRequestObj)
                                                <tr>
                                                    <td data-th="Teacher/Admin" class="skelton-hide1 skelton-height-lg skelton-mb-0">
                                                        <div class="check-box">
                                                            <input type="checkbox" class="sections-users" value="{{ $joiningRequestObj->id }}">
                                                        </div>
                                                        <strong>
                                                    <span class="user-lable">
                                                        {{ $joiningRequestObj->student->get_full_name() }}
                                                        <span class="user-email">{{ isset( $joiningRequestObj->section->sectionClass->title)? $joiningRequestObj->section->sectionClass->title : '' }}</span>
                                                    </span>
                                                        </strong>
                                                    </td>
                                                    <td data-th="Last Login" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{($joiningRequestObj->student->last_login > 0)? dateTimeFormat($joiningRequestObj->student->last_login, 'j M y | H:i') : '-'}}</td>
                                                    <td>
                                                        <a href="javascript:;" class="btn-transparent btn-sm text-primary request-action" data-action_type="approved" data-request_id="{{$joiningRequestObj->id}}">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        <a href="javascript:;" class="btn-transparent btn-sm text-primary request-action" data-action_type="cancelled" data-request_id="{{$joiningRequestObj->id}}">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        </tbody>
                                    </table>
                                    {{$joining_requests->count()}} Requests
                                </div>
                            </div>
                        </div>
                    </div>








                </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade invite-teacher-modal" id="invite-teacher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><img src="/assets/default/svgs/user-alt-2-svgrepo-com.svg" alt="user-account"> Invite New Teachers to {{$userObj->userSchool->title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="invite-text-field">
                        <form action="/admin/users/teachers_invitation" method="POST" class="mb-0">
                            {{ csrf_field() }}
                        <h6>Invite Teacher by Email</h6>
                        <div class="textarea-field">
                            <textarea name="teachers_email" placeholder="Enter your teachers work email address."></textarea>
                            <p>List one teacher work email per line. You can also copy/paste from Word Exel</p>
                        </div>
                        <div class="review-btn-holder d-flex align-items-center justify-content-end">
                            <button type="submit" class="review-btn" type="button">Review Invites</button>
                        </div>
                        </form>
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
                    <form action="/admin/users/store" method="POST" class="mb-0">
                        {{ csrf_field() }}
                        <input type="hidden" name="status" value="active">
                        <input type="hidden" name="page_type" value="teachers">
                        <input type="hidden" name="role_id" value="11">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="full_name" class="form-control  " value="" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label>Display Name</label>
                            <input type="text" name="display_name" class="form-control  " value="" placeholder="Display Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" type="text" class="form-control " id="email" value="">
                        </div>
                        <div class="form-group">
                            <label class="input-label">Password</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span type="button" class="input-group-text">
                                <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="password" class="form-control ">
                            </div>
                        </div>
                        <div class="text-right mt-4">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
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
        }, 3000);


        $(document).on('click', '.admin-rurera-tabs li a', function (e) {
            var target_class = $(this).closest('.admin-rurera-tabs').attr('data-target_class');
            var target_div = $(this).attr('id');
            $("."+target_class).addClass('rurera-hide');
            $("."+target_div).removeClass('rurera-hide');
            $(this).closest('.admin-rurera-tabs').find('li').find('a').removeClass('active');
            $(this).addClass('active');
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

        $(document).on('click', '.request-action', function (e) {
            rurera_loader($("#userSettingForm"), 'div');
            var action_type = $(this).attr('data-action_type');
            var request_id = $(this).attr('data-request_id');
            jQuery.ajax({
                type: "POST",
                url: '/admin/sections/join-request-action',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'action_type':action_type,'request_id':request_id},
                success: function (return_data) {
                    window.location.href = '/admin/sections/joining-requests';
                }
            });

        });
    });
    /*Skelton Loading Fungtion End*/
</script>

@endpush
