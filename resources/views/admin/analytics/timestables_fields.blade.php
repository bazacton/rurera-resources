<div class="rurera-timeline timeline-container">
    <input type="range" name="timeline_date" id="dateRange" min="0" value="0">
    <div class="date-label" id="dateLabel"></div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="form-group">
        <div class="questions-select-number">
            <ul class="d-flex justify-content-center flex-wrap mb-30">
                <li><input type="checkbox" value="10" name="tables_no[]" id="tables_ten"> <label for="tables_ten">10</label></li>
                <li><input type="checkbox" value="2" name="tables_no[]" checked="" id="tables_two"> <label for="tables_two">2</label></li>
                <li><input type="checkbox" value="5" name="tables_no[]" id="tables_five"> <label for="tables_five">5</label></li>
                <li><input type="checkbox" value="3" name="tables_no[]" checked="" id="tables_three"> <label for="tables_three">3</label></li>
                <li><input type="checkbox" value="4" name="tables_no[]" id="tables_four"> <label for="tables_four">4</label></li>
                <li><input type="checkbox" value="8" name="tables_no[]" id="tables_eight"> <label for="tables_eight">8</label></li>
                <li><input type="checkbox" value="6" name="tables_no[]" id="tables_six"> <label for="tables_six">6</label></li>
                <li><input type="checkbox" value="7" name="tables_no[]" id="tables_seven"> <label for="tables_seven">7</label></li>
                <li><input type="checkbox" value="9" name="tables_no[]" id="tables_nine"> <label for="tables_nine">9</label></li>
                <li><input type="checkbox" value="11" name="tables_no[]" id="tables_eleven"> <label for="tables_eleven">11</label></li>
                <li><input type="checkbox" value="12" name="tables_no[]" id="tables_twelve"> <label for="tables_twelve">12</label></li>
                <li><input type="checkbox" value="13" name="tables_no[]" id="tables_thirteen"> <label for="tables_thirteen">13</label></li>
                <li><input type="checkbox" value="14" name="tables_no[]" id="tables_fourteen"> <label for="tables_fourteen">14</label></li>
                <li><input type="checkbox" value="15" name="tables_no[]" id="tables_fifteen"> <label for="tables_fifteen">15</label></li>
                <li><input type="checkbox" value="16" name="tables_no[]" id="tables_sixteen"> <label for="tables_sixteen">16</label></li>
            </ul>
        </div>
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
