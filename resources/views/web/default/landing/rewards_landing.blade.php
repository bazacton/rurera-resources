@extends(getTemplate().'.layouts.app')

@section('content')
<section
    class="products-sub-header page-sub-header position-relative pb-25 pt-0 d-flex align-items-center"
    style="
        background-image: linear-gradient(transparent 11px, rgba(220, 220, 200, 0.1) 12px, transparent 12px), linear-gradient(90deg, transparent 11px, rgba(220, 220, 200, 0.1) 12px, transparent 12px);
        background-size: 100% 12px, 12px 100%;
    "
>
    <div class="container">
        <div class="row align-items-center job-singup-sub-header">
            <div class="col-12 col-md-12 col-lg-6">
                <h1 itemprop="title" class="font-72 font-weight-bold">
                    Learn, Play, and Win <span class="text-scribble">Rewards!</span>
                </h1>
				
                <p class="mt-30">Join our fun learning adventure to master lessons and earn amazing toys and Amazon gift cards!</p>
                <ul class="mb-30 p-0 mt-30">
                        <li class="mb-10 font-19">
                            Master your Lessons
                        </li>
                        <li class="mb-10 font-19">
                            Earn Great Rewards
                        </li>
                        <li class="mb-10 font-19">
                            Celebrate your Success
                        </li>
                        <li class="font-19">
                            Have Fun Learning 
                        </li>
                    </ul>
                    <a href="https://rurera.com/pricing" class="mt-0 bg-primary justify-content-center register-btn text-white try-rurera-btn">Try Rurera for free</a>
            </div>
            <div class="col-12 col-lg-6 text-right">
                <div class="home-sections home-sections-swiper container reward-program-section position-relative mt-0" style="background: none;">
                    <div class="position-relative reward-program-section-hero-card">
                        <img
                            src="/store/1/default_images/home_sections_banners/club_points_banner.png"
                            class="reward-program-section-hero"
                            alt="Win Club Points"
                            title="Win Club Points"
                            width="570"
                            height="406"
                            itemprop="image"
                            loading="eager"
                        />
                        <div class="example-reward-card rounded-sm shadow-lg p-5 p-md-15 d-flex align-items-center" style="background-color: #f60;">
                            <div class="example-reward-card-medal">
                                <img src="/assets/default/img/rewards/medal.png" class="img-cover rounded-circle" alt="medal" title="medal" width="512" height="512" itemprop="image" loading="eager" />
                            </div>
                            <div class="flex-grow-1 ml-15"><span class="font-14 font-weight-bold text-white d-block">You earned 50 coin points!</span><span class="text-white font-12 font-weight-500">Buy your favoruite toy now!</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="reward-section mt-0 pt-80 pb-70" style="background-color: #3d358b;">
    <div class="reward-shapes pt-70 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-50">
                        <h2 itemprop="title" class="text-white font-40">
                            See What Awaits You with Learning and Practice!
                        </h2>
                    </div>
                </div>
                <div class="col-8 reward-holder mx-auto">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-9">
                            <div class="reward-box d-flex align-items-center">
                                <div class="img-holder">
                                    <figure>
                                        <img src="/assets/default/svgs/reward-box1.svg" alt="reward-box image1">
                                    </figure>
                                </div>
                                <div class="text-holder"><p itemprop="description">Practice and read to earn coins instantly with Rurera</p></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-5 col-lg-3">
                            <div class="reward-box d-flex align-items-center justify-content-center">
                                <div class="text-holder text-center">
                                    <p itemprop="description">Redeem coins with one click!</p>
                                    <strong class="mt-10 font-30 font-weight-bold" itemprop="sub title">One Click!</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-5 col-lg-3">
                            <div class="reward-box d-flex align-items-center justify-content-center">
                                <div class="text-holder text-center"><strong itemprop="sub title" class="font-19 font-weight-bold">Trade your coins for toys</strong></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-9">
                            <div class="reward-box d-flex align-items-center">
                                <div class="img-holder">
                                    <figure>
                                        <img src="/assets/default/svgs/reward-box2.svg" alt="reward-box image2">
                                    </figure>
                                </div>
                                <div class="text-holder"><p itemprop="description">Easily and flexibly use your earned coin points</p></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="reward-box d-flex align-items-center">
                                <div class="img-holder">
                                    <figure>
                                        <img src="/assets/default/svgs/reward-box3.svg" alt="reward-box image3">
                                    </figure>
                                </div>
                                <div class="text-holder ml-5"><p itemprop="description">Read and earn your favorite toys with each win.</p></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="reward-box d-flex align-items-center">
                                <div class="img-holder">
                                    <figure>
                                        <img src="/assets/default/svgs/reward-box4.svg" alt="reward-box image4">
                                    </figure>
                                </div>
                                <div class="text-holder ml-5"><p itemprop="description">Track all your rewards and coin points in one place</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="process-section mt-60 reward-process">
    <div class="process-holder">
        <div class="container position-relative">
            <div class="svg-shapes-top">
                <span class="icon-svg">
                    <svg width="64px" height="64px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"><path d="M3.415.189a1 1 0 011.1-.046l15 9a1 1 0 010 1.714l-15 9a1 1 0 01-1.491-1.074L4.754 11H10a1 1 0 100-2H4.753l-1.73-7.783A1 1 0 013.416.189z" fill="#5C5F62"></path></g>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title text-left mb-50">
                        <h2 itemprop="title" class="font-40">Redeem Rewards Like a Pro! 🎉</h2>
                        <h2 class="mt-10">Experience the thrill of victory with every win and feel excitement like never before!</h2>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 mx-auto">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="process-card process-one">
                                <div class="process-card-body d-flex align-items-center justify-content-between">
                                    <div class="text-holder mr-30">
                                        <h2 itemprop="title" class="post-title">Step 1:</h2>
                                        <p itemprop="description" class="mt-15">Embark on your journey by conquering quizzes,
                                        goals, mastering times tables, and diving into books.
                                        Start earning valuable coin points along the way!
                                        </p>
                                    </div>
                                    <div class="img-holder">
                                        <figure><img src="../assets/default/img/redeemstep-1.jpg" alt="redeemstep image" title="redeemstep image" width="420" height="302" itemprop="image" loading="eager" /></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="process-card process-two">
                                <div class="process-card-body d-flex align-items-center justify-content-between">
                                    <div class="img-holder">
                                        <figure><img src="../assets/default/img/redeemstep-2.jpg" alt="redeemstep image" title="redeemstep image" width="420" height="302" itemprop="image" loading="eager" /></figure>
                                    </div>
                                    <div class="text-holder ml-30">
                                        <h2 itemprop="title" class="post-title">Step 2:</h2>
                                        <p itemprop="description" class="mt-15">Gather enough coin points through your activities
                                        and get ready for an exciting redemption journey! 
                                        It's time to turn your hard work into amazing rewards!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="process-card process-three">
                                <div class="process-card-body d-flex align-items-center justify-content-between">
                                    <div class="text-holder mr-30">
                                        <h2 itemprop="title" class="post-title">Step 3:</h2>
                                        <p itemprop="description" class="mt-15">Use your hard-earned coin points to choose 
                                        & purchase your favorite toys straight from our store! 
                                        It’s a chance to celebrate your wins with the toys you love!
                                        </p>
                                    </div>
                                    <div class="img-holder">
                                        <figure><img src="../assets/default/img/redeemstep-3.jpg" alt="redeemstep image" title="redeemstep image" width="420" height="302" itemprop="image" loading="eager" /></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="process-card process-foure">
                                <div class="process-card-body d-flex align-items-center justify-content-between">
                                    <div class="img-holder">
                                        <figure><img src="../assets/default/img/redeemstep-4.jpg" alt="redeemstep image" title="redeemstep image" width="420" height="302" itemprop="image" loading="eager" /></figure>
                                    </div>
                                    <div class="text-holder ml-30">
                                        <h2 itemprop="title" class="post-title">Step 4:</h2>
                                        <p itemprop="description" class="mt-15">Dive into rewards with no additional payments
                                        just pure joy as you play with your exciting new toys.
                                        Enjoy the thrill of learning and celebrating your achievements!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="svg-shapes-bottom">
                <span class="icon-svg">
                    <svg width="64px" height="64px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                        <g id="SVGRepo_bgCarrier2" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier2" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier2"><path d="M3.415.189a1 1 0 011.1-.046l15 9a1 1 0 010 1.714l-15 9a1 1 0 01-1.491-1.074L4.754 11H10a1 1 0 100-2H4.753l-1.73-7.783A1 1 0 013.416.189z" fill="#5C5F62"></path></g>
                    </svg>
                </span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9 mx-auto">
                <div class="d-flex align-items-center" style="margin-left: 45px;">
                    <a href="{{url('/')}}/pricing" class="try-rurera-btn justify-content-center bg-primary text-white register-btn">Try Rurera for free</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="categories-section mt-70 pt-50 pb-50 mb-60" style="background-color: #f60;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-50">
                    <h2 itemprop="title" class="text-white font-40">Rewards Categories</h2>
                    <p itemprop="description" class="mt-10 text-white font-19">
                        Earn these amazing rewards as you embark on your learning journey with Rurera! The more you learn, the more you can win!
                    </p>
                </div>
            </div>
            <div class="col-12">
                <ul class="categories-list row">
                    <li class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="categories-box mb-30">
                            <div class="img-holder">
                                <figure><img src="../assets/default/img/design-tool-1.png" alt="category image" title="category image" width="315" height="315" itemprop="image" loading="eager" /></figure>
                            </div>
                            <div class="text-holder">
                                <h3 itemprop="title" class="post-title text-white"><a href="/pricing" class="text-white">Design Tools</a></h3>
                            </div>
                        </div>
                    </li>
                    <li class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="categories-box mb-30">
                            <div class="img-holder">
                                <figure><img src="../assets/default/img/science-tool.png" alt="category image" title="category image" width="315" height="315" itemprop="image" loading="eager" /></figure>
                            </div>
                            <div class="text-holder">
                                <h3 itemprop="title" class="post-title text-white"><a href="/pricing" class="text-white">Science Tools</a></h3>
                            </div>
                        </div>
                    </li>
                    <li class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="categories-box mb-30">
                            <div class="img-holder">
                                <figure><img src="../assets/default/img/ebook.png" alt="category image" title="category image" width="315" height="315" itemprop="image" loading="eager" /></figure>
                            </div>
                            <div class="text-holder">
                                <h3 itemprop="title" class="post-title text-white"><a href="/pricing" class="text-white">e-book</a></h3>
                            </div>
                        </div>
                    </li>
                    <li class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="categories-box mb-30">
                            <div class="img-holder">
                                <figure><img src="../assets/default/img/music.png" alt="category image" title="category image" width="315" height="315" itemprop="image" loading="eager" /></figure>
                            </div>
                            <div class="text-holder">
                                <h3 itemprop="title" class="post-title text-white"><a href="/pricing" class="text-white">Musical Instruments</a></h3>
                            </div>
                        </div>
                    </li>
                    <li class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="categories-box mb-30">
                            <div class="img-holder">
                                <figure><img src="../assets/default/img/book.png" alt="category image" title="category image" width="315" height="315" itemprop="image" loading="eager" /></figure>
                            </div>
                            <div class="text-holder">
                                <h3 itemprop="title" class="post-title text-white"><a href="/pricing" class="text-white">Books</a></h3>
                            </div>
                        </div>
                    </li>
                    <li class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="categories-box mb-30">
                            <div class="img-holder">
                                <figure><img src="../assets/default/img/toddler.png" alt="category image" title="category image" width="315" height="315" itemprop="image" loading="eager" /></figure>
                            </div>
                            <div class="text-holder">
                                <h3 itemprop="title" class="post-title text-white"><a href="/pricing" class="text-white">Baby and Toddler</a></h3>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="lms-faqs-section mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-50">
                    <h2 class="mt-0 mb-10 font-40">Frequently Asked Questions</h2>
                </div>
            </div>
            <div class="col-12 mx-auto">
                <div class="mt-0">
                    <div class="lms-faqs mx-w-100 mt-0">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header active" id="headingon11" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <h3 itemprop="name" class="mb-0">
                                        <button class="btn btn-link font-18 font-weight-bold" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
                                            What are the ways I can earn coin points on Rurera?
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapse11" class="collapse show" aria-labelledby="heading11" data-parent="#accordion">
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body pb-0">
                                        <p itemprop="text" class="mb-15">You can earn coin points by actively participating in various activities on our platform, such as practicing quizzes, completing goals, and reading books. Each activity contributes to your coin points balance based on its difficulty and completion level.</p>
                                    </div>
                                </div>
                            </div>
                            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
                                <div class="card-header" id="heading12">
                                    <h3 itemprop="name" class="mb-0">
                                        <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="true" aria-controls="collapse12">
                                            Where can I check my current coin points balance?
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion">
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body pb-0">
                                        <p itemprop="text" class="mb-15">To check your coin points balance, log in to your Rurera account and navigate to the Rewards section in your dashboard. Your current balance will be displayed there, along with a history of your recent earning and redemption activities.</p>
                                    </div>
                                </div>
                            </div>
                            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
                                <div class="card-header" id="heading">
                                    <h3 itemprop="name" class="mb-0">
                                        <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            How many coin points are required to redeem specific toys?
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="heading" data-parent="#accordion">
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body pb-0">
                                        <p itemprop="text" class="mb-15">The number of coin points needed for each toy varies. You can find detailed information on the point requirements for each toy by visiting the Rewards Store section of our platform, where the points needed for each item are clearly listed.</p>
                                    </div>
                                </div>
                            </div>
                            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
                                <div class="card-header" id="headingThree">
                                    <h3 itemprop="name" class="mb-0">
                                        <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                             What is the process for redeeming my coin points for toys?
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body pb-0">
                                        <p itemprop="text" class="mb-15">To redeem your coin points, go to the Rewards Store, select the toy you wish to purchase, and follow the on-screen instructions. You will be prompted to confirm your redemption and your toy will be added to your order. Ensure you have sufficient points before initiating the redemption.</p>
                                    </div>
                                </div>
                            </div>
                            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
                                <div class="card-header" id="headingfive">
                                    <h3 itemprop="name" class="mb-0">
                                        <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                            Are there any limits on the number of toys I can redeem?
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body pb-0">
                                        <p itemprop="text" class="mb-15">There may be limits on the number of toys you can redeem depending on availability and your coin points balance. Each toy may also have a limit on how many can be redeemed per account or per month. Please check the Rewards Store for specific details and availability.</p>
                                    </div>
                                </div>
                            </div>
                            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
                                <div class="card-header" id="headingsix">
                                    <h3 itemprop="name" class="mb-0">
                                        <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                        Can I use my coin points to receive cash or other non-toy items?
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body pb-0">
                                        <p itemprop="text" class="mb-15">Coin points are exclusively for redeeming toys and rewards offered in the Rurera Rewards Store. They cannot be converted into cash or used for any non-toy items, ensuring the points are spent on the fun and educational rewards available on the platform.</p>
                                    </div>
                                </div>
                            </div>
							<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
                                <div class="card-header" id="heading7">
                                    <h3 itemprop="name" class="mb-0">
                                        <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapsesix">
                                            What should I do if I don’t have enough coin points to redeem a toy?
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body pb-0">
                                        <p itemprop="text" class="mb-15">If you don’t have enough coin points to redeem the toy you want, you will need to continue engaging with quizzes, SATs, and reading to earn more points. Once you have accumulated the required amount, you can return to the Rewards Store to complete your redemption.</p>
                                    </div>
                                </div>
                            </div>
							<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
                                <div class="card-header" id="heading8">
                                    <h3 itemprop="name" class="mb-0">
                                        <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapsesix">
                                        Can I transfer my coin points to another Rurera account?
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body pb-0">
                                        <p itemprop="text" class="mb-15">Coin points are linked to your personal account and are not transferable to other accounts. They are exclusively for use within your own account, where you can redeem them for rewards.</p>
                                    </div>
                                </div>
                            </div>
							<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
                                <div class="card-header" id="heading9">
                                    <h3 itemprop="name" class="mb-0">
                                        <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapsesix">
                                        How can I get support if I encounter issues with my rewards or redemption?
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion">
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body pb-0">
                                        <p itemprop="text" class="mb-15">If you experience any issues with your rewards or redemption, you can contact our support team through the "Contact Us" section on the website or app. Provide detailed information about your issue, and our team will assist you as quickly as possible.</p>
                                    </div>
                                </div>
                            </div>
							<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="card">
                                <div class="card-header" id="heading10">
                                    <h3 itemprop="name" class="mb-0">
                                        <button class="btn btn-link font-18 font-weight-bold collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapsesix">
                                        What should I do if my toy hasn’t arrived after redemption?
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion">
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body pb-0">
                                        <p itemprop="text" class="mb-15">If your toy hasn’t arrived within the expected timeframe after redemption, please reach out to our support team with your redemption details. We will investigate the issue and ensure that you receive your toy promptly.</p>
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


@php
    $packages_only = isset( $packages )? $packages : array();
    $show_details = isset( $show_details )? $show_details : true;
    @endphp
    <section class="lms-setup-progress-section lms-membership-section mb-0 pt-50 pb-60" data-currency_sign="{{getCurrencySign()}}" style="background-color: #fff;">
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

                        @include('web.default.pricing.packages_list',['subscribes' => array(), 'packages_only' => $packages_only, 'show_details' => false])

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade lms-choose-membership" id="subscriptionModal">
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

	
<section class="footer-banner pt-50 pb-50" style="background: #f6b801;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-7">
                <div class="banner-holder">
                    <div class="text-holder">
                        <h2 itemprop="title" class="text-white font-30">
                            Our rewards bring you excitement,<br >
                             letting you see the results of practice in real time!
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-5">
                <div class="banner-holder d-flex justify-content-end">
                    <ul class="education-icon-box">
                        <li>
                            <figure><img src="../assets/default/img/book-education.svg" alt="education icon-box" title="education icon-box" width="800" height="800" itemprop="image" loading="eager" /></figure>
                        </li>
                        <li>
                            <figure><img src="../assets/default/img/pencil-ruler.svg" alt="education icon-box" title="education icon-box" width="800" height="800" itemprop="image" loading="eager" /></figure>
                        </li>
                        <li>
                            <figure><img src="../assets/default/img/mathematics.svg" alt="education icon-box" title="education icon-box" width="800" height="800" itemprop="image" loading="eager" /></figure>
                        </li>
                        <li>
                            <figure><img src="../assets/default/img/book-education-study.svg" alt="education icon-box" title="education icon-box" width="800" height="800" itemprop="image" loading="eager" /></figure>
                        </li>
                        <li>
                            <figure><img src="../assets/default/img/coins-money.svg" alt="education icon-box" title="education icon-box" width="800" height="800" itemprop="image" loading="eager" /></figure>
                        </li>
                        <li>
                            <figure><img src="../assets/default/img/document-education-file.svg" alt="education icon-box" title="education icon-box" width="800" height="800" itemprop="image" loading="eager" /></figure>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
<script src="/assets/default/js/parts/counter.js"></script>
@endpush