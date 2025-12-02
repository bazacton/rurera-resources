@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
<section class="section skeleton">
    <div class="section-header">
        <div class="heading-holder">
            <h1>Schools</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">Schools</div>
            </div>
        </div>
        <div class="school-membership-holder">
            <div class="school-membership">
                @if($userObj->isDistricAdmin())
                    @if(isset($userObj->userSchool->schoolSubscriptions->id))
                        {{$userObj->userSchool->schoolSubscriptions->subscribe->title}}
                    @else
                        @if(isset($userObj->userSchool->schoolSubscriptionInvoice->id))
                            <a target="_blank" href="{{$userObj->userSchool->schoolSubscriptionInvoice->stripe_invoice_url}}" class="btn-transparent btn-sm text-primary "  data-placement="top" title="Invoice Link">
                                Invoice - {{$userObj->userSchool->schoolSubscriptionInvoice->id}}
                            </a>
                        @endif
                    @endif
                @endif
            </div>
            @can('admin_schools_create')
            <div class="text-right ml-auto">
                <a href="javascript:;" class="simple-btn new-school-btn reset-form" data-form_class="school-form">New School</a>
            </div>
            @endcan
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
                            <div class="select-holder">
                                <select name="statue" data-plugin-selectTwo class="form-control populate">
                                    <option value="">{{ trans('admin/main.all_status') }}</option>
                                    <option value="active" @if(request()->get('status') == 'active') selected @endif>{{ trans('admin/main.active') }}</option>
                                    <option value="inactive" @if(request()->get('status') == 'inactive') selected @endif>{{ trans('admin/main.inactive') }}</option>
                                </select>
                            </div>

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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th class="text-left">{{ trans('admin/main.title') }}</th>
                                    <th class="text-left">No of Classes</th>
                                    <th class="text-left">No of Faculty</th>
                                    <th class="text-left">No of Students</th>
                                    @if($userObj->isAdminRole())
                                        <th class="text-left">Membership</th>
                                    @endif
                                    <th class="text-left">Added by</th>
                                    <th class="text-left">Added Date</th>
                                     <th><!--{{ trans('admin/main.actions') }}--></th>
                                </tr>

                                @if($schools->count() > 0)
                                @foreach($schools as $schoolData)
                                <tr>
                                    <td>
                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                            <span><a href="/admin/schools/{{$schoolData->id}}/edit">{{ $schoolData->title }}</a></span>
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
                                    @if($userObj->isAdminRole())
                                        <td class="text-left">
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                @if(isset($schoolData->schoolSubscriptions->id))
                                                    {{$schoolData->schoolSubscriptions->subscribe->title}}
                                                @else
                                                    @if(isset($schoolData->schoolSubscriptionInvoice->id))
                                                        <a target="_blank" href="{{$schoolData->schoolSubscriptionInvoice->stripe_invoice_url}}" class="btn-transparent btn-sm text-primary "  data-placement="top" title="Invoice Link">
                                                            Invoice - {{$schoolData->schoolSubscriptionInvoice->id}}
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                    @endif
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
                                                    <a data-id="{{ $schoolData->id }}" href="javascript:;" class="btn-transparent btn-sm text-primary edit-school-model" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
                                                        <img src="/assets/default/svgs/edit-pencil.svg" alt="edit-pencil">
                                                    </a>
                                                @endcan

                                                @can('admin_schools_delete')
                                                    @include('admin.includes.delete_button',['url' => '/admin/schools/'.$schoolData->id.'/delete' , 'btnClass' => 'btn-sm'])
                                                @endcan

                                                @if(auth()->user()->isAdminRole())
                                                    <a data-id="{{ $schoolData->id }}" href="javascript:;" class="btn-transparent btn-sm text-primary custom-package-modal-btn" data-toggle="tooltip" data-placement="top" title="Custom Package">
                                                        <i class="fas fa-cube"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center no-records-found">No Records Found</td>
                                    </tr>

                                @endif

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

<div class="modal fade school-add-edit-modal" id="edit-student-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body student-modal-box">

                <div id="section4" class="modal-section add-edit-schoo-block active">

                </div>
                <div class="messages-layout-student-block rurera-hide mt-30"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade school-add-modal" id="school-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body student-modal-box">


                <h5 class="modal-title">Create New School</h5>
                <div id="section4" class="modal-section add-edit-schoo-block active">
                    <form action="/admin/schools/store"
                          method="Post" class="school-form mb-0">
                        {{csrf_field()}}
                        <input type="hidden" name="redirect_url" class="redirect_url" value="">
                        <div class="form-group mb-20">
                            <label>School Name</label>
                            <input type="text" name="title" required
                                   class="form-control"
                                   value=""
                                   placeholder=""/>
                        </div>
                        <div class="teacher-buttons mt-0">
                            <button type="submit" class="btn btn-primary edit-single-student-btn">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="messages-layout-student-block rurera-hide mt-30"></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade custom-package-modal" id="custom-package-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body student-modal-box">

                <div id="section4" class="modal-section custom-package-block active">
                    <form action="/admin/schools/store"
                          method="Post" class="school-form">
                        {{csrf_field()}}
                        <input type="hidden" name="redirect_url" class="redirect_url" value="">
                        sdfsdf
                        <div class="teacher-buttons mt-30">
                            <button type="submit" class="btn btn-primary edit-single-student-btn">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="messages-layout-student-block rurera-hide mt-30"></div>
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
        }, 1000);


        $(document).on('click', '.reset-form', function (e) {
            var form_class = $(this).attr('data-form_class');
            $("."+form_class)[0].reset();
        });

        $('body').on('click', '.custom-package-modal-btn', function (e) {
            var school_id = $(this).attr('data-id');
            jQuery.ajax({
                type: "GET",
                url: '/admin/schools/edit_school_package',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'school_id':school_id},
                success: function (return_data) {
                    $(".custom-package-modal").modal('show');
                    $('.custom-package-block').html(return_data);


                        if ($(".start_date").length) {
                            $('.start_date').daterangepicker({
                                locale: {
                                    format: 'YYYY-MM-DD',
                                },

                                singleDatePicker: true,
                                showDropdowns: false,
                                autoApply: true,
                                startDate: moment(),
                                minDate: moment()
                            });

                            $('.start_date').on('apply.daterangepicker', function(ev, picker) {
                                let startDate = picker.startDate.clone().add(1, 'days');

                                if ($('.expiry_date').data('daterangepicker')) {
                                    $('.expiry_date').data('daterangepicker').minDate = startDate;
                                    $('.expiry_date').data('daterangepicker').setStartDate(startDate);
                                }
                            });
                        }



                        if ($(".expiry_date").length) {
                            let initialMinDate = $('.start_date').val()
                                ? moment($('.start_date').val(), 'YYYY-MM-DD').add(1, 'days')
                                : moment().add(1, 'days');

                            $('.expiry_date').daterangepicker({
                                locale: {
                                    format: 'YYYY-MM-DD',
                                },
                                singleDatePicker: true,
                                showDropdowns: false,
                                autoApply: true,
                                startDate: initialMinDate,
                                minDate: initialMinDate
                            });
                        }
                }
            });

        });

        $('body').on('click', '.new-school-btn', function (e) {
            $(".school-add-modal").modal('show');
            var redirect_url = window.location.href;
            $(".redirect_url").val(redirect_url);
        });



        $('body').on('click', '.edit-school-model', function (e) {
            var school_id = $(this).attr('data-id');
            var redirect_url = window.location.href;
            jQuery.ajax({
                type: "GET",
                url: '/admin/schools/edit_school_modal',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'school_id':school_id, 'redirect_url': redirect_url},
                success: function (return_data) {
                    $(".school-add-edit-modal").modal('show');
                    $('.add-edit-schoo-block').html(return_data);
                }
            });
        });


        $('body').on('submit', '.school-form', function (e) {
            rurera_loader($(".add-edit-schoo-block"), 'div');
        });


    });


</script>
@endpush
