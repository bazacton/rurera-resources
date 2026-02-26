<style>
    .range-container {
        display: flex;
        gap: 35px;
        align-items: center;
        margin: 0;
        max-width: 430px;
        margin-left: auto;
    }
    .range-container .input-group {
        display: flex;
        gap: 0;
        background: #D1D2E8;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
        max-width: 250px;
    }
    .range-container .input-wrapper {
        position: relative;
        flex: 1;
    }
    .range-container .input-group::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 1px;
        background: rgba(0,0,0,.1);
        transform: translateX(-50%);
    }
    .range-container .range-input-text {
        width: 100px;
        height: 34px;
        border: none;
        background: transparent;
        text-align: left;
        color: #1D1E27;
        outline: none;
        padding: 0 15px 0 10px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
    .range-container .range-input-text::placeholder {
        color: #666;
    }
    .range-container .unit-label {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: .800rem;
        color: #666;
        font-weight: 300;
        pointer-events: none;
        right: 10px;
    }
    .range-container .range {
        position: relative;
        max-width: 400px;
        width: 110px;
    }
    .range-container .range-input {
        width: 100%;
        height: 10px;
        grid-area: 1 / 1;
        border-radius: 10px;
        appearance: none;
        background: none;
        pointer-events: none;
    }
    .listing-data-row.topic-row,
    .select-topics .topics-table tbody .listing-data-row.topic-row:hover {
        background-color: #f1f1f1;
    }
    .select-topics .topics-table th,
    .select-topics .topics-table td {
        padding: 10px 10px;
    }
    .select-topics .topics-table th:first-child {
        padding-left: 0;
    }
    .select-topics .topics-table .listing-data-row label {
        margin-bottom: 0;
    }
    /* Range Slider Style Start */
    .thumbs {
        display: flex;
        position: relative;
        width: 100%;
        min-height: 35px;
        align-items: center;
    }
    .thumbs .range-input {
        -webkit-appearance: none;
        width: 100%;
        height: 4px;
        border-radius: 4px;
        outline: none;
        background: #e5e5e5;
        position: absolute;
        pointer-events: none;
        padding: 0;
    }
    .thumbs .range-input#range-max-value {
        left: 40px;
    }
    .thumbs .range-input::-webkit-slider-runnable-track {
        height: 4px;
        border-radius: 4px;
    }
    .thumbs .range-input::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fff;
        border: 3px solid #4f6df5;
        cursor: pointer;
        margin-top: -14px;
        pointer-events: auto;
        position: relative;
        z-index: 2;
    }
    .thumbs .range-input::-moz-range-track {
        height: 4px;
        background: #e5e5e5;
        border-radius: 4px;
    }
    .thumbs .range-input::-moz-range-thumb {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fff;
        border: 3px solid #4f6df5;
        cursor: pointer;
        pointer-events: auto;
    }
    /* Range Slider Style End */
    .range-container .track {
        position: absolute;
        top: var(--range-track-top);
        width: 100%;
        height: 8px;
        border-radius: 10px;
        background-color: #ababab;
        z-index: -1;
    }
    .progress {
        position: absolute;
        top: var(--range-track-top);
        left: var(--range-progress-left);
        width: var(--range-progress-w);
        height: 8px;
        border-radius: 10px;
        background-color: white;
        z-index: -1;
    }
</style>
<div class="select-topics backend-topic-selection">
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
            <button type="button" class="chip parent-filters active" data-id="all"><span class="active-tick">✓</span> All</button>
            @foreach( $parentData as $parentObj)
                <button type="button" class="chip parent-filters" data-id="{{isset($parentObj->id)? $parentObj->id : 0}}">{{isset($parentObj->title)? $parentObj->title : ''}}</button>
            @endforeach
        @endif
    </div>
    <div class="topics-table-holder lms-chapter-ul-outer table-sm panel-border bg-white rounded-sm">
        <table class="topics-table mt-0">
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
                    <tr class="listing-data-row topic-row" data-parent_id="{{isset($parentObj->id)? $parentObj->id : 0}}">
                        <td data-th="Topic" colspan="3"><b>{{isset($parentObj->title)? $parentObj->title : ''}}</b></td>
                    </tr>
                    @if(!empty($listingDataArray))
                        @foreach($listingDataArray as $listingObj)
                            @php $smart_score = isset($listingObj->performance)? $listingObj->performance : 0;
                            @endphp
                            <tr class="listing-data-row" data-parent_id="{{isset($parentObj->id)? $parentObj->id : 0}}">
                                <td data-th="Topic"> <label  for="check_{{isset($listingObj->id)? $listingObj->id : 0}}">{{isset($listingObj->title)? $listingObj->title : '-'}}</label></td>
                                <td>

                                    <div class="range-container">
                                        <div class="input-group">
                                            <div class="input-wrapper">
                                                <input
                                                        type="text"
                                                        class="range-input-text"
                                                        id="input-min-value"
                                                        pattern="[0-9]*"
                                                        inputmode="numeric"
                                                        value="0"
                                                        placeholder="0"
                                                />
                                                <span class="unit-label">FROM</span>
                                            </div>
                                            <div class="input-wrapper">
                                                <input
                                                        type="text"
                                                        class="range-input-text"
                                                        id="input-max-value"
                                                        pattern="[0-9]*"
                                                        inputmode="numeric"
                                                        value="0"
                                                        placeholder="0"
                                                />
                                                <span class="unit-label">TO</span>
                                            </div>
                                        </div>

                                        <div class="range">
                                            <div class="track"></div>
                                            <div class="progress"></div>
                                            <div class="thumbs">
                                                <input
                                                        class="range-input"
                                                        id="range-min-value"
                                                        name="mock_practice_questions[{{$listingObj->id}}][min]"
                                                        type="range"
                                                        min="0"
                                                        max="100"
                                                        value="0"
                                                        step="1"
                                                        aria-valuemin="0"
                                                        aria-valuemax="100"
                                                        aria-orientation="horizontal"
                                                />

                                                <input
                                                        class="range-input"
                                                        id="range-max-value"
                                                        name="mock_practice_questions[{{$listingObj->id}}][max]"
                                                        type="range"
                                                        min="0"
                                                        max="100"
                                                        value="0"
                                                        step="1"
                                                        aria-valuemin="0"
                                                        aria-valuemax="100"
                                                        aria-orientation="horizontal"
                                                />
                                            </div>
                                        </div>
                                    </div>

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

