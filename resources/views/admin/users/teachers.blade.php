@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')

    <div class="section-body skeleton">
        <section class="section">
            <div class="section-header">
                <h1>Teachers {{ trans('admin/main.list') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a>Teachers</a></div>
                </div>
            </div>
        </section>

        <div class="teacher-listing d-flex align-items-center flex-wrap">

            <div class="row w-100">
                <div class="col-12 col-md-12">
                    <div class="admin-rurera-tabs-holder">
                        <ul data-target_class="admin-rurera-tabs-teachers" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="teachers-tab-teachers" href="javascript:;">
                                    <i class="fas fa-chalkboard-teacher mx-0"></i>
                                    <span class="tab-title">Teachers / Admins</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="invites-tab-teachers" href="javascript:;">
                                    <i class="fas fa-envelope-open-text mx-o"></i>
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
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">{{isset($user->role->caption)? $user->role->caption : '-'}}</div>
                                                </td>
                                                <td data-th="Last Login">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                        {{($user->last_login > 0)? dateTimeFormat($user->last_login, 'j M y | H:i') : '-'}}
                                                    </div>
                                                </td>
                                                <td data-th="Classes">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">{{$user->getTeacherClasses->count()}}</div>
                                                </td>
                                                <td data-th="School">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">{{isset($user->userSchool->id)? $user->userSchool->title : '-'}}</div>
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
                                            <th class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <div class="check-box">
                                                    <input type="checkbox" class="check-uncheck-all" data-target_class="invitations_list" name="check-two">
                                                </div>
                                                Teacher/Admin
                                            </th>
                                            <th class="skelton-hide skelton-height-lg skelton-mb-0">School - Class</th>
                                            <th class="skelton-hide skelton-height-lg skelton-mb-0">Role</th>
                                            <th class="skelton-hide skelton-height-lg skelton-mb-0">Date Invited</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if($invitations->count() > 0)
                                            @foreach($invitations as $invitationObj)
                                                <tr>
                                                    <td data-th="Teacher/Admin" class="skelton-hide skelton-height-lg skelton-mb-0">
                                                        <div class="check-box">
                                                            <input type="checkbox" name="check-one" class="invitations_list" value="{{$invitationObj->id}}">
                                                        </div>
                                                        <strong>
                                                    <span class="user-lable">
                                                        <span class="user-email">{{$invitationObj->email}}</span>
                                                    </span>
                                                        </strong>
                                                    </td>
                                                    <td data-th="SchoolClass" class="skelton-hide skelton-height-lg skelton-mb-0">{{isset($invitationObj->InvitationSchool->title)? $invitationObj->InvitationSchool->title : '-'}} - {{isset($invitationObj->InvitationClass->title)? $invitationObj->InvitationClass->title : '-'}}</td>
                                                    <td data-th="Role" class="skelton-hide skelton-height-lg skelton-mb-0">{{isset($invitationObj->role->caption)? $invitationObj->role->caption : '-'}}</td>
                                                    <td data-th="Last Login" class="skelton-hide skelton-height-lg skelton-mb-0">{{($invitationObj->created_at > 0)? dateTimeFormat($invitationObj->created_at, 'j M y | H:i') : '-'}}</td>
                                                    <td class="has-controls">
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
                                                    </td>

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
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade invite-teacher-modal add-student-modal" id="invite-teacher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><img src="/assets/default/svgs/user-alt-2-svgrepo-com.svg" alt="user-account"> Invite New Teachers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="invite-text-field invitation-form-area">
                        <form action="javascript:;" method="POST" class="mb-0 teachers-invites-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="select-holder">
                                    <h5>Select School</h5>
                                    <div class="select-box">
                                        <select name="school_id" class="student-school-change schools-list-ajax" data-next_target="school-classes-list" data-selected_value="0">
                                            @if($schools_list->count() > 0)
                                                @php $row_no = 0; @endphp
                                                @foreach($schools_list as $schoolObj)
                                                    @php $is_checked = ($row_no == 0)? 'checked' : ''; @endphp
                                                    <option value="{{$schoolObj->id}}" {{$is_checked}}>{{$schoolObj->title}}</option>
                                                    @php $row_no++; @endphp
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select-holder">
                                    <h5>Select a Class</h5>
                                    <div class="select-box input-group">
                                        <select name="class_id" class="student-class-change school-classes-list">
                                            <option value="">Select Class</option>
                                        </select>
                                    </div>
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
                                        <input type="radio" id="district_teacher_role" name="role_id"
                                               class="assignment_subject_check" value="11">
                                        <label for="district_teacher_role">District Admin</label>
                                    </div>
                                </div>
                                @endif
                                <div class="input-group">
                                    <div class="radio-buttons">
                                        <input type="radio" id="school_admin_role" name="role_id"
                                               class="assignment_subject_check" value="14">
                                        <label for="school_admin_role">School Admin</label>
                                    </div>
                                </div>
                            </div>

                        <div class="textarea-field">
                            <textarea name="teachers_email" class="teachers_email_input" placeholder="Add Email address of the Member you want to invite" required></textarea>
                            <p>List one teacher work email per line. You can also copy/paste from Word Exel</p>
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
                    <form action="/admin/users/store" method="POST" class="mb-0">
                        {{ csrf_field() }}
                        <input type="hidden" name="status" value="active">
                        <input type="hidden" name="page_type" value="teachers">
                        <div class="form-group">
                            <div class="select-holder">
                                <h5>Select School</h5>
                                <div class="select-box">
                                    <select name="school_id" class="student-school-change schools-list-ajax" data-next_target="school-classes-list" data-selected_value="0">
                                        @if($schools_list->count() > 0)
                                            @php $row_no = 0; @endphp
                                            @foreach($schools_list as $schoolObj)
                                                @php $is_checked = ($row_no == 0)? 'checked' : ''; @endphp
                                                <option value="{{$schoolObj->id}}" {{$is_checked}}>{{$schoolObj->title}}</option>
                                                @php $row_no++; @endphp
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="select-holder">
                                <h5>Select a Class</h5>
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
                                    <input type="radio" id="district_teacher_role-add" name="role_id"
                                           class="assignment_subject_check" value="11">
                                    <label for="district_teacher_role-add">District Admin</label>
                                </div>
                            </div>
                            @endif
                            <div class="input-group">
                                <div class="radio-buttons">
                                    <input type="radio" id="school_admin_role-add" name="role_id"
                                           class="assignment_subject_check" value="14">
                                    <label for="school_admin_role-add">School Admin</label>
                                </div>
                            </div>
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
                                <input type="password" name="password" class="form-control" placeholder="Create a strong password" autocomplete="off">
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
        }, 3000);

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
    /*Skelton Loading Fungtion End*/
</script>

@endpush
