<?php
$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$acc_id = $_SESSION['acc_id'];

$sql = "SELECT * From accounts WHERE id='$acc_id'";
$query = connect()->query($sql);
while ($item = $query->fetch_object()) {
    $acc_num = $item->acc_num;
    $balance = $item->balance;
    $bank_id = $item->bank_id;
}
$sql = "SELECT * FROM banks JOIN accounts WHERE accounts.bank_id=banks.id AND accounts.bank_id = '$bank_id' ";
$query = connect()->query($sql);
while ($items = $query->fetch_object()) {
    $banks_name = $items->bank_name;
}

$quer2 = "SELECT * From users WHERE id='$user_id'";
$query = connect()->query($quer2);
while ($row = $query->fetch_object()) {

    $name = $row->full_name;
    $nat_id = $row->national_id;
    $email = $row->email;

    $birthday = $row->birthday;
    $gender = $row->gender;
    $address = $row->address;
    $phone = $row->phone;
    $img = $row->thumb;
}
if (isset($_POST['edit-profile'])) {
    if (!empty($_POST['name']) && !empty($_POST['birthday']) && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
        $user_id = $_SESSION['user_id'];
        $new_name = $_POST['name'];
        $new_birthday = $_POST['birthday'];
        $new_address = $_POST['address'];
        $new_email = $_POST['email'];
        $new_phone = $_POST['phone'];
        $sql2 = "UPDATE `users` set full_name = '$new_name', birthday = '$new_birthday', address = '$new_address', email = '$new_email' , phone = '$new_phone'  WHERE id=$user_id";
        $query1 = connect()->query($sql2);
        header("location:?client-profile");
        exit();
    }
}

if (isset($_POST['submit_delete'])) {
    $user = $_POST['id'];
    $sql = "DELETE FROM `users` WHERE id='$user' ";
    $query1 = connect()->query($sql);
    if ($query1) {
        if ($id == $_SESSION['user_id']) {
            unset($_SESSION['loggedAccount']);
            unset($_SESSION['loggedbvn']);
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['acc_id']);
            header('location: home.php');

        }
    }
}
?>
<!-- Client Profile -->
<section class="profile-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 component-wrapper">
                <div class="light-box light-box--small profile-box mb3">

                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 profile__avatar-wrapper">
                            <div class="profile__avatar">
                                <?php if ($img) { ?>
                                    <img src="./assets/files/users/thumb/<?php echo $img; ?>" alt="<?php echo $name ?>"
                                         class="mw-100"/>
                                <?php } else { ?>
                                    <p class="user-name-initial"><?php echo strtoupper($name[0]); ?></p>
                                <?php } ?>
                            </div> <!-- profile avatar -->

                            <div class="profile__avatar-caption avatar-caption tc">
                                <h6 class="avatar-caption__heading"><?php echo ucfirst($name); ?></h6>
                            </div> <!-- profile avatar caption -->

                            <div class="mv6">
                                <p class="tc">Here could be a list of the client banks' names</p>
                            </div>
                        </div> <!-- profile avatar wrapper -->
                        <div class="col-xs-12 col-sm-8 pv3 profile__info-wrapper form-box form-box--full-width">

                            <div class="profile__info">
                                <form method="post" class="form-box__form">

                                    <h4 class="info__group-title">Basic info</h4>

                                    <div class="form-group profile__form-group profile__static-info">
                                        <label class="info__title">National ID</label>
                                        <p class="info__data dib w-70"><?php echo $nat_id ?></p>
                                    </div>

                                    <div class="form-group profile__form-group">
                                        <label class="info__title" for="name">Name</label>
                                        <div class="relative dib w-70">
                                            <input type="text" name="full_name"
                                                   placeholder="Enter the Client's Full Name"
                                                   id="name" class="form-control editable-input"
                                                   value="<?php echo $name; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group profile__form-group">
                                        <label class="info__title" for="birthday">Birthday</label>
                                        <div class="relative dib w-70">
                                            <input type="date" name="birthday" placeholder="Enter the Client's Birthday"
                                                   id="birthday" class="form-control editable-input"
                                                   value="<?php echo $birthday; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group profile__form-group">
                                        <label class="info__title" for="address">Address</label>
                                        <div class="relative dib w-70">
                                            <input type="text" name="address" placeholder="Enter the Client's Address"
                                                   id="address" class="form-control editable-input"
                                                   value="<?php echo $address; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group profile__form-group">
                                        <label class="info__title" for="email">Email</label>
                                        <div class="relative dib w-70">
                                            <input type="text" name="email"
                                                   placeholder="Enter the Client's Email Address" id="email"
                                                   class="form-control editable-input" value="<?php echo $email; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group profile__form-group">
                                        <label class="info__title" for="phone-num">Phone</label>
                                        <div class="relative dib w-70">
                                            <input type="text" name="phone"
                                                   placeholder="Enter the Client's Phone Number" id="phone-num"
                                                   class="form-control editable-input" value="<?php echo $phone; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group profile__form-group mt4">
                                        <input type="hidden" id="id" name="id" value=""/>
                                        <button name="submit" type="submit"
                                                class="btn btn-primary--custom mr2 ml5">Save
                                        </button>
                                        <button type="button" class="btn btn-danger--custom" data-toggle="modal"
                                                value="<?php echo $id; ?>"
                                                data-target="#myModal">Delete Account
                                        </button>
                                        <p class="ml5">Click Save to keep your updates</p>

                                    </div>

                                    <h4 class="info__group-title mt4">Account info</h4>

                                    <div class="form-group profile__form-group profile__static-info">
                                        <label class="info__title">Account#</label>
                                        <p class="info__data dib w-70"><?php echo $acc_num ?></p>
                                    </div>

                                    <div class="form-group profile__form-group profile__static-info special-info--danger">
                                        <label class="info__title">Balance</label>
                                        <p class="info__data dib w-70"><?php echo $balance ?></p>
                                    </div>

                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
															<span class="warning">Hold a moment!<span>
															<button type="button" class="close" data-dismiss="modal">
																&times;
															</button>
                                                    </h4>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <p>
                                                        Are you sure you? You cannot undo this action!
                                                    </p>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <form method="post" action="?search-clients">
                                                        <input type="hidden" id="id" name="id"
                                                               value="<?php echo $id ?>"/>
                                                        <button type="submit" name="submit_delete"
                                                                class="btn btn-danger--custom">
                                                            <i
                                                                    class="fa fa-times"></i> Delete
                                                        </button>
                                                        <a class="btn btn-primary--custom" data-dismiss="modal"
                                                           href="#">Close</a>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div> <!-- profile info -->

                    </div> <!-- profile info wrapper -->
                </div> <!-- row -->
            </div> <!-- light box -->
        </div> <!-- componenet wrapper -->
    </div> <!-- main row -->
</section>
