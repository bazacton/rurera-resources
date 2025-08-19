<div class="teacher-table skeleton">
    <div class="card">
        <div class="teacher-search-filter">

            <div class="search-field">
                                                    <span class="icon-box">
                                                        <img src="/assets/default/svgs/search.svg" alt="search">
                                                    </span>
                <input type="text" class="search-invoices" placeholder="Search Invoices">
            </div>
        </div>
        <div class="card-body p-0 table-sm">
            <table class="table mb-0">
                <thead class="thead-light">
                <tr>
                    <th>

                        Invoice
                    </th>
                    <th>Amount</th>
                    <th>Invoice Details</th>
                    <th>Status</th>
                    <th>Package Dates</th>
                    <th>&nbsp;</th>

                </tr>
                </thead>
                <tbody class="teachers-list">

                @if($invoices->count() > 0)
                    @foreach($invoices as $invoiceObj)

                        <tr>
                            <td data-th="Teacher/Admin">

                                <div class="skelton-hide skelton-height-lg skelton-mb-0">

                                    <strong>
                                        <span class="user-lable">
                                            <span class="invoice-id">#{{ $invoiceObj->id }}</span>
                                        </span>
                                    </strong>
                                </div>
                            </td>
                            <td data-th="Role">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>{{ addCurrencyToPrice($invoiceObj->charged_amount) }}</span>
                                </div>
                            </td>
                            <td data-th="Last Login">

                                <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>
                                        @php $invoiceOrderObj = $invoiceObj->order;
                                        $payment_data = isset($invoiceOrderObj->payment_data)? json_decode($invoiceOrderObj->payment_data) : array();
                                        @endphp
                                        @if(isset($payment_data->is_courses) && $payment_data->is_courses == true)
                                            <span>Courses</span>
                                        @endif
                                        @if(isset($payment_data->is_timestables) && $payment_data->is_timestables == true)
                                            <span>Timestables</span>
                                        @endif
                                        @if(isset($payment_data->is_vocabulary) && $payment_data->is_vocabulary == true)
                                            <span>Vocabulary</span>
                                        @endif
                                        @if(isset($payment_data->is_bookshelf) && $payment_data->is_bookshelf == true)
                                            <span>Book Shelf</span>
                                        @endif
                                        @if(isset($payment_data->is_sats) && $payment_data->is_sats == true)
                                            <span>Sats</span>
                                        @endif
                                        @if(isset($payment_data->is_elevenplus) && $payment_data->is_elevenplus == true)
                                            <span>11 Plus</span>
                                        @endif
                                        @if(isset($payment_data->is_google_classroom) && $payment_data->is_google_classroom == true)
                                            <span>Google Classroom</span>
                                        @endif
                                    </span>
                                </div>
                            </td>
                            <td data-th="Classes">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">{{$invoiceObj->status}}</div>
                                @if($invoiceObj->status == 'pending')
                                    <div class="option-field-item mt-20 mb-20 ">
                                        <label class="custom-switch pl-0">
                                            <input type="checkbox" name="start_end_layers_radio" id="mark-invoice-paid-{{$invoiceObj->id}}" value="1" class="custom-switch-input mark-invoice-paid" data-id="{{$invoiceObj->id}}">
                                            <span class="custom-switch-indicator"></span>
                                            <label class="custom-switch-description mb-0 cursor-pointer" for="mark-invoice-paid-{{$invoiceObj->id}}">Mark Paid</label>
                                        </label>
                                    </div>
                                @endif
                            </td>
                            <td data-th="Classes">
                                <div class="skelton-hide skelton-height-lg skelton-mb-0">{{dateTimeFormat($invoiceObj->start_at, 'j F Y')}} to {{dateTimeFormat($invoiceObj->expiry_at, 'j F Y')}}</div>
                            </td>
                            <td data-th="Classes">
                                <div class="pending-invites-controls">
                                    <button class="copy-to-text" data-copy_to="invoice-link-{{$invoiceObj->id}}" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Copy Invoice link">
                                        <img src="/assets/default/svgs/link-file.svg" alt="link-file">
                                        <span class="rurera-hide invoice-link-{{$invoiceObj->id}}">{{$invoiceObj->stripe_invoice_url}}</span>
                                    </button>
                                    <button data-id="{{$invoiceObj->id}}" class="delete-student" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Delete Student">
                                        <img src="/assets/default/svgs/delete-menu.svg" alt="delete-menu">
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td data-th="no-records-found" class="no-records-found">
                            No records found
                        </td>
                    </tr>
                @endif



                </tbody>
            </table>
            <span class="table-counts">{{$invoices->count()}} Invoices</span>
        </div>
    </div>
</div>
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

    $(document).on('change', '.mark-invoice-paid', function (e) {
        var invoice_id = $(this).attr('data-id');
        var redirect_url = window.location.href;
        $(".confirm-title").html('Are you sure you want to Pay this invoice Manually?');
        $(".confirm-approve-btn").attr('href', '/admin/schools/invoice_pay_manual?invoice_id='+invoice_id+'&redirect_url='+redirect_url);
        $(".rurera-confirm-modal").attr('data-invoice_id', invoice_id);
        $(".confirm-approve-btn").html("Continue to Pay");

        $(".rurera-confirm-modal").modal('show');
    });

    $('.rurera-confirm-modal').on('hidden.bs.modal', function (e) {
        var invoice_id = $(this).attr('data-invoice_id');
        $("#mark-invoice-paid-" + invoice_id).prop('checked', false); // Uncheck on modal close
    });



</script>
