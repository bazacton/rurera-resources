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
                <button type="button" class="create-class-btn" data-toggle="modal" data-target="#createClassModal"><i class="fas fa-plus-circle"></i> Create a Class</button>
            </div>
        </div>
        <div class="teacher-listing">
            <div class="listing-grid-card">
                <div class="img-holder skelton-hide">
                    <figure>
                        <img src="/assets/default/img/video.png" alt="video">
                        <figcaption>
                            <span class="count-lable">Admin</span>
                        </figcaption>
                    </figure>
                </div>
                <div class="text-holder">
                    <div class="author-info">
                        <span class="img-box skelton-hide">
                            <img src="/assets/default/img/video.png" alt="video">
                            <span class="country-flag"><img src="/assets/default/svgs/uk-flag.svg" alt="uk-flag"></span>
                        </span>
                        <div class="card-title-holder skelton-hide">
                            <h5>Nolan Herwitz</h5>
                        </div>
                        <div class="author-contact-info skelton-hide">
                            <a href="#"><i class="fas fa-envelope"></i> nolan@nerou.com</a>
                            <span class="phone-number-box">
                                <i class="fas fa-phone"></i>
                                <span class="phone-number" onclick="togglePhoneNumber(this)" data-full-number="987-654-3210">
                                    987-XXX-XXXX
                                </span>
                            </span>
                        </div>
                        <div class="author-designation skelton-hide">
                            <span class="designation-lable">Year 1</span>
                            <span class="designation-lable">Year 2</span>
                            <span class="designation-lable">Year 3</span>
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
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary skelton-hide">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap skelton-hide">
                        <div class="card-header">
                            <h4>Total Teachers</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalStudents }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="card">
            <div class="card-body">
                <form method="get" class="mb-0">

                    <div class="row skelton-hide">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="input-label">{{ trans('admin/main.search') }}</label>
                                <input name="full_name" type="text" class="form-control" value="{{ request()->get('full_name') }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="input-label">{{ trans('admin/main.status') }}</label>
                                <select name="status" data-plugin-selectTwo class="form-control populate">
                                    <option value="">{{ trans('admin/main.all_status') }}</option>
                                    <option value="active_verified" @if(request()->get('status') == 'active_verified') selected @endif>{{ trans('admin/main.active_verified') }}</option>
                                    <option value="active_notVerified" @if(request()->get('status') == 'active_notVerified') selected @endif>{{ trans('admin/main.active_not_verified') }}</option>
                                    <option value="inactive" @if(request()->get('status') == 'inactive') selected @endif>{{ trans('admin/main.inactive') }}</option>
                                    <option value="ban" @if(request()->get('status') == 'ban') selected @endif>{{ trans('admin/main.banned') }}</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group mt-1">
                                <label class="input-label mb-4"> </label>
                                <input type="submit" class="text-center btn btn-primary w-100" value="{{ trans('admin/main.show_results') }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <div class="card">
            <div class="card-header">
                @can('admin_users_create')
                    <div class="text-right skelton-hide">
                        <a href="/admin/users/create" class="btn btn-primary">New Teacher</a>
                    </div>
                @endcan
                @can('admin_users_export_excel')
                    <a href="{{ getAdminPanelUrl() }}/students/excel?{{ http_build_query(request()->all()) }}" class="btn btn-primary">{{ trans('admin/main.export_xls') }}</a>
                @endcan
                <div class="h-10"></div>
            </div>

            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-striped font-14">
                        <tr class="skelton-hide">
                            <th>ID</th>
                            <th class="text-left">{{ trans('admin/main.name') }}</th>
                            <th>{{ trans('admin/main.register_date') }}</th>
                            <th>{{ trans('admin/main.status') }}</th>
                            <th width="120">{{ trans('admin/main.actions') }}</th>
                        </tr>

                        @if($users->count() > 0)
                        @foreach($users as $user)

                            <tr class="skelton-hide">
                                <td>{{ $user->id }}</td>
                                <td class="text-left">
                                    <div class="d-flex align-items-center">
                                        <figure class="avatar mr-2">
                                            <img src="{{ $user->getAvatar() }}" alt="{{ $user->get_full_name() }}">
                                        </figure>
                                        <div class="media-body ml-1">
                                            <div class="mt-0 mb-1 font-weight-bold">{{ $user->get_full_name() }}</div>

                                            @if($user->mobile)
                                                <div class="text-primary text-small font-600-bold">{{ $user->mobile }}</div>
                                            @endif

                                            @if($user->email)
                                                <div class="text-primary text-small font-600-bold">{{ $user->email }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>{{ dateTimeFormat($user->created_at, 'j M Y | H:i') }}</td>

                                <td>
                                    @if($user->ban and !empty($user->ban_end_at) and $user->ban_end_at > time())
                                        <div class="mt-0 mb-1 font-weight-bold text-danger">{{ trans('admin/main.ban') }}</div>
                                        <div class="text-small font-600-bold">Until {{ dateTimeFormat($user->ban_end_at, 'Y/m/j') }}</div>
                                    @else
                                        <div class="mt-0 mb-1 font-weight-bold {{ ($user->status == 'active') ? 'text-success' : 'text-warning' }}">{{ trans('admin/main.'.$user->status) }}</div>
                                    @endif
                                </td>

                                <td class="text-center mb-2" width="120">
                                    @can('admin_users_impersonate')
                                        <a href="{{ getAdminPanelUrl() }}/users/{{ $user->id }}/impersonate" target="_blank" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.login') }}">
                                            <i class="fa fa-user-shield"></i>
                                        </a>
                                    @endcan

                                    @can('admin_users_edit')
                                        <a href="{{ getAdminPanelUrl() }}/users/{{ $user->id }}/edit" class="btn-transparent  text-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('admin_users_delete')
                                        @include('admin.includes.delete_button',['url' => getAdminPanelUrl().'/users/'.$user->id.'/delete' , 'btnClass' => '', 'deleteConfirmMsg' => trans('update.user_delete_confirm_msg')])
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                        @else
                            <tr class="skelton-hide">
                                <td colspan="5">No Records Found</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>

            <div class="card-footer text-center">
                {{ $users->appends(request()->input())->links() }}
            </div>
        </div>
    </div>

    
    <div class="modal fade create-class-modal" id="createClassModal" tabindex="-1" role="dialog" aria-labelledby="createClassModalLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClassModalLabel">Create a New Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/users/store" method="Post" class="mb-0">
                        <input type="hidden" name="_token" value="fQMda1fhIvcaZcx4ZDjTlvxDOt8k7uCaJ3yoHqn4">
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
                        <div class="form-group">
                            <label>User Role</label>
                            <select class="form-control select2 select2-hidden-accessible" id="roleId" name="role_id" tabindex="-1" aria-hidden="true" data-select2-id="select2-data-roleId">
                                <option disabled="" selected="" data-select2-id="select2-data-13-lrx4">Select a user role</option>
                                <option value="7">teachers - Teachers</option>
                                <option value="1">user - Student role</option>
                            </select>
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