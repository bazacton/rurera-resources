@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Grammer Schools</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">Grammer Schools</div>
        </div>
    </div>


    <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    @can('admin_glossary_create')
                    <div class="card-header">
                        <div class="text-right">
                            <a href="/admin/grammer_schools/create" class="btn btn-primary">New School</a>
                        </div>
                    </div>
                    @endcan

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th class="text-left">{{ trans('admin/main.title') }}</th>
                                    <th class="text-left">Added Date</th>
                                    <th>{{ trans('admin/main.actions') }}</th>
                                </tr>

                                @if($grammerSchools->count() > 0)
                                @foreach($grammerSchools as $grammerSchoolObj)
                                <tr class="listing-data-row">
                                    <td>
                                        <span>{{ $grammerSchoolObj->school_name }}</span>
                                    </td>
                                    <td class="text-left">{{ dateTimeFormat($grammerSchoolObj->created_at, 'j M y | H:i') }}</td>
                                    <td>
                                        <a href="/admin/grammer_schools/{{ $grammerSchoolObj->id }}/edit" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/admin/grammer_schools/{{ $grammerSchoolObj->id }}/duplicate_school" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Duplicate">
                                            <i class="fa fa-copy"></i>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach

                                @else
                                <tr class="listing-data-row">
                                    <td colspan="4">
                                        @include('web.default.default.list_no_record')
                                    </td>
                                </tr>
                                @endif

                            </table>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        {{ $grammerSchools->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts_bottom')

@endpush
