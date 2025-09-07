@extends('admin.layouts.app')

@push('styles_top')

    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/assets/default/css/quiz-layout.css">
    <link rel="stylesheet" href="/assets/default/css/quiz-frontend.css">
    <link rel="stylesheet" href="/assets/default/css/quiz-create-frontend.css">
    <link rel="stylesheet" href="/assets/default/css/quiz-create.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/assets/default/css/panel-pages/timestable.css">
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<style>
    .class_students_multi_select {
        width: 100%;
    }
    .users-list {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0 10px;
    }
    .users-list li {
        background: #efefef;
        margin-bottom: 10px;
        padding: 5px 10px;
        flex: 0 0 10.3333%;
        line-height: normal;
    }
    .users-list li a.parent-remove {
        float: right;
        margin: 8px 0 0 0;
        color: #ff0000;
    }
    .rurera-timeline.timeline-container {
        display: flex;
        align-items: center;
        gap: 15px;
        width: 100%;
        overflow: hidden;
        padding: 5px 15px 5px 25px;
        margin: 0 0 25px;
    }
    .rurera-timeline input[type="range"] {
        flex: 1;
        accent-color: #4a6cff;
        margin-top: 0;
        background: none;
        padding: 0;
        border: 0;
    }
    .rurera-timeline input[type="range"]::-webkit-slider-runnable-track {
    height: 6px;
    background: #2196f3;
    border-radius: 5px;
    }

    .rurera-timeline input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 18px;
    height: 18px;
    background: #fff;
    border: 2px solid #2196f3;
    border-radius: 50%;
    cursor: pointer;
    margin-top: -6px;
    transition: 0.3s;
    }
    .rurera-timeline input[type="range"]::-webkit-slider-thumb:hover {
    transform: scale(1.2);
    }
    .rurera-timeline input[type="range"]::-moz-range-track {
    height: 6px;
    background: linear-gradient(90deg, #4caf50, #2196f3);
    border-radius: 5px;
    }
    .rurera-timeline input[type="range"]::-moz-range-thumb {
    width: 18px;
    height: 18px;
    background: #fff;
    border: 2px solid #2196f3;
    border-radius: 50%;
    cursor: pointer;
    transition: 0.3s;
    }
    .rurera-timeline input[type="range"]::-moz-range-thumb:hover {
    transform: scale(1.2);
    }
    .rurera-timeline input[type="range"]::-ms-track {
    width: 100%;
    height: 6px;
    background: transparent;
    border-color: transparent;
    color: transparent;
    }
    .rurera-timeline input[type="range"]::-ms-fill-lower {
    background: #4caf50;
    border-radius: 5px;
    }
    .rurera-timeline input[type="range"]::-ms-fill-upper {
    background: #2196f3;
    border-radius: 5px;
    }
    .rurera-timeline input[type="range"]::-ms-thumb {
    width: 18px;
    height: 18px;
    background: #fff;
    border: 2px solid #2196f3;
    border-radius: 50%;
    cursor: pointer;
    }
    .rurera-timeline .date-label {
        background: #e6e6e6;
        padding: 8px 14px;
        border-radius: 6px;
        font-weight: bold;
        min-width: 120px;
        text-align: center;
    }
    .rurera-timeline .play-btn {
        background: #e6e6e6;
        border-radius: 50%;
        border: none;
        width: 40px;
        height: 40px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .rurera-timeline .play-btn:before {
        content: "▶";
        font-size: 18px;
        color: #333;
    }
</style>
@endpush


@section('content')
<section class="section">
    <div class="section-header">
        <div class="heading-holder">
            <h1>Analytics</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{ trans('admin/main.dashboard') }}</a>
                </div>
                <div class="breadcrumb-item active"><a href="/admin/analytics">Analytics</a>
                </div>
                <div class="breadcrumb-item">{{!empty($assignment) ?trans('/admin/main.edit'): trans('admin/main.new') }}
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">

            <div class="populated-content-area  years-group col-12 col-md-12 col-lg-12">
                <div class="card populated-data">
                    <div class="card-body ">
                        <form action="javascript;"
                              method="Post" class="rurera-form-validation analytics-form row">
                            {{ csrf_field() }}

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="input-label d-block">Class</label>
                                    <select name="class_id" data-target_class="class_students_multi_select" data-passing_vars="[class_id]" data-passing_data="" data-ajax_url="/admin/common/class_students_multi_select" class="form-control class_id select2 rurera-ajax-submission" data-placeholder="Select Class">
                                        <option value="">Select Class</option>
                                        @if($classes->count() > 0)
                                            @foreach($classes as $classObj)
                                                <option value="{{$classObj->id}}">{{$classObj->title}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="class_students_multi_select"></div>

                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label class="input-label">Attempt Type</label>
                                    <div class="input-group">

                                        <div class="radio-buttons">
                                            <label class="card-radio">
                                                <input type="radio" name="attempt_type" class="attempt_type conditional_field_parent" data-target_common_class="attempt_type_fields" data-target_field_class="attempt_type_self_learning" value="self_learning" checked>
                                                <span class="radio-btn"><i class="las la-check"></i>
                                                <div class="card-icon">
                                                    <h3>Self Learning</h3>
                                                </div>
                                            </span>
                                            </label>
                                            <label class="card-radio">
                                                <input type="radio" name="attempt_type" class="attempt_type conditional_field_parent" data-target_common_class="attempt_type_fields" data-target_field_class="attempt_type_mock_test" value="mock_tests">
                                                <span class="radio-btn"><i class="las la-check"></i>
                                                <div class="card-icon">
                                                    <h3>Mock Tests</h3>
                                                </div>
                                            </span>
                                            </label>
                                            <label class="card-radio">
                                                <input type="radio" name="attempt_type" class="attempt_type conditional_field_parent" data-target_common_class="attempt_type_fields" data-target_field_class="attempt_type_assignment" value="assignment">
                                                <span class="radio-btn"><i class="las la-check"></i>
                                                <div class="card-icon">
                                                    <h3>Assignment</h3>
                                                </div>
                                            </span>
                                            </label>
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label class="input-label">Practice Type</label>
                                    <div class="input-group">

                                        <div class="radio-buttons">

                                            @if(auth()->user()->subscription('sats'))
                                                <label class="card-radio attempt_type_fields attempt_type_mock_test">
                                                    <input type="radio" name="practice_type" class="practice_type rurera-ajax-submission" value="sats" data-target_class="analytics_type_fields" data-passing_vars="[practice_type,attempt_type,class_id]" data-passing_data="" data-ajax_url="/admin/analytics/get_type_fields">
                                                    <span class="radio-btn"><i class="las la-check"></i>
                                                            <div class="card-icon">
                                                                <img src="/assets/default/img/assignment-logo/sats.png">
                                                                <h3>SATs</h3>
                                                            </div>
                                                        </span>
                                                </label>
                                            @endif
                                            @if(auth()->user()->subscription('11plus'))
                                                <label class="card-radio attempt_type_fields attempt_type_mock_test">
                                                    <input type="radio" name="practice_type" class="practice_type rurera-ajax-submission" value="11plus" data-target_class="analytics_type_fields" data-passing_vars="[practice_type,attempt_type,class_id]" data-passing_data="" data-ajax_url="/admin/analytics/get_type_fields">
                                                    <span class="radio-btn"><i class="las la-check"></i>
                                                        <div class="card-icon">
                                                            <img src="/assets/default/img/assignment-logo/11plus.png">
                                                            <h3>11 Plus</h3>
                                                        </div>

                                                    </span>
                                                </label>
                                            @endif

                                            @if(auth()->user()->subscription('11plus'))

                                                <label class="card-radio attempt_type_fields attempt_type_mock_test">
                                                    <input type="radio" name="practice_type" class="practice_type rurera-ajax-submission" value="independent_exams" data-target_class="analytics_type_fields" data-passing_vars="[practice_type,attempt_type,class_id]" data-passing_data="" data-ajax_url="/admin/analytics/get_type_fields">
                                                    <span class="radio-btn"><i class="las la-check"></i>
                                                        <div class="card-icon">
                                                            <img src="/assets/default/img/assignment-logo/independent-exams.png">
                                                            <h3>Independent Exams</h3>
                                                        </div>

                                                        </span>
                                                </label>
                                            @endif

                                            @if(auth()->user()->subscription('11plus'))

                                                <label class="card-radio attempt_type_fields attempt_type_mock_test">
                                                    <input type="radio" name="practice_type" class="practice_type rurera-ajax-submission" value="iseb" data-target_class="analytics_type_fields" data-passing_vars="[practice_type,attempt_type,class_id]" data-passing_data="" data-ajax_url="/admin/analytics/get_type_fields">
                                                    <span class="radio-btn"><i class="las la-check"></i>
                                                        <div class="card-icon">
                                                            <img src="/assets/default/img/assignment-logo/iseb.png">
                                                            <h3>ISEB</h3>
                                                        </div>

                                                        </span>
                                                </label>
                                            @endif

                                            @if(auth()->user()->subscription('11plus'))

                                                <label class="card-radio attempt_type_fields attempt_type_mock_test">
                                                    <input type="radio" name="practice_type" class="practice_type rurera-ajax-submission" value="cat4" data-target_class="analytics_type_fields" data-passing_vars="[practice_type,attempt_type,class_id]" data-passing_data="" data-ajax_url="/admin/analytics/get_type_fields">
                                                    <span class="radio-btn"><i class="las la-check"></i>
                                                        <div class="card-icon">
                                                            <img src="/assets/default/img/assignment-logo/cat4.png">
                                                            <h3>CAT 4</h3>
                                                        </div>

                                                        </span>
                                                </label>
                                            @endif
                                            @if(auth()->user()->subscription('courses'))
                                                <label class="card-radio attempt_type_fields attempt_type_self_learning attempt_type_assignment">
                                                    <input type="radio" name="practice_type"
                                                           class="practice_type rurera-ajax-submission" value="practice" data-target_class="analytics_type_fields" data-passing_vars="[practice_type,attempt_type,class_id]" data-passing_data="" data-ajax_url="/admin/analytics/get_type_fields">
                                                    <span class="radio-btn"><i class="las la-check"></i>
                                                            <div class="card-icon">
                                                                <img src="/assets/default/img/assignment-logo/practice.png">
                                                                <h3>Learn</h3>
                                                            </div>
                                                    </span>
                                                </label>
                                            @endif


                                            @if(auth()->user()->subscription('vocabulary'))

                                                <label class="card-radio attempt_type_fields attempt_type_self_learning attempt_type_assignment">
                                                    <input type="radio" name="practice_type"
                                                           class="practice_type rurera-ajax-submission" value="vocabulary" data-target_class="analytics_type_fields" data-passing_vars="[practice_type,attempt_type,class_id]" data-passing_data="" data-ajax_url="/admin/analytics/get_type_fields">
                                                    <span class="radio-btn"><i class="las la-check"></i>
                                                        <div class="card-icon">
                                                            <img src="/assets/default/img/assignment-logo/vocabulary.png">
                                                            <h3>Vocabulary</h3>
                                                        </div>
                                                    </span>
                                                </label>
                                            @endif

                                            @if(auth()->user()->subscription('timestables'))
                                                <label class="card-radio attempt_type_fields attempt_type_self_learning attempt_type_assignment">
                                                    <input type="radio" name="practice_type"
                                                           class="practice_type rurera-ajax-submission" value="timestables" data-target_class="analytics_type_fields" data-passing_vars="[practice_type,attempt_type,class_id]" data-passing_data="" data-ajax_url="/admin/analytics/get_type_fields">
                                                    <span class="radio-btn"><i class="las la-check"></i>
                                                        <div class="card-icon">
                                                            <img src="/assets/default/img/assignment-logo/timestables.png">
                                                            <h3>Timestables</h3>
                                                        </div>
                                                    </span>
                                                </label>
                                            @endif
                                                @if(auth()->user()->subscription('bookshelf'))
                                                <label class="card-radio attempt_type_fields attempt_type_self_learning attempt_type_assignment">
                                                    <input type="radio" name="practice_type"
                                                           class="practice_type rurera-ajax-submission" value="books" data-target_class="analytics_type_fields" data-passing_vars="[practice_type,attempt_type,class_id]" data-passing_data="" data-ajax_url="/admin/analytics/get_type_fields">
                                                    <span class="radio-btn"><i class="las la-check"></i>
                                                    <div class="card-icon">
                                                        <img src="/assets/default/img/assignment-logo/practice.png">
                                                        <h3>Books</h3>
                                                    </div>
                                                </span>
                                                </label>
                                            @endif

                                                <label class="card-radio attempt_type_fields attempt_type_assignment">
                                                    <input type="radio" name="practice_type"
                                                           class="practice_type rurera-ajax-submission" value="assignment" data-target_class="analytics_type_fields" data-passing_vars="[practice_type,attempt_type,class_id]" data-passing_data="" data-ajax_url="/admin/analytics/get_type_fields">
                                                    <span class="radio-btn"><i class="las la-check"></i>
                                                    <div class="card-icon">
                                                        <img src="/assets/default/img/assignment-logo/practice.png">
                                                        <h3>Custom</h3>
                                                    </div>
                                                </span>
                                                </label>
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="analytics_type_fields"></div>
                            <div class="mt-20 mb-20 col-12">
                                <button type="submit" class="btn btn-sm btn-primary">Analytics</button>
                            </div>
                            <div class="analytics_data_block"></div>

                            <input type="hidden" name="attempt_to_show" class="attempt_to_show" value="last_attempt">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="modal fade review_question_modal" id="notify" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body review-question-block"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
<script src="/assets/default/js/admin/filters.min.js"></script>
<script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
<script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {


        $(document).on('click', '.attempt-type-btn', function (e) {
            $(".attempt-type-btn").removeClass('active');
            $(this).addClass('active');
            var attempt_to_show = $(this).attr('data-attempt_type');
            $(".attempt_to_show").val(attempt_to_show);
            $(".analytics-form").submit();
        });

        $(document).on('click', '.review-question', function (e) {
            var result_question_id = $(this).attr('data-question_id');
            $.ajax({
                type: "GET",
                url: '/admin/analytics/review_question_form',
                data: {'result_question_id': result_question_id},
                success: function (return_data) {
                    $(".review-question-block").html(return_data);
                    $(".review_question_modal").modal('show');
                }
            });
        });


        $(document).on('click', '.mark-review-btn', function (e) {
            var mark_status = $(this).attr('data-mark_status');
            var result_question_id = $(this).attr('data-result_question_id');
            jQuery.ajax({
                type: "POST",
                url: '/admin/analytics/mark_review_submit',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"result_question_id": result_question_id, "mark_status": mark_status},
                success: function (return_data) {
                    console.log(return_data);
                    $(".review_question_modal").modal('hide');
                    Swal.fire({
                        title: '',
                        text: 'Review Added Succssfully!',
                        icon: 'success',
                        toast: true,
                        position: 'bottom-end', // bottom right corner
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                    $(".analytics-form").submit();
                }
            });
        });

        $(document).on('submit', '.analytics-form', function (e) {
            var formData = new FormData($('.analytics-form')[0]);
            /*returnType = rurera_validation_process($(".analytics-form"), 'under_field');

            if (returnType == false) {
                return false;//
            }*/
           //rurera_loader($('.analytics-form'), 'div');
            $.ajax({
                type: "POST",
                url: '/admin/analytics/analytics_data_callback',
                data: formData,
                processData: false,
                contentType: false,
                success: function (return_data) {
                    $(".analytics_data_block").html(return_data);
                    var total_questions = $(".analytics-list-row").attr('data-total_questions');
                    var headers = '';
                    for (var i = 1; i <= total_questions; i++) {
                        headers += '<th class="text-center">Q' + i + '</th>';
                    }
                    $(".no_of_attempts_column").after(headers);
                    //rurera_remove_loader($(".analytics-form"), 'div');
                }
            });
            return false;
        });

    });

    $(document).on('click', '.accordion-parent', function () {
        var thisObj = $(this);
        var child_class = thisObj.attr('data-child_class');

        // Toggle the visibility of the child class elements
        $('.' + child_class).toggle(300, function () {
            if ($('.' + child_class).is(':visible')) {
                // Update the icon to 'down' when visible
                thisObj.find('.fas').removeClass('fa-chevron-right').addClass('fa-chevron-down');
            } else {
                // Update the icon to 'right' when hidden and hide nested children
                thisObj.find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right');
                toggleChild($('.' + child_class));
            }
        });
    });
    function toggleChild(thisObj) {
        // Iterate through each matched element to handle nested child accordions
        thisObj.each(function () {
            var childElement = $(this);
            var child_sub_class = childElement.attr('data-child_class');

            // Hide the current child element
            $('.' + child_sub_class).hide(300);
            childElement.find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right');

            // Recursive call if further child elements exist
            if ($('.' + child_sub_class).length > 0) {
                toggleChild($('.' + child_sub_class));
            }
        });
    }

</script>
@endpush
