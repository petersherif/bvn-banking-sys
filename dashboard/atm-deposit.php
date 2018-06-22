<?php include "./controller/atmMainController.php" ?>
<!-- ATM deposit custom amount -->
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
	                	<strong>Oops, deposit failed!</strong> Please, enter the required amount to deposit!
	              </div>
              <?php
          	}
          ?>
						
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
							<p>Insert the deposit cash</p>
							<form class="form-box__form" method="post">
                <div class="form-group">
                  <i class="fa fa-money"></i>
                  <input type="text" name="atm_deposit_amount" id="atm_deposit_amount" placeholder="Enter the deposit amount"
                           class="form-control quantity">
                </div>

								<div class="form-group">
									<input type="submit" name="deposit" value="deposit"
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