<?php include "./controller/SearchClientsController.php" ?>

<!-- All Clients table -->
<section class="search-table">
	<div class="container-fluid">

		<div class="row">
			<div class="col-xs-12 text-center">
				<h2 class="section__heading text-center color-text">All Clients</h2>
			</div> <!-- Section Heading -->
		</div> <!-- Heading Row -->

		<div class="row">
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div class="light-box table-box data-listing-box">

					<div class="row">
						<div class="col-xs-12 ph4 search-bar">
							<div class="form-group mv2">
								<input type="search" class="form-control search-bar__input"
									   placeholder="Search clients by name, account number, or national ID"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<ul class="table__rows">
								<li class="table__row">
									<span class="row__cell row__cell--heading">Name</span>
									<span class="row__cell row__cell--heading">Account Number</span>
									<span class="row__cell row__cell--heading">National ID</span>
									<span class="row__cell row__cell--heading">Balance</span>
									<span class="row__cell row__cell--heading">Actions</span>
								</li>
								<?php foreach ($row as $record) { ?>
									<li id="item-<?php $record['id'] ?>" class="table__row data-row"
										data-search="<?php echo $record["full_name"] . $record["acc_num"] . $record["national_id"] . $record["balance"] ?>">
										<span class="row__cell"
											  title="<?php echo $record["full_name"] ?>"><?php echo $record["full_name"] ?></span>
										<span class="row__cell"
											  title="<?php echo $record["acc_num"] ?>"><?php echo $record["acc_num"] ?></span>
										<span class="row__cell"
											  title="<?php echo $record["national_id"] ?>"><?php echo $record["national_id"] ?></span>
										<span class="row__cell"
											  title="<?php echo $record["balance"] ?>"><?php echo $record["balance"] ?> EGP</span>
										<span class="row__cell">
										  <a href="home.php?profile&id=<?php echo $record['id']; ?>"
												 class="btn btn-primary--custom btn-sm mh2 mv1">View</a>
											<button value="<?php echo $record['id']; ?>"
													class="btn btn-danger--custom btn-sm mh2 mv1 send_id"
													data-toggle="modal" data-target="#myModal"><i
														class="fa fa-times"></i> Delete</button>
										</span>


										<!-- The Modal -->
										<div class="modal fade" id="myModal">
											<div class="modal-dialog">
												<div class="modal-content">

													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title"><span class="warning">Warning<span></h4>
														<button type="button" class="close" data-dismiss="modal">
															&times;
														</button>
													</div>

													<!-- Modal body -->
													<div class="modal-body">
														Are You Sure !<br>
														You Want To Delete This Client ? </br>
													</div>

													<!-- Modal footer -->
													<div class="modal-footer">
														<form method="post" action="?search-clients">
															<input type="hidden" id="get_id" name="id" value=""/>
															<button type="submit" name='delete' class="btn btn-danger--custom"><i
																		class="fa fa-times"></i> Delete
															</button>
															<a class="btn btn-primary--custom" data-dismiss="modal"
															   href="#">Close</a>
														</form>
													</div>

												</div>
											</div>
										</div>
										<!-- End Modal -->
										</span>
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
