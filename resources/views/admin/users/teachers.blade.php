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
                    <div class="breadcrumb-item"><a href="#">{{ trans('admin/main.users_list') }}</a></div>
                    <div class="breadcrumb-item"><a href="/admin/students/print_details">Print Details</a></div>
                </div>
            </div>
        </section>

        <div class="teacher-listing d-flex align-items-center flex-wrap">

            <div class="row w-100">
                <div class="col-12 col-md-12">

                    <ul data-target_class="admin-rurera-tabs-teachers" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                        <li class="nav-item skelton-height-lg">
                            <a class="nav-link active" id="teachers-tab-teachers" href="javascript:;">
                                <span class="tab-title">Teachers / Admins</span>
                            </a>
                        </li>
                        <li class="nav-item skelton-height-lg">
                            <a class="nav-link" id="invites-tab-teachers" href="javascript:;">
                                <span class="tab-title">Pending invites</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                <div class="admin-rurera-tabs-teachers teachers-tab-teachers">
                    <div class="teacher-table">
                        <div class="card">
                            <div class="teacher-search-filter">

                                <div class="search-field">
                                    <span class="icon-box">
                                        <img src="/assets/default/svgs/search.svg" alt="search">
                                    </span>
                                    <input type="text" class="search-teachers" placeholder="Search Teachers">
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
                                                <a  class="dropdown-item unlink-students" href="javascript:;" data-type_class="sections-users"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
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
                                                <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#invite-teacher-modal"><img src="/assets/default/svgs/link-svgrepo-com.svg" alt="link-svgrepo-com"> Invite faculty</a>


                                                <a class="dropdown-item create-class-btn" href="javascript:;" data-toggle="modal" data-target="#createTeacherModal"><img src="/assets/default/svgs/plus+.svg" alt="plus+"> Add faculty</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-sm">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Teacher</th>
                                        <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Role</th>
                                        <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Last Login</th>
                                        <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Classes</th>
                                        <th class="skelton-hide1 skelton-height-lg skelton-mb-0">School</th>
                                    </tr>
                                    </thead>
                                    <tbody class="teachers-list">

                                    @if($users->count() > 0)
                                        @foreach($users as $user)
                                            <tr>
                                                <td data-th="Teacher/Admin" class="skelton-hide1 skelton-height-lg skelton-mb-0">
                                                    <div class="check-box">
                                                        <input type="checkbox" class="sections-users" value="{{ $user->id }}">
                                                    </div>
                                                    <strong>
                                                    <span class="user-lable">
                                                        <a href="javascript:;" class="edit-teacher-btn" data-id="{{$user->id}}">{{ $user->get_full_name() }}</a>
                                                        <span class="user-email">{{ $user->email }}</span>
                                                    </span>
                                                    </strong>
                                                </td>
                                                <td data-th="Role" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{isset($user->role->caption)? $user->role->caption : '-'}}</td>
                                                <td data-th="Last Login" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{($user->last_login > 0)? dateTimeFormat($user->last_login, 'j M y | H:i') : '-'}}</td>
                                                <td data-th="Classes" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{$user->getTeacherClasses->count()}}</td>
                                                <td data-th="School" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{isset($user->userSchool->id)? $user->userSchool->title : '-'}}</td>

                                            </tr>
                                        @endforeach
                                    @endif



                                    </tbody>
                                </table>
                                {{$users->count()}} Teachers
                            </div>
                        </div>
                    </div>



                </div>

                    <div class="admin-rurera-tabs-teachers invites-tab-teachers rurera-hide">
                    <div class="teacher-table">
                        <div class="element-heading mb-15">
                            <h2 class="font-22 font-weight-bold">Pending Invites</h2>
                        </div>
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
                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
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
                                                    <input type="checkbox" name="check-two">
                                                </div>
                                                Teacher/Admin
                                            </th>
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
                                                            <input type="checkbox" name="check-one">
                                                        </div>
                                                        <strong>
                                                    <span class="user-lable">
                                                        <span class="user-email">{{$invitationObj->email}}</span>
                                                    </span>
                                                        </strong>
                                                    </td>
                                                    <td data-th="Role" class="skelton-hide skelton-height-lg skelton-mb-0">{{isset($invitationObj->role->caption)? $invitationObj->role->caption : '-'}}</td>
                                                    <td data-th="Last Login" class="skelton-hide skelton-height-lg skelton-mb-0">{{($invitationObj->created_at > 0)? dateTimeFormat($invitationObj->created_at, 'j M y | H:i') : '-'}}</td>
                                                    <td>
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

                            <div class="form-group">
                                <label class="input-label">Role</label>
                                <div class="input-group">
                                    <div class="radio-buttons">
                                            <input type="radio" id="teacher_role" name="role_id"
                                                   class="assignment_subject_check" value="7">
                                        <label for="teacher_role">Teacher</label>
                                    </div>
                                </div>
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
                            </div>
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
                        <input type="hidden" name="school_id" value="{{$userObj->school_id}}">

                        <div class="form-group">
                            <label class="input-label">Role</label>
                            <div class="input-group">
                                <div class="radio-buttons">
                                    <input type="radio" id="teacher_role-add" name="role_id"
                                           class="assignment_subject_check" value="7" checked>
                                    <label for="teacher_role-add">Teacher</label>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="radio-buttons">
                                    <input type="radio" id="district_teacher_role-add" name="role_id"
                                           class="assignment_subject_check" value="11">
                                    <label for="district_teacher_role-add">District Admin</label>
                                </div>
                            </div>
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
                            <input type="text" name="full_name" class="form-control  " value="" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" type="text" class="form-control " id="email" value="" required>
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


        $(document).on('click', '.admin-rurera-tabs li a', function (e) {
            var target_class = $(this).closest('.admin-rurera-tabs').attr('data-target_class');
            var target_div = $(this).attr('id');
            $("."+target_class).addClass('rurera-hide');
            $("."+target_div).removeClass('rurera-hide');
            $(this).closest('.admin-rurera-tabs').find('li').find('a').removeClass('active');
            $(this).addClass('active');
        });

        $(document).on('click', '.delete-invitation', function (e) {
            var invitation_id = $(this).attr('data-id');
            var class_id = $(this).attr('data-class_id');
            $(".confirm-title").html('Are you sure you want to delete?');
            $(".confirm-approve-btn").attr('href', '/admin/users/delete_invitation?invitation_id='+invitation_id);
            $(".rurera-confirm-modal").modal('show');
        });


    });
    /*Skelton Loading Fungtion End*/
</script>

@endpush
