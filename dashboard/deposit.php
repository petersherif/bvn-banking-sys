<?php
if (isset($_SESSION['loggedbvn'])) {
	include "./controller/DepositController.php";
} else {
	include "./controller/UnAuthDepositController.php";
	global $message;
} ?>
<section class="deposit-section">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 text-center">
				<h2 class="section__heading text-center color-text">Deposit</h2>
			</div> <!-- Section Heading -->
		</div> <!-- Heading Row -->

		<div class="row">
			<div class="col-xs-12">

				<div class="light-box form-box">
					<div class="alert alert-success hidden">
						<strong>Deposit successful!</strong>
					</div>
					<div class="alert alert-danger hidden">
						<strong>Oops, deposit failed!</strong> The lowest value is 50!
					</div>
					<?php if (!isset($_SESSION['loggedAccount'])) { ?>
					<?php
					if ($message == "success") {
						?>
						<div class="alert alert-success">
							<strong>Deposit successful!</strong>
						</div>
						<?php
					} else if ($message == "error") {
						?>
						<div class="alert alert-danger">
							<strong>Oops, deposit failed!</strong> Please, fill the required fields!
						</div>
						<?php
					} else if ($message == "exist") {
						?>
						<div class="alert alert-danger">
							<strong>Oops, deposit failed!</strong> This account number is incorrect, please check the
							account number and try again!
						</div>

					<?php } ?>
					<form method="post" class="form-box__form">
						<div class="form-group">
							<i class="fa fa-inbox"></i>
							<input type="text" name="acc_num"
								   placeholder="Enter the reciever account number"
								   id="acc_num"
								   class="form-control account_number">
						</div>
						<div class="form-group">
							<i class="fa fa-user"></i>
							<input type="text" name="sender_name"
								   placeholder="Enter the reciever full name"
								   id="sender_name"
								   class="form-control ">
						</div>
						<div class="form-group">
							<i class="fa fa-address-card"></i>
							<input type="text" name="nat_id"
								   placeholder="Enter the reciever National ID"
								   id="nat_id"
								   class="form-control account_number">
						</div>

						<div class="form-group">
							<i class="fa fa-money"></i>
							<input type="text" name="amount" placeholder="Enter deposit amount" id="amount"
								   class="form-control quantity">
						</div>

						<div class="form-group">
							<input type="submit" name="submit" value="Deposit"
								   class="submit form-control btn btn-block btn-primary">
						</div>
					</form>
				</div>
				<?php } else { ?>
					<?php
					if ($message == "success") {
						?>
						<div class="alert alert-success">
							<strong>Deposit successful!</strong> Your new balance
							is EGP<?php echo $newBalance ?>.
						</div>
						<?php
					} else if ($message == "error") {
						?>
						<div class="alert alert-danger">
							<strong>Oops, deposit failed!</strong> Please, enter the deposit amount!
						</div>
						<?php
					} ?>
					<form method="post" class="form-box__form">
						<div class="form-group">
							<i class="fa fa-money"></i>
							<input type="text" name="amount" placeholder="Enter the deposit amount" id="amount"
								   class="form-control quantity">
						</div>

						<div class="form-group">
							<input type="submit" name="deposit" value="Deposit"
								   class="submit form-control btn btn-block btn-primary">
						</div>
					</form>
				<?php } ?>


			</div>
		</div> <!-- Row -->
	</div> <!-- Container -->
</section>