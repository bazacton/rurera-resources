<div class="teacher-table">
    <div class="card">
        <div class="card-header">
            @if(!isset($class) || $class->google_id == 0)
            <div class="bulk-actions">
                <span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span>
                <div class="dropdown-box">
                    <div class="dropdown">
                        <a class="dropdown-toggle bulk-actions-btn disabled" href="#" data-toggle="dropdown" aria-expanded="false">
                            Bulk Actions <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item print-users-logins" data-type_class="sections-students" href="javascript:;"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                            <a data-class_id="{{isset($class->id)? $class->id : 0}}" class="dropdown-item delete-students" href="javascript:;" data-type_class="sections-students"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="teacher-search-filter border-0 p-0">
                @if(!isset($class) || $class->google_id == 0)
                @if(isset($is_add_button) && $is_add_button == true)
                    <button type="button" class="add-student-btn" data-toggle="modal" data-target="#add-student-modal"> Add Student</button>
                @endif
                @endif
                <div class="search-field">
                    <span class="icon-box">
                        <img src="/assets/default/svgs/search.svg" alt="search">
                    </span>
                    <input type="text" class="search-students" placeholder="Search Students">
                </div>
            </div>
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
                                        @if($studentObj->google_class_id == 0)
                                        <input type="checkbox" class="sections-students" value="{{ $studentObj->id }}">
                                        @endif
                                    </div>
                                    <strong>
                                                                            <span class="user-lable">
                                                                                {{ $studentObj->get_full_name() }}
                                                                                <span class="user-email">{{ $studentObj->email }}</span>
                                                                            </span>
                                    </strong>
                                </div>
                            </td>
                            <td data-th="Last Login">
                                <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                    {{($studentObj->last_login > 0)? dateTimeFormat($studentObj->last_login, 'j M y | H:i') : '-'}}
                                </div>
                            </td>
                            <td data-th="School">
                                <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                    {{$studentObj->userSchool->title}}
                                </div>
                            </td>
                            <td>
                                @if($studentObj->google_class_id == 0)
                                <div class="pending-invites-controls">
                                    <button class="student-edit-modal" data-id="{{$studentObj->id}}" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Edit Student">
                                        <img src="/assets/default/svgs/edit-pencil.svg" alt="edit-pencil">
                                    </button>
                                    <button data-id="{{$studentObj->id}}" class="delete-student" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Delete Student">
                                        <img src="/assets/default/svgs/delete-menu.svg" alt="delete-menu">
                                    </button>
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
