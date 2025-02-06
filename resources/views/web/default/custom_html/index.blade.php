@extends('web.default.panel.layouts.panel_layout')

@push('styles_top')

@endpush

@section('content')
<section class="content-section mt-10">
<div class="col-12 mb-30">
    <div class="profile-menu">
        <ul>
            <li>
                <div class="user-thumb">
                    <a href="#"></a>
                </div>
                <div class="user-menu-text">
                    <a href="#">Billy</a>
                    <div class="profile-dropdown">
                        <a href="#">Profile options</a>
                        <ul>
                            <li><a href="#">View reading log</a></li>
                            <li><a href="#">Customize</a></li>
                            <li><a href="#">Connect to class</a></li>
                            <li><a href="#">Merge profile</a></li>
                            <li><a href="#">Delete profile</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="user-thumb">
                    <a href="#"></a>
                </div>
                <div class="user-menu-text">
                    <a href="#">Billy</a>
                </div>
            </li>
            <li>
                <div class="user-thumb">
                    <a href="#"></a>
                </div>
                <div class="user-menu-text">
                    <a href="#">Billy</a>
                </div>
            </li>
            <li>
                <div class="user-thumb">
                    <a href="#"></a>
                </div>
                <div class="user-menu-text">
                    <a href="#">Billy</a>
                </div>
            </li>
        </ul>
    </div>
</div>
    <div class="col-12 col-lg-12 col-md-12">
        <div class="section-title mb-30">
            <h2 itemprop="title" class="font-22 mb-0"><a href="/timestables-practice" class="timestables-back-btn"></a>National Competition</h2>
        </div>
    </div>
    <div class="col-12 col-lg-12 col-md-12">
        <ul class="tests-list type-list mb-30">
            <li data-type="single-player" class="active"><img src="/assets/default/img/single.png" alt=""> Single Player</li>
            <li data-type="multi-player"><img src="/assets/default/img/multi.png" alt=""> Multi Player</li>
        </ul>
    </div>
    <div class="col-12">
        <div class="school-table timestables-mode-block">
            <table class="simple-table text-left">
                <thead>
                    <tr>
                        <th>School name</th>
                        <th>Location</th>
                        <th class="text-right">Participating</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Westminster School</td>
                        <td>Little Dean's Yard, London, Not recorded, SW1P 3PF</td>
                        <td class="text-right">Year 3, year 4</td>
                    </tr>
                    <tr>
                        <td>The Grey Coat Hospital</td>
                        <td>Greycoat Place, London, Not recorded, SW1P 2DY</td>
                        <td class="text-right">Year 3, year 4</td>
                    </tr>
                    <tr>
                        <td>Westminster City School</td>
                        <td>55 Palace Street, London, Not recorded, SW1E 5HJ</td>
                        <td class="text-right">Year 3, year 4</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12">
        <div class="group-table timestables-mode-block bg-white panel-border rounded-sm p-20 mb-50">
            <div class="section-title mb-30">
                <h2 itemprop="title" class="font-22 mb-0">Group A</h2>
            </div>
            <table class="simple-table text-left">
                <thead>
                    <tr>
                        <th colspan="1"></th>
                        <th>School name</th>
                        <th>Location</th>
                        <th class="text-right">Participating</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1</td>
                        <td>Westminster School</td>
                        <td>Little Dean's Yard, London, Not recorded, SW1P 3PF</td>
                        <td class="text-right">Year 3, year 4</td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td>The Grey Coat Hospital</td>
                        <td>Greycoat Place, London, Not recorded, SW1P 2DY</td>
                        <td class="text-right">Year 3, year 4</td>
                    </tr>
                    <tr>
                        <td>#3</td>
                        <td>Westminster City School</td>
                        <td>55 Palace Street, London, Not recorded, SW1E 5HJ</td>
                        <td class="text-right">Year 3, year 4</td>
                    </tr>
                </tbody>
            </table>
            <div class="group-accordions" id="accordion">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">Group Details</button>
                    </div>
                    <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion">
                        <div itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="card-body">
                            <p itemprop="text">Yes, We are offering comprehensive content that follows all national curriculum standards, making it a valuable resource for schools.</p>
                        </div>
                    </div>
                </div>
                <div class="group-qualified">
                    <span>Qualified</span>
                </div>
            </div>
        </div>
    </div>
    <div class="cabinet-table text-center mb-50">
        <div class="cabinet-table-header">
            <div class="table-holder">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2" style="height: 50px;">
                                <h2 class="font-24">Trophy Cabinet</h2>
                            </th>
                        </tr>
                        <tr>
                            <th>Little diploma</th>
                            <th>Big diploma</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="#">
                                    <img src="/assets/default/svgs/medal-light.svg" class="img-lg" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    <img src="/assets/default/svgs/medal-light.svg" class="img-lg" alt="">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="cabinet-table-content">
            <div class="table-holder">
                <table>
                    <thead>
                        <tr>
                            <th>Times Tables</th>
                            <th>Step 1</th>
                            <th>Step 2</th>
                            <th>Step 3</th>
                            <th>Step 4</th>
                            <th>Step 5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">1</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" class="img-md" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" class="img-md" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" class="img-md" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" class="img-md" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" class="img-md" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">2</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">3</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">4</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">5</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">6</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">7</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">8</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">9</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">10</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">11</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="time-number"><span class="font-36 d-block text-center">12</span></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal.svg" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="/assets/default/svgs/medal-light.svg" alt=""></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-holder">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2" style="height: 50px;">
                                <h2 class="font-24"><a href="#">Speed Test X (Last results)</a></h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Login to see results</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-holder">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2" style="height: 50px;">
                                <h2 class="font-24"><a href="#">100 seconds</a></h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>High score: 0</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="cabinet-stars">
                                    <img src="/assets/default/img/star-leeg.png" alt="">
                                    <img src="/assets/default/img/star-leeg.png" alt="">
                                    <img src="/assets/default/img/star-leeg.png" alt="">
                                    <img src="/assets/default/img/star-leeg.png" alt="">
                                    <img src="/assets/default/img/star-leeg.png" alt="">
                                    <img src="/assets/default/img/star-leeg.png" alt="">
                                    <img src="/assets/default/img/star-leeg.png" alt="">
                                    <img src="/assets/default/img/star-leeg.png" alt="">
                                    <img src="/assets/default/img/star-leeg.png" alt="">
                                    <img src="/assets/default/img/star-leeg.png" alt="">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="rewards-layout mb-50">
        <div class="row">
            <div class="col-12">
                <div class="rewards-header p-20 mb-30">
                    <div class="text-holder d-flex align-items-center justify-content-sm-center flex-wrap text-center flex-column">
                        <p class="mb-20">Join Loyalty Points and get rewarded while you shop. You'll <br> get <strong>250 points</strong> for signing up. What are you waiting for?</p>
                        <div class="header-controls">
                            <a href="#" class="join-btn">Join now</a>
                            <a href="#" class="login-btn">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="rewards-heading text-center mb-30">
                    <h2 class="rewards-heading-text font-24 font-weight-normal">Earn points</h2>
                </div>
                <div class="rewards-layout-box column-3 p-20 mb-30">
                    <div class="row">
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/bag.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Make a purchase</h5>
                                    <span class="item-points">10 points per $1</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/signup.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Create an account</h5>
                                    <span class="item-points">250 points</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/birthday.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Happy Birthday</h5>
                                    <span class="item-points">500 points</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/bubble-star.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Leave a Review</h5>
                                    <span class="item-points">100 points</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/bubble-star.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Add a photo in your Review</h5>
                                    <span class="item-points">200 points</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/reward-facebook.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Like us on Facebook</h5>
                                    <span class="item-points">100 points</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/newsletter.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Sign up to our mailing list</h5>
                                    <span class="item-points">100 points</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/reward-instagram.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Follow us on Instagram</h5>
                                    <span class="item-points">100 points</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/bag.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Carbon Neutral Order</h5>
                                    <span class="item-points">50 points</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/visit.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Read Our Latest Blog</h5>
                                    <span class="item-points">50 points</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="rewards-heading text-center mb-30">
                    <h2 class="rewards-heading-text font-24 font-weight-normal">Rewards</h2>
                </div>
                <div class="rewards-layout-box column-3 p-20 mb-30">
                    <div class="row">
                        <div class="col-12">
                            <div class="rewards-item item-left d-flex align-items-center justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/bag.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Redeem your points when you checkout</h5>
                                    <span class="item-points">100 points per $1</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/birthday.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">House Plant Invigorator</h5>
                                    <span class="item-points">100% off . 500 points</span>
                                    <a href="#" class="view-btn font-16 font-weight-normal">View product</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/birthday.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Digital Plant Thermometer 🌡️</h5>
                                    <span class="item-points">100% off . 1,800 points</span>
                                    <a href="#" class="view-btn font-16 font-weight-normal">View product</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/birthday.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Pride Plant Magnets</h5>
                                    <span class="item-points">100% off . 600 points</span>
                                    <a href="#" class="view-btn font-16 font-weight-normal">View product</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/birthday.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Coco Coir Pole</h5>
                                    <span class="item-points">100% off . 1,200 points</span>
                                    <a href="#" class="view-btn font-16 font-weight-normal">View product</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/birthday.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Plant Picks For A Purpose</h5>
                                    <span class="item-points">100% off . 600 points</span>
                                    <a href="#" class="view-btn font-16 font-weight-normal">View product</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/birthday.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Arber Organic Plant Food</h5>
                                    <span class="item-points">100% off . 2,200 points</span>
                                    <a href="#" class="view-btn font-16 font-weight-normal">View product</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/birthday.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Arber Organic Bio Insecticide</h5>
                                    <span class="item-points">100% off . 2,200 points</span>
                                    <a href="#" class="view-btn font-16 font-weight-normal">View product</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="rewards-item d-flex align-items-center flex-column justify-content-center">
                                <span class="icon-box">
                                    <img src="/assets/default/svgs/birthday.svg" alt="">
                                </span>
                                <div class="item-text">
                                    <h5 class="item-title">Lively Root Icon Dad Hat</h5>
                                    <span class="item-points">100% off . 2,200 points</span>
                                    <a href="#" class="view-btn font-16 font-weight-normal">View product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="rewards-heading text-center mb-30">
                    <h2 class="rewards-heading-text font-24 font-weight-normal">Tiers</h2>
                </div>
                <div class="rewards-layout-box p-20">
                    <div class="rewards-tier-box">
                        <div class="row">
                            <div class="col-12 col-lg-3 col-md-4">
                                <div class="tier-item">
                                    <div class="tier-item-header">
                                        <span class="tier-number">1</span>
                                        <h5 class="item-title">Sprout Squad</h5>
                                        <span class="item-sub-title">Start here</span>
                                    </div>
                                    <div class="tier-points">
                                        <span>10 points per $1</span>
                                    </div>
                                    <div class="tier-item-footer"></div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-4">
                                <div class="tier-item">
                                    <div class="tier-item-header">
                                        <span class="tier-number">2</span>
                                        <h5 class="item-title">Bloomer Bunch</h5>
                                        <span class="item-sub-title">Spend $250</span>
                                    </div>
                                    <div class="tier-points">
                                        <span>12 points per $1</span>
                                    </div>
                                    <div class="tier-item-footer"></div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-4">
                                <div class="tier-item">
                                    <div class="tier-item-header">
                                        <span class="tier-number">3</span>
                                        <h5 class="item-title">Evergreen Group</h5>
                                        <span class="item-sub-title">Start here</span>
                                    </div>
                                    <div class="tier-points">
                                        <span>15 points per $1</span>
                                    </div>
                                    <div class="tier-item-footer">
                                      <span class="font-16">Subscribe to any product</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-4">
                                <div class="tier-item">
                                    <div class="tier-item-header">
                                        <span class="tier-number">4</span>
                                        <h5 class="item-title">V.I.P.P</h5>
                                        <span class="item-sub-title">Start here</span>
                                    </div>
                                    <div class="tier-points">
                                        <span>10 points per $1</span>
                                    </div>
                                    <div class="tier-item-footer">
                                      <span class="font-16">Subscribe to any product</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="spell-levels levels-grouping">
        <div class="spell-levels-top">
            <h3 class="font-19 font-weight-bold">Unite 3 : Grouping and identifying organisms</h3>
        </div>
        <ul>
            <li>
                <a href="#">
                    <div class="levels-progress circle" data-percent="85">
                        <span class="progress-box">
                            <span class="progress-count"></span>
                        </span>
                    </div>
                    <span class="thumb-box">
                        <img src="/assets/default/img/thumb1.png" alt="">
                    </span>
                </a>
                <div class="spell-tooltip">
                    <div class="spell-tooltip-text">
                        <h4 class="font-19 font-weight-bold">Hello!</h4>
                        <span>Learn greetings for meeting people</span>
                    </div>
                </div>
            </li>
            <li>
                <a href="#">
                    <div class="levels-progress circle" data-percent="55">
                        <span class="progress-box">
                            <span class="progress-count"></span>
                        </span>
                    </div>
                    <span class="thumb-box">
                        <img src="/assets/default/img/thumb1.png" alt="">
                    </span>
                </a>
                <div class="spell-tooltip">
                    <div class="spell-tooltip-text">
                        <h4 class="font-19 font-weight-bold">Introducing yourself</h4>
                        <span>Say your name</span>
                    </div>
                </div>
            </li>
            <li class="treasure">
                <a href="#">
                    <span class="thumb-box">
                        <img src="/assets/default/img/treasure.png" alt="">
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="levels-progress circle" data-percent="75">
                        <span class="progress-box">
                            <span class="progress-count"></span>
                        </span>
                    </div>
                    <span class="thumb-box">
                        <img src="/assets/default/img/thumb1.png" alt="">
                    </span>
                </a>
                <div class="spell-tooltip">
                    <div class="spell-tooltip-text">
                        <h4 class="font-19 font-weight-bold">Saying how you are</h4>
                        <span>Complete all Topics above to unlock this!</span>
                    </div>
                </div>
            </li>
            <li>
                <a href="#">
                    <div class="levels-progress circle" data-percent="30">
                        <span class="progress-box">
                            <span class="progress-count"></span>
                        </span>
                    </div>
                    <span class="thumb-box">
                        <img src="/assets/default/img/thumb1.png" alt="">
                    </span>
                </a>
                <div class="spell-tooltip">
                    <div class="spell-tooltip-text">
                        <h4 class="font-19 font-weight-bold">Developing fluency</h4>
                        <span>Complete all Topics above to unlock this!</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="panel-subheader">
        <div class="title">
            <h2 class="font-19 font-weight-bold">Pricing</h2>
        </div>
        <ul class="panel-breadcrumbs">
            <li><a href="#">Home</a></li>
            <li><a href="#">Pricing</a></li>
        </ul>
    </div>
    <div class="panel-stats">
        <div class="stats-user">
            <a href="#">
                <img src="/assets/default/img/stats-thumb.png" alt="">
                <span>Welcome back Mathew Anderson</span>
            </a>
        </div>
        <div class="stats-list">
            <ul>
                <li>
                    <div class="list-box">
                        <strong>$2,340</strong>
                        <span>Today's Sales</span>
                    </div>
                </li>
                <li>
                    <div class="list-box">
                        <strong>35%</strong>
                        <span>Overall Performance</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel-membership">
        <div class="membership-top">
            <p>
                <span>Your free trial expired in 17 days.</span>
                <a href="#">Upgrade</a>
            </p>
        </div>
        <div class="membership-text">
            <p>Upgrade your plan from a <b>free trial,</b> to 'premium <br /> plan'<a href="#">&#8594;</a></p>
            <a href="#" data-toggle="modal" data-target="#exampleModal">Upgrade Account</a>
        </div>
    </div>
    <div class="panel-popup">
        <div class="popup-text">
            <h3 class="font-19 font-weight-bold">Haven't found an answer to your question
                <span>Connect with us either on discord or email us</span>
            </h3>
            <div class="popup-controls">
                <a href="#" class="discord-btn">Ask on Discord</a>
                <a href="#" class="submit-btn">
                  Submit Ticket
                  <div class="lms-tooltip">
                    <div class="tooltip-box">
                        <h5 class="font-18 font-weight-bold text-white mb-5">Use basic phrases</h5>
                        <span class="d-block mb-15 text-white">Prove yor proficiency with Legendary</span>
                        <button class="tooltip-btn practice font-16 d-block mb-15 text-center" onclick='window.location.href = ""'>practice +5 XP</button>
                        <button class="tooltip-btn legendary d-block font-16 text-center" onclick='window.location.href = ""'>Legendary +4 XP</button>
                    </div>
                  </div>
                </a>
            </div>
        </div>
    </div>
    <div class="spell-levels">
        <div class="spell-levels-top">
            <div class="spell-top-left">
                <strong>Unit 3 : Grouping and identifying organisms</strong>
                <a href="#" class="words-count simple"><img src="/assets/default/img/skills-icon.png" alt=""><span>80</span>skills</a>
                <div class="levels-progress horizontal">
                    <span class="progress-box">
                        <span class="progress-count" style="width: 40%;"></span>
                    </span>
                    <span class="progress-numbers">04 / 08</span>
                </div>
            </div>
            <div class="spell-top-right">
                <span class="spell-top-img">
                    <img src="/assets/default/img/spell-lelvel-top-img.png" alt="#">
                </span>
            </div>
        </div>
        <ul>
            <li class="easy">
                <div class="levels-progress circle">
                    <span class="progress-box">
                        <span class="progress-count"></span>
                    </span>
                </div>
                <a href="#"><img src="/assets/default/img/panel-star.png" alt=""></a>
            </li>
            <li class="intermediate">
                <a href="#"><img src="/assets/default/img/panel-lock.png" alt=""></a>
            </li>
            <li class="treasure">
                <a href="#"><img src="/assets/default/img/treasure.png" alt=""></a>
            </li>
            <li class="Hard">
                <a href="#"><img src="/assets/default/img/panel-lock.png" alt=""></a>
                <div class="spell-tooltip">
                    <div class="spell-tooltip-text">
                        <strong>Atoms, elements and the Periodic Table</strong>
                        <span>Complete all Topics above to unlock this!</span>
                        <a href="#" class="locked-btn">Locked</a>
                    </div>
                </div>
            </li>
            <li class="Hard">
                <a href="#"><img src="/assets/default/img/panel-lock.png" alt=""></a>
            </li>
            <li class="Hard">
                <a href="#"><img src="/assets/default/img/panel-lock.png" alt=""></a>
            </li>
            <li class="treasure">
                <a href="#"><img src="/assets/default/img/treasure.png" alt=""></a>
            </li>
            <li class="Hard">
                <a href="#"><img src="/assets/default/img/panel-lock.png" alt=""></a>
                <div class="spell-tooltip">
                    <div class="spell-tooltip-text">
                        <strong>Atoms, elements and the Periodic Table</strong>
                        <span>Complete all Topics above to unlock this!</span>
                        <a href="#" class="locked-btn">Locked</a>
                    </div>
                </div>
            </li>
            <li class="Hard">
                <a href="#"><img src="/assets/default/img/panel-lock.png" alt=""></a>
            </li>
            <li class="Hard">
                <a href="#"><img src="/assets/default/img/panel-lock.png" alt=""></a>
            </li>
            <li class="Hard">
                <a href="#"><img src="/assets/default/img/panel-lock.png" alt=""></a>
            </li>
            <li class="Hard">
                <a href="#"><img src="/assets/default/img/treasure4.png" alt=""></a>
            </li>
        </ul>
    </div>
</section>
<div class="modal fade lms-choose-membership" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class="modal-body">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="get" role="tabpanel" aria-labelledby="get-tab">
              <div class="membership-steps-holder">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center mb-30">
                      <h2>Explore the details of your free trial experience.</h2>
                    </div>
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
                          <a href="#" class="nav-link mt-20 btn-primary rounded-pill" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> Start your 7-day free trial </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="form-login-reading">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 mb-10">
                      <h2 class="font-22">Student's details</h2>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <span class="fomr-label">Student's first name</span>
                                <div class="input-field">
                                    <input type="text" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <span class="fomr-label">Student's last name</span>
                                <div class="input-field">
                                    <input type="text" placeholder="Last name">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group mb-20">
                                <span class="fomr-label">Student's date of birth</span>
                                <div class="input-field">
                                    <input class="input-date" type="text" placeholder="DD">
                                    <input class="input-month" type="text" placeholder="MM">
                                    <input class="input-year" type="text" placeholder="YYYY">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <h5>What type of school are they applying for?</h5>
                                <span class="select-sub-label">If you are unsure, please select Independent and Grammar</span>
                                <div class="select-field">
                                    <input type="radio" id="independent" name="school-type">
                                    <label for="independent">Independent</label>
                                </div>
                                <div class="select-field">
                                    <input type="radio" id="grammar" name="school-type">
                                    <label for="grammar">Grammar</label>
                                </div>
                                <div class="select-field">
                                    <input type="radio" id="independent-grammar" name="school-type">
                                    <label for="independent-grammar">Independent and Grammar</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <h5>Students's account details</h5>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <span class="fomr-label">User name</span>
                                <div class="input-field">
                                    <input type="text" placeholder="User name">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <span class="fomr-label">Password</span>
                                <div class="input-field">
                                    <input type="password" placeholder="Create a password">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group mt-30">
                                <div class="btn-field">
                                    <button type="submit" class="nav-link" id="book-tab" data-toggle="tab" data-target="#book" type="button" role="tab" aria-controls="book" aria-selected="true">Create student's profile</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <a href="#" class="nav-link btn-primary rounded-pill mb-25 text-center" id="book-tab" data-toggle="tab" data-target="#book" type="button" role="tab" aria-controls="book" aria-selected="true"> continue </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                            <p class="mb-20">By Clicking on Start Free Trial, I agree to the <a href="#">Terms of Service</a>And <a href="#">Privacy Policy</a>
                            </p>
                            <div class="subscription mb-20">
                            <span>Already have a subscription? <a href="#" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">log in</a>
                            </span>
                        </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">
              <div class="book-detail-holder">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="book-detail">
                        <div class="img-holder">
                          <figure>
                            <img src="../assets/default/img/book-list1.png" height="192" width="152" alt="#">
                          </figure>
                        </div>
                        <div class="text-holder mt-20">
                          <h2>Consult a grownup for assistance.</h2>
                          <p class="mt-15">
                            <a href="#">
                            <span class="icon-svg">
                                <img src="/assets/default/svgs/sound-play.svg" height="28" width="28" alt="sound-play">
                            </span>
                            </a> Upgrade to the Family Premium plan to read the rest of this book and enjoy unlimited access to our entire library.
                          </p>
                          <a href="#" class="nav-link btn-primary rounded-pill mb-25" id="subscribe-tab" data-toggle="tab" data-target="#subscribe" type="button" role="tab" aria-controls="subscribe" aria-selected="false"> Get Rurera </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="subscribe" role="tabpanel" aria-labelledby="subscribe-tab">
              <div class="subscribe-plan-holder">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center mb-40">
                      <h2>Select the rurera Family plan for your subscription.</h2>
                      <p class="mt-10">Pay monthly or save 44% annually after your free trial!</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="subscribe-plan position-relative bg-white d-flex flex-column align-items-center rounded-sm shadow pt-30 pb-30 px-20 mb-30">
                        <div class="d-flex align-items-start text-primary mt-20">
                          <span class="font-36 line-height-1">$20</span>
                        </div>
                        <ul class="mt-20 plan-feature">
                          <li class="mt-10">15 days of subscription</li>
                        </ul>
                        <button type="submit" id="contact-tab" data-toggle="tab" data-target="#contact" role="tab" aria-controls="contact" aria-selected="false" class="btn btn-primary btn-block mt-30 rounded-pill bg-none"> Purchase </button>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="subscribe-plan position-relative bg-white d-flex flex-column align-items-center rounded-sm shadow pt-30 pb-30 px-20 mb-30">
                        <span class="badge badge-primary badge-popular px-15 py-5">Popular</span>
                        <div class="d-flex align-items-start text-primary mt-20">
                          <span class="font-36 line-height-1">$100</span>
                        </div>
                        <ul class="mt-20 plan-feature">
                          <li class="mt-10">30 days of subscription</li>
                        </ul>
                        <button type="submit" id="contact-tab" data-toggle="tab" data-target="#contact" role="tab" aria-controls="contact" aria-selected="false" class="btn btn-primary btn-block mt-30 rounded-pill"> Purchase </button>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 price-plan-image">
                      <img src="../assets/default/img/price-plan.png" alt="#" height="270" width="166">
                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center bg-dark-green bg-dark-green">
                      <strong>96% of subscribing parents in rurera Family report significant improvement in their child's reading skills.</strong>
                      <div class="subscription mt-20">
                        <span>Already have a subscription? <a href="." id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">log in</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <div class="book-form-holder">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-12 col-lg-9 col-md-9 col-sm-12 text-center">
                      <h2>The Final Step to Reading!</h2>
                      <p>No need to worry! We won't ask for payment until after your 7-day free trial ends.</p>
                    </div>
                    <div class="col-12 col-lg-9 col-md-9 col-sm-12">
                      <div class="book-form mt-30">
                        <div class="row">
                          <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              <div class="input-field">
                                <input type="text" placeholder="First Name">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              <div class="input-field">
                                <input type="text" placeholder="Last Name">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                              <div class="input-field input-card">
                                <span class="icon-svg">
                                    <img src="/assets/default/svgs/card.svg" height="24" width="24" alt="card">
                                </span>
                                <input type="text" placeholder="Card Number">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                            <p class="mb-25"> Once your 7-day free trial is over, we will automatically charge your chosen payment method $19.99 every month until you decide to cancel. You have the freedom to cancel at any time. Keep in mind that there may be sales tax added. For instructions on how to cancel, please refer to the provided guidelines </p>
                          </div>
                          <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                            <a href="#" class="nav-link btn-primary rounded-pill mb-25" id="get-tab" data-toggle="tab" data-target="#get" type="button" role="tab" aria-controls="get" aria-selected="false">Sart Free Trial</a>
                          </div>
                          <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                            <p class="mb-20">By Clicking on Start Free Trial, I agree to the <a href="#">Terms of Service</a>And <a href="#">Privacy Policy</a>
                            </p>
                            <div class="subscription mb-20">
                              <span>Already have a subscription? <a href="#">log in</a>
                              </span>
                            </div>
                            <div class="secure-server">
                              <figure>
                                <img src="/assets/default/svgs/server-lock.svg" height="26" width="26" alt="">
                              </figure>
                              <span> Secure Server <br> SSL Encrypted </span>
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
@endsection

@push('scripts_bottom')

@endpush
