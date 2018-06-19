<?php 
include('./controller/atmMainController.php')
 ?>
<!-- ATM balance inquiry -->
<section class="">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">

				<div class="light-box form-box form-box--full-width ba color-border-primary">
						
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
							<p>Your balance is: <?php echo $balance; ?></p>
							<p class="pt2 tc">Do you want to do another operation?</p>
							<div class="tc mt4">
								<a href="atm-home.php" class="b mh4">Yes!</a>
								<a href="atm-home.php?atmEndProcess" class="b mh4">No, eject the card!</a>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- Login Form -->
		</div> <!-- Login Form Row -->
	</div> <!-- Container -->
</section>