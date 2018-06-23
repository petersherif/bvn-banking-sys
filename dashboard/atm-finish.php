<!-- ATM withdraw successful -->
<section class="">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">

				<div class="light-box form-box form-box--full-width ba color-border-primary atm-receipt-box">
						
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
							<p class="pt2 tc">Do you need a receipt?</p>
							<div class="tc mt4">
								<a href="#" class="b mh4 yes-print-receipt">Yes!</a>
								<a href="#" class="b mh4 no-go-green">No, go green! :)</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="light-box form-box form-box--full-width ba color-border-primary atm-finish-box dn">
						
					<h2 class="text-center color-primary mb3 mt1">Thanks for using BVN ATM</h2>
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
							<p class="pt2 tc"><?php if(isset($_GET['operation'])){
								if($_GET['operation']==1) 
								echo "Withdraw ";
								else 
								echo "Deposit "; } ?>successful, Do you want to do another operation?</p>
							<div class="tc mt4">
								<a href="atm-home.php" class="b mh4">Yes!</a>
								<a href="atm-home.php?atmEndProcess" class="b mh4">No, eject the card!</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-sm-offset-2 atm__receipt-wrapper dn">
							<div class="atm__receipt-slot"></div>
							<div class="atm__receipt-paper ttu">
								<img src="assets/img/full-logo.png" alt="BVN" class="img-responsive w5 db center mb3" />
								<div class="receipt-paper__header">
									
								</div>
								<div class="receipt-paper__footer pt4">
									<p class="f5">Thanks for using BVN ATM service</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Container -->
</section>