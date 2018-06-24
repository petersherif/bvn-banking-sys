<?php
 $transactions_limit="";
 include "./controller/view-transactionsController.php" ?>
<!-- All Transactions table -->
<section class="search-table">
	<div class="container-fluid">

    <div class="row">
        <div class="col-xs-12 text-center">
            <h2 class="section__heading text-center color-text">All Transactions</h2>
        </div> <!-- Section Heading -->
    </div> <!-- Heading Row -->

		<div class="row">
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div class="light-box table-box data-listing-box view-transactions-box">

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
							<?php $i=0;
								 foreach($row as $record) 
								 { 
							?>
								<li class="table__row data-row">
									<span class="row__cell" title="<?php echo $row[$i]["date"] ;?>"><?php echo $row[$i]["date"] ;?></span>
									<span class="row__cell color-accent withdraw" title="<?php if($row[$i]["type"]==1) echo $row[$i]["amount"] ;?>"><?php if($row[$i]["type"]==1) echo $row[$i]["amount"] ;?></span>
									<span class="row__cell color-primary deposit" title="<?php if($row[$i]["type"]==0) echo $row[$i]["amount"] ;?>"><?php if($row[$i]["type"]==0) echo $row[$i]["amount"] ;?></span>
									<span class="row__cell color-accent withdraw" title="<?php if($row[$i]["type"]==1) echo $row[$i]["amount"] ;?>"><?php if($row[$i]["type"]==1) echo $row[$i]["amount"] ;?></span>
									<span class="row__cell color-primary deposit" title="<?php if($row[$i]["type"]==0) echo $row[$i]["amount"] ;?>"><?php if($row[$i]["type"]==0) echo $row[$i]["amount"] ;?></span>
								</li>
								<?php $i++; 
								 } ?>
							</ul>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>
</section>