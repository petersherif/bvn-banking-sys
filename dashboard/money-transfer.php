<?php
include "./controller/TransferController.php";
global $message;
?>
<section class="money-trans-section">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h2 class="section__heading text-center color-text">Money Transfer</h2>
			</div> <!-- Section Heading -->
		</div> <!-- Heading Row -->
		<div class="row">
			<div class="col-xs-12">

				<div class="light-box form-box">
					<div class="alert alert-success hidden">

						<strong>Transfer successful!</strong>
					</div>
					<div class="alert alert-danger hidden">
						<strong>Oops, transfer failed!</strong> The lowest value is 50!
					</div>
					<?php
					if ($message == "success") {
						?>
						<div class="alert alert-success">
							<strong>Transfer successful!</strong> Your balance
							is <?php echo $newSenderBalance ?> EGP.
						</div>
						<?php
					} else if ($message == "error") {
						?>
						<div class="alert alert-danger">
							<strong>Oops, transfer failed!</strong> Please, fill the required fields!
						</div>
						<?php
					} else if ($message == "empty") {
						?>
						<div class="alert alert-danger">
							<strong>Oops, transfer failed!</strong> Sorry, insufficient balance, your balance is <?php echo $balance ?> EGP
						</div>
						<?php
					} else if ($message == "can") {
						?>
						<div class="alert alert-danger">
							<strong>Oops, transfer failed!</strong> you can't transfer to yourself, instead, use the <a href="home.php?deposit">deposit</a> page!
						</div>
						<?php
					} else if ($message == "exist") {
						?>
						<div class="alert alert-danger">
							<strong>Oops, transfer failed!</strong> This account number is incorrect, please check the account number and try again!
						</div>

					<?php } ?>


					<form method="post" class="form-box__form">

						<div class="form-group">
							<i class="fa fa-inbox"></i>
							<input type="text" placeholder="Enter the reciever account number" id="receiver_id"
								   name="receiver_num"
								   class="form-control account_number">
						</div>

						<div class="form-group">
							<i class="fa fa-money"></i>
							<input type="text" placeholder="Enter transfer amount"
								   name="amount"
								   id="amount"

								   class="form-control quantity">
						</div>

						<div class="form-group">
							<input type="submit" name="submit" value="Transfer"
								   class="submit form-control btn btn-block btn-primary">
						</div>

					</form>
				</div>
			</div> <!-- Money Transfer Form -->
		</div> <!-- Row -->
	</div> <!-- Container -->
</section>

