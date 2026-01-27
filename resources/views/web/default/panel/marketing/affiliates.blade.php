@extends(getTemplate() .'.panel.layouts.panel_layout')

@push('styles_top')

@endpush

@section('content')
    <section>
        <div class="section-title mb-15">
            <h2 itemprop="name" class="font-22 mb-0">Referral program</h2>
        </div>
        <div class="referral-holder panel-border bg-white rounded-sm px-25 pt-25">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="referral-text mb-30">
                        <h3 class="font-16 font-weight-bold text-dark-charcoal mb-5" itemprop="name">How to use Referral Program</h3>
                        <p class="text-gray mb-15 font-14">Share your referral link with friends Or family. When someone signs up or makes a purchase using your link, you automatically earn rewards and commissions.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="referral-text mb-30">
                        <h3 class="font-16 font-weight-bold text-dark-charcoal mb-5" itemprop="name">Your Referral Link</h3>
                        <p class="text-gray mb-15 font-14">Use this link to invite new users to Rurera. Each successful registration or purchase made through your referral link will be tracked and added to your account.</p>
                        <div class="referral-link">
                            <input type="text" class="link-address font-14 font-weight-500" name="affiliate_url" value="{{ $affiliateCode->getAffiliateUrl() }}">
                            <a href="javascript:;" class="link-btn font-14 font-weight-500 js-copy" data-input="affiliate_url">Copy Link</a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="referral-price-lists mb-30 font-14">
                        <div class="row">
                            <div class="col-12 col-lg-4 col-md-4">
                                <div class="referral-price-card text-center referred">
                                    <span class="d-block mb-5" style="color: #624abc;">{{ trans('panel.referred_users') }}</span>
                                    <strong class="font-weight-bold">{{ $referredUsersCount }}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 col-md-4">
                                <div class="referral-price-card text-center bonus">
                                    <span class="d-block mb-5" style="color: #5fa66e;">Bonus</span>
                                    <strong class="font-weight-bold">{{ addCurrencyToPrice(round($registrationBonus, 2)) }}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 col-md-4">
                                <div class="referral-price-card text-center sales-commission">
                                    <span class="d-block mb-5" style="color: #d13b61;">{{ trans('panel.affiliate_bonus') }}</span>
                                    <strong class="font-weight-bold">{{ addCurrencyToPrice(round($affiliateBonus, 2)) }}</strong>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="referral-text">
                        @if(!empty($referralSettings))
                            <div class="text-gray font-14">
                                @if(!empty($referralSettings['affiliate_user_amount']))<p>- {{ trans('panel.user_registration_reward') }}: {{ addCurrencyToPrice($referralSettings['affiliate_user_amount']) }}</p>@endif
                                @if(!empty($referralSettings['referred_user_amount']))<p>- {{ trans('panel.referred_user_registration_reward') }}: {{ addCurrencyToPrice($referralSettings['referred_user_amount']) }}</p>@endif
                                @if(!empty($referralSettings['affiliate_user_commission']))<p>- {{ trans('panel.referred_user_purchase_commission') }}: {{ $referralSettings['affiliate_user_commission'] }}%</p>@endif
                                <p>- {{ trans('panel.your_affiliate_code') }}: {{ $affiliateCode->code }}</p>
                                @if(!empty($referralSettings['referral_description']))<p>- {{ $referralSettings['referral_description'] }}</p>@endif
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                <div class="referral-withdraw mb-30">
                    <div class="withdraw-card p-20 d-flex align-items-center flex-wrap">
                        <div class="icon-box mr-10">
                            <img src="/assets/default/img/withdraw-icon.png" alt="" height="30" width="30">
                        </div>
                        <div class="withdraw-text">
                            <h3 class="font-16 font-weight-bold text-dark-charcoal mb-5" itemprop="name">Withdraw Your Money to a Bank Account</h3>
                            <p class="font-14">Withdraw money securily to your bank account. Commision is $25 per transaction under $50,000</p>
                        </div>
                        <div class="withdraw-btn-holder">
                            <a href="#" class="withdraw-btn font-14">Withdraw Money</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-25">
        <h2 class="section-title font-16 font-weight-bold">{{ trans('panel.earnings') }}</h2>
        <div class="panel-section-card rounded-sm mt-15">
            <div class="row">
                <div class="col-12 ">
                    <div class="table-responsive transactions-table">
                        <table class="table text-center custom-table">
                            <thead class="font-14 font-weight-500">
                            <tr>
                                <th>{{ trans('panel.user') }}</th>
                                <th>{{ trans('panel.registration_bonus') }}</th>
                                <th>{{ trans('panel.affiliate_bonus') }}</th>
                                <th>{{ trans('panel.registration_date') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($affiliates->count() > 0)
                            @foreach($affiliates as $affiliate)
                                <tr>
                                    <td class="text-left font-14">
                                        <div class="user-inline-avatar d-flex align-items-center">
                                            <div class="avatar bg-gray200">
                                                <img src="{{ $affiliate->referredUser->getAvatar() }}" class="img-cover" alt="{{ $affiliate->referredUser->get_full_name() }}">
                                            </div>
                                            <div class=" ml-5">
                                                <span class="d-block font-weight-500">{{ $affiliate->referredUser->get_full_name() }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="font-14">{{ addCurrencyToPrice($affiliate->getAffiliateRegistrationAmountsOfEachReferral()) }}</td>
                                    <td class="font-14">{{ addCurrencyToPrice($affiliate->getTotalAffiliateCommissionOfEachReferral()) }}</td>
                                    <td class="font-14">{{ dateTimeFormat($affiliate->created_at, 'Y M j | H:i') }}</td>
                                </tr>
                            @endforeach
                            @else
                            <tr class="no-record-found font-14">
                                <td class="text-center no-records-found" colspan="4">No Records Found</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="my-30">
                        {{ $affiliates->appends(request()->input())->links('vendor.pagination.panel') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
