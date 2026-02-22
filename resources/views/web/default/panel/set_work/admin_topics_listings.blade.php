<div class="select-topics col-md-12 col-lg-12 ">
    <h3 class="font-16 font-weight-bold">Select Topics</h3>
    <div class="selected-topics rurera-hide" id="selectedTopics">
        <span class="count selected-topics-count"><span>0</span> topics selected</span>
        <div class="chips selected-topics-chips">
        </div>
    </div>
    <!-- Top buttons -->


    <!-- Subject filters -->
    <div class="subject-filters col-md-12 col-lg-12 ">

        @if(!empty( $parentData))
            <button type="button" class="chip parent-filters active" data-id="all"><span class="active-tick">✓</span> All</button>
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
    <div class="topics-table-holder lms-chapter-ul-outer table-sm panel-border bg-white rounded-sm col-md-12 col-lg-12 ">
        <table class="topics-table mt-0 col-md-12 col-lg-12 ">
            <thead>
            <tr>
                <th>Title</th>
                <th>No of Questions</th>
            </tr>
            </thead>
            <tbody>
            @php $is_have_records = true; @endphp
            @if(!empty( $parentData) && $is_have_records == true)
                @foreach( $parentData as $parentObj)
                @php $listingDataArray = isset($listingData[$parentObj->id])? $listingData[$parentObj->id] : [];
                @endphp
                <tr class="listing-data-row" data-parent_id="{{isset($parentObj->id)? $parentObj->id : 0}}">
                    <td data-th="Topic" colspan="3"><b>{{isset($parentObj->title)? $parentObj->title : ''}}</b></td>
                </tr>
                @if(!empty($listingDataArray))
                    @foreach($listingDataArray as $listingObj)
                        @php $smart_score = isset($listingObj->performance)? $listingObj->performance : 0;
                        @endphp
                        <tr class="listing-data-row" data-parent_id="{{isset($parentObj->id)? $parentObj->id : 0}}">
                            <td data-th="Topic"> {{$parentObj->id}} <label  for="check_{{isset($listingObj->id)? $listingObj->id : 0}}">{{isset($listingObj->title)? $listingObj->title : '-'}}</label></td>
                            <td><input class="form-control rurera-range-selector mock_practice_questions" type="text" readonly name="mock_practice_questions[{{$listingObj->id}}]" id="topics_parts-{{$listingObj->id}}" value="0">
                            </td>
                        </tr>
                    @endforeach
                @endif
                @endforeach
            @else
                <tr class="listing-data-row">
                    <td colspan="4">
                        @include('web.default.default.list_no_record')
                    </td>
                </tr>
            @endif

            </tbody>
        </table>
    </div>

</div>
