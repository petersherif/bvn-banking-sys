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
                    <?php
                    if ($message == "success") {
                        ?>
                        <div class="alert alert-success">
                            <strong>Withdraw successful!</strong> Your new balance is <?php echo $newBalance ?>
                        </div>
                        <?php
                    } else if ($message == "error") {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Oops, withdraw failed!</strong> Sorry, insufficient balance, your balance is <?php echo $balance ?>
                        </div>
                        <?php
                    } ?>

                    <div class="alert alert-success hidden">
                        <strong>Withdraw successful!</strong>
                    </div>
                    <div class="alert alert-danger hidden">
                        <strong>Oops, withdraw failed!</strong> The lowest value is 50!
                    </div>
                    <form method="post" class="form-box__form">
                        <div class="form-group">
                            <i class="fa fa-money"></i>
                            <input type="text" name="amount" id="amount" placeholder="Enter the withdraw amount"
                                   class="form-control quantity">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="withdraw" value="Withdraw"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>

                    </form>
                </div>
            </div> <!-- New client Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>