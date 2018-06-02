<?php include "./controller/SearchEmployeeController.php" ?>
<!-- All Employees table -->
<section class="search-table">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 text-center">
				<h2 class="section__heading text-center color-text">All Employees</h2>
			</div> <!-- Section Heading -->
		</div> <!-- Heading Row -->

		<div class="row">
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div class="light-box table-box data-listing-box">
					
					<div class="row">
						<div class="col-xs-12 ph4 search-bar">
							<div class="form-group mv2">
								<input type="search" class="form-control search-bar__input" placeholder="Search employees by name, national ID, email, phone, or position" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<ul class="table__rows">
								<li class="table__row">
									<span class="row__cell row__cell--heading">Name</span>
							              <span class="row__cell row__cell--heading">National ID</span>
									<span class="row__cell row__cell--heading">Email</span>
									<span class="row__cell row__cell--heading">Phone</span>
									<span class="row__cell row__cell--heading">Position</span>
							                            <span class="row__cell row__cell--heading">Actions</span>
								</li>
							            <?php foreach($row as $record) { ?>
								<li class="table__row data-row" data-search="<?php echo $record["user_name"] ?><?php echo $record["national_id"] ?><?php echo $record["email"] ?><?php echo $record["phone"] ?><?php if($record["auth"]== 2) echo 'Manager'; else echo 'Employee' ;?>">
									<span class="row__cell" title="<?php echo $record["user_name"] ?>"><?php echo $record["user_name"] ?></span>
									<span class="row__cell" title="<?php echo $record["national_id"] ?>"><?php echo $record["national_id"] ?></span>
									<span class="row__cell" title="<?php echo $record["email"] ?>"><?php echo $record["email"] ?></span>
							              <span class="row__cell" title="<?php echo $record["phone"] ?>"><?php echo $record["phone"] ?></span>
									<span class="row__cell" title="<?php if($record["auth"]== 2) echo 'Manager'; else echo 'Employee' ;?>"><?php if($record["auth"]== 2) echo 'Manager'; else echo 'Employee' ;?></span>
									<span class="row__cell">
										<a href="#" class="btn btn-primary--custom mv1">View</a>
										<button value="<?php echo $record['id']; ?>" class="btn btn-danger--custom mv1 send_id" data-toggle="modal" data-target="#myModal"><i class="fa fa-times"></i> Delete</button>
									</span>
										<!-- The Modal -->
										<div class="modal fade" id="myModal">
											<div class="modal-dialog">
												<div class="modal-content">
											
												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title"><span class="warning">Warning<span></h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												
												<!-- Modal body -->
												<div class="modal-body">
													Are You Sure !<br>
													 You Want To Delete This Employee ? </br>
												</div>
												
												<!-- Modal footer -->
												<div class="modal-footer">
													<form method="post" action="?search-employees">
														<input type="hidden" id="get_id" name="id" value="" /> 
														<button type="submit" class="btn btn-danger--custom mv1"><i class="fa fa-times"></i> Delete</button>
														<a  class="btn btn-primary--custom" data-dismiss="modal" href="#">Close</a>
													</form>
												</div>
												
												</div>
											</div>
										</div>
									<!-- End Modal -->
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>
</section>