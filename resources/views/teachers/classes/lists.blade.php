@extends('admin.layouts.app')

@push('libraries_top')

@endpush
<style>
        .progress-bar-custom {
            background-color: #4caf50;
        }
        .card-options {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Classes</h1>
        @can('admin_classes_create')
            <div class="text-left">
                <a href="/admin/classes/create" class="btn btn-primary">New Class</a>
            </div>
        @endcan
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">Classes

            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-12 col-md-12">
            <div class="nav-area">
                <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="topics-tab" href="/admin/classes">
                            <span class="tab-title">Classes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="topics-tab" href="/admin/sections" >
                            <span class="tab-title">Sections</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="topics-tab" href="/admin/sections/joining-requests" >
                            <span class="tab-title">Joining Requests</span>
                        </a>
                    </li>
                </ul>
                <div class="teacher-controls">
                    <button type="button">Google Classrom</button>
                    <button type="button">Create a Class</button>
                </div>
            </div>
       </div>
    </div>


    <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12">

            <div class="card text-white classes-card bg-teal mb-3" style="max-width: 18rem; position: relative;">
            <!-- Dropdown Menu -->
            <div class="card-options dropdown">
                <button
                    class="btn btn-link text-white dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Add a co-teacher <i class="fas fa-lock"></i></a>
                    <a class="dropdown-item" href="#">Edit class details</a>
                    <a class="dropdown-item" href="#">Refresh Class Roster</a>
                    <a class="dropdown-item" href="#">Archive Class</a>
                    <a class="dropdown-item text-danger" href="#">Delete Class</a>
                </div>
            </div>

            <div class="card-body">
                <h5 class="card-title">Grade 6</h5>
                <p class="card-text">A</p>
                <p class="card-text">26 Students</p>
                <div>
                    <p class="mb-1">1 completed activity</p>
                    <div class="progress" style="height: 20px;">
                        <div
                            class="progress-bar progress-bar-custom"
                            role="progressbar"
                            style="width: 75%;"
                            aria-valuenow="75"
                            aria-valuemin="0"
                            aria-valuemax="100"
                        >
                            75%
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-light btn-sm">
                        <i class="fas fa-users"></i>
                    </button>
                    <button class="btn btn-light btn-sm">
                        <i class="fas fa-chart-line"></i>
                    </button>
                    <button class="btn btn-light btn-sm" title="Open folder for 'Grade 6 A' in Google Drive">
                        <i class="fas fa-folder-open"></i>
                    </button>
                </div>
            </div>
        </div>
    

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th class="text-left">{{ trans('admin/main.title') }}</th>
                                    <th class="text-left">Curriculum</th>
                                    <th class="text-left">Sections</th>
                                    <th>{{ trans('admin/main.actions') }}</th>
                                </tr>

                                @foreach($classes as $classData)
                                <tr>
                                    <td>
                                        <span>{{ $classData->title }}</span>
                                    </td>
                                    <td class="text-left">{{ $classData->category->getTitleAttribute() }}</td>
                                    <td class="text-left">
                                        @if( !empty( $classData->sections ) )
                                            @foreach($classData->sections as $sectionData)
                                                <a href="/admin/sections/users?section={{$sectionData->id}}">{{$sectionData->title}}</a><br>
                                            @endforeach
                                        @endif

                                    </td>
                                    <td>
                                        @can('admin_classes_edit')
                                        <a href="/admin/classes/{{$classData->id}}/edit" class="btn-transparent btn-sm text-primary edit-class-btn1" data-class_id="{{$classData->id}}" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endcan

                                        @can('admin_classes_delete')
                                        @include('admin.includes.delete_button',['url' => '/admin/classes/'.$classData->id.'/delete' , 'btnClass' => 'btn-sm'])
                                        @endcan
                                    </td>

                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        {{ $classes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="class-edit-modal" class="class-edit-modal modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body class-edit-content">

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts_bottom')

<script>
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
</script>


@endpush
