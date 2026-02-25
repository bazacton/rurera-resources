@extends(getTemplate().'.layouts.app')

@push('styles_top')

@endpush

@section('content')
{!! parseShortcode('[SC_spelling-page-feature-section-f]') !!}
<section class="rurera-search-services mb-0 mt-0 pt-80 pb-60" style="background-color: #f27530;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-50">
                        <h2 class="mt-0 mb-10 text-white font-40">Improve your Spelling and Vocabulary with Rurera
                        </h2>
                        <p class="text-white font-19">
                            See how Rurera helps you master spelling and vocabulary with easy-to-use tools and personalized support.
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="process-holder">
                        <ul class="process-list d-flex justify-content-center steps-3 has-bg">
                            <li class="process-item"><a href="#" class="text-white">step 1</a></li>
                            <li class="process-item"><a href="#" class="text-white">step 2</a></li>
                            <li class="process-item"><a href="#" class="text-white">step 3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="process-card-holder">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="process-card mt-40 mb-30 text-center">
                                    <div class="process-step-number">
                                        <span>Step 1</span>
                                    </div>
                                    <div class="process-card-body">
                                        <div class="text-holder">
                                            <h3 class="post-title">Custom Word Lists</h3>
                                            <p class="mt-15">
                                                Use personalized lists to focus on the words you need to learn.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="process-card mt-40 mb-30 text-center">
                                    <div class="process-step-number">
                                        <span>Step 2</span>
                                    </div>
                                    <div class="process-card-body">
                                        <div class="text-holder">
                                            <h3 class="post-title"> Fun Learning Quizzes</h3>
                                            <p class="mt-15">
                                                Enjoy interactive activities that make spelling and vocabulary practice exciting.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="process-card mt-40 mb-30 text-center">
                                    <div class="process-step-number">
                                        <span>Step 3</span>
                                    </div>
                                    <div class="process-card-body">
                                        <div class="text-holder">
                                            <h3 class="post-title">Easy Progress Tracking</h3>
                                            <p class="mt-15">
                                                See how you’re improving with simple reports and feedback.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! parseShortcode('[SC_testimonials-section-f]') !!}
    <section class="rurera-column-section rurera-text-section exploring-curriculum mx-w-100 mt-0 mb-80 pt-70 pb-70 pr-30 pl-30" style="background-color: #7679ee;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="rurera-text-holder d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <h4 class="mb-10 font-30 align-items-center d-inline-flex text-white">
                                <span class="icon-svg mr-15">
                                    <img src="/assets/default/svgs/bulb-white.svg" height="30" width="30" alt="bulb-white">
                                </span>
                                Boost Your Spelling and Vocabulary Skills Today!
                            </h4>
                            <p class="font-16 text-white"> Unlock the power of words with our engaging resources. Build essential skills to excel and open doors to your future achievements.</p>
                        </div>
                        <div class="rurera-btn-group justify-content-center">
                            <a href="{{url('/')}}/register-as" class="rurera-btn rounded-pill text-white border-white">Try for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   {!! parseShortcode('[SC_accordion-slider-spelling-section-f]') !!}
    
    @php $faq_items = isset( $faq_items )? $faq_items : array();@endphp
    

    {!! parseShortcode('[SC_accordion-slider-section-f]') !!}
    {!! parseShortcode('[SC_ISEB-parent-account-section-f]') !!}

    @php
    $packages_only = isset( $packages )? $packages : array();
    $show_details = isset( $show_details )? $show_details : true;
    @endphp
    <section class="rurera-setup-progress-section rurera-membership-section mb-60 pt-70" data-currency_sign="{{getCurrencySign()}}" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="section-title text-center mb-40">
                        <h2 class="mb-0">Choose the right plan for you</h2>
                        <p class="pt-10">Save more with annual pricing</p>
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
                        @include('web.default.pricing.packages_list',['subscribes' => array(), 'packages_only' => $packages_only, 'show_details' => false])
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade rurera-choose-membership" id="subscriptionModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="modal-body">
                    <div class="tab-content subscription-content" id="nav-tabContent"></div>
                </div>
            </div>
        </div>
    </div>
</section>
{!! parseShortcode('[SC_trusted-partner-section-f]') !!}
{!! parseShortcode('[SC_spelling-page-faqs-f]') !!}
{!! parseShortcode('[SC_spelling-help-section-f]') !!}
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/swiper-slider/swiper-bundle.min.js"></script>
<script src="/assets/default/js/helpers.js"></script>
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
@endpush