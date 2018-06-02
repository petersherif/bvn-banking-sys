<!-- Client Profile -->
<section class="profile-section">
    <div class="container-fluid">

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

		        $birthday= $row->birthday;
		        $gender= $row->gender;
		        $address= $row->address;
						$phone= $row->phone;
	          $img= $row->thumb;
	    	}	
	      if (isset($_POST['edit-profile'])) {
	      	if (!empty($_POST['address']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
	      		$user_id=$_SESSION['user_id'];
	      		$new_address = $_POST['address'];
	      		$new_phone = $_POST['phone'];
	      		$new_email = $_POST['email'];
	      		$sql2 = "UPDATE `users` set email = '$new_email' , phone = '$new_phone' , address = '$new_address' WHERE id=$user_id ";
						$query1 = connect()->query($sql2);
						header("location:?client-profile");
						exit();
	      	}
	      }
	    ?>
                                        
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-3 col-md-offset-2">
					<div class="light-box light-box--small profile-box mb3">
						<div class="row">
							<div class="col-xs-12">
								<div class="profile__avatar">
									<?php if(false) { ?>
										<img src="./assets/files/users/thumb/<?php echo $img; ?>" alt="<?php echo $name ?>" />
									<?php } else { ?>
										<p class="user-name-initial"><?php echo strtoupper($name[0]); ?></p>
									<?php } ?>	
								</div>

								<div class="profile__basic-info" style="text-align: center;">
									<h6 class="basic-info__text"><?php echo ucfirst($name);?></h6>
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
									<button data-toggle="modal" data-target="#myModal" class="btn btn-primary--custom">Edit</button>
									<button class="btn btn-danger--custom">Delete</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- The Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content light-box form-box bw0">
	
			<!-- Modal Header -->
			<div class="modal-header pt0 ph0">
				<h4 class="modal-title dib"><span class="warning">Edit Client Data<span></h4>
				<button type="button" class="close icon-black o-80" data-dismiss="modal">&times;</button>
			</div>
			
			<form method="post" class="form-box__form" >
				<!-- Modal body -->
				<div class="modal-body ph0">

	        <div class="form-group">
	        	<label>Address</label>
	        	<div class="relative">
	            <i class="fa fa-map-marker"></i>
	            <input type="text" name="address" placeholder="Enter the Client's Address" id="address"
		                   class="form-control" value="<?php echo $address ;?>">
            </div>
	        </div>

	        <div class="form-group">
	        	<label>Email</label>
	        	<div class="relative">
	            <i class="fa fa-envelope"></i>
	            <input type="text" name="email" placeholder="Enter the Client's Email Address"
		                   id="email"
		                   class="form-control" value="<?php echo $email ;?>">
            </div>
	        </div>

	        <div class="form-group">
	        	<label>Phone</label>
	        	<div class="relative">
	            <i class="fa fa-phone"></i>
	            <input type="text" name="phone" placeholder="Enter the Client's Phone Number"
		                   id="phone-num"
		                   class="form-control" value="<?php echo $phone ;?>">
            </div>
	        </div>
				</div>
			
				<!-- Modal footer -->
				<div class="modal-footer pb0 ph0">
					<input type="hidden" id="get_id" name="id" value="" /> 
					<button name="edit-profile" type="submit" class="btn btn-primary--custom">Save</button>
					<a  class="btn btn-danger--custom" data-dismiss="modal" href="#">Close</a>
				</div>
			</form>
		
		</div>
	</div>
</div>
<!-- End Modal -->

