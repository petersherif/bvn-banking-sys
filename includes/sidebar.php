<aside class="sidebar">
    <div class="sidebar__header">
        <a href="home.php"><img src="./assets/img/full-logo.png" alt="BVN" class="sidebar__logo"></a>
    </div>
    <div class="sidebar__body">
        <ul class="sidebar__list">
            <li class="list__item <?php if (str_replace('/bvn-banking-sys', '', $_SERVER['REQUEST_URI']) == '/home.php') { ?> active
						   <?php } ?>"><a href="home.php"><i class="fa fa-home icon-primary"></i> Dashboard</a></li>

            <?php if (!isset($_SESSION['loggedbvn'])) { ?>

                <li class="list__item <?php if (isset($_GET['new-client'])) { ?> active
						   <?php } ?>"><a
                            href="home.php?new-client"><i class="fa fa-user-plus icon-brown"></i> New Client</a></li>
            <?php } ?>


            <li class="list__item <?php if (isset($_GET['deposit'])) { ?> active
						   <?php } ?>"><a
                        href="home.php?deposit"><i
                            class="fa fa-money icon-green "></i> Deposit</a></li>


            <?php if (isset($_SESSION['loggedbvn'])) { ?>
                <li class="list__item <?php if (isset($_GET['withdraw'])) { ?> active
						   <?php } ?>"><a
                            href="home.php?withdraw"><i
                                class="fa fa-credit-card icon-red"></i> Withdraw</a></li>
            <?php } ?>
            <hr/>
            <?php if (isset($_SESSION['loggedbvn'])) { ?>
                <li class="list__item <?php if (isset($_GET['money-transfer'])) { ?> active
						   <?php } ?>"><a
                            href="home.php?money-transfer"><i class="fa fa-exchange icon-blue"></i> Money Transfer</a>
                </li>
                <?php if (!isset($_SESSION['loggedbvn'])) { ?>
                    <li class="list__item <?php if (isset($_GET['all-transactions'])) { ?> active
						   <?php } ?>"><a

                                href="home.php?all-transactions"><i class="fa fa-list icon-blue"></i> All
                            Transactions</a>
                    </li>
                <?php }
            } ?>
            <?php if (isset($_SESSION['loggedbvn'])) { ?>
                <li class="list__item <?php if (isset($_GET['client-profile'])) { ?> active
						   <?php } ?>"><a
                            href="home.php?client-profile"><i class="fa fa-user-circle icon-blue"></i> Client
                        Profile</a>
                </li>
            <?php } ?>
            <?php if (isset($_SESSION['loggedbvn'])) { ?>
                <li class="list__item<?php if (isset($_GET['end-process'])) { ?> active
							   <?php } ?> "><i
                            class="fa fa-undo icon-red"></i><a href="home.php?logout&endProcess">End Process</a>
                </li>
            <?php } ?>
            <?php if (!isset($_SESSION['loggedbvn'])) { ?>
                <li class="list__item<?php if (isset($_GET['add-employee'])) { ?> active
						   <?php } ?>"><i
                            class="fa fa-user-secret icon-black"></i><a href="home.php?add-employee">Add Employee</a>
                </li>
                <li class="list__item <?php if (isset($_GET['search-clients'])) { ?> active
						   <?php } ?>"><i
                            class="fa fa-users icon-black"></i><a href="home.php?search-clients">Search Clients</a>
                </li>
                <li class="list__item<?php if (isset($_GET['search-employees'])) { ?> active
						   <?php } ?> "><i
                            class="fa fa-users icon-black"></i><a href="home.php?search-employees">Search Employees</a>
                </li>
            <?php } ?>


            <li class="list__item"><i class="fa fa-sign-out icon-gray"></i><a href="home.php?logout">Log Out</a></li>
        </ul>
    </div>
</aside>