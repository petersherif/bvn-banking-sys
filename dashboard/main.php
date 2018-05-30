<?php

include "./controller/MainController.php";
global $message;

?>

<section class="dashboard-components">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-sm-6 col-sm-offset-1 col-lg-7">

                <?php if (!isset($_SESSION['loggedbvn'])) { ?>
                    <!-- BVN login form -->
                    <div class="light-box light-box--small form-box">
                        <?php
                        if (isset($message)) {
                            ?>

                            <div class="alert alert-danger">
                                <button class="close" data-close="alert"></button>
                                <span>

                                    <?php echo $message; ?>
                                </span>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="alert alert-danger length hidden">
                            <strong>Error!</strong> Dear Emp,The length of the account number must be 11 !
                        </div>
                        <form class="form-box__form" method="post">
                            <div class="form-group">
                                <i class="fa fa-user"></i>
                                <input type="password" placeholder="Enter client BVN or account number" name="bvn" id="bvn"
                                       class="form-control account_number">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="enter"
                                       class="submit form-control btn btn-block btn-primary">
                            </div>
                        </form>
                    </div>
                </div> <!-- BVN login Form -->
            </div> <!-- Row -->
        </div> <!-- Container -->
    </section>
<?php } else {?>
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-1 col-md-4 col-lg-3 mb4">
                    <div class="light-box light-box--small">
                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0 col-md-8 col-md-offset-2 mb3">

                                <?php
                                    $user_id = $_SESSION['user_id'];
                                    $sql = "SELECT thumb From users WHERE id='$user_id'";
                                    $query = connect()->query($sql);
                                    while ($row = $query->fetch_object()) {
                                        
                                        $imgg=$row->thumb; ?>
                                   

                                <img src="./assets/files/users/thumb/<?php echo $imgg; ?>" alt="" class="mw-100" />
                             <?php } ?>

                            </div>                    

                        <?php } ?>
                        <?php
                        $user_id = $_SESSION["user_id"];
                        $sql = "select * from bvn WHERE  user_id=$user_id";
                        $query = connect()->query($sql);

                        if (!$query->num_rows != 0) { ?>
                            <input type="button" value="Create Bvn Number"
                                   class="btn btn-block btn-primary--custom" id="btn_bvn_number">
                            <br>
                        <?php } ?>

                    </div>

                    <div class="light-box light-box--small form-box hidden" id="bvn_
                                                                                
                                                                                ">

                        <!-- Create new BVN number -->
                        <div class="alert alert-danger length hidden">
                            <strong>Error!</strong> Dear Emp,The length of the account number must be 11 !
                        </div>
                        <form class="form-box__form" method="post">
                            <div class="form-group">
                                <i class="fa fa-user"></i>
                                <input type="text" placeholder="Enter client BVN or account number" name="bvnNumber"
                                       id="bvn"
                                       class="form-control account_number">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit_bvn" value="register"
                                       class="submit form-control btn btn-block btn-primary">
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="light-box">
                                <div class="row">
                                    <div class="col-xs-4 mb3">
                                        <img src="assets/img/avatar-placeholder.png" alt="" class="mw-100"/>
                                    </div>
                                    <div class="col-xs-8">
                                        <h6 class="f4 f3-ns b ttc">
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $sql = "SELECT full_name From users WHERE id='$user_id'";
                                            $query = connect()->query($sql);
                                            while ($row = $query->fetch_object()) {
                                                ?>
                                                <?php echo $row->full_name ?>
                                            <?php } ?>
                                        </h6>
                                        <p class="mb0">
                                            <span class="w4 dib">Acc No.:</span>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $sql = "SELECT acc_num From accounts WHERE user_id='$user_id'";
                                            $query = connect()->query($sql);
                                            while ($row = $query->fetch_object()) {
                                                ?>
                                                <?php echo $row->acc_num ?>
                                            <?php } ?>
                                        </p>

                                        <p class="">
                                            <span class="w4 dib">Balance:</span>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $sql = "SELECT balance From accounts WHERE user_id='$user_id'";
                                            $query = connect()->query($sql);
                                            while ($row = $query->fetch_object()) {
                                                ?>
                                                <?php echo $row->balance ?>
                                            <?php } ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="home.php?client-profile"
                                           class="btn btn-block btn-primary--custom">View</a>
                                    </div>
                                </div>
                            </div> <!-- Brief Client Info -->
                        </div>
                    </div>

                    <?php
                    $transactions_limit = "LIMIT 5";
                    include "./controller/view-transactionsController.php";
                    ?>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="light-box table-box data-listing-box view-transactions-box">
                                <h4 class="table__heading">Last 5 transactions</h4>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <ul class="table__rows">
                                            <li class="table__row">
                                                <span class="row__cell row__cell--heading">Date</span>
                                                <span class="row__cell row__cell--heading">Description</span>
                                                <span class="row__cell row__cell--heading">Withdraw</span>
                                                <span class="row__cell row__cell--heading">Deposit</span>
                                            </li>
                                            <?php $i = 0;
                                            foreach ($row as $record) {
                                                ?>
                                                <li class="table__row data-row">
                                                    <span class="row__cell"
                                                          title="10/11/2018"><?php echo $row[$i]
                                                  
                                                  ; ?></span>
                                                    <span class="row__cell"
                                                          title="Description includes the ATM or Bank data (bank name and branch or atm id or location name) and the depositor data if any.">Description includes the ATM or Bank data (bank name and branch or atm id or location name) and the depositor data if any.</span>
                                                    <span class="row__cell color-accent withdraw"
                                                          title=""><?php if ($row[$i]["type"] == 1) echo $row[$i]["amount"]; ?></span>
                                                    <span class="row__cell color-primary deposit"
                                                          title="6500"><?php if ($row[$i]["type"] == 0) echo $row[$i]["amount"]; ?></span>
                                                </li>
                                                <?php $i++;
                                            } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div> <!-- Last 5 transactions -->
                        </div>
                    </div>

                <?php } ?>
            </div>

            <div class="col-xs-12 col-sm-4 col-lg-3">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="light-box date-time-box">
                            <p class="date"></p>
                            <p class="time">
                                <span class="hr"></span>
                                <span class="min"></span>
                                <span class="sec"></span>
                                <span class="ampm"></span></p>
                        </div>
                    </div> <!-- Date and Time Box -->
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="light-box table-box cur-rate-box">
                            <h4 class="table__heading">Currency Exchange Rate</h4>
                            <ul class="table__rows">
                                <li class="table__row">
                                    <span class="row__cell row__cell--heading">cur</span>
                                    <span class="row__cell row__cell--heading">Sell</span>
                                    <span class="row__cell row__cell--heading">Buy</span>
                                </li>
                                <li class="table__row">
                                    <span class="row__cell row__cell--heading">usd</span>
                                    <span class="row__cell">18.00</span>
                                    <span class="row__cell">17.60</span>
                                </li>
                                <li class="table__row">
                                    <span class="row__cell row__cell--heading">eur</span>
                                    <span class="row__cell">23.00</span>
                                    <span class="row__cell">20.83</span>
                                </li>
                                <li class="table__row">
                                    <span class="row__cell row__cell--heading">gdp</span>
                                    <span class="row__cell">23.40</span>
                                    <span class="row__cell">22.30</span>
                                </li>
                                <li class="table__row">
                                    <span class="row__cell row__cell--heading">cad</span>
                                    <span class="row__cell">16.40</span>
                                    <span class="row__cell">15.30</span>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- Currency Rate Box -->
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="light-box rate-chart-box">
                            <canvas id="rate-chart"></canvas>
                        </div>
                    </div> <!-- Cur Rate Chart -->
                </div>
            </div> <!-- Date and Time Box, Cur Rate Table & Graph -->

        </div>
    </div>
</section>
<script src="assets/vendor/jquery/jquery.min.js"></script>

<script>

    $('#btn_bvn_number').on('click', function () {
        $('#bvn_number').removeClass('hidden');
        $(this).addClass('hidden')
    });
</script>