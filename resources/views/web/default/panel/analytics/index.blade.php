@extends('web.default.panel.layouts.panel_layout_full')
@push('styles_top')
<script src="/assets/default/vendors/charts/chart.js"></script>
<link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<style>
    .hide {
        display: none !important;
    }
</style>
@endpush

@section('content')
<section class="member-card-header activities-header pb-0 mb-0 rurera-hide1">
    <div class="d-flex align-items-start align-items-md-center justify-content-between flex-md-row">
        
        <div class="dropdown db-members">
            @if(auth()->check() && (auth()->user()->isParent()))
            <div class="ms-auto last-activity profile-dropdown">
                <a href="#" class="font-14 font-weight-normal">
                    <img src="/assets/default/svgs/students.svg" alt="students">
                    {{$selected_child}}
                </a>
                <ul>
                    @if( !empty( $childs ) )
                    @foreach($childs as $childLinkObj)
                    @php $childObj = $childLinkObj->user; @endphp
                        <li><a href="/analytics/?child={{ $childObj->id }}" class="switch-user-btn"><span class="icon-box"><img src="{{$childObj->getAvatar()}}" alt="#" height="400" width="400"></span> {{ $childObj->get_full_name() }}</a></li>
                    @endforeach
                    @endif
                </ul>
            </div>
            @endif
        </div>
    </div>
</section>
<section>
    <div class="section-title mb-15">
        <h2 class="font-22 mb-0">Analytics</h2>
    </div>
    <div class="chart-card mb-30 rurera-hide">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title mb-0">Topic you are interested in</h5>
            <div style="color: #999; cursor: pointer;">&#8942;</div>
        </div>

        <div class="row">
            <!-- Chart Section -->
            <div class="col-sm-8">
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <!-- Legend Section (Right Side) -->
            <div class="col-sm-4">
                <div id="customLegend">
                    <!-- Populated by JS or static HTML -->
                </div>
            </div>
        </div>
    </div>
    <div class="activities-container p-20 p-lg-25 rounded-sm">
        <div class="chart-filters p-0">
            <div class="filters-list mb-0 font-14">
                <a href="#" class="filter-mobile-btn">Filters</a>
                @php $module_types = module_types(); @endphp
                <ul class="analytics-type">
                    @php $link_append = (isset($_GET['child']) && $_GET['child'] > 0) ? '?child='.$_GET['child'] : ''; @endphp


                    @if(!empty($module_types))
                        @foreach($module_types as $module_slug => $module_data)
                            @php
                                $module_label = isset($module_data['label'])? $module_data['label'] : '';
                                $background_color = isset($module_data['background_color'])? $module_data['background_color'] : '';
                                $font_color = isset($module_data['font_color'])? $module_data['font_color'] : '';
                                $icon = isset($module_data['icon'])? $module_data['icon'] : '';
                                $style = '';
                                if($background_color != ''){
                                    $style .= ' background:'.$background_color.';';
                                }
                                if($font_color != ''){
                                    $style .= ' color:'.$font_color.';';
                                }

                            @endphp

                            <li style="{{$style}}" {{($type_selected == $module_slug)? 'class=active' : ''}}><a href="/analytics/{{$module_slug}}{{$link_append}}" data-graph_type="{{$module_slug}}"><img src="{{$icon}}" height="800" width="800" alt="{{$module_slug}}"> {{$module_label}}</a></li>
                        @endforeach
                    @endif
                    <li {{($type_selected == 'set_work')? 'class=active' : ''}}><a href="/analytics/set_work{{$link_append}}" data-graph_type="set_work"><img src="/assets/default/img/sidebar/set-work.svg" height="800" width="800" alt="set work"> Set Work</a></li>

                </ul>
            </div>
            <ul class="analytics-data-ul">
                <li><a href="javascript:;" class="hide graph_Custom" data-graph_id="graph_id_Custom">September 20, 2023 - September 26, 2023</a>
                </li>
            </ul>
        </div>
        <div class="analytics-dropdown font-14">
            <div class="select-holder rurera-hide">
                <h5 class="font-14 font-weight-500">Subject</h5>
                <div class="select-box">
                    <select class="font-14">
                        <option value="All subjects">All subjects</option>
                        <option value="Math">Math</option>
                        <option value="Science">Science</option>
                    </select>
                </div>
            </div>
            <div class="date-range-holder">
                <h5 class="font-14 font-weight-500">Date Range</h5>
                <div class="date-range-box">
                    <input type="text" id="reportrange1" class="font-14">
                </div>
            </div>
        </div>
        @if($type == 'set_work')
         @include('web.default.panel.analytics.setwork_analytics',['analytics_data' => $analytics_data])
        @else
            @include('web.default.panel.analytics.learn_analytics',['analytics_data' => $analytics_data])
        @endif




    </div>
</section>
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('body').on('change', '.child-analytics', function (e) {
            console.log('test');
            $(".child-analytics-form").submit();
        });

        $('body').on('click', '.graph-data-ul li a', function (e) {
            var thisObj = $('.chart-summary-fields');
            var graph_type = $(this).attr('data-graph_type');
            if (!FieldIsEmpty(graph_type)) {
                rurera_loader(thisObj, 'div');
                jQuery.ajax({
                    type: "GET",
                    url: '/panel/analytics/graph_data',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {"graph_type": graph_type, "show_types": true},
                    success: function (return_data) {
                        rurera_remove_loader(thisObj, 'div');
                        if (return_data != '') {
                            $(".analytics-graph-data").html(return_data);
                        }
                    }
                });
            } else {
                $('.graph-data-ul li a').removeClass('active');
                $(this).addClass('active');
                var graph_id = $(this).attr('data-graph_id');
                $('.graph_div').addClass('hide');
                $('.' + graph_id).removeClass('hide');
            }
        });

    });

</script>
<script>
$(function () {
  var dateRanges = new Array();

  dateRanges["Today"] = [moment(), moment()];
  dateRanges["Yesterday"] = [
    moment().subtract(1, "days"),
    moment().subtract(1, "days")
  ];
  dateRanges["Last 7 Days"] = [moment().subtract(6, "days"), moment()];
  dateRanges["Last 30 Days"] = [moment().subtract(31, "days"), moment()];
  dateRanges["This Month"] = [
    moment().startOf("month"),
    moment().endOf("month")
  ];
  dateRanges["Last Month"] = [
    moment().subtract(1, "month").startOf("month"),
    moment().subtract(1, "month").endOf("month")
  ];

  $("#reportrange1").daterangepicker(
    {
      startDate: moment().subtract(31, "days"),
      endDate: moment(),
      parentEl: '.analytics-dropdown',
      opens: 'left',
      ranges: dateRanges,
      autoApply: false,
      drops: "auto",
      isInvalidDate: function (date) {
        // Sunday Disabled
        return date.day() == 0;
      }
    }
  );

  // Prevent closing when clicking outside
  $(document).on("mousedown", function (e) {
    var container = $(".daterangepicker");
    var input = $("#reportrange1");
    if (
      !container.is(e.target) &&
      container.has(e.target).length === 0 &&
      !input.is(e.target) &&
      input.has(e.target).length === 0
    ) {
      e.stopPropagation();
    }
  });
});

function reset() {
  var reset_start = moment().startOf("month");
  var reset_end = moment().endOf("month");

  $("#reportrange1").data("daterangepicker").setStartDate(reset_start);
  $("#reportrange1").data("daterangepicker").setEndDate(reset_end);

  $(".daterangepicker.show-calendar").removeClass("show-calendar");

  $("#reportrange1").val(
    moment(reset_start).format("MM/DD/YYYY") +
      " - " +
      moment(reset_end).format("MM/DD/YYYY")
  );
}

</script>
<script>
    // Data Configuration
    const labels = ['UI Design', 'UX Design', 'Music', 'Animation', 'React', 'SEO'];
    const dataValues = [35, 20, 14, 12, 10, 9];
    // Colors from the image (approximate)
    const colors = [
        '#6f42c1', // UI Design - Purple
        '#00c4cc', // UX Design - Cyan
        '#28a745', // Music - Green
        '#6c757d', // Animation - Grey
        '#ff4d4f', // React - Red
        '#fd7e14'  // SEO - Orange
    ];

    // 1. Setup Chart
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: dataValues,
                backgroundColor: colors,
                borderRadius: 5, // Rounded corners for bars
                barPercentage: 0.6,
                categoryPercentage: 0.8
            }]
        },
        options: {
            indexAxis: 'y', // Makes it horizontal
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Hide default legend
                },
                tooltip: {
                    enabled: false // Disable tooltip as we show labels
                },
                datalabels: {
                    color: 'white',
                    anchor: 'center',
                    align: 'center',
                    font: {
                        weight: 'bold',
                        size: 11
                    },
                    formatter: function(value, context) {
                        return context.chart.data.labels[context.dataIndex];
                    }
                }
            },
            scales: {
                x: {
                    display: true,
                    grid: {
                        color: '#f0f0f0',
                        borderDash: [5, 5],
                        drawBorder: false
                    },
                    ticks: {
                        stepSize: 10,
                        callback: function(value) { return value + '%' }
                    },
                    max: 50 // Add some space for visuals
                },
                y: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        display: true, // Show numbers 1, 2, 3 etc? 
                        // The image shows numbers 1-6 on the left axis.
                        // Let's create a callback to show ranking numbers instead of labels
                        callback: function(value, index, ticks) {
                            // Since it's reversed in visual usually (top is #1), let's just return the index + 1 reversed
                            // Actually, in the image, UI Design is top (biggest) and has label 6? Or is it rank?
                            // The image has 6 at top, 1 at bottom. So it's the Y-axis value matching the count?
                            // No, the Y-axis labels in the image are just indices.
                            return (labels.length - index);
                        },
                        font: {
                            size: 12,
                            color: '#999'
                        }
                    }
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 20
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    // 2. Generate Custom Legend (Right Side)
    const legendContainer = document.getElementById('customLegend');
    let legendHTML = '<div class="row">';
    
    labels.forEach((label, index) => {
        legendHTML += `
            <div class="col-6">
                <div class="legend-item">
                    <div class="legend-dot" style="background-color: ${colors[index]}"></div>
                    <div class="legend-text">
                        <span class="legend-label">${label}</span>
                        <span class="legend-value">${dataValues[index]}%</span>
                    </div>
                </div>
            </div>
        `;
    });
    legendHTML += '</div>';
    legendContainer.innerHTML = legendHTML;

</script>

@endpush
