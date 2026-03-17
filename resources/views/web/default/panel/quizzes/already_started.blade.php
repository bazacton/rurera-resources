
@php use App\Models\Webinar; @endphp



<div class="learning-page">


    <div class="d-flex position-relative">


        <div class="learning-page-content flex-grow-1 bg-info-light pt-15">
            <div class="learning-content" id="learningPageContent">
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="learning-start">
                        <div class="learning-text">
                            <h5 class="font-30 mb-10">Test Already Active</h5>
                            <p class="font-18">📘 You're already taking this test</p>
                            <p>What would you like to do?</p>
                            <button type="button" class="already-started-continue">Continue on this device</button>
                            <button type="button" class="back-other-device exit-tab">Go back to other device</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.already-started-continue', function (evt) {
        var result_id = '{{$result_id}}';
        jQuery.ajax({
            type: "POST",
            url: '/question_attempt/already_started_continue',
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