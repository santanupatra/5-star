<?php ?>
<div id="content">
    <div class="inner">
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
      <hr />
       <div class="table-responsive">
            <div class="runs view large-9 medium-8 columns content">
                <h3> User Detail</h3>
                <table class="vertical-table table table-striped table-bordered table-hover">
                    <tr>
                        <th style="width:20%"><?php echo __('Full Name') ?></th>
                        <td style="width:80%"><?php echo h($users->full_name) ?></td>
                    </tr>

                    <tr>
                        <th><?php echo __('Contact Number') ?></th>
                        <td><?php echo $users->phone ?></td>
                    </tr> 

                    <tr>
                        <th><?php echo __('Email') ?></th>
                        <td><?php echo $users->email ?></td>
                    </tr>                    
                    
                                      
                   
                    <tr>
                        <th><?php echo __('Address') ?></th>
                        <td><?php echo $users->address ?></td>
                    </tr> 
                    
                    
<!--                     <tr>
                        <th><?php echo __('Preference') ?></th><td>
                        <?php foreach($preferencename as $dt){?>
                        <?php echo $dt->tag_name.',' ?>
                        <?php } ?>
                   </td></tr>
                    
                      <tr>
                        <th><?php echo __('Interest') ?></th><td>
                        <?php foreach($interesrname as $dt){?>
                        <?php echo $dt->interest_name.',' ?>
                        <?php } ?>
                   </td></tr>-->
                    
                    
                     
                    
                    
                    <tr>
                        <th><?php echo __('Image') ?></th>
                        <td> <img src="<?php echo $this->Url->build('/user_img/'.$users->pimg); ?>" width="240px" height="140px" /> </td>
                    </tr>                    
                    
                    <tr>
                        <th><?php echo __('Created On') ?></th>
                        <td><?php echo $users->created ?></td>
                    </tr>
                    
                    <tr>
                        <th><?php echo __('Modified On') ?></th>
                        <td><?php echo $users->modified ?></td>
                    </tr>
                    
                </table>
            </div>
        </div>
</div>
</div>