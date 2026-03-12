@extends('web.default.panel.layouts.panel_layout')

@push('styles_top')
<script src="/assets/default/vendors/charts/chart.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">

@endpush

@section('content')
<section class="content-section">
    <div class="row">
        <div class="col-12">
            @if( !empty( $childs ) )
                <div class="p-15 mt-20 p-lg-20 db-form-tabs panel-border font-weight-500 text-dark-blue rounded-sm panel-shadow mb-20 switch-user-block">
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a href="javascript:;" class="avatar"><img src="{{$switchUserObj->getAvatar()}}" alt="{{isset( $switchUserObj->id )? $switchUserObj->get_full_name() : ''}}" class="avatar rounded-circle"></a>
                            </div>
                            <div class="col-5 ms-2">
                                <h6 class="font-19 font-weight-bold"><a href="javascript:;">{{isset( $switchUserObj->id )? $switchUserObj->get_full_name() : ''}}</a></h6>
                            </div>
                            <div class="col-auto ms-auto mr-md-3 last-activity">
                                <a href="javascript:;" class="switch-user-btn" data-toggle="modal" data-target="#switch_user_modal">
                                    <img src="/assets/default/img/default/user-switch.png" alt="user-switch">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="section-title text-left mb-30 font-14">
                <h2 class="mt-0 mb-10 font-22">Mock Tests</h2>
                <p class="mb-15">Click on ‘Assign test’ next to your test papers. Here, you can choose the mock test(s) for which you would like to assign mock tests. Each learner has a limit mock tests per month, but guardians and teachers are allowed flexibility to decide which tests your learner should focus on. </p>
                <p>Once you’ve assigned the mock tests, they will appear on the homepage of your learner’s account.</p>
            </div>
        </div>
        <div class="col-12">
            <!-- Listing Search Start -->
            <div class="listing-search lms-jobs-form mb-0 panel-border bg-white rounded-sm mb-30 p-25">
                <form>
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="form-group">
                                <div class="input-field">
                                    <img src="/assets/default/svgs/search2.svg" alt="" aria-hidden="true">
                                    <span class="search-clear" id="clearSearch">&times;</span>
                                    <input type="text" class="search-tests" id="searchTests" placeholder="Test Keyword">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                            <!-- Test List Filters Start -->
                            <div class="tests-list-holder">
                                <a href="#." class="filter-mobile-btn">Filters</a>
                                <ul class="tests-list font-14">
                                    <li data-type="all" class="active">All Tests</li>
                                    <li data-type="sats"><img src="/assets/default/img/assignment-logo/sats.png" alt="sats"> SATs</li>
                                    <li data-type="11plus"><img src="/assets/default/img/assignment-logo/11plus.png" alt="11plus"> 11Plus</li>
                                    <li data-type="iseb"><img src="/assets/default/img/assignment-logo/iseb.png" alt="iseb"> ISEB</li>
                                    <li data-type="cat4"><img src="/assets/default/img/assignment-logo/cat4.png" alt="cat4"> CAT 4</li>
                                    <li data-type="independent_exams"><img src="/assets/default/img/assignment-logo/independent_exams.png" alt="independent_exams"> Independent Exams</li>
                                    <li data-type="progress_test"><img src="/assets/default/img/assignment-logo/independent_exams.png" alt="progress_test"> Progress Test</li>

                                </ul>
                            </div>
                            <!-- Test List Filters End -->

                        </div>
                    </div>
                </form>
            </div>
            <!-- Listing Search End -->
            <!-- Total-Tests Counter Start -->
            <h3 class="total-tests font-16 font-weight-bold">Total Tests: {{$sats->count()}}</h3>
            <!-- Total-Tests Counter Start -->
        </div>
        <div class="col-12 col-lg-12 col-md-12">
            <!-- Sats Listings Start -->
            <div class="sats-listing-card medium sats-listing-card medium">
                {!! $practice_response_layout !!}

                {!! $response_layout !!}
            </div>


            <div class="rurera-mock-test">
                <!-- First Test Pack -->
                <div class="rurera-mock-test-item panel-border rounded-sm p-20">
                    <div class="rurera-test-info">
                        <img src="/assets/default/img/assignment-logo/sats.png" alt="quiz_image" width="59" height="59">
                        <div class="rurera-text-box font-14">
                            <h4 class="font-16 font-weight-bold">
                                <a href="/mock-practice/xyz" class="d-block mb-5">xyz</a>
                            </h4>
                            <span class="rurera-sub_label">0 Question(s),</span>
                            <span class="rurera-sub_label">Time: 20m,</span>
                            <span class="rurera-sub_label">Sats</span>
                        </div>
                    </div>
                    <div class="rurera-test-modal">
                        <a href="javascript:;" data-toggle="modal" data-target="#rureraMockTestModal" class="rurera-list-btn font-14">Take Test </a>
                    </div>
                </div>

                <!-- Second Test Pack -->
                <div class="rurera-mock-test-item panel-border rounded-sm p-20">
                    <div class="rurera-test-info">
                        <img src="/assets/default/img/assignment-logo/sats.png" alt="quiz_image" width="59" height="59">
                        <div class="rurera-text-box font-14">
                            <h4 class="font-16 font-weight-bold">
                                <a href="/mock-practice/year-6-english" class="d-block mb-5">Year 6 English</a>
                            </h4>
                            <span class="rurera-sub_label">0 Question(s),</span>
                            <span class="rurera-sub_label">Time: 10m,</span>
                            <span class="rurera-sub_label">Sats</span>
                            <img src="/assets/default/img/stop-watch.png" alt="stop-watch" width="360" height="360">
                        </div>
                    </div>
                    <div class="rurera-test-modal">
                        <a href="javascript:;" data-toggle="modal" data-target="#rureraMockTestModal" class="rurera-list-btn font-14">Take Test </a>
                    </div>
                </div>

                <!-- Third Test Pack -->
                <div class="rurera-mock-test-item panel-border rounded-sm p-20">
                    <div class="rurera-test-info">
                        <img src="/assets/default/img/assignment-logo/sats.png" alt="quiz_image" width="59" height="59">
                        <div class="rurera-text-box font-14">
                            <h4 class="font-16 font-weight-bold">
                                <a href="/mock-practice/year-6-maths-curriculum-test-baz" class="d-block mb-5">Year 6 Maths Curriculum Test - Baz</a>
                            </h4>
                            <span class="rurera-sub_label">0 Question(s),</span>
                            <span class="rurera-sub_label">Time: 20m,</span>
                            <span class="rurera-sub_label">Sats</span>
                        </div>
                    </div>
                    <div class="rurera-test-modal">
                        <a href="javascript:;" data-toggle="modal" data-target="#rureraMockTestModal" class="rurera-list-btn font-14">Take Test </a>
                    </div>
                </div>

                <!-- Fourth Test Pack -->
                <div class="rurera-mock-test-item panel-border rounded-sm p-20">
                    <div class="rurera-test-info">
                        <img src="/assets/default/img/assignment-logo/sats.png" alt="quiz_image" width="59" height="59">
                        <div class="rurera-text-box font-14">
                            <h4 class="font-16 font-weight-bold">
                                <a href="/mock-practice/year-6-maths-curriculum-test" class="d-block mb-5">Year 6 Maths Curriculum Test</a>
                            </h4>
                            <span class="rurera-sub_label">0 Question(s),</span>
                            <span class="rurera-sub_label">Time: 25m,</span>
                            <span class="rurera-sub_label">Sats</span>
                        </div>
                    </div>
                    <div class="rurera-test-modal">
                        <a href="javascript:;" data-toggle="modal" data-target="#rureraMockTestModal" class="rurera-list-btn font-14">Take Test</a>
                    </div>
                </div>
            </div>

            <div class="rurera-test-pack-container">
                <!-- First Test Pack -->
                <div class="rurera-test-pack panel-border rounded-sm p-20 mb-15">
                    <h3 class="rurera-test-title font-16 font-weight-bold">11+ The Bexley Secondary Selection Test 01</h3>
                    <p class="rurera-test-description font-14">Complete mock test</p>

                    <div class="rurera-test-pack-info">
                        <span class="rurera-icon-location">
                            <img src="/assets/default/svgs/location-form.svg" alt="" area-hidden="true" height="16" width="16">
                            Bexley <span>Ages 10-11</span>
                        </span>
                                    
                        <span class="rurera-icon-time">
                            <img src="/assets/default/svgs/clock.svg" alt="" area-hidden="true" height="16" width="16">
                            1h 40m <span>Qs. 125</span>
                        </span>
                    </div>

                    <p class="rurera-test-simulation-description font-14">Full simulation of the Bexley Secondary Selection 11+ Grammar Exam.</p>

                    <div class="rurera-test-bottom">
                        <div class="rurera-test-subjects">
                            <p class="rurera-test-inclusions-title font-14">What's included:</p>
                            <ul>
                                <li>
                                    1 x English &amp; Verbal Reasoning paper
                                </li>
                                <li>
                                    1 x Non-Verbal Reasoning &amp; Maths paper
                                </li>
                            </ul>
                        </div>
                        <div class="rurera-test-price">
                            <p class="rurera-test-price-value font-16">£20.00</p>
                            <button type="button" class="rurera-list-btn font-14">Add to cart</button>
                        </div>
                    </div>
                </div>

                <!-- Second Test Pack -->
                <div class="rurera-test-pack panel-border rounded-sm p-20 mb-15">
                    <h3 class="rurera-test-title font-16 font-weight-bold">11+ The Bexley Secondary Selection Test 02</h3>
                    <p class="rurera-test-description font-14">Complete mock test</p>

                    <div class="rurera-test-pack-info">
                        <span class="rurera-icon-location">
                            <img src="/assets/default/svgs/location-form.svg" alt="" area-hidden="true" height="16" width="16">
                            Bexley <span>Ages 10-11</span>
                        </span>
                                    
                        <span class="rurera-icon-time">
                            <img src="/assets/default/svgs/clock.svg" alt="" area-hidden="true" height="16" width="16">
                            1h 45m <span>Qs. 130</span>
                        </span>
                    </div>

                    <p class="rurera-test-simulation-description font-14">Full simulation of the Bexley Secondary Selection 11+ Grammar Exam.</p>

                    <div class="rurera-test-bottom">
                        <div class="rurera-test-subjects">
                            <p class="rurera-test-inclusions-title font-14">What's included:</p>
                            <ul>
                                <li>1 x English &amp; Verbal Reasoning paper</li>
                                <li>1 x Non-Verbal Reasoning &amp; Maths paper</li>
                            </ul>
                        </div>
                    
                        <div class="rurera-test-price">
                            <p class="rurera-test-price-value font-16">£22.00</p>
                            <button type="button" class="rurera-list-btn font-14">Add to cart</button>
                        </div>
                    </div>
                    
                </div>

                <!-- Third Test Pack -->
                 <div class="rurera-test-pack panel-border rounded-sm p-20 mb-15">
                    <h3 class="rurera-test-title font-16 font-weight-bold">11+ The Bexley Secondary Selection Test 03</h3>
                    <p class="rurera-test-description font-14">Complete mock test</p>

                    <div class="rurera-test-pack-info">
                        <span class="rurera-icon-location">
                            <img src="/assets/default/svgs/location-form.svg" alt="" area-hidden="true" height="16" width="16">
                            Bexley <span>Ages 10-11</span>
                        </span>
                                    
                        <span class="rurera-icon-time">
                            <img src="/assets/default/svgs/clock.svg" alt="" area-hidden="true" height="16" width="16">
                            1h 45m <span>Qs. 130</span>
                        </span>
                    </div>

                    <p class="rurera-test-simulation-description font-14">Full simulation of the Bexley Secondary Selection 11+ Grammar Exam.</p>

                    <div class="rurera-test-bottom">
                        <div class="rurera-test-subjects">
                            <p class="rurera-test-inclusions-title font-14">What's included:</p>
                            <ul>
                                <li>1 x English &amp; Verbal Reasoning paper</li>
                                <li>1 x Non-Verbal Reasoning &amp; Maths paper</li>
                            </ul>
                        </div>
                    
                        <div class="rurera-test-price">
                            <p class="rurera-test-price-value font-16">£19.00</p>
                            <button type="button" data-toggle="modal" data-target="#rureraMockTestModal" class="rurera-list-btn font-14">Add to cart</button>
                        </div>
                    </div>
                    
                </div>
            </div>




            <!-- Sats Listings End -->
        </div>

        <div class="col-12">
            <div class="mt-60">
                {{ $sats->appends(request()->input())->links('vendor.pagination.panel') }}
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="rureraMockTestModal" tabindex="-1" role="dialog" aria-labelledby="rureraMockTestModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rureraMockTestModalLabel">Choose how to complete this test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="option-card">
                            <div class="card-info">
                                <h6 class="font-weight-bold">Online</h6>
                                <p>Complete this test on your device. Get your results instantly.</p>
                            </div>
                            <button class="add-list-btn" type="button">Add to to-do list</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="option-card disabled">
                            <div class="card-info">
                                <h6 class="font-weight-bold">On paper</h6>
                                <p>This is an online exam. A paper option is not provided.</p>
                            </div>
                            <button class="add-list-btn btn-disabled" disabled>Unavailable</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="#" class="btn btn-primary">Proceed</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade switch_user_modal" id="switch_user_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-box">
                    <div class="modal-title">
                        <h3>Switch User</h3>
                    </div>
                    <div class="p-15 db-form-tabs mt-20 p-lg-20 font-weight-500 text-dark-blue rounded-sm panel-shadow mb-20 switch-user-block">

                        @foreach( $childs as $childObj)
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="javascript:;" class="avatar"><img src="{{$childObj->getAvatar()}}" alt="{{isset( $childObj->id )? $childObj->get_full_name() : ''}}" class="avatar rounded-circle"></a>
                                </div>

                                <div class="col-5 ms-2">
                                    <h6 class="font-19 font-weight-bold"><a href="javascript:;">{{isset( $childObj->id )? $childObj->get_full_name() : ''}}</a></h6>
                                </div>
                                <div class="col-auto ms-auto mr-md-3 last-activity">
                                    <a href="javascript:;" class="switch-user-btn switch-user-btn-event" data-user_id="{{$childObj->id}}">
                                       <img src="/assets/default/img/default/user-switch.png" alt="user-switch">
                                   </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts_bottom')
<script src="/assets/default/js/helpers.js"></script>
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
<script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click', '.graph-data-ul li a', function (e) {
            $('.graph-data-ul li a').removeClass('active');
            $(this).addClass('active');
            var graph_id = $(this).attr('data-graph_id');
            $('.graph_div').addClass('hide');
            $('.' + graph_id).removeClass('hide');
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click', '.graph-data-ul li a', function (e) {
            $('.graph-data-ul li a').removeClass('active');
            $(this).addClass('active');
            var graph_id = $(this).attr('data-graph_id');
            $('.graph_div').addClass('hide');
            $('.' + graph_id).removeClass('hide');
        });

        $('body').on('change', '.analytics_graph_type', function (e) {
            var thisObj = $('.chart-summary-fields');
            rurera_loader(thisObj, 'div');
            var graph_type = $(this).val();
            jQuery.ajax({
                type: "GET",
                url: '/panel/analytics/graph_data',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"graph_type": graph_type},
                success: function (return_data) {
                    rurera_remove_loader(thisObj, 'div');
                    if (return_data != '') {
                        $(".analytics-graph-data").html(return_data);
                    }
                }
            });

        });

        var searchRequest = null;
        $('body').on('keyup', '.search-tests', function (e) {
            rurera_loader($(".simple-table tbody"), 'div');
            var search_keyword = $(this).val();
            searchRequest = jQuery.ajax({
                type: "GET",
                url: '/tests/search_tests',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    if (searchRequest != null) {
                        searchRequest.abort();
                    }
                },
                data: {"search_keyword": search_keyword},
                success: function (return_data) {
                    rurera_remove_loader($(".simple-table tbody"), 'div');
                    if (return_data != '') {
                        $(".simple-table tbody").html(return_data);
                    }
                }
            });

        });

        var SwitchRequest = null;
        $('body').on('click', '.switch-user-btn-event', function (e) {
            rurera_loader($(".switch_user_modal .switch-user-block"), 'div');
            var switch_user = $(this).attr('data-user_id');
            SwitchRequest = jQuery.ajax({
                type: "GET",
                url: '/tests/switch_user',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    if (SwitchRequest != null) {
                        SwitchRequest.abort();
                    }
                },
                data: {"switch_user": switch_user},
                success: function (return_data) {
                    location.reload();
                }
            });
        });

        $('body').on('click', '.tests-list li', function (e) {
            rurera_loader($(".simple-table tbody"), 'div');
            $(".tests-list li").removeAttr('class');
            $(this).addClass('active');
            var quiz_type = $(this).attr('data-type');
            searchRequest = jQuery.ajax({
                type: "GET",
                url: '/tests/search_tests',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    if (searchRequest != null) {
                        searchRequest.abort();
                    }
                },
                data: {"quiz_type": quiz_type},
                success: function (return_data) {
                    rurera_remove_loader($(".simple-table tbody"), 'div');
                    $(".simple-table tbody").html(return_data);
                }
            });

        });
    });
    const input = document.getElementById("searchTests");
    const clearBtn = document.getElementById("clearSearch");

    input.addEventListener("input", function () {
        if (this.value.length > 0) {
            clearBtn.style.display = "block";
        } else {
            clearBtn.style.display = "none";
        }
    });

    clearBtn.addEventListener("click", function () {
        input.value = "";
        clearBtn.style.display = "none";
        input.focus();
    });
</script>
@if (!auth()->subscription('sats'))
    <script>
        if( $(".subscription-modal").length > 0){
            $(".subscription-modal").modal('show');
        }
    </script>
@endif
@endpush
