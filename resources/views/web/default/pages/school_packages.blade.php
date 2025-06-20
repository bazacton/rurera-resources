@extends(getTemplate().'.layouts.app')

@section('content')

<section class="content-section">
    <section class="mb-0 pt-70 pb-60">
        <div class="container">
            <div class="row">
                <div class="purchase-classroom">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="classroom-content-box">
                                <div class="purchase-heading mb-30">
                                    <h2>Purchade a Classroom Licence</h2>
                                    <p>Get full access to 10,000+ interactive learning resources with real-time performance tracking.</p>
                                </div>
                                <div class="choose-subjects">
                                    <div class="row">
                                        <div class="col-12 col-lg-3">
                                            <div class="categories-boxes">
                                                <div class="categories-card">
                                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                                    <div class="categories-icon" style="background: #2d6a4f;">
                                                        <img src="/assets/default/svgs/categories-science.svg" width="300" height="300" alt="categories-science">
                                                    </div>
                                                    <a href="#"><h3 class="categories-title">Science</h3></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="categories-boxes">
                                                <div class="categories-card">
                                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                                    <div class="categories-icon" style="background: #66f;">
                                                        <img src="/assets/default/svgs/categories-history.svg" width="2560" height="2560" alt="categories-history">
                                                    </div>
                                                    <a href="#"><h3 class="categories-title">History</h3></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="categories-boxes">
                                                <div class="categories-card">
                                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                                    <div class="categories-icon" style="background: #f90;">
                                                        <img src="/assets/default/svgs/categories-education.svg" width="200" height="200" alt="categories-education">
                                                    </div>
                                                    <a href="#"><h3 class="categories-title">Religious Education</h3></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="categories-boxes">
                                                <div class="categories-card">
                                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                                    <div class="categories-icon" style="background: #f60;">
                                                        <img src="/assets/default/svgs/categories-art.svg" width="150" height="150" alt="categories-art">
                                                    </div>
                                                    <a href="#"><h3 class="categories-title">Art</h3></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="categories-boxes">
                                                <div class="categories-card">
                                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                                    <div class="categories-icon" style="background: #2d6a4f;">
                                                        <img src="/assets/default/svgs/categories-art.svg" width="150" height="150" alt="categories-science">
                                                    </div>
                                                    <a href="#"><h3 class="categories-title">SAT</h3></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="categories-boxes">
                                                <div class="categories-card">
                                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                                    <div class="categories-icon" style="background: #339;">
                                                        <img src="/assets/default/svgs/categories-math.svg" width="800" height="800" alt="categories-math">
                                                    </div>
                                                    <a href="#"><h3 class="categories-title">Maths</h3></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sats mb-30">
                                    <h3>SATs</h3>
                                    <ul class="tests-list mb-30">
                                        <li data-type="sats"><img src="/assets/default/img/assignment-logo/sats.png" alt="sats"> SATs</li>
                                        <li data-type="11plus"><img src="/assets/default/img/assignment-logo/11plus.png" alt="11plus"> 11Plus</li>
                                        <li data-type="iseb"><img src="/assets/default/img/assignment-logo/iseb.png" alt="iseb"> ISEB</li>
                                        <li data-type="cat4"><img src="/assets/default/img/assignment-logo/cat4.png" alt="cat4"> CAT 4</li>
                                        <li data-type="independent_exams"><img src="/assets/default/img/assignment-logo/independent_exams.png" alt="independent_exams"> Independent Exams</li>
                                    </ul>
                                </div>
                                <div class="times-table">
                                    <h3>Times Tables</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="times-card">
                                                <span class="icon-box">▶️</span>
                                                <div class="text-box">
                                                    <strong>Practice mode</strong>
                                                    <p>Build confidence at your own pace</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="times-card">
                                                <span class="icon-box">📄</span>
                                                <div class="text-box">
                                                    <strong>Paper-up knowledge</strong>
                                                    <p>Comprehensive times tables practice</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="times-card">
                                                <span class="icon-box">⏰</span>
                                                <div class="text-box">
                                                    <strong>Timed Tests</strong>
                                                    <p>Test your times tables against the clock</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="num-students">
                                    <h3>Specify total # of students</h3>
                                    <div class="increase-decrease-box">
                                        <button class="decrease-students">
                                            <img src="/assets/default/svgs/minus.svg" alt="minus">
                                        </button>
                                        <p>Up to <span>35</span> students</p>
                                        <button class="increase-students"><img src="/assets/default/svgs/plus.svg" alt="plus"></button>
                                    </div>
                                    <p class="detail-text">Have more than 100 students? Request a quote for pricing info.</p>
                                </div>
                                <div class="payment-method">
                                    <h3>Select payment method</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="payment-card">
                                                <input type="radio" id="credit" name="payment">
                                                <label for="credit">
                                                    <div class="icon-box">
                                                        <img src="/assets/default/svgs/credit.svg" alt="credit">
                                                    </div>
                                                    <strong>Credit card</strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="payment-card">
                                                <input type="radio" id="purchase" name="payment">
                                                <label for="purchase">
                                                    <div class="icon-box">
                                                        <img src="/assets/default/svgs/purchase.svg" alt="purchase">
                                                    </div>
                                                    <strong>Purchase order</strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="payment-card">
                                                <input type="radio" id="cheque" name="payment">
                                                <label for="cheque">
                                                    <div class="icon-box">
                                                        <img src="/assets/default/svgs/cheque.svg" alt="cheque">
                                                    </div>
                                                    <strong>Cheque</strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="btn-holder">
                                                <button type="button" class="continue-btn">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="purchase-sidebar">
                                <div class="sidebar-content">
                                    <div class="sidebar-icon">
                                        <img src="/assets/default/svgs/gift.svg" alt="gift">
                                    </div>
                                    <h3>Licences include</h3>
                                    <ul>
                                        <li><span class="icon-box">📚</span> Full Curriculum Access</li>
                                        <li><span class="icon-box">🧠</span> SATs & 11+ Practice</li>
                                        <li><span class="icon-box">🔢</span> Times Tables & Spelling</li>
                                        <li><span class="icon-box">❓</span> 10,000+ Questions</li>
                                        <li><span class="icon-box">📖</span> Online Bookshelf</li>
                                        <li><span class="icon-box">✍️</span> Spelling Exercises</li>
                                        <li><span class="icon-box">🏅</span> Rewards & Badges</li>
                                        <li><span class="icon-box">📊</span> Progress Reports</li>
                                    </ul>
                                    <div class="purchase-price">
                                        <span>Starting at</span>
                                        <strong>£299 <em>per year</em></strong>
                                    </div>
                                    <div class="contact-info">
                                        <span class="icon-box">
                                            <img src="/assets/default/svgs/phone-class.svg" alt="phone-class">
                                        </span>
                                        <strong>Questions?</strong>
                                        <a href="#">orders@edulicence.com</a>
                                        <a href="#">Subscription FAQ</a>
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
<script src="/assets/default/vendors/parallax/parallax.min.js"></script>
<script type="text/javascript">



</script>
@endpush
