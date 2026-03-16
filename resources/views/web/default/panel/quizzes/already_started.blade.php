
@php use App\Models\Webinar; @endphp



<div class="learning-page">


    <div class="d-flex position-relative">


        <div class="learning-page-content flex-grow-1 bg-info-light pt-15">
            <div class="learning-content" id="learningPageContent">
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="learning-start">
                        <div class="learning-icon">
                            <span><img src="/assets/default/svgs/crown-simple.svg" width="111" height="80" alt=""></span>
                        </div>
                        <div class="learning-text">
                            <h5 class="font-30 mb-10">Already Started</h5>
                            <p class="font-18">Get PLUS today for accsecc to live student activity and progress from the freedom of your desk.</p>
                            <button type="button" class="already-started-continue">Continue</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('change', '.show-pagination-check', function (evt) {
        var result_id = '{{$result_id}}';
        jQuery.ajax({
            type: "POST",
            url: '/question_attempt/already_started_continue',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {"result_id": result_id},
            success: function (return_data) {
                window.location.reload();
            }
        });
    })
</script>