<div class="student-form">

    <input type="hidden" name="student_id" value="{{$studentObj->id}}">
    <div class="row">
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
