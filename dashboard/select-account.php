<?php include "./controller/CreateAccountController.php" ?>
<section class="new-client-section">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">Add Account To Bvn Number </h2>
            </div> <!-- Section Heading -->
        </div> <!-- Heading Row -->

        <div class="row">
            <div class="col-xs-12">

                <div class="light-box form-box">
                    <?php
                    if ($message == "success") {
                        ?>
                        <div class="alert alert-success">
                            <strong>Action successful!</strong> Account number successfully added to your bvn number !
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
                            <strong>Oops, action failed!</strong> You national id is not exist,
                        </div>
                        <?php
                    } else if ($message == "exist") {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Oops, action failed!</strong> You account number is already added to your bvn ,
                            Please check the
                            your <a href="home.php">accounts</a>!
                        </div>

                    <?php } ?>
                    <form method="post" class="form-box__form">
                        <?php if (!isset($_POST['selectAccount']) || $_POST['nat_id'] == "" || $message == "error2") { ?>
                            <div class="form-group">
                                <i class="fa fa-map-marker"></i>
                                <input type="text" name="nat_id" placeholder="Enter the client's nat_id"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="selectAccount" value="Select accounts"
                                       class="submit form-control btn btn-block btn-primary ">
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <select id="check_number" name="check_number"
                                        class="form-control"
                                        style="padding-top: 0;padding-bottom: 0;height: 30px;">
                                    <option>Please select you account number</option>
                                    <?php foreach ($rows as $record) { ?>
                                        <option value="<?php echo $record['id'] ?>"><?php echo $record['acc_num'] ?></option>
                                    <?php } ?>


                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="add-account" value="Add  accounts to Bvn"
                                       class="submit form-control btn btn-block btn-primary ">
                            </div>
                        <?php } ?>

                    </form>
                </div>
            </div> <!-- New client Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>
