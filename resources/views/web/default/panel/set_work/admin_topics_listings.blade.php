<style>
    .range-container {
        display: flex;
        gap: 35px;
        align-items: center;
        margin: 0 auto;
        max-width: 430px;
        justify-content: center;
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
    .select-topics .topics-table {
        border-spacing: 0 20px;
        border-collapse: separate;
    }
    .listing-data-row.topic-row,
    .select-topics .topics-table tbody .listing-data-row.topic-row:hover {
        background-color: #f1f1f1;
    }
    .select-topics .topics-table td:first-child {
        border-left: 1px solid #eee;
    }
    .select-topics .topics-table td:last-child {
        border-right: 1px solid #eee;
    }
    .select-topics .topics-table th:first-child {
        padding-left: 0;
        width: 33.333%;
        border-radius: 0;
    }
    .select-topics .topics-table th:last-child {
        text-align: right !important;
        border-radius: 0;
    }
    .select-topics .topics-table .listing-data-row label {
        margin-bottom: 0;
    }
    .mock-exam-btn-holder {
        text-align: right;
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
    .mockExam-item-meta .badge.badge-success {
        background-color: #b9f9c7;
        color: #47c363;
    }
    .mockExam-item-meta span {
        line-height: normal;
        display: inline-block;
        font-size: .75rem;
        font-weight: 600;
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
        <table class="topics-table mt-0" id="mockExam-itemsList">
            <thead>
            <tr>
                <th>Title</th>
                <th>No of Questions</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php $is_have_records = true; @endphp
            @if(!empty( $parentData) && $is_have_records == true)
                @foreach( $parentData as $parentObj)
                    @php $listingDataArray = isset($listingData[$parentObj->id])? $listingData[$parentObj->id] : [];
                    @endphp
                    <tr class="listing-data-row topic-row" data-parent_id="{{isset($parentObj->id)? $parentObj->id : 0}}">
                        <td data-th="Topic" colspan="3"><b>{{isset($parentObj->title)? $parentObj->title : ''}}</b>

                        </td>
                    </tr>
                    @php $already_sections = array();

                    @endphp
                    @if(!empty($listingDataArray))
                        @foreach($listingDataArray as $listingObj)
                            @php
                                $smart_score = isset($listingObj->performance)? $listingObj->performance : 0;
                                $topic_part_data = isset($selected_parts[$listingObj->id])? $selected_parts[$listingObj->id] : array();
                            @endphp
                            <tr class="listing-data-row mock-exam-item-row" data-parent_id="{{isset($parentObj->id)? $parentObj->id : 0}}" data-mockexam-item-id="{{isset($listingObj->id)? $listingObj->id : 0}}" data-mockExam-item-title="{{isset($listingObj->title)? $listingObj->title : '-'}}">
                                <td data-th="Topic">
                                    <span class="breadcrumbs">{{isset($listingObj->bread_crumbs)? $listingObj->bread_crumbs : ''}}</span><br>
                                    <label  for="check_{{isset($listingObj->id)? $listingObj->id : 0}}">{{isset($listingObj->title)? $listingObj->title : '-'}}</label>
                                    <span>Questions: {{isset($listingObj->total_questions)? $listingObj->total_questions : 0}}</span>
                                    @if(!empty($topic_part_data))
                                        @php $section_id = isset($topic_part_data['section_id'])? $topic_part_data['section_id'] : 0;
                                        $section_name = isset($topic_part_data['section_name'])? $topic_part_data['section_name'] : '';
                                        $section_intro = isset($topic_part_data['section_intro'])? $topic_part_data['section_intro'] : '';
                                        $section_no_of_questions = isset($topic_part_data['section_no_of_questions'])? $topic_part_data['section_no_of_questions'] : 0;
                                        $section_time = isset($topic_part_data['section_time'])? $topic_part_data['section_time'] : 0;


                                            @endphp
                                        @if(!in_array($section_id, $already_sections))
                                            @php $already_sections[] = $section_id;  @endphp
                                            <script>
                                                var sectionId = '{{$section_id}}';

                                                if (!window.mockExam.state.sections.some(sec => sec.id == sectionId)) {
                                                    window.mockExam.state.sections.push({
                                                        id: sectionId,
                                                        name: '{{$section_name}}',
                                                        numQuestions: {{$section_no_of_questions}},
                                                        timeMins: {{$section_time}},
                                                        instructions: '{{$section_intro}}',
                                                        items: []
                                                    });
                                                }
                                            </script>
                                        @endif
                                        <script>
                                            window.mockExam.addItemToSection('{{isset($topic_part_data['section_id'])? $topic_part_data['section_id'] : 0}}', '{{$listingObj->id}}');
                                            //window.mockExam.refreshItemsUI();
                                        </script>
                                    @endif
                                    <div class="mock-exam-small-help mockExam-item-meta mt-10">


                                    </div>
                                </td>
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
                                                    value="{{isset($topic_part_data['min'])? $topic_part_data['min'] : 0}}"
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
                                                    value="{{isset($topic_part_data['max'])? $topic_part_data['max'] : 0}}"
                                                    placeholder="0"
                                                />
                                                <span class="unit-label">TO</span>
                                            </div>
                                        </div>

                                        <div class="range rurera-hide">
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
                                                    value="{{isset($topic_part_data['min'])? $topic_part_data['min'] : 0}}"
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
                                                    value="{{isset($topic_part_data['max'])? $topic_part_data['max'] : 0}}"
                                                    step="1"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                    aria-orientation="horizontal"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="mock-exam-btn-holder">
                                        <button type="button" class="btn btn-outline-primary mock-exam-icon-btn" data-mockexam-action="assign" title="Shortlist (assign to section)">+</button>
                                        <button type="button" class="btn btn-outline-danger mock-exam-icon-btn ml-2 mock-exam-btn-remove-main d-none" data-mockexam-action="unassign" title="Remove from section (unassign)">×</button>
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

<script>
    /**
     * window.mockExam
     * IMPORTANT: Item list is NOT rendered by JS. Items must exist in HTML.
     * JS reads items from DOM and only updates UI state (enable/disable, assigned badges, etc).
     */

    jQuery(function() {
        window.mockExam.init();
    });
</script>
