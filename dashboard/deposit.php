<?php
if (isset($_SESSION['loggedbvn'])) {
    include "./controller/DepositController.php";
} else {
    include "./controller/UnAuthDepositController.php";

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
                    <form class="form-box__form" id="depositForm">
                        <?php if (!isset($_SESSION['loggedbvn'])) { ?>
                            <div class="form-group">
                                <i class="fa fa-inbox"></i>
                                <input type="text" name="acc_num"
                                       placeholder="Enter the Reciever Account Number"
                                       id="acc_num"
                                       class="form-control account_number">
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <i class="fa fa-money"></i>
                            <input type="text" name="amount" placeholder="Enter the Amount to Send" id="amount"
                                   class="form-control quantity">
                        </div>

                        <div class="form-group">
                            <input type="submit" id="deposit" name="deposit" value="Deposit"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>

                    </form>
                </div>
            </div> <!-- New client Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>

