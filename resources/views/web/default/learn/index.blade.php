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
            <div class="subjects-heading">
                <h2 class="font-22">Subjects - {{$categoryObj->getTitleAttribute()}}</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="panel-border bg-white rounded-sm px-30 py-10">
                @if( !empty( $courses_list ) )
                    @foreach( $courses_list as $courseObj)
                            @php $subject_percentage = Webinar::getSubjectPercentage($courseObj->subject); @endphp
                                <div class="categories-card medium">
                                    <div class="categories-icon" style="background:{{$courseObj->background_color}}">
                                        @if($courseObj->subject->icon_code != '')
                                            {!! $courseObj->subject->icon_code !!}
                                    @else
                                        <img src="{!! $courseObj->subject->thumbnail !!}" width="50" height="50" alt="categories image">
                                    @endif
                                    </div>
                                    <div class="categories-text">
                                        <h4 data-id="{{$courseObj->subject->id}}" class="categories-title font-16 font-weight-bold text-dark-charcoal mb-5"><a href="/{{$courseObj->subject->slug}}/{{$categoryObj->slug}}">{{$courseObj->subject->getTitleAttribute()}}</a></h4>
                                        @if( isset( $subject_percentage['percentage'] ) && $subject_percentage['percentage'] > 0)
                                            <div class="levels-progress horizontal">
                                                <span class="progress-numbers">{{$subject_percentage['skills_attempted']}}/{{$subject_percentage['total_skils']}} Lessons</span>
                                                <span class="progress-box">
                                                    <span class="progress-count" style="width: {{$subject_percentage['percentage']}}%;"></span>
                                                </span>
                                            </div>
                                        @else
                                            <a href="/{{$courseObj->subject->slug}}/{{$categoryObj->slug}}" class="learning-btn font-14">Start Learning</a>
                                        @endif
                                        <span class="subject-info font-14">{{$courseObj->subject->chapters->count()}} Units and {{$courseObj->subject->webinar_sub_chapters->count()}} Lessons</span>
                                        <div class="levels-progress horizontal">
                                            <span class="progress-box">
                                                <span class="progress-count" style="width: 0%;"></span>
                                            </span>
                                            <span class="progress-numbers">0%</span>
                                        </div>
                                    </div>

                                </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
