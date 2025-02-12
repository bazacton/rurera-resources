@if($subChapterObj->TopicPartsItems->count() > 0)
    @foreach($subChapterObj->TopicPartsItems as $topicPartItemObj)
        <div class="listing-card mb-15 bg-white panel-border rounded-sm topic-part-item-list" data-id="{{$topicPartItemObj->id}}">
            <a href="javascript:;" class="listing-card-link">
                <div class="img-holder">
                    <figure>
                        <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                    </figure>
                </div>
                <div class="text-holder">
                    <h3>{{$topicPartItemObj->title}}</h3>
                    <div class="author-info">
                        <span class="info-text">
                            <span>{{$topicPartItemObj->user->get_full_name()}}</span>
                            <span>2 hours ago</span>
                        </span>
                    </div>
                </div>
                <ul class="list-options">

                    <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt=""></span> 0 questions</li>
                    <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt=""></span> {{$topicPartItemObj->category->getTitleAttribute()}}</li>
                    <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt=""></span> {{$topicPartItemObj->subject->getTitleAttribute()}}</li>
                </ul>
            </a>
        </div>
    @endforeach
@endif
