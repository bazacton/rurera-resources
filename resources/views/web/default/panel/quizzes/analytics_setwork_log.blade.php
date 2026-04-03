@php namespace App\Http\Controllers\Web; @endphp
@extends(getTemplate() .'.panel.layouts.panel_layout')
@php
$i = 0; $j = 1;
$rand_id = rand(99,9999);

@endphp

@push('styles_top')
<link rel="stylesheet" href="/assets/default/css/quiz-common.css">

<style>
.field-holder.correct, .form-field.correct, .form-field.correct label {
    background: #d7fbdf !important;
    color: #333;
    border-color: #5ace75;
}
.field-holder.wrong, .form-field.wrong, .form-field.wrong label {
    background: #fae3e5 !important;
    color: #333;
    border-color: #f97d89;
}
</style>
@endpush


@section('content')

    <div class="section-title mb-15">
        <h2 class="font-22 mb-0">{{$userAssignedTopicObj->StudentAssignmentData->title}} - Summary</h2>
    </div>

    <div class="container mt-4">

        <!-- Tabs Nav -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button">
                    Home
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button">
                    Profile
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button">
                    Contact
                </button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home">
                <p>This is Home tab content.</p>
            </div>
            <div class="tab-pane fade" id="profile">
                <p>This is Profile tab content.</p>
            </div>
            <div class="tab-pane fade" id="contact">
                <p>This is Contact tab content.</p>
            </div>
        </div>

    </div>

    <div class="content-section">
        <section class="lms-quiz-section no-bg">
            <div class="container-fluid questions-data-block read-quiz-content" data-total_questions="10">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="question-step quiz-complete" style="display:none">
                            <div class="question-layout-block">
                                <div class="left-content has-bg">
                                    <h2>&nbsp;</h2>
                                    <div id="rureraform-form-1"
                                         class="rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable"
                                         _data-parent="1"
                                         _data-parent-col="0" style="display: block;">
                                        <div class="question-layout">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="question-area-block">
                            <div class="chart-summary-fields result-layout-summary">
                                <div class="sats-summary">
                                    <div class="row">
                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="sats-summary-icon">
                                                <img src="/assets/default/img/sidebar/all.svg" alt="" style="width: 100%; height: 100%;">
                                            </div>
                                            <div class="summary-text">
                                                <label>Current Smartscore</label>
                                                <div class="score">0</div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-3 bitcoin-box">
                                            <div class="sats-summary-icon" style="background-color: #8cc811;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #fff;">
                                                    <g id="Group_1264" transform="translate(-188.102 -869.102)">
                                                        <g id="Group_1262">
                                                            <g id="speedometer" transform="translate(188.102 869.102)">
                                                                <path id="Path_1547" d="M20.484 3.515a12 12 0 0 0-16.97 16.97 12 12 0 0 0 16.97-16.97zM12 22.593A10.594 10.594 0 1 1 22.593 12 10.606 10.606 0 0 1 12 22.593zm0 0" class="cls-1"></path>
                                                                <path id="Path_1548" d="M118.647 321.206a.7.7 0 0 0-.5-.206h-8.094a.7.7 0 0 0-.5.206l-2.228 2.228a.7.7 0 0 0-.012.982 9.357 9.357 0 0 0 13.569 0 .7.7 0 0 0-.012-.982zm-4.544 4.716a7.882 7.882 0 0 1-5.273-2l1.517-1.517h7.512l1.517 1.517a7.882 7.882 0 0 1-5.273 2zm0 0" class="cls-1" transform="translate(-102.104 -305.954)"></path>
                                                                <path id="Path_1549" d="M216.719 120.194a.7.7 0 0 0-.919.38l-1.606 3.876h-.091a2.063 2.063 0 1 0 1.39.541l1.606-3.877a.7.7 0 0 0-.38-.919zm-2.616 6.969a.654.654 0 1 1 .654-.654.655.655 0 0 1-.657.654zm0 0" class="cls-1" transform="translate(-202.104 -114.509)"></path>
                                                                <path id="Path_1550" d="M65.375 56A9.385 9.385 0 0 0 56 65.375a.7.7 0 0 0 .7.7h1.25a.7.7 0 1 0 0-1.406h-.516a7.933 7.933 0 0 1 1.83-4.409l.362.362a.7.7 0 1 0 .994-.994l-.362-.362a7.934 7.934 0 0 1 4.41-1.83v.516a.7.7 0 1 0 1.406 0v-.516a7.934 7.934 0 0 1 4.41 1.83l-.362.362a.7.7 0 0 0 .994.994l.362-.362a7.932 7.932 0 0 1 1.83 4.409H72.8a.7.7 0 0 0 0 1.406h1.25a.7.7 0 0 0 .7-.7A9.385 9.385 0 0 0 65.375 56zm0 0" class="cls-1" transform="translate(-53.376 -53.375)"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="summary-text">
                                                <label>Questions Answered</label>
                                                <div class="score">0</div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="sats-summary-icon" style="background-color: #fe3c30;">
                                                <img src="/assets/default/svgs/question-circle-white.svg" alt="">
                                            </div>
                                            <div class="summary-text">
                                                <label>Missed Questions</label>
                                                <div class="score">0</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="sats-summary-icon" style="background-color: #e67035;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none" style="color:#fff">
                                                    <path style="fill: #fff;" fill-rule="evenodd" clip-rule="evenodd" d="M5.01112 11.5747L6.29288 10.2929C6.68341 9.90236 7.31657 9.90236 7.7071 10.2929C8.09762 10.6834 8.09762 11.3166 7.7071 11.7071L4.7071 14.7071C4.51956 14.8946 4.26521 15 3.99999 15C3.73477 15 3.48042 14.8946 3.29288 14.7071L0.292884 11.7071C-0.0976406 11.3166 -0.0976406 10.6834 0.292884 10.2929C0.683408 9.90236 1.31657 9.90236 1.7071 10.2929L3.0081 11.5939C3.22117 6.25933 7.61317 2 13 2C18.5229 2 23 6.47715 23 12C23 17.5228 18.5229 22 13 22C9.85817 22 7.05429 20.5499 5.22263 18.2864C4.87522 17.8571 4.94163 17.2274 5.37096 16.88C5.80028 16.5326 6.42996 16.599 6.77737 17.0283C8.24562 18.8427 10.4873 20 13 20C17.4183 20 21 16.4183 21 12C21 7.58172 17.4183 4 13 4C8.72441 4 5.23221 7.35412 5.01112 11.5747ZM13 5C13.5523 5 14 5.44772 14 6V11.5858L16.7071 14.2929C17.0976 14.6834 17.0976 15.3166 16.7071 15.7071C16.3166 16.0976 15.6834 16.0976 15.2929 15.7071L12.2929 12.7071C12.1054 12.5196 12 12.2652 12 12V6C12 5.44772 12.4477 5 13 5Z" fill="#000000"></path>
                                                </svg>
                                            </div>
                                            <div class="summary-text">
                                                <label>Time Spent</label>
                                                <div class="score">0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion -->
                            <div class="accordion" id="analyticsAccordion">
                                <h3 class="font-16 font-weight-bold mb-10">Questions answered</h3>
                                <!-- SESSION 2 -->
                                <div class="card mb-30">


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


