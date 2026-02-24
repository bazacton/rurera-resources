<style>

    .range-container {
        display: flex;
        flex-direction: column;
        gap: 30px;
        align-items: center;
    }

    .range-container .input-group {
        display: flex;
        gap: 0;
        background: #D1D2E8;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
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
        background: #333;
        transform: translateX(-50%);
    }

    .range-container .range-input-text {
        width: 180px;
        height: 50px;
        border: none;
        background: transparent;
        font-size: 18px;
        font-weight: 700;
        text-align: center;
        color: #1D1E27;
        outline: none;
        padding: 0 10px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .range-container .range-input-text::-webkit-outer-spin-button,
    .range-container .range-input-text::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .range-container .range-input-text::placeholder {
        color: #666;
    }

    .range-container .unit-label {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
        color: #666;
        font-weight: 300;
        pointer-events: none;
        right: 10px;
    }

    .range-container .thumbs {
        display: grid;
    }

    .range-container .range {
        --range-track-top: 10px;
        --min-thumb-percent: 0;
        --max-thumb-percent: 75;
        --range-progress-w: calc(
            (var(--max-thumb-percent) - var(--min-thumb-percent)) * 1%
        );
        --range-progress-left: calc(var(--min-thumb-percent) * 1%);

        position: relative;
        display: grid;
        width: 400px;
    }

    .range-container .range-input {
        width: 100%;
        height: 30px;
        grid-area: 1 / 1;
        border-radius: 10px;
        appearance: none;
        background: none;
        pointer-events: none;
    }
    /*Range Slider Style Start*/
    .range {position: relative; width: 100%;	height: auto; min-height: 80px;}
    .range-container .range-input {width: 100%; position: absolute; top: 50%; z-index: 3; transform: translateY(-50%); -webkit-appearance: none; appearance: none; width: 100%; height: 4px; opacity: 0; margin: 0; }
    .range-container .range-input::-webkit-slider-thumb {-webkit-appearance: none; appearance: none; width: 60px; height: 60px; cursor: pointer; border-radius: 50%;opacity: 0;}
    .range-container .range-input::-moz-range-thumb {width: 60px; height: 60px;cursor: pointer; border-radius: 50%; opacity: 0;}
    .range-slider_thumb {width: 50px; height: 50px;	border: 3px solid var(--primary);	border-radius: 50%;	position: absolute;	left: 0; top: 50%; transform: translateY(-50%);	background-color: #f4f4f4;	display: flex;justify-content: center;align-items: center;font-weight: 700;font-size: 14px;color: var(--primary);z-index: 2; margin-left: 2px;}
    .range-slider_line {height: 0.5vmin; width: 99.777%; background-color: #e1e1e1; top: 50%; transform: translateY(-50%); left: 0; position: absolute; z-index: 1;}
    .range-slider_line-fill {position: absolute;height: 0.5vmin;width: 0;background-color: var(--primary);}
    /*Range Slider Style End*/
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
<div class="select-topics col-md-12 col-lg-12 ">
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
