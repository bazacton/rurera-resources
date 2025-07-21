<form action="/admin/schools/generate_invoice" method="Post">
    {{ csrf_field() }}


    <input type="hidden" name="locale" value="{{ getDefaultLocale() }}">
    <input type="hidden" name="school_id" value="{{ $school->id }}">
    <input type="hidden" name="package_id" class="package_id" value="0">
    <input type="hidden" name="total_price" class="total_price" value="0">
    <input type="hidden" name="total_actual_price" class="total_actual_price" value="0">
    <input type="hidden" class="redirect_url" name="redirect_url" value="">



    <div class="form-group">
        <label>No of Students</label>
        <input type="number" name="no_of_students"
               class="form-control no_of_students trigger-calculate  @error('usable_count') is-invalid @enderror"
               value="15"/>

    </div>

    <div class="form-group">
        <label>Base Price per Day</label>
        <input step="any" type="number" name="no_of_students"
               class="base-price form-control  trigger-calculate @error('usable_count') is-invalid @enderror"
               value="0"/>

    </div>


    <div class="form-group">
        <label>Per Student Price per Day</label>
        <input step="any"  type="number" name="per_student_price"
               class="per-student-price form-control  trigger-calculate @error('per_student_price') is-invalid @enderror"
               value="0"/>

    </div>

    <div class="form-group">
        <label>Start Date</label>
        <input type="text" name="start_date" id="start_date" class="trigger-calculate start_date singledatepicker form-control mt-10">
    </div>
    <div class="form-group">
        <label>Expiry Date</label>
        <input type="text" name="expiry_date" id="expiry_date" class="trigger-calculate expiry_date singledatepicker form-control mt-10">
    </div>

    <div class="form-group custom-switches-stacked">
        <label class="custom-switch pl-0">
            <input type="hidden" name="is_courses" value="0">
            <input type="checkbox" name="is_courses" id="is_courses" value="1"
            class="custom-switch-input trigger-calculate" checked/>
            <span class="custom-switch-indicator"></span>
            <label class="custom-switch-description mb-0 cursor-pointer" for="is_courses">Courses</label>
        </label>
    </div>

    <div class="form-group custom-switches-stacked">
        <label class="custom-switch pl-0">
            <input type="hidden" name="is_timestables" value="0">
            <input type="checkbox" name="is_timestables" id="is_timestables" value="1"
            class="custom-switch-input trigger-calculate" checked/>
            <span class="custom-switch-indicator"></span>
            <label class="custom-switch-description mb-0 cursor-pointer" for="is_timestables">Timestables</label>
        </label>
    </div>

    <div class="form-group custom-switches-stacked">
        <label class="custom-switch pl-0">
            <input type="hidden" name="is_vocabulary" value="0">
            <input type="checkbox" name="is_vocabulary" id="is_vocabulary" value="1"
            class="custom-switch-input trigger-calculate" checked/>
            <span class="custom-switch-indicator"></span>
            <label class="custom-switch-description mb-0 cursor-pointer" for="is_vocabulary">Vocabulary</label>
        </label>
    </div>

    <div class="form-group custom-switches-stacked">
        <label class="custom-switch pl-0">
            <input type="hidden" name="is_bookshelf" value="0">
            <input type="checkbox" name="is_bookshelf" id="is_bookshelf" value="1"
            class="custom-switch-input trigger-calculate" checked/>
            <span class="custom-switch-indicator"></span>
            <label class="custom-switch-description mb-0 cursor-pointer" for="is_bookshelf">Bookshelf</label>
        </label>
    </div>

    <div class="form-group custom-switches-stacked">
        <label class="custom-switch pl-0">
            <input type="hidden" name="is_sats" value="0">
            <input type="checkbox" name="is_sats" id="is_sats" value="1"
                   class="custom-switch-input trigger-calculate" checked/>
            <span class="custom-switch-indicator"></span>
            <label class="custom-switch-description mb-0 cursor-pointer" for="is_sats">SATS</label>
        </label>
    </div>
    <div class="form-group custom-switches-stacked">
        <label class="custom-switch pl-0">
            <input type="hidden" name="is_elevenplus" value="0">
            <input type="checkbox" name="is_elevenplus" id="is_elevenplus" value="1"
            class="custom-switch-input trigger-calculate" checked/>
            <span class="custom-switch-indicator"></span>
            <label class="custom-switch-description mb-0 cursor-pointer" for="is_elevenplus">11Plus</label>
        </label>
    </div>

    <div class="form-group custom-switches-stacked">
        <label class="custom-switch pl-0">
            <input type="hidden" name="is_google_classroom" value="0">
            <input type="checkbox" name="is_google_classroom" id="is_google_classroom" value="1"
            class="custom-switch-input trigger-calculate" checked/>
            <span class="custom-switch-indicator"></span>
            <label class="custom-switch-description mb-0 cursor-pointer" for="is_google_classroom">Google Classroom</label>
        </label>
    </div>

    <br>
    <div class="form-group rurera-hide">
        <label>No of Days</label>
        <input type="number" min="1" name="subscribe_for"
               class="form-control subscribe_for trigger-calculate  @error('usable_count') is-invalid @enderror"
               value="1"/>

    </div>
    <div class="total-block">
        <h6 class="total-price">Total Price: <span>$34</span></h6>
        <h6 class="actual-price">Actual Price: <span>$34</span></h6>
    </div>

    <div class=" mt-4">
        <button class="btn btn-primary">{{ trans('admin/main.submit') }}</button>
    </div>
</form>
<script>

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
            pricePerStudent: {{$subscribeObj->price_per_student}},
            basePrice: {{$subscribeObj->base_price}}/30,
            is_courses: 0,
            is_timestables: 0,
            is_vocabulary: 0,
            is_bookshelf: 0,
            is_sats: 0,
            is_elevenplus: 0,
            is_google_classroom: 0,
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
        var additional_price = 0;

        var is_courses = parseFloat(
            $('input[name="is_courses"][type="checkbox"]:checked').attr('data-price')
        ) || 0;
        var is_timestables = parseFloat(
            $('input[name="is_timestables"][type="checkbox"]:checked').attr('data-price')
        ) || 0;
        var is_vocabulary = parseFloat(
            $('input[name="is_vocabulary"][type="checkbox"]:checked').attr('data-price')
        ) || 0;
        var is_bookshelf = parseFloat(
            $('input[name="is_bookshelf"][type="checkbox"]:checked').attr('data-price')
        ) || 0;
        var is_sats = parseFloat(
            $('input[name="is_sats"][type="checkbox"]:checked').attr('data-price')
        ) || 0;
        var is_elevenplus = parseFloat(
            $('input[name="is_elevenplus"][type="checkbox"]:checked').attr('data-price')
        ) || 0;
        var is_google_classroom = parseFloat(
            $('input[name="is_google_classroom"][type="checkbox"]:checked').attr('data-price')
        ) || 0;

        additional_price += (parseFloat(no_of_students)*parseFloat(is_courses.toFixed(2)));
        additional_price += (parseFloat(no_of_students)*parseFloat(is_timestables.toFixed(2)));
        additional_price += (parseFloat(no_of_students)*parseFloat(is_vocabulary.toFixed(2)));
        additional_price += (parseFloat(no_of_students)*parseFloat(is_bookshelf.toFixed(2)));
        additional_price += (parseFloat(no_of_students)*parseFloat(is_sats.toFixed(2)));
        additional_price += (parseFloat(no_of_students)*parseFloat(is_elevenplus.toFixed(2)));
        additional_price += (parseFloat(no_of_students)*parseFloat(is_google_classroom.toFixed(2)));



        console.log(is_google_classroom);

        var total_price = (parseFloat(no_of_students) * parseFloat(per_student_price))+parseFloat(base_price)+parseFloat(additional_price);
        total_price = parseInt(subscribe_for)*parseFloat(total_price);
        total_price = Math.round(total_price);
        $(".total-price span").html('$'+total_price);

        var total_price_actual = (parseFloat(no_of_students) * parseFloat(per_student_price_actual))+parseFloat(base_price_actual)+parseFloat(additional_price);
        total_price_actual = parseInt(subscribe_for)*parseFloat(total_price_actual);
        total_price_actual = Math.round(total_price_actual);
        $(".actual-price span").html('$'+total_price_actual);
        $(".total_price").val(total_price);
        $(".total_actual_price").val(total_price_actual);
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
