<?php include "./controller/SearchClientsController.php" ?>
<!-- All Transactions table -->
<section class="search-table">
	<div class="container-fluid">

    <div class="row">
        <div class="col-xs-12 text-center">
            <h2 class="section__heading text-center color-text">All Transactions</h2>
        </div> <!-- Section Heading -->
    </div> <!-- Heading Row -->

		<div class="row">
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div class="light-box table-box data-listing-box view-transactions-box">

					<div class="row">
						<div class="col-xs-12">
							<ul class="table__rows">
								<li class="table__row">
									<span class="row__cell row__cell--heading">Date</span>
									<span class="row__cell row__cell--heading">Description</span>
									<span class="row__cell row__cell--heading">Withdraw</span>
									<span class="row__cell row__cell--heading">Deposit</span>
								</li>
								
								<li class="table__row data-row">
									<span class="row__cell" title="15/12/2018">15/12/2018 22:39</span>
									<span class="row__cell" title="Description includes the ATM or Bank data (bank name and branch or atm id or location name) and the depositor data if any.">Description includes the ATM or Bank data (bank name and branch or atm id or location name) and the depositor data if any.</span>
									<span class="row__cell color-accent withdraw" title="2500">2500</span>
									<span class="row__cell color-primary deposit" title=""></span>
								</li>

								<li class="table__row data-row">
									<span class="row__cell" title="15/12/2018">15/12/2018 22:39</span>
									<span class="row__cell" title="Description includes the ATM or Bank data (bank name and branch or atm id or location name) and the depositor data if any.">Description includes the ATM or Bank data (bank name and branch or atm id or location name) and the depositor data if any.</span>
									<span class="row__cell color-accent withdraw" title="1500">1500</span>
									<span class="row__cell color-primary deposit" title=""></span>
								</li>

								<li class="table__row data-row">
									<span class="row__cell" title="10/11/2018">10/11/2018 22:39</span>
									<span class="row__cell" title="Description includes the ATM or Bank data (bank name and branch or atm id or location name) and the depositor data if any.">Description includes the ATM or Bank data (bank name and branch or atm id or location name) and the depositor data if any.</span>
									<span class="row__cell color-accent withdraw" title=""></span>
									<span class="row__cell color-primary deposit" title="6500">6500</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>
</section>