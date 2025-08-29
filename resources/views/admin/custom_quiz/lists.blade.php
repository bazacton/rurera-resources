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
                                    <div class="col-md-2">
                                        <div class="form-group">

                                            <div class="select-holder">
                                                <div class="input-field">
                                                    <label class="input-label">{{ trans('admin/main.status') }}</label>
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
                                        <th class="text-left">Created By</th>
                                        <th class="text-center">
                                        {{ trans('admin/main.question_count') }}
                                        </th>
                                        <th class="text-center">
                                        {{ trans('admin/main.status') }}
                                        </th>
                                        <th>
                                        <!--{{ trans('admin/main.actions') }}-->
                                        </th>
                                    </tr>

                                    @foreach($quizzes as $quiz)
                                    <tr>
                                        <td>
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <span>{{ $quiz->title }}</span>
                                                @if(!empty($quiz->webinar))
                                                <small class="d-block text-left text-primary mt-1">{{ $quiz->webinar->title
                                                    }}</small>
                                                @endif
                                            </div>
                                        </td>

                                        <td class="text-left">
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">{{ isset($quiz->creator->id)?$quiz->creator->get_full_name() : '' }}</div>
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

<div class="modal fade quiz-create-modal" id="quiz-create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <form action="/admin/custom_quiz/create_custom_quiz"
                      method="Post" class="rurera-form-validation create-assignment-form">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-12">
                            <h3>Create Custom Quiz</h3>
                        </div>
                        <div class="populated-content-area col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="years-group populated-data">

                                <div class="form-group">
                                    <label>{{ trans('/admin/main.category') }}</label>
                                    <div class="select-holder">
                                        <select class="form-control @error('year_id') is-invalid @enderror ajax-category-courses" name="year_id" data-course_id="{{isset( $assignment->subject_id )? $assignment->subject_id : 0}}">
                                            <option {{ !empty($trend) ? '' : 'selected' }} disabled>{{ trans('admin/main.choose_category')  }}</option>

                                            @foreach($categories as $category)
                                                @if(!empty($category->subCategories) and count($category->subCategories))
                                                    <optgroup label="{{  $category->title }}">
                                                        @foreach($category->subCategories as $subCategory)
                                                            <option value="{{ $subCategory->id }}" @if(!empty($assignment) and $assignment->year_id == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @else
                                                    <option value="{{ $category->id }}" class="font-weight-bold" @if(!empty($assignment) and $assignment->year_id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="input-label">Quiz Title</label>
                                <input type="text"
                                       name="quiz_title"
                                       value=""
                                       class="js-ajax-title form-control rurera-req-field"
                                       placeholder=""/>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit"
                                    class="js-submit-quiz-form btn btn-sm btn-primary">Submit
                            </button>
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

    $(document).on('click', '.create-quiz-btn', function () {
        $(".quiz-create-modal").modal('show');
    });
    /*Skelton Loading Fungtion End*/
</script>
@endpush
