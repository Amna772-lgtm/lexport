<?php
include('header.php');
?>
<style>

    .modal-dialog {
        max-width: 600px;
        margin-top: 0;
    }

    h1, h2, h3, h4, h5, h6, p, label, span, input {
        font-family: 'Roboto';
    }
    p, label, span {
        font-size: 8px;
        line-height: 1.5;
        margin: 0;
        padding: 0;
    }

    .display-grid {
        display: grid;
    }

    .justify-self-end {
        justify-self: end;
    }

    .grid-col-2 {
        grid-template-columns: repeat(2, 1fr);
    }

    .grid-col-3 {
        grid-template-columns: repeat(3, 1fr);
    }

    .modal-content {
        padding: 24px;
    }

    .modal .modal-content .modal-header {
        padding: 0 0 16px 0;
    }

    .modal .modal-content .modal-body {
        padding: 24px 0 0 0;
    }

    .modal.lp-theme-modal .modal-dialog .modal-content .modal-header {
        border-bottom: 1px solid #D6DCE5
    }

    .modal-header-logo {
        max-height: 45px;
        text-align: end;
    }

    .modal-header-logo img {
        max-height: 100%;
    }

    .modal-header-inner {
        grid-template-columns: 6fr 3fr 3fr;
    }

    .modal-header-title {
        /* padding-inline-end: 16px; */
        border-inline-end: 1px solid #D6DCE5;
    }

    .header-title {
        font-size: 32px;
        font-weight: 700;
        color: #1B2A39;
    }

    .header-e-mail {
        font-size: 10px;
    }

    .modal-header-description {
        padding-inline-start: 16px;
    }

    .payment-detail span,
    .detail-section-inner > span:first-child,
    .amount:not(.price-amount),
    .services-provided-name,
    span.values,
    .detail-section-inner .select,
    .modal-header-description span {
        color: #1B2A39;
    }

    .services-provided-name,
    .amount {
        font-weight: 700;
    }

    .detail-section-inner > span:first-child,
    .detail-section-inner .select,
    .detail-section-inner .select select {
        font-size: 12px;
        font-weight: 700;
    }

    .detail-section-inner .select select {
        background: none;
    }

    ul.invoice-detail {
        margin-bottom: 0;
    }

    .invoice-detail label {
        display: block;
    }

    .select-value.select-date input {
        background: none;
    }

    .invoice-billing-section {
        border-bottom: 1px solid #ccc;
    }

    .invoice-billing-section,
    .incoice-check-out-section {
        padding-block: 20px 0;
    }

    .billing-headers {
        padding-block: 5px 7px;
    }

    .invoice-view .billing-headers {
        padding-block: 20px;
    }

    .billing-body {
        padding-block: 12px 24px;
    }

    .billing-headers {
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
    }

    .single-service-bill.display-grid,
    .billing-headers.display-grid {
        grid-template-columns: 8fr 2fr 2fr;
    }

    .single-service-bill.display-grid div:not(:first-child) {
        justify-self: end;
    }

    .incoice-check-out-section.display-grid {
        grid-template-columns: 8fr 4fr;
    }

    .amount::before {
        content: "$ ";
    }

    .total-ammount {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .grand-total-amount {
        color: #1B2A39;
        font-weight: 600;
        font-size: 18px;
        line-height: 22px;
    }

    .check-out-buttons {
        grid-column: span 2;
        column-gap: 10px;
        padding-top: 10px;
    }

    .check-out-buttons input{
        cursor: pointer;
        background: none;
        padding: 10px 16px;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
    }

    input.create {
        background-color: #1866a9;
        border-radius: 50px;
        color: #fff;
    }

    .detail-section-title label {
        font-weight: 500;
        margin-bottom: 10px;
    }

    .detail-section-title label::before {
        content: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="8" height="8"%3E%3Cpath fill="%23fff" d="M0 55.2L0 426c0 12.2 9.9 22 22 22c6.3 0 12.4-2.7 16.6-7.5L121.2 346l58.1 116.3c7.9 15.8 27.1 22.2 42.9 14.3s22.2-27.1 14.3-42.9L179.8 320l118.1 0c12.2 0 22.1-9.9 22.1-22.1c0-6.3-2.7-12.3-7.4-16.5L38.6 37.9C34.3 34.1 28.9 32 23.2 32C10.4 32 0 42.4 0 55.2z"/%3E%3C/svg%3E');
        display: flex;
        justify-content: center;
        align-items: center;
        width: 18px;  
        height: 18px;
        background-color: #1866a9; 
        border-radius: 50%; 
        margin-inline-end: 6px;
    }

    .invoice-details-section {
        column-gap: 10px
    }
    
    .invoice-details-section .detail-section-inner {
        display: flex;
        flex-direction: column;
    }

    /* --------------------------------- Style for View ---------------- */

.invoice-view .invoice-details-section .detail-section-inner {
    background-color: #EBEFF6;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 10px;
    height: calc(100% - 24px);

}

</style>
<!-- start popup invoice edit -->

<div class="modal fade lp-theme-modal show invoice-edit" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header-inner display-grid">
                    <div class="modal-header-title ">
                        <h2 class="header-title text-capitalize">Nassar Al barakit</h2>
                        <p class="header-e-mail">nassarbarakit@mail.com</p>
                    </div>
                    <div class="modal-header-description">
                        <ul class="invoice-detail">
                            <li class="d-flex flex-column mb-2">
                                <label for="" class="">Invoice-number:</label>
                                <span class="invoice-number">INV-2025-001</span>
                            </li>
                            <li d-flex flex-column>
                            <label for="" class="">Issued:</label>
                            <span class="invoice-issue-date">2025-01-05</span>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-header-logo">
                        <img src="/assets/images/img/logo-new-1.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="invoice-details-section display-grid grid-col-3">
                    <div class="client-detail-section">
                        <div class="detail-section-title">
                            <label for="" class="d-flex align-items-center text-uppercase">Client Details</label>
                        </div>
                        <div class="detail-section-inner gap-2">
                            <span class="select">
                                <select class="text-capitalize">
                                    <option value="" disabled selected>Select case</option>
                                    <option value="option1">case 1</option>
                                    <option value="option2">case 2</option>
                                </select>
                            </span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="services-detail-section">
                        <div class="detail-section-title">
                            <label for="" class="d-flex align-items-center text-uppercase">Service Details</label>
                        </div>
                            <div class="detail-section-inner gap-2">
                                <span class="select">
                                    <select class="text-capitalize">
                                        <option value="" disabled selected>Legal Service</option>
                                        <option value="option1">Service 1</option>
                                        <option value="option2">Service 2</option>
                                    </select>
                                </span>
                                <span></span>
                                <span></span>
                            </div>
                    </div>
                    <div class="payment-detail-section">
                        <div class="detail-section-title">
                            <label for="" class="d-flex align-items-center text-uppercase">Payment Details</label>
                        </div>
                        <div class="detail-section-inner gap-2">
                            <span class="select text-capitalize">Total Payment</span>
                            <div class="payment-detail gap-2">
                                <!-- <div class="display-grid grid-col-2">
                                    <label for="">Method:</label>
                                    <span class="values select-value">
                                        <select class="">
                                            <option value="" disabled selected>Bank Transfer</option>
                                            <option value="option1">Bank Tranfer</option>
                                            <option value="option2">Cash</option>
                                        </select>
                                    </span>
                                </div> -->
                                <div class="display-grid grid-col-2">
                                    <label for="">Due Date:</label>
                                    <span class="values select-value select-date">
                                        <input type="date" value="2025-01-12">
                                    </span>
                                </div>
                                <div class="display-grid grid-col-2">
                                    <label for="">Tax:</label>
                                    <span class="values">
                                        VAT 15%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-billing-section">
                    <div class="billing-headers display-grid">
                        <label for="" class="text-uppercase">Services Provided</label>
                        <label for="" class="text-uppercase justify-self-end"></label>
                        <label for="" class="text-uppercase justify-self-end">total</label>
                    </div>
                    <div class="billing-body">
                        <div class="single-service-bill display-grid">
                        <div></div>
                        <div class="justify-self-end"></div>
                        <div class="justify-self-end">
                            <span class="amount">0</span>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="incoice-check-out-section display-grid align-items-center">
                    <div class="terms-conditions">
                        <label for="" class="text-capitalize">terms & conditions</label>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    </div>
                    <div class="total-ammount">
                        <label for="" class="text-uppercase">Total Amount Due</label>
                        <span class="amount grand-total-amount d-block">0</span>
                    </div>
                    
                    <div class="check-out-buttons d-flex justify-content-end">
                        <input type="button" class="cancle" value="Cancle">
                        <input type="submit" class="create" value="Create">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------- start popup invoice view -------------------------->

<div class="modal fade lp-theme-modal show invoice-view" style="display:block">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header-inner display-grid">
                    <div class="modal-header-title">
                        <h2 class="header-title text-capitalize">Nassar Al barakit</h2>
                        <p class="header-e-mail">nassarbarakit@mail.com</p>
                    </div>
                    <div class="modal-header-description">
                        <ul class="invoice-detail">
                            <li class="d-flex flex-column mb-2">
                                <label for="" class="">Invoice-number:</label>
                                <span class="invoice-number">INV-2025-001</span>
                            </li>
                            <li class="d-flex flex-column">
                            <label for="" class="">Issued:</label>
                            <span class="invoice-issue-date">2025-01-05</span>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-header-logo">
                        <img src="/assets/images/img/logo-new-1.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="invoice-details-section display-grid grid-col-3">
                    <div class="client-detail-section">
                        <div class="detail-section-title">
                            <label for="" class="d-flex align-items-center text-uppercase">Client Details</label>
                        </div>
                        <div class="detail-section-inner gap-2">
                            <span class="client-name text-capitalize">John doe</span>
                            <span class="client-full-name text-capitalize">John doe</span>
                            <span class="client-e-mail">johndoe@example.com</span>
                        </div>
                    </div>
                    <div class="services-detail-section">
                        <div class="detail-section-title">
                            <label for="" class="d-flex align-items-center text-uppercase">Service Details</label>
                        </div>
                            <div class="detail-section-inner gap-2">
                                <span class="service-title text-capitalize">legal consultation</span>
                                <span class="service-description">Description</span>
                            </div>
                    </div>
                    <div class="payment-detail-section">
                        <div class="detail-section-title">
                            <label for="" class="d-flex align-items-center text-uppercase">Payment Details</label>
                        </div>
                        <div class="detail-section-inner gap-2">
                            <span class="amount invoice-amount">1,200</span>
                            <div class="payment-detail gap-2">
                                <div class="display-grid grid-col-2">
                                    <label for="">Method:</label>
                                    <span class="payment-method-name">Bank Transfer</span>
                                </div>
                                <div class="display-grid grid-col-2">
                                    <label for="">Due Date:</label>
                                    <span class="payment-due-date">2025-01-05</span>
                                </div>
                                <div class="display-grid grid-col-2">
                                    <label for="">Tax:</label>
                                    <span class="tax-applied">VAT 15%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-billing-section">
                    <div class="billing-headers display-grid">
                        <label for="" class="text-uppercase">Services Provided</label>
                        <label for="" class="text-uppercase justify-self-end">price</label>
                        <label for="" class="text-uppercase justify-self-end">total</label>
                    </div>
                    <div class="billing-body">
                        <div class="single-service-bill display-grid">
                            <div>
                                <span class="services-provided-name">Contract Drafting</span>
                            </div>
                            <div>
                                <span class="amount price-amount">200</span>
                            </div>
                            <div>
                                <span class="amount sub-total-amount">200</span>
                            </div>
                        </div>
                        <div class="single-service-bill display-grid">
                            <div>
                                <span class="services-provided-name">Legal Consultation</span>
                            </div>
                            <div>
                                <span class="amount price-amount">300</span>
                            </div>
                            <div>
                                <span class="amount sub-total-amount">300</span>
                            </div>
                        </div>
                        <div class="single-service-bill display-grid">
                            <div>
                                <span class="services-provided-name">Document Review</span>
                            </div>
                            <div>
                                <span class="amount price-amount">400</span>
                            </div>
                            <div>
                                <span class="amount sub-total-amount">400</span>
                            </div>
                        </div>
                        <div class="single-service-bill display-grid">
                            <div>
                                <span class="services-provided-name">Complience Check</span>
                            </div>
                            <div>
                                <span class="amount price-amount">300</span>
                            </div>
                            <div>
                                <span class="amount sub-total-amount">300</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="incoice-check-out-section display-grid align-items-center">
                    <div class="terms-conditions">
                        <label for="" class="text-capitalize">terms & conditions</label>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    </div>
                    <div class="total-ammount">
                        <label for="" class="text-uppercase">Total Amount Due</label>
                        <span class="amount grand-total-amount d-block">1200</span>
                    </div>
                    
                    <div class="check-out-buttons d-flex justify-content-end mt-5">
                        <input type="submit" class="create" value="Send to Client">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>