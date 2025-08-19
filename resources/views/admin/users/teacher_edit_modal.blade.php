<input type="hidden" name="status" value="active">
<input type="hidden" name="teacher_id" value="{{$userObj->id}}">
<input type="hidden" name="page_type" value="teachers">
<div class="form-group {{(!auth()->user()->isDistricAdmin() && !auth()->user()->isAdminRole())? 'rurera-hide' : ''}}">
    <label>Select School</label>
    <div class="select-box">
        <select name="school_id" class="student-school-change schools-list-ajax" data-next_target="school-edit-classes-list" data-selected_value="{{$userObj->class_id}}">
            @if($schools_list->count() > 0)
                @php $row_no = 0; @endphp
                @foreach($schools_list as $schoolObj)
                    @php $is_checked = ($schoolObj->id == $userObj->school_id)? 'selected' : ''; @endphp
                    <option value="{{$schoolObj->id}}" {{$is_checked}}>{{$schoolObj->title}}</option>
                    @php $row_no++; @endphp
                @endforeach
            @endif
        </select>
    </div>
</div>
<div class="form-group">
    <div class="select-holder">
        <label class="input-label">Select a Class</label>
        <div class="select-box input-group">
            <select name="class_id" class="student-class-change school-edit-classes-list">
                <option value="">Select Class</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="input-label">Role</label>
    @php $is_checked = ($userObj->role_id == 7)? 'checked' : ''; @endphp
    <div class="input-group">
        <div class="radio-buttons">
            <input type="radio" id="teacher_role-add" name="role_id"
                   class="assignment_subject_check" value="7" {{$is_checked}}>
            <label for="teacher_role-add">Teacher</label>
        </div>
    </div>
    @if(auth()->user()->isDistricAdmin())
        @php $is_checked = ($userObj->role_id == 14)? 'checked' : ''; @endphp
        <div class="input-group">
            <div class="radio-buttons">
                <input type="radio" id="school_admin_role-add" name="role_id"
                       class="assignment_subject_check" value="14" {{$is_checked}}>
                <label for="school_admin_role-add">School Admin</label>
            </div>
        </div>
    @endif
</div>

<div class="form-group">
    <label>Full Name</label>
    <div class="form-field">
            <span class="icon-box">
                <img src="/assets/default/img/user.png" alt="user">
            </span>
        <input type="text" name="full_name" class="form-control rurera-req-field" value="{{$userObj->get_full_name()}}" placeholder="Full name of the new member" required autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <div class="form-field">
        <span class="icon-box">
            <img src="/assets/default/img/envelope.jpg" alt="envelope">
        </span>
        <input name="email" type="text" class="form-control rurera-req-field" placeholder="Email for login & updates" id="email" value="{{$userObj->email}}" required autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label class="input-label">Password</label>
    <div class="input-group">
        <span class="icon-box">
            <img src="/assets/default/img/key-lock.jpg" alt="key-lock">
        </span>
        <input type="password" name="password" class="form-control" placeholder="Create a strong password" autocomplete="new-password">
    </div>
</div>
<script>
    $(".schools-list-ajax").change();
</script>
