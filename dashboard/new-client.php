<?php include "./controller/addClientController.php";
global $message;
?>


<section class="new-client-section">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">Add New Client</h2>
            </div> <!-- Section Heading -->
        </div> <!-- Heading Row -->

        <div class="row">
            <div class="col-xs-12">

                <div class="light-box form-box">
                    <?php
                    if ($message == "success") {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> user successfully added.
                        </div>
                        <?php
                    } else if ($message == "error") {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> Please, insert full information.
                        </div>
                        <?php
                    } else if ($message == "exist") {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> user already exist.
                        </div>

                    <?php } ?>
                    <form method="post" class="form-box__form">

                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" name="full_name"
                                   placeholder="Enter the Client's Full Name"
                                   id="full_name"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-barcode"></i>
                            <input type="text" name="national_id" placeholder="Enter the Client's Nationallity ID"
                                   id="nat-id"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-birthday-cake"></i>
                            <input type="date" name="birthday" placeholder="Enter the Client's Birthdate"
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
                            <input type="text" name="address" placeholder="Enter the Client's Address" id="address"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-envelope"></i>
                            <input type="email" name="email" placeholder="Enter the Client's Email Address"
                                   id="email"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-phone"></i>
                            <input type="text" name="phone" placeholder="Enter the Client's Phone Number"
                                   id="phone-num"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" class="checkbox" id="create-acc" name="acc_check">
                            <label for="create-acc">
                                <span>Create account</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" class="checkbox" id="create-bvn-num" name="bvn_check">
                            <label for="create-bvn-num">
                                <span>Create Bvn Number</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="add new client"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>

                    </form>
                </div>
            </div> <!-- New client Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>

<script src="assets/vendor/jquery/jquery.min.js"></script>

<script>

    $('#bvn_check').on('change', function () {
        if (this.checked) {
            $('#bvn_input').removeClass('hidden')
        } else {
            $('#bvn_input').addClass('hidden')

        }
    });
</script>


