@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/css/quiz-create.css">
@endpush

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">

                    <div class="container mt-5">
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
                    </div>

                </div>
            </div>
        </div>
    </section>



@endsection

@push('scripts_bottom')

@endpush
