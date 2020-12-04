@extends('mainpages.mainfrontwithheader')


@section('css')
    <style type="text/css">
        .main {
            margin-left:30px;
            font-family:Verdana, Geneva, sans-serif, serif;
        }
        .text {
            float:left;
            width:180px;
        }
        .dv {
            margin-bottom:5px;
        }
        .bck_clr{
            background: #e4eef9 !important;
        }

    </style>
    @endsection
@section('content')
    <main class="page-content">
        <div class="container">
            <!-- Main Content -->
            <div class="user-content">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <div class="card mt-3">
                            <div class="card-header bg-light">
                                <h5>Add founds to your account</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-row mb-2">
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <div class="form-group">
                                            <label for="currency">Select Deposit Currency</label>
                                            <select class="form-control selectpicker" title="Select Deposit Currency"
                                                    id="currency">
                                                <option value="">United State Dollar (USD)</option>
                                                <option value="">United State Dollar (USD)</option>
                                            </select>
                                            <label class="fs--1 mt-2">Min deposit is <span class="min-limit">$00.00</span> and Max deposit is <span class="max-limit"></span>
                                                at a time.</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <div class="form-group mb-0">
                                            <label for="amount">How much balance do you need? <br>Type an amount more
                                                then <span class="min-limit">$00</span>. Cent (.) not allowed.</label>
                                            <div class="input-group mb-3 rounded-0 border-0">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-currency-symbol">$</span>
                                                </div>
                                                <input type="text" class="form-control withdraw-amount"
                                                       aria-label="Amount (to the nearest dollar)" placeholder="0"
                                                       id="amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header bg-light">
                                <h5>Add founds to your account</h5>
                            </div>
                            <div class="card-body">

                                <h6 class="mb-2">Payment method</h6>
                                <div class="form-row mb-2">
                                    <div class="col-12">
                                        @if(is_has_payment_method($allowedPaymentMthod,'Stripe'))


                                            <div class="custom-control custom-radio border-bottom">
                                                <input class="custom-control-input radio-collapse payment-method"
                                                       value="Stripe" type="radio" name="payment-method"
                                                       id="stripe-checkout" checked="checked">
                                                <label class="d-flex justify-content-end custom-control-label"
                                                       for="stripe-checkout">
                                                    <span class="d-inline-flex w-50 mb-2">Stripe Checkout</span>
                                                    <div
                                                        class="d-inline-flex w-50 align-items-center mr-auto justify-content-end">
                                                        <img src="/assets/images/creditcard1.jpg" alt=""
                                                             class="img-fluid float-right"></div>
                                                </label>
                                            </div>
                                        @endif
                                        @if(is_has_payment_method($allowedPaymentMthod,'Paypal'))
                                            <div class="custom-control custom-radio border-bottom">
                                                <input class="custom-control-input radio-collapse payment-method"
                                                       value="Paypal" type="radio" name="payment-method" id="paypal"
                                                       checked="checked">
                                                <label class="d-flex justify-content-end custom-control-label"
                                                       for="paypal">
                                                    <span class="d-inline-flex w-50 mb-2">Paypal</span>
                                                    <div
                                                        class="d-inline-flex w-50 align-items-center mr-auto justify-content-end">
                                                        <img src="/assets/images/creditcard2.jpg" alt=""
                                                             class="img-fluid float-right"></div>
                                                </label>
                                            </div>
                                        @endif
                                        @if(is_has_payment_method($allowedPaymentMthod,'Payumoney'))

                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input radio-collapse payment-method"
                                                       value="Payumoney" type="radio" name="payment-method" id="pay-u"
                                                       checked="checked">
                                                <label class="d-flex justify-content-end custom-control-label"
                                                       for="pay-u">
                                                    <span class="d-inline-flex w-50 mb-2">Payu (for indian users)</span>
                                                    <div
                                                        class="d-inline-flex w-50 align-items-center mr-auto justify-content-end">
                                                        <img src="/assets/images/PayUMoneyBanner.jpg" alt=""
                                                             class="img-fluid float-right"></div>
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <div class="card mt-3 pb-2">
                            <div class="card-header">
                                <h5>Order Summary</h5>
                            </div>
                            <div class="card-body bg-light">
                                <table class="table table-borderless fs--1 mb-0">
                                    <tbody>
                                    <tr class="border-bottom">
                                        <th class="pl-0 pt-0">Deposit amount</th>
                                        <th class="pr-0 text-right pt-0 deposit-amount">$0.00</th>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="pl-0">VAT/Tax (2.5%):</th>
                                        <th class="pr-0 text-right vat-tax">$0.00 USD</th>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="pl-0">Processing fee (0%):</th>
                                        <th class="pr-0 text-right processing-fee">$0.00 USD</th>
                                    </tr>
                                    <tr>
                                        <th class="pl-0 pb-0">Total
                                            <div class="text-400 font-weight-normal fs--2">(Incl. VAT)</div>
                                        </th>
                                        <th class="pr-0 text-right pb-0 total-include-tax">$0.00</th>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="bg-info d-block rounded mt-4 bck_clr ">
                                    <table class="table table-borderless fs--1 mb-0">
                                        <tbody>
                                        <tr>
                                            <th>Balance will add:</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <th>Balance will add:</th>
                                            <th class="text-right text-primary amount-will-added">+ $0.00</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p class="fs--1 mt-3 mb-0 text-center px-2">By continuing, you are agreeing to our
                                    <br><a href="#">terms and conditions</a>. Its an ontime payment.</p>
                                <button class="btn btn-lg btn-block btn-primary mt-3 px-5 btn-checkout"
                                        id="btn-checkout" type="button">Checkout
                                </button>
                                <p class="fs--1 mt-2 mb-0 text-center px-2">This page will redirect to checkout page.
                                    You could pay with your selected payment method.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5>Frequently asked questions</h5>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="py-2">
                                            <h6>What is Gotlancer proposal credit? </h6>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at </p>
                                        </div>
                                        <div class="py-2">
                                            <h6>How is Gotlancer proposal credit works? </h6>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at </p>
                                        </div>
                                        <div class="py-2">
                                            <h6>Can I get proposal credit refund after purchase?</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at </p>
                                        </div>
                                        <div class="py-2">
                                            <h6>How long Gotlancer proposal credit refund validity?</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="py-2">
                                            <h6>What is Gotlancer proposal credit? </h6>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at </p>
                                        </div>
                                        <div class="py-2">
                                            <h6>How is Gotlancer proposal credit works? </h6>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at </p>
                                        </div>
                                        <div class="py-2">
                                            <h6>Can I get proposal credit refund after purchase?</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at </p>
                                        </div>
                                        <div class="py-2">
                                            <h6>How long Gotlancer proposal credit refund validity?</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Content -->
        </div>
    </main>
    <form action="#" id="payment_form" style="display: none;">
        <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
        <input type="hidden" id="surl" name="surl" value="{{ url('payu-response') }}" />
        <div class="dv">
            <span class="text"><label>Merchant Key:</label></span>
            <span><input type="text" id="key" name="key" placeholder="Merchant Key" value="VMiCBPHZ" /></span>
        </div>

        <div class="dv">
            <span class="text"><label>Merchant Salt:</label></span>
            <span><input type="text" id="salt" name="salt" placeholder="Merchant Salt" value="UPMaqVgfab" /></span>
        </div>

        <div class="dv">
            <span class="text"><label>Transaction/Order ID:</label></span>
            <span><input type="text" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" /></span>
        </div>

        <div class="dv">
            <span class="text"><label>Amount:</label></span>
            <span><input type="text" id="amount-1" name="amount" placeholder="Amount" value="0.00" /></span>
        </div>

        <div class="dv">
            <span class="text"><label>Product Info:</label></span>
            <span><input type="text" id="pinfo" name="pinfo" placeholder="Product Info" value="P01,P02" /></span>
        </div>

        <div class="dv">
            <span class="text"><label>First Name:</label></span>
            <span><input type="text" id="fname" name="fname" placeholder="First Name" value="{{ Auth::user()->first_name }}" /></span>
        </div>

        <div class="dv">
            <span class="text"><label>Email ID:</label></span>
            <span><input type="text" id="email" name="email"  placeholder="Email ID" value="{{ Auth::user()->email }}" /></span>
        </div>

        <div class="dv">
            <span class="text"><label>Mobile/Cell Number:</label></span>
            <span><input type="text" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="" /></span>
        </div>

        <div class="dv">
            <span class="text"><label>Hash:</label></span>
            <span><input type="text" id="hash" name="hash" placeholder="Hash" value="" /></span>
        </div>


        <div><input type="submit" value="Pay" onclick="launchBOLT(); return false;" /></div>
    </form>
    <div id="alertinfo"></div>
@endsection

@section('scripts')

    <script src="https://js.stripe.com/v3/"></script>
    <script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
            color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>

    <script type="text/javascript"><!--
        $('#payment_form').bind('keyup blur', function(){
            $.ajax({
                url: 'gethash',
                type: 'get',
                data:{
                    key: $('#key').val(),
                    salt: $('#salt').val(),
                    txnid: $('#txnid').val(),
                    amount: $('#amount-1').val(),
                    pinfo: $('#pinfo').val(),
                    fname: $('#fname').val(),
                    email: $('#email').val(),
                    mobile: $('#mobile').val(),
                    udf5: $('#udf5').val()
                },
                contentType: "application/json",
                dataType: 'json',
                success: function(json) {
                    if (json['error']) {
                        $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
                    }
                    else if (json['success']) {
                        $('#hash').val(json['success']);
                    }
                }
            });
        });
        //-->
    </script>
    <script type="text/javascript">
            function launchBOLT()
            {
                bolt.launch({
                    key: $('#key').val(),
                    txnid: $('#txnid').val(),
                    hash: $('#hash').val(),
                    amount: $('#amount-1').val(),
                    firstname: $('#fname').val(),
                    email: $('#email').val(),
                    phone: $('#mobile').val(),
                    productinfo: $('#pinfo').val(),
                    udf5: $('#udf5').val(),
                    surl : $('#surl').val(),
                    furl: $('#surl').val(),
                    mode: 'dropout'
                },{ responseHandler: function(BOLT){
                        console.log( BOLT.response.txnStatus );
                        if(BOLT.response.txnStatus != 'CANCEL')
                            console.log('Response Bolth')
                        {
                            //Salt is passd here for demo purpose only. For practical use keep salt at server side only.
                            var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
                                '<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
                                '<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
                                '<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
                                '<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
                                '<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
                                '<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
                                '<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
                                '<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
                                '<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
                                '<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
                                '<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
                                '<input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token()}} \" />' +
                                '</form>';
                            var form = jQuery(fr);
                            jQuery('body').append(form);
                            form.submit();
                        }
                    },
                    catchException: function(BOLT){
                        alert( BOLT.message );
                    }
                });
            }
        //--
    </script>



    <script>
        $(document).ready(function (e) {

            var minAmount=10;
            var maxAmount=1000;

            var stripe = Stripe('pk_test_nSyWvPnI7ob5wuEQmsByH1zC00eBc1m69C');
            var intipaymentMethod = $('.payment-method:checked').val();
            getPaymentCurrency(intipaymentMethod)

            $(document).on('click', '.payment-method', function () {
                var paymentMethod = $(this).val();
                console.log(paymentMethod)
                getPaymentCurrency(paymentMethod)
            })
            var sessionid = '';

            function getPaymentCurrency(paymentMethod) {
                $.ajax({
                    url: HOST_URL + '/' + 'getpaymentcurrencies',
                    type: 'GET',
                    data: {'type': paymentMethod},
                    success: function (data) {
                        console.log(data);

                        $('#currency').html('');
                        var options = '';
                        for (var i = 0; i < data.curriencies.length; i++) {
                            options += '<option selected value="' + data.curriencies[i].currency.id + '">' + data.curriencies[i].currency.name + ' ' + data.curriencies[i].currency.iso_code + '</option>';
                        }
                        $('#currency').html(options);
                        $('#currency').trigger('change');


                    },
                    error: function (error) {
                        console.log(error.responseText);
                    }
                });
            }

            var currencySymbol = '';
            var iso_code = '';
            $('#currency').on('change', function (e) {
                var currencyid = $('#currency').val();

                $.ajax({
                    url: HOST_URL + '/getcurrencydetails',
                    type: "GET",
                    data: {'id': currencyid},
                    success: function (data) {
                        console.log(data);
                        currencySymbol = data.currency.symbol;
                        iso_code = data.currency.iso_code;
                        minAmount=data.limit.min_deposit;
                        maxAmount=data.limit.max_deposit;
                        $('.min-limit').html(currencySymbol+' '+maxAmount);
                        $('.max-limit').html(currencySymbol +' ' +maxAmount)
                        $('.input-currency-symbol').html(currencySymbol);

                        $('.deposit-amount').html(currencySymbol + ' ' + ('0.00'))

                        $('.vat-tax').html(currencySymbol + ' ' + ('0.00'));
                        $('.total-include-tax').html(currencySymbol + ' ' + ('0.00'));
                        $('.amount-will-added').html(currencySymbol + ' ' + ('0.00'));
                        $('.processing-fee').html(currencySymbol + ' ' + ('0.00'));
                    },
                    error: function (error) {

                    }

                })


            })


            $('.withdraw-amount').keypress(function (evt){

                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;


            });

            $('.withdraw-amount').on('keyup', function () {
                var amount = parseFloat($(this).val());
                var tax = 2.5;
                var processiongFee = 0;
                var notDecimal=/^\d+(\.\d+)?$/;


                if (amount) {

                    var totaltax = (tax / 100) * amount;
                    $('.deposit-amount').html(currencySymbol + ' ' + (amount.toFixed(2)))

                    $('.vat-tax').html(currencySymbol + ' ' + (totaltax.toFixed(2)));
                    $('.total-include-tax').html(currencySymbol + ' ' + ((amount + totaltax).toFixed(2)));
                    $('.amount-will-added').html(currencySymbol + ' ' + (amount.toFixed(2)));

                    $('#amount-1').attr('value',amount + totaltax);
                } else {

                    $('.deposit-amount').html(currencySymbol + ' ' + ('0.00'))

                    $('.vat-tax').html(currencySymbol + ' ' + ('0.00'));
                    $('.total-include-tax').html(currencySymbol + ' ' + ('0.00'));
                    $('.amount-will-added').html(currencySymbol + ' ' + ('0.00'));
                    $('#amount-1').attr('value','0');

                }
                console.log(totaltax)


                if (amount < parseFloat(minAmount)) {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                    $(this).parent().children().eq(2).remove();

                    $(this).parent().append('<div class="invalid-feedback has-error-min" style="display: inline-block;">Min Amount to Deposit is '+minAmount+' $ </div>');

                    return;
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                    $(this).parent().children().eq(2).remove();

                }

                if (amount > maxAmount) {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                    $(this).parent().children().eq(2).remove();

                    $(this).parent().append('<div class="invalid-feedback has-error-min" style="display: inline-block;">Max Amount to Deposit is '+maxAmount+' $ </div>');

                } else {
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                    $(this).parent().children().eq(2).remove();

                }
            });


            var checkoutButton = document.getElementById('btn-checkout');
            checkoutButton.addEventListener('click', function () {
                var currency_id = $('#currency').val();
                var tax = 2.5;
                var amount = $('.withdraw-amount').val();
                var payment_method = $('.payment-method:checked').val();
                var totaltax = (tax / 100) * amount;
                console.log(payment_method);
                if (amount < 10) {
                    alert('Min Amount is 10$');
                    return;
                }
                if (payment_method === 'Stripe') {
                    //Fetching Token And Sending to Stripe

                    $.ajax({
                        url: 'post-checkout',
                        type: "post",
                        data: {'currency_id': currency_id, 'amount': amount, 'tax': totaltax},
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (data) {
                            console.log(data);

                            sessionid = data.session.id;
                            stripe.redirectToCheckout({

                                // Make the id field from the Checkout Session creation API response
                                // available to this file, so you can provide it as argument here

                                sessionId: sessionid
                            }).then(function (result) {

                                // If `redirectToCheckout` fails due to a browser or network
                                // error, display the localized error message to your customer
                                // u
                            })

                        }

                    })
                }else if(payment_method==='Paypal'){



                    $.ajax({
                        url: 'post-paypal-checkout',
                        type: "post",
                        data: {'currency_id': currency_id, 'amount': amount, 'tax': totaltax},
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (data) {
                            console.log(data);

                            // sessionid = data.session.id;
                           window.location.href=data.rp.links[1].href;

                        }

                    })

                }else if(payment_method==='Payumoney'){
                    $.ajax({
                        url: 'gethash',
                        type: 'get',
                        data:{
                            'tax': totaltax,
                            key: $('#key').val(),
                            salt: $('#salt').val(),
                            txnid: $('#txnid').val(),
                            amount: $('#amount-1').val(),
                            pinfo: $('#pinfo').val(),
                            fname: $('#fname').val(),
                            email: $('#email').val(),
                            mobile: $('#mobile').val(),
                            udf5: $('#udf5').val()
                        },
                        contentType: "application/json",
                        dataType: 'json',
                        success: function(json) {
                            if (json['error']) {
                                $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
                            }
                            else if (json['success']) {
                                $('#hash').val(json['success']);
                                launchBOLT();
                            }
                        }
                    });
                }


            });

        })
    </script>




@endsection
