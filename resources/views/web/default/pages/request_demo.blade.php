@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/scroll-animation/animate.css">
<link rel="stylesheet" href="/assets/default/vendors/swiper-slider/swiper-bundle.min.css">
@endpush

@section('content')
<section class="content-section">
    <section class="has-curve-shape" style="background-color: var(--primary); min-height: 350px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-50">
                        <h1 itemprop="title" class="text-white font-72 font-weight-bold">We'll help get you started</h1>
                        <span class="font-14 text-white d-block pt-15">Schedule a demo with our team today!</span>
                    </div>
                    <div class="lms-btn-group custom-btn">
                        <a href="#" class="get-started-btn bg-white text-primary font-14 font-weight-500">Get started<small>for</small>free</a><a href="#" class="demo-btn text-white font-14 font-weight-500 btn-outline">Book a demo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-0 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-50">
                        <h2 itemprop="title" class="font-40">
                            Your free trial<br />
                            made simple.
                        </h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="trial-steps mb-50">
                        <ul>
                            <li class="active">
                                <span class="icon-box"><img src="/assets/default/svgs/icon-lock.svg" alt="" /></span>
                            </li>
                            <li>
                                <span class="icon-box"><img src="/assets/default/svgs/icon-bell.svg" alt="" /></span>
                            </li>
                            <li>
                                <span class="icon-box"><img src="/assets/default/svgs/icon-star.svg" alt="" /></span>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="trial-box">
                                    <h3 itemprop="title">Today</h3>
                                    <p>You get 14 days of free access to our software including all courses.</p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="trial-box">
                                    <h3 itemprop="title">Day 7</h3>
                                    <p>You get 14 days of free access to our software including all courses.</p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="trial-box">
                                    <h3 itemprop="title">Day 14</h3>
                                    <p>You get 14 days of free access to our software including all courses.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lms-btn-group"><a href="#">Get started for free now</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="custom-form-section py-70" style="background-color: #edeafd;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="section-title text-left mb-30">
                        <h2 itemprop="title" class="font-40">
                            Want to get<br />
                            started?
                        </h2>
                        <p class="mb-5">Fill in the form below to start the conversation about how Codat can help your business.</p>
                        <p>Check out our<a href="#">FAQ</a>for more information about who Codat works with</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="lms-custom-form">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group d-flex flex-column">
                                    <div class="input-field w-100"><input type="text" placeholder="First name*" /></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group d-flex flex-column">
                                    <div class="input-field w-100"><input type="text" placeholder="Last name*" /></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group d-flex flex-column">
                                    <div class="input-field w-100"><input type="text" placeholder="Company^" /></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group d-flex flex-column">
                                    <div class="input-field w-100"><input type="email" placeholder="Email*" /></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group d-flex flex-column">
                                    <div class="select-field w-100">
                                        <select>
                                            <option value="Industry*">Industry*</option>
                                            <option value="Industry*">Industry*</option>
                                            <option value="Industry*">Industry*</option>
                                            <option value="Industry*">Industry*</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group d-flex flex-column">
                                    <div class="select-field w-100">
                                        <select>
                                            <option value="Industry*">Country*</option>
                                            <option value="Industry*">Country*</option>
                                            <option value="Industry*">Industry*</option>
                                            <option value="Industry*">Country*</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group d-flex flex-column">
                                    <div class="select-field w-100">
                                        <select>
                                            <option value="Industry*">Company sieze*</option>
                                            <option value="Industry*">Country*</option>
                                            <option value="Industry*">Company sieze*</option>
                                            <option value="Industry*">Country*</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group d-flex flex-column">
                                    <div class="textarea-field w-100"><textarea placeholder="Comments*"></textarea></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-30">
                                    <div class="form-submit-field w-100"><button type="submit">Submit form</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-50 d-flex justify-content-between align-items-center">
                        <h2 itemprop="title" class="font-40">Razorpay grows with<span>you!</span></h2>
                        <span>1,50,000+ businesses</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="team-card">
                            <div class="img-box">
                                <figure>
                                    <img src="/assets/default/img/qoute-thumb-img.avif" alt="team image" height="244" width="244" />
                                    <figcaption>
                                        <div class="member-info">
                                            <h5>Sir Qaiser</h5>
                                            <span>Founder, Chimpstudio</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-card">
                            <div class="img-box">
                                <figure>
                                    <img src="/assets/default/img/qoute-thumb-img.avif" alt="team image" height="244" width="244" />
                                    <figcaption>
                                        <div class="member-info">
                                            <h5>Sir Qaiser</h5>
                                            <span>Founder, Chimpstudio</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-card">
                            <div class="img-box">
                                <figure>
                                    <img src="/assets/default/img/qoute-thumb-img.avif" alt="team image" height="244" width="244" />
                                    <figcaption>
                                        <div class="member-info">
                                            <h5>Sir Qaiser</h5>
                                            <span>Founder, Chimpstudio</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-card">
                            <div class="img-box">
                                <figure>
                                    <img src="/assets/default/img/qoute-thumb-img.avif" alt="team image" height="244" width="244" />
                                    <figcaption>
                                        <div class="member-info">
                                            <h5>Sir Qaiser</h5>
                                            <span>Founder, Chimpstudio</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-card">
                            <div class="img-box">
                                <figure>
                                    <img src="/assets/default/img/qoute-thumb-img.avif" alt="team image" height="244" width="244" />
                                    <figcaption>
                                        <div class="member-info">
                                            <h5>Sir Qaiser</h5>
                                            <span>Founder, Chimpstudio</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-card">
                            <div class="img-box">
                                <figure>
                                    <img src="/assets/default/img/qoute-thumb-img.avif" alt="team image" height="244" width="244" />
                                    <figcaption>
                                        <div class="member-info">
                                            <h5>Sir Qaiser</h5>
                                            <span>Founder, Chimpstudio</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="lms-jobsform-section lms-contact-form-section pt-70 pb-100" style="background-color: var(--primary);">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 col-md-7">
                    <div class="lms-jobsform-content">
                        <div class="section-title mb-15">
                            <h2 class="font-40 text-white m-0">Make your organization truly customer-centric</h2>
                        </div>
                        <div class="text-holder">
                            <p class="text-white font-24 mb-20 font-weight-bold">Connect with a Maze expert on an initial call to discuss how Maze Organization can help:</p>
                            <ul class="content-list mb-50">
                                <li class="text-white font-24 font-weight-500"><img src="assets/default/svgs/checkmark-circle.svg" alt="" /> Scale user research across product teams</li>
                                <li class="text-white font-24 font-weight-500"><img src="assets/default/svgs/checkmark-circle.svg" alt="" /> De-risk product investments with customer insights</li>
                                <li class="text-white font-24 font-weight-500"><img src="assets/default/svgs/checkmark-circle.svg" alt="" /> Address your organization’s research challenges</li>
                            </ul>
                        </div>
                        <div class="lms-jobsform-partners mb-100">
                            <h5 class="text-white mb-30">Top companies trust Maze for product discovery &amp; research:</h5>
                            <ul>
                                <li>
                                    <a href="#"><img src="/assets/default/img/mckinsey_logo_white.avif" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="/assets/default/img/inditex_logo_white.avif" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="/assets/default/img/bupa_logo_white.avif" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="/assets/default/img/nubank_logo_white.avif" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="/assets/default/img/cisco_logo_white.avif" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="/assets/default/img/walmart_logo_white.avif" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="/assets/default/img/ngs_logo_white.avif" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="/assets/default/img/revolut_logo_white.avif" alt="" /></a>
                                </li>
                            </ul>
                        </div>
                        <div class="jobsform-qoute">
                            <span class="qoute-icon-left"><img src="assets/default/svgs/qoute.svg" alt="" /></span>
                            <div class="qoute-box">
                                <p>Maze allows us to democratize research across multiple teams. We now collect feedback and insights 2x faster.</p>
                                <div class="author-info">
                                    <span class="img-box"><img src="/assets/default/img/qoute-thumb-img.avif" alt="" /></span>
                                    <div class="text-holder">
                                        <h5>Jean-Baptiste Kaloya</h5>
                                        <span>Head of Product Design, Bpifrance</span>
                                    </div>
                                </div>
                                <div class="qoute-images">
                                    <span class="img-box"><img src="/assets/default/img/highperformer.avif" alt="" /></span><span class="img-box"><img src="/assets/default/img/capterra_badge.avif" alt="" /></span>
                                </div>
                            </div>
                            <span class="qoute-icon-right"><img src="assets/default/svgs/qoute.svg" alt="" /></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-md-5">
                    <div class="lms-jobs-form lms-contact-form mx-auto mb-40">
                        <div class="lms-jobs-form-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-element-title mb-20"><h2 itemprop="title" class="font-30 text-dark-charcoal">Request a demo</h2></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group d-flex flex-column">
                                        <label class="input-label w-100 p-0">First name *</label>
                                        <div class="input-field w-100"><input type="text" placeholder="" /></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group d-flex flex-column">
                                        <label class="input-label w-100 p-0">Last name *</label>
                                        <div class="input-field w-100 p-0"><input type="text" placeholder="" /></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group d-flex flex-column">
                                        <label class="input-label w-100 p-0">Your email address *</label>
                                        <div class="input-field w-100"><input type="text" placeholder="" /></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group d-flex flex-column">
                                        <label class="input-label w-100 p-0">Company name *</label>
                                        <div class="input-field w-100"><input type="text" placeholder="" /></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group d-flex flex-column">
                                        <label class="input-label w-100 p-0">Job title *</label>
                                        <div class="input-field w-100"><input type="text" placeholder="" /></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group d-flex flex-column">
                                        <label class="input-label w-100 p-0">Schools: Year taught</label>
                                        <div class="checkbox-field w-100"><input type="checkbox" id="year1" /><label for="year1">Year 1</label></div>
                                        <div class="checkbox-field w-100"><input type="checkbox" id="year2" /><label for="year2">Year 2</label></div>
                                        <div class="checkbox-field w-100"><input type="checkbox" id="year3" /><label for="year3">Year 3</label></div>
                                        <div class="checkbox-field w-100"><input type="checkbox" id="year4" /><label for="year4">Year 4</label></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group d-flex flex-column">
                                        <label class="input-label w-100 p-0">Phone number *</label>
                                        <div class="input-field w-100"><input type="text" placeholder="" /></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group d-flex flex-column mb-0">
                                        <div class="checkbox-field w-100"><input type="checkbox" id="data-privacy" /><label for="data-privacy">I agree to receive other communications from Atom Learning.</label></div>
                                    </div>
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
<script src="/assets/default/vendors/scroll-animation/wow.js"></script>
<script src="/assets/default/vendors/swiper-slider/swiper-bundle.min.js"></script>
@endpush
