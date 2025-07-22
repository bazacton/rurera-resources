@php
    $alertModule = true;
@endphp
@extends('admin.layouts.app')

@push('styles_top')
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.css">
    <style>
        /**********************************************
        Questions Select, Questions Block style Start
        **********************************************/
        .questions-select-option ul {
            overflow: hidden;
        }

        .questions-select-option li {
            position: relative;
            flex: 1 1 0px;
        }

        .questions-select-option label {
            background-color: #e8e8e8;
            padding: 6px 20px;
            margin: 0;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            width: 100%;
            text-align: center;
            height: 100%;
            cursor: pointer;
            min-height: 55px;
        }

        .questions-select-option input,
        .questions-select-number input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .questions-select-option li:first-child label {
            border-radius: 5px 0 0 5px;
        }

        .questions-select-option li:last-child label {
            border-radius: 0 5px 5px 0;
        }

        .questions-select-option input:checked ~ label {
            background-color: var(--primary);
            color: #fff;
        }

        .questions-select-option label strong {
            font-weight: 500;
            font-size: 15px;
        }

        .questions-select-option label span {
            font-size: 14px;
        }

        .questions-select-number li {
            flex-basis: 33%;
            padding: 0 0 10px 10px;
        }

        .questions-select-number label {
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);
            width: 100%;
            text-align: center;
            margin: 0;
            border-radius: 5px;
            min-height: 70px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .questions-select-number label.disabled {
            background-color: inherit;
        }

        .questions-select-number label.selectable {
            background-color: #fff;
        }

        .questions-select-number input:checked ~ label {
            background-color: var(--primary);
            color: #fff;
        }

        .questions-select-number ul {
            margin: 0 0 0 -10px;
            flex-wrap: wrap;
        }

        .questions-submit-btn {
            background-color: var(--primary);
            display: block;
            width: 92%;
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            border-radius: 0;
            position: relative;
            z-index: 0;
            margin: 0 auto;
            height: 55px;
        }

        .questions-submit-btn:hover {
            color: #fff;
        }

        .questions-submit-btn:before,
        .questions-submit-btn:after {
            content: "";
            position: absolute;
            display: block;
            width: 100%;
            height: 105%;
            top: -1px;
            left: -1px;
            z-index: -1;
            pointer-events: none;
            background: var(--primary);
            transform-origin: top left;
            -ms-transform: skew(-30deg, 0deg);
            -webkit-transform: skew(-30deg, 0deg);
            transform: skew(-30deg, 0deg);
        }

        .questions-submit-btn:after {
            left: auto;
            right: -1px;
            transform-origin: top right;
            -ms-transform: skew(30deg, 0deg);
            -webkit-transform: skew(30deg, 0deg);
            transform: skew(30deg, 0deg);
        }
    </style>
@endpush
@php $tables_no = isset( $class->timestables_no)? json_decode($class->timestables_no) : array(); @endphp

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{$school->title}}
                <a href="javascript:;" class="edit-school-model ml-2 font-20" data-id="{{$school->id}}"><i class="fa fa-cog"></i></a>
            </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{ trans('admin/main.dashboard')
                    }}</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ getAdminPanelUrl() }}/classes">Schools</a>
                </div>
                <div class="breadcrumb-item">{{!empty($class) ?trans('/admin/main.edit'): trans('admin/main.new') }}</div>
            </div>
        </div>




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



        <div class="admin-rurera-tabs-holder mt-30">
            <ul data-target_class="admin-rurera-tabs-page-edit" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                <li class="nav-item skelton-height-lg">
                    @php $passing_data = array(
                        'school_id' => isset($school->id)? $school->id : 0,
                        'invoice_status' => 'pending',
                    );
                    @endphp
                    <a class="nav-link active rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/schools/get_invoices" id="pending-invoices-tab-page-edit" href="javascript:;">
                        <i class="fas fa-users mx-0"></i>
                        <span class="tab-title">Pending Invoices</span>
                    </a>
                </li>
                @php $passing_data['invoice_status'] = 'active'; @endphp
                <li class="nav-item skelton-height-lg">
                    <a class="nav-link rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/schools/get_invoices" id="paid-invoices-tab-page-edit" href="javascript:;">
                        <i class="fas fa-chalkboard-teacher mx-0"></i>
                        <span class="tab-title">Paid Invoices</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="section-body populated-data skeleton">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ getAdminPanelUrl() }}/classes/{{ !empty($class) ? $school->id.'/store' : 'store' }}"
                                  method="Post">
                                {{ csrf_field() }}

                                <div class="admin-rurera-tabs-page-edit pending-invoices-tab-page-edit"></div>
                                <div class="admin-rurera-tabs-page-edit rurera-hide paid-invoices-tab-page-edit"></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/categories.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script>

        $(document).ready(function () {

            //render_rurera_tabs();
            $(document).on('click', '.admin-rurera-tabs li a', function (e) {
                var target_class = $(this).closest('.admin-rurera-tabs').attr('data-target_class');
                var target_div = $(this).attr('id');
                $("."+target_class).addClass('rurera-hide');
                $("."+target_div).removeClass('rurera-hide');
                $(this).closest('.admin-rurera-tabs').find('li').find('a').removeClass('active');
                $(this).addClass('active');
                window.location.hash = target_div;
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

            $(document).on('input keyup keydown paste', '.search-teachers', function () {
                var value = $(this).val().toLowerCase();
                $('tbody.teachers-list tr').each(function () {
                    var rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.includes(value));
                });
            });


        });
        function render_rurera_tabs(){
            if($(".admin-rurera-tabs li a.active").length > 0){
                $(".admin-rurera-tabs li a.active").click();
            }
        }


        $(document).ready(function() {
            var hash = window.location.hash;
            if (hash) {
                $(hash + '.nav-link').trigger('click');
            }
        });
        /*Skelton Loading Fungtion Start*/
        $(document).ready(function () {
            const $el = document.querySelector(".section-body");

            setTimeout(() => {
                $el.classList.remove("skeleton");
                $el
                    .querySelectorAll(".skelton-hide")
                    .forEach((el) => el.classList.remove("skelton-hide"));
            }, 3000);

            $(".rurera-ajax-tabs.active").click();

        });

        /*Skelton Loading Fungtion End*/
    </script>
@endpush
