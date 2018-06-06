<?php include "./controller/CreateBvnController.php" ?>
<section class="new-client-section">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">Create Bvn </h2>
            </div> <!-- Section Heading -->
        </div> <!-- Heading Row -->

        <div class="row">
            <div class="col-xs-12">

                <div class="light-box form-box">
                    <?php
                    if ($message == "success") {
                        ?>
                        <div class="alert alert-success">
                            <strong>Action successful!</strong> Bvn number successfully created you
                            number: <?php echo $bvn_num ?>!
                        </div>
                        <?php
                    } else if ($message == "error") {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Oops, action failed!</strong> Please, fill the required fields!
                        </div>
                        <?php
                    } else if ($message == "error2") {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Oops, action failed!</strong> You don't have account, Please go to
                            <a href="home.php?new-client">create account</a> !
                        </div>
                        <?php
                    } else if ($message == "exist") {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Oops, action failed!</strong> You already has bvn number , Please go to bvn <a
                                    href="home.php"> login </a>!
                        </div>

                    <?php } ?>
                    <form method="post" class="form-box__form">

                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" name="acc_number"
                                   placeholder="Enter the client's Account Number"
                                   id="acc_number"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="createBvn" value="Create  new Bvn"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>
                    </form>
                </div>
            </div> <!-- New client Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>


