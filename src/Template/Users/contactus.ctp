

<div class="clearfix"></div>

<section class="cus_section">
	<div class="cus-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">contact us</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>

<section class="cus-support">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-uppercase text-center h1">Customer Support</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="cus-leftdiv">
					<h1>Thank you for using Carvis!</h1>
					<p class="h3">Please complete the form below, so we can provide quick and efficient service. Alternatively, feel free to drop us an email at <a href="mailto:contact@carvis.com.my"> contact@carvis.com.my</a></p>
				</div>
			</div>

			<div class="col-md-6">
				<div class="cus-formdiv">
					<h5>Fill Here</h5>

					<form action="<?php echo $this->Url->build(["controller" => "Users","action" => "contactus"]);?>" method="post">
						<div class="form-group">
                                                    <input type="text" name="name" required="" class="form-control" placeholder="Name" />
						</div>

						<div class="form-group">
                                                    <input type="email" name="email" required="" class="form-control" placeholder="Email" />
						</div>

						<div class="form-group">
                                                    <input type="text" name="phone" required="" class="form-control" placeholder="Phone" />
						</div>

						<div class="form-group">
                                                    <input type="text" name="title" required="" class="form-control" placeholder="Title" />
						</div>

						<div class="form-group">
                                                    <textarea class="form-control" required="" name="message" rows="7" placeholder="Message"></textarea>
						</div>

						<div class="form-group">
                                                    <button type="submit" class="btn btn-success text-center text-capitalize">Send</button>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>

