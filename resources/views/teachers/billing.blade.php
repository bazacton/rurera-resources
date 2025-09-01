@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/css/quiz-create.css">
    <style>
        .status-paid, .status-pending {
            background-color: #e6f7ec;
            color: #34a853;
            font-weight: 500;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.875rem;
        }
        .status-pending {
            background-color: #f8e6e6;
            color: #555;
        }
        .icon-eye {
            cursor: pointer;
        }
        .icon-eye::before {
            content: '\1F441'; /* Unicode for an eye icon */
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .payment-logo {
            width: 50px;
            margin-right: 8px;
        }
    </style>

@endpush

@section('content')
    <section class="section">
        <div class="section-body container">
            <div class="row">
                <div class="col-12">

                    <div class="section-header rurera-hide">
                        <div class="heading-holder">
                            <h1>Billing</h1>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb-item active">
                                    <a href="{{ getAdminPanelUrl() }}">{{ trans('admin/main.dashboard')}}</a>
                                </div>
                                <div class="breadcrumb-item">Billing</div>
                            </div>
                        </div>
                    </div>

                    <div class="content-holder card p-25">
                        <ul data-target_class="admin-rurera-tabs-billing" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills mb-20 rurera-hide" id="assignment_tabs" role="tablist" style="display: none;">
                            <li class="nav-item skelton-height-lg">
                                <a class="nav-link active" id="membership-tab" href="javascript:;">
                                    <span class="tab-title">Membership Details</span>
                                </a>
                            </li>
                            <li class="nav-item skelton-height-lg">
                                <a class="nav-link" id="transactions-tab" href="javascript:;">
                                    <span class="tab-title">Transactions</span>
                                </a>
                            </li>
                        </ul>
                        <div class="admin-rurera-tabs-billing membership-tab rurera-billing">
                            <div class="section-heading">
                                <h2>Billing & Payments</h2>
                                <p>Manage Your Billing and Payments from here. You can also manage your payment methods from here.</p>
                            </div>
                            <div class="premium-plan mb-20">
                                <div class="premium-text">
                                    <strong>Premium Plan</strong>
                                    <div class="premium-days">
                                        <div class="circle_percent" data-percent="50">
                                            <div class="circle_inner">
                                                <div class="round_per" style="transform: rotate(360deg);"></div>
                                            </div>
                                            <div class="circle_inbox"></div>
                                        </div>
                                        <span>136 / 300 Days left</span>
                                    </div>
                                </div>
                                <button type="button" class="ppgrade-btn">Upgrade</button>
                            </div>

                            <div class="billing-payment-method mb-20">
                                <div class="element-heading mb-20">
                                    <div class="heading-holder">
                                        <h3>Payment Methods</h3>
                                        <span>Manage your payment methods from here.</span>
                                    </div>
                                    <button type="button" class="method-btn" data-toggle="modal" data-target="#newMethod">
                                        <img src="/assets/default/svgs/plus-alt.svg" alt="plus-alt"> New Method
                                    </button>
                                </div>
                                <div class="payment-card-holder">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="payment-card">
                                                <div class="payment-logo">
                                                    <img src="/assets/default/svgs/visa.svg" alt="visa">
                                                    <span class="badge-base">Primary</span>
                                                </div>
                                                <div class="card-detail">
                                                    <p>Travis Fuller</p>
                                                    <span>•••• 6988</span>
                                                </div>
                                                <div class="card-expiry">
                                                    <span>Expired 02.06.2024</span>
                                                    <button type="button" class="setting-btn"><img src="/assets/default/svgs/settings.svg" alt="settings"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="payment-card">
                                                <div class="payment-logo">
                                                    <img src="/assets/default/svgs/mastercard.svg" alt="mastercard">
                                                </div>
                                                <div class="card-detail">
                                                    <p>Samantha Shelton</p>
                                                    <span>•••• 6988</span>
                                                </div>
                                                <div class="card-expiry">
                                                    <span>Expired 02.06.2025</span>
                                                    <button type="button" class="setting-btn"><img src="/assets/default/svgs/settings.svg" alt="settings"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="payment-card">
                                                <div class="payment-logo">
                                                    <img src="/assets/default/svgs/paypal.svg" alt="paypal">
                                                </div>
                                                <div class="card-detail">
                                                    <p>John Doe</p>
                                                    <span>John@gmail.com</span>
                                                </div>
                                                <div class="card-expiry">
                                                    <span>Expired 02.06.2025</span>
                                                    <button type="button" class="setting-btn"><img src="/assets/default/svgs/settings.svg" alt="settings"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-invoice">
                                <div class="heading-holder mb-20">
                                    <h3>Invoices</h3>
                                    <span>List of invoices. You can view and download them from here.</span>
                                </div>
                                <div class="rurera-search-filters mb-15" id="accordion">
                                    <form autocomplete="off">
                                        <div class="filter-box-holder">
                                            <div class="filter-left">
                                                <div class="search-field">
                                                    <span class="icon-box">
                                                        <img src="/assets/default/svgs/search.svg" alt="search">
                                                    </span>
                                                    <input type="text" class="search-students" placeholder="Search Students" autocomplete="off">
                                                </div>
                                                <div class="filter-action-holder">
                                                    <button type="button" class="filter-btn" data-toggle="collapse" data-target="#filter-toggle-box" aria-expanded="true" aria-controls="collapse-1">
                                                        <img src="/assets/default/svgs/filter-alt.svg" alt="filter-alt">Filter
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="filter-right">
                                                <div class="dropdown">
                                                    <button class="dropdown-toggle export-btn" id="export" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <img src="/assets/default/svgs/export-alt.svg" alt="export-alt">Export
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="export">
                                                        <ul>
                                                            <li><a class="dropdown-link" href="#">Export as CSV</a></li>
                                                            <li><a class="dropdown-link" href="#">Export as PDF</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter-toggle-holder collapse" id="filter-toggle-box" data-parent="#accordion">
                                            <div class="filter-toggle-actions">
                                                <div class="dropdown status">
                                                    <button type="button" class="dropdown-toggle" id="Status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <img src="/assets/default/svgs/filter-status.svg" alt="filter-status">Status
                                                        <span class="selected-labels" id="statusSelectedLabels"></span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="Status">
                                                        <div class="dropdown-search">
                                                            <div class="input-holder">
                                                                <img src="/assets/default/svgs/search.svg" alt="search">
                                                                <input type="text" placeholder="Status">
                                                            </div>
                                                        </div>
                                                        <label class="dropdown-item">
                                                            <input type="checkbox" value="Unfunded"> 
                                                            Unfunded
                                                        </label>
                                                        <label class="dropdown-item">
                                                            <input type="checkbox" value="Pending"> 
                                                            Pending
                                                        </label>
                                                        <label class="dropdown-item">
                                                            <input type="checkbox" value="Paid"> 
                                                            Paid
                                                        </label>
                                                        <button class="clear-filter-btn clearSelection">Clear Filter</button>
                                                    </div>
                                                </div>

                                                <div class="dropdown">
                                                    <button type="button"><img src="/assets/default/svgs/filter-calendar.svg" alt="filter-calendar">Date Range</button>
                                                </div>

                                                <div class="dropdown">
                                                    <button type="button" class="dropdown-toggle" id="amount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="default-label"><img src="/assets/default/svgs/dollar-sign.svg" alt="dollar-sign">Amount</span>
                                                        <span class="selected-labels" id="amountSelectedLabels"></span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="amount">
                                                        <div class="dropdown-top d-flex justify-content-between align-items-center mb-2">
                                                            <strong>Amount</strong>
                                                            <a href="javascript:void(0)" class="clear-amount-btn" id="clearAmounts">Clear</a>
                                                        </div>
                                                        <div class="d-flex amount-fields-holder">
                                                            <div class="min-val">
                                                                <span>Min</span>
                                                                <label for="minAmount">
                                                                    <em>$</em>
                                                                    <input type="number" id="minAmount" placeholder="2.56">
                                                                </label>
                                                            </div>
                                                            <div class="max-val">
                                                                <span>Max</span>
                                                                <label for="maxAmount">
                                                                    <em>$</em>
                                                                    <input type="number" id="maxAmount" placeholder="49.66">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                                <div class="card skeleton">
                                    <div class="table-sm">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Date</th>
                                                    <th>Account Holder</th>
                                                    <th>Status</th>
                                                    <th>Package Type</th>
                                                    <th>Payment Method</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td data-th="Transaction ID">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>#95954</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Date">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>10/08/2022</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Account Holder">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>Ron Vargas</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Status">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span class="status-paid">Paid</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Package Type">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>Test Prep Plus</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Payment Method">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>
                                                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="payment-logo">
                                                                •••• 6165
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Total">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>$168.00</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Eye">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span class="icon-eye"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-th="Transaction ID">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>#95423</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Date">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>30/07/2022</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Account Holder">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>Carolyn Hanso</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Status">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span class="status-paid">Paid</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Package Type">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>Home learning and exam revision</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Payment Method">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>
                                                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="payment-logo">
                                                                •••• 7128
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Total">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>$523.00</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Eye">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span class="icon-eye"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-th="Transaction ID">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>#92903</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Date">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>18/07/2022</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Account Holder">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>Gabriella May</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Status">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span class="status-pending">Pending</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Package Type">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>Home learning</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Payment Method">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>
                                                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="payment-logo">
                                                                ••••@gmail.com
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Total">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span>$81.00</span>
                                                        </div>
                                                    </td>
                                                    <td data-th="Eye">
                                                        <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                            <span class="icon-eye"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="card mb-20 h-100">
                                        <div class="card-header font-weight-bold justify-content-between px-15">
                                            <h6 class="mb-0">Membership Information</h6>
                                            <span class="badge badge-success">Active</span>
                                        </div>
                                        <div class="card-body d-flex justify-content-between align-items-start px-15">
                                            <span>Your current active plan is "<strong>Home learning and exam revision</strong>"</span>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between align-items-center pt-0 flex-wrap px-15">
                                            <button class="btn btn-danger mb-0" data-toggle="modal" data-target="#add-student-modal">Cancel Membership</button>
                                            <a href="#" class="btn btn-link p-0">Update Membership Plan</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card mb-20 h-100">
                                        <div class="card-header font-weight-bold px-15">
                                            <h6 class="mb-0">Payment Information</h6>
                                        </div>
                                        <div class="card-body pt-0 px-15">
                                            <div class="payment-list">
                                                <p><strong>Plan Name:</strong> Home learning and exam revision (Monthly)</p>
                                                <p><strong>Plan Price:</strong> £39.99</p>
                                                <p><strong>Start Date:</strong> 2024-06-10</p>
                                                <p><strong>End Date:</strong> 2025-06-10</p>
                                                <p><strong>Date of Next Payment:</strong> 2025-06-10 00:00:00</p>
                                                <p><strong>Auto Renewal:</strong> No</p>
                                                <p><strong>Trial Period:</strong> N.A.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-start mb-30 rurera-hide">
                                <div class="col-md-12 mb-30">
                                    <h4 class="mb-0">FAQ</h4>
                                </div>
                                <div class="col-md-3 faq-sidebar mb-0">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a href="#" class="active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Subscription details</a>
                                        <a href="#" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Billing and payments</a>
                                        <a href="#" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Other</a>
                                    </div>
                                </div>

                                <div class="col-md-9 faq-content">
                                    <div id="faqAccordion">
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
                                                                How do I sign up for a subscription?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseOne" class="collapse show" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Select the plan above with your preferred subscription plan, and follow the on-screen instructions to create an account and enter your payment details.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header" id="headingTwo">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">
                                                                Can I cancel my subscription?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Yes, you can cancel your subscription anytime from your account settings.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header" id="headingThree">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">
                                                                Can I switch my subscription plan?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Yes, switching plans is available through the membership settings page.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header" id="headingFour">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour">
                                                                Do you offer a free trial?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseFour" class="collapse" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Free trials may be offered during promotional periods; please check our pricing page.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header" id="headingFive">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive">
                                                                How do I know when my subscription is about to renew?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseFive" class="collapse" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            You’ll receive a reminder email and see renewal details in your account before the renewal date.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header" id="headingSix">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix">
                                                                Are there any discounts for students or non-profits?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseSix" class="collapse" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Yes, we offer special discounts. Please contact support for eligibility verification.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="card">
                                                    <div class="card-header" id="heading1">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1">
                                                                How long is my subscription valid?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse1" class="collapse show" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Your subscription is valid from the start date to the end date mentioned under “Payment Information.”
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="heading2">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2">
                                                                Can I upgrade or change my subscription plan?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse2" class="collapse" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Your subscription is valid from the start date to the end date mentioned under Payment Information.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="heading3">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3">
                                                                Is auto-renewal enabled on my subscription?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse3" class="collapse" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            The auto-renewal status is displayed in the Payment Information section. If it’s set to No,”your plan will not renew automatically.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <div class="card">
                                                    <div class="card-header" id="heading4">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse4">
                                                                When will I be charged next?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse4" class="collapse show" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            The exact date and time of your next payment (if applicable) is listed as “Date of Next Payment.”
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="heading5">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5">
                                                                Can I view my payment history or invoices?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse5" class="collapse" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            Yes, you can access your billing history and download invoices through your account’s billing section.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="heading6">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6">
                                                                How do I update my payment method?
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse6" class="collapse" data-parent="#faqAccordion">
                                                        <div class="card-body">
                                                            To update your payment details, go to your account settings and select the billing section to manage your payment methods.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="admin-rurera-tabs-billing rurera-hide transactions-tab ">
                            <h2 class="mb-1 font-weight-bold mb-15">Transactions</h2>
                            <div class="card skeleton">
                                <div class="table-sm">
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>Date</th>
                                                <th>Account Holder</th>
                                                <th>Status</th>
                                                <th>Package Type</th>
                                                <th>Payment Method</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-th="Transaction ID">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>#95954</span>
                                                    </div>
                                                </td>
                                                <td data-th="Date">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>10/08/2022</span>
                                                    </div>
                                                </td>
                                                <td data-th="Account Holder">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>Ron Vargas</span>
                                                    </div>
                                                </td>
                                                <td data-th="Status">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span class="status-paid">Paid</span>
                                                    </div>
                                                </td>
                                                <td data-th="Package Type">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>Test Prep Plus</span>
                                                    </div>
                                                </td>
                                                <td data-th="Payment Method">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>
                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="payment-logo">
                                                            •••• 6165
                                                        </span>
                                                    </div>
                                                </td>
                                                <td data-th="Total">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>$168.00</span>
                                                    </div>
                                                </td>
                                                <td data-th="Eye">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span class="icon-eye"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-th="Transaction ID">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>#95423</span>
                                                    </div>
                                                </td>
                                                <td data-th="Date">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>30/07/2022</span>
                                                    </div>
                                                </td>
                                                <td data-th="Account Holder">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>Carolyn Hanso</span>
                                                    </div>
                                                </td>
                                                <td data-th="Status">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span class="status-paid">Paid</span>
                                                    </div>
                                                </td>
                                                <td data-th="Package Type">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>Home learning and exam revision</span>
                                                    </div>
                                                </td>
                                                <td data-th="Payment Method">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>
                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="payment-logo">
                                                            •••• 7128
                                                        </span>
                                                    </div>
                                                </td>
                                                <td data-th="Total">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>$523.00</span>
                                                    </div>
                                                </td>
                                                <td data-th="Eye">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span class="icon-eye"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-th="Transaction ID">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>#92903</span>
                                                    </div>
                                                </td>
                                                <td data-th="Date">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>18/07/2022</span>
                                                    </div>
                                                </td>
                                                <td data-th="Account Holder">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>Gabriella May</span>
                                                    </div>
                                                </td>
                                                <td data-th="Status">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span class="status-pending">Pending</span>
                                                    </div>
                                                </td>
                                                <td data-th="Package Type">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>Home learning</span>
                                                    </div>
                                                </td>
                                                <td data-th="Payment Method">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>
                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="payment-logo">
                                                            ••••@gmail.com
                                                        </span>
                                                    </div>
                                                </td>
                                                <td data-th="Total">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span>$81.00</span>
                                                    </div>
                                                </td>
                                                <td data-th="Eye">
                                                    <div class=" skelton-hide skelton-height-lg skelton-mb-0">
                                                        <span class="icon-eye"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Join Modal -->
    <div class="modal fade class-join-modal" id="class-join-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="teacher-header">
                <h2 class="modal-title">Class Join Link</h2>
                <p class="subheading">Apple - 5th Grade</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="class-join">
                <p class="instruction">
                    Share the link below with your students and they can either join your class by logging into their existing account or by creating a new account.
                </p>
                <div class="link-box">
                    <div class="link">
                    <span class="link-icon">📋</span>
                    <a href="https://typing.com/join#64907A2E31D12" target="_blank">
                        https://typing.com/join#64907A2E31D12
                    </a>
                    </div>
                    <button class="copy-btn" type="button">Copy Link</button>
                </div>
                <button class="back-btn">← Back</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Add Student Table Modal -->
    <div class="modal fade add-student-modal" id="add-student-modal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="teacher-header">
                    <h2 class="modal-title">Class Join Link</h2>
                    <p class="subheading">Apple – 5th Grade</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="error-alert">
                        Errors have occurred with 4 students imported.
                        <a href="#">Go back and fix errors.</a>
                    </div>
                    <div class="table-sm">
                        <table>
                            <thead>
                                <tr>
                                    <th>Student Username</th>
                                    <th>Password</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>billy.173</td>
                                    <td>bluegem</td>
                                    <td>Billy</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>billymadison.26</td>
                                    <td>yellowflower</td>
                                    <td>Billy</td>
                                    <td>Madison</td>
                                    <td></td>
                                </tr>
                                <tr class="error-row">
                                    <td>
                                        <span class="error-highlight">billymadison.26</span>
                                        <div class="error-message">This is duplicated within the file</div>
                                    </td>
                                    <td>bluebubble</td>
                                    <td>Billy</td>
                                    <td>Madison</td>
                                    <td>
                                        <span class="error-highlight">billym@school.edu</span>
                                        <div class="error-message">This email is already in use by another account.</div>
                                    </td>
                                </tr>
                                <tr class="error-row">
                                    <td>
                                        <span class="error-highlight">billym@school.edu</span>
                                        <div class="error-message">
                                            This username is already in use. Usernames must be unique across all of Typing.com.
                                        </div>
                                    </td>
                                    <td>purpleflower</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span class="error-highlight">billym@school.edu</span>
                                        <div class="error-message">
                                            This email is already in use by another account.<br>
                                            This is duplicated within the file.
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- student-successfull-modal -->
    <div class="modal fade student-successfull-modal" id="student-successfull-modal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="text-holder">
                        <h2>You’ve successfully added <strong>4 new students</strong></h2>
                        <p>
                        We’ve generated <strong>usernames</strong> and <strong>passwords</strong> for all new students.
                        You can view or edit them in the
                        <a href="#">Login Cards</a>
                        or within student settings.
                        </p>
                    </div>
                    <div class="teacher-buttons">
                        <button class="btn btn-outline">Done</button>
                        <button class="btn btn-primary">Print Login Cards</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- student-successfull-modal with image -->
    <div class="modal fade student-successfull-modal" id="student-successfull-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="row align-items-center mt-auto mb-30 pt-50 px-30">
                        <div class="col-md-4">
                            <div class="img-holder">
                                <figure>
                                    <img src="/assets/default/img/sucsess-img.png" alt="sucsess-img">
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="text-holder">
                                <h2>You’ve successfully added <strong>4 new students</strong></h2>
                                <p>
                                We’ve generated <strong>usernames</strong> and <strong>passwords</strong> for all new students.
                                You can view or edit them in the
                                <a href="#">Login Cards</a>
                                or within student settings.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="teacher-buttons">
                        <button class="btn btn-outline">Done</button>
                        <button class="btn btn-primary">Print Login Cards</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Student Listing Modal -->
    <div class="modal fade add-student-modal" id="class-join-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="teacher-header">
                    <h2 class="modal-title">Add Student</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="select-holder">
                    <label class="input-label">Select a Class</label>
                    <div class="select-box">
                        <select>
                        <option value="Orange - 5th Grade">Orange - 5th Grade</option>
                        <option value="Orange - 5th Grade">Orange - 6th Grade</option>
                        <option value="Orange - 5th Grade">Orange - 7th Grade</option>
                        </select>
                    </div>
                    </div>
                    <div class="student-icon-box-holder">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Choose a way to add Students:</h3>
                            </div>
                            <div class="col-md-3">
                                <div class="student-icon-box">
                                    <div class="img-holder">
                                    <img src="/assets/default/img/user-icon.png" alt="user-icon">
                                    </div>
                                    <div class="text-holder">
                                        <h4>Add a Student</h4>
                                        <p>Add a single student to the class</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            <div class="student-icon-box">
                                <div class="img-holder">
                                <img src="/assets/default/img/user-icon.png" alt="user-icon">
                                </div>
                                <div class="text-holder">
                                <h4>Add a Student</h4>
                                <p>Add a single student to the class</p>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3">
                            <div class="student-icon-box">
                                <div class="img-holder">
                                <img src="/assets/default/img/user-icon.png" alt="user-icon">
                                </div>
                                <div class="text-holder">
                                <h4>Add a Student</h4>
                                <p>Add a single student to the class</p>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3">
                            <div class="student-icon-box">
                                <div class="img-holder">
                                <img src="/assets/default/img/user-icon.png" alt="user-icon">
                                </div>
                                <div class="text-holder">
                                <h4>Add a Student</h4>
                                <p>Add a single student to the class</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Student Listing Modal -->
    <div class="modal fade add-student-modal" id="class-join-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="teacher-header">
                    <h2 class="modal-title">Add Student</h2>
                    <p>Apple - 5th Grade</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="student-form">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Student Detail</h3>
                            </div>
                            <div class="col-md-6">
                                <span class="field-lable">
                                    Username <em>*</em>
                                </span>
                                <div class="field-holder">
                                    <input type="text" placeholder="billym@school.edu" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="field-lable">
                                    Password <em>*</em>
                                </span>
                                <div class="field-holder">
                                    <input type="password" placeholder="1234" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="field-lable">
                                    First Name <em>*</em>
                                </span>
                                <div class="field-holder">
                                    <input type="text" placeholder="Kaiser" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="field-lable">
                                    Last Name <em>*</em>
                                </span>
                                <div class="field-holder">
                                    <input type="text" placeholder="khan" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <span class="field-lable">
                                    Email <em>*</em>
                                </span>
                                <div class="field-holder">
                                    <input type="text" placeholder="billym@school.edu" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="teacher-buttons">
                        <button class="btn btn-outline">Back</button>
                        <button class="btn btn-primary">Add Single Student</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Billing Card Modal  -->
    <div class="modal fade add-new-card" id="newMethod" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMethodLabel">Add Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-form">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Card Holder Name:</label>
                                    <div class="form-field">
                                        <img src="/assets/default/svgs/card-credit.svg" alt="card-credit">
                                        <input type="text" name="card_name" class="form-control" placeholder="Enter Caed Holder Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Card Number:</label>
                                    <div class="form-field">
                                        <img src="/assets/default/svgs/user.svg" alt="user">
                                        <input type="text" name="card_number" class="form-control" placeholder="4444 4444 4444 4444">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Expires:</label>
                                    <div class="form-field">
                                        <input type="text" name="card_expires" class="form-control" placeholder="mm/yy">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>CVC:</label>
                                    <div class="form-field">
                                        <input type="text" name="card_cvc" class="form-control" placeholder="***">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts_bottom')
<script>
    $(document).ready(function () {
        $(document).on('click', '.admin-rurera-tabs li a', function (e) {
            var target_class = $(this).closest('.admin-rurera-tabs').attr('data-target_class');
            var target_div = $(this).attr('id');
            $("."+target_class).addClass('rurera-hide');
            $("."+target_div).removeClass('rurera-hide');
            $(this).closest('.admin-rurera-tabs').find('li').find('a').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
<script>
    $(document).ready(function () {
        const $el = document.querySelector(".section-body");

        setTimeout(() => {
            $el.classList.remove("skeleton");
            $el
                .querySelectorAll(".skelton-hide")
                .forEach((el) => el.classList.remove("skelton-hide"));
        }, 1000);
    });
</script>
<script>
    $(document).ready(function () {
        const selectedLabelsContainer = $('#statusSelectedLabels');
        const yearCheckboxes = $('.status .dropdown-menu input[type="checkbox"]');

        yearCheckboxes.change(function () {
            const selected = [];
            yearCheckboxes.each(function () {
                if (this.checked) {
                    selected.push($(this).val());
                }
            });

            if (selected.length > 0) {
                let badges = selected.map(item => `<span class="badge badge-primary">${item}</span>`).join(' ');
                selectedLabelsContainer.html(badges);
            } else {
                selectedLabelsContainer.html('');
            }
        });

        $('.clearSelection').click(function () {
            checkboxes.prop('checked', false);
            selectedLabelsContainer.html('');
        });
    });
</script>
<script>
    $(document).ready(function () {
        const selectedLabelsContainer = $('#amountSelectedLabels');
        const defaultLabel = $('.default-label');
        const minInput = $('#minAmount');
        const maxInput = $('#maxAmount');
        const clearBtn = $('#clearAmounts');

        function updateLabels() {
            let min = minInput.val();
            let max = maxInput.val();
            let text = '';

            if (min && max) {
                text = `From $${min} - To $${max}`;
            } else if (min) {
                text = `From $${min}`;
            } else if (max) {
                text = `To $${max}`;
            }

            selectedLabelsContainer.text(text);
        }

        minInput.on('input', updateLabels);
        maxInput.on('input', updateLabels);

        // Clear button
        clearBtn.on('click', function () {
            minInput.val('');
            maxInput.val('');
            selectedLabelsContainer.text('');
        });
    });
</script>
@endpush
