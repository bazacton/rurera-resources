@extends('admin.layouts.app')

@push('libraries_top')

@endpush


@section('content')
<section class="section">
    <div class="section-header">
        <div class="heading-holder">
            <h1>Custom Quizzes</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">Custom Quizzes</div>
            </div>
        </div>
        @can('admin_assignments_create')
        <div class="text-right ml-auto">
            <a href="javascript:;" class="create-quiz-btn simple-btn">Create
                Custom Quiz</a>
        </div>
        @endcan
    </div>
    <div class="skeleton-holder skeleton">
        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <section class="card mb-0">
                        <div class="card-body">
                            <form action="{{ getAdminPanelUrl() }}/quizzes" method="get" class="mb-0">
                                <div class="rurera-search-filters row">
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <div class="input-field">
                                                <label class="input-label">{{ trans('admin/main.search') }}</label>
                                                <input type="text" placeholder="Search Quizzes" class="form-control" name="title" value="{{ request()->get('title') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <div class="input-group">
                                                <div class="input-field">
                                                    <label class="input-label">{{ trans('admin/main.start_date') }}</label>
                                                    <input type="date" id="fsdate" class="text-left form-control" name="from"
                                                    value="{{ request()->get('from') }}" placeholder="Start Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <div class="input-group">
                                                <div class="input-field">
                                                    <label class="input-label">{{ trans('admin/main.end_date') }}</label>
                                                    <input type="date" id="lsdate" class="text-left form-control" name="to"
                                                    value="{{ request()->get('to') }}" placeholder="End Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <div class="select-holder">
                                                <div class="input-field">
                                                    <label class="input-label">{{ trans('admin/main.filters') }}</label>
                                                    <select name="sort" data-plugin-selectTwo class="form-control populate">
                                                        <option value="">{{ trans('admin/main.filter_type') }}</option>
                                                        <option value="have_certificate" @if(request()->get('sort') == 'have_certificate')
                                                            selected @endif>{{ trans('admin/main.quizzes_have_certificate') }}
                                                        </option>
                                                        <option value="students_count_asc" @if(request()->get('sort') == 'students_count_asc')
                                                            selected @endif>{{ trans('admin/main.students_ascending') }}
                                                        </option>
                                                        <option value="students_count_desc" @if(request()->get('sort') == 'students_count_desc')
                                                            selected @endif>{{ trans('admin/main.students_descending') }}
                                                        </option>
                                                        <option value="passed_count_asc" @if(request()->get('sort') == 'passed_count_asc')
                                                            selected @endif>{{ trans('admin/main.passed_students_ascending') }}
                                                        </option>
                                                        <option value="passed_count_desc" @if(request()->get('sort') == 'passed_count_desc')
                                                            selected @endif>{{ trans('admin/main.passes_students_descending') }}
                                                        </option>
                                                        <option value="grade_avg_asc" @if(request()->get('sort') == 'grade_avg_asc') selected
                                                            @endif>{{ trans('admin/main.grades_average_ascending') }}
                                                        </option>
                                                        <option value="grade_avg_desc" @if(request()->get('sort') == 'grade_avg_desc') selected
                                                            @endif>{{ trans('admin/main.grades_average_descending') }}
                                                        </option>
                                                        <option value="created_at_asc" @if(request()->get('sort') == 'created_at_asc') selected
                                                            @endif>{{ trans('admin/main.create_date_ascending') }}
                                                        </option>
                                                        <option value="created_at_desc" @if(request()->get('sort') == 'created_at_desc')
                                                            selected @endif>{{ trans('admin/main.create_date_descending') }}
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <div class="input-field">
                                                <label class="input-label">{{ trans('admin/main.class') }}</label>
                                                <div class="select-holder">
                                                    <select name="webinar_ids[]" multiple="multiple" class="form-control search-webinar-select2" data-placeholder="Search classes">
                                                        @if(!empty($webinars) and $webinars->count() > 0)
                                                        @foreach($webinars as $webinar)
                                                        <option value="{{ $webinar->id }}" selected>{{ $webinar->title }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="input-field">
                                                <label class="input-label">{{ trans('admin/main.status') }}</label>
                                                <div class="select-holder">
                                                    <select name="statue" data-plugin-selectTwo class="form-control populate">
                                                        <option value="">{{ trans('admin/main.all_status') }}</option>
                                                        <option value="active" @if(request()->get('status') == 'active') selected @endif>{{
                                                            trans('admin/main.active') }}
                                                        </option>
                                                        <option value="inactive" @if(request()->get('status') == 'inactive') selected @endif>{{
                                                            trans('admin/main.inactive') }}
                                                        </option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th class="text-left">
                                        {{ trans('admin/main.title') }}
                                        </th>
                                        <th class="text-center">
                                        {{ trans('admin/main.question_count') }}
                                        </th>
                                        <th class="text-center">
                                        {{ trans('admin/main.status') }}
                                        </th>
                                        <th class="text-left">Visibility</th>
                                        <th class="text-left">Created At</th>
                                        <th class="text-left">Created By</th>
                                        <th>
                                        <!--{{ trans('admin/main.actions') }}-->
                                        </th>
                                    </tr>

                                    @foreach($quizzes as $quiz)
                                    <tr>
                                        <td>
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <span>{{ $quiz->title }}</span>
                                                @if(isset($quiz->quizYear->id))
                                                    <small class="d-block text-left text-primary mt-1">{{ $quiz->quizYear->getTitleAttribute()}}</small>
                                                @endif
                                                @if(!empty($quiz->webinar))
                                                <small class="d-block text-left text-primary mt-1">{{ $quiz->webinar->title}}</small>
                                                @endif
                                            </div>
                                        </td>



                                        <td class="text-center">
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">{{ $quiz->quizQuestionsList->count() }}</div>
                                        </td>

                                        <td class="text-center">
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                @if($quiz->status === \App\Models\Quiz::ACTIVE)
                                                <span class="text-success">{{ trans('admin/main.active') }}</span>
                                                @else
                                                <span class="text-warning">{{ trans('admin/main.inactive') }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            -
                                        </td>
                                        <td class="text-left">
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">{{($quiz->created_at > 0)? dateTimeFormat($quiz->created_at, 'j M y') : '-'}}</div>
                                        </td>
                                        <td class="text-left">
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">{{ isset($quiz->creator->id)?$quiz->creator->get_full_name() : '' }}</div>
                                        </td>
                                        <td>
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <div class="quiz-table-controls">
                                                    @can('admin_quizzes_results')
                                                    <a href="{{ getAdminPanelUrl() }}/quizzes/{{ $quiz->id }}/results"
                                                    class="btn-transparent btn-sm text-primary" data-toggle="tooltip"
                                                    title="{{ trans('admin/main.quiz_results') }}">
                                                        <i class="fa fa-poll fa-1x"></i>
                                                    </a>
                                                    @endcan

                                                    @can('admin_assignments_edit')
                                                    <a href="{{ getAdminPanelUrl() }}/custom_quiz/{{ $quiz->id }}/edit"
                                                    class="btn-transparent btn-sm text-primary" data-toggle="tooltip"
                                                    data-placement="top" title="{{ trans('admin/main.edit') }}">
                                                        <img src="/assets/default/svgs/edit-pencil.svg" alt="edit-pencil">
                                                    </a>
                                                    @endcan

                                                    @can('admin_assignments_delete')
                                                    @include('admin.includes.delete_button',['url' =>
                                                    getAdminPanelUrl().'/quizzes/'.$quiz->id.'/delete' , 'btnClass' => 'btn-sm'])
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            {{ $quizzes->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade quiz-create-modal general-knowledge-modal" id="quiz-create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden"
                       name="quiz_title"
                       value="Create Custom Quiz"
                       class="js-ajax-title form-control rurera-req-field"
                       placeholder=""/>
                <h2 class="editable-content editable" data-edit_field="quiz_title" contenteditable="true">Create Custom Quiz</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="book-btn">
                    <div class="upload-box">
                        <input type="file" id="upload-thumbnail" name="quiz_image" class="assignment-img-upload">
                        <label for="upload-thumbnail"><img src="/assets/default/svgs/edit-simple.svg" alt="file-image"></label>
                    </div>
                    <button type="button"><img src="/assets/default/svgs/book-saved.svg'" class="assignment_img" alt="book-saved"></button>
                </div>
            </div>
            <div class="modal-body">

                <form action="/admin/custom_quiz/create_custom_quiz"
                      method="Post" class="rurera-form-validation create-assignment-form" enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <div class="text-holder">

                        <ul>
                            <li>
                                <img src="/assets/default/svgs/grades.svg" alt="grades">

                                <div class="form-group">
                                    <label>{{ trans('/admin/main.category') }}</label>
                                    <div class="select-holder">
                                        <select class="form-control ajax-category-courses" name="year_id" data-course_id="0">
                                            <option selected disabled>{{ trans('admin/main.choose_category')  }}</option>

                                            @foreach($categories as $category)
                                                @if(!empty($category->subCategories) and count($category->subCategories))
                                                    <optgroup label="{{  $category->title }}">
                                                        @foreach($category->subCategories as $subCategory)
                                                            <option value="{{ $subCategory->id }}">{{ $subCategory->title }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @else
                                                    <option value="{{ $category->id }}" class="font-weight-bold" @if(!empty($assignment) and $assignment->year_id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <img src="/assets/default/svgs/book-saved.svg" alt="book-saved">
                                <div class="form-group">
                                    <label>Subjects</label>
                                    <select data-return_type="option"
                                            data-default_id="0" data-chapter_id="0"
                                            class=" ajax-courses-dropdown year_subjects form-control select2r"
                                            id="subject_id" name="subject_id">
                                        <option disabled selected>Subject</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                        <div class="description-field">
                            <textarea name="quiz_instructions" class="quiz_instructions" placeholder="Type description here..."></textarea>
                            <span class="description-count">0/400</span>
                        </div>
                        <div class="general-knowledge-footer">
                            <p>Let your learner know a title about the learning path</p>
                            <div class="footer-controls">
                                <button type="submit" class="apply-btn apply-assignment-btn">Submit</button>
                                <button type="button" class="cancel-btn">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts_bottom')
<script>
    /*Skelton Loading Fungtion Start*/
    $(document).ready(function () {
        const $el = document.querySelector(".skeleton-holder");

        setTimeout(() => {
        $el.classList.remove("skeleton");
        $el
            .querySelectorAll(".skelton-hide")
            .forEach((el) => el.classList.remove("skelton-hide"));
        }, 3000);

    });

    $(document).on('change', '#upload-thumbnail', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $(".assignment_img").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    $(document).on('change', '.ajax-category-courses', function () {
        var category_id = $(this).val();
        var course_id = $(this).attr('data-course_id');
        $.ajax({
            type: "GET",
            url: '/admin/webinars/courses_by_categories',
            data: {'category_id': category_id, 'course_id': course_id},
            success: function (return_data) {
                $(".ajax-courses-dropdown").html(return_data);
                $(".ajax-chapter-dropdown").html('<option value="">Please select year, subject</option>');
                $('.ajax-courses-dropdown').change();
            }
        });
    });

    $(document).on('click', '.create-quiz-btn', function () {
        $(".quiz-create-modal").modal('show');
    });
    /*Skelton Loading Fungtion End*/

    $(document).ready(function () {
        const textarea = $('.quiz_instructions');
        const countDisplay = $('.description-count');
        const maxLength = parseInt(textarea.attr('maxlength')) || 400;

        // Set initial count
        countDisplay.text(`${textarea.val().length}/${maxLength}`);

        // Update count on input
        textarea.on('input', function () {
            let content = $(this).val();

            // Prevent exceeding the max length
            if (content.length > maxLength) {
                content = content.substring(0, maxLength);
                $(this).val(content);
            }

            // Update the count display
            countDisplay.text(`${content.length}/${maxLength}`);
        });
    });

    $(document).on('click change keyup keydown keypress', '.editable-content', function () {
        var editable_field_name = $(this).attr('data-edit_field');
        var new_value = $(this).html();
        $('[name="'+editable_field_name+'"]').val(new_value);
    });
</script>
@endpush
