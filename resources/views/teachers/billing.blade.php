@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/css/quiz-create.css">
    <style>
        .status-paid {
            background-color: #e6f7ec;
            color: #34a853;
            font-weight: 500;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.875rem;
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
            width: 30px;
            margin-right: 8px;
        }
    </style>

@endpush

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">

                    <ul data-target_class="admin-rurera-tabs-billing" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
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

                    <div class="admin-rurera-tabs-billing membership-tab ">
                        <h2 class="mb-1 font-weight-bold">Membership Details</h2>
                        <p class="text-muted">A demo Message regarding the memberships and a welcoming message</p>

                        <button class="btn btn-danger mb-4">Cancel Membership</button>

                        <div class="card mb-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <span>Your current active plan is "<strong>Gold Membership</strong>"</span>
                                <span class="badge badge-success">Active</span>
                            </div>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-link p-0">Update Membership Plan</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header font-weight-bold">Plan Information</div>
                                    <div class="card-body">
                                        <p><strong>Plan Name:</strong> Gold (Yearly)</p>
                                        <p><strong>Plan Price:</strong> $ 35,000.00</p>
                                        <p><strong>Start Date:</strong> 2024-06-10</p>
                                        <p><strong>End Date:</strong> 2025-06-10</p>
                                        <p><strong>Auto Renewal:</strong> No</p>
                                        <p><strong>Trial Period:</strong> N.A.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header font-weight-bold">Payment Information</div>
                                    <div class="card-body">
                                        <p><strong>Date of Next Payment:</strong> 2025-06-10 00:00:00</p>
                                        <p><strong>No. of Billing Cycles:</strong> 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 faq-sidebar">
                            <a href="#" class="active">Subscription details</a>
                            <a href="#">Billing and payments</a>
                            <a href="#">Other</a>
                        </div>

                        <div class="col-md-9 faq-content">
                            <h4>FAQ</h4>
                            <div id="faqAccordion">
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
                        </div>

                    </div>


                    <div class="admin-rurera-tabs-billing rurera-hide transactions-tab ">
                        <h2 class="mb-1 font-weight-bold">Transactions</h2>

                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th>ORDER</th>
                            <th>DATE</th>
                            <th>CUSTOMER</th>
                            <th>STATUS</th>
                            <th>PAYMENT METHOD</th>
                            <th>TOTAL</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>#95954</td>
                            <td>10/08/2022</td>
                            <td>Ron Vargas</td>
                            <td><span class="status-paid">Paid</span></td>
                            <td>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="payment-logo">
                                •••• 6165
                            </td>
                            <td>$168.00</td>
                            <td><span class="icon-eye"></span></td>
                        </tr>
                        <tr>
                            <td>#95423</td>
                            <td>30/07/2022</td>
                            <td>Carolyn Hanso</td>
                            <td><span class="status-paid">Paid</span></td>
                            <td>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="payment-logo">
                                •••• 7128
                            </td>
                            <td>$523.00</td>
                            <td><span class="icon-eye"></span></td>
                        </tr>
                        <tr>
                            <td>#92903</td>
                            <td>18/07/2022</td>
                            <td>Gabriella May</td>
                            <td><span class="status-paid">Paid</span></td>
                            <td>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="payment-logo">
                                ••••@gmail.com
                            </td>
                            <td>$81.00</td>
                            <td><span class="icon-eye"></span></td>
                        </tr>
                        </tbody>
                    </table>
                    </div>


                </div>
            </div>
        </div>
    </section>



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
@endpush
