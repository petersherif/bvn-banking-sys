<!-- Client Profile -->
<section class="profile-section">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-3 col-md-offset-2">
				<div class="light-box light-box--small profile-box mb3">
					<div class="row">
						<div class="col-xs-12">
							<div class="profile__avatar">
							<!--	<img src="assets/img/avatar-placeholder.png" alt="" /> -->

 								<?php
                                    $user_id = $_SESSION['user_id'];
                                    $quer = "SELECT * From accounts WHERE user_id='$user_id'"; 
                                    $query = connect()->query($quer);
                                    while ($row = $query->fetch_object()) {
                                    	$acc_num= $row->acc_num;
                                    	$balance= $row->balance;
                                    }


                                      $quer2 = "SELECT * From users WHERE id='$user_id'"; 
                                    $query = connect()->query($quer2);
                                    while ($row = $query->fetch_object()) {
                                    	$name= $row->full_name;
                                    	$nat_id= $row->national_id;
                                    	$email= $row->email;
                                    	$img= $row->thumb;

                                    }
                                        ?>
                         
								<img src="./assets/files/users/thumb/<?php echo $img; ?>"" alt="<?php echo $name ?>" />
							</div>

							<div class="profile__basic-info" style="text-align: center;">
								<h6 class="basic-info__text"><?php echo $name;?></h6>
								<p></p>
							</div>
						</div>
					</div>
				</div>
			</div> 

			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-5 col-md-offset-0">
				<div class="light-box light-box--small profile-box">
					<div class="row">
						<div class="col-xs-12">

							<div class="profile__info">
								<p class="info__text"><span class="info__title">Acc No. :</span> <?php echo $acc_num ?></p>
								<p class="info__text"><span class="info__title">Nat ID :</span> <?php echo $nat_id ?></p>
								<p class="info__text"><span class="info__title">Email :</span> <?php echo $email ?></p>
								<p class="info__text"><span class="info__title">Balance :</span> <?php echo $balance ?></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="fr">
								<button class="btn btn-primary--custom">Edit</button>
								<button class="btn btn-danger--custom">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>