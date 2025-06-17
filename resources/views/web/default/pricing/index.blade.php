@extends(getTemplate().'.layouts.app')

@push('styles_top')
    <script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
@endpush

@section('content')

<div class="lms-membership-section" data-currency_sign="{{getCurrencySign()}}">
    <section class="lms-setup-progress-section mb-0 pt-60 pb-30" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="section-title text-center mb-40">
                        <h1 itemprop="title" class="font-72 text-dark-charcoal mb-0">Choose the right plan for you</h1>
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
                        @include('web.default.pricing.packages_list',['subscribes' => $subscribes])
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-50">
                    <h2 class="font-40 text-dark-charcoal mb-10">Frequently asked questions</h2>
                    <p class="font-19">Asking the right questions is indeed a skill that requires careful consideration.</p>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-md-12">
                <div class="mt-0">
                    <div class="lms-faqs mx-w-100 mt-0">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingsix">
                                    <button class="btn btn-link font-18 font-weight-bold" data-toggle="collapse" data-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">What payment methods do you accept?</button>
                                </div>
                                <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>We accept a variety of payment methods to make it convenient for you, including all major credit and debit cards, PayPal, Skrill and other secure online payment options. This flexibility ensures that you can choose the payment method that works best for you.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Is there a free trial available?
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Yes, we offer a free trial period of five days that allows you to explore all the features and resources available on Rurera. During this trial, you can experience the full functionality of our platform and determine if it's the right fit for your child's educational needs before making any commitment.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingseven">
                                    <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                        How much does a Rurera subscription cost?
                                    </button>
                                </div>
                                <div id="collapseseven" class="collapse" aria-labelledby="headingseven" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Rurera offers three subscription options:
                                    English, Maths, and Science: £39.99 per month, or £383.90 if paid annually.
                                    Exam Prep: £59.99 per month, or £575.90 if paid annually.
                                    Exam Prep Plus: £69.99 per month, or £671.90 if paid annually.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading8">
                                    <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">What is your cancellation policy?</button>
                                </div>
                                <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>You can cancel your Rurera subscription at any time through your Parent account. Even after cancellation, you'll retain full access to all features until the end of your current billing cycle, right up to the day before your subscription is set to renew.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading9">
                                    <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                        Are there any additional fees or hidden charges?
                                    </button>
                                </div>
                                <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>No, with Rurera, the price you see is the price you pay. There are no hidden fees, surprise charges, or additional costs. We believe in transparent pricing so you can budget confidently without worrying about unexpected expenses.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading10">
                                    <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                        Can I have two children on one subscription, or do they need separate accounts?
                                    </button>
                                </div>
                                <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Each child needs their own subscription to ensure that the content is appropriately tailored to their individual learning needs. However, you can easily manage multiple students under one parent portal by signing in and clicking the "+" icon to add another child. If you require more than one subscription, feel free to contact us, and we’ll provide you with a sibling discount code to help with the cost.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading11">
                                    <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                        Can I upgrade or downgrade my plan?
                                    </button>
                                </div>
                                <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>es, we understand that your needs may change over time. That’s why we make it easy to upgrade or downgrade your plan whenever you need. Simply go to your account settings, and you can adjust your subscription to better fit your current requirements.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading12">
                                    <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                        Which devices are compatible with Rurera?
                                    </button>
                                </div>
                                <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Rurera is compatible with a wide range of modern devices and browsers, both in the UK and internationally. Whether using a desktop, laptop, Chromebook, or iPad, your child can easily access Rurera's features and resources on any of these platforms for a smooth learning experience.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading13">
                                    <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                        Can I switch from a monthly to an annual plan?
                                    </button>
                                </div>
                                <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Yes, you can switch from a monthly to an annual plan at any time. This option allows you to take advantage of the discounted annual rate, providing you with substantial savings over the course of the year. You can make this change through your account settings, and the new plan will take effect immediately or at the end of your current billing cycle, depending on your preference.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <section class="lms-have-question pt-70 pb-70 mt-50" style="background-color: #f3f6ff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 mx-auto">
                    <div class="have-question-card">
                        <div class="media-holder">
                            <figure><img src="/assets/default/img/About-Us-CTA-Image.jpg" alt="" /> <img class="attachment-img" src="/assets/default/img/hero-ornament.png" alt="" /></figure>
                        </div>
                        <div class="text-box">
                            <div class="section-title">
                            <h2 class="font-40 mb-20 font-weight-500">Got Questions? Our team is here to help reach out and let us assist you!</h2>
                            <span>Need help? Rurera's customer support team is here to assist with subscriptions, features, or technical issues. Contact us for quick and friendly support to ensure you get the most from your Rurera experience.</span>
                            </div>
                            <div class="contact-info"><a href="/contact-us" class="contact-btn">Contact Us</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade lms-choose-membership" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <div class="tab-content" id="nav-tabContent2">
                    <div class="tab-pane fade show active" id="get" role="tabpanel">
                        <div class="membership-steps-holder">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center mb-30"><h2>Explore the details of your free trial experience.</h2></div>
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="membership-steps text-center row">
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                <ul class="membership-steps-list mb-20">
                                                    <li class="active">
                                                        <a href="#">
                                                            <span class="icon-svg">
                                                                <img src="/assets/default/svgs/lock-steps.svg" alt="lock-steps">
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="icon-svg">
                                                                <img src="/assets/default/svgs/bell-steps.svg" alt="bell-steps">
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="icon-svg">
                                                                <img src="/assets/default/svgs/check-steps.svg" alt="check-steps">
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                                <div class="membership-steps">
                                                    <h3 class="mb-5">Today</h3>
                                                    <p>Begin your rurera journey and start reading for free.</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                                <div class="membership-steps">
                                                    <h3 class="mb-5">Day 5</h3>
                                                    <p>An email reminder will be sent as your free trial ends.</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                                                <div class="membership-steps">
                                                    <h3 class="mb-5">Day 7</h3>
                                                    <p>Payment processed on 6th day, cancel anytime before date.</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                <a href="#" class="nav-link mt-20 btn-primary rounded-pill" id="home-tab" data-toggle="tab" data-target="#home" aria-controls="home">
                                                    Start your 7-day free trial
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="home" role="tabpanel">
                        <div class="form-login-reading">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center mb-30"><h2>Start Reading Today</h2></div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 mx-auto">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <a href="/google" target="_blank" class="social-login mt-20 p-15 text-center d-flex align-items-center justify-content-center">
                                                    <img src="/assets/default/img/auth/google.svg" class="mr-auto" height="24" width="24" alt=" google svg" /><span class="flex-grow-1">Login with Google account</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <a href="#" target="_blank" class="social-login mt-20 p-15 text-center d-flex align-items-center justify-content-center">
                                                    <img src="/assets/default/img/auth/facebook.svg" height="24" width="24" class="mr-auto" alt="facebook svg" /><span class="flex-grow-1">Login with Facebook account</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <div class="form-separator"><span>or</span></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <div class="input-field"><input type="text" placeholder="Email Address" /></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-field"><input type="text" placeholder="password" /></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <a href="#" class="nav-link btn-primary rounded-pill mb-25 text-center" id="book-tab" data-toggle="tab" data-target="#book" aria-controls="book">continue</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                            <p class="mb-20">By Clicking on Start Free Trial, I agree to the<a href="#">Terms of Service</a>And<a href="#">Privacy Policy</a></p>
                                            <div class="subscription mb-20">
                                                <span>Already have a subscription?<a href="#" id="contact-tab" data-toggle="tab" data-target="#contact4" aria-controls="contact">log in</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="book" role="tabpanel">
                        <div class="book-detail-holder">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="book-detail">
                                            <div class="img-holder">
                                                <figure><img src="../assets/default/img/book-list1.png" width="152" height="192" alt="#" /></figure>
                                            </div>
                                            <div class="text-holder mt-20">
                                                <h2>Consult a grownup for assistance.</h2>
                                                <p class="mt-15">
                                                    <a href="#">
                                                        <span class="icon-svg">
                                                            <img src="/assets/default/svgs/sound-play.svg" height="28" width="28" alt="sound-play">
                                                        </span>
                                                    </a>
                                                    Upgrade to the Family Premium plan to read the rest of this book and enjoy unlimited access to our entire library.
                                                </p>
                                                <a href="#" class="nav-link btn-primary rounded-pill mb-25" id="subscribe-tab" data-toggle="tab" data-target="#subscribe" aria-controls="subscribe">
                                                    Get Rurera
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="subscribe" role="tabpanel">
                        <div class="subscribe-plan-holder">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center mb-40">
                                        <h2>Select the rurera Family plan for your subscription.</h2>
                                        <p class="mt-10">Pay monthly or save 44% annually after your free trial!</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="subscribe-plan position-relative bg-white d-flex flex-column align-items-center rounded-sm shadow pt-30 pb-30 px-20 mb-30">
                                            <div class="d-flex align-items-start text-primary mt-20"><span class="font-36 line-height-1">$20</span></div>
                                            <ul class="mt-20 plan-feature">
                                                <li class="mt-10">15 days of subscription</li>
                                            </ul>
                                            <button type="submit" id="contact-tab2" data-toggle="tab" data-target="#contact" aria-controls="contact" class="btn btn-primary btn-block mt-30 rounded-pill bg-none">
                                                Purchase
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="subscribe-plan position-relative bg-white d-flex flex-column align-items-center rounded-sm shadow pt-30 pb-30 px-20 mb-30">
                                            <span class="badge badge-primary badge-popular px-15 py-5">Popular</span>
                                            <div class="d-flex align-items-start text-primary mt-20"><span class="font-36 line-height-1">$100</span></div>
                                            <ul class="mt-20 plan-feature">
                                                <li class="mt-10">30 days of subscription</li>
                                            </ul>
                                            <button type="submit" id="contact-tab3" data-toggle="tab" data-target="#contact2" aria-controls="contact" class="btn btn-primary btn-block mt-30 rounded-pill">
                                                Purchase
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 price-plan-image"><img src="../assets/default/img/price-plan.png" height="166" width="270" alt="#" /></div>
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center bg-dark-green bg-dark-green">
                                        <strong>96% of subscribing parents in rurera Family report significant improvement in their child's reading skills.</strong>
                                        <div class="subscription mt-20">
                                            <span>Already have a subscription?<a href=".#" id="contact-tab5" data-toggle="tab" data-target="#contact3" aria-controls="contact">log in</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel">
                        <div class="book-form-holder">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-lg-9 col-md-9 col-sm-12 text-center">
                                        <p>No need to worry! We won't ask for payment until after your 7-day free trial ends.</p>
                                    </div>
                                    <div class="col-12 col-lg-9 col-md-9 col-sm-12">
                                        <div class="book-form mt-30">
                                            <div class="row">
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="input-field"><input type="text" placeholder="First Name" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="input-field"><input type="text" placeholder="Last Name" /></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="input-field input-card">
                                                            <span class="icon-svg">
                                                                <img src="/assets/default/svgs/card.svg" height="24" width="24" alt="card">
                                                            </span>
                                                            <input type="text" placeholder="Card Number" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                                    <p class="mb-25">
                                                        Once your 7-day free trial is over, we will automatically charge your chosen payment method $19.99 every month until you decide to cancel. You have the freedom to cancel at any time.
                                                        Keep in mind that there may be sales tax added. For instructions on how to cancel, please refer to the provided guidelines
                                                    </p>
                                                </div>
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center"><a href="/login" class="nav-link btn-primary rounded-pill mb-25">Sart Free Trial</a></div>
                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                                    <p class="mb-20">By Clicking on Start Free Trial, I agree to the<a href="#">Terms of Service</a>And<a href="#">Privacy Policy</a></p>
                                                    <div class="subscription mb-20">
                                                        <span>Already have a subscription?<a href="#">log in</a></span>
                                                    </div>
                                                    <div class="secure-server">
                                                        <figure>
                                                            <img src="/assets/default/svgs/server-lock.svg" height="26" width="26" alt="">
                                                        </figure>
                                                        <span>Secure Server<br /> SSL Encrypted</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade lms-choose-membership" id="subscriptionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-toggle="modal" data-target="#leave-option-modal"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <div class="tab-content subscription-content" id="nav-tabContent">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade leave-option-modal" id="leave-option-modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body p-30">
                <div class="leave-option-content d-flex align-items-center justify-content-center flex-column">
                    <span class="img-box">
                        <img src="/assets/default/img/leave-img.png" height="128" width="128" alt="leave-image">
                    </span>
                    <h2 class="mb-10">Wait! Don’t Miss Out on Your Free Access!</h2>
                    <p class="mb-30">Leaving now means losing your complimentary access . Are you sure you want to continue?</p>
                    <div class="leave-option-control d-flex align-items-center justify-content-center">
                        <button type="button" data-toggle="modal" data-target="#subscriptionModal" data-dismiss="modal">Leave Anyway</button>
                        <button type="button" class="stay-btn" data-target="#leave-option-modal" data-toggle="modal">Keep My Free Access</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script>
    $(".stay-btn").click(function() {
        $("body").addClass("modal-open");
    });
</script>
@endpush

