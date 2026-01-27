@php $resultData = $QuestionsAttemptController->get_result_data($rowObj->id);
$counter++;
$lock_image = ($counter > 2)? 'lock.svg' : 'unlock.svg';
$lock_unlock_class = ($counter > 2)? 'rurera-lock-item' : 'rurera-unlock-item';

$is_passed = isset( $resultData->is_passed )? $resultData->is_passed : false;
$in_progress = isset( $resultData->in_progress )? $resultData->in_progress : false;
$current_status = isset( $resultData->current_status )? $resultData->current_status : '';
$button_label = ($in_progress == true)? 'Resume' :'Practice Now';
$button_label = ($is_passed == true) ? 'Practice Again' : $button_label;
$button_label = ($in_progress == true)? 'Resume Test' :'Take Test';
$button_class = ($in_progress == true)? 'resume-test' :'';
$quiz_image = ($rowObj->quiz_image != '')? $rowObj->quiz_image : '/assets/default/img/assignment-logo/'.$rowObj->quiz_type.'.png';
@endphp
<tr>
    <td>
        <img src="{{$quiz_image}}" alt="quiz_image" width="59" height="59">
        <h4 class="font-14 font-weight-bold text-dark-charcoal"><a href="/{{isset($url_slug)? $url_slug : 'sats'}}/{{$rowObj->quiz_slug}}" class="{{ subscriptionCheckLink('bookshelf') }} d-block mb-5">{{$rowObj->getTitleAttribute()}}</a>
            <span class="sub_label">{{$rowObj->no_of_questions}} Question(s),</span> <span class="sub_label font-14">Time:{{$rowObj->time}}m,</span> <span class="sub_label font-14">{{getQuizTypeTitle($rowObj->quiz_type)}}</span>
			@if( $rowObj->time == 10)
				<img src="/assets/default/img/stop-watch.png" alt="stop-watch" width="360" height="360">
			@endif

        </h4>
    </td>
    <td class="text-right {{$button_class}}">
        @if (auth()->check() && auth()->user()->isParent())
            <a href="javascript:;" class="rurera-list-btn font-14">Assign</a>
        @endif
        @if (auth()->check() && auth()->user()->isUser())
            <a href="/{{isset($url_slug)? $url_slug : 'sats'}}/{{$rowObj->quiz_slug}}" class="rurera-list-btn font-14 {{ subscriptionCheckLink('bookshelf') }}">{{$button_label}}</a>
        @endif
    </td>
</tr>
