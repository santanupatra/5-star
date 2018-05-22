<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="UTF-8" />
        <?php $filePathf = WWW_ROOT . 'logo' .DS.$SiteSettings['site_favicon']; ?>
        <?php if ($SiteSettings['site_favicon'] != "" && file_exists($filePathf)) { ?>
            <?php echo $this->Html->meta('favicon.ico','logo/'.$SiteSettings['site_favicon'],array('type' => 'icon')); ?>
        <?php } else { ?>
            <?php echo $this->Html->meta('favicon.ico','img/unnamed.png',array('type' => 'icon')); ?>
        <?php } ?>        
        <title> <?php echo $SiteSettings['site_title'];?> | Admin Panel </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
        <!-- GLOBAL STYLES -->
    <?php echo  $this->Html->css('/plugins/bootstrap/css/bootstrap.css') ?>
    <?php echo  $this->Html->css('admin/main.css') ?>
    <?php echo  $this->Html->css('admin/theme.css') ?>
    <?php echo  $this->Html->css('admin/MoneAdmin.css') ?>
    <?php echo  $this->Html->css('/plugins/Font-Awesome/css/font-awesome.css') ?>
        <!-- END GLOBAL STYLES -->

        <!-- PAGE LEVEL STYLES -->
    <?php echo  $this->Html->css('/plugins/validationengine/css/validationEngine.jquery.css') ?>
    <?php echo  $this->Html->css('/plugins/dataTables/dataTables.bootstrap.css') ?>
    <?php echo  $this->Html->css('/plugins/Font-Awesome/css/font-awesome.css') ?>
    <?php echo  $this->Html->css('admin/bootstrap-fileupload.min.css') ?>
    <?php echo  $this->Html->css('admin/layout2.css') ?>    

    <?php echo  $this->Html->css('/plugins/flot/examples/examples.css') ?>
    <?php echo  $this->Html->css('/plugins/timeline/timeline.css') ?>
    <?php echo  $this->Html->css('admin/jquery-ui.css') ?> 

    <?php echo  $this->Html->css('/plugins/uniform/themes/default/css/uniform.default.css') ?>
    <?php echo  $this->Html->css('/plugins/inputlimiter/jquery.inputlimiter.1.0.css') ?>
    <?php echo  $this->Html->css('/plugins/chosen/chosen.min.css') ?>

    <?php echo  $this->Html->css('/plugins/colorpicker/css/colorpicker.css') ?>
    <?php echo  $this->Html->css('/plugins/tagsinput/jquery.tagsinput.css') ?>
    <?php echo  $this->Html->css('/plugins/daterangepicker/daterangepicker-bs3.css') ?>    

    <?php echo  $this->Html->css('/plugins/datepicker/css/datepicker.css') ?>
    <?php echo  $this->Html->css('/plugins/timepicker/css/bootstrap-timepicker.min.css') ?>
    <?php echo  $this->Html->css('/plugins/switch/static/stylesheets/bootstrap-switch.css') ?>
        <?php echo  $this->Html->css('bootstrap-slider') ?>
        <!-- END PAGE LEVEL  STYLES -->

        <!-- GLOBAL SCRIPTS -->
        
    <?php echo $this->Html->script('/plugins/jquery-2.0.3.min.js') ?>
    <?php echo $this->Html->script('/plugins/topup.js') ?>
    <?php echo $this->Html->script('/plugins/bootstrap/js/bootstrap.min.js') ?>
        <?php echo $this->Html->script('bootstrap-slider.js') ?>
    <?php echo $this->Html->script('/plugins/modernizr-2.6.2-respond-1.1.0.min.js') ?>
        <!-- END GLOBAL SCRIPTS -->

        <!-- PAGE LEVEL SCRIPT-->
    <?php echo $this->Html->script('/plugins/dataTables/jquery.dataTables.js') ?>
    <?php echo $this->Html->script('/plugins/dataTables/dataTables.bootstrap.js') ?>
    <?php echo $this->Html->script('/plugins/validationengine/js/jquery.validationEngine.js') ?>
    <?php echo $this->Html->script('/plugins/validationengine/js/languages/jquery.validationEngine-en.js') ?>
        
    <?php echo $this->Html->script('/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js') ?>

    <?php echo $this->Html->script('validationInit.js')?>
    <script>
        var base_url = '<?php echo $this->Url->build('/admin/',true); ?>';
        $(function () {
            formValidation();
        });
    </script>     

        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
                $('#tbl1').dataTable();
                $('#tbl2').dataTable();
                $('#tbl3').dataTable();
                $('#tbl4').dataTable();
                $('#tbl5').dataTable();
                $('#tbl6').dataTable();
            });
        </script>    
        
        
    <?php echo $this->Html->script('admin/jquery-ui.min.js') ?>
    <?php echo $this->Html->script('/plugins/uniform/jquery.uniform.min.js') ?>
    <?php echo $this->Html->script('/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js') ?>
    <?php echo $this->Html->script('/plugins/chosen/chosen.jquery.min.js') ?>

    <?php echo $this->Html->script('/plugins/colorpicker/js/bootstrap-colorpicker.js') ?>
    <?php echo $this->Html->script('/plugins/tagsinput/jquery.tagsinput.min.js') ?>
    <?php echo $this->Html->script('/plugins/validVal/js/jquery.validVal.min.js') ?>
    <?php echo $this->Html->script('/plugins/daterangepicker/daterangepicker.js') ?>
    <?php echo $this->Html->script('/plugins/daterangepicker/moment.min.js') ?>
    <?php echo $this->Html->script('/plugins/datepicker/js/bootstrap-datepicker.js') ?>
    <?php echo $this->Html->script('/plugins/timepicker/js/bootstrap-timepicker.min.js') ?>
    <?php echo $this->Html->script('/plugins/switch/static/js/bootstrap-switch.min.js') ?>
    <?php echo $this->Html->script('/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js') ?>
    <?php echo $this->Html->script('/plugins/autosize/jquery.autosize.min.js') ?>
    <?php echo $this->Html->script('/plugins/jasny/js/bootstrap-inputmask.js') ?>    
    <?php echo $this->Html->script('admin/formsInit.js') ?>

    <script> $(function () { formInit(); });</script>




        <!--END PAGE LEVEL SCRIPT-->

<?php echo $this->Html->script('/plugins/jasny/js/bootstrap-fileupload.js') ?>
        <!--END GLOBAL STYLES -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
        <style>
            .message.success{
                background: #5cb85c none repeat scroll 0 0;
                color: #fff;
                font-weight: bold;
                padding: 12px 10px;
                text-align: center;
                font-size : 18px;
            }
            .message.error{
                background: #fa693c none repeat scroll 0 0;
                color: #fff;
                font-weight: bold;
                padding: 12px 10px;
                text-align: center;
                font-size : 18px;
            }
        </style>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="padTop53" style=" padding-top:60px;">
<?php //echo $_SERVER['DOCUMENT_ROOT'];?>
        <!-- MAIN WRAPPER -->
        <div id="wrap"> 

            <!-- HEADER SECTION -->
            <div id="top">
                <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;"> <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" 
                                                                                                    class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle"> <i class="icon-align-justify"></i> </a> 
                    <!-- LOGO SECTION -->
                     <!--<img src="assets/img/unnamed.png" alt="" />--> </a> </header>
                    
                    <?php $filePathlo = WWW_ROOT . 'logo' .DS.$SiteSettings['site_logo']; ?>
                    <?php if ($SiteSettings['site_logo'] != "" && file_exists($filePathlo)) { ?>
                <img src="<?php echo $this->Url->build('/logo/'.$SiteSettings['site_logo']); ?>" style=" height:50px; margin-left:10px;" />
                    <?php } else { ?> 
                            No Logo Added
                    <?php } ?>                    
                    
                    <!-- END LOGO SECTION -->
                    <ul class="nav navbar-top-links navbar-right">

        <?php  //  #####################   #####################  #####################  ##################### ?>
                        <!-- MESSAGES SECTION -->
        <?php /* <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="label label-success">2</span> <i class="icon-envelope-alt"></i>&nbsp; 
        <i class="icon-chevron-down"></i> </a>
          <ul class="dropdown-menu dropdown-messages">
            <li> <a href="#">
              <div> <strong>John Smith</strong> <span class="pull-right text-muted"> <em>Today</em> </span> </div>
              <div>Lorem ipsum dolor sit amet, consectetur adipiscing. <br />
                <span class="label label-primary">Important</span> </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a href="#">
              <div> <strong>Raphel Jonson</strong> <span class="pull-right text-muted"> <em>Yesterday</em> </span> </div>
              <div>Lorem ipsum dolor sit amet, consectetur adipiscing. <br />
                <span class="label label-success"> Moderate </span> </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a href="#">
              <div> <strong>Chi Ley Suk</strong> <span class="pull-right text-muted"> <em>26 Jan 2014</em> </span> </div>
              <div>Lorem ipsum dolor sit amet, consectetur adipiscing. <br />
                <span class="label label-danger"> Low </span> </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a class="text-center" href="#"> <strong>Read All Messages</strong> <i class="icon-angle-right"></i> </a> </li>
          </ul>
        </li>
        <!--END MESSAGES SECTION --> 
        
        <!--TASK SECTION -->
        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="label label-danger">5</span> <i class="icon-tasks"></i>&nbsp; 
        <i class="icon-chevron-down"></i> </a>
          <ul class="dropdown-menu dropdown-tasks">
            <li> <a href="#">
              <div>
                <p> <strong> Profile </strong> <span class="pull-right text-muted">40% Complete</span> </p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> 
                  <span class="sr-only">40% Complete (success)</span> </div>
                </div>
              </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a href="#">
              <div>
                <p> <strong> Pending Tasks </strong> <span class="pull-right text-muted">20% Complete</span> </p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> 
                  <span class="sr-only">20% Complete</span> </div>
                </div>
              </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a href="#">
              <div>
                <p> <strong> Work Completed </strong> <span class="pull-right text-muted">60% Complete</span> </p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> 
                  <span class="sr-only">60% Complete (warning)</span> </div>
                </div>
              </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a href="#">
              <div>
                <p> <strong> Summary </strong> <span class="pull-right text-muted">80% Complete</span> </p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> 
                  <span class="sr-only">80% Complete (danger)</span> </div>
                </div>
              </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="icon-angle-right"></i> </a> </li>
          </ul>
        </li>
        <!--END TASK SECTION --> 
        
        <!--ALERTS SECTION -->
        <li class="chat-panel dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="label label-info">8</span> 
        <i class="icon-comments"></i>&nbsp; <i class="icon-chevron-down"></i> </a>
          <ul class="dropdown-menu dropdown-alerts">
            <li> <a href="#">
              <div> <i class="icon-comment" ></i> New Comment <span class="pull-right text-muted small"> 4 minutes ago</span> </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a href="#">
              <div> <i class="icon-twitter info"></i> 3 New Follower <span class="pull-right text-muted small"> 9 minutes ago</span> </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a href="#">
              <div> <i class="icon-envelope"></i> Message Sent <span class="pull-right text-muted small" > 20 minutes ago</span> </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a href="#">
              <div> <i class="icon-tasks"></i> New Task <span class="pull-right text-muted small"> 1 Hour ago</span> </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a href="#">
              <div> <i class="icon-upload"></i> Server Rebooted <span class="pull-right text-muted small"> 2 Hour ago</span> </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a class="text-center" href="#"> <strong>See All Alerts</strong> <i class="icon-angle-right"></i> </a> </li>
          </ul>
        </li> */ ?>
                        <!-- END ALERTS SECTION -->        
        <?php //  #####################   #####################  #####################  #####################   ?>


                    <!--ADMIN SETTINGS SECTIONS -->
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo $this->Url->build("/");?>admin/admins/edit/<?php echo $this->request->session()->read('Auth.User.id');?>"><i class="icon-user"></i> Edit Profile </a> </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "logout"]);?>"><i class="icon-signout"></i> Logout </a> </li>
                        </ul>
                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>
            </nav>
        </div>
        <!-- END HEADER SECTION -->

        <!-- MENU SECTION -->
        <?php echo $this->element('Admin/left_panel');?>
        <!--END MENU SECTION --> 

        <!--PAGE CONTENT -->
        <?php echo $this->Flash->render() ?>
        <?php echo  $this->Flash->render('success') ?>
	<?php echo  $this->Flash->render('error') ?>
	<?php echo  $this->fetch('content');?>
            <!--END PAGE CONTENT --> 
        </div>

        <!--END MAIN WRAPPER --> 

        <!-- FOOTER -->
        <div id="footer" style="margin-top: 15px">
            <p>&copy;  <?php echo $SiteSettings['site_title'];?> Admin </p>
        </div>
        <!--END FOOTER --> 

        <!-- GLOBAL SCRIPTS --> 

        <!-- END GLOBAL SCRIPTS --> 
    
    </body>

    <!-- END BODY -->
</html>