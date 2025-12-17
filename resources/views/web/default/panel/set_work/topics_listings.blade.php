<div class="select-topics">
    <h3 class="font-24 mb-15">Select Topics</h3>
    <div class="selected-topics" id="selectedTopics">
        <span class="count selected-topics-count"><span>0</span> topics selected</span>
        <div class="chips selected-topics-chips">
        </div>
    </div>
    <!-- Top buttons -->
    <div class="top-actions">
        <button class="btn">Full exam curriculum</button>
        <button class="btn active">✓ All topics</button>
    </div>

    <!-- Subject filters -->
    <div class="subject-filters">
        <button class="chip parent-filters" data-id="all">All</button>
        @if(!empty( $parentData))
            @foreach( $parentData as $parentObj)
                <button class="chip parent-filters" data-id="{{isset($parentObj->id)? $parentObj->id : 0}}">{{isset($parentObj->title)? $parentObj->title : ''}}</button>
            @endforeach
        @endif

        <div class="select-holder">
            <select class="select">
                <option>All performance levels</option>
            </select>
        </div>
    </div>
    <div class="topics-table-holder lms-chapter-ul-outer table-sm">
        <table class="topics-table">
            <thead>
            <tr>
                <th>Select</th>
                <th>Topic</th>
                <th>Performance</th>
                <th>Last seen</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($listingData))
                @foreach($listingData as $listingObj)
                    @php $performance = isset($listingObj->performance)? $listingObj->performance : 0; @endphp
                    <tr class="listing-data-row" data-parent_id="{{isset($listingObj->parent_id)? $listingObj->parent_id : 0}}">
                        <td data-th="Select"><input type="checkbox" name="chapter_ids[]" value="{{isset($listingObj->id)? $listingObj->id : 0}}" class="topic-check topic-selection-check" data-topic="{{isset($listingObj->title)? $listingObj->title : '-'}}"></td>
                        <td data-th="Topic">{{isset($listingObj->title)? $listingObj->title : '-'}}</td>
                        <td data-th="Performance">
                            @if($performance > 0)
                                {{$performance}}
                                <div class="percent-holder">
                                    <div class="chapter_percent circle-blue" data-percent="{{$performance}}">
                                        <div class="circle_inner">
                                            <div class="round_per"></div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                Not enough data
                                <div class="percent-holder">
                                    <div class="chapter_percent circle-blue" data-percent="50">
                                        <div class="circle_inner">
                                            <div class="round_per"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td data-th="Last seen">
                            @if(isset($listingObj->last_attempt) && $listingObj->last_attempt > 0)
                                {{ dateTimeFormat($listingObj->last_attempt, 'j M Y') }}
                            @else
                                -
                            @endif
                            </td>
                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>
    </div>

</div>
