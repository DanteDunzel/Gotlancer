
@include('buyer.inc.buyer_header')   
<style>
    .pay-bill{
  border-bottom: 1px solid #efefef;
}
.payment-btns{
  /* padding: 0px 0px 0px 38px !important; */
}
.txt-bold{
  font-weight: 600;
}

#paymentMethod .modal-content{
  border-radius:0rem;
}

#paymentMethod .modal-md{
  margin: 6rem auto;
}
#paymentMethod .secondary-btn{
  background-color: #D7F9EF;
  color: #0BB783;
  box-shadow: none;
  font-weight: 500;
  font-size: 0.8em;
}

#paymentMethod .primary-btn {
  background-color: #0BB783;
  box-shadow: none;
  color: #fff;
  font-size: 0.8rem;
}
#paymentMethod .modal-title{
 font-size: 20px; 
}
#paymentMethod .modal-footer{
  border:none;
}
/* payment methods End*/

.bill-pay .main-heading{
  font-size: 1.5rem;
}
.bill-pay-bx{
  box-shadow: 0px 1px 9px -3px rgba(0, 0, 0, 0.25);
  background-color: #fff;
}
.bill-pay{
  border-bottom:unset;
}
.user-setting-content{
  background-color: #f3f6f9;
  box-shadow:unset;
}
.fa-tick{
  text-align: center;
  color: #0bb783;
  font-size: 20px;
  border-right: 1px solid #d2d2d2;
}

@media screen and (max-width: 320px){
  .payment-btns{
    text-align:center !important;
  }
  .pri-btn{
    margin-top:unset !important;
    margin-bottom: 15px;
  }
  .pr-btn{
    text-align:center !important;
  }
  #paymentMethod .form-inline input[type="text"]{
    width:45%;
  }
  .bill-msg .fa-shield-alt{
    float:none !important;
  }
  .bill-msg > div{
    text-align:center;
  }

}

.striped input{
  border: 1px solid #ececec; 
}
#paymentMethod label{
    color: #060606;
    font-size: 0.8em !important;
    font-weight: 600;
}
.payCard-continue{
  background-color: #0bb783;
    color: #fff;
    font-weight: 500;
    font-size: 0.875em;
    box-shadow: none !important;
    float: right;
}
.payCard-continue:hover{
  color: #fff !important;
}
#paymentMethod .fa-question-circle{
  color: #08af3b;
    margin: 0px 0px 0px 3px;
    padding: 2px;

}
#paymentMethod [type="radio"]:checked+label:after, #paymentMethod [type="radio"]:not(:checked)+label:after{

  border: 5px solid #0BB783;
}
#paymentMethod .bill-msg{
  background-color: #f4fff4;
}
#paymentMethod #frm-paypal p{
  font-size: 0.9em;
}
.pay-type{
  background-color: rgb(243, 246, 249);
}

#frm-paypal button{
    background-color: #029dde;
    color: #fff;
    font-size: 0.8em;
}

#frm-paypal button > span{
  font-size: 1.5em;
  font-style: italic;
  font-weight: 600;
}

.bill-msg .fa-shield-alt{
  color:#4caf50;
  font-size:2em;
}
</style>
        <div class="page-content " style="background: #F3F6F9;">
            <div class="container">
                <div class="user-setting py-4">
                    <div class="overlay"></div>
                    <div class="user-setting-sidebar">
                        <div class="user-setting-sidebar-head">
                            <div class="text-right">
                                <div class="dropdown">
                                    <button class="btn user-dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right border py-2 rounded-soft"><a
                                            class="dropdown-item" href="#!">Mute</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item"
                                            href="#!">Archive</a><a class="dropdown-item" href="#!">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="user-image">
                                    <i class="fas fa-user-alt"></i>
                                </div>
                                <div>
                                    <h3 class="main-heading">Apurba Das</h3>
                                    <h5 class="secondary-heading">Graphic Designer</h5>
                                    <div class="user-image-sm d-flex">
                                        <div class="active"><i class="fas fa-user-alt"></i></div>
                                        <div><i class="fas fa-user-alt"></i></div>
                                        <div><i class="fas fa-user-alt"></i></div>
                                        <div><i class="fas fa-user-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="user-verify d-flex align-items-center mt-4">
                                <div class="mr-2">
                                    <i class="fas fa-user-alt"></i>
                                </div>
                                <p>+917450044946</p>
                                <p class="ml-1 highlight">Verified</p>
                                <a href="" class="ml-5"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="user-verify d-flex align-items-center mb-4">
                                <div class="mr-2">
                                    <i class="fas fa-user-alt"></i>
                                </div>
                                <p>info@gotlancer.com</p>
                                <p class="ml-1">Verify Now</p>
                                <a href="" class="ml-5"><i class="fas fa-edit"></i></a>
                            </div>
                        </div>
                        <div class="user-setting-sidebar-links">
                            <a href="#" class="links-item"><span class="mr-4"><i
                                        class="fas fa-user-alt"></i></span>
                                <span>Billing
                                    Info</span></a>
                            <a href="#" class="links-item active"><span class="mr-4"><i
                                        class="fas fa-user-alt"></i></span>
                                <span>Billing Methods</span></a>        
                            <a href="#" class="links-item"><span class="mr-4"><i class="fas fa-user-alt"></i></span>
                                <span>Account Information</span></a>
                            <a href="#" class="links-item"><span class="mr-4"><i class="fas fa-user-alt"></i></span>
                                <span>Membership & Connects</span></a>
                            <a href="#" class="links-item"><span class="mr-4"><i class="fas fa-user-alt"></i></span>
                                <span>My Profile</span></a>
                            <a href="#" class="links-item"><span class="mr-4"><i class="fas fa-user-alt"></i></span>
                                <span>Profile Settings</span></a>
                            <a href="#" class="links-item"><span class="mr-4"><i class="fas fa-user-alt"></i></span>
                                <span>Tax Information</span></a>
                            <a href="#" class="links-item"><span class="mr-4"><i class="fas fa-user-alt"></i></span>
                                <span>Get Paid</span></a>
                            <a href="#" class="links-item"><span class="mr-4"><i class="fas fa-user-alt"></i></span>
                                <span>Password and Security</span></a>
                            <a href="#" class="links-item"><span class="mr-4"><i class="fas fa-user-alt"></i></span>
                                <span>Indentity Verification</span></a>
                            <a href="#" class="links-item"><span class="mr-4"><i class="fas fa-user-alt"></i></span>
                                <span>Notification Settings</span></a>

                        </div>
                    </div>
                    <div class="user-setting-sidebar-head sub-head">
                        <div class="text-right">
                            <div class="dropdown">
                                <button class="btn user-dropdown" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="fas fa-ellipsis-h"></i></button>
                                <div class="dropdown-menu dropdown-menu-right border py-2 rounded-soft"><a
                                        class="dropdown-item" href="#!">Mute</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a
                                        class="dropdown-item" href="#!">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="user-image">
                                    <i class="fas fa-user-alt"></i>
                                </div>
                                <div>
                                    <h3 class="main-heading">Apurba Das</h3>
                                    <h5 class="secondary-heading">Graphic Designer</h5>
                                    <div class="user-image-sm d-flex">
                                        <div class="active"><i class="fas fa-user-alt"></i></div>
                                        <div><i class="fas fa-user-alt"></i></div>
                                        <div><i class="fas fa-user-alt"></i></div>
                                        <div><i class="fas fa-user-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn burger-icon"><span></span></button>
                        </div>
                        <div class="user-verify d-flex align-items-center mt-4">
                            <div class="mr-2">
                                <i class="fas fa-user-alt"></i>
                            </div>
                            <p>+917450044946</p>
                            <p class="ml-1 highlight">Verified</p>
                            <a href="" class="ml-5"><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="user-verify d-flex align-items-center mb-4">
                            <div class="mr-2">
                                <i class="fas fa-user-alt"></i>
                            </div>
                            <p>info@gotlancer.com</p>
                            <p class="ml-1">Verify Now</p>
                            <a href="" class="ml-5"><i class="fas fa-edit"></i></a>
                        </div>
                    </div>
                    <div class="user-setting-content">
                        <div
                            class="user-setting-content-head d-flex align-items-center justify-content-between flex-wrap bill-pay">
                            <div>
                                <h3 class="main-heading">Billing & Payments</h3>
                                
                            </div>
                            
                        </div>
                        <div class="px-4 py-4 container">
                            <form action="">
                                <div class="row bill-pay-bx mb-5 py-3">
                                    
                                    <div class="col-md-1 col-sm-4 pt-2 fa-tick">
                                        <i class="fas fa-check-circle"></i>
                                   </div>
                                    <div class="col-md-11 col-sm-8">
                                         By default, you'll be charged a 3% processing fee per payment. Setup or edit your billing methods to opt into your payment processing preference below.
                                    </div>
                                </div>
                                <div class="row bill-pay-bx mb-5"> 
                                    <div class="col-md-12 px-5 col-sm-12" style="background-color: #f3f6f9;">
                                        <div class="d-flex h-100 py-4 pay-bill">
                                            <h5>Balance due</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7 my-4 px-5">
                                        Your balance due is <span class="txt-bold">$0.00 </span>
                                    </div>
                                    <div class="col-md-5 col-sm-5 payment-btns my-4 text-right">
                                        
                                        <button class="btn sec-btn" type="button" data-toggle="modal" data-target="#">Pay Now</button> 
                                    </div>
                                </div>
                                <div class="row bill-pay-bx mb-5">   
                                    <div class="col-md-7 col-sm-7 px-5" style="background-color: #f3f6f9;">
                                        <div class="d-flex h-100 py-4 pay-bill">
                                            <h5>Billing methods</h5>
                                           
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-5 col-sm-5  text-right mr-0 pr-btn" style="background-color: #f3f6f9;">
                                        <button class="btn pri-btn mt-4" type="button" data-toggle="modal" data-target="#paymentMethod">Add Method</button>
                                        
                                    </div>
                                    <div class="col-md-12 col-sm-12 py-3 px-5">
                                        <p class="txt-bold">You have not set up any billing methods yet.</p>
                                        <p>Set up ypur billing methods so you''ll be able to hire right away when you're ready.                                            
                                        </p>
                                        <p>A 3% proccessing fee will be assessed on all payments. <a href="#">Learn more</a></p>
                                    </div>
                                </div>    
                                    
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--/payment-method-popup-Start-->
    <div class="modal" id="paymentMethod">
        <div class="modal-dialog modal-md">
          <div class="modal-content ">
      
            <!-- Modal Header -->
            <div class="modal-header py-3 px-4 pt-4" style="background-color: #f3f6f9;">
              <h4 class="modal-title">Add a billing method</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body px-3 p-0"> 
                <div class="row mb-0 py-3 bill-msg">
                    <div class="col-lg-2 px-2 py-1">                        
                        <i class="fas fa-shield-alt float-right"></i>
                    </div>
                    <div class="col-lg-10 px-1 py-0">
                        <label for="payCard">Gotlancer Payment Protection: Only pay for work you authorize</label>
                    </div>
                </div>         
                <div class="row mb-3 py-4">  
                    <div class="col-lg-12 px-4">
                        <input type="radio" id="payCard" name="drone" value="">
                        <label for="payCard">Payment Card</label>
                    </div>
                    <div class="col-lg-12 px-4" id="frm-stripe">    <!--Example 4-->
                          <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                    <div class="form-group m-1">
                                        <label for="card_number">Card Number </label>
                                        <img class="col-lg-6 float-right mb-1 p-0" src="/images/cards.png">
                                        <input type="text" class="form-control" id="card_number">
                                      </div>
                                    </div>  
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6"><div class="form-group m-1">
                                        <label for="first_name">First Name </label>
                                        <input type="text" class="form-control" id="first_name">
                                      </div>
                                    </div>
                                    <div class="col-lg-6"><div class="form-group m-1">
                                        <label for="last_name">Last Name </label>
                                        <input type="text" class="form-control" id="last_name">
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group m-1">
                                        <label for="">Expires On</label><br>
                                        </div>
                                        <div class="form-group m-1 form-inline">
                                        <input type="text" class="form-control mr-4 col-lg-5" id="month">
                                        <input type="text" class="form-control col-lg-5" id="year">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group m-1">
                                        <label for="">Security Code </label>
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        <input type="text" class="form-control" id="sc_code">
                                      </div>
                                    </div>                                  
                                </div>
                                <button class="btn payCard-continue mt-4" type="button">Continue</button> 
                              
                          </form>                       
                    </div>
                </div>   
                
                <div class="row mb-0 pt-4 pb-5 pay-type">  
                    <div class="col-lg-12 px-4">
                        <input type="radio" id="payPal" name="drone" value=""
                           >
                        <label for="payPal"></label>
                        <img src="./images/paypal-logo.png" class="col-lg-3 mt-2 pl-0">
                    </div>
                    <div class="col-lg-12 px-4 d-none" id="frm-paypal">
                        <p class="px-1 py-4">You'll be redirected to PayPal to link a verified account</p>
                        <button class="with-paypal btn col-lg-7" type="button" >Pay with <span>PayPal</span></button> 
                    </div>
                </div>
              </div>
              
      
            <!-- Modal footer -->
            <!-- <div class="modal-footer px-4">
              <div class=""><a href="#" type="button" class="btn secondary-btn" data-toggle="modal" data-target="#">Cancel</a></div>
              <div class=""><a href="#" type="button" class="btn primary-btn" data-toggle="modal" data-target="#" style="min-width:80px">Save</a></div>
            </div> -->
      
          </div>
        </div>
      </div>
    <script>
        $( document ).ready(function() {
          $('input[name="drone"]').change(function(){
              if($(this).attr('id')=='payCard'){
                $('#frm-paypal').addClass('d-none').removeClass('d-block');
                
                $('#frm-stripe').addClass('d-block').removeClass('d-none');
                $('#frm-stripe').parents('.row').css('background-color','#fff');
                  $('#frm-paypal').parents('.row').css('background-color','#f3f6f9');
                
              }else{
               
                $('#frm-stripe').addClass('d-none').removeClass('d-block');
                  $('#frm-paypal').addClass('d-block').removeClass('d-none');
                  $('#frm-stripe').parents('.row').css('background-color','#f3f6f9');
                  $('#frm-paypal').parents('.row').css('background-color','#fff');
              }
          }) ;
          $('.with-paypal').on('click',function(e){
//            var stripe = Stripe('pk_test_nSyWvPnI7ob5wuEQmsByH1zC00eBc1m69C');
            console.log('Paypal Selected');
            $.ajax({
                url: '{{ url('') }}'+'/ab/payment/billing-method',
                type: "post",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    console.log(data);

                    // sessionid = data.session.id;
                    // window.location.href=data.rp.links[1].href;
                    
                    // window.location.href = 'b/pay-invoice-success-paypal';
                }
            });
          });
        });
    </script>
    @include('buyer.inc.buyer_footer')  