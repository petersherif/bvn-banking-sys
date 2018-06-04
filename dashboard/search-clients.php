<?php include "./controller/SearchClientsController.php" ?>

<!-- All Clients table -->
<section class="search-table">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section__heading text-center color-text">All Clients</h2>
            </div> <!-- Section Heading -->
        </div> <!-- Heading Row -->

        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="light-box table-box data-listing-box">

                    <div class="row">
                        <div class="col-xs-12 ph4 search-bar">
                            <div class="form-group mv2">
                                <input type="search" class="form-control search-bar__input"
                                       placeholder="Search clients by name, account number, or national ID"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="table__rows">
                                <li class="table__row">
                                    <span class="row__cell row__cell--heading">Name</span>
                                    <span class="row__cell row__cell--heading">Account Number</span>
                                    <span class="row__cell row__cell--heading">National ID</span>
                                    <span class="row__cell row__cell--heading">Balance</span>
                                    <span class="row__cell row__cell--heading">Actions</span>
                                </li>
                                <?php foreach ($row as $record) { ?>
                                    <li id="item-<?php $record['id'] ?>" class="table__row data-row"
                                        data-search="<?php echo $record["full_name"] ?><?php echo $record["acc_num"] ?><?php echo $record["national_id"] ?><?php echo $record["balance"] ?>">
                                        <span class="row__cell"
                                              title="<?php echo $record["full_name"] ?>"><?php echo $record["full_name"] ?></span>
                                        <span class="row__cell"
                                              title="<?php echo $record["acc_num"] ?>"><?php echo $record["acc_num"] ?></span>
                                        <span class="row__cell"
                                              title="<?php echo $record["national_id"] ?>"><?php echo $record["national_id"] ?></span>
                                        <span class="row__cell"
                                              title="<?php echo $record["balance"] ?>"><?php echo $record["balance"] ?></span>
                                        <span class="row__cell">
                                              <a href="home.php?profile&id=<?php echo $record['id']; ?>"
                                                 class="btn btn-primary--custom btn-sm mh2 mv1">View</a>
                                            <button value="<?php echo $record['id']; ?>"
                                                    class="btn btn-danger--custom btn-sm mh2 mv1 send_id"
                                                    data-toggle="modal" data-target="#myModal"><i
                                                        class="fa fa-times"></i> Delete</button></span>


                                        <!-- The Modal -->
                                        <div class="modal fade" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><span class="warning">Warning<span></h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        Are You Sure !<br>
                                                        You Want To Delete This Client ? </br>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <form method="post" action="?search-clients">
                                                            <input type="hidden" id="get_id" name="id" value=""/>
                                                            <button type="submit" class="btn btn-danger--custom"><i
                                                                        class="fa fa-times"></i> Delete
                                                            </button>
                                                            <a class="btn btn-primary--custom" data-dismiss="modal"
                                                               href="#">Close</a>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                        </span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Client Details</h4>
                </div>
                <div class="modal-body">

                    <div class="profile__avatar">
                        <img src="./assets/files/users/thumb/521421311.jpg" style="width: 570px;height: 200px;"
                             id="usr_img"/>
                    </div>
                    <div class="col-xs-12">

                        <div class="profile__info">

                            <p class="info__text"><span class="info__title">Name : <span id="name"></span> </span></p>
                            <p class="info__text"><span class="info__title">Email : <span id="email"></span> </span></p>
                            <p class="info__text"><span class="info__title">Nat ID :  <span id="nat_id"></span> </span>
                            </p>
                            <p class="info__text"><span class="info__title">Birthday : <span
                                            id="birthday"></span> </span></p>
                            <p class="info__text"><span class="info__title">Gender :  <span id="gender"></span>  </span>
                            </p>
                            <p class="info__text"><span class="info__title">Address : <span id="address"></span> </span>
                            </p>
                            <p class="info__text"><span class="info__title">Phone :  <span id="phone"></span>  </span>
                            </p>
                            <p class="info__text"><span class="info__title">Acc No. :  <span
                                            id="acc_num"></span>  </span></p>
                            <p class="info__text"><span class="info__title">Balance :  <span
                                            id="balance"></span>  </span></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!--END - Modal -->

</section>


<!-- jQuery v.3.3.1 Library -->
<script src="assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap v.3.3.7 JS -->
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Chart.js Library -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/main.js"></script>

<script src="assets/ajax/ajax.js"></script>

<script type="text/javascript">

    $(document).ready(function () {

        $(document).on("click", ".daa", function () {

            var userid = $(this).data('id');

            $("#idd").attr('data-id', userid);

            $.ajax({
                type: "post",
                url: "../bvn-banking-sys/assets/ajax/ajax_search_clients.php",

                data: {'userid': userid},
                success: function (msg) {

                    data = JSON.parse(msg);
                    if (data["response"] == 0) {
                        $("#name").text(data["name"]);
                        $("#email").html(data["email"]);
                        $("#nat_id").html(data["nat_id"]);
                        $("#birthday").html(data["birthday"]);
                        $("#gender").html(data["gender"]);
                        $("#address").text(data["address"]);
                        $("#phone").text(data["phone"]);
                        $("#img").attr('src', data["img"]);
                        $("#acc_num").text(data["acc_num"]);
                        $("#balance").text(data["balance"]);

                    }
                },
                complete: function () {
                }
            });


        });

    });

</script>