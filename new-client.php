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
                    <form action="" class="form-box__form">

                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Enter the Client's Full Name" id="fullname"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-barcode"></i>
                            <input type="text" placeholder="Enter the Client's Nationallity ID" id="nat-id"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-birthday-cake"></i>
                            <input type="date" placeholder="Enter the Client's Birthdate" id="birthdate"
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
                            <input type="text" placeholder="Enter the Client's Email Address" id="email"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-phone"></i>
                            <input type="text" placeholder="Enter the Client's Phone Number" id="phone-num"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-thumbs-up"></i>
                            <input type="text" placeholder="Scan the Client's Fingerprint" id="fingerprint"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <i class="fa fa-user-circle"></i>
                            <input type="file" placeholder="Upload the Client's Picture" id="picture"
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