<?php

if (isset($_GET['money-transfer'])) {
    ?>
    <?php include('./money-transfer.php');
} ?>

<?php
if (isset($_GET['deposit'])) {
    ?>
    <?php include('./deposit.php');
} ?>
<?php
if (isset($_GET['withdraw'])) {
    ?>
    <?php include('./withdraw.php');
} ?>

<?php
if (isset($_GET['new-client'])) {
    ?>
    <?php include('./new-client.php');
} ?>
<?php
if (isset($_GET['add-employee'])) {
    ?>
    <?php include('./add-employee.php');
} ?>

<?php
if (isset($_GET['dashboard.php'])) {
    ?>
    <?php include('./main.php');
} ?>

