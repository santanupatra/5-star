

<?php ?>
<section class="details-top">
   <div class="container">
      <ul class="bredcumb">
         <li><a href="<?php echo $this->Url->build('/'); ?>">Home</a></li>
         <li class="active"><a href="">Payment</a></li>
      </ul>
   </div>
</section>
<section class="details-wrapper">
   <div class="container">
      <div class="row">
         <div class="col-md-9 col-sm-8">
            <div class="cards">
               <div class="card-box">
                  <div class="row checkout-holder">
                      <form method="post" id="shippingform" onsubmit="return valid()">
                        <div class="col-md-12">
                           <h3>Your Cart / Payment Confirmation</h3>
                           <hr>
                           <h4>Your Information</h4>
                           <div>
                              <div class="form-group">
                                  <input type="text" placeholder="First Name" id="exampleInputEmail3" class="form-control" required="" name="first_name">
                              </div>
                              <div class="form-group">
                                  <input type="text" placeholder="Last Name" id="exampleInputPassword3" class="form-control" required="" name="last_name">
                              </div>
                             <div class="form-group">
                                  <input type="text" placeholder="Email" id="exampleInputPassword3" class="form-control" required="" name="email">
                              </div>
                             <div class="form-group">
                                  <input type="text" placeholder="Phone" id="exampleInputPassword3" class="form-control" required="" name="phone">
                              </div>  
                               
                           </div>
                           <hr>
                        </div>
                        <div class="col-md-6">
                           <h4>Billing Address</h4>
                           <div class="form-group">
                               <input type="text" placeholder="Address 1" class="form-control" required="" name="billing_address1" id="billing_address1">
                           </div>
                           <div class="form-group">
                               <input type="text" placeholder="Address 2" class="form-control" name="billing_address2" id="billing_address2" >
                           </div>
                           <div class="form-group">
                               <input type="text" placeholder="Country" class="form-control" required="" id="billing_country" name="billing_country">

                           </div>
                           <div class="form-group">
                               <input type="text" placeholder="State" class="form-control" required="" id="billing_state" name="billing_state">

                           </div>
                           
                           <div class="form-group">
                               <input type="text" placeholder="City" class="form-control" required="" id="billing_city" name="billing_city">

                           </div>
                           <div class="form-group">
                               <input type="text" placeholder="Zip Code" class="form-control" name="billing_zip" id="billing_zip">
                           </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Shipping Address <span class="same"><input type="checkbox" value="1" id="same"> Same as Billing</span></h4>
                           <div class="form-group">
                               <input type="text" placeholder="Address 1" class="shipping form-control" required="" name="shipping_address1" id="shipping_address1">
                           </div>
                           <div class="form-group">
                               <input type="text" placeholder="Address 2" class="shipping form-control" name="shipping_address2" id="shipping_address2">
                           </div>
                            <div class="form-group">
                               <input type="text"  placeholder="Country" class="shipping form-control" required="" name="shipping_country" id="shipping_country">

                            </div>
                            <div class="form-group">
                               <input type="text"  placeholder="State" class="shipping form-control" required="" name="shipping_state" id="shipping_state">

                            </div>
                           <div class="form-group">
                               <input type="text"  placeholder="City" class="shipping form-control" required="" name="shipping_city" id="shipping_city">

                           </div>
                           <div class="form-group">
                               <input type="text" placeholder="Zip Code" class="shipping form-control" required="" name="shipping_zip" id="shipping_zip">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <hr>
<!--                           <h4>Credit Card Info</h4>-->
<!--                           <div class="form-inline">
                              <div class="form-group">
                                 <input type="text" placeholder="Credit card number" id="exampleInputEmail3" class="form-control">
                              </div>
                              <div class="form-group">
                                 <input type="text" placeholder="ID" id="exampleInputPassword3" class="form-control">
                              </div>
                              <div class="form-group">
                                 <input type="text" placeholder="CVV" id="exampleInputPassword3" class="form-control">
                              </div>
                           </div>-->
                           <hr>
                           <p class="text-right"><input type="submit" value="Submit Payment" class="btn btn-primary btn-lg"></p>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-4">
            <div class="cards">
               <div class="card-box">
                  <h4>Payment Summary</h4>
<!--                  <p><button type="button" class="btn btn-block btn-lg card-btn"><i class="fa fa-credit-card"></i> Card</button></p>
                      <p><button type="button" class="btn btn-block btn-lg paypal-btn"><i class="fa fa-paypal"></i> Paypal</button></p>-->
                  <div class=" table-responsive">
                      <table class="table">
                          <tr>
                              <td>Product:</td>
                              <td><?php echo $product->title; ?></td>
                          </tr>
                          
                           <tr>
                              <td>Quantity:</td>
                              <td>1</td>
                          </tr>
                          
                          <tr>
                              <td>Total:</td>
                              <td>$<?php echo number_format($product->price, 2, ',', ' ');?></td>
                          </tr>
                          
                          
                      </table>
                  </div>
                  
                  <h4>Policies</h4>
                  <p><input type="checkbox" id="shopping_policy"> Shopping Policy</p>
                  <p><input type="checkbox" id="legal_policy"> Legal Policy</p>
                  <hr>
                  <h4>Secure Payment</h4>
                  <p><img class="img-responsive" alt="" src="<?php echo $this->Url->build('/'); ?>images/paypal.png"></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php echo $this->Html->script('classie', array('inline' => false));?>
<script>
  $(document).ready(function(){
  $("#same").click(function(){
  if($(this).is(":checked"))    
  {
      $("#shipping_address1").attr("value",$("#billing_address1").val());
      $("#shipping_address2").attr("value",$("#billing_address2").val());
      $("#shipping_city").attr("value",$("#billing_city").val());
      $("#shipping_zip").attr("value",$("#billing_zip").val());
      $("#shipping_country").attr("value",$("#billing_country").val());
      $("#shipping_state").attr("value",$("#billing_state").val());
      $(".shipping").attr("readonly",true);
      

  }
  else
  {
            $(".shipping").attr("value","");
            $(".shipping").attr("readonly",false);
            

  }
  
  })    
  })  
   
   function valid()
   {
       var shopping_policy=$("#shopping_policy").is(":checked");
       var legal_policy=$("#legal_policy").is(":checked");
       if(!shopping_policy || !legal_policy)
       {
           $("#errormodal").modal("show");
           return false;

       }
       
       
       
   }
   
   function init() {
       window.addEventListener('scroll', function(e){
           var distanceY = window.pageYOffset || document.documentElement.scrollTop,
               shrinkOn = 300,
               header = document.querySelector("header");
           if (distanceY > shrinkOn) {
               classie.add(header,"smaller");
           } else {
               if (classie.has(header,"smaller")) {
                   classie.remove(header,"smaller");
               }
           }
       });
   }
   window.onload = init();
</script>
  
  <div class="modal fade" id="errormodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Error</h4>
        </div>
        <div class="modal-body">
          <p>
              <strong>Please accept shopping and Legal Policy</strong>.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

