<div class="select-topics">
    <h3 class="font-24 mb-15">Select Topics</h3>
    <div class="selected-topics rurera-hide" id="selectedTopics">
        <span class="count selected-topics-count"><span>0</span> topics selected</span>
        <div class="chips selected-topics-chips">
        </div>
    </div>
    <!-- Top buttons -->


    <!-- Subject filters -->
    <div class="subject-filters">

        @if(!empty( $parentData))
            <button class="chip parent-filters active" data-id="all"><span class="active-tick">✓</span> All</button>
            @foreach( $parentData as $parentObj)
                <button type="button" class="chip parent-filters" data-id="{{isset($parentObj->id)? $parentObj->id : 0}}">{{isset($parentObj->title)? $parentObj->title : ''}}</button>
            @endforeach
        @endif

        @if(!empty( $parentData))
            <div class="select-holder">
                <select class="select">
                    <option>All performance levels</option>
                </select>
            </div>
        @endif
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
            @else
                <tr class="listing-data-row" data-parent_id="{{isset($listingObj->parent_id)? $listingObj->parent_id : 0}}">
                    <td colspan="4">
                        @include('web.default.default.list_no_record')
                    </td>
                </tr>
            @endif


            </tbody>
        </table>
    </div>

</div>
