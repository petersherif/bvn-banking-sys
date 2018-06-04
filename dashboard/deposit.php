<?php
if (isset($_SESSION['loggedbvn'])) {
    include "./controller/DepositController.php";
} else {
    include "./controller/UnAuthDepositController.php";
    global $message;
} ?>
<section class="deposit-section">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">Deposit</h2>
            </div> <!-- Section Heading -->
        </div> <!-- Heading Row -->

        <div class="row">
            <div class="col-xs-12">

                <div class="light-box form-box">
                    <div class="alert alert-success hidden">
                        <strong>Success!</strong> Mission successfully.
                    </div>
                    <div class="alert alert-danger hidden">
                        <strong>Error!</strong> Dear Emp,The lowest value is 50 !
                    </div>
                    <?php if (!isset($_SESSION['loggedbvn'])) { ?>
                    <?php
                    if ($message == "success") {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> user successfully added.
                        </div>
                        <?php
                    } else if ($message == "error") {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> Please, insert full information.
                        </div>
                        <?php
                    } else if ($message == "exist") {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> account number doesn't exist.
                        </div>

                    <?php } ?>
                    <form method="post" class="form-box__form">
                        <div class="form-group">
                            <i class="fa fa-inbox"></i>
                            <input type="text" name="acc_num"
                                   placeholder="Enter the Reciever Account Number"
                                   id="acc_num"
                                   class="form-control account_number">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-inbox"></i>
                            <input type="text" name="sender_name"
                                   placeholder="Enter the Fullname"
                                   id="sender_name"
                                   class="form-control ">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-barcode"></i>
                            <input type="text" name="nat_id"
                                   placeholder="Enter the National ID"
                                   id="nat_id"
                                   class="form-control account_number">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-money"></i>
                            <input type="text" name="amount" placeholder="Enter the Amount to Send" id="amount"
                                   class="form-control quantity">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Deposit"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>
                </div>
                </form>
                <?php } else { ?>
                    <?php
                    if ($message == "success") {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> Mission successfully , Your balance
                            is <?php echo $newBalance ?>.
                        </div>
                        <?php
                    } else if ($message == "error") {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> Please, enter your balance.
                        </div>
                        <?php
                    } ?>
                    <form method="post" class="form-box__form">
                        <div class="form-group">
                            <i class="fa fa-money"></i>
                            <input type="text" name="amount" placeholder="Enter the Amount to Send" id="amount"
                                   class="form-control quantity">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="deposit" value="Deposit"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>
                    </form>
                <?php } ?>


            </div>
        </div> <!-- New client Form -->
    </div> <!-- Row -->
    </div> <!-- Container -->
</section>

