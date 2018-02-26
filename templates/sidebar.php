<aside class="sidebar">
		<div class="sidebar__header">
			<a href="index.php"><img src="<?php echo $img; ?>full-logo.png" alt="BVN" class="sidebar__logo"></a>
		</div>
		<div class="sidebar__body">
			<ul class="sidebar__list">
				<li class="list__item active"><i class="fa fa-home icon-primary"></i><a href="dashboard.php">Dashboard</a></li>
				<li class="list__item"><i class="fa fa-user-plus icon-brown"></i><a href="registeration.php">New Client</a></li>
				<li class="list__item"><i class="fa fa-money icon-green"></i><a href="deposit.php">Deposit</a></li>
				<li class="list__item"><i class="fa fa-credit-card icon-red"></i><a href="withdraw.php">Withdraw</a></li>

				<hr />
				<?php if(isset($_SESSION['auth']) && $_SESSION['auth'] == 1){}else{ ?>

					<li class="list__item"><i class="fa fa-user-secret icon-black"></i><a href="add-employee.php">Add Employee</a></li>
					<li class="list__item"><i class="fa fa-users icon-black"></i><a href="search-clients.php">Search Clients</a></li>
					<li class="list__item"><i class="fa fa-users icon-black"></i><a href="search-employees.php">Search Employees</a></li>

					<hr />
				<?php } ?>

				
				<li class="list__item"><i class="fa fa-sign-out icon-gray"></i><a href="logout.php">Log Out</a></li>
			</ul>
		</div>
	</aside>