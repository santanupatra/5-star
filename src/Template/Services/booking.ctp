<?php
  //pr($service);
?>
<section class="detail-div">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
                    <h4 cla6s="text-upperuppercasecase text-left pt-md-2 pb-md-2 text-muted">Details :</h4>
                    <hr class="mt-md-2 mb-md-2">          
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-4">
          <div class="left-bar mb-4 bg-white p-md-3">
            <h6 class="text-uppercase text-left text-white btn-primary p-md-2"><?php echo $service->service_name;?></h6>  
            <div class="event-imgdiv text-center">
            <img src="<?php echo $this->request->webroot;?>service_img/<?php echo $service->image;?>" alt="" class="img-fluid w-100 card-img">
            </div>
            <hr>
            <p class="text-muted"><i class="ion-quote text-dark"></i> <?php echo $service->description;?>
            </p>                    
          </div>
        </div>

        <div class="col-lg-8 col-md-8">
          <div class="edit-pro p-3 p-lg-4">
            <h5 class="common-title mb-3 pb-2">Booking Details</h5>
            <form action="<?php echo $this->Url->build(["controller" => "Services","action" => "booking"]);?>" method="post">
             <input type="hidden" name="provider_id" value="<?php echo $service->provider_id;?>">
             <input type="hidden" name="service_id" value="<?php echo $service->id;?>">
             <input type="hidden" name="price" value="<?php echo $service->price;?>">
              <div class="table-responsive">
                <table class="table table-sm table-striped table-light">
                  <tbody>
                    <tr>
                      <td>
                        <h6 class="text-secondary text-capitalize mb-0 p-md-2">Name: </h6>
                      </td>
                      <td>
                        <div class="input-group input-group-sm">
                          <input type="text" name="name" value="<?php echo $user_details->full_name;?>" class="form-control form-control-sm rounded-0" placeholder="Name ...">
                            <div class="input-group-append">
                              <span class="input-group-text bdrs">
                                <i class="ion-document-text"></i>
                              </span>
                            </div>
                        </div>                        
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <h6 class="text-secondary text-capitalize mb-0 p-md-2">Email: </h6>
                      </td>
                      <td>
                        <div class="input-group input-group-sm">
                          <input type="text" name="email" value="<?php echo $user_details->email;?>" class="form-control form-control-sm rounded-0" placeholder="Email...">
                            <div class="input-group-append">
                              <span class="input-group-text bdrs">
                                <i class="ion-email"></i>
                              </span>
                            </div>
                        </div>                        
                      </td>
                    </tr>

                     <tr>
                      <td>
                        <h6 class="text-secondary text-capitalize mb-0 p-md-2">Phone: </h6>
                      </td>
                      <td>
                        <div class="input-group input-group-sm">
                          <input type="text" name="phone" value="<?php echo $user_details->phone;?>" class="form-control form-control-sm rounded-0" placeholder="Phone...">
                            <div class="input-group-append">
                              <span class="input-group-text bdrs">
                                <i class="ion-android-call"></i>
                              </span>
                            </div>
                        </div>                        
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <h6 class="text-secondary text-capitalize mb-0 p-md-2">Price</h6>
                      </td>
                      <td>
                        <div class="input-group input-group-sm">
                          $ <?php echo $service->price;?>
                        </div> 
                                              
                      </td>
                    </tr>

                    <tr>
                      <td colspan="2">
                        <div class="form-group mb-md-0">
                          <div class="row">                          
                            <div class="col-md-12">
                               <h5 class="common-title mb-3 pb-2">Payment Mathored</h5>
                               <div>
                                 <input type="radio" name="payment" value="C" checked="checked"> Cash Payment <!-- <img src="<?php echo $this->Url->build('/images/paypal.png'); ?>" style="width:150px"> -->
                               </div> 
                               <div>
                                 <input type="radio" name="payment" value="P"> Paypal <!-- <img src="<?php echo $this->Url->build('/images/paypal.png'); ?>" style="width:150px"> -->
                               </div> 
                            </div>
                          </div>  
                        </div>
                      </td>
                    </tr>
                    
                    <tr>
                      <td colspan="4">
                        <form action="#" class="form-inline mt-md-1">
                          <div class="form-group mb-md-0">
                            <button class="btn btn-primary text-capitalize mr-md-1 rounded-0" id="myButton">
                            Submit Here <i class="ion-cash pl-md-1"></i> </button>
                          </div>                        
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </section>