@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
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

    <div class="section-body">
        <div class="teacher-controls">
            <button type="button" class="create-class-btn" data-toggle="modal" data-target="#createClassModal"><i class="fas fa-plus-circle"></i> Create a Class</button>
        </div>
        <div class="teacher-listing">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="listing-grid-card">
                        <div class="img-holder">
                            <figure>
                                <img src="/assets/default/img/video.png" alt="">
                                <figcaption>
                                    <span class="count-lable">1,432 Pts</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="text-holder">
                            <div class="author-info">
                                <span class="img-box"><img src="/assets/default/img/video.png" alt=""></span>
                                <h6>Nolan Herwitz</h6>
                                <a href="#"><i class="fas fa-envelope"></i> nolan@nerou.com</a>
                                <span class="designation-lable">HR Department</span>
                            </div>
                            <div class="teacher-list-controls">
                                <button type="button" class="edit-btn"><img src="/assets/default/svgs/edit-pencil.svg" alt=""></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
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

                    <div class="row">
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
    </div>

    <div class="card">
        <div class="card-header">
            @can('admin_users_create')
                <div class="text-right">
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
                    <tr>
                        <th>ID</th>
                        <th class="text-left">{{ trans('admin/main.name') }}</th>
                        <th>{{ trans('admin/main.register_date') }}</th>
                        <th>{{ trans('admin/main.status') }}</th>
                        <th width="120">{{ trans('admin/main.actions') }}</th>
                    </tr>

                    @if($users->count() > 0)
                    @foreach($users as $user)

                        <tr>
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
                        <tr>
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
    <div class="modal fade create-class-modal" id="createClassModal" tabindex="-1" role="dialog" aria-labelledby="createClassModalLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClassModalLabel">Create a New Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/users/store" method="Post">
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
                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-12-kuiu" style="width: 555px;">
                            <span class="selection">
                                <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-roleId-container">
                                <span class="select2-selection__rendered" id="select2-roleId-container" role="textbox" aria-readonly="true" title="Select a user role">Select a user role</span>
                                <span class="select2-selection__arrow" role="presentation">
                                    <b role="presentation"></b>
                                </span>
                                </span>
                            </span>
                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <select data-default_id="0" class="form-control year_class_ajax_select " name="year_id">
                            <option selected="" disabled="">Select Year</option>
                            <optgroup label="ks1">
                                <option value="606">Year 1</option>
                                <option value="607">Year 2</option>
                            </optgroup>
                            <optgroup label="ks2">
                                <option value="613">Year 3</option>
                                <option value="614">Year 4</option>
                                <option value="612">Year 5</option>
                                <option value="615">Year 6</option>
                                <option value="616">Year 7</option>
                                <option value="617">Year 8</option>
                            </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Student Class</label>
                            <select data-default_id="0" class="class_section_ajax_select student_section form-control select2 select2-hidden-accessible" id="class_id" name="class_id" tabindex="-1" aria-hidden="true" data-select2-id="select2-data-class_id">
                            <option value="" data-select2-id="select2-data-22-4q50">Select Class</option>
                            </select>
                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-15-jssb" style="width: 555px;">
                            <span class="selection">
                                <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-class_id-container">
                                <span class="select2-selection__rendered" id="select2-class_id-container" role="textbox" aria-readonly="true" title="Select Class">Select Class</span>
                                <span class="select2-selection__arrow" role="presentation">
                                    <b role="presentation"></b>
                                </span>
                                </span>
                            </span>
                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Class Section</label>
                            <select data-default_id="0" class="section_ajax_select student_section form-control select2 select2-hidden-accessible" id="section_id" name="section_id" tabindex="-1" aria-hidden="true" data-select2-id="select2-data-section_id">
                            <option value="" data-select2-id="select2-data-24-2kmz">Select Section</option>
                            </select>
                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-18-7slm" style="width: 555px;">
                            <span class="selection">
                                <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-section_id-container">
                                <span class="select2-selection__rendered" id="select2-section_id-container" role="textbox" aria-readonly="true" title="Select Section">Select Section</span>
                                <span class="select2-selection__arrow" role="presentation">
                                    <b role="presentation"></b>
                                </span>
                                </span>
                            </span>
                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control " id="status" name="status">
                            <option disabled="" selected="">Select a status</option>
                            <option value="active">active</option>
                            <option value="pending">pending</option>
                            <option value="inactive">inactive</option>
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
