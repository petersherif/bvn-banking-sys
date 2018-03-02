 <?php
 if (isset($_SESSION["ClientAccountId"]) && !empty($_SESSION["ClientAccountId"])){
		
		header("location:dashboard.php");
		exit();
	}?>
<!-- New client form -->
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
                    <form action="dashboard.php?new-client&client=add" class="form-box__form"  method="post">

                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Enter the Client's Full Name" name="username" id="fullname"
                                   class="form-control">
                        </div>
                        <?php if(isset($formError['username'])) echo $formError['username']; ?>

                        <div class="form-group">
                            <i class="fa fa-barcode"></i>
                            <input type="text" placeholder="Enter the Client's Nationallity ID" name="nat_id" id="nat-id"
                                   class="form-control">
                        </div>
                        <?php if(isset($formError['nat_id'])) echo $formError['nat_id']; ?>
                        <div class="form-group">
                            <i class="fa fa-birthday-cake"></i>
                            <input type="date" placeholder="Enter the Client's Birthdate" name="birthday" id="birthdate"
                                   class="form-control">
                        </div>
                        <?php if(isset($formError['birthday'])) echo $formError['birthday']; ?>
                        <div class="form-group">
                            <i class="fa fa-transgender"></i>
                            <select id="gender" class="form-control" name="gender">
                                <option value="0">Select the Client's Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <?php if(isset($formError['gender'])) echo $formError['gender']; ?>
                        <div class="form-group">
                            <i class="fa fa-map-marker"></i>
                            <input type="text" placeholder="Enter the Client's Address" name="address" id="address"
                                   class="form-control">
                        </div>
                        <?php if(isset($formError['address'])) echo $formError['address']; ?>
                        <div class="form-group">
                            <i class="fa fa-envelope"></i>
                            <input type="text" placeholder="Enter the Client's Email Address" name="email" id="email"
                                   class="form-control">
                        </div>
                        <?php if(isset($formError['email'])) echo $formError['email']; ?>
                        <div class="form-group">
                            <i class="fa fa-phone"></i>
                            <input type="text" placeholder="Enter the Client's Phone Number" name="phone" id="phone-num"
                                   class="form-control">
                        </div>
                        <?php if(isset($formError['phone'])) echo $formError['phone']; ?>
                        <div class="form-group">
                            <i class="fa fa-thumbs-up"></i>
                            <input type="text" placeholder="Scan the Client's Fingerprint" name="fingerprint" id="fingerprint"
                                   class="form-control">
                        </div>
                        <?php if(isset($formError['fingerprint'])) echo $formError['fingerprint']; ?>
                        <div class="form-group">
                            <i class="fa fa-user-circle"></i>
                            <input type="file" placeholder="Upload the Client's Picture" name="photo" id="picture"
                                   class="form-control">
                        </div>
                        <?php if(isset($formError['photo'])) echo $formError['photo']; ?>
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