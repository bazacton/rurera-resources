<form action="{{ getAdminPanelUrl() }}/classes/{{$class->id}}/store"
      method="POST" class="mb-0">
    @csrf

    <div class="form-group">
        <label>Curriculum</label>
        <div class="select-box">
            <select class="form-control @error('category_id') is-invalid @enderror"
                    name="category_id">
                <option {{ !empty($trend) ?
                                        '' : 'selected' }} disabled>{{ trans('admin/main.choose_category') }}</option>

                @foreach($categories as $category)
                    @if(!empty($category->subCategories) and count($category->subCategories))
                        <optgroup label="{{  $category->title }}">
                            @foreach($category->subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" @if(!empty($class) and $class->
                                                category_id == $subCategory->id) selected="selected" @endif>{{
                                                $subCategory->title }}
                                </option>
                            @endforeach
                        </optgroup>
                    @else
                        <option value="{{ $category->id }}" class="font-weight-bold" @if(!empty($class)
                                                and $class->category_id == $category->id) selected="selected" @endif>{{
                                            $category->title }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group assignment_topic_type_fields timestables_fields ">
        <label>Learn</label>

        <div class="row">
            @if($categories->count() > 0)
                @foreach($categories as $category)
                    @if(!empty($category->subCategories) and count($category->subCategories))
                        @foreach($category->subCategories as $subCategory)
                            <div class="col-12 col-md-6 col-lg-6">
                                {{$subCategory->title}}
                                <div class="form-group">
                                    @foreach($subCategory->subjects($subCategory->id) as $subjectObj)
                                        @php $is_selected = in_array($subjectObj->id, $class_subjects)? 'checked' : ''; @endphp
                                        <div class="custom-control custom-checkbox">
                                            <input id="{{$subCategory->id}}_{{$subjectObj->id}}" value="{{$subjectObj->id}}" type="checkbox" name="subjects[]"
                                                   class="custom-control-input" {{$is_selected}}>
                                            <label class="custom-control-label"
                                                   for="{{$subCategory->id}}_{{$subjectObj->id}}">{{$subjectObj->getTitleAttribute()}}</label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach
                    @endif
                @endforeach
            @endif



        </div>
    </div>


    <!-- Class Name with Color -->
    <div class="form-group">
        <label for="className">Enter class name (Required)</label>
        <div class="input-group">
            <input
                type="text"
                class="form-control"
                id="className"
                name="title"
                value="{{$class->title}}"
                placeholder="E.g., Math Club"
                required
            />
            <div class="input-group-append">
                <button
                    class="btn btn-light dropdown-toggle"
                    type="button"
                    name="class_color"
                    id="colorPickerDropdown"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    style="border: 1px solid #ccc;"
                >
                                                    <span
                                                        class="color-indicator"
                                                        style="background-color: #bcdad7;"
                                                    ></span>
                </button>
                <div class="dropdown-menu">
                    <h5>Class Color Code</h5>
                    <input type="text" name="class_color" class="class_color">
                    <div class="class-color-box">
                        <button type="button" class="dropdown-item color-set" data-color_code="#bcdad7" style="background-color: #bcdad7;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#fbcdb3" style="background-color: #fbcdb3;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#f7efe3" style="background-color: #f7efe3;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#f1d276" style="background-color: #f1d276;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#ef8b8a" style="background-color: #ef8b8a;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#e5d7bb" style="background-color: #e5d7bb;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#bd7967" style="background-color: #bd7967;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#f870b3" style="background-color: #f870b3;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#acd5cd" style="background-color: #acd5cd;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#733a4d" style="background-color: #733a4d;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#4f408e" style="background-color: #4f408e;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#3eb9bd" style="background-color: #3eb9bd;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#e2cd82" style="background-color: #e2cd82;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#f6e9c3" style="background-color: #f6e9c3;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#efebe4" style="background-color: #efebe4;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#cda4ad" style="background-color: #cda4ad;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#edc9a7" style="background-color: #edc9a7;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#dad3c5" style="background-color: #dad3c5;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#a96eb0" style="background-color: #a96eb0;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#deb9ae" style="background-color: #deb9ae;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#7d9897" style="background-color: #7d9897;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#6d4e88" style="background-color: #6d4e88;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#a46f82" style="background-color: #a46f82;" ></button>
                        <button type="button" class="dropdown-item color-set" data-color_code="#465c60" style="background-color: #465c60;" ></button>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="form-group rurera-hide">
        <div class="custom-control custom-checkbox">
            <input id="hasSubCategory2" type="checkbox" name="has_sub"
                   class="custom-control-input" checked>
            <label class="custom-control-label"
                   for="hasSubCategory2">Sections</label>
        </div>
    </div>

    <div id="subCategories"
         class="ml-0 rurera-hide ">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <strong class="d-block">Sections</strong>

            <button type="button" class="btn btn-success add-btn"><i class="fa fa-plus"></i> Add</button>
        </div>

        <ul class="draggable-lists list-group">

            @if($class->sections->count() > 0)
                @foreach($class->sections as $sectionObj)

                    <li class="form-group list-group">

                        <div class="p-2 border rounded-sm">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text cursor-pointer move-icon">
                                        <i class="fa fa-arrows-alt"></i>
                                    </div>
                                </div>

                                <input type="text" name="sections[{{$sectionObj->class_code}}][title]"
                                       class="form-control w-auto flex-grow-1"
                                       value="{{$sectionObj->title}}"
                                       placeholder="{{ trans('admin/main.choose_title') }}"/>

                                <input type="text" name="section_code"
                                       class="form-control"
                                       value="{{$sectionObj->class_code}}" readonly disabled/>

                                <select class="form-control select2 select2-hidden-accessible" name="sections[section_code][class_teachers][]" multiple="multiple">

                                </select>



                                <div class="input-group-append">
                                    @include('admin.includes.delete_button',[
                                    'url' => getAdminPanelUrl("/classes/111/delete"),
                                    'deleteConfirmMsg' => trans('update.category_delete_confirm_msg'),
                                    'btnClass' => 'btn btn-danger text-white',
                                    'noBtnTransparent' => true
                                    ])
                                </div>
                            </div>

                        </div>
                    </li>
                @endforeach
            @endif


        </ul>
    </div>

    @php $tables_no = isset( $class->timestables_no)? json_decode($class->timestables_no) : array(); @endphp
    <div class="form-group assignment_topic_type_fields timestables_fields ">
        <label>Timestables</label>
        <div class="questions-select-number">
            <ul class="d-flex justify-content-center flex-wrap mb-30">
                <li><input type="checkbox" value="10" name="tables_no[]" {{in_array(10,$tables_no)?
                                            'checked' : ''}} id="tables_ten10" /> <label for="tables_ten10">10</label></li>
                <li><input type="checkbox" value="2" name="tables_no[]" {{in_array(2,$tables_no)?
                                            'checked' : ''}} id="tables_two2" /> <label for="tables_two2">2</label></li>
                <li><input type="checkbox" value="5" name="tables_no[]" {{in_array(5,$tables_no)?
                                            'checked' : ''}} id="tables_five5" /> <label for="tables_five5">5</label></li>
                <li><input type="checkbox" value="3" name="tables_no[]" {{in_array(3,$tables_no)?
                                            'checked' : ''}} id="tables_three3" /> <label for="tables_three3">3</label></li>
                <li><input type="checkbox" value="4" name="tables_no[]" {{in_array(4,$tables_no)?
                                            'checked' : ''}} id="tables_four4" /> <label for="tables_four4">4</label></li>
                <li><input type="checkbox" value="8" name="tables_no[]" {{in_array(8,$tables_no)?
                                            'checked' : ''}} id="tables_eight8" /> <label for="tables_eight8">8</label></li>
                <li><input type="checkbox" value="6" name="tables_no[]" {{in_array(6,$tables_no)?
                                            'checked' : ''}} id="tables_six6" /> <label for="tables_six6">6</label></li>
                <li><input type="checkbox" value="7" name="tables_no[]" {{in_array(7,$tables_no)?
                                            'checked' : ''}} id="tables_seven7" /> <label for="tables_seven7">7</label></li>
                <li><input type="checkbox" value="9" name="tables_no[]" {{in_array(9,$tables_no)?
                                            'checked' : ''}} id="tables_nine9" /> <label for="tables_nine9">9</label></li>
                <li><input type="checkbox" value="11" name="tables_no[]" {{in_array(11,$tables_no)?
                                            'checked' : ''}} id="tables_eleven11" /> <label for="tables_eleven11">11</label></li>
                <li><input type="checkbox" value="12" name="tables_no[]" {{in_array(12,$tables_no)?
                                            'checked' : ''}} id="tables_twelve12" /> <label for="tables_twelve12">12</label></li>
                <li><input type="checkbox" value="13" name="tables_no[]" {{in_array(13,$tables_no)?
                                            'checked' : ''}} id="tables_thirteen13" /> <label for="tables_thirteen13">13</label></li>
                <li><input type="checkbox" value="14" name="tables_no[]" {{in_array(14,$tables_no)?
                                            'checked' : ''}} id="tables_fourteen14" /> <label for="tables_fourteen14">14</label></li>
                <li><input type="checkbox" value="15" name="tables_no[]" {{in_array(15,$tables_no)?
                                            'checked' : ''}} id="tables_fifteen15" /> <label for="tables_fifteen15">15</label></li>
                <li><input type="checkbox" value="16" name="tables_no[]" {{in_array(16,$tables_no)?
                                            'checked' : ''}} id="tables_sixteen16" /> <label for="tables_sixteen16">16</label></li>
            </ul>
        </div>
    </div>

    <!-- Room -->
    <div class="form-group">
        <label for="roomName">Room</label>
        <input
            name="room_no"
            type="text"
            class="form-control"
            id="roomName"
            value="{{$class->room_no}}"
            placeholder="E.g., Room 101"
        />
    </div>

    <!-- Checkboxes -->
    <div class="form-group form-check">
        <input
            type="checkbox"
            class="form-check-input"
            id="requireGuardianEmail2"
        />
        <label class="form-check-label custom-checkbox-label" for="requireGuardianEmail2">
            Require students to enter a guardian's email address
        </label>
    </div>
    <div class="form-group form-check">
        <input
            type="checkbox"
            class="form-check-input"
            id="requireClassCode2"
        />
        <label class="form-check-label custom-checkbox-label" for="requireClassCode2">
            Require students to enter a class code
        </label>
    </div>
    </div>
    <div class="modal-footer px-0 pb-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update class</button>
    </div>
</form>
<li class="form-group main-row list-group d-none">
    <div class="p-2 border rounded-sm">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text cursor-pointer move-icon">
                    <i class="fa fa-arrows-alt"></i>
                </div>
            </div>

            <input type="text" name="sections[record][title]"
                   class="form-control w-auto flex-grow-1"
                   placeholder="{{ trans('admin/main.choose_title') }}"/>

            <div class="input-group-append">
                <button type="button" class="btn remove-btn btn-danger"><i
                        class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
</li>
