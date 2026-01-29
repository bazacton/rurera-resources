@extends('web.default.panel.layouts.panel_layout')
@php use App\Models\Webinar; @endphp

@push('styles_top')

@endpush

@section('content')
<section class="content-section">
    <div class="categories-element-title rurera-hide">
        <h2 class="font-22"><span>{{$categoryObj->category->getTitleAttribute()}} - {{$categoryObj->getTitleAttribute()}}</span></h2>
        <p>{{$categoryObj->category->getTitleAttribute()}} courses - Comprehensive list of courses for Children Aged 5, 6 and 7.</p>
    </div>
    <div class="categories-boxes row">
        <div class="col-12">
            <div class="subjects-heading mb-15">
                <h1 class="font-22 mb-0">Subjects - {{$categoryObj->getTitleAttribute()}}</h1>
            </div>
        </div>
        <div class="col-12">
            @if( !empty( $courses_list ) )
                @foreach( $courses_list as $courseObj)
                    @php $subject_percentage = Webinar::getSubjectPercentage($courseObj->subject); @endphp
                    <div class="categories-card medium panel-border bg-white rounded-sm mb-15">
                        <div class="categories-icon">
                            @if($courseObj->subject->icon_code != '')
                                {!! $courseObj->subject->icon_code !!}
                        @else
                            <img src="{!! $courseObj->subject->thumbnail !!}" width="50" height="50" alt="categories image">
                        @endif
                        </div>
                        <div class="categories-text">
                            <h3 data-id="{{$courseObj->subject->id}}" class="categories-title font-16 font-weight-bold text-dark-charcoal mb-5"><a href="/{{$courseObj->subject->slug}}/{{$categoryObj->slug}}">{{$courseObj->subject->getTitleAttribute()}}</a></h3>
                            @if( isset( $subject_percentage['percentage'] ) && $subject_percentage['percentage'] > 0)
                                <div class="levels-progress horizontal">
                                    <span class="progress-numbers">{{$subject_percentage['skills_attempted']}}/{{$subject_percentage['total_skils']}} Lessons</span>
                                    <span class="progress-box">
                                        <span class="progress-count" style="width: {{$subject_percentage['percentage']}}%;"></span>
                                    </span>
                                </div>
                            @else
                                <a href="/{{$courseObj->subject->slug}}/{{$categoryObj->slug}}" class="learning-btn font-14" aria-label="Start Learning">Start Learning</a>
                            @endif
                            <span class="subject-info font-14 text-gray">{{$courseObj->subject->chapters->count()}} Units and {{$courseObj->subject->webinar_sub_chapters->count()}} Lessons</span>
                            <div class="levels-progress horizontal"
                                role="progressbar"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                aria-valuenow="0"
                                aria-label="Course progress">
                                <span class="progress-box">
                                    <span class="progress-count" style="width: 0%;"></span>
                                </span>
                                <span class="progress-numbers" aria-hidden="true">0%</span>
                            </div>
                        </div>

                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- Bootstrap Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to leave this page?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Stay</button>
        <button type="button" class="btn btn-primary" id="leaveButton">Leave</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts_bottom')
@if (!auth()->subscription('courses'))
    <script>
        if( $(".subscription-modal").length > 0){
            $(".subscription-modal").modal('show');
        }
    </script>
@endif

@endpush
