<?php

include "./controller/bvnLoginController.php";
include "./controller/MainController.php";

?>

<section class="dashboard-components">
	<div class="container-fluid">
		<div class="row">
			
			<?php if (!isset($_SESSION['loggedbvn'])) { ?>
			<div class="col-xs-12 col-sm-6 col-lg-5">
			<?php } else { ?>
			<div class="col-xs-12 col-sm-7 col-lg-8">
			<?php } ?>

				<?php if (!isset($_SESSION['loggedbvn'])) { ?>
					<!-- BVN login form -->
					<div class="light-box form-box">
						<?php if (isset($message)) { ?>
							<div class="alert alert-danger">
								<button class="close" data-close="alert"></button>
								<span>
									<?php echo $message; ?>
								</span>
							</div>
						<?php } ?>
						<div class="alert alert-danger length hidden">
							<strong>Oops, action failed!</strong> Please, enter a valid BVN number!
						</div>
						<form class="form-box__form" method="post">
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="text" placeholder="Enter client's BVN number" name="bvn" id="bvn"
									   class="form-control account_number">
							</div>

							<div class="form-group">
								<input type="submit" name="submit" value="enter"
									   class="submit form-control btn btn-block btn-primary">
							</div>
						</form>
					</div> <!-- BVN login Form -->

				<?php } else { ?>


					<div class="row">
						<div class="col-xs-12">
							<div class="light-box profile-box profile-box--dashboard">
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-0 profile__avatar-wrapper">
										<div class="row">
											<div class="col-xs-12">
												<div class="profile__avatar">
													<?php if ($img) { ?>
														<img src="./assets/files/users/thumb/<?php echo $img; ?>"
															 alt="<?php echo $name ?>" class="mw-100"/>
													<?php } else { ?>
														<p class="user-name-initial"><?php echo strtoupper($name[0]); ?></p>
													<?php } ?>
												</div> <!-- profile avatar -->
											</div>
										</div>

										<!-- Client accounts list -->
										<div class="row">
											<div class="col-xs-12">
												<div class="accounts-list">
													<form method="post" class="form-box form-box__form"
														  style="margin-bottom: 0;">
														<div class="form-group" style="margin-bottom: 0;">
															<i class="fa fa-university"></i>
															<select id="account_number" name="account_number"
																	class="form-control"
																	style="padding-top: 0;padding-bottom: 0;height: 30px;width: calc(100% - 37px);">

																<?php

																foreach ($row as $record) { ?>
																	<option value="<?php echo $record['acc_num'] ?>"><?php echo $record['acc_num'] ?></option>
																<?php } ?>

															</select>
														</div>
														<button name="go" type="submit"
																class="btn btn-primary--custom absolute top-0 right-1 mr2 h-100 bw0">
															Go
														</button>
													</form>
												</div>
											</div>
										</div>

									</div> <!-- profile avatar wrapper -->

									<div class="col-xs-10 col-xs-offset-1 col-lg-8 col-lg-offset-0 pv3 profile__info-wrapper form-box"
										 style="margin-bottom: 0;max-width: initial;">
										<div class="row">
											<div class="col-xs-12">
												<div class="profile__info">

													<div class="profile__avatar-caption avatar-caption">
														<h6 class="avatar-caption__heading"><?php echo ucfirst($name); ?></h6>
													</div> <!-- profile avatar caption -->

													<div class="form-group profile__form-group profile__static-info">
														<label class="info__title">BVN #</label>
														<p class="info__data dib w-70"><?php echo $bvn_num ?></p>
													</div>
													<?php if (isset($_SESSION['loggedAccount'])) { ?>

														<div class="form-group profile__form-group profile__static-info">
															<label class="info__title">Account#</label>
															<p class="info__data dib w-70"><?php echo $acc_num ?></p>
														</div>
														<div class="form-group profile__form-group profile__static-info">
															<label class="info__title">Bank</label>
															<p class="info__data dib w-70"><?php echo $banks_name ?></p>

														</div>
														<div class="form-group profile__form-group profile__static-info special-info--danger">
															<label class="info__title">Balance</label>
															<p class="info__data dib w-70"><?php echo $balance ?> EGP</p>
														</div>
													<?php } ?>

												</div> <!-- profile info wrapper -->
											</div>
										</div> <!-- row -->
										<?php if (isset($_SESSION['loggedAccount'])) { ?>
										<div class="row">
											<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-5 col-lg-offset-7">
												<a href="home.php?client-profile&id=<?php echo $_SESSION['user_id'] ?>"
												   class="btn btn-block btn-primary--custom">View Client's Profile</a>
											</div>
										</div> <!-- row -->
										<?php } ?>
									</div>
								</div> <!-- Brief Client Info -->
							</div>
						</div>
					</div>
					<?php if (isset($_SESSION['loggedAccount'])) { ?>

						<?php
						$transactions_limit = "LIMIT 3";
						$transfer_limit = "LIMIT 2";
						include "./controller/view-transactionsController.php";
						?>

						<div class="row">
							<div class="col-xs-12">
								<div class="light-box table-box data-listing-box view-transactions-box">
									<h4 class="table__heading">Last 5 transactions</h4>
									<div class="row">
										<div class="col-xs-12">
											<ul class="table__rows">
												<li class="table__row">
													<span class="row__cell row__cell--heading">Date</span>
													<span class="row__cell row__cell--heading">Withdraw</span>
													<span class="row__cell row__cell--heading">Deposit</span>
													<span class="row__cell row__cell--heading">Sent Money</span>
													<span class="row__cell row__cell--heading">Received Money</span>
												</li>
												<?php
													 foreach($row as $record) 
													 { 
												?>
													<li class="table__row data-row">
														<span class="row__cell" title="<?php echo $record["date"] ;?>"><?php echo $record["date"] ;?></span>
														<span class="row__cell color-accent withdraw" title="<?php if($record["type"]==1) { echo $record["amount"];} else { echo '-'; }?>"><?php if($record["type"]==1) { echo $record["amount"]; } else { echo '-'; }?></span>
														<span class="row__cell color-primary deposit" title="<?php if($record["type"]==0) { echo $record["amount"]; } else { echo '-'; }?>"><?php if($record["type"]==0) { echo $record["amount"]; } else { echo '-'; }?></span>
														<span class="row__cell color-accent withdraw" title="-">-</span>
														<span class="row__cell color-primary deposit" title="-">-</span>
													</li>

												<?php
													} 
													 foreach($row_transfer as $record_transfer) 
													 { 
												?>
													<li class="table__row data-row">
														<span class="row__cell" title="<?php echo $record_transfer["date"] ;?>"><?php echo $record_transfer["date"] ;?></span>
														<span class="row__cell color-accent withdraw" title="-">-</span>
														<span class="row__cell color-primary deposit" title="-">-</span>
														<span class="row__cell color-accent withdraw" title="<?php if($record_transfer["sender_id"]==$user_id) { echo $record_transfer["amount"]; } else { echo '-'; }?>"><?php if($record_transfer["sender_id"]==$user_id) { echo $record_transfer["amount"]; } else { echo '-'; }?></span>
														<span class="row__cell color-primary deposit" title="<?php if($record_transfer["sender_id"]!=$user_id) { echo $record_transfer["amount"]; } else { echo '-'; }?>"><?php if($record_transfer["sender_id"]!=$user_id) { echo $record_transfer["amount"]; } else { echo '-'; }?></span>
													</li>
												<?php } ?>
											</ul>
										</div>
									</div>
								</div> <!-- Last 5 transactions -->
							</div>
						</div>
					<?php } ?>
				<?php } ?>

			</div>

			<?php if (!isset($_SESSION['loggedbvn'])) { ?>
			<div class="col-xs-12 col-sm-6 col-lg-7">
			<?php } else { ?>
			<div class="col-xs-12 col-sm-5 col-lg-4">
			<?php } ?>
				<div class="row">
					<div class="col-xs-12">
						<div class="light-box date-time-box">
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
						<div class="light-box table-box cur-rate-box">
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
				
			</div> <!-- Date and Time Box, Cur Rate Table -->
		</div> <!-- Row -->
	</div> <!-- Container -->
</section>