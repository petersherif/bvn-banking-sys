<?php
if (isset($_GET['search-employees'])) {
    include('./dashboard/search-employee.php');
}
if (isset($_SESSION['loggedAccount']) && isset($_GET['money-transfer'])) {
    include('./dashboard/money-transfer.php');
}
if (isset($_GET['deposit'])) {

    include('./dashboard/deposit.php');
}
if (isset($_SESSION['loggedAccount']) && isset($_GET['withdraw'])) {
    include('./dashboard/withdraw.php');
}
if (isset($_SESSION['loggedbvn']) && !isset($_SESSION['loggedAccount']) && isset($_GET['add-account'])) {
    include('./dashboard/addAccount.php');
}
if (isset($_GET['bvn_registration'])) {
    include('./dashboard/bvn_registration.php');
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
if (isset($_SESSION['loggedAccount']) && isset($_GET['view-transactions'])) {
    include('./dashboard/view-transactions.php');
}
if (isset($_GET['pre-select-acc'])) {
    include('./dashboard/pre-select-acc.php');
}

// ATM content
if (isset($_GET['atm-main-options'])) {
    include('./dashboard/atm-main-options.php');
}
if (isset($_GET['atm-balance-inquiry'])) {
    include('./dashboard/atm-balance-inquiry.php');
}
if (isset($_GET['atm-withdraw-options'])) {
    include('./dashboard/atm-withdraw-options.php');
}
if (isset($_GET['atm-withdraw-custom'])) {
    include('./dashboard/atm-withdraw-custom.php');
}
if (isset($_GET['atm-finish'])) {
    include('./dashboard/atm-finish.php');
}
if (isset($_GET['atm-choose-account'])) {
    include('./dashboard/atm-choose-account.php');
}
if (isset($_GET['atm-deposit'])) {
    include('./dashboard/atm-deposit.php');
}

?>

