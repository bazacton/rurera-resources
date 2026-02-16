<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@php
    $rtlLanguages = !empty($generalSettings['rtl_languages']) ? $generalSettings['rtl_languages'] : [];

    $isRtl = ((in_array(mb_strtoupper(app()->getLocale()), $rtlLanguages)) or (!empty($generalSettings['rtl_layout']) and $generalSettings['rtl_layout'] == 1));
        $rand_no = rand(99,9999);
    $profile_navs = isset( $navData['profile_navs'] )? $navData['profile_navs'] : array();
@endphp
<head>
    <title>{{ $pageTitle ?? '' }}{{ !empty($generalSettings['site_name']) ? (' | '.$generalSettings['site_name']) : '' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <!-- Browser favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/default/img/fav-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/default/img/fav-icon.png">

    <!-- Apple devices -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/default/img/fav-icon.png">
    <!-- General CSS File -->
    <link rel="stylesheet" href="/assets/default/css/panel-pages/dashboard.css?ver={{$rand_no}}">
	<link rel="stylesheet" href="/assets/default/css/common.css?ver={{$rand_no}}">

	@if(auth()->check() && auth()->user()->isParent())
		<link rel="stylesheet" href="/assets/default/css/panel-pages/parent.css?ver={{$rand_no}}">
	@endif
	
	@if (isset( $cssFiles ) && !empty($cssFiles))
        @foreach ($cssFiles as $cssFile)
            <link rel="stylesheet" href="{{ asset($cssFile) }}">
        @endforeach
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles_top')
    <link rel="stylesheet" href="/assets/default/css/responsive.css?ver={{$rand_no}}">
    @stack('scripts_top')
    <!-- Preload Main Font (CeraRoundPro) -->
    <link rel="preload" href="/store/1/fonts/CeraRoundPro-Regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/store/1/fonts/CeraRoundPro-Medium.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/store/1/fonts/CeraRoundPro-Bold.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Preload RTL Font (Vazir) -->
    <link rel="preload" href="/store/1/fonts/Vazir-Regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/store/1/fonts/Vazir-Medium.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/store/1/fonts/Vazir-Bold.woff2" as="font" type="font/woff2" crossorigin>

</head>
@php $bodyClass = ''; @endphp
@if(auth()->check() && auth()->user()->isParent())
    @php $bodyClass = 'parent-panel'; @endphp
@endif
@if(auth()->check() && auth()->user()->isTutor())
    @php $bodyClass = 'tutor-panel'; @endphp
@endif
<body class="menu-closed @if($isRtl) rtl @endif {{$bodyClass}}">

    @php
        $isPanel = true;
    @endphp

    <div id="panel_app">
        <div class="panel-page-section">
            @if(auth()->check() && (auth()->user()->isUser()))
                @include(getTemplate(). '.includes.navbar')
            @endif
            @if(auth()->check() && (auth()->user()->isUser() || auth()->user()->isParent() || auth()->user()->isTutor()))
                @include(getTemplate(). '.panel.includes.sidebar')
            @endif
            <div class="panel-content">
                <div class="container">
                    <div class="row">
                        <!-- Panel Content Start -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 panel-content-holder">
                            @yield('content')
                        </div>
                        <!-- Panel Content End -->
                        <!-- Panel Right Sidebar Start -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 pl-15 panel-right-sidebar">
                                
                            <div class="sidebar-inner-elements">

  <!-- Overall performance (semi gauge) -->
  <div class="panel-border bg-white rounded-sm p-20 mb-30 w-100">
    <div>
      <h3 class="font-16 font-weight-bold mb-0">Overall performance</h3>
      <div class="font-12 text-muted mt-1">Course completion rate</div>
    </div>

    <div class="d-flex align-items-center justify-content-center mt-15">
      <!-- Change --p to your percentage (0–100) -->
      <div class="overall-gauge" style="--p:80;">
        <svg viewBox="0 0 200 120" class="w-100 d-block" style="max-width:260px;">
          <path d="M20 100 A80 80 0 0 1 180 100" fill="none" stroke="#e9ecef" stroke-width="18" stroke-linecap="round"></path>

          <path d="M20 100 A80 80 0 0 1 180 100" fill="none" stroke="#2fbf71" stroke-width="18" stroke-linecap="round" style="stroke-dasharray:252;stroke-dashoffset:calc(252 - (252 * var(--p) / 100));"></path>
        </svg>

        <div class="overall-gauge-center text-center">
          <div class="font-24 font-weight-bold mb-0">80%</div>
          <div class="font-12 text-muted text-uppercase" style="letter-spacing:.06em;">Pro learner</div>
        </div>
      </div>
    </div>
  </div>

  <!-- UX Overview (gradient card like screenshot) -->
  <div class="panel-border rounded-sm p-20 mb-30 w-100" style="background: linear-gradient(135deg, #f7e7d6 0%, #f4c2a1 55%, #ef8b5e 100%);">
    <h3 class="font-20 font-weight-bold mb-10">UX Overview</h3>
    <p class="font-13 mb-20" style="opacity:.85;">
      We put the power in your hands with easy-to-use APIs that you can use to mesmerize.
    </p>

    <div class="panel-border bg-white rounded-sm p-15 mb-15">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <div class="font-14 font-weight-bold mb-5">Transfer Flow</div>
          <span class="badge badge-success font-12" style="border-radius:999px; padding:.35rem .6rem;">Good</span>
        </div>
        <div class="font-28 font-weight-bold">87%</div>
      </div>
    </div>

    <div class="panel-border bg-white rounded-sm p-15">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <div class="font-14 font-weight-bold mb-5">Transfer Flow</div>
          <span class="badge badge-warning font-12" style="border-radius:999px; padding:.35rem .6rem;">Attention</span>
        </div>
        <div class="font-28 font-weight-bold">48%</div>
      </div>

      <hr class="my-15">

      <div class="d-flex align-items-start">
        <div class="mr-10" style="line-height:1;">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z" stroke="rgba(0,0,0,.35)" stroke-width="2"></path>
            <path d="M12 10v7" stroke="rgba(0,0,0,.35)" stroke-width="2" stroke-linecap="round"></path>
            <path d="M12 7h.01" stroke="rgba(0,0,0,.35)" stroke-width="3" stroke-linecap="round"></path>
          </svg>
        </div>
        <div class="font-12" style="opacity:.8;">
          QR code requesting fund is valid for only 1 minute
        </div>
      </div>
    </div>
  </div>

  <!-- Learned skills (table) -->
  <div class="panel-border bg-white rounded-sm p-20 mb-30 w-100">
    <div class="d-flex align-items-center justify-content-between flex-wrap mb-15">
      <h3 class="font-16 font-weight-bold mb-0">You have learned the following skills</h3>
    </div>

    <div class="table-responsive">
      <table class="table table-sm mb-0 learned-skills-table">
        <thead>
          <tr>
            <th class="font-12 text-muted font-weight-bold">Subject</th>
            <th class="font-12 text-muted font-weight-bold">Skill</th>
            <th class="font-12 text-muted font-weight-bold text-right">Last practised</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="font-13">Maths</td>
            <td class="font-13">
              <a href="#" class="text-decoration-none">Prime or composite</a>
            </td>
            <td class="font-13 text-right text-muted">11 February</td>
          </tr>
          <tr>
            <td class="font-13">Maths</td>
            <td class="font-13"><a href="#" class="text-decoration-none">Identify factors</a></td>
            <td class="font-13 text-right text-muted">11 February</td>
          </tr>
          <tr>
            <td class="font-13">Maths</td>
            <td class="font-13"><a href="#" class="text-decoration-none">Multiplicative inverses</a></td>
            <td class="font-13 text-right text-muted">7 February</td>
          </tr>
          <tr>
            <td class="font-13">Maths</td>
            <td class="font-13"><a href="#" class="text-decoration-none">Use Venn diagrams to solve problems</a></td>
            <td class="font-13 text-right text-muted">16 January</td>
          </tr>
          <tr>
            <td class="font-13">Maths</td>
            <td class="font-13"><a href="#" class="text-decoration-none">Area of parallelograms</a></td>
            <td class="font-13 text-right text-muted">21 November</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="d-flex align-items-center justify-content-between mt-15">
      <a href="#" class="font-13 font-weight-bold">See all 33 skills</a>
      <div class="font-12 text-muted">
        <span class="mr-10">23 Mastered</span>
        <span>33 Proficient</span>
      </div>
    </div>
  </div>

  <!-- Areas to focus on (table) -->
  <div class="panel-border bg-white rounded-sm p-20 mb-30 w-100">
    <h3 class="font-16 font-weight-bold mb-10">Your areas to focus on</h3>
    <div class="d-flex align-items-start mb-15">
      <div class="mr-10" style="line-height:1;">
        <!-- lightbulb -->
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
          <path d="M9 21h6" stroke="rgba(0,0,0,.45)" stroke-width="2" stroke-linecap="round"></path>
          <path d="M10 17h4" stroke="rgba(0,0,0,.45)" stroke-width="2" stroke-linecap="round"></path>
          <path d="M12 2a7 7 0 0 0-4 12c.7.6 1 1.2 1 2h6c0-.8.3-1.4 1-2A7 7 0 0 0 12 2Z" stroke="rgba(0,0,0,.45)" stroke-width="2" stroke-linejoin="round"></path>
        </svg>
      </div>
      <div class="font-13 text-muted">You could use extra support on these skills:</div>
    </div>

    <div class="table-responsive">
      <table class="table table-sm mb-0 focus-table">
        <thead>
          <tr>
            <th class="font-12 text-muted font-weight-bold">Subject</th>
            <th class="font-12 text-muted font-weight-bold">Skill</th>
            <th class="font-12 text-muted font-weight-bold text-right">Questions missed</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="font-13">Maths</td>
            <td class="font-13"><a href="#" class="text-decoration-none">Write variable expressions: word problems</a></td>
            <td class="font-13 text-right font-weight-bold">4</td>
          </tr>
          <tr>
            <td class="font-13">Maths</td>
            <td class="font-13"><a href="#" class="text-decoration-none">Lines, line segments and rays</a></td>
            <td class="font-13 text-right font-weight-bold">4</td>
          </tr>
          <tr>
            <td class="font-13">Maths</td>
            <td class="font-13"><a href="#" class="text-decoration-none">Write variable expressions</a></td>
            <td class="font-13 text-right font-weight-bold">3</td>
          </tr>
          <tr>
            <td class="font-13">Maths</td>
            <td class="font-13"><a href="#" class="text-decoration-none">Understanding area of a parallelogram</a></td>
            <td class="font-13 text-right font-weight-bold">3</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="mt-15">
      <a href="#" class="font-13 font-weight-bold">See all 9 skills</a>
    </div>
  </div>

</div>
                                    
                        <!-- Panel Right Sidebar Start -->
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-footer"></div>
        <div class="scroll-btn">
            <div class="round">
                <div id="cta">
                    <span class="arrow primera next"></span>
                    <span class="arrow segunda next"></span>
                </div>
            </div>
        </div>
        @include('web.default.includes.advertise_modal.index')
    </div>

<div class="modal fade rurera-confirm-delete" id="rurera-confirm-delete" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-toggle="modal" data-target="#rurera-confirm-delete"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <div class="modal-box">
                    <div class="icon-box d-block mb-15 d-flex align-items-center">
                        <img src="/assets/default/img/clock-modal-img.png" alt="clock-modal-img">
                        <span class="ml-10 font-weight-bold font-22">Delete Set Work</span>
                    </div>
                    <span class="font-16 mb-10 conform-lable">Are you sure you want to delete this set work? This action is permanent and cannot be undone.</span>
                    <p class="mb-25 font-16">
                        <strong>Times-table-test-2025</strong>
                        Assigned to: <span>M. Rayan Malik</span>
                    </p>
                    <div class="inactivity-controls">
                        <a href="javascript:;" class="continue-btn" data-dismiss="modal" aria-label="Continue">Cancel</a>
                        <a href="javascript:;" class="rurera-delete-btn">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Template JS File -->
<script src="/assets/default/js/app.js"></script>

<script>
    var deleteAlertTitle = '{{ trans('public.are_you_sure') }}';
    var deleteAlertHint = '{{ trans('public.deleteAlertHint') }}';
    var deleteAlertConfirm = '{{ trans('public.deleteAlertConfirm') }}';
    var deleteAlertCancel = '{{ trans('public.cancel') }}';
    var deleteAlertSuccess = '{{ trans('public.success') }}';
    var deleteAlertFail = '{{ trans('public.fail') }}';
    var deleteAlertFailHint = '{{ trans('public.deleteAlertFailHint') }}';
    var deleteAlertSuccessHint = '{{ trans('public.deleteAlertSuccessHint') }}';
    var forbiddenRequestToastTitleLang = '{{ trans('public.forbidden_request_toast_lang') }}';
    var forbiddenRequestToastMsgLang = '{{ trans('public.forbidden_request_toast_msg_lang') }}';
</script>

@if(session()->has('toast'))
    <script>
        (function () {
            "use strict";

            $.toast({
                heading: '{{ session()->get('toast')['title'] ?? '' }}',
                text: '{{ session()->get('toast')['msg'] ?? '' }}',
                bgColor: '@if(session()->get('toast')['status'] == 'success') #43d477 @else #f63c3c @endif',
                textColor: 'white',
                hideAfter: 10000,
                position: 'bottom-right',
                icon: '{{ session()->get('toast')['status'] }}'
            });
        })(jQuery)
    </script>
@endif

@stack('styles_bottom')
@stack('scripts_bottom')
<script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
<script src="/assets/default/js/question-layout.js"></script>
<script src="/assets/default/js//parts/main.min.js?ver={{$rand_no}}"></script>
<script src="/assets/default/js/panel/public.min.js"></script>
<script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
<script src="/assets/default/vendors/chartjs/chart.min.js"></script>
<script>

    @if(session()->has('registration_package_limited'))
    (function () {
        "use strict";

        handleLimitedAccountModal('{!! session()->get('registration_package_limited') !!}')
    })(jQuery)

    {{ session()->forget('registration_package_limited') }}
    @endif

    {!! !empty(getCustomCssAndJs('js')) ? getCustomCssAndJs('js') : '' !!}

    var options = {
        type: 'bar',
        data: {
            labels: ["Jul 2017", "Jan 2018", "Jul 2018", "Jan 2019", "Jul 2019"],
            datasets: [
                {
                    label: '# of Votes',
                    data: [10, 12, 5, 15, 20],
                    borderWidth: 0,
                    backgroundColor: '#417290',
                    borderColor: '#417290',
                },
                {
                    label: '# of Points',
                    data: [20, 10, 5, 10, 10],
                    borderWidth: 0,
                    backgroundColor: '#417290',
                    borderColor: '#417290',
                },
                {
                    label: '# of Points',
                    data: [10, 5, 15, 20, 10],
                    borderWidth: 0,
                    backgroundColor: '#417290',
                    borderColor: '#417290'
                },
                {
                    label: '# of Points',
                    data: [5, 2, 2, 15, 5],
                    borderWidth: 0,
                    backgroundColor: '#417290',
                    borderColor: '#417290'
                },
                {
                    label: '# of Points',
                    data: [10, 2, 2, 10, 20],
                    borderWidth: 0,
                    backgroundColor: '#417290',
                    borderColor: '#417290'
                },
                {
                    label: '# of Points',
                    data: [20, 5, 10, 15, 20],
                    borderWidth: 0,
                    backgroundColor: '#417290',
                    borderColor: '#417290'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            categoryPercentage: 1,
            scales: {
                x: {
                grid: {
                    display: false
                },
                border: {
                    display: false
                }
                },
                y: {
                grid: {
                    display: false
                },
                border: {
                    display: false
                }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    }
    //var ctx = document.getElementById('chartBarHorizontal2').getContext('2d');
    //new Chart(ctx, options);
</script>
<script>
    /*var ctxPie = document.getElementById('pieChart');
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Organic Se...', 'Direct', 'Social', 'Referral'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5],
                backgroundColor: [
                    '#417290',
                    '#b0c6d3',
                    '#e6e6e6',
                    '#b6ecf7'
                ],
                borderColor: [
                    '#417290',
                    '#b0c6d3',
                    '#e6e6e6',
                    '#b6ecf7'
                ],
                borderWidth: 1
            }]
        },
        options: {}
    });*/
</script>

<script>
    jQuery(document).ready(function(){

        var $test = $('.sidebar-students-list .card');
        if ($test.find('div').length > 2) {
            $('.sidebar-students-list .card').append('<div class="item-control"><a href="javascript:;" class="showMore"></a></div>');
        }

        $('.students-list-item').slice(0,5).addClass('shown');
        $('.students-list-item').not('.shown').hide();
        $('.card .showMore').on('click',function(){
            $('.students-list-item').not('.shown').slideToggle(300);
            $(this).toggleClass('showLess');
        });

    });
</script>
<script>
function makeStatisticsChart(canvasId, chartVar, label, labels, data) {
    const ctx = document.getElementById(canvasId).getContext('2d');

    chartVar = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: label,
                data: data,
                borderColor: '#4e73df',
                backgroundColor: 'rgba(78, 115, 223, 0.1)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
}
</script>

</body>
</html>
