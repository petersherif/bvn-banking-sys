<?php
include "./controller/TransferController.php"
?>
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
                    <div class="alert alert-success hidden">

                        <strong>Success!</strong> Mission successfully.
                    </div>
                    <div class="alert alert-danger hidden">
                        <strong>Error!</strong> Dear Emp,The lowest value is 50 !
                    </div>
                    <div class="alert alert-danger length hidden">
                        <strong>Error!</strong> Dear Emp,The length of the account number must be 11 !
                    </div>
                    <form id="transferForm" class="form-box__form">

                        <div class="form-group">
                            <i class="fa fa-inbox"></i>
                            <input type="text" placeholder="Enter the Reciever Account Number or BVN" id="receiver_id"
                                   name="receiver_id"
                                   class="form-control account_number">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-money"></i>
                            <input type="text" placeholder="Enter the Amount to Transfer"
                                   name="amount"
                                   id="amount"

                                   class="form-control quantity">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="transfer" id="transfer" value="Transfer"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>

                    </form>
                </div>
            </div> <!-- Money Transfer Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>
