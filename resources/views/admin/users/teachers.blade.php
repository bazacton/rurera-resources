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
        <div class="nav-area">
            <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                <li class="nav-item skelton-hide skelton-height-lg skelton-mb-0">
                    <a class="nav-link" id="topics-tab" href="/admin/all">
                        <span class="tab-title">All</span>
                    </a>
                </li>
                <li class="nav-item skelton-hide skelton-height-lg skelton-mb-0">
                    <a class="nav-link" id="topics-tab" href="/admin/sections/admin">
                        <span class="tab-title">Admin</span>
                    </a>
                </li>
                <li class="nav-item skelton-hide skelton-height-lg skelton-mb-0">
                    <a class="nav-link active" id="topics-tab" href="/admin/teachers">
                        <span class="tab-title">Teachers</span>
                    </a>
                </li>
            </ul>
            <div class="teacher-controls">
                <button type="button" class="create-class-btn skelton-hide skelton-height-lg skelton-mb-0" data-toggle="modal" data-target="#createTeacherModal"><i class="fas fa-plus-circle"></i> Create Teacher</button>
            </div>
        </div>
        <div class="teacher-listing d-flex align-items-center flex-wrap">
            @if($users->count() > 0)
                @foreach($users as $user)
                <div class="listing-grid-card">
                    <div class="img-holder skelton-hide">
                        <figure>
                            <img src="{{ $user->getAvatar() }}" alt="{{ $user->get_full_name() }}">
                            <figcaption>
                                <span class="count-lable">Admin</span>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="text-holder">
                        <div class="author-info">
                            <span class="img-box skelton-hide">
                                <img src="{{ $user->getAvatar() }}" alt="{{ $user->get_full_name() }}">
                                <span class="country-flag">
                                    <img src="{{ $user->getAvatar() }}" alt="{{ $user->get_full_name() }}">
                                    </span>
                            </span>
                            <div class="card-title-holder">
                                <h5 class="skelton-hide">{{ $user->get_full_name() }}</h5>
                            </div>
                            <div class="author-contact-info">
                                <a href="#" class="skelton-hide"><i class="fas fa-envelope"></i> {{ $user->email }}</a>
                                @if($user->mobile != '')
                                <span class="phone-number-box">
                                    <i class="fas fa-phone"></i>
                                    <span class="phone-number" onclick="togglePhoneNumber(this)" data-full-number="987-654-3210">
                                        {{ $user->mobile }}
                                    </span>
                                </span>
                                @endif
                            </div>
                            <div class="author-designation">
                                @if($user->getTeacherClasses->count() > 0)
                                    @foreach($user->getTeacherClasses as $classTeacherObj)
                                        @php
                                            $teacherClass = $classTeacherObj->teacherClass;
                                        @endphp
                                        <span class="designation-lable">{{isset($teacherClass->category->title)? $teacherClass->category->title : ''}}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="teacher-list-controls">
                            <button type="button" class="edit-btn skelton-hide skelton-height-lg skelton-mb-0"><img src="/assets/default/svgs/edit-pencil.svg" alt="edit-pencil"></button>
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
            <div class="row w-100">
                <div class="col-12 col-md-12">
                    <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                        <li class="nav-item skelton-hide skelton-height-lg">
                            <a class="nav-link active" id="topics-tab" href="#">
                                <span class="tab-title">Teachers / Admins</span>
                            </a>
                        </li>
                        <li class="nav-item skelton-hide skelton-height-lg">
                            <a class="nav-link" id="topics-tab" href="#" >
                                <span class="tab-title">Pending invites</span>
                            </a>
                        </li>
                    </ul>
                </div>
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
                                    <input type="text" placeholder="Search Teachers and Admins">
                                </div>
                                <a href="#" class="export-btn"><img src="/assets/default/svgs/edit-simple.svg" alt="edit-simple"> Export All</a>
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
                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/edit-simple.svg" alt="edit-simple"> Edit</a>
                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
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
                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/link-svgrepo-com.svg" alt="link-svgrepo-com"> Invite faculty</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#invite-teacher-modal"><img src="/assets/default/svgs/plus+.svg" alt="plus+"> Add faculty</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-sm">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="skelton-hide skelton-height-lg skelton-mb-0">Teacher/Admin</th>
                                            <th class="skelton-hide skelton-height-lg skelton-mb-0">Role</th>
                                            <th class="skelton-hide skelton-height-lg skelton-mb-0">Last Login</th>
                                            <th class="skelton-hide skelton-height-lg skelton-mb-0">Classes</th>
                                            <th class="skelton-hide skelton-height-lg skelton-mb-0">School</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-th="Teacher/Admin" class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <div class="check-box">
                                                    <input type="checkbox" name="check-three">
                                                </div>
                                                <strong>
                                                    <span class="user-lable">
                                                        K, Kaiser
                                                        <span class="user-email">kaizer.can@gmail.com</span>
                                                    </span> 
                                                    <em>You</em>
                                                </strong>
                                            </td>
                                            <td data-th="Role" class="skelton-hide skelton-height-lg skelton-mb-0">School Admin</td>
                                            <td data-th="Last Login" class="skelton-hide skelton-height-lg skelton-mb-0">20 minutes ago</td>
                                            <td data-th="Classes" class="skelton-hide skelton-height-lg skelton-mb-0">3</td>
                                            <td data-th="School" class="skelton-hide skelton-height-lg skelton-mb-0">Khan School</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
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
                                        <tr>
                                            <td data-th="Teacher/Admin" class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <div class="check-box">
                                                    <input type="checkbox" name="check-one">
                                                </div>
                                                <strong>
                                                    <span class="user-lable">
                                                        mehnaz khan
                                                        <span class="user-email">mehnaz.can@gmail.com</span>
                                                    </span> 
                                                </strong>
                                            </td>
                                            <td data-th="Role" class="skelton-hide skelton-height-lg skelton-mb-0">Teacher</td>
                                            <td data-th="Last Login" class="skelton-hide skelton-height-lg skelton-mb-0">a year ago</td>
                                            <td>
                                                <div class="pending-invites-controls">
                                                    <button type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Copy invite link">
                                                        <img src="/assets/default/svgs/link-file.svg" alt="link-file">
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Delete invite">
                                                        <img src="/assets/default/svgs/delete-menu.svg" alt="delete-menu">
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Re-send Invite">
                                                        <img src="/assets/default/svgs/envelope-mail-svgrepo-com.svg" alt="envelope-mail-svgrepo-com">
                                                        Re-send Invite
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-th="Teacher/Admin" class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <div class="check-box">
                                                    <input type="checkbox" name="check-two">
                                                </div>
                                                <strong>
                                                    <span class="user-lable">
                                                        Qaiser khan
                                                        <span class="user-email">apple@apple.com</span>
                                                    </span> 
                                                </strong>
                                            </td>
                                            <td data-th="Role" class="skelton-hide skelton-height-lg skelton-mb-0">Teacher</td>
                                            <td data-th="Last Login" class="skelton-hide skelton-height-lg skelton-mb-0">a year ago</td>
                                            <td>
                                                <div class="pending-invites-controls">
                                                    <button type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Copy invite link">
                                                        <img src="/assets/default/svgs/link-file.svg" alt="link-file">
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Delete invite">
                                                        <img src="/assets/default/svgs/delete-menu.svg" alt="delete-menu">
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Re-send Invite">
                                                        <img src="/assets/default/svgs/envelope-mail-svgrepo-com.svg" alt="envelope-mail-svgrepo-com">
                                                        Re-send Invite
                                                    </button>
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
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="invite-teacher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><img src="/assets/default/svgs/user-alt-2-svgrepo-com.svg" alt="user-account"> Invite New Teachers to Khan School</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="invite-text-field">
                        <h6>Invite Teacher by Email</h6>
                        <div class="textarea-field">
                            <textarea placeholder="Enter your teachers work email address."></textarea>
                            <p>List one teacher work email per line. You can also copy/paste from Word Exel</p>
                        </div>
                        <button type="button">Review Invites</button>
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
    });
    /*Skelton Loading Fungtion End*/
</script>

@endpush
