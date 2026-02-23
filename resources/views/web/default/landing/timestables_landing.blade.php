@extends(getTemplate().'.layouts.app')

@push('styles_top')

@endpush

@section('content')
{!! parseShortcode('[SC_times-table-features-section-f]') !!}
{!! parseShortcode('[SC_rurera-work-process]') !!}

{!! parseShortcode('[SC_accordion-slider-section-f]') !!}
{!! parseShortcode('[SC_testimonials-section-f]') !!}
    @php $faq_items = isset( $faq_items )? $faq_items : array();@endphp
   
    {!! parseShortcode('[SC_ISEB-parent-account-section-f]') !!}

    @php
    $packages_only = isset( $packages )? $packages : array();
    $show_details = isset( $show_details )? $show_details : true;
    @endphp
    <section class="rurera-setup-progress-section rurera-membership-section mb-0 pt-70" data-currency_sign="{{getCurrencySign()}}" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="section-title text-center mb-40">
                        <h2 class="mb-0">Choose the right plan for you</h2>
                        <p class="pt-10">Save more with annual pricing</p>
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
    <div class="modal fade rurera-choose-membership" id="subscriptionModal">
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
</section>
{!! parseShortcode('[SC_times-table-faqs-section-f]') !!}
{!! parseShortcode('[SC_Rurera-Help-Section]') !!}

@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/swiper-slider/swiper-bundle.min.js"></script>
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
@endpush