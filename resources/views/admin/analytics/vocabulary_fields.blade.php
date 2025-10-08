<div class="rurera-timeline timeline-container">
    <input type="range" name="timeline_date" id="dateRange" min="0" value="0">
    <div class="date-label" id="dateLabel"></div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="row form-group col-lg-12 col-md-12 col-sm-12 col-12">
        @if($vocabulary_list->count() > 0)
            @foreach( $vocabulary_list as $vocabularyObj)
                <div class="form-check mt-1 col-lg-4 col-md-4 col-sm-4 col-4">
                    <input type="checkbox" name="spell_ids[]" id="spell_{{$vocabularyObj->id}}" value="{{$vocabularyObj->id}}" class="form-check-input">
                    <label class="form-check-label cursor-pointer mt-0" for="spell_{{$vocabularyObj->id}}">
                        {{$vocabularyObj->getTitleAttribute()}}
                    </label>
                </div>
            @endforeach
        @endif
    </div>
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
