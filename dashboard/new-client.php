<?php include "./controller/addClientController.php";
global $message;
?>


<section class="new-client-section">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">Add a New Client</h2>
            </div> <!-- Section Heading -->
        </div> <!-- Heading Row -->

        <div class="row">
            <div class="col-xs-12">

                <div class="light-box form-box">
                    <?php
                    if ($message == "success_bvn") {
                        ?>
                        <div class="alert alert-success">
                            <strong>Action successful!</strong> Client successfully added! ,<br>
                            your bvn number :<?php echo $only_bvn_num ?><br>

                        </div>
                        <?php
                    }
                    if ($message == "success_acc") {
                        ?>
                        <div class="alert alert-success">
                            <strong>Action successful!</strong> Client successfully added! ,<br>
                            your acc number :<?php echo $only_acc_num ?><br>

                        </div>
                        <?php
                    }
                    if ($message == "success_both") {
                        ?>
                        <div class="alert alert-success">
                            <strong>Action successful!</strong> Client successfully added! ,<br>
                            your bvn number :<?php echo $bvn_num ?><br>
                            your account number :<?php echo $acc_num ?>

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
                            <strong>Oops, action failed!</strong> This client already exists!
                        </div>

                    <?php } ?>
                    <form method="post" class="form-box__form">

                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" name="full_name"
                                   placeholder="Enter the client's full name"
                                   id="full_name"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-address-card"></i>
                            <input type="text" name="national_id" placeholder="Enter the client's National ID"
                                   id="nat-id"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-birthday-cake"></i>
                            <input type="date" name="birthday" placeholder="Enter the client's birthday"
                                   id="birthday"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-transgender"></i>
                            <select id="gender" name="gender" class="form-control">
                                <option>Select the Client's Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-map-marker"></i>
                            <input type="text" name="address" placeholder="Enter the client's address" id="address"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-at"></i>
                            <input type="email" name="email" placeholder="Enter the client's email address"
                                   id="email"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-phone"></i>
                            <input type="text" name="phone" placeholder="Enter the client's phone number"
                                   id="phone-num"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" value="0"
                                       class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Create Bvn Number</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" value="1"
                                       class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Create account</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="customRadio" value="2"
                                       class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3">Create both</label>
                            </div>
                        </div>
                        <!--                        <div class="form-group">-->
                        <!--                            <input type="radio" class="radio" id="acc" name="acc">-->
                        <!--                            <label for="acc">-->
                        <!--                                <span>Create account</span>-->
                        <!--                            </label>-->
                        <!--                            <input type="radio" class="radio" id="bvn" name="bvn" checked>-->
                        <!--                            <label for="bvn">-->
                        <!--                                <span>Create Bvn Number</span>-->
                        <!--                            </label>-->
                        <!--                            <input type="radio" class="radio" id="both" name="both" value="both">-->
                        <!--                            <label for="both">-->
                        <!--                                <span>Create both</span>-->
                        <!--                            </label>-->
                        <!--                        </div>-->

                        <div class="form-group">
                            <input type="submit" name="submit" value="add new client"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>
                    </form>
                    If You Have Bank Account <a href="home.php?create-bvn">Click Her</a>
                </div>
            </div> <!-- New client Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>


