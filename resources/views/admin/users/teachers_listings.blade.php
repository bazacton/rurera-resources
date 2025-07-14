<div class="teacher-table">
    <div class="card">
        <div class="teacher-search-filter">

            <div class="search-field">
                                                    <span class="icon-box">
                                                        <img src="/assets/default/svgs/search.svg" alt="search">
                                                    </span>
                <input type="text" class="search-teachers" placeholder="Search Teachers">
            </div>
        </div>
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
                            <a  class="dropdown-item unlink-teachers" href="javascript:;" data-type_class="sections-teachers"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Unlink</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(!isset($class) || $class->google_id == 0)
            <div class="invite-faculty">
                <div class="dropdown-box">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                            Invite Faculty <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item teachers-invitation-modal-btn" href="javascript:;" data-toggle="modal" data-target="#invite-teacher-modal"><img src="/assets/default/svgs/link-svgrepo-com.svg" alt="link-svgrepo-com"> Invite faculty</a>
                            <a class="dropdown-item create-class-btn" href="javascript:;" data-toggle="modal" data-target="#createTeacherModal"><img src="/assets/default/svgs/plus+.svg" alt="plus+"> Add faculty</a>
                        </div>
                    </div>
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
                                <input type="checkbox" class="check-uncheck-all" data-target_class="sections-teachers" name="check-two">
                            @endif
                        </div>
                        Teacher
                    </th>
                    <th>Role</th>
                    <th>Last Login</th>
                    <th>Classes</th>
                    <th>School</th>
                </tr>
                </thead>
                <tbody class="teachers-list">

                @if($teachers->count() > 0)
                    @foreach($teachers as $teacherObj)
                        @php if(isset($sub_user) && $sub_user == true){ $teacherObj = $teacherObj->user; } @endphp
                        <tr>
                            <td data-th="Teacher/Admin">

                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <div class="check-box">
                                        @if($teacherObj->id != $userObj->id && $teacherObj->google_class_id == 0)
                                            <input type="checkbox" class="sections-teachers" value="{{ $teacherObj->id }}">
                                        @endif
                                    </div>
                                    <strong>
                                        <span class="user-lable">
                                            <a href="javascript:;" class="edit-teacher-btn" data-id="{{$teacherObj->id}}">{{ $teacherObj->get_full_name() }}</a>
                                            <span class="user-email">{{ $teacherObj->email }}</span>
                                        </span>
                                    </strong>
                                </div>
                            </td>
                            <td data-th="Role">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{isset($teacherObj->role->caption)? $teacherObj->role->caption : '-'}}</span>
                                </div>
                            </td>
                            <td data-th="Last Login">

                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{($teacherObj->last_login > 0)? dateTimeFormat($teacherObj->last_login, 'j M y | H:i') : '-'}}</span>
                                </div>
                            </td>
                            <td data-th="Classes">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">{{$teacherObj->getTeacherClasses->count()}}</div>
                            </td>
                            <td data-th="School">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{isset($teacherObj->userSchool->id)? $teacherObj->userSchool->title : '-'}}</span>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @endif



                </tbody>
            </table>
            <span class="table-counts">{{$teachers->count()}} Teachers</span>
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
