@php $label_type = isset( $elementObj->label_type ) ? $elementObj->label_type : 'question_label'; @endphp
	@if($label_type == 'h1' || $label_type == 'h2' || $label_type == 'h3' || $label_type == 'h4' || $label_type == 'h5' || $label_type == 'h6')
		<{{$label_type}}>{!! $elementObj->content !!}</{{$label_type}}>
	@elseif($label_type == 'cloud_text')
        @php
            $cloud_direction = isset($elementObj->cloud_direction)? $elementObj->cloud_direction : 'top_right';
            $cloud_color = isset($elementObj->cloud_color)? $elementObj->cloud_color : '#000000';
            $avatar_label = isset($elementObj->avatar_label)? $elementObj->avatar_label : '';
            $cloud_size = isset($elementObj->cloud_size)? $elementObj->cloud_size : 'small';
            $cloud_avatar = isset($elementObj->cloud_avatar)? $elementObj->cloud_avatar : 'boy-svg-2.svg';
            $cloud_avatar = '/assets/default/svgs/cloud-kids-avatars/'.$cloud_avatar;
            if($avatar_label != ''){
                $avatar_label = '<span class="avatar-label">'.$avatar_label.'</span>';
            }
            @endphp
        <style>
            :root {
                --cloud-br-color: {{$cloud_color}}; /* default value */
            }
        </style>
        <div class="question-label {{$label_type}} {{$cloud_size}} {{$cloud_direction}}"><span class="cloud_text_element"><span class="cloud_avatar"><img src="{{$cloud_avatar}}">{!! $avatar_label !!}</span><span class="cloud_nner_text" style="background:{{$cloud_color}}"><svgdata class="rurera-svg-data0_6684">{!! $elementObj->content !!}</svgdata></span></span></div>
    @else
		<div class="question-label {{$label_type}}"><span>{!! $elementObj->content !!}</span></div>
	@endif
