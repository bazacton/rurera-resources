@php
    $alertModule = true;
@endphp
@extends('admin.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="{{ asset('assets/default/css/panel-pages/analytics.css') }}">
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
            <h1>{{$studentObj->get_full_name()}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{ trans('admin/main.dashboard')
                    }}</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ getAdminPanelUrl() }}/students">Students</a>
                </div>
                <div class="breadcrumb-item">Student Detail</div>
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
        <div class="admin-rurera-tabs-holder mt-30">
            <ul data-target_class="admin-rurera-tabs-page-edit" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                @php $passing_data = array(
                       'student_id' => isset($studentObj->id)? $studentObj->id : 0,
                    );
                @endphp
                <li class="nav-item skelton-height-lg">
                    <a class="nav-link rurera-ajax-tabs active" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_details" id="students-tab-details" href="javascript:;">
                        <i class="fas fa-users mx-0"></i>
                        <span class="tab-title">Details</span>
                    </a>
                </li>
                <li class="nav-item skelton-height-lg">
                    <a class="nav-link rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_in_progress_assignments" id="students-tab-assignments" href="javascript:;">
                        <i class="fas fa-users mx-0"></i>
                        <span class="tab-title">In-Progress Assignments</span>
                    </a>
                </li>
                <li class="nav-item skelton-height-lg">
                    <a class="nav-link rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_login_acitivity" id="students-tab-login-activity" href="javascript:;">
                        <i class="fas fa-users mx-0"></i>
                        <span class="tab-title">Login Activity</span>
                    </a>
                </li>
                <li class="nav-item skelton-height-lg">
                    <a class="nav-link rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_analytics" id="students-tab-analytics" href="javascript:;">
                        <i class="fas fa-users mx-0"></i>
                        <span class="tab-title">Analytics</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="section-body populated-data skeleton">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">

                                <div class="admin-rurera-tabs-page-edit students-tab-details">
                                    Details
                                </div>

                                <div class="admin-rurera-tabs-page-edit rurera-hide students-tab-assignments ">
                                    Assignments
                                </div>

                                <div class="admin-rurera-tabs-page-edit rurera-hide students-tab-login-activity">
                                    Activities
                                </div>
                                <div class="admin-rurera-tabs-page-edit rurera-hide students-tab-analytics">
                                    Analytics
                                </div>
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

    <div id="teacher-edit-modal" class="teacher-edit-modal modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClassModalLabel">Edit Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body teacher-edit-content">

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade invite-teacher-modal add-student-modal" id="invite-teacher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><img src="/assets/default/svgs/user-alt-2-svgrepo-com.svg" alt="user-account"> Invite New Members to <span>{{isset($class->school->id)? $class->school->title : ''}}</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="invite-text-field invitation-form-area">
                        <form action="javascript:;" method="POST" class="mb-0 teachers-invites-form">
                            {{ csrf_field() }}

                            <h6>Invite Teacher by Email</h6>

                            <div class="form-group">
                                <label class="input-label">Role</label>
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
                                            <input type="radio" id="district_teacher_role" name="role_id"
                                                   class="assignment_subject_check" value="11">
                                            <label for="district_teacher_role">District Admin</label>
                                        </div>
                                    </div>
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
                                <textarea name="teachers_email" class="teachers_email_input" placeholder="Add Email address of the Member you want to invite"></textarea>
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


@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/categories.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script>

        $(document).ready(function () {

            //render_rurera_tabs();
            $(document).on('click', '.admin-rurera-tabs li a', function (e) {
                var target_class = $(this).closest('.admin-rurera-tabs').attr('data-target_class');
                var target_div = $(this).attr('id');
                $("."+target_class).addClass('rurera-hide');
                $("."+target_div).removeClass('rurera-hide');
                $(this).closest('.admin-rurera-tabs').find('li').find('a').removeClass('active');
                $(this).addClass('active');
                window.location.hash = target_div;
            });

            //render_rurera_tabs();

            $(document).on('click', '.edit-teacher-btn', function (e) {
                //rurera_loader($("#userSettingForm"), 'div');
                //rurera_loader($(this), 'page');
                var class_id = $(this).attr('data-class_id');
                var teacher_id = $(this).attr('data-id');
                jQuery.ajax({
                    type: "GET",
                    url: '/admin/users/edit_teacher',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {'teacher_id':teacher_id, 'class_id' : class_id},
                    success: function (return_data) {
                        $(".teacher-edit-content").html(return_data);
                        $("#teacher-edit-modal").modal('show');
                        console.log(return_data);
                        //rurera_remove_loader($(this), 'page');
                    }
                });

            });

            $(document).on('click', '.edit-class-btn', function (e) {
                //rurera_loader($("#userSettingForm"), 'div');
                rurera_loader($(this), 'page');
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
                        rurera_remove_loader($(this), 'page');
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

            $('body').on('click', '.delete-students', function (e) {
                var type_class = $(this).attr('data-type_class');
                var students_ids = [];
                $('input.' + type_class + ':checked').each(function() {
                    students_ids.push($(this).val());
                });

                $(".confirm-title").html('Are you sure you want to remove?');
                $(".confirm-approve-btn").attr('href', '/admin/users/delete_students?students_ids='+students_ids);
                $(".rurera-confirm-modal").modal('show');
            });


            $(document).on('input keyup keydown paste', '.search-students', function () {
                var value = $(this).val().toLowerCase();
                $('tbody.students-list tr').each(function () {
                    var rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.includes(value));
                });
            });
            $(document).on('input keyup keydown paste', '.search-teachers', function () {
                var value = $(this).val().toLowerCase();
                $('tbody.teachers-list tr').each(function () {
                    var rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.includes(value));
                });
            });

            $('body').on('click', '.unlink-teachers', function (e) {
                var type_class = $(this).attr('data-type_class');
                var teachers_ids = [];
                $('input.' + type_class + ':checked').each(function() {
                    teachers_ids.push($(this).val());
                });

                $(".confirm-title").html('Are you sure you want to unlink?');
                $(".confirm-approve-btn").html('Yes to Unlink');
                $(".confirm-approve-btn").attr('href', '/admin/users/unlink_teachers_from_class?teachers_ids='+teachers_ids);
                $(".rurera-confirm-modal").modal('show');
            });




            $(document).on('click', '.teacher-invites-btn', function (e) {
                //
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

        });
        function render_rurera_tabs(){
            if($(".admin-rurera-tabs li a.active").length > 0){
                $(".admin-rurera-tabs li a.active").click();
            }
        }

        $('body').on('click', '.delete-student', function (e) {
            var student_id = $(this).attr('data-id');
            $(".confirm-title").html('Are you sure you want to remove?');
            $(".confirm-approve-btn").attr('href', '/admin/users/delete_student?student_id='+student_id);
            $(".rurera-confirm-modal").modal('show');
        });

        $('body').on('click', '.student-edit-modal', function (e) {

            $(".edit-student-form-block").addClass('active');
            $(".edit-student-form-block").removeClass('rurera-hide');
            $(".messages-layout-student-block").removeClass('active');
            $(".messages-layout-student-block").addClass('rurera-hide');
            var student_id = $(this).attr('data-id');
            jQuery.ajax({
                type: "GET",
                url: '/admin/users/edit_student_modal',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'student_id':student_id},
                success: function (return_data) {
                    $(".edit-student-modal").modal('show');
                    $('.edit-student-block').html(return_data);
                }
            });
            console.log(student_id);
        });

        $(document).on('submit', '.edit-student-single', function (e) {
            rurera_loader($(".edit-student-form-block"), 'div');


            var formData = new FormData($('.edit-student-single')[0]);
            $.ajax({
                type: "POST",
                url: '/admin/users/edit_student_submit',
                data: formData,
                processData: false,
                contentType: false,
                success: function (return_data) {

                    rurera_modal_alert(
                        'success',
                        'Student Successfully Updated!',
                        false, //confirmButton
                    );
                    window.location.reload();
                }
            });
            return false;
        });

        $(document).on('click', '.google-refresh-roaster', function (e) {
            rurera_loader($(".main-content"), 'div');
            var google_class_id = $(this).attr('data-google_class_id');
            jQuery.ajax({
                type: "GET",
                url: '/admin/classes/refresh_google_roaster',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'google_class_id':google_class_id},
                success: function (return_data) {
                    rurera_remove_loader($(".main-content"), 'div');
                    rurera_modal_alert(
                        return_data.status,
                        return_data.msg,
                        false, //confirmButton
                    );
                    window.location.reload();
                }
            });

        });

        $(document).ready(function() {
            var hash = window.location.hash;
            if (hash) {
                $(hash + '.nav-link').trigger('click');
            }
        });
        /*Skelton Loading Fungtion Start*/
        $(document).ready(function () {
            const $el = document.querySelector(".section-body");

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

    </script>
@endpush
