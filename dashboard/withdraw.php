<?php include "./controller/WithdrawController.php" ?>
<section class="withdraw-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">Withdraw</h2>
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
                    <form id="withdrawForm" class="form-box__form">
                        <div class="form-group">
                            <i class="fa fa-money"></i>
                            <input type="text" name="amount" id="amount" placeholder="Enter the Amount to Withdraw"
                                   class="form-control quantity">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="withdraw" id="withdraw" value="Withdraw"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>

                    </form>
                </div>
            </div> <!-- New client Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>