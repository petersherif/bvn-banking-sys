<?php
if (isset($_GET['search-employees'])) {
    include('./dashboard/search-employee.php');
}
if (isset($_GET['money-transfer'])) {
    include('./dashboard/money-transfer.php');
}
if (isset($_GET['deposit'])) {
    include('./dashboard/deposit.php');
}
if (isset($_GET['withdraw'])) {
    include('./dashboard/withdraw.php');
}
if (isset($_GET['new-client'])) {
    include('./dashboard/new-client.php');
}
if (isset($_GET['add-employee'])) {
    include('./dashboard/add-employee.php');
}
if (isset($_GET['search-clients'])) {
    include('./dashboard/search-clients.php');
}
if (isset($_GET['client-profile'])) {
    include('./dashboard/client-profile.php');
}
if (isset($_GET['profile'])) {
    include('./dashboard/emp-profile.php');
}
if (isset($_GET['view-transactions'])) {
    include('./dashboard/view-transactions.php');
} ?>

