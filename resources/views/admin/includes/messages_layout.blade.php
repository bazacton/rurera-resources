@if(isset($total_errors) && $total_errors > 0)
    <div class="error-alert">
    {{$total_errors}} Errors have occurred
    <a href="javascript:;" class="messages-back-btn" data-target_class="{{$back_button_target}}" data-base_class="{{$back_button_base}}">Go back and fix errors.</a>
</div>
@endif
<div class="table-sm">
    {!! $message_data !!}

    <div class="teacher-buttons mt-30">

        @if(isset($back_button) && $back_button == true)
                <button class="btn btn-outline messages-back-btn" type="button" data-target_class="{{$back_button_target}}" data-base_class="{{$back_button_base}}">Back</button>
        @endif
    </div>
</div>
