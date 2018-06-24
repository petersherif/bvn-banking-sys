<aside class="sidebar">
    <div class="sidebar__header">
        <a href="home.php"><img src="./assets/img/full-logo.png" alt="BVN" class="sidebar__logo"></a>
    </div>
    <div class="sidebar__body">
        <ul class="sidebar__list">
            <li class="list__item <?php if (str_replace('/bvn-banking-sys', '', $_SERVER['REQUEST_URI']) == '/home.php') { ?> active
						   <?php } ?>"><a href="home.php"><i class="fa fa-home icon-primary"></i> Dashboard</a></li>

            <li class="list__item <?php if (isset($_GET['bvn_registration'])) { ?> active
						   <?php } ?>"><a href="home.php?bvn_registration"><i class="fa fa-plus icon-primary"></i>
                    BVN Registration
                </a></li>
            <?php if (!isset($_SESSION['loggedAccount'])) { ?>

                <li class="list__item <?php if (isset($_GET['new-client'])) { ?> active
						   <?php } ?>"><a href="home.php?new-client"><i class="fa fa-user-plus icon-brown"></i> New
                        Client/Account</a></li>
            <?php } ?><?php if (isset($_SESSION['loggedbvn']) && !isset($_SESSION['loggedAccount'])) { ?>

                <li class="list__item <?php if (isset($_GET['add-account'])) { ?> active
						   <?php } ?>"><a href="home.php?add-account"><i class="fa fa-plus icon-brown"></i> Add
                        Accounts</a></li>
            <?php } ?>

            <?php if (!isset($_SESSION['loggedbvn']) || isset($_SESSION['loggedAccount'])) { ?>
                <li class="list__item <?php if (isset($_GET['deposit'])) { ?> active
						   <?php } ?>"><a href="home.php?deposit"><i
                                class="fa fa-money icon-green "></i> Deposit</a></li>
            <?php } ?>

            <?php if (isset($_SESSION['loggedAccount'])) { ?>
                <li class="list__item <?php if (isset($_GET['withdraw'])) { ?> active
						   <?php } ?>"><a href="home.php?withdraw"><i
                                class="fa fa-credit-card icon-red"></i> Withdraw</a></li>
            <?php } ?>
            <hr/>
            <?php if (isset($_SESSION['loggedAccount'])) { ?>
                <li class="list__item <?php if (isset($_GET['money-transfer'])) { ?> active
						   <?php } ?>"><a href="home.php?money-transfer"><i class="fa fa-exchange icon-blue"></i> Money
                        Transfer</a>
                </li>

                <li class="list__item <?php if (isset($_GET['view-transactions'])) { ?> active
					   <?php } ?>"><a href="home.php?view-transactions"><i class="fa fa-list icon-blue"></i> View
                        Transactions</a>
                </li>
            <?php } ?>
            <?php if (isset($_SESSION['loggedAccount'])) { ?>
                <li class="list__item <?php if (isset($_GET['client-profile'])) { ?> active
						   <?php } ?>"><a href="home.php?client-profile&id=<?php echo $_SESSION['user_id'] ?>"><i
                                class="fa fa-user-circle icon-blue"></i>
                        Client
                        Profile</a>
                </li>
            <?php } ?>
            <?php if (isset($_SESSION['loggedbvn'])) { ?>
                <li class="list__item<?php if (isset($_GET['end-process'])) { ?> active
							   <?php } ?> "><a href="home.php?logout&endProcess"><i
                                class="fa fa-undo icon-red"></i> End Process</a>
                </li>
            <?php } ?>
            <?php if (!isset($_SESSION['loggedbvn'])) { ?>


                <?php
                if (isset($_SESSION['auth']) && $_SESSION['auth'] == 2) {
                    ?>
                    <li class="list__item<?php if (isset($_GET['add-employee'])) { ?> active
							   <?php } ?>"><a href="home.php?add-employee"><i
                                    class="fa fa-user-secret icon-black"></i> Add Employee</a>
                    </li>
                <?php } ?>

                <?php
                if (isset($_SESSION['auth']) && $_SESSION['auth'] == 2) {
                    ?>
                    <li class="list__item <?php if (isset($_GET['search-clients'])) { ?> active
							<?php } ?>"><a href="home.php?search-clients"><i
                                    class="fa fa-users icon-black"></i> Search Clients</a>
                    </li>
                <?php } ?>
                <?php
                if (isset($_SESSION['auth']) && $_SESSION['auth'] == 2) {
                    ?>
                    <li class="list__item<?php if (isset($_GET['search-employees'])) { ?> active
						   <?php } ?> "><a href="home.php?search-employees"><i
                                    class="fa fa-users icon-black"></i> Search Employees</a>
                    </li>
                <?php } ?>

                <br>
            <?php } ?>


            <li class="list__item"><a href="home.php?logout"><i class="fa fa-sign-out icon-gray"></i> Log Out</a></li>
        </ul>
    </div>
</aside>