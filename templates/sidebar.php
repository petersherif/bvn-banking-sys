<aside class="sidebar">
		<div class="sidebar__header">
			<a href="index.php"><img src="<?php echo $img; ?>full-logo.png" alt="BVN" class="sidebar__logo"></a>
		</div>
		<div class="sidebar__body">
			<ul class="sidebar__list">
				<li class="list__item <?php if (isset($DashboardActive)) echo $DashboardActive; ?>"><a href="dashboard.php"><i class="fa fa-home icon-primary"></i> Dashboard</a></li>
				<li class="list__item <?php if (isset($newClientActive)) echo $newClientActive; ?>"><a href="new-client.php"><i class="fa fa-user-plus icon-brown"></i> New Client</a></li>
				<li class="list__item <?php if (isset($DepositActive)) echo $DepositActive; ?>"><a href="deposit.php"><i class="fa fa-money icon-green"></i> Deposit</a></li>
				<li class="list__item <?php if (isset($WithdrawActive)) echo $WithdrawActive; ?>"><a href="withdraw.php"><i class="fa fa-credit-card icon-red"></i> Withdraw</a></li>

				<hr />
				
				<li class="list__item <?php if (isset($MoneyTransActive)) echo $MoneyTransActive; ?>"><a href="money-transfer.php"><i class="fa fa-exchange icon-blue"></i> Money Transfer</a></li>
				<li class="list__item <?php if (isset($AllTransActive)) echo $AllTransActive; ?>"><a href="all-transactions.php"><i class="fa fa-list icon-blue"></i> All Transactions</a></li>
				<li class="list__item <?php if (isset($ClientProfileActive)) echo $ClientProfileActive; ?>"><a href="client-profile.php"><i class="fa fa-user-circle icon-blue"></i> Client Profile</a></li>

				<hr />
				<?php if(isset($_SESSION['auth']) && $_SESSION['auth'] == 1){}else{ ?>

					<li class="list__item <?php if (isset($AddEmpActive)) echo $AddEmpActive; ?>"><i class="fa fa-user-secret icon-black"></i><a href="add-employee.php">Add Employee</a></li>
					<li class="list__item <?php if (isset($SearchClientsActive)) echo $SearchClientsActive; ?>"><i class="fa fa-users icon-black"></i><a href="search-clients.php">Search Clients</a></li>
					<li class="list__item <?php if (isset($SearchEmpActive)) echo $SearchEmpActive; ?>"><i class="fa fa-users icon-black"></i><a href="search-employees.php">Search Employees</a></li>
						
				<?php } ?>
				
				<li class="list__item"><i class="fa fa-sign-out icon-gray"></i><a href="logout.php">Log Out</a></li>
			</ul>
		</div>
	</aside>