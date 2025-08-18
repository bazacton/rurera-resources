<div class="teacher-table skeleton">
    @php $search_field = isset($search_field)? $search_field : true; @endphp
    <div class="card">
        <div class="card-header">

            <div class="bulk-actions">
                <span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span>
                <div class="dropdown-box">
                    <div class="dropdown">
                        <a class="dropdown-toggle bulk-actions-btn disabled" href="#" data-toggle="dropdown" aria-expanded="false">
                            Bulk Actions <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item print-users-logins" data-type_class="sections-students" href="javascript:;"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                            @if(!auth()->user()->isTeacherPanel())
                            @if(!isset($class) || $class->google_id == 0)
                            <a data-class_id="{{isset($class->id)? $class->id : 0}}" class="dropdown-item delete-students" href="javascript:;" data-type_class="sections-students"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="teacher-search-filter border-0 p-0">
                @if(!isset($class) || $class->google_id == 0)
                @if(isset($is_add_button) && $is_add_button == true)
                    <button type="button" class="add-student-btn" data-toggle="modal" data-target="#add-student-modal"> Add Student</button>
                @endif
                @endif
                @if($search_field == true)
                <div class="search-field">
                    <span class="icon-box">
                        <img src="/assets/default/svgs/search.svg" alt="search">
                    </span>
                    <input type="text" class="search-students" placeholder="Search Students">
                </div>
                @endif
            </div>
            @if(isset($classes_filter) && $classes_filter == true)
            <div class="form-group">
                <div class="select-holder">
                    <select name="class_id" data-plugin-selectTwo class="form-control populate rurera_self_submitted_field form-control classes_filter" data-field_key="class_id">
                        <option value="all">All Classes</option>
                        @if( isset($filter_classes_list) && $filter_classes_list->count() > 0)
                            @foreach($filter_classes_list as $classObj)
                                <option value="{{$classObj->id}}" @if(request()->get('class_id') == $classObj->id)
                                    selected @endif>{{$classObj->title}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            @endif
        </div>
        <div class="card-body p-0 table-sm">
            <table class="table mb-0">
                <thead class="thead-light">
                <tr>
                    <th>
                        <div class="check-box">
                            @if(!isset($class) || $class->google_id == 0)
                            <input type="checkbox" class="check-uncheck-all" data-target_class="sections-students" name="check-two">
                            @endif
                        </div> Student
                    </th>
                    <th>Last Login</th>
                    <th>School</th>
                    <th>Class</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="students-list">

                @if($students->count() > 0)
                    @foreach($students as $studentObj)
                        <tr>
                            <td data-th="Teacher/Admin">
                                <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                    <div class="check-box">

                                        <input type="checkbox" class="sections-students" value="{{ $studentObj->id }}">
                                    </div>
                                    <strong>
                                                                            <span class="user-lable">
                                                                                {{ $studentObj->get_full_name() }} -- {{ $studentObj->id }}
                                                                                <span class="user-email">{{ $studentObj->email }}</span>
                                                                            </span>
                                    </strong>
                                </div>
                            </td>
                            <td data-th="Last Login">
                                <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{($studentObj->last_login > 0)? dateTimeFormat($studentObj->last_login, 'j M y | H:i') : '-'}}</span>
                                </div>
                            </td>
                            <td data-th="School">
                                <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{$studentObj->userSchool->title}}</span>
                                </div>
                            </td>
                            <td data-th="Class">
                                <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{$studentObj->userClass->title}}</span>
                                </div>
                            </td>
                            <td>
                                @if($studentObj->google_class_id == 0)
                                <div class="pending-invites-controls">
                                    <a title="Print Student" href="/admin/students/print_details?users={{$studentObj->id}}" target="_blank">
                                        <img src="/assets/default/svgs/print.svg" alt="print-menu">
                                    </a>
                                    <button class="student-edit-modal" data-id="{{$studentObj->id}}" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Edit Student">
                                        <img src="/assets/default/svgs/edit-pencil.svg" alt="edit-pencil">
                                    </button>
                                    @if(!auth()->user()->isTeacherPanel())
                                    <button data-id="{{$studentObj->id}}" class="delete-student" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Delete Student">
                                        <img src="/assets/default/svgs/delete-menu.svg" alt="delete-menu">
                                    </button>
                                    @endif
                                </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
            <span class="table-counts">{{$students->count()}} Students</span>
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
