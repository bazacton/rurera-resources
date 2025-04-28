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
        <div class="nav-area skelton-hide">
            <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="topics-tab" href="/admin/all">
                        <span class="tab-title">All</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="topics-tab" href="/admin/sections/admin">
                        <span class="tab-title">Admin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="topics-tab" href="/admin/teachers">
                        <span class="tab-title">Teachers</span>
                    </a>
                </li>
            </ul>
            <div class="teacher-controls">
                <button type="button" class="create-class-btn" data-toggle="modal" data-target="#createTeacherModal"><i class="fas fa-plus-circle"></i> Create Teacher</button>
            </div>
        </div>
        <div class="teacher-listing d-flex align-items-center flex-wrap">
        <div class="teacher-listing">
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
                        <div class="card-title-holder skelton-hide">
                            <h5>{{ $user->get_full_name() }}</h5>
                        </div>
                        <div class="author-contact-info skelton-hide">
                            <a href="#"><i class="fas fa-envelope"></i> {{ $user->email }}</a>
                            @if($user->mobile != '')
                            <span class="phone-number-box">
                                <i class="fas fa-phone"></i>
                                <span class="phone-number" onclick="togglePhoneNumber(this)" data-full-number="987-654-3210">
                                    {{ $user->mobile }}
                                </span>
                            </span>
                            @endif
                        </div>
                        <div class="author-designation skelton-hide">
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
                    <div class="teacher-list-controls skelton-hide">
                        <button type="button" class="edit-btn"><img src="/assets/default/svgs/edit-pencil.svg" alt="edit-pencil"></button>
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
                            <input type="text" name="first_name" class="form-control  " value="" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control  " value="" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label>Display Name</label>
                            <input type="text" name="display_name" class="form-control  " value="" placeholder="Display Name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input name="username" type="text" class="form-control " id="username" value="" aria-describedby="emailHelp">
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
