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
      	if (!empty($_POST['name']) && !empty($_POST['birthday']) && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
      		$user_id=$_SESSION['user_id'];
      		$new_name = $_POST['name'];
      		$new_birthday = $_POST['birthday'];
      		$new_address = $_POST['address'];
      		$new_email = $_POST['email'];
      		$new_phone = $_POST['phone'];
      		$sql2 = "UPDATE `users` set full_name = '$new_name', birthday = '$new_birthday', address = '$new_address', email = '$new_email' , phone = '$new_phone'  WHERE id=$user_id";
					$query1 = connect()->query($sql2);
					header("location:?client-profile");
					exit();
      	}
      }
    ?>
                                      
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 component-wrapper">
				<div class="light-box light-box--small profile-box mb3">
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 profile__avatar-wrapper">
							<div class="profile__avatar">
								<?php if($img) { ?>
									<img src="./assets/files/users/thumb/<?php echo $img; ?>" alt="<?php echo $name ?>" class="mw-100" />
								<?php } else { ?>
									<p class="user-name-initial"><?php echo strtoupper($name[0]); ?></p>
								<?php } ?>
							</div> <!-- profile avatar -->

							<div class="profile__avatar-caption avatar-caption" style="text-align: center;">
								<h6 class="avatar-caption__heading"><?php echo ucfirst($name);?></h6>
							</div> <!-- profile avatar caption -->

							<div class="mv6">
								<p class="tc">Here could be a list of the client banks' names</p>
							</div>
						</div> <!-- profile avatar wrapper -->
						<div class="col-xs-12 col-sm-8 pv3 profile__info-wrapper form-box form-box--full-width">
							
							<div class="profile__info">
								<form method="post" class="form-box__form" >

									<h4 class="info__group-title">Client's info</h4>

									<div class="form-group profile__static-info">
					        	<label class="info__title">National ID</label>
					        	<p class="info__data dib w-70"><?php echo $nat_id ?></p>
					        </div>

									<div class="form-group">
					        	<label class="info__title" for="name">Name</label>
					        	<div class="relative dib w-70">
					            <i class="fa fa-user"></i>
					            <input type="text" name="name" placeholder="Enter the Client's Full Name" id="name" class="form-control" value="<?php echo $name ;?>">
				            </div>
					        </div>

					        <div class="form-group">
					        	<label class="info__title" for="birthday">Birthday</label>
					        	<div class="relative dib w-70">
					            <i class="fa fa-calendar"></i>
					            <input type="date" name="birthday" placeholder="Enter the Client's Birthday" id="birthday" class="form-control" value="<?php echo $birthday ;?>">
				            </div>
					        </div>
					
					        <div class="form-group">
					        	<label class="info__title" for="address">Address</label>
					        	<div class="relative dib w-70">
					            <i class="fa fa-map-marker"></i>
					            <input type="text" name="address" placeholder="Enter the Client's Address" id="address" class="form-control" value="<?php echo $address ;?>">
				            </div>
					        </div>

					        <div class="form-group">
					        	<label class="info__title" for="email">Email</label>
					        	<div class="relative dib w-70">
					            <i class="fa fa-envelope"></i>
					            <input type="text" name="email" placeholder="Enter the Client's Email Address" id="email" class="form-control" value="<?php echo $email ;?>">
				            </div>
					        </div>

					        <div class="form-group">
					        	<label class="info__title" for="phone-num">Phone</label>
					        	<div class="relative dib w-70">
					            <i class="fa fa-phone"></i>
					            <input type="text" name="phone" placeholder="Enter the Client's Phone Number" id="phone-num" class="form-control" value="<?php echo $phone ;?>">
				            </div>
					        </div>

									<div class="form-group mt4">
										<input type="hidden" id="get_id" name="id" value="" /> 
										<button name="edit-profile" type="submit" class="btn btn-primary--custom mr2 ml5">Save</button>
										<button class="btn btn-danger--custom">Delete Account</button>
									</div>

									<h4 class="info__group-title mt4">Client's account info</h4>

									<div class="form-group profile__static-info">
					        	<label class="info__title">Account#</label>
					        	<p class="info__data dib w-70"><?php echo $acc_num ?></p>
					        </div>

					        <div class="form-group profile__static-info balance">
					        	<label class="info__title">Balance</label>
					        	<p class="info__data dib w-70"><?php echo $balance ?></p>
					        </div>

								</form>
							</div> <!-- profile info -->

						</div> <!-- profile info wrapper -->
					</div> <!-- row -->
				</div> <!-- light box -->
			</div> <!-- componenet wrapper -->
		</div> <!-- main row -->
	</div> <!-- main container -->
</section>
