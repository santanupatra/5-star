<section class="user-dashboard">
    <div class="container">
        <div class="row">      

            <div class="col-lg-12 col-md-8">


                <div class="row mt-5">
                    <div class="col-lg-8">
                        <h4>My Cart (<?php echo ($cart ? count($cart) : '0'); ?>)</h4>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group text-right">
                            <!--<button type="button" class="btn btn-secondary" onclick="gotoLists();">Shop More</button>-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <?php if ($cart) { ?>
                                <table class="table checkout-table">
                                    <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Name</th>
                                            <th class="">Price</th>
                                            <th class="">Date</th>
                                            <th class="">Time</th>
                                            <th class="">Quantity</th>
                                            <th class="text-right">Payable Price</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        
                                       // print_r($cart);exit;
                                        $totalPrice = 0;
                                        foreach ($cart as $product) {
                                          
                                        $sub = $product['service']['price'] * $product['guest'];
                                        $product_woner_id = $product['service_owner_id'];
                                            ?>

                                            <tr>

                                                <td>
                                                    <a href="<?php echo $this->request->webroot ; ?>services/details/<?php echo $product['service_id'] ;  ?>"><div class="prod-image" style="width:100px">
        <?php if (!empty($product['service']['image'])) { ?>
                                                                <img src="<?php echo $this->request->webroot ?>service_img/<?php echo $product['service']['image']; ?>" alt="" class="img-fluid">
                                                            <?php } else { ?>
                                                                <img src="<?php echo($this->request->webroot) ?>service_img/default.png" alt="" class="img-fluid">

                                                            <?php } ?>

                                                        </div></a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $this->request->webroot ; ?>services/details/<?php echo $product['service_id'] ;  ?>"><b><?php echo $product['service']['service_name']; ?></b></a>
        
                                                </td>

                                                <td>

                                                    <span >$<?php echo $product['service']['price']; ?></span>
                                                </td>
                                                
                                                 
                                                 <td>

                                                    <span ><?php echo $product['event_date']; ?></span>
                                                </td>
                                                 <td>

                                                    <span ><?php echo date('h:i A',strtotime($product['event_time'])); ?></span>
                                                </td>
                                                <td>

                                                    <span ><?php echo $product['guest']; ?></span>
                                                </td>
                                                <td class="text-right">

                                                    <h5>$<?php echo $sub; ?></h5>

                                                    <div class="">
                                                        <a href="<?php echo $this->request->webroot  ?>services/deletecart/<?php echo $product['id'] ;  ?>" class="fa fa-trash text-pink" onclick="if(confirm('Are you sure you want to delete')) { return true; }
                                        return false;">delete</a>

                                                    </div>


                                                </td>

                                            </tr>
        <?php
        $totalPrice = $totalPrice + $sub;
    }
    ?>

                                        <tr>
                                            <td colspan="10" class="text-right">

                                                <h5 class="font-weight-bold"> Total Payable: $<?php echo $totalPrice; ?> </h5>
                                                <div class="">
                                                    <button class="btn btn-primary"  onclick="gotobuy('<?php echo base64_encode($totalPrice) ?>')">Pay Now</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
<?php } else { ?>

                                <div class="alert alert-info">Sorry! No product available.</div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


   <script type="text/javascript">
     
 function gotobuy(price){
 
     window.location.href='<?php echo($this->request->webroot) ?>services/payment/'+price;
 

}

</script>
