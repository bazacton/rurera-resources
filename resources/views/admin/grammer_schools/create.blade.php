@extends('admin.layouts.app')

@push('styles_top')
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
@endpush


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{!empty($grammerSchoolObj) ? $grammerSchoolObj->title: trans('admin/main.new') }} Grammer School</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{ trans('admin/main.dashboard') }}</a>
                </div>
                <div class="breadcrumb-item active"><a href="/admin/grammer_schools">Grammer School</a>
                </div>
                <div class="breadcrumb-item">{{!empty($grammerSchoolObj) ?trans('/admin/main.edit'): trans('admin/main.new') }}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin/grammer_schools/{{ !empty($grammerSchoolObj) ? $grammerSchoolObj->id.'/store' : 'store' }}"
                                  method="Post" class="glossary_form">
                                {{ csrf_field() }}

                                <!-- At a glance -->
                                <h4>At a glance</h4>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-field">
                                            <label for="schoolName">School Name</label>
                                            <input type="text" name="school_name" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->school_name : ''}}" class="form-control" id="schoolName" required>
                                        </div>

                                        <div class="invalid-feedback">School Name is required.</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-field">
                                            <label for="schoolName">School overview</label>
                                            <textarea name="school_overview" class="form-control summernote-editor-fix" id="school_overview">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->school_overview : ''}}</textarea>
                                        </div>

                                        <div class="invalid-feedback">School Name is required.</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-field">
                                            <label for="schoolName">About School</label>
                                            <textarea name="about_school" class="form-control summernote-editor-fix" id="about_school">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->about_school : ''}}</textarea>
                                        </div>

                                        <div class="invalid-feedback">School Name is required.</div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="localAuthority">Local authority / county area</label>
                                            <select class="form-control " name="local_authority" id="local_authority" required>
                                                @if(!empty(local_authorities_list()))
                                                    @foreach(local_authorities_list() as $authority_title)
                                                        <option value="{{$authority_title}}" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->local_authority === $authority_title) ? 'selected' : '' }}>{{$authority_title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="feesType">Fees Type</label>
                                            <div class="select-holder">
                                                <select class="form-control" name="fees_type" id="feesType" required>
                                                    <option value="State-funded" {{ (!isset($grammerSchoolObj->fees_type) || $grammerSchoolObj->fees_type === 'State-funded') ? 'selected' : '' }}>State-funded</option>
                                                    <option value="Paid" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->fees_type == 'Paid') ? 'selected' : ''}}>Paid</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="invalid-feedback">Please select fees type.</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="boarding">Boarding</label>
                                            <div class="select-holder">
                                                <select class="form-control" name="boarding" id="boarding" required>
                                                    <option value="Day school" {{ (!isset($grammerSchoolObj->fees_type) || $grammerSchoolObj->fees_type === 'Day school') ? 'selected' : '' }}>Day school</option>
                                                    <option value="Boarding" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->fees_type == 'Boarding') ? 'selected' : ''}}>Boarding</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="invalid-feedback">Please select boarding type.</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="types">Types</label>
                                            <div class="select-holder">
                                                <select class="form-control " name="boarding_types" id="types" required>
                                                    <option  value="Mixed Boys and Girls" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->boarding_types === 'Mixed Boys and Girls') ? 'selected' : '' }}>Mixed Boys and Girls</option>
                                                    <option  value="Girls only" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->boarding_types == 'Girls only') ? 'selected' : ''}}>Girls only</option>
                                                    <option  value="Boys Only" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->boarding_types == 'Boys Only') ? 'selected' : ''}}>Boys Only</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="invalid-feedback">Please select type.</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="placesPerYear">Places per year</label>
                                            <input type="number" name="places_per_year" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->places_per_year : ''}}" class="form-control" id="placesPerYear" value="210" required>
                                        </div>

                                        <div class="invalid-feedback">Please enter places per year.</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="ofstedRating">Ofsted Rating</label>
                                            <div class="select-holder">
                                                <select class="form-control" name="ofsted_rating" id="ofstedRating" required>
                                                    <option value="Outstanding" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->ofsted_rating === 'Outstanding') ? 'selected' : '' }}>Outstanding</option>
                                                    <option value="Good" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->ofsted_rating == 'Good') ? 'selected' : ''}}>Good</option>
                                                    <option value="Requires Improvement" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->ofsted_rating == 'Requires Improvement') ? 'selected' : ''}}>Requires Improvement</option>
                                                    <option value="Inadequate" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->ofsted_rating == 'Inadequate') ? 'selected' : ''}}>Inadequate</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="invalid-feedback">Please select Ofsted rating.</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="competition">Competition</label>
                                            <input type="text" name="competition" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->competition : ''}}" class="form-control" id="competition" placeholder="e.g. 5-6 applicants per place" required>
                                        </div>

                                        <div class="invalid-feedback">Please enter competition details.</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="examFormat">Exam Format</label>
                                            <div class="select-holder">
                                                <select class="form-control " name="exam_format" id="exam_format" required>
                                                    <option value="GL Assessment" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->exam_format === 'GL Assessment') ? 'selected' : '' }}>GL Assessment</option>
                                                    <option value="CEM" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->exam_format == 'CEM') ? 'selected' : ''}}>CEM</option>
                                                    <option value="CSSE" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->exam_format == 'CSSE') ? 'selected' : ''}}>CSSE</option>
                                                    <option value="Kent Test" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->exam_format == 'Kent Test') ? 'selected' : ''}}>Kent Test</option>
                                                    <option value="Birmingham 11+" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->exam_format == 'Birmingham 11+') ? 'selected' : ''}}>Birmingham 11+</option>
                                                    <option value="ISEB" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->exam_format == 'ISEB') ? 'selected' : ''}}>ISEB</option>
                                                    <option value="School-specific" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->exam_format == 'School-specific') ? 'selected' : ''}}>School-specific</option>
                                                    <option value="FSCH" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->exam_format == 'FSCH') ? 'selected' : ''}}>FSCH</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="invalid-feedback">Please enter exam format.</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="catchmentArea">Catchment area</label>
                                            <div class="select-holder">

                                                <select class="form-control conditional_field_parent" name="cathment_area" id="catchmentArea" required>
                                                    <option data-target_common_class="catchment_area_fields" data-target_field_class="catchment_area_fields_yes" value="Yes" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->cathment_area === 'Yes') ? 'selected' : '' }}>Yes</option>
                                                    <option data-target_common_class="catchment_area_fields" data-target_field_class="" value="No" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->cathment_area == 'No') ? 'selected' : ''}}>No</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="invalid-feedback">Please select catchment area option.</div>
                                    </div>

                                    <div class="col-md-3 mb-3 catchment_area_fields catchment_area_fields_yes">
                                        <div class="form-field">
                                            <label for="localAuthority">List of Catchment area’s</label>
                                            <textarea name="list_of_catchment_areas" class="form-control summernote-editor-minimal" id="list_of_catchment_areas">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->list_of_catchment_areas : ''}}</textarea>
                                        </div>

                                        <div class="invalid-feedback">Local Authority is required.</div>
                                    </div>

                                    <div class="col-md-3 mb-3 catchment_area_fields catchment_area_fields_yes">
                                        <div class="form-field">
                                            <label for="localAuthority">Range (Miles)</label>
                                            <input type="number" name="catchment_areas_range" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->catchment_areas_range : ''}}" class="form-control" id="catchment_areas_range" placeholder="Range">
                                        </div>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="school_consortium">Consortium</label>
                                            <div class="select-holder">
                                                <select class="form-control " name="school_consortium" id="school_consortium" required>
                                                    @if(!empty(consortiums_list()))
                                                        @foreach(consortiums_list() as $consortium_title)
                                                            <option value="{{$consortium_title}}" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->school_consortium === $consortium_title) ? 'selected' : '' }}>{{$consortium_title}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Assessment Criteria -->
                                <h4>Assessment Criteria</h4>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="english">English</label>
                                            <div class="select-holder">
                                                <select class="form-control conditional_field_parent" name="criteria_english" id="english" required>
                                                    <option data-target_common_class="english_criteria_fields" data-target_field_class="english_details" value="Yes" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->criteria_english === 'Yes') ? 'selected' : '' }}>Yes</option>
                                                    <option data-target_common_class="english_criteria_fields" data-target_field_class="" value="No" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->criteria_english == 'No') ? 'selected' : ''}}>No</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-4 mb-3 english_criteria_fields english_details">
                                        <div class="form-field">
                                            <label for="criteria_english_details">Subject Details</label>
                                            <textarea name="criteria_english_details" class="form-control summernote-editor-minimal" id="criteria_english_details">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->criteria_english_details : ''}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="maths">Maths</label>
                                            <div class="select-holder">
                                                <select class="form-control conditional_field_parent" name="criteria_maths" id="maths" required>
                                                    <option data-target_common_class="math_criteria_fields" data-target_field_class="maths_details" value="Yes" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->criteria_maths === 'Yes') ? 'selected' : '' }}>Yes</option>
                                                    <option data-target_common_class="math_criteria_fields" data-target_field_class="" value="No" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->criteria_maths == 'No') ? 'selected' : ''}}>No</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 math_criteria_fields maths_details">
                                        <div class="form-field">
                                            <label for="criteria_maths_details">Subject Details</label>
                                            <textarea name="criteria_maths_details" class="form-control summernote-editor-minimal" id="criteria_maths_details">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->criteria_maths_details : ''}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="verbalReasoning">Verbal Reasoning</label>
                                            <div class="select-holder">
                                                <select class="form-control conditional_field_parent" name="criteria_verbal_reasoning" id="verbalReasoning" required>
                                                    <option data-target_common_class="vr_criteria_fields" data-target_field_class="vr_details" value="Yes" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->criteria_verbal_reasoning === 'Yes') ? 'selected' : '' }}>Yes</option>
                                                    <option data-target_common_class="vr_criteria_fields" data-target_field_class="" value="No" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->criteria_verbal_reasoning == 'No') ? 'selected' : ''}}>No</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-4 mb-3 vr_criteria_fields vr_details">
                                        <div class="form-field">
                                            <label for="criteria_verbal_reasoning_details">Subject Details</label>
                                            <textarea name="criteria_verbal_reasoning_details" class="form-control summernote-editor-minimal" id="criteria_verbal_reasoning_details">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->criteria_verbal_reasoning_details : ''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="nonVerbalReasoning">Non-Verbal Reasoning</label>
                                            <div class="select-holder">
                                                <select class="form-control conditional_field_parent" name="criteria_non_verbal_reasoning" id="nonVerbalReasoning" required>
                                                    <option data-target_common_class="nvr_criteria_fields" data-target_field_class="nvr_details" value="Yes" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->criteria_non_verbal_reasoning === 'Yes') ? 'selected' : '' }}>Yes</option>
                                                    <option data-target_common_class="nvr_criteria_fields" data-target_field_class="" value="No" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->criteria_non_verbal_reasoning == 'No') ? 'selected' : ''}}>No</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3 nvr_criteria_fields nvr_details">
                                        <div class="form-field">
                                            <label for="criteria_non_verbal_reasoning_details">Subject Details</label>
                                            <textarea name="criteria_non_verbal_reasoning_details" class="form-control summernote-editor-minimal" id="criteria_non_verbal_reasoning_details">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->criteria_non_verbal_reasoning_details : ''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="additional">Additional</label>
                                            <div class="select-holder">
                                                <select class="form-control conditional_field_parent" name="criteria_additional" id="additional" required>
                                                    <option data-target_common_class="additional_subject_fields" data-target_field_class="additional_subject" value="Yes" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->criteria_additional === 'Yes') ? 'selected' : '' }}>Yes</option>
                                                    <option data-target_common_class="additional_subject_fields" data-target_field_class="" value="No" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->criteria_additional == 'No') ? 'selected' : ''}}>No</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-3 mb-3 additional_subject_fields additional_subject">
                                        <div class="form-field">
                                            <label for="additional_subject_name">Subject Name</label>
                                            <input type="text" name="additional_subject_name" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->additional_subject_name : ''}}" class="form-control" id="additional_subject_name">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 additional_subject_fields additional_subject">
                                        <div class="form-field">
                                            <label for="additional_subject_details">Subject Details</label>
                                            <textarea name="additional_subject_details" class="form-control summernote-editor-minimal" id="additional_subject_details">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->additional_subject_details : ''}}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-3 mb-3 additional_subject_fields additional_subject">
                                        <div class="form-field">
                                            <label for="additional_subject_name">Additional Subject 2</label>
                                            <input type="text" name="additional2_subject_name" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->additional2_subject_name : ''}}" class="form-control" id="additional2_subject_name">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 additional_subject_fields additional_subject">
                                        <div class="form-field">
                                            <label for="additional2_subject_details">Subject Details 2</label>
                                            <textarea name="additional2_subject_details" class="form-control summernote-editor-minimal" id="additional2_subject_details">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->additional2_subject_details : ''}}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-3 mb-3 additional_subject_fields additional_subject">
                                        <div class="form-field">
                                            <label for="additional3_subject_name">Additional Subject 3</label>
                                            <input type="text" name="additional3_subject_name" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->additional3_subject_name : ''}}" class="form-control" id="additional3_subject_name">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 additional_subject_fields additional_subject">
                                        <div class="form-field">
                                            <label for="additional3_subject_details">Subject Details 3</label>
                                            <textarea name="additional3_subject_details" class="form-control summernote-editor-minimal" id="additional3_subject_details">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->additional3_subject_details : ''}}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-3 mb-3 additional_subject_fields additional_subject">
                                        <div class="form-field">
                                            <label for="additional4_subject_name">Additional Subject 4</label>
                                            <input type="text" name="additional4_subject_name" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->additional4_subject_name : ''}}" class="form-control" id="additional4_subject_name">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 additional_subject_fields additional_subject">
                                        <div class="form-field">
                                            <label for="additional4_subject_details">Subject Details 4</label>
                                            <textarea name="additional4_subject_details" class="form-control summernote-editor-minimal" id="additional4_subject_details">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->additional4_subject_details : ''}}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <!-- Location -->
                                <h4>Location</h4>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="address">Complete address</label>
                                            <input type="text" name="complete_address" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->complete_address : ''}}" class="form-control" id="address" required>
                                        </div>

                                        <div class="invalid-feedback">Address is required.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="mapLat">Map LAT</label>
                                            <input type="text" name="map_lat" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->map_lat : ''}}" class="form-control" id="mapLat" required>
                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="mapLog">Map LOG</label>
                                            <input type="text" name="map_long" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->map_long : ''}}" class="form-control" id="mapLog" required>
                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="phone">Phone number</label>
                                            <input type="tel" name="phone_number" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->phone_number : ''}}" class="form-control" id="phone" required>
                                        </div>

                                        <div class="invalid-feedback">Phone number is required.</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->email : ''}}" class="form-control" id="email" required>
                                        </div>

                                        <div class="invalid-feedback">Valid email is required.</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="website">Website link</label>
                                            <input type="url" name="website_link" value="{{isset($grammerSchoolObj->id)? $grammerSchoolObj->website_link : ''}}" class="form-control" id="website" required>
                                        </div>

                                        <div class="invalid-feedback">Valid website URL is required.</div>
                                    </div>
                                </div>

                                <!-- Offset report (Ofsted) -->
                                <h4>Ofsted Report</h4>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="qualityEducation">The quality of education</label>
                                            <div class="select-holder">
                                                <select class="form-control" name="quality_of_education" id="qualityEducation" required>
                                                    <option value="Outstanding" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->quality_of_education === 'Outstanding') ? 'selected' : '' }}>Outstanding</option>
                                                    <option value="Good" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->quality_of_education == 'Good') ? 'selected' : ''}}>Good</option>
                                                    <option value="Requires Improvement" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->quality_of_education == 'Requires Improvement') ? 'selected' : ''}}>Requires Improvement</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="behaviour">Behaviour and attitude</label>
                                            <div class="select-holder">
                                                <select class="form-control" name="behaviour_attitude" id="behaviour" required>
                                                    <option value="Outstanding" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->behaviour_attitude === 'Outstanding') ? 'selected' : '' }}>Outstanding</option>
                                                    <option value="Good" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->behaviour_attitude == 'Good') ? 'selected' : ''}}>Good</option>
                                                    <option value="Requires Improvement" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->behaviour_attitude == 'Requires Improvement') ? 'selected' : ''}}>Requires Improvement</option>

                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="personalDev">Personal development</label>
                                            <div class="select-holder">
                                                <select class="form-control" name="personal_development" id="personalDev" required>
                                                    <option value="Outstanding" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->personal_development === 'Outstanding') ? 'selected' : '' }}>Outstanding</option>
                                                    <option value="Good" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->personal_development == 'Good') ? 'selected' : ''}}>Good</option>
                                                    <option value="Requires Improvement" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->personal_development == 'Requires Improvement') ? 'selected' : ''}}>Requires Improvement</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="leadership">Leadership and management</label>
                                            <div class="select-holder">
                                                <select class="form-control" name="leadership_management" id="leadership" required>
                                                    <option value="Outstanding" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->leadership_management === 'Outstanding') ? 'selected' : '' }}>Outstanding</option>
                                                    <option value="Good" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->leadership_management == 'Good') ? 'selected' : ''}}>Good</option>
                                                    <option value="Requires Improvement" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->leadership_management == 'Requires Improvement') ? 'selected' : ''}}>Requires Improvement</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="sixForm">Six form provision</label>
                                            <div class="select-holder">
                                                <select class="form-control" name="six_form_provision" id="sixForm" required>
                                                    <option value="Outstanding" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->six_form_provision === 'Outstanding') ? 'selected' : '' }}>Outstanding</option>
                                                    <option value="Good" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->six_form_provision == 'Good') ? 'selected' : ''}}>Good</option>
                                                    <option value="Requires Improvement" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->six_form_provision == 'Requires Improvement') ? 'selected' : ''}}>Requires Improvement</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="inspectionDate">Inspection date</label>
                                            <div class="datepicker-field">
                                                <i class="fa fa-calendar-week"></i>
                                                <input type="text" name="inspection_date" value="{{isset($grammerSchoolObj->id)? dateTimeFormat($grammerSchoolObj->inspection_date, 'Y-m-d') : ''}}" class="form-control rureradatepicker rurera-req-field" id="inspectionDate" required>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="overallRating">Overall rating</label>
                                            <div class="select-holder">
                                                <select class="form-control" name="overall_rating" id="overallRating" required>
                                                    <option value="Outstanding" {{ (!isset($grammerSchoolObj->id) || $grammerSchoolObj->overall_rating === 'Outstanding') ? 'selected' : '' }}>Outstanding</option>
                                                    <option value="Good" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->overall_rating == 'Good') ? 'selected' : ''}}>Good</option>
                                                    <option value="Requires Improvement" {{(isset($grammerSchoolObj->id) && $grammerSchoolObj->overall_rating == 'Requires Improvement') ? 'selected' : ''}}>Requires Improvement</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">


                                        <div class="form-field">
                                            <label for="reportFile">Ofsted report File</label>


                                            <button
                                                type="button"
                                                class="input-group-text rurera-file-manager"
                                                data-input="ofsted_report_file"
                                                data-preview="preview_img-report_file"
                                                data-image_attr='{
                                                        "upload_type":"gallery",
                                                        "upload_dir":"public",
                                                        "upload_path":"/admin_images",
                                                        "is_multiple":false,
                                                        "preview_div":"preview_img-report_file",
                                                        "hidden_field":"<input name=\"ofsted_report_file\" type=\"hidden\" id=\"ofsted_report_file\" placeholder=\"Upload Image\">",
                                                        "field_name":"ofsted_report_file"
                                                    }'
                                                data-gallery_fields='{"gallery_type":"gallery","folder_name":"admin_images"}'
                                            >
                                                <i class="fa fa-upload"></i>
                                            </button>

                                            <div class="preview_img-report_file">
                                                @if(isset($grammerSchoolObj->ofsted_report_file) && $grammerSchoolObj->ofsted_report_file != '')
                                                    @php
                                                      $report_file = $grammerSchoolObj->ofsted_report_file;
                                                        $extension = strtolower(pathinfo($report_file, PATHINFO_EXTENSION));
                                                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
                                                    @endphp
                                                    @if(in_array($extension, $imageExtensions))
                                                        <img src="{{ $report_file }}" style="width:80px;">
                                                    @else
                                                        <a href="{{ $report_file }}" target="_blank">View file</a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-field">
                                            <label for="schoolName">Ofsted Report summary</label>
                                            <textarea name="ofsted_report_summary" class="form-control summernote-editor-fix" id="ofsted_report_summary">{{isset($grammerSchoolObj->id)? $grammerSchoolObj->ofsted_report_summary : ''}}</textarea>
                                        </div>

                                        <div class="invalid-feedback">School Name is required.</div>
                                    </div>
                                </div>

                                <!-- Important Dates -->
                                <h4>Important Dates</h4>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="regOpen">Registration opens</label>
                                            <div class="datepicker-field">
                                                <i class="fa fa-calendar-week"></i>
                                                <input type="text" name="registration_opens" value="{{isset($grammerSchoolObj->id)? dateTimeFormat($grammerSchoolObj->registration_opens, 'Y-m-d') : ''}}" class="form-control rureradatepicker rurera-req-field" id="regOpen" required>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="regClose">Registration Closes</label>
                                            <div class="datepicker-field">
                                                <i class="fa fa-calendar-week"></i>
                                                <input type="text" name="registration_closes" value="{{isset($grammerSchoolObj->id)? dateTimeFormat($grammerSchoolObj->registration_closes, 'Y-m-d') : ''}}" class="form-control rureradatepicker rurera-req-field" id="regClose" required>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="examDate">11+ Exam Date</label>
                                            <div class="datepicker-field">
                                                <i class="fa fa-calendar-week"></i>
                                                <input type="text" name="11_plus_exam_date" value="{{isset($grammerSchoolObj->id)? dateTimeFormat($grammerSchoolObj->{'11_plus_exam_date'}, 'Y-m-d') : ''}}" class="form-control rureradatepicker rurera-req-field" id="examDate" required>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="resultDate">Kent Test (Out-of-County Schools)</label>
                                            <div class="datepicker-field">
                                                <i class="fa fa-calendar-week"></i>
                                                <input type="text" name="results_date" value="{{isset($grammerSchoolObj->id)? dateTimeFormat($grammerSchoolObj->results_date, 'Y-m-d') : ''}}" class="form-control rureradatepicker rurera-req-field" id="resultDate">
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="resultPublished">Results published</label>
                                            <div class="datepicker-field">
                                                <i class="fa fa-calendar-week"></i>
                                                <input type="text" name="results_published" value="{{isset($grammerSchoolObj->id)? dateTimeFormat($grammerSchoolObj->results_published, 'Y-m-d') : ''}}" class="form-control rureradatepicker rurera-req-field" id="resultPublished" required>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="caafDeadline">CAAF applications deadline</label>
                                            <div class="datepicker-field">
                                                <i class="fa fa-calendar-week"></i>
                                                <input type="text" name="caaf_applications_deadline" value="{{isset($grammerSchoolObj->id)? dateTimeFormat($grammerSchoolObj->caaf_applications_deadline, 'Y-m-d') : ''}}" class="form-control rureradatepicker rurera-req-field" id="caafDeadline" required>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-field">
                                            <label for="offerDay">National offer day</label>
                                            <div class="datepicker-field">
                                                <i class="fa fa-calendar-week"></i>
                                                <input type="text" name="national_offer_day" value="{{isset($grammerSchoolObj->id)? dateTimeFormat($grammerSchoolObj->national_offer_day, 'Y-m-d') : ''}}" class="form-control rureradatepicker rurera-req-field" id="offerDay" required>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary mt-3" type="submit">Submit form</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
    <script src="/assets/default/js/admin/filters.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $(".conditional_field_parent").change();
            $("body").on("click", ".add-item-modal", function (t) {
                $("#inputText").val('');
                $("#sortableTableBody").html('');
                $("#add-item-modal-box").modal('show');
            });



            $("body").on("click", ".remove-row-tr", function (t) {
                $(this).closest('tr').remove();
                $(".glossary_form").submit();
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

            $(document).on('change', '.ajax-courses-dropdown', function () {
                var course_id = $(this).val();
                var chapter_id = $(this).attr('data-chapter_id');

                $.ajax({
                    type: "GET",
                    url: '/admin/webinars/chapters_by_course',
                    data: {'course_id': course_id, 'chapter_id': chapter_id},
                    success: function (return_data) {
                        $(".ajax-chapter-dropdown").html(return_data);
                        $('.ajax-chapter-dropdown').change();
                    }
                });
            });

            $(document).on('change', '.ajax-chapter-dropdown', function () {
                var chapter_id = $(this).val();
                var sub_chapter_id = $(this).attr('data-sub_chapter_id');
                $.ajax({
                    type: "GET",
                    url: '/admin/webinars/sub_chapters_by_chapter',
                    data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id},
                    success: function (return_data) {
                        $(".ajax-subchapter-dropdown").html(return_data);
                    }
                });
            });
            $(".ajax-category-courses").change();

        });

        function generateUniqueId() {
            return Math.floor(10000 + Math.random() * 90000).toString(); // Generate a 5-digit unique ID
        }

        function processData() {
            const textarea = document.getElementById("inputTextarea");
            const pastedData = textarea.value.trim();
            const container = document.getElementById("dynamicContainer");

            // Clear previous dynamically generated rows
            container.querySelectorAll(".row-container").forEach(row => row.remove());

            // Split the pasted data by new lines and then by tab characters
            const rows = pastedData.split("\n");
            rows.forEach((row, index) => {
                const columns = row.split("\t");
                const uniqueId = generateUniqueId();
                const serialNumber = index + 1;

                // Create a container div for each row
                const rowContainer = document.createElement("div");
                rowContainer.className = "row row-container align-items-center text-center border rounded mt-2 p-2";
                rowContainer.id = uniqueId;

                // Serial number
                const serialDiv = document.createElement("div");
                serialDiv.className = "col-1";
                serialDiv.textContent = serialNumber;

                // Unique ID
                const idField = document.createElement("input");
                idField.type = "text";
                idField.className = "form-control";
                idField.value = uniqueId;
                idField.name = "glossary_item_unique_id[";
                idField.readOnly = true;

                const idDiv = document.createElement("div");
                idDiv.className = "col-2";
                idDiv.appendChild(idField);

                // Glossary field
                const glossaryField = document.createElement("input");
                glossaryField.type = "text";
                glossaryField.className = "form-control";
                glossaryField.placeholder = "Glossary";
                glossaryField.name = "glossary_item_title["+uniqueId+"";
                glossaryField.value = columns[0] || "";

                const glossaryDiv = document.createElement("div");
                glossaryDiv.className = "col-3";
                glossaryDiv.appendChild(glossaryField);

                // Description field (textarea)
                const descriptionField = document.createElement("textarea");
                descriptionField.className = "form-control";
                descriptionField.placeholder = "Description";
                descriptionField.name = "glossary_item_description["+uniqueId+"";
                descriptionField.value = columns[1] || "";
                descriptionField.rows = 2;

                const descriptionDiv = document.createElement("div");
                descriptionDiv.className = "col-4";
                descriptionDiv.appendChild(descriptionField);

                // Delete button
                const deleteButton = document.createElement("button");
                deleteButton.type = "button";
                deleteButton.className = "btn btn-danger btn-sm";
                deleteButton.textContent = "Delete";
                deleteButton.onclick = () => deleteRow(uniqueId);

                const actionDiv = document.createElement("div");
                actionDiv.className = "col-2";
                actionDiv.appendChild(deleteButton);

                // Append all elements to the row container
                rowContainer.appendChild(serialDiv);
                rowContainer.appendChild(idDiv);
                rowContainer.appendChild(glossaryDiv);
                rowContainer.appendChild(descriptionDiv);
                rowContainer.appendChild(actionDiv);

                // Append the row container to the main container
                container.appendChild(rowContainer);
            });
        }

        function deleteRow(rowId) {
            const row = document.getElementById(rowId);
            if (row) {
                row.remove();
            }
        }



    </script>
@endpush
