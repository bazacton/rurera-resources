@php use App\Models\Category; @endphp
@php
$sub_chapter_id  = isset( $sub_chapter_id )? $sub_chapter_id : 0;
$chapter  = isset( $chapter )? $chapter : '';
@endphp

<li data-id="{{ !empty($chapterItem) ? $chapterItem->id :'' }}"
    class="sub-chapter-parent accordion-row bg-white rounded-sm border border-gray300 mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab"
         id="quiz_{{ !empty($subChapterInfo) ? $subChapterInfo->id :'record' }}">
        <div class="d-flex align-items-center"
             href="#collapseQuiz{{ !empty($subChapterInfo) ? $subChapterInfo->id :'record' }}"
             aria-controls="collapseQuiz{{ !empty($subChapterInfo) ? $subChapterInfo->id :'record' }}"
             data-parent="#{{ !empty($chapter) ? 'chapterContentAccordion'.$chapter->id : 'quizzesAccordion' }}"
             role="button" data-toggle="collapse" aria-expanded="true">
            <span class="chapter-icon chapter-content-icon mr-10">
                <i data-feather="bookmark" class=""></i>
            </span>
            @php $part_items_count = isset($subChapterInfo->id)? $subChapterInfo->topicParts->count() : 0; @endphp
            <span class="font-weight-bold text-dark-blue d-block cursor-pointer">
                {{ !empty($subChapterInfo) ? $subChapterInfo->sub_chapter_title : trans('public.add_new_quizzes') }}
                @if($part_items_count == 0)
                    <span class="subtopic-parts-block"><a href="javascript:;" class="generate-subtopic-part" data-sub_chapter_id="{{isset($subChapterInfo->id)? $subChapterInfo->id : 0}}">Generate</a></span>
                @else
                    <span class="subtopic-parts-block"><img src="/assets/default/img/tick-white.png"></span>
                @endif
            </span>


            @if(isset($subChapterInfo->id))

                @php $year_ids = isset($webinar->category_id)? json_decode($webinar->category_id) : array(); @endphp

                @if(!empty($year_ids))
                    Topic Part Items: <br>
                    @foreach($year_ids as $year_id)
                        @php $categoryObj = Category::find($year_id); @endphp
                        @php $subChapterTopicParts = $subChapterInfo->topicParts()->where('category_id', $year_id)->get(); @endphp
                        @if(!empty($subChapterTopicParts))
                            @foreach($subChapterTopicParts as $subChapterTopicPartObj)
                                {{$categoryObj->getTitleAttribute()}}: {{$subChapterTopicPartObj->topicSubParts->count()}}<br>

                            @endforeach
                        @endif

                    @endforeach
                @endif
            @endif
        </div>

        <div class="d-flex align-items-center">

            @if(!empty($subChapterInfo) and $subChapterInfo->status != \App\Models\WebinarChapter::$chapterActive)
            <span class="disabled-content-badge mr-10">{{ trans('public.disabled') }}</span>
            @endif

            <div class="btn-group dropdown table-actions rurera-hide">
                <button type="button" class="add-course-content-btn mr-10 dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <i data-feather="plus" class=""></i>
                </button>
                <div class="dropdown-menu ">
                    <button type="button" class="js-add-course-content-btn d-block mb-10 btn-transparent"
                            data-webinar-id="{{ $webinar->id }}" data-subchapter_id="{{ !empty($subChapterInfo) ? $subChapterInfo->id :'0' }}" data-type="quiz"
                            data-chapter="{{ !empty($chapter) ? $chapter->id :'' }}">
                        {{ trans('public.add_quiz') }}
                    </button>
                </div>
            </div>

            @if(!empty($chapter))
            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>
            @endif

            @if(!empty($subChapterInfo))
            @php

            $sub_chapter_items = get_subchapter_items($subChapterInfo->id);
            $delete_action = ($sub_chapter_items > 0)? 'nopermit-del' : 'delete-action';

            @endphp

            <a href="/admin/webinars/{{ $subChapterInfo->id }}/delete_sub_chapter" data-total="{{$sub_chapter_items}}"
               class="{{$delete_action}} 22 btn btn-sm btn-transparent text-gray">
                <i data-feather="trash-2" class="mr-10 cursor-pointer" height="20"></i>
            </a>
            @endif

            <!-- <i class="collapse-chevron-icon" data-feather="chevron-down" height="20"
               href="#collapseQuiz{{ !empty($subChapterInfo) ? $subChapterInfo->id :'record' }}"
               aria-controls="collapseQuiz{{ !empty($subChapterInfo) ? $subChapterInfo->id :'record' }}"
               data-parent="#chapterContentAccordion{{ !empty($chapter) ? $chapter->id :'' }}" role="button"
               data-toggle="collapse" aria-expanded="true"></i> -->
            <button type="button" class="sub-topic-modal-btn test@@" data-toggle="modal" data-target="#exampleModalCenter">
                <i data-feather="edit-3" class="cursor-pointer" height="20"></i>
            </button>
        </div>
    </div>




    <div class="modal sub-topic-modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

            <div class="modal-body">
                <div id="collapseQuiz{{ !empty($subChapterInfo) ? $subChapterInfo->id :'record' }}"
                    aria-labelledby="quiz_{{ !empty($subChapterInfo) ? $subChapterInfo->id :'record' }}"
                    class=" @if(empty($subChapterInfo)) @endif" role="tabpanel">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="panel-collapse text-gray">
                        @include('admin.quizzes.create_sub_chapter_form',
                        [
                        'inWebinarPage' => true,
                        'selectedWebinar' => $webinar,
                        'subChapter' => $subChapterInfo ?? null,
                        'quizQuestions' => !empty($subChapterInfo) ? $subChapterInfo->quizQuestions : [],
                        'chapters' => $webinar->chapters,
                        'webinarChapterPages' => !empty($webinarChapterPages),
                        'creator' => $webinar->creator
                        ]
                        )
                        <div class="form-group mt-2 d-flex align-items-center justify-content-between js-switch-parent rurera-hide">
                            <label class="js-switch cursor-pointer" for="chapterStatus_441">Active</label>
                            <div class="custom-control custom-switch">
                                <input id="chapterStatus_441" type="checkbox" name="ajax[chapter][status]" class="custom-control-input js-chapter-status-switch">
                                <label class="custom-control-label" for="chapterStatus_441"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>


</li>


@if($sub_chapter_id > 0 && isset( $sub_chapter_lessions[$sub_chapter_id] ) && !empty( $sub_chapter_lessions[$sub_chapter_id] ))
@foreach($sub_chapter_lessions[$sub_chapter_id] as $chapterItemsArray)
@include('admin.webinars.create_includes.accordions.text-lesson' ,['textLesson' => $chapterItemsArray , 'chapter' => $chapter, 'chapterItem' => $chapterItemsArray])
@endforeach
@endif
@if($sub_chapter_id > 0 && isset( $sub_chapter_questions[$sub_chapter_id] ) && !empty( $sub_chapter_questions[$sub_chapter_id] ))
@foreach($sub_chapter_questions[$sub_chapter_id] as $chapter_item_id => $chapterItemsArray)
@include('admin.webinars.create_includes.accordions.quiz' ,['quizInfo' => $chapterItemsArray , 'chapter' => $chapter, 'subChapterItem' => $chapterItem, 'chapterItem' => $chapterItemsArray,
'chapter_item_id' => $chapter_item_id])
@endforeach
@endif
