<section class="user-dashboard">
  <div class="container">
    <div class="row">
            <?php echo ($this->element('side_menu'));?>
            <div class="col-lg-9 col-md-8">
        <div class="edit-pro p-3 p-lg-4">
          <h5 class="common-title mb-3 pb-2">Request Details</h5>
                    
              <div id="js-gallery" class="gallery">
                  <div style="margin: 10px">               
                    
                    <div><strong>Name: </strong><?php echo $service['user']['full_name']; ?>  <br>  </div>
                    <div><strong>Email: </strong><?php echo $service['user']['phone']; ?></div>
                    <div><strong>Phone: </strong><?php echo $service['user']['email']; ?></div> 
                    <div><strong>Date of Booking: </strong><?php echo $service['event_date']; ?></div> 
                    <div><strong>Time of Booking: </strong><?php echo date('h:i A',strtotime($service['event_time'])); ?></div> 
                    <div><strong>No of Guest: </strong><?php echo $service['guest']; ?></div> 



                  </div>
                </div>
              
                <div class="table-responsive">
                  <table class="table table-sm table-bordered table-light">
                    <tbody>
                      <tr>
                        <td colspan="4">
                          <h6 class="text-secondary text-uppercase mb-0 p-md-1"><?php echo $service['service']['service_name']; ?></h6>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <h6 class="text-secondary text-capitalize mb-0 p-md-2"> Price </h6>
                        </td>
                        <td colspan="3" >
                     
                          USD <span id="show_price"><?php echo money_format("%.2n", $service->service->price );?></span><br>
                          EUR <span id="show_price"><?php echo money_format("%.2n", $service->service->eur_price );?></span><br>
                          COP <span id="show_price"><?php echo money_format("%.2n", $service->service->cop_price );?></span>
                        </td>
                      </tr>


                      <!-- <tr>
                        <td>
                          <h6 class="text-secondary text-capitalize mb-0 p-md-2">Event Location</h6>
                        </td>
                        <td colspan="3">
                          <?php echo $service->address;?>
                        </td>
                      </tr> -->

                     <form  method="post" action="<?php echo $this->Url->build(["controller" => "Services","action" => "requestconfirm",$service->id]);?>" enctype='multipart/form-data'>
                    

                     
                      <tr>
                        <td>
                          <h6 class="text-secondary text-capitalize mb-0 p-md-2">Enter Best Price ($)</h6>
                        </td>
                        <td colspan="3">
                          <input type="text" name="offer_price" value="<?php echo $service->price * $service['guest']; ?>">
                        </td>
                      </tr>
                     
                      <input type="hidden" name="service_name" value="<?php echo $service['service']['service_name']; ?>">
                      <input type="hidden" name="email" value="<?php echo $service['user']['email']; ?>">
                      
                      
                      <tr>
                        <td colspan="4">
                          
                           
                            <!-- <div class="form-group">
                              <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "booking",$service['id']]);?>" class="btn btn-primary text-capitalize rounded-0">
                               Book Now </a><br>
                            </div>  -->
                            <div class="form-group mb-0" style="text-align: right;">
                               <button type="submit" class="btn btn-primary btn-lg">Accept Request</button>
                            </div>
                            
                            
                          </form>                 

                           
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
