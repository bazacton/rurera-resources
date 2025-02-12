@extends('admin.layouts.app_full')

@push('libraries_top')

@endpush
@push('styles_top')
    <link rel="stylesheet" href="/assets/default/css/panel-pages/dashboard.css">
@endpush

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="compliance-programes">
                    <div class="section-header">
                        <h1>Compliance Program</h1>
                    </div>
                    <div class="compliance-info">
                        <ul>
                            <li>
                                <span class="compliance-info-lable">Passing Controls</span>
                                <div class="compliance-info-text">
                                    <strong><img src="/assets/default/img/circle-green.png" alt="circle-green"> 73% - 65<em>/89</em></strong>
                                </div>
                            </li>
                            <li>
                                <span class="compliance-info-lable">Unassignd</span>
                                <div class="compliance-info-text">
                                    <strong>8 controls</strong>
                                </div>
                            </li>
                            <li>
                                <span class="compliance-info-lable">Requirements Met</span>
                                <div class="compliance-info-text">
                                    <strong>16<em>/33</em></strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="compliance-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="overview-tab" data-toggle="tab" data-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">
                                    <img src="/assets/default/svgs/grid-9dots.svg" alt="grid"> Overview
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="controls-tab" data-toggle="tab" data-target="#controls" type="button" role="tab" aria-controls="controls" aria-selected="false">
                                    <img src="/assets/default/svgs/settings.svg" alt="settings"> Controls
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="requirements-tab" data-toggle="tab" data-target="#requirements" type="button" role="tab" aria-controls="requirements" aria-selected="false">
                                    <img src="/assets/default/svgs/check-lists.svg" alt="check-lists"> Requirements
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="frameworks-tab" data-toggle="tab" data-target="#frameworks" type="button" role="tab" aria-controls="frameworks" aria-selected="false">
                                    <img src="/assets/default/svgs/frame-cube.svg" alt="frame-cube"> Frameworks
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="elements-title">
                                    <h2 class="font-22">Frameworks</h2>
                                    <div class="framework-controls">
                                        <button type="button" class="logos-btn"><img src="/assets/default/img/btn-logo.png" alt="logos"></button>
                                        <button type="button"><img src="/assets/default/svgs/badge-reward.svg" alt="logos"> Compliance badges</button>
                                    </div>
                                </div>
                                <div class="framework-listings mb-30">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 col-md-6">
                                            <div class="framework-card">
                                                <div class="card-heading">
                                                    <h3>Framework Progress</h3>
                                                    <a href="#">View all</a>
                                                </div>
                                                <ul class="progress-list">
                                                    <li>
                                                        <div class="logo-box">
                                                            <img src="/assets/default/img/iso-logo.png" alt="iso-logo">
                                                            <span>ISO 27001</span>
                                                        </div>
                                                        <div class="value-box">
                                                            <span>0<em>/89</em></span>
                                                        </div>
                                                        <div class="progress-box">
                                                            <img src="/assets/default/img/circle-gray.png" alt="circle-gray">
                                                            <span>0%</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="logo-box">
                                                            <img src="/assets/default/img/soc-logo.png" alt="soc-logo">
                                                            <span>SOC 2 Type 2</span>
                                                        </div>
                                                        <div class="value-box">
                                                            <span>66<em>/89</em></span>
                                                        </div>
                                                        <div class="progress-box">
                                                            <img src="/assets/default/img/circle-green.png" alt="circle-green">
                                                            <span>76%</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="logo-box">
                                                            <img src="/assets/default/img/soc-logo.png" alt="soc-logo">
                                                            <span>HIPAA</span>
                                                        </div>
                                                        <div class="value-box">
                                                            <span>9<em>/89</em></span>
                                                        </div>
                                                        <div class="progress-box">
                                                            <img src="/assets/default/img/circle-red.png" alt="circle-green">
                                                            <span>14%</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="logo-box">
                                                            <img src="/assets/default/img/soc-logo.png" alt="soc-logo">
                                                            <span>PCI DSS</span>
                                                        </div>
                                                        <div class="value-box">
                                                            <span>64<em>/64</em></span>
                                                        </div>
                                                        <div class="progress-box">
                                                            <img src="/assets/default/img/circle-green.png" alt="circle-green">
                                                            <span>100%</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-6">
                                            <div class="framework-card">
                                                <div class="card-heading">
                                                    <h3>100% Controls Assigned</h3>
                                                    <div class="chart-value-lables">
                                                        <span class="assigned">Assigned</span>
                                                        <span class="unassigned">Unassigned</span>
                                                    </div>
                                                </div>
                                                <div class="chart-box">
                                                    <img src="/assets/default/img/verticle-chart.png" alt="verticle-chart">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-6">
                                            <div class="framework-card">
                                                <div class="card-heading">
                                                    <h3>73% of Controls Pass</h3>
                                                </div>
                                                <div class="chart-box circle-chart">
                                                    <img src="/assets/default/img/circle-chart.png" alt="circle-chart">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elements-title">
                                    <h2 class="font-22">Control categories</h2>
                                </div>
                                <div class="categories-listings">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 col-md-6">
                                            <div class="categories-listing-card">
                                                <div class="card-heading">
                                                    <h3><img src="/assets/default/svgs/painter-brush.svg" alt="painter-brush"> Access Control and Authorizatio</h3>
                                                    <div class="dropdown-box">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt="dots-three"></span>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-attempt-status">
                                                    <ul>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                    </ul>
                                                    <div class="attempt-info">
                                                        <span>0/<em>18 controls passing</em></span>
                                                        <span>0% assigned</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-6">
                                            <div class="categories-listing-card">
                                                <div class="card-heading">
                                                    <h3><img src="/assets/default/svgs/painter-brush.svg" alt="painter-brush"> Infrastructure Security</h3>
                                                    <div class="dropdown-box">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt="dots-three"></span>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-attempt-status">
                                                    <ul>
                                                        <li class="incorrect"><span></span></li>
                                                        <li class="incorrect"><span></span></li>
                                                        <li class="incorrect"><span></span></li>
                                                        <li class="incorrect"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                    </ul>
                                                    <div class="attempt-info">
                                                        <span>0/<em>22 controls passing</em></span>
                                                        <span>0% assigned</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-6">
                                            <div class="categories-listing-card">
                                                <div class="card-heading">
                                                    <h3><img src="/assets/default/svgs/painter-brush.svg" alt="painter-brush"> Vulnerability Management</h3>
                                                    <div class="dropdown-box">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt="dots-three"></span>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user-attempt-status">
                                                    <ul>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="correct"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                        <li class="no-attempt"><span></span></li>
                                                    </ul>
                                                    <div class="attempt-info">
                                                        <span>0/<em>6 controls passing</em></span>
                                                        <span>0% assigned</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="controls" role="tabpanel" aria-labelledby="controls-tab">...</div>
                            <div class="tab-pane fade" id="requirements" role="tabpanel" aria-labelledby="requirements-tab">...</div>
                            <div class="tab-pane fade" id="frameworks" role="tabpanel" aria-labelledby="frameworks-tab">...</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="hotel-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Hotel Chain</th>
                                <th>Details</th>
                                <th>Description</th>
                                <th>Average Stay</th>
                                <th>Average Occupancy Rate</th>
                                <th>Available In</th>
                                <th>Average Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="hotel-thum-box">
                                        <div class="img-holder">
                                            <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="go-jetters-hero-academy-cc-v2">
                                        </div>
                                        <strong>
                                            Mountain Village Resorts
                                            <span>Self-catering huts</span>
                                        </strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="categories">
                                        <span>Categories: <em>3-star</em></span>
                                        <span>Segment: <em>Winter breaks</em></span>
                                        <span>Target: <em>Family</em></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="description">
                                        <p>Perfect for a cozy, affordable family winter getaway! Stay in our self-catering holiday villages in the mountains.... <a href="#">More</a></p>
                                    </div>
                                </td>
                                <td>
                                    <span class="progress-lable">Compared to segment in days</span>
                                    <div class="progress">
                                        <div class="progress-bar" data-value="7" style="width: 70%;"></div>
                                        <div class="days-value" data-value="5"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="occupancy">
                                        <span class="occupancy-lable">% of available beds occupied</span>
                                        <div class="progress-box">
                                            <div class="circle_percent circle-green" data-percent="75">
                                                <div class="circle_inner">
                                                    <div class="round_per"></div>
                                                </div>
                                            <div class="circle_inbox"><span class="percent_text">75%</span></div></div>
                                        </div>
                                        <div class="occupancy-info">
                                            <div>Total Nights: <span>163,520</span></div>
                                            <div>Cancellation Rate: <span>12%</span></div>
                                            <div>Last-Minute: <span>10%</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="available-in">Austria, France</td>
                                <td class="rating">Excellent</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="hotel-thum-box">
                                        <div class="img-holder">
                                            <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="go-jetters-hero-academy-cc-v2">
                                        </div>
                                        <strong>
                                            Luxury Lakeside Spas
                                            <span>5-star comfort</span>
                                        </strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="categories">
                                        <span>Categories: <em>3-star</em></span>
                                        <span>Segment: <em>Winter breaks</em></span>
                                        <span>Target: <em>Family</em></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="description">
                                        <p>Perfect for a cozy, affordable family winter getaway! Stay in our self-catering holiday villages in the mountains.... <a href="#">More</a></p>
                                    </div>
                                </td>
                                <td>
                                    <span class="progress-lable">Compared to segment in days</span>
                                    <div class="progress">
                                        <div class="progress-bar" data-value="5" style="width: 50%;"></div>
                                        <div class="days-value" data-value="3" style="left: 30px;"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="occupancy">
                                        <span class="occupancy-lable">% of available beds occupied</span>
                                        <div class="progress-box">
                                            <div class="circle_percent circle-green" data-percent="80">
                                                <div class="circle_inner">
                                                    <div class="round_per"></div>
                                                </div>
                                            <div class="circle_inbox"><span class="percent_text">80%</span></div></div>
                                        </div>
                                        <div class="occupancy-info">
                                            <div>Total Nights: <span>163,520</span></div>
                                            <div>Cancellation Rate: <span>12%</span></div>
                                            <div>Last-Minute: <span>10%</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="available-in">Austria, France</td>
                                <td class="rating">Excellent</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="progress-table">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>
                                    <div class="word-selection-box">
                                        <div class="word-controls">
                                            <button type="button">U</button>
                                            <button type="button" class="target">T</button>
                                            <button type="button" class="almost">A</button>
                                            <button type="button" class="met">M</button>
                                            <button type="button" class="exceeding">E</button>
                                            <button class="remove-btn"><img src="/assets/default/svgs/paint-brush.svg" alt="paint-brush"></button>
                                        </div>
                                        <span class="selection-status"><em>0</em> Selection</span>
                                        <button type="button" class="clear-btn"><img src="/assets/default/svgs/dot-circle.svg" alt="dot-circle"> Clear Selection</button>
                                    </div>
                                </th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Azeneth Armando</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Amelie Austin</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Eloise Chapman</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Aaliyah Collier</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Bailey Cook</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Jasmine Doyle</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Jorginho Gaspar</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Jayden Glover</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Prabodh Iyer</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Avinash Jain</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Ansel Jobin</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Makary Kaczmarek</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Kajal Korrapati</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Rishi Korrapati</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Bùi Thị Lự Chị</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Yue Wan Lü</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="child-level-1">
                                <td class="has-met">
                                    <div class="text-box">
                                        <button type="button" class="collaps-btn"><span class="icon-box"><img src="/assets/default/svgs/arrow-right.svg" alt="arrow-right"></span></button>
                                        Count NAHT KPI Count 2.1.a.1 Count in tens from any number, forward and backward
                                    </div>
                                </td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="target"><span>Target</span>T</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                            </tr>
                            <tr class="child-level-2">
                                <td class="has-met">
                                    <div class="text-box">
                                        <button type="button" class="collaps-btn"><span class="icon-box"><img src="/assets/default/svgs/arrow-right.svg" alt="arrow-right"></span></button>
                                        Count NAHT KPI Count 2.1.a.2 Identify ten more or ten less than any given number
                                    </div>
                                </td>
                                <td class="almost">A</td>
                                <td class="exceeding">E</td>
                                <td class="target">T</td>
                                <td class="met">M</td>
                                <td class="met">M</td>
                                <td class="met">M</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="met">M</td>
                                <td class="target">T</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                            </tr>
                            <tr class="child-level-3">
                                <td class="has-met">
                                    <div class="text-box">
                                        <button type="button" class="collaps-btn"><span class="icon-box"><img src="/assets/default/svgs/arrow-right.svg" alt=""></span></button>
                                        Order and compare NAHT KPI Order and compare 2.1.c.1 Compare and order numbers from 0 up to 100; use &lt;, &gt; and = signs
                                    </div>
                                </td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="met">M</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="met">M</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="parent-child-table mb-30">
                    <table>
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Parent 1</td>
                                <td>Main Parent Item</td>
                                <td>10</td>
                            </tr>
                            <tr class="child-level-1">
                                <td>Child 1.1</td>
                                <td>First-level child of Parent 1</td>
                                <td>4</td>
                            </tr>
                            <tr class="child-level-2">
                                <td>Child 1.1.1</td>
                                <td>Second-level child of Child 1.1</td>
                                <td>2</td>
                            </tr>
                            <tr class="child-level-3">
                                <td>Child 1.1.1.1</td>
                                <td>Third-level child of Child 1.1.1</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>Parent 2</td>
                                <td>Main Parent Item</td>
                                <td>8</td>
                            </tr>
                            <tr class="child-level-1">
                                <td>Child 2.1</td>
                                <td>First-level child of Parent 2</td>
                                <td>3</td>
                            </tr>
                            <tr class="child-level-2">
                                <td>Child 2.1.1</td>
                                <td>Second-level child of Child 2.1</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="report-table">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2" style="background-color: #fff"><img src="/assets/default/svgs/three-columns.svg" alt=""> Graph Colmuns</th>
                                <th colspan="4" class="report-title bg-danger">
                                    <div class="collapse-control-box">
                                        <button type="button" class="collaps-btn" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1"></button> 
                                        <b>1: Global Geograph...</b>
                                    </div>
                                </th>
                                <th colspan="10" class="report-title">
                                    <div class="collapse-control-box">
                                        <button type="button" class="collaps-btn" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2"></button> 
                                        <b>2: UK Geographical Issues</b>
                                    </div>
                                </th>
                                <th colspan="6" class="report-title" style="background-color: #c7f4e0">3: People &amp; Environment</th>
                                <th colspan="2" style="background-color: #e0f6fe">Topic S..</th>
                                <th colspan="7" style="background-color: #f9cfb3">Summary</th>
                                <th colspan="7" style="background-color: #fdedde">Summary</th>
                            </tr>
                            <tr>
                                <th style="background-color: #fff">Columns</th>
                                <th style="background-color: #fff">Columns</th>

                                <th style="background-color: #fee3ea">
                                    <span id="collapse1" class="collapse show" aria-labelledby="heading1">Tracy Beaker</span>
                                </th>
                                <th style="background-color: #fee3ea"><span>Tracy Beaker</span></th>
                                <th style="background-color: #fcd9df"><span>C: Development Dynamics/34</span></th>
                                <th style="background-color: #fcd9df"><span>D: Hazardous Earthy 30</span></th>

                                <th style="background-color: #fdeec5"><span>The UK Economy</span></th>
                                <th style="background-color: #fdeec5"><span>Coastal Changes</span></th>
                                <th style="background-color: #fdeec5">
                                    <span id="collapse2" class="collapse show" aria-labelledby="heading2">Dynamic Urban Areas</span>
                                </th>
                                <th style="background-color: #fdeec5"><span>Choice 1</span></th>
                                <th style="background-color: #fee7ac">
                                    <span id="collapse2" class="collapse show" aria-labelledby="heading2">Choice 2</span>
                                </th>

                                <th style="background-color: #fdeec5"><span>People Under Threat</span></th>
                                <th style="background-color: #fdeec5"><span>Consuming Resources</span></th>
                                <th style="background-color: #fee7ac"><span>Paper Grade</span></th>
                                <th style="background-color: #fee7ac"><span>Overall Marks</span></th>

                                <th style="background-color: #ffe4b2"><span>Paste Paper Grade</span></th>

                                <th style="background-color: #c7f4e0"><span>A: Hazardous Earthy 30</span></th>
                                <th style="background-color: #c7f4e0"><span>B: Development Dynamics/34</span></th>
                                <th style="background-color: #c7f4e0"><span>C: Development Dynamics/34</span></th>
                                <th style="background-color: #c7f4e0"><span>D: Hazardous Earthy 30</span></th>
                                <th style="background-color: #c7f4e0"><span>Overall Marks</span></th>
                                <th style="background-color: #c7f4e0"><span>Paste Paper Grade</span></th>

                                <th style="background-color: #dbeefd"><span>Overall Marks</span></th>
                                <th style="background-color: #dbeefd"><span>Paste Paper Grade</span></th>

                                <th colspan="1" style="background-color: #feddc5">
                                    <strong>M..</strong>
                                    <em>Paste Paper Grade</em>
                                </th>
                                <th colspan="2" style="background-color: #feddc5">
                                    <strong>Unit Marks</strong>
                                    <em>Paste Paper Grade</em>
                                    <em>Paste Paper Grade</em>
                                </th>
                                <th colspan="4" style="background-color: #feddc5">
                                    <strong>Current G..</strong>
                                    <em>Paste Paper Grade</em>
                                    <em>Paste Paper Grade</em>
                                    <em>Paste Paper Grade</em>
                                    <em>Paste Paper Grade</em>
                                </th>
                                <th style="background-color: #fdedde">9</th>
                                <th style="background-color: #fdedde">8</th>
                                <th style="background-color: #fdedde">7</th>
                                <th style="background-color: #fdedde">6</th>
                                <th style="background-color: #fdedde">5</th>
                                <th style="background-color: #fdedde">4</th>
                                <th style="background-color: #fdedde">3</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3</td>
                                <td>2</td>
                                <td>17</td>
                                <td>17</td>
                                <td>15</td>
                                <td class="highlight-blue">5</td>
                                <td>25</td>
                                <td>12</td>
                                <td>15</td>
                                <td>9</td>
                                <td>9</td>
                                <td>17</td>
                                <td>17</td>
                                <td class="highlight-green">7</td>
                                <td>50</td>
                                <td>64</td>
                                <td>4</td>
                                <td>3.80</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                                <td>16</td>
                                <td>17</td>
                                <td>18</td>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                                <td>16</td>
                                <td>17</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>3</td>
                                <td>17</td>
                                <td>17</td>
                                <td>15</td>
                                <td class="highlight-blue">5</td>
                                <td>25</td>
                                <td>12</td>
                                <td>15</td>
                                <td>9</td>
                                <td>9</td>
                                <td>17</td>
                                <td>17</td>
                                <td class="highlight-green">7</td>
                                <td>50</td>
                                <td>64</td>
                                <td>4</td>
                                <td>3.80</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                                <td>16</td>
                                <td>17</td>
                                <td>18</td>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                                <td>16</td>
                                <td>17</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="section-header">
                    <h1>Track</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/admin/">Dashboard</a>
                        </div>
                        <div class="breadcrumb-item">Track</div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="quiz-data-holder mb-30">
                    <div class="quiz-data-filters">
                        <span class="sorting-lable">Filter by:</span>
                        <div class="select-field">
                            <select>
                                <option value="All Games">All Games</option>
                                <option value="Footbal">Footbal</option>
                                <option value="Car Racing">Car Racing</option>
                                <option value="Cricket">Cricket</option>
                                <option value="Hockey">Hockey</option>
                            </select>
                        </div>
                        <div class="select-field">
                            <select>
                                <option value="All Reports">All Reports</option>
                                <option value="Weekly Reports">Weekly Reports</option>
                                <option value="Monthly Reports">Monthly Reports</option>
                                <option value="Yearly Reports">Yearly Reports</option>
                            </select>
                        </div>
                        <div class="select-field">
                            <select>
                                <option value="All Classes">All Classes</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 3</option>
                                <option value="Grade 3">Grade 3</option>
                            </select>
                        </div>
                        <div class="select-field">
                            <select>
                                <option value="All Classes">Filter by Date</option>
                                <option value="04/12/2024">04/12/2024</option>
                                <option value="04/12/2024">Grade 3</option>
                                <option value="04/12/2024">Grade 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="quiz-data-table bg-white panel-border">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox-field">
                                            <input type="checkbox" id="q-type">
                                            <label for="q-type">Type</label>
                                        </div>
                                    </th>
                                    <th>Quiz Name</th>
                                    <th class="text-center">Total <br> Participants</th>
                                    <th>Accuracy</th>
                                    <th>Code</th>
                                    <th>Class</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox-field">
                                            <input type="checkbox" id="assigned">
                                            <label for="assigned">
                                                <span><img src="/assets/default/svgs/list-view.svg" alt=""> Assigned</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        Science
                                        <small>Dec 3 - <em>Runing</em></small>
                                    </td>
                                    <td class="text-center">2</td>
                                    <td>
                                        <div class="progress-holder">
                                            <div class="progress-box">
                                                <div class="circle_percent" data-percent="50">
                                                    <div class="circle_inner">
                                                        <div class="round_per" style="transform: rotate(360deg);"></div>
                                                    </div>
                                                    <div class="circle_inbox">
                                                        <span class="percent_text">50%</span>
                                                    </div>
                                                <div class="circle_inbox"><span class="percent_text">50%</span></div></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <span class="c-grade">Grade 6</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="quiz-data-controls">
                                            <button type="button">Edit Questions</button>
                                            <div class="dropdown-box">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt=""></span>
                                                    </a>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt=""> Print</a>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt=""> Delete</a>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt=""> Email To Prent</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="quiz-data-slide">
                            <div class="quiz-data-slide-inner">
                                <div class="slide-controls">
                                    <button type="button" class="close-btn">
                                        <span>×</span>
                                    </button>
                                    <div class="prev-next-controls">
                                        <button type="button" class="prev-btn"><span class="icon-box"><img src="/assets/default/svgs/arrow-left.svg" alt=""></span> Prev</button>
                                        <button type="button" class="next-btn"><span class="icon-box">Next <img src="/assets/default/svgs/arrow-right.svg" alt=""></span></button>
                                    </div>
                                </div>

                                <div class="edit-questions-difficulty-tabs mb-30">
                                    <div class="edit-questions-difficulty-data">
                                        <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills mt-20" id="assignment_tabs" role="tablist">
                                            <li class="nav-item"><a data-bulk_list_id="20" data-part_item_id="1374" class="nav-link difficulty-level-btn active" data-difficulty_level="Emerging" id="section-tabid-Emerging" data-toggle="tab" href="#section-tab-Emerging" role="tab" aria-controls="section-tab-Emerging" aria-selected="true"><span class="tab-title">Emerging</span></a></li>
                                            <li class="nav-item"><a data-bulk_list_id="20" data-part_item_id="1374" class="nav-link difficulty-level-btn " data-difficulty_level="Expected" id="section-tabid-Expected" data-toggle="tab" href="#section-tab-Expected" role="tab" aria-controls="section-tab-Expected" aria-selected="true"><span class="tab-title">Expected</span></a></li>
                                            <li class="nav-item"><a data-bulk_list_id="20" data-part_item_id="1374" class="nav-link difficulty-level-btn " data-difficulty_level="Exceeding" id="section-tabid-Exceeding" data-toggle="tab" href="#section-tab-Exceeding" role="tab" aria-controls="section-tab-Exceeding" aria-selected="true"><span class="tab-title">Exceeding</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="edit-questions-tabs">
                                        <div class="nav questions-nav-bar" id="nav-tab" role="tablist">
                                            <button data-question_index="1" data-question_type="checkbox" data-question_id="30883" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link active" id="nav-q1-tab" data-toggle="tab" data-target="#nav-q1" type="button" role="tab" aria-controls="nav-q1" aria-selected="true"><span class="similiarity-status warning"></span><br>1</button>
                                            <button data-question_index="2" data-question_type="checkbox" data-question_id="30886" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q2-tab" data-toggle="tab" data-target="#nav-q2" type="button" role="tab" aria-controls="nav-q2" aria-selected="true"><span class="similiarity-status warning"></span><br>2</button>
                                            <button data-question_index="3" data-question_type="checkbox" data-question_id="30889" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q3-tab" data-toggle="tab" data-target="#nav-q3" type="button" role="tab" aria-controls="nav-q3" aria-selected="true">3</button>
                                            <button data-question_index="4" data-question_type="checkbox" data-question_id="30892" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q4-tab" data-toggle="tab" data-target="#nav-q4" type="button" role="tab" aria-controls="nav-q4" aria-selected="true"><span class="similiarity-status warning"></span><br>4</button>
                                            <button data-question_index="5" data-question_type="checkbox" data-question_id="30895" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q5-tab" data-toggle="tab" data-target="#nav-q5" type="button" role="tab" aria-controls="nav-q5" aria-selected="true">5</button>
                                            <button data-question_index="6" data-question_type="checkbox" data-question_id="30898" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q6-tab" data-toggle="tab" data-target="#nav-q6" type="button" role="tab" aria-controls="nav-q6" aria-selected="true"><span class="similiarity-status warning"></span><br>6</button>
                                            <button data-question_index="7" data-question_type="checkbox" data-question_id="30901" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q7-tab" data-toggle="tab" data-target="#nav-q7" type="button" role="tab" aria-controls="nav-q7" aria-selected="true"><span class="similiarity-status warning"></span><br>7</button>
                                            <button data-question_index="8" data-question_type="checkbox" data-question_id="30904" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q8-tab" data-toggle="tab" data-target="#nav-q8" type="button" role="tab" aria-controls="nav-q8" aria-selected="true">8</button>
                                            <button data-question_index="9" data-question_type="checkbox" data-question_id="30907" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q9-tab" data-toggle="tab" data-target="#nav-q9" type="button" role="tab" aria-controls="nav-q9" aria-selected="true">9</button>
                                            <button data-question_index="10" data-question_type="checkbox" data-question_id="30910" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q10-tab" data-toggle="tab" data-target="#nav-q10" type="button" role="tab" aria-controls="nav-q10" aria-selected="true">10</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Participants html start -->
                                <div class="chart-summary-fields result-layout-summary">
                                    <div class="sats-summary">
                                        <div class="row">
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
                                                    <div class="score">2 / 264</div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-3">
                                                <div class="sats-summary-icon" style="background-color: #fe3c30;">
                                                    <img src="/assets/default/svgs/question-circle-white.svg" alt="">
                                                </div>
                                                <div class="summary-text">
                                                    <label>Incorrect / Not Attempted</label>
                                                    <div class="score">1 / 262</div>
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
                                                    <div class="score">00s</div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-3">
                                                <div class="sats-summary-icon" style="background-color: #0272b6;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#fff" version="1.1" id="Capa_1" width="800px" height="800px" viewBox="0 0 185.872 185.871" xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <path d="M91.733,47.389c-18.389,0-33.305-5.964-33.305-13.317v13.317c0,7.365,14.916,13.32,33.305,13.32      c18.396,0,33.302-5.956,33.302-13.32V34.071C125.029,41.431,110.128,47.389,91.733,47.389z"></path>
                                                                        <path d="M91.733,3.52c-18.389,0-33.305,5.961-33.305,13.323v13.32c0,7.365,14.916,13.317,33.305,13.317      c18.396,0,33.302-5.961,33.302-13.317v-13.32C125.029,9.48,110.128,3.52,91.733,3.52z M91.733,26.825      c-18.301,0-29.968-5.915-29.968-9.989c0-4.076,11.667-9.995,29.968-9.995c18.298,0,29.959,5.919,29.959,9.995      C121.686,20.91,110.031,26.825,91.733,26.825z"></path>
                                                                        <path d="M94.272,15.308c-3.848-0.621-5.44-1.029-5.44-1.662c0-0.536,0.95-1.087,3.891-1.087c3.255,0,5.35,0.451,6.524,0.654      l1.322-2.18c-1.505-0.308-3.532-0.581-6.577-0.636V8.695h-4.436v1.833c-4.844,0.405-7.651,1.739-7.651,3.44      c0,1.878,3.297,2.844,8.15,3.535c3.35,0.481,4.802,0.944,4.802,1.678c0,0.779-1.766,1.199-4.354,1.199      c-2.936,0-5.605-0.401-7.508-0.849l-1.352,2.256c1.696,0.426,4.658,0.773,7.693,0.837v1.833h4.424v-1.964      c5.213-0.387,8.062-1.857,8.062-3.581C101.823,17.187,99.655,16.127,94.272,15.308z"></path>
                                                                        <path d="M58.428,51.587c0.012,0,0.034,0.006,0.052,0.013c0-0.07-0.052-0.131-0.052-0.195V51.587z"></path>
                                                                        <path d="M91.733,64.73c-6.929,0-13.351-0.843-18.675-2.29c1.09,2.016,1.726,4.235,1.726,6.686v7.015      c4.99,1.19,10.732,1.915,16.949,1.915c18.396,0,33.302-5.961,33.302-13.326V51.404C125.029,58.77,110.128,64.73,91.733,64.73z"></path>
                                                                        <path d="M91.733,82.069c-6.217,0-11.959-0.728-16.949-1.912v9.42c8.126-4.926,20.371-7.276,32.117-7.276      c5.943,0,12.008,0.612,17.61,1.827c0.262-0.673,0.518-1.352,0.518-2.064V68.74C125.029,76.102,110.128,82.069,91.733,82.069z"></path>
                                                                    </g>
                                                                    <g>
                                                                        <path d="M33.301,99.68C14.912,99.68,0,93.712,0,86.359v13.32c0,7.367,14.912,13.316,33.301,13.316      c18.396,0,33.308-5.949,33.308-13.316v-13.32C66.603,93.712,51.697,99.68,33.301,99.68z"></path>
                                                                        <path d="M33.301,117.009C14.912,117.009,0,111.054,0,103.698v13.311c0,7.368,14.912,13.329,33.301,13.329      c18.396,0,33.308-5.961,33.308-13.329v-13.311C66.603,111.06,51.697,117.009,33.301,117.009z"></path>
                                                                        <path d="M33.301,134.351C14.912,134.351,0,128.396,0,121.034v13.316c0,7.368,14.912,13.323,33.301,13.323      c18.396,0,33.308-5.961,33.308-13.323v-13.316C66.603,128.396,51.697,134.351,33.301,134.351z"></path>
                                                                        <path d="M33.301,151.693C14.912,151.693,0,145.726,0,138.369v13.324c0,7.355,14.912,13.322,33.301,13.322      c18.396,0,33.308-5.967,33.308-13.322v-13.324C66.603,145.726,51.697,151.693,33.301,151.693z"></path>
                                                                        <path d="M33.301,169.028C14.912,169.028,0,163.067,0,155.712v13.316c0,7.362,14.912,13.323,33.301,13.323      c18.396,0,33.308-5.961,33.308-13.323v-13.316C66.603,163.067,51.697,169.028,33.301,169.028z"></path>
                                                                        <path d="M33.301,55.801C14.912,55.801,0,61.762,0,69.121v13.323c0,7.365,14.912,13.32,33.301,13.32      c18.396,0,33.308-5.961,33.308-13.32V69.121C66.603,61.762,51.697,55.801,33.301,55.801z M33.301,79.116      c-18.295,0-29.968-5.919-29.968-9.995c0-4.08,11.673-9.989,29.968-9.989c18.301,0,29.974,5.909,29.974,9.989      C63.269,73.197,51.596,79.116,33.301,79.116z"></path>
                                                                        <path d="M35.837,67.599c-3.845-0.624-5.435-1.029-5.435-1.666c0-0.536,0.953-1.083,3.891-1.083c3.255,0,5.349,0.447,6.528,0.654      l1.315-2.183c-1.504-0.304-3.535-0.579-6.567-0.636v-1.696h-4.445v1.833c-4.844,0.405-7.651,1.742-7.651,3.443      c0,1.87,3.306,2.844,8.15,3.535c3.349,0.487,4.801,0.947,4.801,1.684c0,0.779-1.766,1.196-4.354,1.196      c-2.935,0-5.599-0.398-7.499-0.853l-1.361,2.256c1.702,0.429,4.664,0.779,7.693,0.834v1.836h4.436v-1.967      c5.206-0.387,8.056-1.852,8.056-3.578C43.397,69.474,41.227,68.408,35.837,67.599z"></path>
                                                                    </g>
                                                                    <g>
                                                                        <path d="M106.901,134.351c-18.386,0-33.301-5.955-33.301-13.316v13.316c0,7.368,14.916,13.323,33.301,13.323      c18.396,0,33.308-5.955,33.308-13.323v-13.316C140.208,128.396,125.296,134.351,106.901,134.351z"></path>
                                                                        <path d="M106.901,151.687c-18.386,0-33.301-5.968-33.301-13.323v13.323c0,7.362,14.916,13.329,33.301,13.329      c18.396,0,33.308-5.967,33.308-13.329v-13.323C140.208,145.726,125.296,151.687,106.901,151.687z"></path>
                                                                        <path d="M106.901,169.028c-18.386,0-33.301-5.961-33.301-13.316v13.316c0,7.356,14.916,13.323,33.301,13.323      c18.396,0,33.308-5.967,33.308-13.323v-13.316C140.208,163.067,125.296,169.028,106.901,169.028z"></path>
                                                                        <path d="M106.901,90.476c-18.386,0-33.301,5.967-33.301,13.326v13.317c0,7.355,14.916,13.322,33.301,13.322      c18.396,0,33.308-5.967,33.308-13.322v-13.317C140.208,96.437,125.296,90.476,106.901,90.476z M106.901,113.788      c-18.298,0-29.964-5.913-29.964-9.993c0-4.079,11.667-9.989,29.964-9.989c18.305,0,29.971,5.91,29.971,9.989      C136.872,107.875,125.206,113.788,106.901,113.788z"></path>
                                                                        <path d="M109.44,102.268c-3.848-0.615-5.438-1.023-5.438-1.663c0-0.536,0.95-1.071,3.892-1.071c3.257,0,5.34,0.444,6.527,0.651      l1.321-2.187c-1.51-0.304-3.544-0.578-6.57-0.639v-1.696h-4.445v1.836c-4.847,0.402-7.654,1.735-7.654,3.44      c0,1.869,3.301,2.838,8.154,3.525c3.343,0.487,4.804,0.95,4.804,1.688c0,0.779-1.766,1.199-4.359,1.199      c-2.936,0-5.603-0.408-7.502-0.853l-1.352,2.259c1.692,0.433,4.651,0.779,7.69,0.834v1.834h4.427v-1.967      c5.206-0.385,8.062-1.852,8.062-3.575C116.997,104.143,114.83,103.083,109.44,102.268z"></path>
                                                                    </g>
                                                                </g>
                                                                <polygon points="153.995,165.99 172.091,165.99 172.091,60.982 185.872,60.982 163.043,21.649 140.208,60.982 153.995,60.982       "></polygon>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="summary-text">
                                                    <label>Coin earned</label>
                                                    <div class="score">1</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="question-result-layout question-status-incorrect"><meta name="csrf-token" content="0TSlo0r1yRWjsWXWM5vZXOXNgvQNz593JQEnTlAP">
                                    <div class="question-step quiz-complete" style="display:none">
                                        <div class="question-layout-block">
                                            <div class="left-content has-bg">
                                                <h2>&nbsp;</h2>
                                                <div id="rureraform-form-1" class="rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                                    <div class="question-layout">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form class="question-fields" action="javascript:;" data-question_id="11558">
                                    <meta name="csrf-token" content="0TSlo0r1yRWjsWXWM5vZXOXNgvQNz593JQEnTlAP">
                                        <span class="questions-total-holder d-block mb-15">
                                        <span class="question-dev-details">(11558) (Learn) (checkbox)</span>
                                    </span>
                                    <div id="rureraform-form-1" class="disable-div rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                        <div class="question-layout row d-flex align-items-center">
                                    <div class="rureraform-col rureraform-col-12"><div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="drop_and_text">
                                        Here are diagrams of some 3-D shapes.
                                        <div class="rureraform-element-cover"></div>
                                    </div>
                                    </div><div class="rureraform-col rureraform-col-12"><div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="question_label">
                                        <div class="question-label question_label"><span>Select each shape that has the same number of faces as vertices.</span></div>
                                    </div>
                                    </div><div class="rureraform-col rureraform-col-12"><div id="rureraform-element-19093" class="quiz-group rureraform-element-19093 rureraform-element ui-sortable-handle" data-type="checkbox">
                                        <div class="rureraform-column-label"><label class="rureraform-label"></label></div>
                                        <div class="rureraform-column-input">
                                            <div class="rureraform-input">
                                                <div class="form-box lms-checkbox-img image-left rurera-in-cols">
                                                    <div class="form-field rureraform-cr-container-medium correct">
                                                    <input class="editor-field rureraform-checkbox-medium" data-min="1" type="checkbox" name="field-19093" id="field-19093-00-8001" value="Cube"><label for="field-19093-00-8001">
                                                    <img src="/media/topic_parts/121/shape-1.png" alt="">Cube
                                                    </label>
                                                </div>
                                                <div class="form-field rureraform-cr-container-medium wrong">
                                                    <input class="editor-field rureraform-checkbox-medium" data-min="1" type="checkbox" name="field-19093" id="field-19093-11-8001" value="Square-based pyramid"><label for="field-19093-11-8001">
                                                    <img src="/media/topic_parts/121/shape-2.png" alt="">Square-based pyramid
                                                    </label>
                                                </div>
                                                <div class="form-field rureraform-cr-container-medium">
                                                    <input class="editor-field rureraform-checkbox-medium" data-min="1" type="checkbox" name="field-19093" id="field-19093-22-8001" value="Triangular prism"><label for="field-19093-22-8001">
                                                    <img src="/media/topic_parts/121/shape-3.png" alt=""> 							Triangular prism
                                                    </label>
                                                </div>                                                                                                                                         <div class="form-field rureraform-cr-container-medium">
                                                    <input class="editor-field rureraform-checkbox-medium" data-min="1" type="checkbox" name="field-19093" id="field-19093-33-8001" value="Triangular-based pyramid"><label for="field-19093-33-8001">
                                                    <img src="/media/topic_parts/121/shape-4.png" alt=""> 							Triangular-based pyramid
                                                    </label>
                                                </div>                                                                                                        </div>
                                            </div>
                                        </div>
                                        <div class="rureraform-element-cover"></div>
                                    </div>
                                    </div>
                                        <div class="validation-error"></div>
                                    </div>
                                    </div>
                                    </form>
                                    <div class="lms-radio-lists">
                                            <span class="list-title">Correct answer:</span>
                                            <ul class="lms-radio-btn-group lms-user-answer-block"><li><label class="lms-question-label" for="radio2"><span>Cube</span></label></li></ul>
                                            <span class="list-title">Rumaisa Khan answered:</span>
                                            <ul class="lms-radio-btn-group lms-user-answer-block"><li><label class="lms-question-label wrong" for="radio2"><span>Cube</span></label></li><li><label class="lms-question-label wrong" for="radio2"><span>Square-based pyramid</span></label></li></ul>
                                    </div><hr></div>
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

@endsection

@push('scripts_bottom')
    <script>
        /*Quiz Data Slide Function Start*/
        $(document).ready(function () {
            $(".quiz-data-table td label, .slide-controls .close-btn").click(function (e) {
                e.stopPropagation(); 
                $(".quiz-data-slide").toggleClass("active");
            });

            $(".quiz-data-slide").click(function (e) {
                const $element = $(this);
                const offset = $element.offset();
                const pseudoAreaWidth = 20; 
                if (
                    e.pageX < offset.left + pseudoAreaWidth || 
                    e.pageY < offset.top + pseudoAreaWidth 
                ) {
                    $element.removeClass("active");
                }
            });

            $(".quiz-data-slide").on("click", function (e) {
                e.stopPropagation();
            });
        });
        /*Quiz Data Slide Function End*/
    </script>
@endpush
