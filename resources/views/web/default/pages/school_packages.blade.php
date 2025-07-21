@extends(getTemplate().'.layouts.app')

@section('content')

<section class="content-section">
    <section class="mb-0 pt-70 pb-60">
        <div class="container">
            <div class="row">
                <div class="purchase-classroom">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="left-content">
                                <h1>Transform Your Classroom with Rurera</h1>
                                <p>Empower your educational institution with Rurera all-in-one platform! As a school admin, you can purchase a custom plan that enables you to manage your schools, teachers, and students all in one place.</p>
                                <h2>Why Choose This Package?</h2>
                                <ul class="features-list">
                                    <li>Scales from 10 to 1000+ students</li>
                                    <li>Transparent monthly pricing pay for what you use</li>
                                    <li>Perfect for private schools, academies, chains</li>
                                    <li>Includes Google Classroom integration</li>
                                </ul>
                                <div class="highlight-box">
                                    <h3>Get Started from Just €52/month</h3>
                                    <p>Includes 15 students. Flexible pricing as you grow. No hidden fees.</p>
                                </div>
                                <h2>How It Works</h2>
                                <ul class="features-list">
                                    <li>Admin purchases package based on student count</li>
                                    <li>Add multiple teachers to manage classes</li>
                                    <li>Enroll students and assign activities</li>
                                    <li>Track school-wide performance and analytics</li>
                                </ul>
                                <h2>Key Features</h2>
                                <p>Our platform includes everything you need to create, manage, and analyze student assessments:</p>
                                <ul class="features-list">
                                    <li>Multiple question types (MCQ, True/False, Fill-in-the-blank)</li>
                                    <li>Automated grading and instant feedback</li>
                                    <li>Customizable quiz settings and time limits</li>
                                    <li>Student performance analytics</li>
                                    <li>Export results to various formats</li>
                                    <li>Integration with popular LMS platforms</li>
                                </ul>
                                <h2>Getting Started</h2>
                                <p>Setting up your classroom is quick and easy. Simply select the number of students you'll be teaching, choose your package, and start creating engaging quizzes within minutes.</p>
                                <div class="highlight-box">
                                    <h3>Free Trial Available</h3>
                                    <p>Try Rurera risk-free for 14 days. No credit card required. Experience all features and see how it transforms your teaching.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="right-package">
                                <div class="package-card">
                                    <div class="package-tier" id="packageTier">Starter Plan</div>
                                    <h3 class="package-title">School Package</h3>
                                    <div class="student-selector">
                                        <label>Number of Students:</label>
                                        <div class="student-counter">
                                            <button class="counter-btn" id="decreaseBtn" onclick="changeStudentCount(-1)">−</button>
                                            <div class="student-count" id="studentCount">15</div>
                                            <button class="counter-btn" id="increaseBtn" onclick="changeStudentCount(1)">+</button>
                                        </div>
                                    </div>
                                    <div class="price-section" id="priceSection">
                                        <div class="price" id="price">€29</div>
                                        <div class="price-period">per month</div>
                                        <div class="price-per-student" id="pricePerStudent">€1.93 per student</div>
                                    </div>
                                    <div class="package-features">
                                        <h3>What's Included:</h3>
                                        <ul id="featuresList">
                                            <li>Basic quiz creation</li>
                                            <li>Student progress tracking</li>
                                            <li>Email support</li>
                                            <li>Basic analytics</li>
                                            <li>Mobile app access</li>
                                        </ul>
                                    </div>
                                    <button class="select-btn" onclick="selectPackage()">Get Started Now</button>
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
                            <figure><img src="/assets/default/img/About-Us-CTA-Image.jpg" alt=""> <img class="attachment-img" src="/assets/default/img/hero-ornament.png" alt=""></figure>
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
</section>
<!-- <div class="modal fade student-packages" id="student-packages-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="purchase-classroom">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="classroom-content-box">
                                    <div class="purchase-heading mb-30">
                                        <h2>Purchase a Classroom Licence</h2>
                                        <p>Get full access to 10,000+ interactive learning resources with real-time performance&nbsp;tracking.</p>
                                    </div>
                                    <div class="num-students">
                                        <h3>Specify total # of students</h3>
                                        <div class="increase-decrease-box">
                                            <button class="decrease-students">
                                                <img src="/assets/default/svgs/minus.svg" alt="minus">
                                            </button>
                                            <p>Up to <span class="student-val">12</span> students</p>
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
                                            <li><span class="icon-box">🧠</span> SATs &amp; 11+ Practice</li>
                                            <li><span class="icon-box">🔢</span> Times Tables &amp; Spelling</li>
                                            <li><span class="icon-box">❓</span> 10,000+ Questions</li>
                                            <li><span class="icon-box">📖</span> Online Bookshelf</li>
                                            <li><span class="icon-box">✍️</span> Spelling Exercises</li>
                                            <li><span class="icon-box">🏅</span> Rewards &amp; Badges</li>
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
                                            <a href="#">orders@rurera.com</a>
                                            <a href="#">Subscription FAQ</a>
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
</div> -->
<!-- Modal HTML (add just before </body>) -->
<div id="paymentModal" class="modal-overlay">
  <div class="modal-box">
    <span class="modal-close" onclick="closeModal()">&times;</span>
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
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
<script src="/assets/default/vendors/parallax/parallax.min.js"></script>
<script>
    let currentStudentCount = 15;
    const packages = {
        starter: {
            name: "Starter Plan",
            minStudents: 1,
            maxStudents: 25,
            pricePerStudent: 1.93,
            basePrice: 29,
            features: [
                "Basic quiz creation",
                "Student progress tracking", 
                "Email support",
                "Basic analytics",
                "Mobile app access"
            ]
        },
        professional: {
            name: "Professional Plan",
            minStudents: 26,
            maxStudents: 75,
            pricePerStudent: 1.58,
            basePrice: 79,
            features: [
                "Advanced quiz features",
                "Detailed analytics",
                "Priority support",
                "Custom branding",
                "Grade book integration",
                "Video tutorials"
            ]
        },
        enterprise: {
            name: "Enterprise Plan", 
            minStudents: 76,
            maxStudents: 200,
            pricePerStudent: 1.33,
            basePrice: 199,
            features: [
                "Unlimited quiz creation",
                "Advanced reporting",
                "24/7 phone support",
                "API access",
                "Multi-teacher accounts",
                "Custom integrations",
                "Training sessions"
            ]
        },
        premium: {
            name: "Premium Plan",
            minStudents: 201,
            maxStudents: 1000,
            pricePerStudent: 1.00,
            basePrice: 399,
            features: [
                "Everything in Enterprise",
                "White-label solution",
                "Dedicated account manager",
                "Custom development",
                "Advanced security",
                "SLA guarantee",
                "On-site training"
            ]
        }
    };
    function getCurrentPackage(studentCount) {
        for (const [key, pkg] of Object.entries(packages)) {
            if (studentCount >= pkg.minStudents && studentCount <= pkg.maxStudents) {
                return pkg;
            }
        }
        return packages.premium;
    }
    function calculatePrice(studentCount) {
        const pkg = getCurrentPackage(studentCount);
        return Math.round(pkg.basePrice + (studentCount - pkg.minStudents) * pkg.pricePerStudent);
    }
    function updatePackageDisplay() {
        const pkg = getCurrentPackage(currentStudentCount);
        const totalPrice = calculatePrice(currentStudentCount);
        const pricePerStudent = (totalPrice / currentStudentCount).toFixed(2);
        document.getElementById('packageTier').textContent = pkg.name;
        document.getElementById('studentCount').textContent = currentStudentCount;
        document.getElementById('price').textContent = `€${totalPrice}`;
        document.getElementById('pricePerStudent').textContent = `€${pricePerStudent} per student`;
        const featuresList = document.getElementById('featuresList');
        featuresList.innerHTML = '';
        pkg.features.forEach(feature => {
            const li = document.createElement('li');
            li.textContent = feature;
            featuresList.appendChild(li);
        });
        document.getElementById('priceSection').classList.add('price-update');
        setTimeout(() => {
            document.getElementById('priceSection').classList.remove('price-update');
        }, 500);
        document.getElementById('decreaseBtn').disabled = currentStudentCount <= 1;
        document.getElementById('increaseBtn').disabled = currentStudentCount >= 1000;
    }
    function changeStudentCount(change) {
        const newCount = currentStudentCount + change;
        if (newCount >= 1 && newCount <= 1000) {
            currentStudentCount = newCount;
            updatePackageDisplay();
        }
    }
    function selectPackage() {
        const pkg = getCurrentPackage(currentStudentCount);
        const totalPrice = calculatePrice(currentStudentCount);
        const message = `Package: ${pkg.name}\nStudents: ${currentStudentCount}\nPrice: €${totalPrice}/month\n\nProceed to checkout?`;
        if (confirm(message)) {
            alert(`Redirecting to payment for ${pkg.name}...`);
            // In real app: window.location.href = `/checkout?students=${currentStudentCount}&package=${pkg.name}`;
        }
    }
    updatePackageDisplay();
</script>
<script>
    function openModal() {
      document.getElementById('paymentModal').style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }
    function closeModal() {
      document.getElementById('paymentModal').style.display = 'none';
      document.body.style.overflow = '';
    }
    // Close modal on ESC key
    window.addEventListener('keydown', function(e){
      if(e.key === "Escape") closeModal();
    });

    // Update selectPackage to open modal
    function selectPackage() {
        openModal();
    }
</script>
@endpush
