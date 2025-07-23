@php $already_paid = isset($already_paid)? $already_paid : false; @endphp
<form action="/admin/schools/generate_invoice" method="Post">
    {{ csrf_field() }}


    <input type="hidden" name="locale" value="{{ getDefaultLocale() }}">
    <input type="hidden" name="school_id" value="{{ $school->id }}">
    <input type="hidden" name="package_id" class="package_id" value="{{isset($schoolSubscription->subscribe_id)? $schoolSubscription->subscribe_id : 0}}">
    <input type="hidden" name="total_price" class="total_price" value="{{isset($schoolSubscription->charged_amount)? $schoolSubscription->charged_amount : 0}}">
    <input type="hidden" name="total_actual_price" class="total_actual_price" value="{{isset($payment_data->total_actual_price)? $payment_data->total_actual_price : 0}}">
    <input type="hidden" class="redirect_url" name="redirect_url" value="">

    <input type="hidden" name="school_invoice_id" value="{{ isset($schoolSubscription->id)? $schoolSubscription->id : 0 }}">



    <div class="form-group">
        <label>No of Students</label>
        <input type="number" name="no_of_students"
               class="form-control no_of_students trigger-calculate  @error('usable_count') is-invalid @enderror"
               value="{{isset($schoolSubscription->max_students)? $schoolSubscription->max_students : 0}}"/>

    </div>

    <div class="form-group rurera-hide">
        <label>Base Price per Day</label>
        <input step="any" type="number" name="best_price_per_student"
               class="base-price form-control  trigger-calculate @error('usable_count') is-invalid @enderror"
               value="0"/>

    </div>


    <div class="form-group rurera-hide">
        <label>Per Student Price per Day</label>
        <input step="any"  type="number" name="per_student_price"
               class="per-student-price form-control  trigger-calculate @error('per_student_price') is-invalid @enderror"
               value="0"/>

    </div>

    <div class="form-group">
        <label>Start Date</label>
        @php $is_disabled = ($already_paid == true)? 'disabled' : ''; @endphp
        <input type="text" name="start_date" value="{{isset($schoolSubscription->start_at)? dateTimeFormat($schoolSubscription->start_at, 'j F Y') : ''}}" id="start_date" class="trigger-calculate start_date singledatepicker form-control mt-10" {{$is_disabled}}>
    </div>
    <div class="form-group">
        <label>Expiry Date</label>
        <input type="text" name="expiry_date" value="{{isset($schoolSubscription->expiry_at)? dateTimeFormat($schoolSubscription->expiry_at, 'j F Y') : ''}}" id="expiry_date" class="trigger-calculate expiry_date singledatepicker form-control mt-10">
    </div>

    <div class="table-responsive">
        <table class="table table-striped font-14">
            <tr>
                <th class="text-left">Module</th>
                <th class="text-left">Admin Price</th>
                <th class="text-left">Custom Price</th>
            </tr>
            <tr>
                <td>
                    <div>
                        <div class="form-group custom-switches-stacked">
                            <label class="custom-switch pl-0">
                                <input type="hidden" name="is_courses" value="0">
                                @php $is_checked = (isset($payment_data->is_courses) && $payment_data->is_courses == 0)? '' : 'checked'; @endphp
                                <input type="checkbox" name="is_courses" id="is_courses" value="1"
                                       class="custom-switch-input trigger-calculate" {{$is_checked}}/>
                                <span class="custom-switch-indicator"></span>
                                <label class="custom-switch-description mb-0 cursor-pointer" for="is_courses">Courses</label>
                            </label>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="courses_price">$<span>456</span></span>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="courses_price_custom" value="{{isset($payment_data->courses_price_custom)? $payment_data->courses_price_custom : 0}}" id="start_date" class="trigger-calculate courses_price_custom form-control">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="is_timestables" value="0">
                            @php $is_checked = (isset($payment_data->is_timestables) && $payment_data->is_timestables == 0)? '' : 'checked'; @endphp
                            <input type="checkbox" name="is_timestables" id="is_timestables" value="1"
                                   class="custom-switch-input trigger-calculate" {{$is_checked}}/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="is_timestables">Timestables</label>
                        </label>
                    </div>
                </td>
                <td>
                    <span class="timestables_price">$<span>456</span></span>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="timestables_price_custom" value="{{isset($payment_data->timestables_price_custom)? $payment_data->timestables_price_custom : 0}}" id="start_date" class="trigger-calculate timestables_price_custom form-control">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="is_vocabulary" value="0">
                            @php $is_checked = (isset($payment_data->is_vocabulary) && $payment_data->is_vocabulary == 0)? '' : 'checked'; @endphp
                            <input type="checkbox" name="is_vocabulary" id="is_vocabulary" value="1"
                                   class="custom-switch-input trigger-calculate" {{$is_checked}}/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="is_vocabulary">Vocabulary</label>
                        </label>
                    </div>
                </td>
                <td>
                    <span class="vocabulary_price">$<span>456</span></span>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="vocabulary_price_custom" value="{{isset($payment_data->vocabulary_price_custom)? $payment_data->vocabulary_price_custom : 0}}" id="start_date" class="trigger-calculate vocabulary_price_custom form-control">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="is_bookshelf" value="0">
                            @php $is_checked = (isset($payment_data->is_bookshelf) && $payment_data->is_bookshelf == 0)? '' : 'checked'; @endphp
                            <input type="checkbox" name="is_bookshelf" id="is_bookshelf" value="1"
                                   class="custom-switch-input trigger-calculate" {{$is_checked}}/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="is_bookshelf">Bookshelf</label>
                        </label>
                    </div>
                </td>
                <td>
                    <span class="bookshelf_price">$<span>456</span></span>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="bookshelf_price_custom" value="{{isset($payment_data->bookshelf_price_custom)? $payment_data->bookshelf_price_custom : 0}}" id="start_date" class="trigger-calculate bookshelf_price_custom form-control">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="is_sats" value="0">
                            @php $is_checked = (isset($payment_data->is_sats) && $payment_data->is_sats == 0)? '' : 'checked'; @endphp
                            <input type="checkbox" name="is_sats" id="is_sats" value="1"
                                   class="custom-switch-input trigger-calculate" {{$is_checked}}/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="is_sats">SATS</label>
                        </label>
                    </div>
                </td>
                <td>
                    <span class="sats_price">$<span>456</span></span>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="sats_price_custom" value="{{isset($payment_data->sats_price_custom)? $payment_data->sats_price_custom : 0}}" id="start_date" class="trigger-calculate sats_price_custom form-control">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="is_elevenplus" value="0">
                            @php $is_checked = (isset($payment_data->is_elevenplus) && $payment_data->is_elevenplus == 0)? '' : 'checked'; @endphp
                            <input type="checkbox" name="is_elevenplus" id="is_elevenplus" value="1"
                                   class="custom-switch-input trigger-calculate" {{$is_checked}}/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="is_elevenplus">11Plus</label>
                        </label>
                    </div>
                </td>
                <td>
                    <span class="elevenplus_price">$<span>456</span></span>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="elevenplus_price_custom" value="{{isset($payment_data->elevenplus_price_custom)? $payment_data->elevenplus_price_custom : 0}}" id="start_date" class="trigger-calculate elevenplus_price_custom form-control">
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="is_google_classroom" value="0">
                            @php $is_checked = (isset($payment_data->is_google_classroom) && $payment_data->is_google_classroom == 0)? '' : 'checked'; @endphp
                            <input type="checkbox" name="is_google_classroom" id="is_google_classroom" value="1"
                                   class="custom-switch-input trigger-calculate" {{$is_checked}}/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="is_google_classroom">Google Classroom</label>
                        </label>
                    </div>
                </td>
                <td>
                    <span class="google_classroom_price">$<span>456</span></span>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="google_classroom_price_custom" value="{{isset($payment_data->google_classroom_price_custom)? $payment_data->google_classroom_price_custom : 0}}" id="start_date" class="trigger-calculate google_classroom_price_custom form-control">
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="form-group rurera-hide">
        <label>No of Days</label>
        <input type="number" min="1" name="subscribe_for"
               class="form-control subscribe_for trigger-calculate  @error('usable_count') is-invalid @enderror"
               value="1"/>

    </div>
    <div class="total-block">
        <h6 class="base-price-per-student">Base Price Per Student: $<span>34</span></h6>

        <h6 class="no_of_days">No of Days: <span>1</span></h6>
        @if(isset($already_paid_amount) && $already_paid_amount > 0)
        <h6 class="no_of_days">Already Paid: <span>${{$already_paid_amount}}</span></h6>
        @endif

        <h6 class="total-price">Total Price: <span>$34</span></h6>
        <h6 class="actual-price">Actual Price: <span>$34</span></h6>
    </div>

    <div class=" mt-4">
        <button class="btn btn-primary">{{ trans('admin/main.submit') }}</button>
    </div>
</form>
<script>

    var already_paid_amount = '{{isset($already_paid_amount)? $already_paid_amount : 0}}';
    function calculateDateDiff() {
        var startDate = $('.start_date').val();
        var expiryDate = $('.expiry_date').val();

        if (startDate && expiryDate) {
            var start = moment(startDate, 'YYYY-MM-DD');
            var end = moment(expiryDate, 'YYYY-MM-DD');

            var diff = end.diff(start, 'days'); // Signed difference
            $('.subscribe_for').val(diff >= 0 ? diff : 0); // Prevent negative values
        } else {
            $('.subscribe_for').val(0);
        }
    }

    let currentStudentCount = 15;
    const packages = {
    @if(!empty($subscribes))
        @foreach( $subscribes as $subscribeObj)
            {{$subscribeObj->id}}: {
            package_id:  {{$subscribeObj->id}},
            name: "{{$subscribeObj->getTitleAttribute()}}",
            minStudents: {{$subscribeObj->min_students}},
            maxStudents: {{$subscribeObj->max_students}},
            pricePerStudent: 0,//{{$subscribeObj->price_per_student}},
            basePrice: 0,
            is_courses: {{$subscribeObj->courses_price}},
            is_timestables: {{$subscribeObj->timestables_price}},
            is_vocabulary: {{$subscribeObj->vocabulary_price}},
            is_bookshelf: {{$subscribeObj->bookshelf_price}},
            is_sats: {{$subscribeObj->sats_price}},
            is_elevenplus: {{$subscribeObj->elevenplus_price}},
            is_google_classroom: {{$subscribeObj->googleclassroom_price}},
            },
        @endforeach
    @endif
    };

    $('body').on('input', '.no_of_students', function () {
        var no_of_students = parseInt($(this).val());

        if (isNaN(no_of_students)) {
            console.log("Invalid input.");
            return;
        }

        let matchedPackage = null;

        for (const key in packages) {
            const pkg = packages[key];
            if (no_of_students >= pkg.minStudents && no_of_students <= pkg.maxStudents) {
                matchedPackage = pkg;
                $(".package_id").val(pkg.package_id);
                break;
            }
        }

        if (matchedPackage) {

            $(".courses_price span").html(matchedPackage.is_courses);
            $(".timestables_price span").html(matchedPackage.is_timestables);
            $(".vocabulary_price span").html(matchedPackage.is_vocabulary);
            $(".bookshelf_price span").html(matchedPackage.is_bookshelf);
            $(".sats_price span").html(matchedPackage.is_sats);
            $(".elevenplus_price span").html(matchedPackage.is_elevenplus);
            $(".google_classroom_price span").html(matchedPackage.is_google_classroom);


            $(".base-price").val(parseFloat(matchedPackage.basePrice).toFixed(2));
            $(".base-price").attr('data-actual-val', parseFloat(matchedPackage.basePrice).toFixed(2));
            $(".per-student-price").val(parseFloat(matchedPackage.pricePerStudent).toFixed(2));
            $(".per-student-price").attr('data-actual-val',parseFloat(matchedPackage.pricePerStudent).toFixed(2));

            $('input[name="is_courses"][type="checkbox"]').attr('data-price', parseFloat(matchedPackage.is_courses).toFixed(2));
            $('input[name="is_timestables"][type="checkbox"]').attr('data-price', parseFloat(matchedPackage.is_timestables).toFixed(2));
            $('input[name="is_vocabulary"][type="checkbox"]').attr('data-price', parseFloat(matchedPackage.is_vocabulary).toFixed(2));
            $('input[name="is_bookshelf"][type="checkbox"]').attr('data-price', parseFloat(matchedPackage.is_bookshelf).toFixed(2));
            $('input[name="is_sats"][type="checkbox"]').attr('data-price', parseFloat(matchedPackage.is_sats).toFixed(2));
            $('input[name="is_elevenplus"][type="checkbox"]').attr('data-price', parseFloat(matchedPackage.is_elevenplus).toFixed(2));
            $('input[name="is_google_classroom"][type="checkbox"]').attr('data-price', parseFloat(matchedPackage.is_google_classroom).toFixed(2));


            $('input[name="courses_price_custom"]').val(parseFloat(matchedPackage.is_courses).toFixed(2));
            $('input[name="timestables_price_custom"]').val(parseFloat(matchedPackage.is_timestables).toFixed(2));
            $('input[name="vocabulary_price_custom"]').val(parseFloat(matchedPackage.is_vocabulary).toFixed(2));
            $('input[name="bookshelf_price_custom"]').val(parseFloat(matchedPackage.is_bookshelf).toFixed(2));
            $('input[name="sats_price_custom"]').val(parseFloat(matchedPackage.is_sats).toFixed(2));
            $('input[name="elevenplus_price_custom"]').val(parseFloat(matchedPackage.is_elevenplus).toFixed(2));
            $('input[name="google_classroom_price_custom"]').val(parseFloat(matchedPackage.is_google_classroom).toFixed(2));


            $('input[name="courses_price_custom"]').attr('data-price',parseFloat(matchedPackage.is_courses).toFixed(2));
            $('input[name="timestables_price_custom"]').attr('data-price',parseFloat(matchedPackage.is_timestables).toFixed(2));
            $('input[name="vocabulary_price_custom"]').attr('data-price',parseFloat(matchedPackage.is_vocabulary).toFixed(2));
            $('input[name="bookshelf_price_custom"]').attr('data-price',parseFloat(matchedPackage.is_bookshelf).toFixed(2));
            $('input[name="sats_price_custom"]').attr('data-price',parseFloat(matchedPackage.is_sats).toFixed(2));
            $('input[name="elevenplus_price_custom"]').attr('data-price',parseFloat(matchedPackage.is_elevenplus).toFixed(2));
            $('input[name="google_classroom_price_custom"]').attr('data-price',parseFloat(matchedPackage.is_google_classroom).toFixed(2));


        }
    });

    $('body').on('input, change', '.trigger-calculate', function () {

        var no_of_students = $(".no_of_students").val();
        var base_price = $(".base-price").val();
        var base_price_actual = $(".base-price").attr('data-actual-val');
        var per_student_price = $(".per-student-price").val();
        calculateDateDiff();
        var subscribe_for = $(".subscribe_for").val();
        var per_student_price_actual = $(".per-student-price").attr('data-actual-val');
        var additional_price = custom_price = 0;

        var is_courses = $('input[name="is_courses"]').is(':checked') ? parseFloat($('input[name="courses_price_custom"]').val()) || 0 : 0;
        var is_timestables = $('input[name="is_timestables"]').is(':checked') ? parseFloat($('input[name="timestables_price_custom"]').val()) || 0 : 0;
        var is_vocabulary = $('input[name="is_vocabulary"]').is(':checked') ? parseFloat($('input[name="vocabulary_price_custom"]').val()) || 0 : 0;
        var is_bookshelf = $('input[name="is_bookshelf"]').is(':checked') ? parseFloat($('input[name="bookshelf_price_custom"]').val()) || 0 : 0;
        var is_sats = $('input[name="is_sats"]').is(':checked') ? parseFloat($('input[name="sats_price_custom"]').val()) || 0 : 0;
        var is_elevenplus = $('input[name="is_elevenplus"]').is(':checked') ? parseFloat($('input[name="elevenplus_price_custom"]').val()) || 0 : 0;
        var is_google_classroom = $('input[name="is_google_classroom"]').is(':checked') ? parseFloat($('input[name="google_classroom_price_custom"]').val()) || 0 : 0;


        var is_courses_actual = $('input[name="is_courses"]').is(':checked') ? parseFloat($('input[name="courses_price_custom"]').attr('data-price')) || 0 : 0;
        var is_timestables_actual = $('input[name="is_timestables"]').is(':checked') ? parseFloat($('input[name="timestables_price_custom"]').attr('data-price')) || 0 : 0;
        var is_vocabulary_actual = $('input[name="is_vocabulary"]').is(':checked') ? parseFloat($('input[name="vocabulary_price_custom"]').attr('data-price')) || 0 : 0;
        var is_bookshelf_actual = $('input[name="is_bookshelf"]').is(':checked') ? parseFloat($('input[name="bookshelf_price_custom"]').attr('data-price')) || 0 : 0;
        var is_sats_actual = $('input[name="is_sats"]').is(':checked') ? parseFloat($('input[name="sats_price_custom"]').attr('data-price')) || 0 : 0;
        var is_elevenplus_actual = $('input[name="is_elevenplus"]').is(':checked') ? parseFloat($('input[name="elevenplus_price_custom"]').attr('data-price')) || 0 : 0;
        var is_google_classroom_actual = $('input[name="is_google_classroom"]').is(':checked') ? parseFloat($('input[name="google_classroom_price_custom"]').attr('data-price')) || 0 : 0;


        additional_price += (parseFloat(is_courses_actual.toFixed(2)));
        additional_price += (parseFloat(is_timestables_actual.toFixed(2)));
        additional_price += (parseFloat(is_vocabulary_actual.toFixed(2)));
        additional_price += (parseFloat(is_bookshelf_actual.toFixed(2)));
        additional_price += (parseFloat(is_sats_actual.toFixed(2)));
        additional_price += (parseFloat(is_elevenplus_actual.toFixed(2)));
        additional_price += (parseFloat(is_google_classroom_actual.toFixed(2)));

        custom_price += (parseFloat(is_courses.toFixed(2)));
        custom_price += (parseFloat(is_timestables.toFixed(2)));
        custom_price += (parseFloat(is_vocabulary.toFixed(2)));
        custom_price += (parseFloat(is_bookshelf.toFixed(2)));
        custom_price += (parseFloat(is_sats.toFixed(2)));
        custom_price += (parseFloat(is_elevenplus.toFixed(2)));
        custom_price += (parseFloat(is_google_classroom.toFixed(2)));




        var custom_price_final = parseFloat(no_of_students)*parseFloat(custom_price);
        var total_price = (parseFloat(no_of_students) * parseFloat(per_student_price))+parseFloat(base_price)+parseFloat(custom_price_final);
        total_price = parseInt(subscribe_for)*parseFloat(total_price);

        total_price = parseFloat(total_price) - parseFloat(already_paid_amount);
        total_price = Math.round(total_price);
        $(".total-price span").html('$'+total_price);

        var additional_price_final = parseFloat(no_of_students)*parseFloat(additional_price);
        var total_price_actual = (parseFloat(no_of_students) * parseFloat(per_student_price_actual))+parseFloat(base_price_actual)+parseFloat(additional_price_final);
        total_price_actual = parseInt(subscribe_for)*parseFloat(total_price_actual);

        //total_price_actual = parseFloat(total_price_actual) - parseFloat(already_paid_amount);
        total_price_actual = Math.round(total_price_actual);
        $(".actual-price span").html('$'+total_price_actual);
        $(".total_price").val(total_price);
        $(".total_actual_price").val(total_price_actual);
        $(".no_of_days span").html($(".subscribe_for").val());
        $(".base-price-per-student span").html((parseFloat(per_student_price))+parseFloat(base_price)+parseFloat(custom_price));
    });

    $('.no_of_students').trigger('input');

    var redirect_url = window.location.href;
    $(".redirect_url").val(redirect_url);

    $(document).ready(function () {

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
    });
</script>
