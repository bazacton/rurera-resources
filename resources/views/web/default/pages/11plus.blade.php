@extends(getTemplate().'.layouts.app')

@push('styles_top')
<style>
    .gallery-sub-header {
        min-height:780px; 
    }
    .lms-newsletter {
        background-color: #f18700;
    }
    .bg-deepskyblue {
        background-color: #46b7e9;
    }
    .bg-blue {
        background-color: #3d358b;
    }
    .bg-yellow {
        background-color: #f6b801;
    }
    .bg-deepyellow {
        background-color: #f18700;
    }
    .bg-lightblue {
        background-color: #7679ee;
    }
    .bg-orange {
        background-color: #f35b05;
    }
</style>
@endpush

@section('content')
<section class="content-section">
    <section class="position-relative job-singup-sub-header gallery-sub-header page-sub-header pb-90 pt-80 mb-70">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 col-md-6 col-lg-6">
                    <h1 class="font-72 font-weight-bold"><span class="text-scribble mr-10">11 Plus</span> and Entrance Exams</h1>
                    <h2 class="mb-15 font-30">Unlocking Opportunities: Ace the 11 Plus Exam and Secure Your Future!</h2>
                    <p class="font-19">Assessing a student's academic ability and determining their eligibility for admission to selective
                    secondary schools or grammar schools.</p>
                    <ul class="mb-30 p-0">
                        <li class="mb-10 font-19">
                            <img src="../assets/default/svgs/mobile.svg" alt="mobile" title="mobile" width="25" height="25" itemprop="image" loading="eager">11+ Learning practice
                        </li>
                        <li class="mb-10 font-19">
                            <img src="../assets/default/svgs/preparation.svg" alt="preparation" title="preparation" width="25" height="25" itemprop="image" loading="eager">11+  Assessment & 11+ Tests
                        </li>
                        <li class="mb-10 font-19">
                            <img src="../assets/default/svgs/graphic-design.svg" alt="graphic-design" title="graphic-design" width="25" height="25" itemprop="image" loading="eager">11+ Quizzes & Exam practices
                        </li>
                        <li class="font-19">
                            <img src="../assets/default/svgs/book-opend.svg" alt="book-opend" title="book-opend" width="25" height="25" itemprop="image" loading="eager">Score guarantee - 100% Results</li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <a href="{{url('/')}}/11plus" class="btn-primary rounded-pill">11 plus exams</a>
                        <a href="{{url('/')}}/11plus" class="btn-primary rounded-pill ml-15">More practices</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-grid-gallery has-fix-height">
            <div class="masonry-grid">
                <div class="row">
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus">
                                <img src="../assets/default/img/11-plus/paper1.png" alt="sats-header" title="sats-header" width="192" height="157" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a>
                            </figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus">
                                <img src="../assets/default/img/11-plus/paper2.png" alt="sats-header" title="sats-header" width="192" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper3.png" alt="sats-header" title="sats-header" width="192" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper4.png" alt="sats-header" title="sats-header" width="192" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper5.png" alt="sats-header" title="sats-header" width="192" height="193" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper6.png" alt="sats-header" title="sats-header" width="192" height="228" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper1.png" alt="sats-header" title="sats-header" width="192" height="157" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper2.png" alt="sats-header" title="sats-header" width="100%" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper3.png" alt="sats-header" title="sats-header" width="100%" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper4.png" alt="sats-header" title="sats-header" width="100%" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper5.png" alt="sats-header" title="sats-header" width="192" height="193" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper6.png" alt="sats-header" title="sats-header" width="192" height="228" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper1.png" alt="sats-header" title="sats-header" width="192" height="157" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper2.png" alt="sats-header" title="sats-header" width="192" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper3.png" alt="sats-header" title="sats-header" width="192" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper4.png" alt="sats-header" title="sats-header" width="192" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper5.png" alt="sats-header" title="sats-header" width="192" height="193" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper6.png" alt="sats-header" title="sats-header" width="192" height="228" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper3.png" alt="sats-header" title="sats-header" width="192" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/11plus"><img src="../assets/default/img/11-plus/paper1.png" alt="sats-header" title="sats-header" width="192" height="157" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="lms-features-section mx-w-100 mt-20">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title">
                        <h2 itemprop="title" class="mb-5 font-40">What Our 11 Plus (11+) Entrance Exam Practices Covers</h2>
                        <p itemprop="description" class="font-19 text-gray">Tailored Curriculum, 11+ resources and Preparation for 11+ exam Success and elevate the excellence.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure><i class="svg-icon bg-blue">
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier2" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M7 8C7 6.34315 8.34315 5 10 5C11.6569 5 13 6.34315 13 8C13 9.65685 11.6569 11 10 11C8.34315 11 7 9.65685 7 8ZM13.506 11.5648C14.4282 10.6577 15 9.39565 15 8C15 5.23858 12.7614 3 10 3C7.23858 3 5 5.23858 5 8C5 9.39827 5.57396 10.6625 6.49914 11.5699C3.74942 12.5366 2 14.6259 2 17C2 17.5523 2.44772 18 3 18C3.55228 18 4 17.5523 4 17C4 15.2701 5.93073 13 10 13C11.9542 13 13.4554 13.5451 14.4579 14.2992C14.8992 14.6311 15.5262 14.5425 15.8581 14.1011C16.1901 13.6598 16.1015 13.0328 15.6601 12.7008C15.0431 12.2368 14.3206 11.851 13.506 11.5648ZM19 14.5C19.5523 14.5 20 14.9477 20 15.5V18H22.5C23.0523 18 23.5 18.4477 23.5 19C23.5 19.5523 23.0523 20 22.5 20H20V22.5C20 23.0523 19.5523 23.5 19 23.5C18.4477 23.5 18 23.0523 18 22.5V20H15.5C14.9477 20 14.5 19.5523 14.5 19C14.5 18.4477 14.9477 18 15.5 18H18V15.5C18 14.9477 18.4477 14.5 19 14.5Z" fill="#fff"></path> </g></svg>
                    </i></figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">11 plus (11+) mock exams</h3>
                            <p itemprop="description" class="font-18 text-dark">By providing resources, learning
                                materials, and success stories, we encourages pupils to adopt a growth mindset and believe
                                in their potential for growth and improvement.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure><i class="svg-icon bg-yellow">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 204.692 204.692" xml:space="preserve" width="64px" height="64px" fill="#fff"><g id="SVGRepo_bgCarrier2" stroke-width="0"></g><g id="SVGRepo_tracerCarrier3" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path style="fill:#fff;" d="M167.998,49.589l8.274-8.274l3.661,3.661l4.649-4.645l-12.376-12.376l-4.649,4.649l4.066,4.062 l-8.36,8.36c-16.194-14.48-37.535-23.309-60.912-23.309c-50.455,0-91.49,41.042-91.49,91.486c0,50.447,41.035,91.49,91.49,91.49 c50.433,0,91.479-41.046,91.479-91.49C193.831,88.505,183.967,66.066,167.998,49.589z M106.102,198.029v-16.201h-7.516v16.201 c-43.995-1.918-79.393-37.471-81.082-81.526h13.303v-6.578H17.504c1.696-44.213,37.342-79.855,81.562-81.551v14.14h6.567v-14.14 c44.21,1.696,79.855,37.338,81.548,81.551h-12.354v6.578h12.354C185.485,160.558,150.097,196.11,106.102,198.029z"></path> </g> <g> <path style="fill:#fff;" d="M106.102,102.538V52.695c0-2.133-1.374-3.851-3.071-3.851c-1.707,0-3.078,1.714-3.078,3.851 v49.413c-5.125,1.102-8.976,5.655-8.976,11.098c0,5.458,3.851,10.01,8.976,11.109v4.95c0,2.137,1.374,3.858,3.078,3.858 c1.696,0,3.071-1.721,3.071-3.858v-5.379c4.413-1.56,7.598-5.73,7.598-10.679C113.7,108.257,110.515,104.087,106.102,102.538z"></path> </g> <g> <rect x="99.066" y="0" style="fill:#fff;" width="6.567" height="17.501"></rect> </g> </g> </g> </g></svg>
                    </i></figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">11+ Time constrained practices</h3>
                            <p itemprop="description" class="font-18 text-dark">Rurera team
                                emphasizes its importance through motivational content, practical tools, and techniques, it
                                encourages pupils to dedicate themselves to their goals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure><i class="svg-icon bg-deepyellow">
                        <svg fill="#fff" height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 503.607 503.607" xml:space="preserve" stroke="#fff"><g id="SVGRepo_bgCarrier3" stroke-width="0"></g><g id="SVGRepo_tracerCarrier4" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="translate(1 1)"> <g> <g> <path d="M250.803-1C112.311-1-1,111.472-1,250.803s113.311,251.803,251.803,251.803s251.803-113.311,251.803-251.803 S389.295-1,250.803-1z M250.803,485.82c-129.259,0-235.016-105.757-235.016-235.016S121.544,15.787,250.803,15.787 S485.82,121.544,485.82,250.803S380.062,485.82,250.803,485.82z"></path> <path d="M250.803,32.574c-120.026,0-218.229,98.203-218.229,218.229c0,120.866,98.203,218.23,218.229,218.23 s218.23-97.364,218.23-218.23C469.033,130.777,370.829,32.574,250.803,32.574z M452.057,242.41h-66.119v-57.915 c0-37.771-31.056-67.987-67.987-67.987h-58.754V49.55C363.351,53.875,447.731,138.255,452.057,242.41z M334.738,259.197h34.413 v58.754c0,28.538-23.502,51.2-51.2,51.2h-58.754v-34.413c0-5.036-3.357-8.393-8.393-8.393s-8.393,3.357-8.393,8.393v34.413 h-57.915c-28.538,0-51.2-23.502-51.2-51.2v-58.754h33.574c5.036,0,8.393-3.357,8.393-8.393s-3.357-8.393-8.393-8.393h-33.574 v-57.915c0-28.538,23.502-51.2,51.2-51.2h57.915v33.574c0,5.036,3.357,8.393,8.393,8.393s8.393-3.357,8.393-8.393v-33.574h58.754 c28.538,0,51.2,23.502,51.2,51.2v57.915h-34.413c-5.036,0-8.393,3.357-8.393,8.393S329.702,259.197,334.738,259.197z M242.41,49.55v66.958h-57.915c-37.771,0-67.987,31.056-67.987,67.987v57.915H49.55C53.875,138.255,138.255,53.875,242.41,49.55z M49.55,259.197h66.958v58.754c0,36.931,30.216,67.148,67.987,67.148h57.915v66.958 C138.255,447.731,53.875,363.351,49.55,259.197z M259.197,452.057v-66.958h57.915c37.77,0,67.987-30.216,68.826-67.148v-58.754 h66.119C447.731,363.351,363.351,447.731,259.197,452.057z"></path> <path d="M284.377,242.41h-25.18v-25.18c0-5.036-3.357-8.393-8.393-8.393s-8.393,3.357-8.393,8.393v25.18h-25.18 c-5.036,0-8.393,3.357-8.393,8.393s3.357,8.393,8.393,8.393h25.18v25.18c0,5.036,3.357,8.393,8.393,8.393 s8.393-3.357,8.393-8.393v-25.18h25.18c5.036,0,8.393-3.357,8.393-8.393S289.413,242.41,284.377,242.41z"></path> </g> </g> </g> </g></svg>
                    </i></figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">Target based identification</h3>
                            <p itemprop="description" class="font-18 text-dark">By sharing stories of
                                successful individuals who have overcome failures, we inspires pupils to persevere and
                                maintain a positive self-identity.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure><i class="svg-icon bg-lightblue">
                            <svg fill="#fff" height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 484.39 484.39" xml:space="preserve"><g id="SVGRepo_bgCarrier4" stroke-width="0"></g><g id="SVGRepo_tracerCarrier5" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M284.198,0h-64.24c-41.966,0-81.715,16.851-111.924,47.448C78.595,77.266,61.711,117.65,61.711,158.247v58.309 l-19.572,97.859c-0.588,2.938,0.173,5.984,2.072,8.301c1.899,2.317,4.737,3.66,7.733,3.66h36.179 c5.012,4.478,5.149,10.266,4.278,22.371c-1.208,16.801-3.034,42.192,35.191,56.092c1.095,0.398,2.252,0.602,3.417,0.602h108.597 v78.948h20v-88.948c0-5.523-4.477-10-10-10H132.82c-22.386-8.631-21.617-19.299-20.469-35.26 c0.924-12.85,2.189-30.448-15.327-42.126c-1.643-1.095-3.572-1.68-5.547-1.68H64.143l17.374-86.87 c0.129-0.646,0.194-1.302,0.194-1.961v-59.299C81.711,83.309,145.02,20,219.958,20h64.24c76.23,0,138.247,62.017,138.247,138.247 V484.39h20V158.247C442.445,70.989,371.456,0,284.198,0z"></path> <path d="M378.087,247.078h-64.123v-78.831h64.123v-20h-64.123V84.123h-20v64.123h-78.831V84.123h-20v64.123H131.01v20h64.123 v78.831H131.01v20h64.123v64.124h20v-64.124h78.831v64.124h20v-64.124h64.123V247.078z M293.964,247.078h-78.831v-78.831h78.831 V247.078z"></path> <path d="M155.717,138.597c16.413,0,29.767-13.353,29.767-29.766s-13.354-29.766-29.767-29.766 c-16.413,0-29.766,13.353-29.766,29.766C125.952,125.244,139.304,138.597,155.717,138.597z M155.717,99.065 c5.386,0,9.767,4.381,9.767,9.766s-4.381,9.766-9.767,9.766c-5.385,0-9.766-4.381-9.766-9.766 C145.952,103.446,150.333,99.065,155.717,99.065z"></path> <path d="M254.549,237.429c16.413,0,29.766-13.353,29.766-29.766c0-16.414-13.353-29.767-29.766-29.767 s-29.767,13.353-29.767,29.767C224.782,224.076,238.136,237.429,254.549,237.429z M254.549,197.895 c5.385,0,9.766,4.381,9.766,9.767c0,5.385-4.381,9.766-9.766,9.766c-5.386,0-9.767-4.381-9.767-9.766 S249.163,197.895,254.549,197.895z"></path> <path d="M353.38,276.727c-16.413,0-29.767,13.353-29.767,29.767c0,16.413,13.354,29.766,29.767,29.766 c16.413,0,29.766-13.353,29.766-29.766C383.146,290.08,369.793,276.727,353.38,276.727z M353.38,316.26 c-5.386,0-9.767-4.381-9.767-9.766c0-5.385,4.381-9.767,9.767-9.767c5.385,0,9.766,4.381,9.766,9.767 C363.146,311.879,358.765,316.26,353.38,316.26z"></path> <polygon points="362.321,179.638 348.438,193.52 334.556,179.638 320.414,193.78 334.296,207.662 320.414,221.544 334.556,235.687 348.439,221.805 362.321,235.687 376.463,221.544 362.582,207.663 376.463,193.78 "></polygon> <polygon points="241.854,142.984 255.736,129.102 269.618,142.984 283.76,128.842 269.878,114.96 283.76,101.078 269.618,86.935 255.736,100.817 241.854,86.935 227.711,101.078 241.593,114.96 227.711,128.842 "></polygon> <polygon points="175.728,274.714 161.846,288.597 147.964,274.714 133.822,288.857 147.704,302.739 133.822,316.622 147.964,330.763 161.846,316.881 175.728,330.763 189.871,316.622 175.989,302.739 189.871,288.857 "></polygon> </g> </g> </g> </g></svg>
                    </i></figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">11 plus (11+) exam practice resources</h3>
                            <p itemprop="description" class="font-18 text-dark">Self-assessment
                                tools, and a supportive community help pupils address their flaws constructively and develop
                                a growth-oriented mindset.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-orange">
                                <svg width="64px" height="64px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier5" stroke-width="0"></g><g id="SVGRepo_tracerCarrier6" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.5 7.75C15.0858 7.75 14.75 8.08579 14.75 8.5C14.75 8.91421 15.0858 9.25 15.5 9.25V7.75ZM19.5 9.25C19.9142 9.25 20.25 8.91421 20.25 8.5C20.25 8.08579 19.9142 7.75 19.5 7.75V9.25ZM20.25 8.5C20.25 8.08579 19.9142 7.75 19.5 7.75C19.0858 7.75 18.75 8.08579 18.75 8.5H20.25ZM18.75 12.5C18.75 12.9142 19.0858 13.25 19.5 13.25C19.9142 13.25 20.25 12.9142 20.25 12.5H18.75ZM20.0303 9.03033C20.3232 8.73744 20.3232 8.26256 20.0303 7.96967C19.7374 7.67678 19.2626 7.67678 18.9697 7.96967L20.0303 9.03033ZM12.5 15.5L11.9697 16.0303C12.2626 16.3232 12.7374 16.3232 13.0303 16.0303L12.5 15.5ZM9.5 12.5L10.0303 11.9697C9.73744 11.6768 9.26256 11.6768 8.96967 11.9697L9.5 12.5ZM4.96967 15.9697C4.67678 16.2626 4.67678 16.7374 4.96967 17.0303C5.26256 17.3232 5.73744 17.3232 6.03033 17.0303L4.96967 15.9697ZM15.5 9.25H19.5V7.75H15.5V9.25ZM18.75 8.5V12.5H20.25V8.5H18.75ZM18.9697 7.96967L11.9697 14.9697L13.0303 16.0303L20.0303 9.03033L18.9697 7.96967ZM13.0303 14.9697L10.0303 11.9697L8.96967 13.0303L11.9697 16.0303L13.0303 14.9697ZM8.96967 11.9697L4.96967 15.9697L6.03033 17.0303L10.0303 13.0303L8.96967 11.9697Z" fill="#fff"></path> </g></svg>
                            </i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">Progress reports</h3>
                            <p itemprop="description" class="font-18 text-dark">By providing
                                resources, guidance, and gamified learning experiences, it helps pupils develop strategies
                                to effectively overcome challenges, fostering a mindset that embraces growth through
                                tackling difficult tasks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure><i class="svg-icon bg-deepskyblue">
                            <svg fill="#fff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 64.734 64.734" xml:space="preserve"><g id="SVGRepo_bgCarrier6" stroke-width="0"></g><g id="SVGRepo_tracerCarrier7" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M59.583,49.727c-0.447-1.121-1.344-1.346-2.463-1.793c-5.152-2.016-9.408-2.688-14.336-4.479 c-0.449-0.225-1.793-1.121-1.793-3.586c0-1.119-0.225-1.566-1.344-1.566c-0.447,0-0.226,0-0.447-0.672 c-0.449-2.24-0.225-3.584-0.225-3.809s0.446-0.672,0.446-0.896c1.793-2.24,2.24-5.152,2.24-6.719c0,0,0.226,0.224,0.672-0.673 c0.447-1.119,0.447-1.345,0.896-2.688c0.447-0.896,0.447-2.912-0.672-2.912c-0.672,0.225-0.449,0-0.449-0.896 c0-2.688,0-3.809,0-6.496c-0.223-2.239-1.567-3.584-2.688-4.48c-1.568-1.12-2.018-1.344-2.689-2.016 c-0.672-0.448-0.446-1.12,0-2.017c0.447-0.447,0.896-0.672,1.119-0.896c0,0-0.223,0-0.447,0c4.257,2.24,7.169,6.72,7.169,11.647 v3.584c-0.673,0.448-1.119,2.017-1.119,3.36c0,1.119,0.226,2.016,0.446,2.688l-0.895,4.703c-0.447,0.225-0.674,0.673-0.674,1.12 c0,0.672,0.449,1.345,1.346,1.345c0.672,0,1.344-0.448,1.344-1.345c0-0.447-0.225-0.672-0.446-0.896l0.896-4.031 c1.119-0.225,2.016-1.793,2.016-3.584c0-1.345-0.448-2.688-1.12-3.36V14.78C46.366,6.495,39.647,0,31.582,0 c-8.063,0-14.783,6.72-14.783,14.783v3.584c-0.673,0.448-1.12,2.017-1.12,3.36c0,2.016,0.896,3.584,2.016,3.584 c1.12,0,2.016-1.568,2.016-3.584c0-1.345-0.447-2.688-1.119-3.36v-3.584c0-7.392,6.048-13.216,13.216-13.216 c2.016,0,4.032,0.448,5.825,1.344c-0.448,0-4.033,0.448-5.376,0.896c-2.688,0.672-5.601,1.568-7.841,3.584 c-1.567,1.12-2.912,2.688-3.136,4.928c0,1.119,0,4.703,0,6.496c0,0.447,0,0.896-0.448,0.672c-1.567,0-0.672,2.464-0.447,2.688 c0.447,1.567,0.672,1.792,0.896,2.688c0.224,0.896,0.448,0.673,0.448,0.673c0.448,1.792,1.12,4.929,2.464,6.721 c0.224,0.225,0.448,0.448,0.448,0.896c-0.225,1.119-0.225,2.688-0.448,3.81c0,0.224-0.224,0.672-0.448,0.672 c-1.12,0-1.344,0.673-1.12,1.566c0,1.793-1.12,3.137-1.792,3.584c-2.464,1.12-11.199,3.584-13.888,4.479 c-2.016,0.447-2.464,1.119-2.688,2.016l-2.465,6.271c10.977,0,16.576,6.721,28,8.736c0,0,1.568,0.447,2.688,0.447 s2.688-0.447,2.688-0.447c11.647-2.018,19.713-8.736,27.774-8.736L59.583,49.727z"></path> </g> </g> </g></svg>
                        </i></figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">Professional support</h3>
                            <p itemprop="description" class="font-18 text-dark">By actively seeking
                                feedback and providing guidance on receiving it positively, pupils can view feedback as an
                                opportunity for growth rather than personal criticism. It also incorporates features for
                                pupils to give feedback, ensuring continuous improvement and user satisfaction.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="exames-section mt-50 mb-80 pt-70 pb-90 bg-exames">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title mb-50 text-center">
                        <h2 itemprop="title" class="text-white font-40">Explore 11 Plus and Entrance Exam Resources</h2>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="exame-listing">
                        <ul class="exame-holder">
                            <li class="exame-list border-right">
                                <a href="{{url('/')}}/11plus" class="d-flex align-items-center">
                                    <div class="img-holder">
                                        <figure>
                                            <span class="icon-savg">
                                                <img src="/assets/default/svgs/ex-english.svg" alt="ex-english">
                                            </span>
                                        </figure>
                                    </div>
                                    <div class="text-holder">
                                        <h3 itemprop="title" class="post-title font-19 font-weight-bold">
                                            English
                                        </h3>
                                        <p itemprop="description" class="font-16 text-gray">Patterns, sequencing and geometry</p>
                                    </div>
                                </a>
                            </li>
                            <li class="exame-list">
                                <a href="{{url('/')}}/11plus" class="d-flex align-items-center">
                                    <div class="img-holder">
                                        <figure>
                                            <span class="icon-savg">
                                                <img src="/assets/default/svgs/ex-math.svg" alt="ex-math">
                                            </span>
                                        </figure>
                                    </div>
                                    <div class="text-holder">
                                        <h3 itemprop="title" class="post-title font-19 font-weight-bold">
                                            Maths
                                        </h3>
                                        <p itemprop="description" class="font-16 text-gray">Patterns, sequencing and geometry</p>
                                    </div>
                                </a>
                            </li>
                            <li class="exame-list border-right">
                                <a href="{{url('/')}}/11plus" class="d-flex align-items-center">
                                    <div class="img-holder">
                                        <figure>
                                            <span class="icon-savg">
                                                <img src="/assets/default/svgs/ex-computing.svg" alt="ex-computing">
                                            </span>
                                        </figure>
                                    </div>
                                    <div class="text-holder">
                                        <h3 itemprop="title" class="post-title font-19 font-weight-bold">
                                            Computing
                                        </h3>
                                        <p itemprop="description" class="font-16 text-gray">Patterns, sequencing and geometry</p>
                                    </div>
                                </a>
                            </li>
                            <li class="exame-list">
                               <a href="{{url('/')}}/11plus" class="d-flex align-items-center">
                                    <div class="img-holder">
                                        <figure>
                                            <span class="icon-savg">
                                                <img src="/assets/default/svgs/ex-science.svg" alt="ex-science">
                                            </span>
                                        </figure>
                                    </div>
                                    <div class="text-holder">
                                        <h3 itemprop="title" class="post-title font-19 font-weight-bold">
                                            Science
                                        </h3>
                                        <p itemprop="description" class="font-16 text-gray">Patterns, sequencing and geometry</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="lms-counter-section pb-10 bg-counter">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title mb-50 text-center">
                        <h2 itemprop="section title" class="mb-10 font-40">Real practice, Proven Results</h2>
                        <p itemprop="description" class="font-19 text-gray">It’s hugely trusted by parents, recommended by teachers and loved by students</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="counter-holder row mt-100">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-30 position-relative">
                            <div class="lms-counter-card counter-purple-bg text-white">
                                <strong itemprop="size" class="custom-counter">100</strong><span itemprop="plus" class="plus-icons">+</span>
                                <p itemprop="description" class="font-16 text-white">
                                    11+ practices
                                </p>
                            </div>
                            <div class="svg-shapes-top">
                                <span class="icon-svg"><svg width="64px" height="64px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier11" stroke-width="0"></g><g id="SVGRepo_tracerCarrier12" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M3.415.189a1 1 0 011.1-.046l15 9a1 1 0 010 1.714l-15 9a1 1 0 01-1.491-1.074L4.754 11H10a1 1 0 100-2H4.753l-1.73-7.783A1 1 0 013.416.189z" fill="#5C5F62"></path></g></svg></span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-30">
                            <div class="lms-counter-card counter-yellow-bg text-white">
                            <strong itemprop="size" class="custom-counter">5000</strong><span itemprop="plus" class="plus-icons">+</span>
                            <p itemprop="description"  class="font-16 text-white" >Questions</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-30 position-relative">
                            <div class="svg-shapes-bottom"><span class="icon-svg"><svg width="64px" height="64px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier12" stroke-width="0"></g><g id="SVGRepo_tracerCarrier13" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M3.415.189a1 1 0 011.1-.046l15 9a1 1 0 010 1.714l-15 9a1 1 0 01-1.491-1.074L4.754 11H10a1 1 0 100-2H4.753l-1.73-7.783A1 1 0 013.416.189z" fill="#5C5F62"></path></g></svg></span></div>
                            <div class="lms-counter-card counter-orange-bg text-white">
                                <strong itemprop="size" class="custom-counter">60</strong><span itemprop="plus" class="plus-icons">+</span>
                                <p itemprop="description" class="font-16 text-white">
                                    Cities
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
			
    <section class="pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-50 text-center">
                            <h2 class="mb-10 font-40">Redefining Personalized learning</h2>
                            <p class="font-16 text-gray">Rurera provides powerful resources that align with student's specific interests and learning goals.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/classes" itemprop="url">
                                    <img src="../assets/default/img/ks1-year1-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/classes" itemprop="url" class="text-dark-charcoal">KS1, KS2 Courses</a>
                            </h3>
                            <p itemprop="description">Explore wide range of kS1, KS2 courses, Tests, practices, assessments, resources and much more.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/11-plus" itemprop="url">
                                    <img src="../assets/default/img/entrance-exams.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/11-plus" itemprop="url" class="text-dark-charcoal">Entrance Examination Preps</a>
                            </h3>
                            <p itemprop="description">Rurera offers a chance to prepare for 11+ Exam, Independent Exams, ISEB and CAT4.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/sats-preparation" itemprop="url">
                                    <img src="../assets/default/img/sats-home-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/sats-preparation" itemprop="url" class="text-dark-charcoal">SATs Exam Preps</a>
                            </h3>
                            <p itemprop="description">We are providing opportunity to practice SATs exam, SATs papers, SATs assessments SATs tests online.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/analytics" itemprop="url">
                                    <img src="../assets/default/img/analytics-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/panel/analytics" itemprop="url" class="text-dark-charcoal">Analytics</a>
                            </h3>
                            <p itemprop="description">It provides complete insights and data analysis of Total scores, Total attempts, Earned Scores and Earned Coins.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/register" itemprop="url">
                                    <img src="../assets/default/img/quick-assesments.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/register" itemprop="url" class="text-dark-charcoal">Quick Assessments</a>
                            </h3>
                            <p itemprop="description">It offers quick assessments and answers to questions are automatically assessed for personalized feedback.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/register" itemprop="url">
                                    <img src="../assets/default/img/feature-automated-marking.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/register" itemprop="url" class="text-dark-charcoal">Automated Marking</a>
                            </h3>
                            <p itemprop="description">Automated marking data allows for quick identification of students who may require additional support or challenges.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/register" itemprop="url">
                                    <img src="../assets/default/img/insights-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/register" itemprop="url" class="text-dark-charcoal">Breakthrough insights</a>
                            </h3>
                            <p itemprop="description">It significantly allows to identify student’s learning strengths and areas needing improvement.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/book-shelf" itemprop="url">
                                    <img src="../assets/default/img/book-shelf-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/book-shelf" itemprop="url" class="text-dark-charcoal">Children Books Online</a>
                            </h3>
                            <p itemprop="description">Discover vast collection of children books and track reading progress and activity, like percentage and time.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/timestables-practice" itemprop="url">
                                    <img src="../assets/default/img/timetables-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/timestables-practice" itemprop="url" class="text-dark-charcoal">TimeTables Revision</a>
                            </h3>
                            <p itemprop="description">Offering interactive Multiplication and division Practices and challenges to Master TimesTables online.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/national-curriculum" itemprop="url">
                                    <img src="../assets/default/img/national-curriculum.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/national-curriculum" itemprop="url" class="text-dark-charcoal">National Curriculum</a>
                            </h3>
                            <p itemprop="description">If offer Skill plans, Courses Topics and Test preparations as per defined curricula.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/register" itemprop="url">
                                    <img src="../assets/default/img/performance-monitering.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/register" itemprop="url" class="text-dark-charcoal">Performance Monitoring</a>
                            </h3>
                            <p itemprop="description">It provides an easy overview of performance trends who may need additional support or recognition.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/register" itemprop="url">
                                    <img src="../assets/default/img/progress-tracking.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/register" itemprop="url" class="text-dark-charcoal">Progress Tracking</a>
                            </h3>
                            <p itemprop="description">Rurera offers a user-friendly platform where teachers can analyze individual and group performance trends.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/weekly-planner" itemprop="url">
                                    <img src="../assets/default/img/skill-plans-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/weekly-planner" itemprop="url" class="text-dark-charcoal">Skills Plan</a>
                            </h3>
                            <p itemprop="description">This involves setting goals, identifying the skills you want to acquire or improve, and planning to achieve those goals weekly or monthly.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/classes?sort=newest" itemprop="url">
                                    <img src="../assets/default/img/advance-learning-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/classes?sort=newest" itemprop="url" class="text-dark-charcoal">Advance Learning</a>
                            </h3>
                            <p itemprop="description">Rurera empowers students through courses, interactive books, exams practices and rewarding experiences.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/features" itemprop="url">
                                    <img src="../assets/default/img/teacher-empowerment-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/features" itemprop="url" class="text-dark-charcoal">Teacher Empowerment Tools</a>
                            </h3>
                            <p itemprop="description">Immediate feedback and assessment tools allow teachers to monitor student progress and identify areas that require improvement.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/contact-us" itemprop="url">
                                    <img src="../assets/default/img/protection-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/contact-us" itemprop="url" class="text-dark-charcoal">Security and Privacy</a>
                            </h3>
                            <p itemprop="description">Rurera protect student data, maintain trust and comply with data protection and privacy regulations.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/register" itemprop="url">
                                    <img src="../assets/default/img/rewards-features.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/register" itemprop="url" class="text-dark-charcoal">Win Rewards</a>
                            </h3>
                            <p itemprop="description">Avail an awesome opportunity to Earn Rewards, Coin points, Win and later redeem to toys.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                            <figure class="mb-20">
                                <a href="{{url('/')}}/products" itemprop="url">
                                    <img src="../assets/default/img/rewards-store-feature.jpg" alt="feature image" height="143" width="276">
                                </a>
                            </figure>
                            <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                                <a target="_blank" href="{{url('/')}}/products" itemprop="url" class="text-dark-charcoal">Rewards Store</a>
                            </h3>
                            <p itemprop="description">Students can redeem coin points and exchange trending toys with every practice via Rurera toy store.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <section class="lms-column-section lms-accordion-section w-100 pb-60 pt-60" style="background-color: #f6f0ea; max-width: 100%;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title mb-35 text-center"><h2 itemprop="section title" class="font-40">Why choose Rurera assessments ?</h2></div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div itemscope="" itemtype="https://schema.org/accordion" class="accordion lms-accordion-modern" id="accordion-modern">
                        <div class="card active">
                            <div class="card-header" id="heading-1">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                    <span itemprop="size">#1</span>Adaptive Assessments Testing
                                </button>
                            </div>
                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        It helps schools to offer adaptive assessments that adjust the difficulty of questions as below, emerging, expected, exceeding and challenge which is based on a student's previous responses, history,
                                        reports and performance providing a more tailored learning experience.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/adpative-assessment.jpg" alt="company sats" title="company sats" width="100%" height="auto" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-2">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                    <span itemprop="size">#2</span>Quick Results via automated marking
                                </button>
                            </div>
                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Real-time marking data allows for quick identification of students who may require additional support or challenges. Students receive instant personalized feedback for every question and learning nugget.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-quiz.jpg" alt="company performance" title="company performance" width="100%" height="auto" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-3">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                    <span itemprop="size">#3</span>Diverse Question Formats
                                </button>
                            </div>
                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Online assessments can include a variety of question types, from multiple choice to audio types offering a more comprehensive evaluation of student knowledge.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/all-in-1-platform.jpg" alt="company rewards" title="company rewards" width="100%" height="auto" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-4">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                    <span itemprop="size">#4</span>Timely Reporting
                                </button>
                            </div>
                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">Online platforms often provide real-time reporting to both students and teachers, allowing for prompt interventions and support.</p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-sats.jpg" alt="company insights" title="company insights" width="100%" height="auto" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-5">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                    <span itemprop="size">#5</span>Breakthrough insights at every level
                                </button>
                            </div>
                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Students and their parents can access a dashboard that displays their live progress in various subjects. It allows them to identify their strengths and areas needing improvement. Parents can monitor
                                        completed work, track their child's progress, and view assigned tasks.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-insights.jpg" alt="company quiz" title="company quiz" width="100%" height="auto" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-6">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-6" aria-expanded="true" aria-controls="collapse-6">
                                    <span itemprop="size">#6</span>Students Engagement
                                </button>
                            </div>
                            <div id="collapse-6" class="collapse" aria-labelledby="heading-6" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Ignite student’s passion more to join your school. A fantastic learning experience is possible using interactive challenges, Online Test practices, Entrance Exams preparations and rewarding them with
                                        trending toys.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-performance.jpg" alt="company curriculum" width="100%" height="auto" title="company curriculum" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-6">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-7" aria-expanded="true" aria-controls="collapse-7">
                                    <span itemprop="size">#7</span>Reward points
                                </button>
                            </div>
                            <div id="collapse-7" class="collapse" aria-labelledby="heading-7" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Unlock Knowledge and Reward Yourself with Exciting Toys. It implies through continuous learning and improvement, students can increase their chances of winning playful toys. We believe in recognizing and
                                        appreciating your loyalty and engagement.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-rewards.jpg" alt="company curriculum" width="100%" height="auto" title="company curriculum" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	@php $faq_items =  isset( $faq_items )? $faq_items : array();@endphp
    <section class="py-70" style="background-color: #fff">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30">
                        <h2 class="mt-0 mb-10 font-40">Frequently asked questions</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-md-12 mx-auto">
                    <div class="mt-0">
                        <div class="lms-faqs mx-w-100 mt-0">
                            <div id="accordion">
                                @if( !empty( $faq_items ))
                                    
                                    @foreach( $faq_items as $itemData)
                                        <div class="card">
                                            <div class="card-header" id="headingonsix">
                                                <h3 class="mb-0">
                                                    <button class="btn btn-link font-18 font-weight-bold" data-toggle="collapse" data-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">{{isset( $itemData['title'])? $itemData['title'] : '' }}</button>
                                                </h3>
                                            </div>
                                            <div id="collapsesix" class="collapse" aria-labelledby="headingsix"
                                                data-parent="#accordion">
                                                <div class="card-body"><p>{{isset( $itemData['description'])? $itemData['description'] : '' }}</p></div>
                                            </div>
                                        </div>
                                    @endforeach
                                
                                    @else 
                                    <div class="card">
                                        <div class="card-header" id="headingonsix">
                                            <h3 class="mb-0">
                                                <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">What is the 11 Plus exam?</button>
                                            </h3>
                                        </div>
                                        <div id="collapsesix" class="collapse" aria-labelledby="headingsix"
                                            data-parent="#accordion">
                                            <div class="card-body"><p>The 11 Plus exam is a selective entrance examination taken by students around the age of 10 or 11 in uk.
                                            It assesses students' aptitude in key subjects to determine their suitability for admission to selective
                                            secondary schools or grammar schools</p></div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h3 class="mb-0"><button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">What subjects are covered in the 11 Plus exam?</button></h3>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordion">
                                            <div class="card-body"><p>The 11 Plus exam typically includes English comprehension, grammar, vocabulary, creative writing,
                                            mathematics, and reasoning skills.</p></div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingseven">
                                            <h3 class="mb-0">
                                                <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">How do I prepare my child for the 11 Plus exam?</button>
                                            </h3>
                                        </div>
                                        <div id="collapseseven" class="collapse" aria-labelledby="headingseven" data-parent="#accordion">
                                            <div class="card-body"><p>Preparation for the 11 Plus exam usually involves a combination of practice materials, and
                                            familiarization with the exam format. Solving past papers, improving time management skills, and
                                            receiving targeted coaching are common preparation methods</p></div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading8">
                                            <h3 class="mb-0">
                                                <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">When should my child start preparing for the 11 Plus exam?</button>
                                            </h3>
                                        </div>
                                        <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
                                            <div class="card-body"><p>The ideal preparation time for the 11 Plus exam varies depending on the child and their academic
                                            progress.</p></div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading9">
                                            <h3 class="mb-0">
                                                <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">Are there different types of 11 Plus exams?</button>
                                            </h3>
                                        </div>
                                        <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion">
                                            <div class="card-body"><p>Yes, there are different types of 11 Plus exams conducted by various exam boards or organizations. The
                                            content, format, and style of questions may vary between regions and schools. It's important to
                                            research and understand the specific requirements of the schools your child is interested in.</p></div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading10">
                                            <h3 class="mb-0">
                                                <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">Can my child retake the 11 Plus exam if they don't pass?</button>
                                            </h3>
                                        </div>
                                        <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion">
                                            <div class="card-body"><p>The policies regarding retaking the 11 Plus exam vary depending on the region and school. Some schools
                                            allow students to retake the exam, while others do not. It is advisable to check with the individual
                                            schools or local education authorities for their specific retake policies.</p></div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading11">
                                            <h3 class="mb-0">
                                                <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">What happens if my child passes the 11 Plus exam?</button>
                                            </h3>
                                        </div>
                                        <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion">
                                            <div class="card-body"><p>If your child passes the 11 Plus exam, they may be eligible for admission to selective secondary schools
                                            or grammar schools. However, admission is not solely based on exam results and may also consider
                                            other factors such as school capacity and distance from your home</p></div>
                                        </div>
                                    </div>
                                        
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<section class="marquee-sec py-70" style="background-color: #fbfbfb;">
        <div class="section-title text-center mb-50">
            <h2 class="mb-10 font-40">They <span class="text-primary">love</span> Able Pro, Now your turn 😍</h2>
            <div class="reviews-holder mt-15">
                <span class="reviews-lable">
                    <span class="icon-box"><img src="/assets/default/svgs/star-white.svg" alt="" /></span>Trustpilot
                </span>
                <span class="reviews-star d-block">
                    <span class="icon-box"><img src="/assets/default/svgs/star-white.svg" alt="" /></span><span class="icon-box"><img src="/assets/default/svgs/star-white.svg" alt="" /></span>
                    <span class="icon-box"><img src="/assets/default/svgs/star-white.svg" alt="" /></span><span class="icon-box"><img src="/assets/default/svgs/star-white.svg" alt="" /></span>
                    <span class="icon-box"><img src="/assets/default/svgs/star-white.svg" alt="" /></span>
                </span>
                <div class="reviews-info">
                    <span class="reviews-score">Trustscore<em>4.8</em></span><a href="#" class="reviews-number"><em>322</em>Trustscore</a>
                </div>
            </div>
        </div>
        <div class="marquee-list marquee-inner-wrapper">
            <div class="marquee-list-holder marquee__inner_animation marquee-right-to-left mb-20">
                <ul>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œAmazing template for fast develop.ðŸ’Žâ€œ</span><span class="author-name">devbar -<span>Customizability</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œCode quality is amazing. Design is astonishing. very easy to customize..ðŸ˜â€œ</span><span class="author-name">shahabblouch -<span>Code Quality</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œThis has been one of my favorite admin dashboards to use. ðŸ˜â€œ</span><span class="author-name">htmhell -<span>Design Quality</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œExcellent support, if we need any modification, they are doing immediatelyâ€œ</span><span class="author-name">hemchandkodali -<span>Customer Support</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œFor developers like me, this is the total package! ðŸ˜ â€œ</span><span class="author-name">sumaranjum -<span>Feature Availability</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œI love the looks of Able Pro 7.0. I really like the colors you guys have chosen for this theme. It looks really nice.. ðŸ’Žâ€œ</span>
                                            <span class="author-name">ritelogic -<span>Other</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œThe author is very nice and solved my problem inmediately ðŸ˜ â€œ</span><span class="author-name">richitela -<span>Customer Support</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œVery universal admin templateâ€œ</span><span class="author-name">Genstiade -<span>Feature Availability</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œI have it running on a medium size site that is geared towards. My customers love the design and speed in which pages load.â€œ</span>
                                            <span class="author-name">RizzoFrank -<span>Design Quality</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œAn amazing template. Very good design, good quality code and also very good customer support. ðŸ’Žâ€œ</span>
                                            <span class="author-name">hemchandkodali -<span>Customer Support</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="marquee-list marquee-inner-wrapper-v2">
            <div class="marquee-list-holder marquee__inner_animation marquee-left-to-right">
                <ul>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œPerfect for my need. Elegant look n feel with blazing fast code. ðŸ’Žâ€œ</span><span class="author-name">ThemeShakers -<span>Feature Availability</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œExcellent template! It's also very well organized and easy to find our way..â€œ</span><span class="author-name">Danlec -<span>Code Quality</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œTheir Team is great and working great always. when you need help...â€œ</span><span class="author-name">manojkumarhr -<span>Customer Support</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œWonderful theme, full of features, with ton of addons.â€œ</span><span class="author-name">momennoor -<span>Design Quality</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œAn excellent theme. It contains everything you need to open complex projects. ðŸ˜ â€œ</span><span class="author-name">Vihtora -<span>Other</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œExcellent template. Very complete. ðŸ’Žâ€œ</span><span class="author-name">mundodascasas -<span>Code Quality</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œIt serves my all purposes well and one thing it was great because i didn't require designer at all.â€œ</span>
                                            <span class="author-name">amit1134 -<span>Code Quality</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œI highly recommend Able pro admin template and team phoenixcoded item. It was best purchase on themeforest for me.â€œ</span>
                                            <span class="author-name">vishalmg -<span>Flexibility</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œ5 stars are for the excellent support, that is brilliant! The design is very cool and...!â€œ</span><span class="author-name">ab69aho -<span>Code Quality</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="marquee-card">
                            <div class="card-body">
                                <div class="card-content">
                                    <a href="#">
                                        <span class="card-media"><img src="/avatar/svgA16395287444009177.png" alt="" /></span>
                                        <span class="card-text">
                                            <span class="car-discription">â€œAn amazing template. Very good design, good quality code and also very good customer support. ðŸ’Žâ€œ</span>
                                            <span class="author-name">hemchandkodali -<span>Customer Support</span></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

	@php
$packages_only = isset( $packages )? $packages : array();
$show_details = isset( $show_details )? $show_details : true;
@endphp
<section class="lms-setup-progress-section lms-membership-section mb-0 pt-70 pb-60"  data-currency_sign="{{getCurrencySign()}}" style="background-color: #fff;">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-12 text-center">
				<div class="section-title text-center mb-40">
					<h2 itemprop="title" class="font-40 text-dark-charcoal mb-0">Choose the right plan for you</h2>
					<p class="font-19 pt-10">Save more with annual pricing</p>
				</div>
			</div>
			<div class="col-12 col-lg-12 text-center">
				<div class="plan-switch-holder">
					<div class="plan-switch-option">
						<span class="switch-label">Pay Monthly</span>
						<div class="plan-switch">
							<div class="custom-control custom-switch"><input type="checkbox" name="disabled" class="custom-control-input subscribed_for-field" value="12" id="iNotAvailable" /><label class="custom-control-label" for="iNotAvailable"></label></div>
						</div>
						<span class="switch-label">Pay Yearly</span>
					</div>
					<div class="save-plan"><span class="font-18 font-weight-500">Save 25%</span></div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-12 mx-auto">
				<div class="row">

					@include('web.default.pricing.packages_list',['subscribes' => array(), 'packages_only' => $packages_only, 'show_details' => $show_details])

				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal fade lms-choose-membership" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <div class="tab-content subscription-content" id="nav-tabContent">
                </div>
            </div>
        </div>
    </div>
</div>	
<section class="lms-newsletter py-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="newsletter-inner">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-8">
                            <div class="section-title">
                                <h2 itemprop="title" class="mb-10 text-white font-40">Kickstart your 11 plus exam Prep today</h2>
                                <p itemprop="description" class="mb-0 text-white font-16">
                                    Let us help you achieve the score you deserve and unlock <br/>
                                    doors to your future academic success.
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="form-field position-relative text-right">
                                <button class="rounded rounded-pill bg-white">
                                    <a href="{{url('/')}}/membership"
                                        style="color:var(--gray-dark);">View our plans</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
<script src="/assets/default/js/parts/counter.js"></script>
@endpush
