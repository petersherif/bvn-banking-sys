<?php
include "./controller/EmployeeController.php";
global $message;
?>
<!-- New Employee form -->
<section class="new-employee-section">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">Add a New Employee</h2>
            </div> <!-- Section Heading -->
        </div> <!-- Heading Row -->

        <div class="row">
            <div class="col-xs-12">

                <div class="light-box form-box">
                    <?php
                    if ($message == "success") {
                        ?>
                        <div class="alert alert-success">
                            <strong>Action successful!</strong> Employee added!
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
                            <strong>Oops, action failed!</strong> Employee already exist.
                        </div>

                    <?php } ?>
                    <div class="alert alert-danger hidden">
                        <strong>Oops, action failed!</strong> Please, enter the right information!
                    </div>
                    <form class="form-box__form" method="post" enctype='multipart/form-data'>

                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" name="full_name" placeholder="Enter the Employee's full name"
                                   id="full_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" name="user_name" placeholder="Enter the Employee's username"
                                   id="user_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="password" name="password" placeholder="Enter the Employee's password"
                                   id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-address-card"></i>
                            <input type="text" name="national_id" placeholder="Enter the Employee's National ID"
                                   id="national_id" class="form-control account_number">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-birthday-cake"></i>
                            <input type="date" name="birthday" placeholder="Enter the Employee's Birthdate"
                                   id="birthday" class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-transgender"></i>
                            <select id="gender" name="gender" class="form-control">
                                <option value="0">Select the Employee's Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-map-marker"></i>
                            <input type="text" name="address" placeholder="Enter the Employee's Address" id="address"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-envelope"></i>
                            <input type="email" name="email" placeholder="Enter the Employee's Email Address" id="email"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-phone"></i>
                            <input type="text" name="phone" placeholder="Enter the Employee's Phone Number"
                                   id="phone" class="form-control account_number">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-user-circle"></i>
                            <input type="file" name="thumb" placeholder="Upload the Employee's Picture" id="thumb"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-briefcase"></i>
                            <select id="auth" name="auth" class="form-control">
                                <option value="0">Select the Employee's Authorization</option>
                                <option value="1">Employee</option>
                                <option value="2">Manager</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="add new Employee"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>

                    </form>
                </div>
            </div> <!-- New Employee Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>