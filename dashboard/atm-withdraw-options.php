<?php include "./controller/atmMainController.php" ?>
<!-- ATM choose ammount to withdraw -->
<section class="">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">

				<div class="light-box form-box form-box--full-width ba color-border-primary">
					<?php
            if ($message == "success") {
            	$URL = "Location: atm-home.php?atm-finish";
							header($URL);
							exit;
            } else if ($message == "empty") {
                ?>
                <div class="alert alert-danger">
	                	<strong>Oops, withdraw failed!</strong> Please, enter the required amount to withdraw!
	              </div>
              <?php
          	} else if ($message == "error") {
          		?>
          		<div class="alert alert-danger">
          			<strong>Oops, withdraw failed!</strong> Sorry, insufficient balance, your balance is EGP<?php echo $balance ?>
              </div>
              <?php
        	} ?>
						
					<h2 class="text-center color-primary mb3 mt1">Welcome to BVN ATM</h2>
					<hr class="mt0 color-border-primary">
					<div class="row">
						<div class="absolute top-0 left-0 text-center w-100 h-100 o-10">
							<img src="assets/img/bvn-logo.png" alt="" class="h-100 o-70" draggable="false" />
						</div>
						<div class="col-xs-12 col-sm-3 col-sm-offset-0">
							<div class="row">
								<div class="col-xs-3 col-xs-offset-3 col-sm-12 col-sm-offset-0">
									<img src="assets/img/full-logo.png" alt="BVN" class="img-responsive mt3 mt5-l mb4" />
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-9">
							<form class="form-box__form" method="post">
								<div class="form-group">
									<input type="radio" value="100" name="atm_withdraw_amount" id="100" class="" />
									<label for="100" class="w4">
										<span>100</span>
									</label>
									<input type="radio" value="300" name="atm_withdraw_amount" id="300" class="" />
									<label for="300">
										<span>300</span>
									</label>
								</div>

								<div class="form-group">
									<input type="radio" value="500" name="atm_withdraw_amount" id="500" class="" />
									<label for="500" class="w4">
										<span>500</span>
									</label>
									<input type="radio" value="1000" name="atm_withdraw_amount" id="1000" class="" />
									<label for="1000">
										<span>1000</span>
									</label>
								</div>

								<div class="form-group">
									<input type="radio" value="2000" name="atm_withdraw_amount" id="2000" class="" />
									<label for="2000" class="w4">
										<span>2000</span>
									</label>
									<input type="radio" value="3000" name="atm_withdraw_amount" id="3000" class="" />
									<label for="3000">
										<span>3000</span>
									</label>
								</div>

								<p><a href="atm-home.php?atm-withdraw-custom">Or enter a custom amount</a></p>

								<div class="form-group">
									<input type="submit" name="withdraw" value="withdraw"
										   class="submit form-control btn btn-block btn-primary">
								</div>
							</form>
							<a href="atm-home.php?atmEndProcess">Cancel and eject the card!</a>
						</div>
					</div>
				</div>
			</div> <!-- Login Form -->
		</div> <!-- Login Form Row -->
	</div> <!-- Container -->
</section>