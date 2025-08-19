<div class="teacher-table skeleton">
    @php $search_field = isset($search_field)? $search_field : true; @endphp
    <div class="card">

        <div class="card-body p-0 table-sm">
            <table class="table mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Questions</th>
                    <th>Start & End Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody class="assignments-list">

                @if($assignmentsList->count() > 0)
                    @foreach($assignmentsList as $assignmentObj)
                        @php $studentAssignmentObj = $assignmentObj->StudentAssignmentData; @endphp
                        <tr>
                            <td data-th="Title">
                                <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{$studentAssignmentObj->title}}</span>
                                </div>
                            </td>
                            <td data-th="Questions">
                                <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{$studentAssignmentObj->no_of_questions}}</span>
                                </div>
                            </td>
                            <td data-th="Assignment Dates">
                                <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{dateTimeFormat($studentAssignmentObj->assignment_start_date, 'j M Y')}} / {{dateTimeFormat($studentAssignmentObj->assignment_end_date, 'j M Y')}}</span>
                                </div>
                            </td>
                            <td data-th="Status">
                                <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{$assignmentObj->status}}</span>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
            <span class="table-counts">{{$assignmentsList->count()}} Assignments</span>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        const $el = document.querySelector(".section-body");

        setTimeout(() => {
            $el.classList.remove("skeleton");
            $el
                .querySelectorAll(".skelton-hide")
                .forEach((el) => el.classList.remove("skelton-hide"));
        }, 2000);
    });
</script>
