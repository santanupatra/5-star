<script src="https://cdn.worldpay.com/v1/worldpay.js"></script>
<!-- <div class="container">
   <div class="payform-maindiv w-100 float-left mt-5 mb-5">
     <div class="row">
       <div class="col-md-10 m-auto">
         <div class="payform-innerdiv"> -->
<section class="detail-div">
   <div class="container">
   <div class="row">
      <div class="col-lg-12 col-md-12">
         <h4 cla6s="text-upperuppercasecase text-left pt-md-2 pb-md-2 text-muted">Details :</h4>
         <hr class="mt-md-2 mb-md-2">
      </div>
   </div>
   <div class="row">
      <div class="col-lg-6 col-md-6">
         <span class="py-2 text-dark h6 d-table"><strong>Saved Cards</strong></span>
         <form >
            <?php if($card_list) { 
               foreach($card_list as $crl){
               ?>
            <div class="form-group form-control">
               <div class="row">
                  <div class="col-md-1 col-2">
                     <input type="radio" name="token_id" value="<?php echo $crl['token_id']; ?>" class="radio_token d-inline-block"> 
                  </div>
                  <div class="col-md-11 col-10">
                     <?php echo $crl['card_number']; ?>
                  </div>
               </div>
            </div>
            <?php 
               }
               ?>      
            <div class="form-group form-control">
               <div class="row">
                  <div class="col-md-1 col-2">
                     <input type="radio" name="token_id" value="new" class="radio_token d-inline-block"> 
                  </div>
                  <div class="col-md-11 col-10">
                     New Card
                  </div>
               </div>
            </div>
            <?php
               } else{
               ?>
            <span> No saved card in your account.</span>
            <?php } ?>
         </form>
      </div>

      <div class="col-lg-6 col-md-6">
         <form method="post" action="<?php echo $this->Url->build(["controller" => "Services","action" => "worldpaypayment"]);?>" id="my-payment-form1">
            <div class="payment-errors text-danger text-uppercase"></div>
            <div class="py-2 text-dark h6 d-table"><strong>Checkout Details</strong></div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none;">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Site Code</label>
                    </div>

                    <div class="col-md-8 col-8">
                        <input type="text" id="site-code" name="site-code" value="N/A" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Name</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="name" class="form-control form-control-sm"  name="name" value="<?php echo $product['user']['full_name'] ; ?>" placeholder="Example Name" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none;">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Token</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="token" data-worldpay="token" value="" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>CVC</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="cvc" size="4" data-worldpay="cvc" placeholder="321" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Amount</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="amount" size="4" readonly="" name="amount" value="<?php echo $product['offer_price']; ?>" 
                    class="form-control form-control-sm"  />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none;">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Currency</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="currency" name="currency" value="USD"  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2 reusable-token-row" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Reusable Token</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="checkbox"  id="chkReusable" name="chkReusable" value="1" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2 reusable-token-row" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Service Id</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text"  name="service_id" value=" <?php echo $product['service_id']; ?>" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2 reusable-token-row" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>event date</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text"  name="event_date" value=" <?php echo $product['event_date']; ?>" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2 reusable-token-row" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>event time</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text"  name="event_time" value=" <?php echo $product['event_time']; ?>" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2 reusable-token-row" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Service Owoner Id</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text"  name="service_owner_id" value=" <?php echo $product['service_owner_id']; ?> " class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2 reusable-token-row" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Tempcart Id</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text"  name="temp_id" value=" <?php echo $product['temp_id']; ?> " class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="py-2 text-dark h6 d-table" style="display:none"><strong>Billing address</strong></div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <label>Address 1</label>
                    <input type="text" id="address1" name="address1" value="<?php echo $product['user']['address']; ?>" class="form-control form-control-sm"  />
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <label>Address 2</label>
                    <input type="text" id="address2" name="address2" value=" "  class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <label>City</label>
                    <input type="text" id="city" name="city" value="<?php echo $product['user']['city']; ?>" class="form-control form-control-sm"  />
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <label>State</label>
                    <input type="text" id="state" name="state" value="" class="form-control form-control-sm"  />
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <label>Postcode</label>
                    <input type="text" id="postcode" name="postcode" value="<?php echo $product['user']['postcode']?>"  class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <label>Telephone Number</label>
                    <input type="text" id="telephone-number" value="<?php echo $product['user']['phone']?>"  class="form-control form-control-sm" />
                </div>
            </div>

            <div class="py-2 text-dark h6 d-table"><strong>Billing address</strong></div>
            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>First Name</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-first-name" name="delivery-firstName" value="<?php echo explode(" ", $product['user']['full_name'])[0]; ?>"  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Last Name</label>
                    </div>
                    <div class="col-md-8 col-8">
                    <input type="text" id="delivery-last-name" name="delivery-lastName" value="<?php echo explode(" ", $product['user']['full_name'])[1]; ?>"  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Address 1</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-address1" name="delivery-address1" value="<?php echo $product['user']['address']; ?>"  
                        class="form-control form-control-sm"/>
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Address 2</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-address2" name="delivery-address2" value=" "  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>City</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-city" name="delivery-city" value="<?php echo $product['user']['city']; ?>"  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>State</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-state" name="delivery-state" value=" "  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Postcode</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-postcode" name="delivery-postcode" value="<?php echo $product['user']['postcode']?>"  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Telephone Number</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-telephone-number" name="delivery-telephoneNumber" value="<?php echo $product['user']['phone']?>"  
                        class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="py-2 text-dark h6 d-table" style="display:none"><strong>Other</strong></div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <label>Order Description</label>
                    <input type="text" id="description" name="description" value="Service Booking Payment"  class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <label>Statement Narrative</label>
                    <input type="text" id="statement-narrative" maxlength="24" name="statement-narrative" value="Statement Narrative"  class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Customer Order Code</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="customer-order-code" name="customer-order-code" value="A123"  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Order Code Prefix</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="code-prefix" name="code-prefix" value=""  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Order Code Suffix</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="code-suffix" name="code-suffix" value=""  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2 language-code-row" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Shopper Language Code</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="language-code" maxlength="2" data-worldpay="language-code" value="EN"  class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Shopper Email</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="shopper-email" name="shopper-email" value="<?php echo $service_owoner['email'];?>" 
                    class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2 swift-code-row apm" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Swift Code</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="swift-code" value="NWBKGB21" class="form-control form-control-sm"  />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2 shopper-bank-code-row apm" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label>Shopper Bank Code</label>
                    </div> 
                    <div class="col-md-8 col-8">
                        <input type="text" id="shopper-bank-code" value="RABOBANK"  class="form-control form-control-sm" />
                    </div> 
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2 large" style="display:none">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label class='left'>Customer Identifiers (json)</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <textarea id="customer-identifiers" rows="6" cols="30" name="customer-identifiers"></textarea>
                    </div>
                </div>
            </div>

            <input type="submit" id="place-order" value="Place Order" />
            <div class="token"></div>
         </form>





         <form method="post" action="<?php echo $this->Url->build(["controller" => "Services","action" => "worldpaypayment"]);?>" id="my-payment-form">
            <div class="payment-errors text-danger text-uppercase"></div>
            <div class="py-2 text-dark h6 d-table"><strong>Checkout Details</strong></div>
            <div class="form-row" style="display:none;">
               <label>Direct Order?</label>
               <select id="direct-order" name="direct-order">
                  <option value="1">Yes</option>
                  <option value="0" selected>No</option>
               </select>
            </div>
            <div class="form-row" style="display:none;">
               <label>Order Type</label>
               <select id="order-type" name="order-type">
                  <option value="ECOM" selected>ECOM</option>
                  <option value="MOTO">MOTO</option>
                  <option value="RECURRING">RECURRING</option>
                  <option value="APM">APM</option>
               </select>
            </div>
            <div class="form-row apm" style="display:none;">
               <label>APM</label>
               <select id="apm-name" data-worldpay="apm-name">
                  <option value="paypal" selected="selected">PayPal</option>
                  <option value="giropay">Giropay</option>
                  <option value="ideal">iDEAL</option>
               </select>
            </div>
            <div class="form-row no-apm" style="display:none;">
               <label>Site Code</label>
               <input type="text" id="site-code" name="site-code" value="N/A" />
            </div>
            <div class="form-row" style="display:none">
               <label>
               Name
               </label>
               <input type="text" id="name" name="name" data-worldpay="name" value="Example Name" />
            </div>
            <div class="form-row apm apm-url" style="display:none;">
               <label>
               Success URL
               </label>
               <input type="text" id="success-url" name="success-url" placeholder="<?php echo $redirect_url . '/success.php';?>"/>
            </div>
            <div class="form-row apm apm-url" style="display:none;">
               <label>
               Cancel URL
               </label>
               <input type="text" id="cancel-url" name="cancel-url" placeholder="<?php echo $redirect_url . '/cancel.php';?>"/>
            </div>
            <div class="form-row apm apm-url" style="display:none;">
               <label>
               Failure URL
               </label>
               <input type="text" id="failure-url" name="failure-url" placeholder="<?php echo $redirect_url . '/error.php';?>"/>
            </div>
            <div class="form-row apm apm-url" style="display:none;">
               <label>
               Pending URL
               </label>
               <input type="text" id="pending-url" name="pending-url" placeholder="<?php echo $redirect_url . '/pending.php';?>"/>
            </div>
            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">    
                    <div class="col-md-4 col-4">
                        <label><h6>Card Number</h6></label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="card" size="20" data-worldpay="number" value="4444333322221111" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
               <div class="row"> 
                    <div class="col-md-4 col-4">
                        <label><h6>CVC</h6></label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="cvc" size="4" data-worldpay="cvc" value="321" class="form-control"  />
                    </div>
               </div>
            </div>



            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4">
                        <label>Expiration (MM/YYYY)</label>
                    </div>
                    
                    <div class="col-md-8">  
                       <div class="row">   
                        <div class="col-md-5">
                           <select id="expiration-month" data-worldpay="exp-month" class="form-control">
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10" selected="selected">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                           </select>
                        </div>

                         <div class="col-md-1 text-center">  <span> / </span> </div>                       

                        <div class="col-md-6">
                           <select id="expiration-year" data-worldpay="exp-year" class="form-control">
                              <option value="2018" selected="selected">2018</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                              <option value="2028">2028</option>
                           </select>
                        </div>
                   </div>
                 </div>
              </div>
            </div>


            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <label><h6> Amount</h6></label>
                    </div> 

                    <div class="col-md-8 col-8">
                       <input type="text" id="amount" size="4" readonly="" name="amount" value="<?php echo $product['offer_price']; ?>" class="form-control"/>
                    </div>                                       
                </div>                
            </div>

            <div class="form-row" style="display:none;">
               <label>
               Currency
               </label>
               <input type="text" id="currency" name="currency" value="USD" />
            </div>
            <div class="form-row reusable-token-row" style="display:none">
               <label>Reusable Token</label>
               <input type="checkbox"  id="chkReusable" name="chkReusable" value="1"/>
            </div>
            <div class="form-row reusable-token-row" style="display:none">
               <label>Service Id</label>
               <input type="text"  name="service_id" value=" <?php echo $product['service_id']; ?>"/>
            </div>
            <div class="form-row reusable-token-row" style="display:none">
               <label>event date</label>
               <input type="text"  name="event_date" value=" <?php echo $product['event_date']; ?>"/>
            </div>
            <div class="form-row reusable-token-row" style="display:none">
               <label>event time</label>
               <input type="text"  name="event_time" value=" <?php echo $product['event_time']; ?>"/>
            </div>
            <div class="form-row reusable-token-row" style="display:none">
               <label>Service Owoner Id</label>
               <input type="text"  name="service_owner_id" value=" <?php echo $product['service_owner_id']; ?> "/>
            </div>
            <div class="form-row reusable-token-row" style="display:none">
               <label>Tempcart Id</label>
               <input type="text"  name="temp_id" value=" <?php echo $product['temp_id']; ?> "/>
            </div>
            <div class="header" style="display:none">Billing address</div>
            <div class="form-row" style="display:none">
               <label>
               Address 1
               </label>
               <input type="text" id="address1" name="address1" value="<?php echo $product['user']['address']; ?>" />
            </div>
            <div class="form-row" style="display:none">
               <label>
               Address 2
               </label>
               <input type="text" id="address2" name="address2" value=" " />
            </div>
            <div class="form-row" style="display:none">
               <label>
               City
               </label>
               <input type="text" id="city" name="city" value="<?php echo $product['user']['city']; ?>" />
            </div>
            <div class="form-row" style="display:none">
               <label>
               State
               </label>
               <input type="text" id="state" name="state" value="" />
            </div>
            <div class="form-row" style="display:none">
               <label>
               Postcode
               </label>
               <input type="text" id="postcode" name="postcode" value="<?php echo $product['user']['postcode']?>" />
            </div>
            <div class="form-row" style="display:none">
               <label>
               Telephone Number
               </label>
               <input type="text" id="telephone-number" value="<?php echo $product['user']['phone']?>" />
            </div>


            <div class="py-2 text-dark h6 d-table"><b>Billing address</b></div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
               <div class="row"> 
                    <div class="col-md-4 col-4">
                        <label>First Name</label>
                    </div>
                   <div class="col-md-8 col-8">
                    <input type="text" id="delivery-first-name" name="delivery-firstName" 
                    value="<?php echo explode(" ", $product['user']['full_name'])[0]; ?>" class="form-control form-control-sm" />
                </div>
              </div> 
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
               <div class="row"> 
                    <div class="col-md-4 col-4">                
                        <label>Last Name</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-last-name" name="delivery-lastName" 
                        value="<?php echo explode(" ", $product['user']['full_name'])[1]; ?>" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
               <div class="row"> 
                    <div class="col-md-4 col-4">                
                        <label>Address 1</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-address1"
                        name="delivery-address1" value="<?php echo $product['user']['address']; ?>" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
               <div class="row"> 
                    <div class="col-md-4 col-4">                
                        <label>Address 2</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-address2" name="delivery-address2" value=" " class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
               <div class="row"> 
                    <div class="col-md-4 col-4">                
                        <label>City</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-city" name="delivery-city" value="<?php echo $product['user']['city']; ?>" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
               <div class="row"> 
                    <div class="col-md-4 col-4">                
                        <label>State</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-state" name="delivery-state" value=" " class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
               <div class="row"> 
                    <div class="col-md-4 col-4">                
                        <label>Postcode</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-postcode" name="delivery-postcode" 
                        value="<?php echo $product['user']['postcode']?>" class="form-control form-control-sm" />
                    </div>
                </div>
            </div>

            <div class="form-group no-apm border border-top-0 border-left-0 border-right-0 mb-3 pb-2">
               <div class="row"> 
                    <div class="col-md-4 col-4"> 
                        <label>Telephone Number</label>
                    </div>
                    <div class="col-md-8 col-8">
                        <input type="text" id="delivery-telephone-number" name="delivery-telephoneNumber" value="<?php echo $product['user']['phone']?>" 
                        class="form-control form-control-sm" />
                    </div>
                </div>
            </div>


            <div class="header" style="display:none">Other</div>
            <div class="form-row" style="display:none">
               <label>
               Order Description
               </label>
               <input type="text" id="description" name="description" value="Service Booking Payment" />
            </div>
            <div class="form-row" style="display:none">
               <label>
               Statement Narrative
               </label>
               <input type="text" id="statement-narrative" maxlength="24" name="statement-narrative" value="Statement Narrative" />
            </div>
            <div class="form-row" style="display:none">
               <label>
               Customer Order Code
               </label>
               <input type="text" id="customer-order-code" name="customer-order-code" value="A123" />
            </div>
            <div class="form-row" style="display:none">
               <label>
               Order Code Prefix
               </label>
               <input type="text" id="code-prefix" name="code-prefix" value="" />
            </div>
            <div class="form-row" style="display:none">
               <label>
               Order Code Suffix
               </label>
               <input type="text" id="code-suffix" name="code-suffix" value="" />
            </div>
            <div class="form-row language-code-row" style="display:none">
               <label>Shopper Language Code</label>
               <input type="text" id="language-code" maxlength="2" data-worldpay="language-code" value="EN" />
            </div>
            <div class="form-row" style="display:none">
               <label>Shopper Email</label>
               <input type="text" id="shopper-email" name="shopper-email" value="<?php echo $service_owoner['email'];?>" />
            </div>
            <div class="form-row swift-code-row apm" style="display:none">
               <label>
               Swift Code
               </label>
               <input type="text" id="swift-code" value="NWBKGB21" />
            </div>
            <div class="form-row shopper-bank-code-row apm" style="display:none">
               <label>
               Shopper Bank Code
               </label>
               <input type="text" id="shopper-bank-code" value="RABOBANK" />
            </div>
            <div class="form-row large" style="display:none">
               <label class='left'>
               Customer Identifiers (json)
               </label>
               <textarea id="customer-identifiers" rows="6" cols="30" name="customer-identifiers"></textarea>
            </div>
            <input type="submit" id="place-order" value="Place Order" />
            <div class="token"></div>
         </form>
      </div>


   </div>
</section>
<!-- </div>
   </div>
   </div>
   </div>
   </div> -->
<script src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript"></script>
<script type="text/javascript">
   $( document ).ready(function() {
     $('#my-payment-form1').hide();
     $('.radio_token').click(function(){
   var token_id = $(this).val();
   if(token_id == 'new')
   {
     $('#token').val('');
   $('#my-payment-form1').hide();
     $('#my-payment-form').show();
   }
   else
   {
     $('#token').val(token_id);
   $('#my-payment-form1').show();
     $('#my-payment-form').hide();
   }
   
   });
   
   
         var showShopperBankCodeField = function() {
             $('#shopper-bank-code').attr('data-worldpay-apm', 'shopperBankCode');
             $('.shopper-bank-code-row').show();
         };
         var hideShopperBankCodeField = function() {
             $('#shopper-bank-code').removeAttr('data-worldpay-apm');
             $('.shopper-bank-code-row').hide();
         };
   
         var showSwiftCodeField = function() {
             $('#swift-code').attr('data-worldpay-apm', 'swiftCode');
             $('.swift-code-row').show();
         }
   
         var hideSwiftCodeField = function() {
             $('#swift-code').removeAttr('data-worldpay-apm');
             $('.swift-code-row').hide();
         }
   
         var showLanguageCodeField = function() {
             $('#language-code').attr('data-worldpay', 'language-code');
             $('.language-code-row').show();
         }
   
         var hideLanguageCodeField = function() {
             $('#language-code').removeAttr('data-worldpay');
             $('.language-code-row').hide();
         }
   
         var showReusableTokenField = function() {
             $('.reusable-token-row').show();
         }
   
         var hideReusableTokenField = function() {
             $('.reusable-token-row').hide();
         }
   
   
         if (!window['Worldpay']) {
             document.getElementById('place-order').disabled = true;
         }
         else {
   
   
             // Set client key
             Worldpay.setClientKey("T_C_f2c0aba4-5861-4b00-8fbb-d8924f90cf2d");
             // Get form element
           Worldpay.reusable = true;
           
             var form = $('#my-payment-form')[0];
             var _triggerWorldpayUseForm = function() {
                 Worldpay.useForm(form, function (status, response) {
                     if (response.error) {
                         Worldpay.handleError(form, $('#my-payment-form .payment-errors')[0], response.error);
                     } else if (status != 200) {
                         Worldpay.handleError(form, $('#my-payment-form .payment-errors')[0], response);
                     } else { 
                        document.getElementById('place-order').disabled = true;
                         $(':input[type="submit"]').prop('disabled', true);
                           $("#place-order").attr("disabled", "disabled");
                         var token = response.token;
                         Worldpay.formBuilder(form, 'input', 'hidden', 'token', token);
                         $('#my-payment-form .token').html("Your token is: " + token);
                         form.submit();
                     }
                 });
             };
             _triggerWorldpayUseForm();
   
             $('#chkReusable').change(function(){
                 if ($(this).is(':checked')) {
                     Worldpay.reusable = true;
                 }
                 else {
                     Worldpay.reusable = true;
                 }
             });
   
             $('#direct-order').on('change', function() {
                 var isDirectOrder = $(this).val();
                 if (isDirectOrder == 1) {
                     form.onsubmit = null;
   
                     //add names to card form parameters
                     $('#card').attr('name', 'card');
                     $('#cvc').attr('name', 'cvc');
                     $('#expiration-month').attr('name', 'expiration-month');
                     $('#expiration-year').attr('name', 'expiration-year');
                     $('#apm-name').attr('name', 'apm-name');
                     $('#swift-code').attr('name','swiftCode');
                     $('#shopper-bank-code').attr('name','shopperBankCode');
                     $('#language-code').attr('name','language-code');
                 }
                 else {
                     $('#card, #cvc, #expiration-month, #expiration-year, #apm-name, #swiftCode, #shopperBankCode, #language-code').removeAttr('name');
                     _triggerWorldpayUseForm();
                 }
             });
   
             $('#order-type').on('change', function () {
                 if ($(this).val() == 'APM') {
                     Worldpay.tokenType = 'apm';
                     $('.apm').show();
                     $('.no-apm').hide();
   
                     //initialize fields
                     hideShopperBankCodeField();
                     hideSwiftCodeField();
                     showReusableTokenField();
                     showLanguageCodeField();
   
                     //handle attributes
                     $('#card').removeAttr('data-worldpay');
                     $('#cvc').removeAttr('data-worldpay');
                     $('#expiration-month').removeAttr('data-worldpay');
                     $('#expiration-year').removeAttr('data-worldpay');
                     $('#country-code').attr('data-worldpay', 'country-code');
                 } else {
                     Worldpay.tokenType = 'card';
                     $('.apm').hide();
                     $('.no-apm').show();
                     $('#card').attr('data-worldpay', 'number');
                     $('#cvc').attr('data-worldpay', 'cvc');
                     $('#expiration-month').attr('data-worldpay', 'exp-month');
                     $('#expiration-year').attr('data-worldpay', 'exp-year');
                     $('#country-code').removeAttr('data-worldpay');
                 }
             });
   
             $('#apm-name').on('change', function () {
                 var _apmName = $(this).val();
   
                 hideSwiftCodeField();
                 hideShopperBankCodeField();
                 hideLanguageCodeField();
                 hideReusableTokenField();
   
                 $('#country-code').val('GB');
                 $('#currency').val('GBP');
   
                 switch (_apmName) {
                     case 'mistercash':
                         showReusableTokenField();
                         showLanguageCodeField();
                         $('#country-code').val('BE');
                     break;
                     case 'yandex':
                     case 'qiwi':
                         showReusableTokenField();
                         showLanguageCodeField();
                         $('#country-code').val('RU');
                     break;
                     case 'postepay':
                         showReusableTokenField();
                         showLanguageCodeField();
                         $('#country-code').val('IT');
                     break;
                     case 'alipay':
                         showReusableTokenField();
                         showLanguageCodeField();
                         $('#country-code').val('CN');
                     break;
                     case 'przelewy24':
                         showReusableTokenField();
                         showLanguageCodeField();
                         $('#country-code').val('PL');
                     break;
                     case 'sofort':
                         showReusableTokenField();
                         showLanguageCodeField();
                         $('#country-code').val('DE');
                     break;
                     case 'giropay':
                         Worldpay.reusable = false;
                         showSwiftCodeField();
                         $('#currency').val('EUR');
                     break;
                     case 'ideal':
                         //reusable token field is available for all apms (except giropay)
                         showReusableTokenField();
                          //language code enabled for all apms (except giropay)
                         showLanguageCodeField();
                          //shopper bank code field is only available for ideal
                         showShopperBankCodeField();
                     break;
                     default:
                         showReusableTokenField();
                         showLanguageCodeField();
                     break;
                 }
   
             });
         }
         $('#chkReusable').prop('checked', true);
     });
</script>
<script type="text/javascript">
   if (!window['Worldpay']) {
       document.getElementById('place-order').disabled = true;
   }
   else {
       // Set client key
       Worldpay.setClientKey("T_C_f2c0aba4-5861-4b00-8fbb-d8924f90cf2d");
       // Get form element
       var form = $('#my-payment-form1')[0];
       Worldpay.useForm(form, function (status, response) {
           if (response.error) {
               Worldpay.handleError(form, $('#my-payment-form1 .payment-errors')[0], response.error);
           } else if (status != 200) {
               Worldpay.handleError(form, $('#my-payment-form1 .payment-errors')[0], response);
           } else {
               var token = $('#token').val();
               Worldpay.formBuilder(form, 'input', 'hidden', 'token', token);
               form.submit();
           }
       }, true);
   
       $('#chkReusable').change(function(){
           if ($(this).is(':checked')) {
               Worldpay.reusable = true;
           }
           else {
               Worldpay.reusable = false;
           }
       });
   }
   $('#chkReusable').prop('checked', false);
</script>