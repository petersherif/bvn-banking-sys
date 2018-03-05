<?php

include "./controller/MainController.php"
?>
<!-- BVN login form -->
<?php if (!isset($_SESSION['loggedbvn'])) { ?>

	<section class="login-section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="light-box light-box--small form-box">
						<form method="post" class="form-box__form">

							<div class="alert alert-danger hidden">
								<button class="close" data-close="alert"></button>
								<span>Dear Emp, Enter client BVN or account number   </span>
							</div>
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="text" placeholder="Enter client BVN or account number" name="bvn"
									   class="form-control account_number">
							</div>

							<div class="form-group">
								<input type="submit" name="submit" value="enter"
									   class="submit form-control btn btn-block btn-primary">
							</div>

						</form>
					</div>
				</div> <!-- BVN login Form -->
			</div> <!-- Row -->
		</div> <!-- Container -->
	</section>
<?php } ?>

<!-- Date and Time box, Currency Rate Graph and Table -->
<section class="dashboard-components">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-sm-offset-1 col-lg-3">
				<div class="row">
					<div class="col-xs-12">
						<div class="light-box light-box--small date-time-box">
							<p class="date"></p>
							<p class="time">
								<span class="hr"></span>
								<span class="min"></span>
								<span class="sec"></span>
								<span class="ampm"></span></p>
						</div>
					</div> <!-- Date and Time Box -->
				</div>

				<div class="row">
					<div class="col-xs-12">
						<div class="light-box light-box--small table-box cur-rate-box">
							<h4 class="table__heading">Currency Exchange Rate</h4>
							<ul class="table__rows">
								<li class="table__row">
									<span class="row__cell row__cell--heading">cur</span>
									<span class="row__cell row__cell--heading">Sell</span>
									<span class="row__cell row__cell--heading">Buy</span>
								</li>
								<li class="table__row">
									<span class="row__cell row__cell--heading">usd</span>
									<span class="row__cell">18.00</span>
									<span class="row__cell">17.60</span>
								</li>
								<li class="table__row">
									<span class="row__cell row__cell--heading">eur</span>
									<span class="row__cell">23.00</span>
									<span class="row__cell">20.83</span>
								</li>
								<li class="table__row">
									<span class="row__cell row__cell--heading">gdp</span>
									<span class="row__cell">23.40</span>
									<span class="row__cell">22.30</span>
								</li>
								<li class="table__row">
									<span class="row__cell row__cell--heading">cad</span>
									<span class="row__cell">16.40</span>
									<span class="row__cell">15.30</span>
								</li>
							</ul>
						</div>
					</div> <!-- Currency Rate Box -->
				</div>
			</div> <!-- Date and Time Box & Cur Rate Table -->

			<div class="col-xs-12 col-sm-6 col-lg-7">
				<div class="row">
					<div class="col-xs-12">
						<div class="light-box light-box--small rate-chart-box">
							<canvas id="rate-chart"></canvas>
						</div>
					</div>
				</div>
			</div> <!-- Cur Rate Chart -->
		</div>
	</div>
</section>