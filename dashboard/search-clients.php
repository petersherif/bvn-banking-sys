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
				<div class="light-box table-box all-members-box">

					<div class="row">
						<div class="col-xs-12 ph4 search-bar">
							<div class="form-group mv2">
								<input type="search" class="form-control search-bar__input" placeholder="Search clients by name, account number, or national ID" />
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
								<?php $i=0; foreach($row as $record) { ?>
								<li class="table__row data-row" data-search="<?php echo $row[$i]["user_name"] ?><?php echo $row[$i]["acc_num"] ?><?php echo $row[$i]["national_id"] ?><?php echo $row[$i]["balance"] ?>">
									<span class="row__cell" title="<?php echo $row[$i]["user_name"] ?>"><?php echo $row[$i]["full_name"] ?></span>
									<span class="row__cell" title="<?php echo $row[$i]["acc_num"] ?>"><?php echo $row[$i]["acc_num"] ?></span>
									<span class="row__cell" title="<?php echo $row[$i]["national_id"] ?>"><?php echo $row[$i]["national_id"] ?></span>
									<span class="row__cell" title="<?php echo $row[$i]["balance"] ?>"><?php echo $row[$i]["balance"] ?></span>
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