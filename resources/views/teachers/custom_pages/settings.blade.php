@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
<section class="section">
   

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <h1>Sciency Science</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/admin/">Dashboard</a>
                        </div>
                        <div class="breadcrumb-item">Sciency Science</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="setup-quiz-body mb-50">
                    <div class="setup-quiz-card mb-30 bg-white panel-border rounded-sm">
                        <div class="setup-quiz-header mb-15 p-20">
                            <h3>Set up your quiz</h3>
                        </div>
                        <div class="setup-quiz-content px-20 mb-25">
                            <div class="content-heading d-flex align-items-center justify-content-between mb-25">
                                <h4 class="font-weight-600 font-16 mb-0">Set a start time for activity</h4>
                                <div class="form-group custom-switches-stacked mb-0">
                                    <label class="custom-switch pl-0 mb-0">
                                        <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="fields-holder mb-25">
                                <div class="input-field">
                                    <button type="button"><img src="/assets/default/svgs/calendar.svg" alt=""></button>
                                    <input type="text" placeholder="Tuesday December 3">
                                </div>
                                <span class="comma mx-10">,</span>
                                <div class="select-field">
                                    <select>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                                <span class="comma mx-10">:</span>
                                <div class="select-field mr-10">
                                    <select>
                                        <option value="00">00</option>
                                        <option value="02">02</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                                <div class="select-field">
                                    <select>
                                        <option value="PM">PM</option>
                                        <option value="AM">AM</option>
                                    </select>
                                </div>
                            </div>
                            <span class="time-info d-block text-center">
                                <em>37 minutes</em>
                                from now
                            </span>
                        </div>
                        <div class="setup-quiz-content px-20 d-flex align-items-center justify-content-between">
                            <div class="content-heading">
                                <h4 class="font-weight-600 font-16 mb-1">Set a start time for activity</h4>
                                <span class="d-block">The number of times a student can attempt the activity.</span>
                            </div>
                            <div class="select-field">
                                <select>
                                    <option value="Unlimited">Unlimited</option>
                                    <option value="Limited">Limited</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="setup-quiz-card mb-30 bg-white panel-border rounded-sm">
                        <div class="setup-quiz-header mb-15 p-20">
                            <h3>Game Assignment Settings</h3>
                        </div>
                        <div class="setup-quiz-content px-20">
                            <div class="content-heading d-flex align-items-center justify-content-between">
                                <div class="heading-box">
                                    <h4 class="font-weight-600 font-16 mb-1">Assign to a class <span>(optional)</span></h4>
                                    <span class="d-block">You have 1 class</span>
                                </div>
                                <div class="btn-holder">
                                    <button type="button" class="select-btn">Select a class</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="setup-quiz-card mb-30 bg-white panel-border rounded-sm">
                        <div class="setup-quiz-header mb-15 p-20">
                            <h3>Mastery and learning</h3>
                        </div>
                        <div class="setup-quiz-content px-20 mb-25 disabled-quiz">
                            <div class="content-heading d-flex align-items-center justify-content-between mb-25">
                                <div class="heading-box">
                                    <h4 class="font-weight-600 font-16 mb-1">Mastery mode</h4>
                                    <span class="d-block">Achieve mastery by allowing students to reattempt incorrect awensors <br> till they reach the set goal</span>
                                </div>
                                <div class="form-group custom-switches-stacked mb-0">
                                    <label class="custom-switch pl-0 mb-0">
                                        <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <span class="timer-off d-block mb-20">Turn off <em>timer</em> to enable feature</span>
                            <div class="mastery-options">
                                <div class="field-option d-flex align-items-center justify-content-between">
                                    <span>Mastery goal</span>
                                    <div class="select-box">
                                        <select>
                                            <option value="80% accuracy">80% accuracy</option>
                                            <option value="80% accuracy">70% accuracy</option>
                                            <option value="80% accuracy">60% accuracy</option>
                                            <option value="80% accuracy">50% accuracy</option>
                                            <option value="80% accuracy">40% accuracy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="field-option d-flex align-items-center justify-content-between">
                                    <span>Reattempts per question</span>
                                    <div class="select-box">
                                        <select>
                                            <option value="2 reattempts">2 reattempts</option>
                                            <option value="2 reattempts">2 reattempts</option>
                                            <option value="2 reattempts">60% accuracy</option>
                                            <option value="2 reattempts">50% accuracy</option>
                                            <option value="2 reattempts">40% accuracy</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="setup-quiz-content px-20 mb-25">
                            <div class="content-heading d-flex align-items-center justify-content-between">
                                <div class="heading-box">
                                    <h4 class="font-weight-600 font-16 mb-1">Redemption questions</h4>
                                    <span class="d-block">Allow students to reattemt a few incorrect questions.</span>
                                </div>
                                <div class="form-group custom-switches-stacked mb-0">
                                    <label class="custom-switch pl-0 mb-0">
                                        <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setup-quiz-content px-20 mb-25">
                            <div class="content-heading d-flex align-items-center justify-content-between">
                                <div class="heading-box">
                                    <h4 class="font-weight-600 font-16 mb-1">Redemption quiz</h4>
                                    <span class="d-block">Allow students to awensor all incorrect questions at the end to improve accuracy.</span>
                                </div>
                                <div class="form-group custom-switches-stacked mb-0">
                                    <label class="custom-switch pl-0 mb-0">
                                        <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setup-quiz-content px-20 d-flex align-items-center justify-content-between">
                            <div class="content-heading">
                                <h4 class="font-weight-600 font-16 mb-1">Adaptive Question Bank Mode</h4>
                                <span class="d-block">Creates distince set of questions for every quiz attempt. <a href="#">See how it works</a></span>
                            </div>
                            <div class="select-field">
                                <select>
                                    <option value="Unlimited">Off</option>
                                    <option value="Limited">On</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white panel-border rounded-sm setup-quiz-btn p-10">
                        <button type="submit" class="assign-btn">Assign</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts_bottom')


@endpush
