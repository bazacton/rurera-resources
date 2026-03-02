<div class="select-topics">
    <h3 class="font-16 font-weight-bold">Select Topics</h3>
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
                <select class="select performance-level-selection">
                    <option value="all">All performance levels</option>
                    <option value="Not Started">Not Started</option>
                    <option value="Practice Needed">Practice Needed</option>
                    <option value="Good">Good</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Excellent">Excellent</option>
                </select>
            </div>
        @endif
    </div>
    <div class="topics-table-holder lms-chapter-ul-outer table-sm panel-border bg-white rounded-sm">
        <table class="topics-table mt-0 test@@">
            <thead>
            <tr>
                <th>Topic</th>
                <th>Smart Score</th>
                <th>Last Activity</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($listingData))
                @foreach($listingData as $listingObj)
                    @php $smart_score = isset($listingObj->performance)? $listingObj->performance : 0;
                        $last_activity = isset($listingObj->last_activity)? $listingObj->last_activity : '-';
                        $completion_title = 'Not Started';
                        $completion_title = ($smart_score > 0)? 'Practice Needed' : $completion_title;
                        $completion_title = ($smart_score > 39)? 'Good' : $completion_title;
                        $completion_title = ($smart_score > 59)? 'Very Good' : $completion_title;
                        $completion_title = ($smart_score > 79)? 'Excellent' : $completion_title;
                    @endphp
                    <tr class="listing-data-row" data-level_type="{{$completion_title}}" data-parent_id="{{isset($listingObj->parent_id)? $listingObj->parent_id : 0}}">
                        <td data-th="Topic"> <input type="checkbox" id="check_{{isset($listingObj->id)? $listingObj->id : 0}}" name="chapter_ids[]" value="{{isset($listingObj->id)? $listingObj->id : 0}}" class="topic-check topic-selection-check" data-topic="{{isset($listingObj->title)? $listingObj->title : '-'}}"> <label  for="check_{{isset($listingObj->id)? $listingObj->id : 0}}">{{isset($listingObj->title)? $listingObj->title : '-'}}</label></td>
                        <td data-th="Performance">
                            @if($smart_score > 0)
                                {{$smart_score}}
                                <div class="percent-holder">
                                    <div class="chapter_percent circle-blue" data-percent="{{$smart_score}}">
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
                            @if(isset($last_activity) && $last_activity > 0)
                                {{ dateTimeFormat($last_activity, 'j M Y') }}
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
@push('scripts_bottom')
<script>
    function updateStickyOffset() {
        const selectedTopics = document.querySelector('.selected-topics');
        const root = document.documentElement;

        if (!selectedTopics) return;

        const height = selectedTopics.offsetHeight;
        root.style.setProperty('--sticky-offset', height + 'px');
    }

    // Wait until element exists
    const interval = setInterval(() => {
        if (document.querySelector('.selected-topics')) {
            updateStickyOffset();
            clearInterval(interval);
        }
    }, 200);

    window.addEventListener('resize', updateStickyOffset);
</script>
@endpush