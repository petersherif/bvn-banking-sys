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
				<div class="light-box table-box all-members-box">
					
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
							            <?php $i=0; foreach($row as $record) { ?>
								<li class="table__row data-row" data-search="<?php echo $row[$i]["user_name"] ?><?php echo $row[$i]["national_id"] ?><?php echo $row[$i]["email"] ?><?php echo $row[$i]["phone"] ?><?php if($row[$i]["auth"]== 2) echo 'Manager'; else echo 'Employee' ;?>">
									<span class="row__cell" title="<?php echo $row[$i]["user_name"] ?>"><?php echo $row[$i]["user_name"] ?></span>
									<span class="row__cell" title="<?php echo $row[$i]["national_id"] ?>"><?php echo $row[$i]["national_id"] ?></span>
									<span class="row__cell" title="<?php echo $row[$i]["email"] ?>"><?php echo $row[$i]["email"] ?></span>
							              <span class="row__cell" title="<?php echo $row[$i]["phone"] ?>"><?php echo $row[$i]["phone"] ?></span>
									<span class="row__cell" title="<?php if($row[$i]["auth"]== 2) echo 'Manager'; else echo 'Employee' ;?>"><?php if($row[$i]["auth"]== 2) echo 'Manager'; else echo 'Employee' ;?></span>
									<span class="row__cell">
										<a href="#" class="btn btn-primary--custom btn-sm mh2 mv1">View</a>
										<a href="#" class="btn btn-danger--custom btn-sm mh2 mv1">Delete</a>
									</span>
								</li>
								<?php $i++; } ?>
							</ul>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>
</section>