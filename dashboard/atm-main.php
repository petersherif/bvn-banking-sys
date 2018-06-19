<?php 
include('./controller/atmMainController.php');
 ?>
<!-- ATM choose account to continue -->
<section class="">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">

				<div class="light-box form-box form-box--full-width ba color-border-primary">
					<?php
            if ($message == "error") {
                ?>
                <div class="alert alert-danger">
                    <strong>Oops, action failed!</strong> Please, select account number to continue!
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
							<p>Choose an account to continue</p>
							<form class="form-box__form" method="post">

								<?php
								if (isset($_SESSION['atm_bvn_id'])) {
									    $bvn_id = $_SESSION['atm_bvn_id']; 
									    $sql = "select accounts.id,accounts.acc_num,accounts.balance,banks.bank_name from accounts inner join bvn_acc on bvn_acc.acc_id=accounts.id inner JOIN banks on accounts.bank_id=banks.id WHERE bvn_acc.bvn_id='$bvn_id'";
									    $query = connect()->query($sql);
									    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
								}
								foreach ($row as $record) { ?>
									<div class="form-group">
										<input type="radio" value="<?php echo $record['acc_num'] ?>" name="account_number" id="<?php echo $record['acc_num'] ?>" class="" />
										<label for="<?php echo $record['acc_num'] ?>" class="">
											<span><?php echo $record['acc_num']; ?> - <?php echo $record['bank_name']; ?></span>
										</label>
									</div>
								<?php } ?>

								<div class="form-group">
									<input type="submit" name="select_acc" value="continue"
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