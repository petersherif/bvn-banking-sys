<?php include "./controller/CreateAccountController.php" ?>
<section class="new-client-section">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">Bvn Number</h2>
            </div> <!-- Section Heading -->
        </div> <!-- Heading Row -->

        <div class="row">
            <div class="col-xs-12">


                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="light-box form-box">
                            <?php
                            if ($message == "success") {
                                ?>
                                <div class="alert alert-success">
                                    <strong>Action successful!</strong> Account number successfully added to your bvn
                                    number !
                                </div>
                                <?php
                            } else if ($message == "error") {
                                ?>
                                <div class="alert alert-danger">
                                    <strong>Oops, action failed!</strong> Please, fill the required fields!
                                </div>
                                <?php
                            } else if ($message == "exist") {
                                ?>
                                <div class="alert alert-danger">
                                    <strong>Oops, action failed!</strong> You account number is not exist ,
                                </div>

                            <?php } ?>
                            <form method="post" class="form-box__form">
                                <div class="form-group">
                                    <i class="fa fa-map-marker"></i>
                                    <input type="text" name="acc_num" id="acc_num"
                                           placeholder="Enter the client's account number"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add  accounts to Bvn"
                                           class="submit form-control btn btn-block btn-primary ">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="light-box form-box">
                            <?php
                            if ($message == "success") {
                                ?>
                                <div class="alert alert-success">
                                    <strong>Action successful!</strong> Account number successfully added to your bvn
                                    number !
                                </div>
                                <?php
                            } else if ($message == "error") {
                                ?>
                                <div class="alert alert-danger">
                                    <strong>Oops, action failed!</strong> Please, fill the required fields!
                                </div>
                                <?php
                            } else if ($message == "exist") {
                                ?>
                                <div class="alert alert-danger">
                                    <strong>Oops, action failed!</strong> You account number is not exist ,
                                </div>

                            <?php } ?>
                            <form method="post" class="form-box__form">
                                <div class="form-group">
                                    <i class="fa fa-map-marker"></i>
                                    <input type="text" name="acc_num" id="acc_num"
                                           placeholder="Enter the client's account number"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <i class="fa fa-map-marker"></i>
                                    <input type="text" name="bvn_num" id="bvn_num"
                                           placeholder="Enter the client's bvn"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="add" value="Add  account to Bvn"
                                           class="submit form-control btn btn-block btn-primary ">
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- New client Form -->
        <!-- Container -->
</section>
