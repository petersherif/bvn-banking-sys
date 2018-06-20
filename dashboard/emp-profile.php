<?php include "./controller/EmpProfileController.php"; ?>
<!-- Client Profile -->
<section class="profile-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 component-wrapper">
				<div class="light-box light-box--small profile-box mb3">
					<?php
						if ($message == "success") {
						?>
						<div class="alert alert-success">
							<strong>Save successful!</strong> Profile updated.
						</div>
						<?php
						} else if ($message == "error1") {
							?>
							<div class="alert alert-danger">
								<strong>Oops, action failed!</strong> Please, fill the required fields!
							</div>
							<?php
						} else if ($message == "error2") {
							?>
							<?php
						} else if ($message == "exist") {
						?>
						<div class="alert alert-danger">
							<strong>Oops, action failed!</strong> user already exist!
						</div>

					<?php } ?>
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 profile__avatar-wrapper">
							<div class="profile__avatar">
								<?php if ($img) { ?>
									<img src="./assets/files/users/thumb/<?php echo $img; ?>" alt="<?php echo $name ?>"
										 class="mw-100"/>
								<?php } else { ?>
									<p class="user-name-initial"><?php echo strtoupper($name[0]); ?></p>
								<?php } ?>
							</div> <!-- profile avatar -->

							<div class="profile__avatar-caption avatar-caption tc">
								<h6 class="avatar-caption__heading"><?php echo ucfirst($name); ?></h6>
								<p><?php if ($type == 2) echo 'Manager'; else echo 'Employee'; ?></p>
							</div> <!-- profile avatar caption -->

							<div class="mv6">
								<p class="tc">Here could be a list of the client banks' names</p>
							</div>
						</div> <!-- profile avatar wrapper -->
						<div class="col-xs-12 col-sm-8 pv3 profile__info-wrapper form-box form-box--full-width">

							<div class="profile__info">
								<form method="post" class="form-box__form">

									<h4 class="info__group-title">Basic info</h4>

									<div class="form-group profile__form-group profile__static-info">
										<label class="info__title">National ID</label>
										<p class="info__data dib w-70"><?php echo $nat_id ?></p>
									</div>

									<div class="form-group profile__form-group">
										<label class="info__title" for="name">Name</label>
										<div class="relative dib w-70">
											<input type="text" name="full_name"
												   placeholder="Enter the Client's Full Name"
												   id="name" class="form-control editable-input" value="<?php echo $name; ?>">
										</div>
									</div>

									<div class="form-group profile__form-group">
										<label class="info__title" for="birthday">Birthday</label>
										<div class="relative dib w-70">
											<input type="date" name="birthday" placeholder="Enter the Client's Birthday"
												   id="birthday" class="form-control editable-input" value="<?php echo $birthday; ?>">
										</div>
									</div>

									<div class="form-group profile__form-group">
										<label class="info__title" for="address">Address</label>
										<div class="relative dib w-70">
											<input type="text" name="address" placeholder="Enter the Client's Address"
												   id="address" class="form-control editable-input" value="<?php echo $address; ?>">
										</div>
									</div>

									<div class="form-group profile__form-group">
										<label class="info__title" for="email">Email</label>
										<div class="relative dib w-70">
											<input type="text" name="email"
												   placeholder="Enter the Client's Email Address" id="email"
												   class="form-control editable-input" value="<?php echo $email; ?>">
										</div>
									</div>

									<div class="form-group profile__form-group">
										<label class="info__title" for="phone-num">Phone</label>
										<div class="relative dib w-70">
											<input type="text" name="phone"
												   placeholder="Enter the Client's Phone Number" id="phone-num"
												   class="form-control editable-input" value="<?php echo $phone; ?>">
										</div>
									</div>

									<div class="form-group profile__form-group mt4">
										<input type="hidden" id="id" name="id" value=""/>
										<button name="submit" type="submit"
												class="btn btn-primary--custom mr2 ml5">Save
										</button>
										<button type="button" class="btn btn-danger--custom" data-toggle="modal"
												value="<?php echo $id; ?>"
												data-target="#myModal">Delete Account
										</button>
										<p class="ml5">Click Save to keep your updates</p>
										<div class="modal fade" id="myModal">
											<div class="modal-dialog">
												<div class="modal-content">

													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title">
															<span class="warning">Hold a moment!<span>
															<button type="button" class="close" data-dismiss="modal">
																&times;
															</button>
														</h4>
													</div>

													<!-- Modal body -->
													<div class="modal-body">
														<p>
															Are you sure you? You cannot undo this action!
														</p>
													</div>

													<!-- Modal footer -->
													<div class="modal-footer">
														<form method="post" action="?search-clients">
															<input type="hidden" id="id" name="id"
																   value="<?php echo $id ?>"/>
															<button type="submit_delete" class="btn btn-danger--custom">
																<i
																		class="fa fa-times"></i> Delete
															</button>
															<a class="btn btn-primary--custom" data-dismiss="modal"
															   href="#">Close</a>
														</form>
													</div>

												</div>
											</div>
										</div>

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
