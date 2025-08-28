<input type="hidden" name="field_name" class="field_name" value="topic_ids[]">
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="form-group">
        <label class="input-label">Subject</label>
        <div class="input-group">
            <div class="radio-buttons">
                @if($subjectsList->count() > 0)
                    @foreach($subjectsList as $classSubjectObj)
                        @php $subjectObj = $classSubjectObj->subject; @endphp
                        <label class="card-radio">
                            <input type="radio" name="subject_id" class="subject_id rurera-ajax-submission" value="{{$subjectObj->id}}" data-target_class="subject_topics_list" data-passing_vars="[subject_id,field_name]" data-passing_data="" data-ajax_url="/admin/common/topics_subtopics_by_subject">
                            <span class="radio-btn"><i class="las la-check"></i>
                                <div class="card-icon">
                                    <h3>{{$subjectObj->getTitleAttribute()}}</h3>
                               </div>
                            </span>
                        </label>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
<div class="subject_topics_list"></div>
<div class="rurera-timeline timeline-container rurera-hide">
    <input type="range" name="timeline_date" id="dateRange" min="0" value="0">
    <div class="date-label" id="dateLabel"></div>
</div>

<script>
    const startDate = new Date("2025-01-01");
    const endDate = new Date(); // current date
    const range = document.getElementById("dateRange");
    const dateLabel = document.getElementById("dateLabel");

    // Calculate total days between start and end
    const totalDays = Math.floor((endDate - startDate) / (1000 * 60 * 60 * 24));
    range.max = totalDays;

    // Function to format date
    function formatDate(date) {
        const options = { day: "numeric", month: "long", year: "numeric" };
        return date.toLocaleDateString("en-US", options);
    }

    // Update label on input
    range.addEventListener("input", () => {
        const daysFromStart = parseInt(range.value, 10);
        const currentDate = new Date(startDate);
        currentDate.setDate(startDate.getDate() + daysFromStart);
        dateLabel.textContent = formatDate(currentDate);
    });

    // Initialize with start date
    range.value = totalDays;
    range.dispatchEvent(new Event("input"));
</script>
