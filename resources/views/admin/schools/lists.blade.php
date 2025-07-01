@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
<section class="section skeleton">
    <div class="section-header">
        <h1>Schools</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">Schools</div>
        </div>
    </div>


    <div class="section-body">

        <section class="card rurera-hide">
            <div class="card-body">
                <form action="/admin/schools" method="get" class="row mb-0">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.search') }}</label>
                            <input type="text" class="form-control" name="title" value="{{ request()->get('title') }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.status') }}</label>
                            <select name="statue" data-plugin-selectTwo class="form-control populate">
                                <option value="">{{ trans('admin/main.all_status') }}</option>
                                <option value="active" @if(request()->get('status') == 'active') selected @endif>{{ trans('admin/main.active') }}</option>
                                <option value="inactive" @if(request()->get('status') == 'inactive') selected @endif>{{ trans('admin/main.inactive') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn btn-primary w-100">{{ trans('admin/main.show_results') }}</button>
                    </div>
                </form>
            </div>
        </section>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    @can('admin_schools_create')
                    <div class="card-header">
                        <div class="text-right">
                            <a href="/admin/schools/create" class="btn btn-primary">New School</a>
                        </div>
                    </div>
                    @endcan

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th class="text-left">{{ trans('admin/main.title') }}</th>
                                    <th class="text-left">No of Classes</th>
                                    <th class="text-left">No of Faculty</th>
                                    <th class="text-left">No of Students</th>
                                    <th class="text-left">Added by</th>
                                    <th class="text-left">Added Date</th>
                                     <th><!--{{ trans('admin/main.actions') }}--></th>
                                </tr>

                                @foreach($schools as $schoolData)
                                <tr>
                                    <td>
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                            <span>{{ $schoolData->title }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                            <span>{{ $schoolData->schoolClasses->count() }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                            <span>{{ $schoolData->teachers->count() }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                            <span>{{ $schoolData->students->count() }}</span>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                            {{ $schoolData->user->get_full_name() }}
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                            {{ dateTimeFormat($schoolData->created_at, 'j M y | H:i') }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($schoolData->id != $userObj->school_id)
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                            <div class="quiz-table-controls">
                                                @can('admin_schools_edit')
                                                <a href="/admin/schools/{{ $schoolData->id }}/edit" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
                                                    <img src="/assets/default/svgs/edit-pencil.svg" alt="edit-pencil">
                                                </a>
                                                @endcan

                                                @can('admin_schools_delete')
                                                @include('admin.includes.delete_button',['url' => '/admin/schools/'.$schoolData->id.'/delete' , 'btnClass' => 'btn-sm'])
                                                @endcan
                                            </div>
                                        </div>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        {{ $schools->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
</script>
@endpush
