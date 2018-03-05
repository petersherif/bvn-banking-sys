<?php
global $message;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $national_id = $_POST['national_id'];
    $type = $_POST['birthdate'];
    $phone = $_POST['address'];
    $phone = $_POST['phone'];
    $auth = $_POST['auth'];


    if ($_POST['username'] == "") {
        $message = 'error1';
    } elseif ($_POST['email'] == "") {
        $message = 'error2';
    } elseif ($_POST['password'] == "") {
        $message = 'error3';
    } else {

        $sql = "select * from users WHERE user_name='$username'";
        $query = connect()->query($sql);
        if ($query->num_rows != 0) {
            $message = "exist";
        } else {
            $values = "'" . $_POST['username'] . "','" . $_POST['email'] . "','" . md5($_POST['password']) . "','" . $_POST['national_id'] . "','" . $_POST['birthdate'] . "','" . $_POST['gender'] . "','" . $_POST['phone'] . "'";
            $sql = "INSERT INTO users(`user_name`,`email`,`password`,`national_id`,`birthday`,`gender`,`phone`)VALUE($values)";
            $query = connect()->query($sql);
            $message = 'success';


        }
    }
}


?>
<?php
if ($message == "success") {
    ?>
    <div class="alert alert-success">
        <strong>Success!</strong> user successfully added.
    </div>
    <?php
} else if ($message == "error1") {
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> Please, insert Name.
    </div>
    <?php
} else if ($message == "error2") {
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> Please, insert username.
    </div>
    <?php
} else if ($message == "error3") {
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> Please, insert Password.
    </div>
    <?php
} else if ($message == "error4") {
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> Please, insert Type.
    </div>
    <?php
} else if ($message == "error5") {
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> Please, insert Image.
    </div>
    <?php
} else if ($message == "exist") {
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> user already exist.
    </div>

<?php } ?>


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
                    <form action="" class="form-box__form">

                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" name="username"
                                   placeholder="Enter the Client's Full Name"
                                   id="fullname"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-barcode"></i>
                            <input type="text" name="" placeholder="Enter the Client's Nationallity ID"
                                   id="nat-id"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-birthday-cake"></i>
                            <input type="date" placeholder="Enter the Client's Birthdate"
                                   id="birthdate"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-transgender"></i>
                            <select id="gender" class="form-control">
                                <option>Select the Client's Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <i class="fa fa-map-marker"></i>
                            <input type="text" placeholder="Enter the Client's Address" id="address"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-envelope"></i>
                            <input type="text" placeholder="Enter the Client's Email Address"
                                   id="email"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-phone"></i>
                            <input type="text" placeholder="Enter the Client's Phone Number"
                                   id="phone-num"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-thumbs-up"></i>
                            <input type="text" placeholder="Scan the Client's Fingerprint"
                                   id="fingerprint"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-user-circle"></i>
                            <input type="file" placeholder="Upload the Client's Picture"
                                   id="picture"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="add new client"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>

                    </form>
                </div>
            </div> <!-- New client Form -->
        </div> <!-- Row -->
    </div> <!-- Container -->
</section>