<?php include "./controller/addClientController.php";
global $message;
?>
<section class="">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 text-center">
				<h2 class="section__heading text-center color-text">New Client</h2>
			</div> <!-- Section Heading -->
		</div> <!-- Heading Row -->

		<div class="row">
			<div class="col-xs-12">


				<div class="form-box">
					<ul class="nav nav-tabs nav-justified" id="main-tabs">
						<li class="active"><a data-toggle="tab" href="#new-client-tab">New Client</a></li>
						<li><a data-toggle="tab" href="#open-account-tab">Open Account</a></li>
					</ul>

					<div class="tab-content">
						<div id="new-client-tab" class="tab-pane fade in active">
							<div class="light-box form-box">
								<?php
								if ($message == "success") {
									?>
									<div class="alert alert-success">
										<p><strong>Action successful!</strong> Client successfully added!</p>
										<hr>
										<p class="w-70"><span class="pr3 w-30 dib">BVN</span> : <span
													class="pl3 fr"><?php echo $bvn_num ?></span></p>
										<p class="w-70"><span class="pr3 w-30 dib">Account</span> : <span
													class="pl3 fr"><?php echo $acc_num ?></span></p>
										<p class="w-70"><span class="pr3 w-30 dib">Card</span> : <span
													class="pl3 fr"><?php echo substr($card_num, 0, 4) ?><?php echo substr($card_num, 4, 4) ?><?php echo substr($card_num, 8, 4) ?><?php echo substr($card_num, 12, 4) ?></span>
										</p>
									</div>
									<?php
								} else if ($message == "error") {
									?>
									<div class="alert alert-danger">
										<strong>Oops, action failed!</strong> Please, fill the required fields!
									</div>
									<?php
								} else if ($message == "exist") {
									?>
									<div class="alert alert-danger">
										<strong>Oops, action failed!</strong> This client already exists!
									</div>

								<?php } ?>
								<p>Create a new client profile with BVN and a new account</p>
								<form method="post" class="form-box__form">

									<div class="form-group">
										<i class="fa fa-user"></i>
										<input type="text" name="full_name"
											   placeholder="Enter the client's full name"
											   id="full_name"
											   class="form-control">
									</div>

									<div class="form-group">
										<i class="fa fa-address-card"></i>
										<input type="text" name="national_id"
											   placeholder="Enter the client's National ID"
											   id="nat-id"
											   class="form-control">
									</div>

									<div class="form-group">
										<i class="fa fa-birthday-cake"></i>
										<input type="date" name="birthday" placeholder="Enter the client's birthday"
											   id="birthday"
											   class="form-control">
									</div>

									<div class="form-group">
										<i class="fa fa-transgender"></i>
										<select id="gender" name="gender" class="form-control">
											<option>Select the Client's Gender</option>
											<option>Male</option>
											<option>Female</option>
										</select>
									</div>

									<div class="form-group">
										<i class="fa fa-map-marker"></i>
										<input type="text" name="address" placeholder="Enter the client's address"
											   id="address"
											   class="form-control">
									</div>

									<div class="form-group">
										<i class="fa fa-at"></i>
										<input type="email" name="email" placeholder="Enter the client's email address"
											   id="email"
											   class="form-control">
									</div>

									<div class="form-group">
										<i class="fa fa-phone"></i>
										<input type="text" name="phone" placeholder="Enter the client's phone number"
											   id="phone-num"
											   class="form-control">
									</div>
									<div class="form-group">
										<i class="fa fa-lock"></i>
										<input type="password" name="pin_code" placeholder="Enter the client's pin code"
											   id="new_client_pin_code"
											   class="form-control">
									</div>

									<div class="form-group">
										<input type="submit" name="submit" value="add new client"
											   class="submit form-control btn btn-block btn-primary">
									</div>
								</form>
							</div>
						</div>
						<div id="open-account-tab" class="tab-pane fade">
							<div class="light-box form-box">
								<?php
								if ($message == "acc_success") {
									?>
									<div class="alert alert-success">
										<p><strong>Action successful!</strong> Account successfully opened!</p>
										<hr>
										<p class="w-70"><span class="pr3 w-30 dib">Account</span> : <span
													class="pl3 fr"><?php echo $acc_num ?></span></p>
										<p class="w-70"><span class="pr3 w-30 dib">Card</span> : <span
													class="pl3 fr"><?php echo substr($card_num, 0, 4) ?><?php echo substr($card_num, 4, 4) ?><?php echo substr($card_num, 8, 4) ?><?php echo substr($card_num, 12, 4) ?></span>
										</p>
									</div>
									<?php
								} else if ($message == "acc_error") {
									?>
									<div class="alert alert-danger">
										<strong>Oops, action failed!</strong> Please, fill the required fields!
									</div>
									<?php
								} else if ($message == "acc_exist") {
									?>
									<div class="alert alert-danger">
										<strong>Oops, action failed!</strong> This BVN number already has an account!
									</div>

								<?php } else if ($message == "acc_not_exist") {
									?>
									<div class="alert alert-danger">
										<strong>Oops, action failed!</strong> This BVN is incorrect, make sure the client has enrolled in the BVN system!
									</div>

								<?php } ?>
								<form method="post" class="form-box__form">
									<div class="form-group">
										<i class="fa fa-address-card"></i>
										<input type="text" name="bvn_num" id="bvn_num"
											   placeholder="Enter the client's BVN"
											   class="form-control">
									</div>
									<p class="mt3 mb2">Insert a 4-digit Pin Code for the credit card</p>
									<div class="form-group">
										<i class="fa fa-address-card"></i>
										<input type="text" name="pin_code" id="open_account_pin_code"
											   placeholder="Enter Pin code for the credit card"
											   class="form-control">
									</div>
									<div class="form-group">
										<input type="submit" name="createAccount" value="Open New Account"
											   class="submit form-control btn btn-block btn-primary">
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
