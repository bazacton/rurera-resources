<div class="student-form">

    <input type="hidden" name="student_id" value="{{$studentObj->id}}">
    <div class="row">
        <div class="col-md-12">
        <div class="select-holder">
            <label class="input-label">Select School</label>
            <div class="select-box">
                <select name="school_id" class="student-school-change schools-list-ajax" data-next_target="school-student-classes-list" data-selected_value="{{$studentObj->class_id}}">
                    @if($schools_list->count() > 0)
                        @php $row_no = 0; @endphp
                        @foreach($schools_list as $schoolObj)
                            @php $is_checked = ($schoolObj->id == $studentObj->school_id)? 'selected' : ''; @endphp
                            <option value="{{$schoolObj->id}}" {{$is_checked}}>{{$schoolObj->title}}</option>
                            @php $row_no++; @endphp
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        </div>
        <div class="col-md-12">
        <div class="select-holder ">
            <label class="input-label">Select a Class</label>
            <div class="select-box">
                <select name="class_id" class="student-class-change school-student-classes-list">
                    <option value="">Select Class</option>
                </select>
            </div>
        </div>
        </div>
        <div class="col-md-12">
            <h3>{{$studentObj->get_full_name()}}</h3>
        </div>
        <div class="col-md-6">
            <span class="field-lable">
                Username<em>*</em>
            </span>
            <div class="field-holder">
                <input type="text" value="{{$studentObj->username}}" name="username" placeholder="Create a unique username (e.g Daniel_243)" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6">
            <span class="field-lable">
                Full Name<em>*</em>
            </span>
            <div class="field-holder">
                <input type="text" name="full_name" value="{{$studentObj->full_name}}" placeholder="Enter student Full Name (e.g. Daniel)" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-12">
            <span class="field-lable">
                Email
            </span>
            <div class="field-holder">
                <input type="text" name="email" value="{{$studentObj->email}}" placeholder="Student Valid email address" autocomplete="off">
            </div>
        </div>
    </div>
</div>
<script>
    $(".schools-list-ajax").change();
</script>
