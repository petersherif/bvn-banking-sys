<?php

include "./controller/bvnLoginController.php";
include "./controller/MainController.php";

?>

<section class="dashboard-components">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-1 col-lg-7">
                <div class="light-box form-box">
                    <?php
                    if ($message == "error") { ?>
                        <div class="alert alert-danger">
                            <strong>Oops, action failed!</strong> Please, select account number to continue!
                        </div>
                        <?php
                    } ?>

                    <p>Please, choose an account to continue</p>
                    <form class="form-box__form" method="post">

                        <?php
                        if (isset($_SESSION['bvn_id'])) {
                            $bvn_id = $_SESSION['bvn_id'];
                            $sql = "select accounts.id,accounts.acc_num,accounts.balance,banks.bank_name from accounts inner join bvn_acc on bvn_acc.acc_id=accounts.id inner JOIN banks on accounts.bank_id=banks.id WHERE bvn_acc.bvn_id='$bvn_id'";
                            $query = connect()->query($sql);
                            $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        }
                        foreach ($row as $record) { ?>
                            <div class="form-group">
                                <input type="radio" value="<?php echo $record['acc_num'] ?>" name="account_number"
                                       id="<?php echo $record['acc_num'] ?>" class=""/>
                                <label for="<?php echo $record['acc_num'] ?>" class="">
                                    <span><?php echo $record['acc_num']; ?> - <?php echo $record['bank_name']; ?></span>
                                </label>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <input type="submit" name="go" value="continue"
                                   class="submit form-control btn btn-block btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>