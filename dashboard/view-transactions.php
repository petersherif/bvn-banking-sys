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
							<?php
								 foreach($row as $record) 
								 { 
							?>
								<li class="table__row data-row">
									<span class="row__cell" title="<?php echo $record["date"] ;?>"><?php echo $record["date"] ;?></span>
									<span class="row__cell color-accent withdraw" title="<?php if($record["type"]==1) { echo $record["amount"];} else { echo '-'; }?>"><?php if($record["type"]==1) { echo $record["amount"]; } else { echo '-'; }?></span>
									<span class="row__cell color-primary deposit" title="<?php if($record["type"]==0) { echo $record["amount"]; } else { echo '-'; }?>"><?php if($record["type"]==0) { echo $record["amount"]; } else { echo '-'; }?></span>
									<span class="row__cell color-accent withdraw" title="-">-</span>
									<span class="row__cell color-primary deposit" title="-">-</span>
								</li>

							<?php
								} 
								 foreach($row_transfer as $record_transfer) 
								 { 
							?>
								<li class="table__row data-row">
									<span class="row__cell" title="<?php echo $record_transfer["date"] ;?>"><?php echo $record_transfer["date"] ;?></span>
									<span class="row__cell color-accent withdraw" title="-">-</span>
									<span class="row__cell color-primary deposit" title="-">-</span>
									<span class="row__cell color-accent withdraw" title="<?php if($record_transfer["sender_id"]==$user_id) { echo $record_transfer["amount"]; } else { echo '-'; }?>"><?php if($record_transfer["sender_id"]==$user_id) { echo $record_transfer["amount"]; } else { echo '-'; }?></span>
									<span class="row__cell color-primary deposit" title="<?php if($record_transfer["sender_id"]!=$user_id) { echo $record_transfer["amount"]; } else { echo '-'; }?>"><?php if($record_transfer["sender_id"]!=$user_id) { echo $record_transfer["amount"]; } else { echo '-'; }?></span>
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