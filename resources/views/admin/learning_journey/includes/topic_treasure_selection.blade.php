    <div class="staff-picks-tabs">
        <div class="mb-30 bg-white panel-border rounded-sm p-15">
            <div class="rureraform-search-field mb-15">
                <div class="input-field">
                    <input type="text" class="conditional-block topics_block" placeholder="Search question..">
                    <button type="button" class="conditional-block topics_block"><i class="fas fa-search"></i> <span>Search questions</span></button>
                </div>
                <div class="add-object-type-list featured-controls">
                    <button type="button" data-type="topics" class="active">Topics</button>
                    <button type="button" data-type="custom_topics">Custom Topics</button>
                    <button type="button" data-type="treasures">Treasures</button>
                </div>
            </div>
            <div class="search-filters mb-0 conditional-block topics_block">
                <div class="select-field">
                    <span>Year:</span>


                    <select name="category_id" data-plugin-selectTwo class="rurera-req-field form-control populate ajax-category-courses" data-course_id="" data-next_index="subject_id" data-next_value="">
                        <option value="">{{trans('admin/main.all_categories')}}</option>
                        @foreach($categories as $category)
                            @if(!empty($category->subCategories) and count($category->subCategories))
                                <optgroup label="{{  $category->title }}">
                                    @foreach($category->subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->title }}</option>
                                    @endforeach
                                </optgroup>
                            @else
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="select-field">
                    <span>Subject:</span>
                    <select data-chapter_id="" id="subject_id"
                            class="rurera-req-field form-control populate ajax-courses-dropdown year_subjects @error('subject_id') is-invalid @enderror"
                            name="subject_id" data-next_index="chapter_id" data-next_value="">
                        <option value="">Please select year, subject</option>
                    </select>
                </div>

                <div class="select-field">
                    <span>Topic:</span>
                    <select data-sub_chapter_id="" id="chapter_id"
                            class="rurera-req-field form-control populate ajax-chapter-dropdown @error('chapter_id') is-invalid @enderror"
                            name="chapter_id" data-disabled="{{isset($already_created_bulk_lists)? json_encode($already_created_bulk_lists) : ''}}" data-next_index="sub_chapter_id" data-next_value="">
                        <option value="">Please select year, subject</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row conditional-block topics_block">
            <div class="col-12 col-lg-4 col-md-4">
                <div class="featured-list-sidebar">
                    <div class="featured-filters">
                        <div class="text-box">
                            <h6>Reported Oprations</h6>
                        </div>
                        <div class="select-field">

                            <select id="sub_chapter_id"
                                    class="sub-chapters-list rurera-req-field form-control populate ajax-subchapter-dropdown @error('sub_chapter_id') is-invalid @enderror"
                                    name="sub_chapter_id" data-next_index="topic_part" data-next_value="">
                                <option value="">Please select year, subject, Topic</option>
                            </select>

                        </div>
                    </div>
                    <div class="featured-list-sidebar-inner sub-chapters-list-data">

                        <button class="load-more-btn"><i class="fas fa-plus"></i> Load More</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-8 topic-part-item-data"></div>
        </div>
        <div class="row conditional-block rurera-hide custom_topics_block">
            <div class="col-12 col-lg-4 col-md-4">
                <div class="featured-list-sidebar">
                    <div class="featured-filters">
                        <div class="text-box">
                            <h6>Custom Topics</h6>
                        </div>
                        <div class="select-field">
                            <select class="custom-sub-chapters-list">
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
                    <div class="featured-list-sidebar-inner custom-sub-chapters-list-data">
                        @if($custom_quizzes->count() > 0)
                            @foreach($custom_quizzes as $quizObj)
                                <div class="listing-card mb-15 bg-white panel-border rounded-sm custom-topic-part-item-list" data-id="{{$quizObj->id}}">
                                    <a href="javascript:;" class="listing-card-link">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3>{{$quizObj->getTitleAttribute()}}</h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>{{$quizObj->creator->get_full_name()}}</span>
                                                    <span>2 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">

                                            <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt=""></span> 0 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt=""></span> {{$quizObj->quizYear->getTitleAttribute()}}</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt=""></span> {{$quizObj->subject_id}}</li>
                                        </ul>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                        <button class="load-more-btn"><i class="fas fa-plus"></i> Load More</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-8 custom-topic-part-item-data"></div>
        </div>
        <div class="row conditional-block rurera-hide treasures_block">
            <div class="col-12 col-lg-12 col-md-12 years-group populated-data">

                <div class="form-group">
                    <div class="input-group">
                        <div class="radio-buttons">
                            <label class="card-radio">
                                <input type="radio" name="treasure_count" class="treasure_selection" value="500" checked>
                                <span class="radio-btn"><i class="las la-check"></i>
                                        <div class="card-icon">
                                            <img src="/assets/default/img/treasure.png">
                                            <h3>500</h3>
                                       </div>
                                  </span>
                            </label>
                            <label class="card-radio">
                                <input type="radio" name="treasure_count" class="treasure_selection" value="400">
                                <span class="radio-btn"><i class="las la-check"></i>
                                        <div class="card-icon">
                                            <img src="/assets/default/img/treasure.png">
                                            <h3>400</h3>
                                       </div>
                                  </span>
                            </label>
                            <label class="card-radio">
                                <input type="radio" name="treasure_count" class="treasure_selection" value="300">
                                <span class="radio-btn"><i class="las la-check"></i>
                                        <div class="card-icon">
                                            <img src="/assets/default/img/treasure.png">
                                            <h3>300</h3>
                                       </div>
                                  </span>
                            </label>
                            <label class="card-radio">
                                <input type="radio" name="treasure_count" class="treasure_selection" value="200">
                                <span class="radio-btn"><i class="las la-check"></i>
                                        <div class="card-icon">
                                            <img src="/assets/default/img/treasure.png">
                                            <h3>200</h3>
                                       </div>
                                  </span>
                            </label>
                            <label class="card-radio">
                                <input type="radio" name="treasure_count" class="treasure_selection" value="100">
                                <span class="radio-btn"><i class="las la-check"></i>
                                        <div class="card-icon">
                                            <img src="/assets/default/img/treasure.png">
                                            <h3>100</h3>
                                       </div>
                                  </span>
                            </label>

                            <label class="card-radio">
                                <input type="radio" name="treasure_count" class="treasure_selection" value="custom">
                                <span class="radio-btn"><i class="las la-check"></i>
                                        <div class="card-icon">
                                            <img src="/assets/default/img/treasure.png">
                                            <h3>Custom</h3>
                                       </div>
                                  </span>
                            </label>
                        </div>
                    </div>
                    <div class="input-group custom_treasure_field rurera-hide">
                        <input type="text" name="custom_treasure" class="form-control custom_treasure_field_data" value="0">
                    </div>
                </div>
                <button type="button" class="add-level-stage-treasure-btn">Add Treasure</button>
            </div>
            <div class="col-12 col-lg-8 col-md-8 topic-part-item-data"></div>
        </div>
    </div>

    <script>



        $(document).on('change', '.treasure_selection', function () {
            var current_value = $(this).val();
            $(".custom_treasure_field").addClass('rurera-hide');
            if(current_value == 'custom'){
                $(".custom_treasure_field").removeClass('rurera-hide');
            }
        })
        $(document).on('click', '.add-object-type-list button', function () {

        $(".add-object-type-list button").removeClass('active');
            $(this).addClass('active');
            var selected_type = $(this).attr('data-type');
            $(".conditional-block").addClass('rurera-hide');
            $("."+selected_type+'_block').removeClass('rurera-hide');
        });
        var ItemloaderDivMain = $(".topic-part-item-data");
        var CustomItemloaderDivMain = $(".custom-topic-part-item-data");


        var topicPartItemDataRequest = null;
        $(document).on('click', '.topic-part-item-list', function () {
            //$(".topic-part-item-list").removeClass('active');
            //$(this).addClass('active');
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

        $(document).on('click', '.custom-topic-part-item-list', function () {
            $(".topic-part-item-list").removeClass('active');
            $(this).addClass('active');
            rurera_loader(CustomItemloaderDivMain, 'div');
            var quiz_id = $(this).attr('data-id');
            topicPartItemDataRequest = $.ajax({
                type: "GET",
                url: '/admin/learning_journey/get_custom_topic_part_item_layout',
                beforeSend: function () {
                    if (topicPartItemDataRequest != null) {
                        topicPartItemDataRequest.abort();
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'quiz_id': quiz_id},
                success: function (response) {
                    rurera_remove_loader(CustomItemloaderDivMain, 'button');
                    $(".custom-topic-part-item-data").html(response);
                }
            });
        });

        var subChapterDataRequest = null;
        var subChapterDivMain = $(".sub-chapters-list-data");
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
                    $(".sub-chapters-list-data").html(response);

                    $.each(alreadyAddedTopics, function(index, selected_topic_id) {
                        $('.add-level-stage-topic-btn[data-id="'+selected_topic_id+'"]').addClass('topic-added');
                        $('.add-level-stage-topic-btn[data-id="'+selected_topic_id+'"]').closest('.topic-part-item-list').addClass('active');

                    });


                }
            });
        });

        var subChapterDivMain = $(".custom-sub-chapters-list-data");
        $(document).on('change', '.custom-sub-chapters-list', function () {
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
                    $(".custom-sub-chapters-list-data").html(response);
                }
            });
        });


    </script>
