<?php include "./controller/bvnRegistrationController.php" ?>
<section class="">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 text-center">
				<h2 class="section__heading text-center color-text">BVN Registration</h2>
			</div> <!-- Section Heading -->
		</div> <!-- Heading Row -->

		<div class="row">
			<div class="col-xs-12">


				<div class="form-box">
					<ul class="nav nav-tabs nav-justified" id="main-tabs">
						<li class="active"><a data-toggle="tab" href="#generate-bvn-tab">Generate BVN</a></li>
						<li><a data-toggle="tab" href="#connect-bvn-tab">Connect BVN</a></li>
					</ul>
					
					<div class="tab-content">
						<div id="generate-bvn-tab" class="tab-pane fade in active">
							<div class="light-box form-box">
								<?php
								if ($message == "generate-success") {
									?>
									<div class="alert alert-success">
										<p><strong>BVN gererated and connected successfully!</strong></p>
										<hr>
                    <p class="w-40"><span class="pr3 w-20 dib">BVN</span> : <span class="pl3 fr"><?php echo $bvn_num ?></span></p>
									</div>
									<?php
								} else if ($message == "generate-error") {
									?>
									<div class="alert alert-danger">
										<strong>Oops, action failed!</strong> Please, fill the required fields!
									</div>
									<?php
								} else if ($message == "generate-exist") {
									?>
									<div class="alert alert-danger">
										<strong>Oops, action failed!</strong> This user already has a BVN, you may need to connect it to the account instead, click 'Connect BVN' above!
									</div>
					
								<?php } ?>
								<p>Generate a new BVN to an existing account</p>
								<form method="post" class="form-box__form">
									<div class="form-group">
										<i class="fa fa-address-card"></i>
										<input type="text" name="acc_num" id="acc_num"
											   placeholder="Enter the client's account number"
											   class="form-control">
									</div>
									<div class="form-group">
										<input type="submit" name="generate_bvn" value="Generate"
											   class="submit form-control btn btn-block btn-primary ">
									</div>
					
								</form>
							</div>
						</div>
						<div id="connect-bvn-tab" class="tab-pane fade">
							<div class="light-box form-box">
								<?php
								if ($message == "connect-success") {
									?>
									<div class="alert alert-success">
										<p><strong>BVN connected successfully!</strong></p>
									</div>
									<?php
								} else if ($message == "connect-error") {
									?>
									<div class="alert alert-danger">
										<strong>Oops, action failed!</strong> Please, fill the required fields!
									</div>
									<?php
								} else if ($message == "connect-not-exist") {
									?>
									<div class="alert alert-danger">
										<strong>Oops, action failed!</strong> The account number or BVN is incorrect!
									</div>
									<?php
								} else if ($message == "connect-connected") {
									?>
									<div class="alert alert-danger">
										<strong>Oops, action failed!</strong> The account number and BVN are already connected!
									</div>
					
								<?php } ?>
								<p>Connect an existing BVN to an existing account</p>
								<form method="post" class="form-box__form">
									<div class="form-group">
										<i class="fa fa-address-card"></i>
										<input type="text" name="acc_num" id="acc_num"
											   placeholder="Enter the client's account number"
											   class="form-control">
									</div>
									<div class="form-group">
										<i class="fa fa-address-card"></i>
										<input type="text" name="bvn_num" id="bvn_num"
											   placeholder="Enter the client's BVN"
											   class="form-control">
									</div>
									<div class="form-group">
										<input type="submit" name="connect_bvn" value="Connect"
											   class="submit form-control btn btn-block btn-primary ">
									</div>
					
								</form>
							</div>
					
						</div>
					
					</div>
				</div>
			</div>
		</div> <!-- New client Form -->
		<!-- Container -->
</section>
