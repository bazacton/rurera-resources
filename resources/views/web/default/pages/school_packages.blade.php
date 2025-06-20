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
                                <div class="purchase-heading">
                                    <h2>Purchade a Classroom Licence</h2>
                                    <p>Get full access to 10,000+ interactive learning resources with real-time performance tracking.</p>
                                </div>
                                <div class="choose-subjects">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Sats <span>(pick up to 3)</span></h3>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="subject-card">
                                                <input type="checkbox" id="subject1">
                                                <label for="subject1">
                                                    <div class="icon-box"></div>
                                                    <strong>English <span>Reception-Year 13</span></strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="subject-card">
                                                <input type="checkbox" id="subject2">
                                                <label for="subject2">
                                                    <div class="icon-box"></div>
                                                    <strong>Maths <span>Reception-Year 13</span></strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="subject-card">
                                                <input type="checkbox" id="subject3">
                                                <label for="subject3">
                                                    <div class="icon-box"></div>
                                                    <strong>Science <span>Years 1-9</span></strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="num-students">
                                    <h3>Specify total # of students</h3>
                                    <div class="increase-decrease-box">
                                        <button class="decrease-students"><img src="/assets/default/svgs/plus.svg" alt="plus"></button>
                                        <p>Up to <span>35</span> students</p>
                                        <button class="increase-students"><img src="/assets/default/svgs/plus.svg" alt="plus"></button>
                                    </div>
                                    <p class="detail-text">Have more than 100 students? Request a quote for pricing info.</p>
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
                                <div class="payment-method">
                                    <h3>Select payment method</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="subject-card">
                                                <input type="checkbox" id="credit">
                                                <label for="credit">
                                                    <div class="icon-box"></div>
                                                    <strong>Credit card</strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="subject-card">
                                                <input type="checkbox" id="purchase">
                                                <label for="purchase">
                                                    <div class="icon-box"></div>
                                                    <strong>Purchase order</strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="subject-card">
                                                <input type="checkbox" id="cheque">
                                                <label for="cheque">
                                                    <div class="icon-box"></div>
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
                                        <span class="icon-box"></span>
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
