    <div class="staff-picks-tabs">
        <div class="mb-30 bg-white panel-border rounded-sm p-15">
            <div class="rureraform-search-field mb-15">
                <div class="input-field">
                    <input type="text" placeholder="Search question..">
                    <button type="button"><i class="fas fa-search"></i> <span>Search questions</span></button>
                </div>
                <div class="featured-controls">
                    <button type="button" class="active">Featured List</button>
                    <button type="button">Community</button>
                    <button type="button">My Collection</button>
                </div>
            </div>
            <div class="search-filters mb-0">
                <div class="select-field">
                    <span>By:</span>
                    <select>
                        <option value="All providers">All providers</option>
                        <option value="All providers">All providers</option>
                        <option value="All providers">All providers</option>
                    </select>
                </div>
                <div class="select-field">
                    <span>Capability:</span>
                    <select>
                        <option value="All providers">Embeddings</option>
                        <option value="All providers">Embeddings</option>
                        <option value="All providers">Embeddings</option>
                    </select>
                </div>
                <div class="select-field">
                    <span>Tag:</span>
                    <select>
                        <option value="All">All</option>
                        <option value="All">All</option>
                        <option value="All">All</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4 col-md-4">
                <div class="featured-list-sidebar">
                    <div class="featured-filters">
                        <div class="text-box">
                            <h6>Reported Oprations</h6>
                        </div>
                        <div class="select-field">
                            <select class="sub-chapters-list">
                                @if($sub_chapters->count() > 0)
                                    @php $counter_i = 1; @endphp
                                    @foreach($sub_chapters as $subChapterObj)
                                        @php $selected = ($counter_i == 1)? 'selected' : ''; @endphp
                                        <option value="{{$subChapterObj->id}}" {{$selected}}>{{isset($subChapterObj->sub_chapter_title )? $subChapterObj->sub_chapter_title : ''}}</option>
                                        @php $counter_i++; @endphp
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="featured-list-sidebar-inner">
                        @if($sub_chapters->count() > 0)
                            @foreach($sub_chapters as $subChapterObj)
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
                            @endforeach
                        @endif
                        <button class="load-more-btn"><i class="fas fa-plus"></i> Load More</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-8 topic-part-item-data"></div>
        </div>
    </div>

    <script>
        var ItemloaderDivMain = $(".topic-part-item-data");


        var topicPartItemDataRequest = null;
        $(document).on('click', '.topic-part-item-list', function () {
            $(".topic-part-item-list").removeClass('active');
            $(this).addClass('active');
            rurera_loader(ItemloaderDivMain, 'div');
            var topic_part_item_id = $(this).attr('data-id');
            topicPartItemDataRequest = $.ajax({
                type: "GET",
                url: '/admin/learning_journey/get_topic_part_item_layout',
                beforeSend: function () {
                    if (topicPartItemDataRequest != null) {
                        topicPartItemDataRequest.abort();
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'topic_part_item_id': topic_part_item_id},
                success: function (response) {
                    rurera_remove_loader(ItemloaderDivMain, 'button');
                    $(".topic-part-item-data").html(response);
                }
            });
        });

        var subChapterDataRequest = null;
        var subChapterDivMain = $(".featured-list-sidebar-inner");
        $(document).on('change', '.sub-chapters-list', function () {
            rurera_loader(subChapterDivMain, 'div');
            var sub_chapter_id = $(this).val();
            subChapterDataRequest = $.ajax({
                type: "GET",
                url: '/admin/learning_journey/get_topic_part_items_list',
                beforeSend: function () {
                    if (subChapterDataRequest != null) {
                        subChapterDataRequest.abort();
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'sub_chapter_id': sub_chapter_id},
                success: function (response) {
                    rurera_remove_loader(subChapterDivMain, 'button');
                    $(".featured-list-sidebar-inner").html(response);
                }
            });
        });


    </script>
