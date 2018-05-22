<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.7
*
-->

<!DOCTYPE html>
<html>

<head>
    
</head>

<body>
   <nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <!--a class="navbar-brand" href="#"><img src="../images/banner1.jpg" alt="" /></a-->
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav nav-pills navbar-right">
			  <li role="presentation"><a href="#">Home</a></li>
			  <li role="presentation"><a href="#">Features</a></li>
			  <li role="presentation"><a href="#">Landlord</a></li>
			  <li role="presentation"><a href="#">Tenant</a></li>
			  <li role="presentation"><a href="#">FAQ</a></li>
			  <li role="presentation"><a href="#">Contact</a></li>
			  <li role="presentation" class="active"><a href="#">Login</a></li>
			  <li role="presentation" class="active"><a href="#">Signup</a></li>
			</ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<section class="banner">
		<div class="banner-text">
			<h1>The Better Way to Rent</h1>
			<p>Modern property management for landlords, property managers, and renters.</p>
			<button class="btn btn-lg btn-green">GET STARTED</button>
		</div>
	</section>
	<section class="features">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<i class="ion-android-color-palette"></i>
					<h4>Dashboard - Bird Eye View</h4>
					<p>
						Lorem Ipsum is simply dummy text of the printing . Lorem Ipsum has been the industry's standard dummy text
					</p>
				</div>
				<div class="col-md-3 col-sm-6">
					<i class="ion-ios-home"></i>
					<h4>Property & Rentals</h4>
					<p>
						Lorem Ipsum is simply dummy text of the printing . Lorem Ipsum has been the industry's standard dummy text
					</p>
				</div>
				<div class="col-md-3 col-sm-6">
					<i class="ion-cash"></i>
					<h4>Invoicing and Payments</h4>
					<p>
						Lorem Ipsum is simply dummy text of the printing . Lorem Ipsum has been the industry's standard dummy text
					</p>
				</div>
				<div class="col-md-3 col-sm-6">
					<i class="ion-share"></i>
					<h4>Tenant Dashboard</h4>
					<p>
						Lorem Ipsum is simply dummy text of the printing . Lorem Ipsum has been the industry's standard dummy text
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="gray manage">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-6">
					<h2>Manage everything in one place</h2>
					<p>Our Dashboards provide both the Landlord and Tenant up to date account information using text and graphics.</p>
					<button class="btn btn-lg btn-green">GET STARTED</button>
				</div>
				<div class="col-md-7 col-sm-6">
					<img src="<?php echo $this->request->webroot; ?>img/manage.png" alt="" class="img-responsive"/>
				</div>
			</div>
		</div>
	</section>
	<section class="manage">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-6">
					<img src="<?php echo $this->request->webroot; ?>img/organised.png" alt="" class="img-responsive"/>
				</div>
				<div class="col-md-5 col-sm-6">
					<h2>Get better organised</h2>
					<p>Proptino is an easy to use, intuitive, cloud-based property management software tool. Designed by landlords, for landlords, its goal is simple - to help you get better organised!</p>
					<button class="btn btn-lg btn-sky">get Started Today</button>
				</div>
			</div>
		</div>
	</section>
	
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>


    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

            }, 1300);


            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [300,50,100],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [70,27,85],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        });
    </script>
</body>
</html>
