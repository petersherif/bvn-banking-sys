<section class="new-client-section">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">Deposit</h2>
            </div> <!-- Section Heading -->
        </div> <!-- Heading Row -->

        <div class="row">
            <div class="col-xs-12">
            
                <div class="light-box form-box">
                    <form action="" class="form-box__form">
                        <?php if (!isset($_SESSION["ClientAccountNum"]) && empty($_SESSION["ClientAccountNum"])){?>
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Enter the Client's Full Name" id="fullname"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-barcode"></i>
                            <input type="text" placeholder="Enter the Client's Nationallity ID" id="nat-id"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-inbox"></i>
                            <input type="text" placeholder="Enter the Reciever Account Number" id="rec-acc-num"
                                   class="form-control">
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <i class="fa fa-money"></i>
                            <input type="text" placeholder="Enter the Amount to Send" id="deposit-amount"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Deposit" class="submit form-control btn btn-block btn-primary">
                        </div>

                    </form>
                </div>
            </div> <!-- New client Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>

