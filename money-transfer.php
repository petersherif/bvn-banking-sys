<?php
if (!isset($_SESSION["ClientAccountNum"]) || empty($_SESSION["ClientAccountNum"])){
		
    header("location:dashboard.php");
    exit();
}
include_once('init.php'); ?>
<!-- Money Transfer form -->
<section class="money-trans-section">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">Money Transfer</h2>
            </div> <!-- Section Heading -->
        </div> <!-- Heading Row -->

        <div class="row">
            <div class="col-xs-12">

                <div class="light-box form-box">
                    <form action="" class="form-box__form">

                        <div class="form-group">
                            <i class="fa fa-inbox"></i>
                            <input type="text" placeholder="Enter the Reciever Account Number or BVN" id="acc-num"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-money"></i>
                            <input type="text" placeholder="Enter the Amount to Transfer" id="deposit-amount"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Transfer" class="submit form-control btn btn-block btn-primary">
                        </div>

                    </form>
                </div>
            </div> <!-- Money Transfer Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>

