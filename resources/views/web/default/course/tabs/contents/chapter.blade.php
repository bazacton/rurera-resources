<div class="row">
    <div class="col-12 lms-chapter-area">
        <div class="chapter-nav">
            <ul>
             <li><a href="#" class="font-14 font-weight-500">Subjects</a></li>
             <li><a href="#" class="font-14 font-weight-500">Scince</a></li>
             <li><a href="#" class="font-14 font-weight-500">History</a></li>
             <li><a href="#" class="font-14 font-weight-500">Geography</a></li>
             <li><a href="#" class="font-14 font-weight-500">Maths</a></li>
             <li><a href="#" class="font-14 font-weight-500">English</a></li>
             <li><a href="#" class="font-14 font-weight-500">Art</a></li>
             <li><a href="#" class="font-14 font-weight-500">Language</a></li>
             <li><a href="#" class="font-14 font-weight-500">Design and technology</a></li>
             <li><a href="#" class="font-14 font-weight-500">PE</a></li>
             <li><a href="#" class="font-14 font-weight-500">Music</a></li>
             <li><a href="#" class="font-14 font-weight-500">Computing</a></li>
            </ul> 
         </div>
        <div class="accordion-content-wrapper" id="chaptersAccordion" role="tablist" aria-multiselectable="true">


            <div class="mastery-banner-card">
                <div class="mastery-text">
                    <strong>Mastery Chellenge</strong>
                    <p>Strengthen skills you've already practiced in <br /> just 6 questions</p>
                    <a href="#">Get started</a>
                </div>
            </div>

            <ul class="lms-chapter-ul">
                @foreach($course->chapters as $chapter)

                @if((!empty($chapter->chapterItems) and count($chapter->chapterItems)) or (!empty($chapter->quizzes) and count($chapter->quizzes)))
                <li><div class="lms-chapter-title"><strong>{{ $chapter->title }}</strong><span>1400/1400 Mastery Points</span></div>

                    @if(!empty($sub_chapters[$chapter->id]) and count($sub_chapters[$chapter->id]))
                    <ul>
                        @foreach($sub_chapters[$chapter->id] as $sub_chapter)
                        @if(!empty($sub_chapter))
                            <li><a href="/course/learning/{{$course->slug}}?webinar={{$chapter->id}}&chapter={{$sub_chapter['id']}}">{{ $sub_chapter['title'] }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
