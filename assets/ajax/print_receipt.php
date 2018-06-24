<?php
include_once('../../includes/connect.php');
session_start();

if (isset($_GET['print_receipt'])) {
	$sql = "SELECT * FROM `transaction` ORDER BY id DESC LIMIT 1";
	$query = connect()->query($sql);
	$row = mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
	
	<p>
		<span class="w4 dib">trans#</span>
		<span class="w4 dib">date</span>
		<span class="w4 dib">time</span>
	</p>
	<p>
		<span class="w4 dib"><?php echo $row[0]["id"]; ?></span>
		<span class="w4 dib"><?php echo date("Y/m/d"); ?></span>
		<span class="w4 dib"><?php echo date("h:i:sa"); ?></span>
	</p>
</div>
<div class="receipt-paper__sub-header pl3">
	<p>card : <?php echo substr($_SESSION['cardNumber'],0,7)."*****".substr($_SESSION['cardNumber'],12,16);  ;?> </p>
	<?php if ($row[0]["type"] == 1) { ?>
		<p class="f3 b">withdrawal transaction</p>
	<?php } else if($row[0]["type"] == 0) { ?>
		<p class="f3 b">deposit transaction</p>
	<?php } ?>
</div>
<div class="receipt-paper__body pt4 tj">
	<p>
		<?php if ($row[0]["type"] == 1) { ?>
			<span class="pr2">amount withdrawn</span> :
		<?php } else if($row[0]["type"] == 0) { ?>
			<span class="pr2">amount deposited</span> :
		<?php } ?>
		<span class="pl4"><?php echo $row[0]["amount"]; ?> EGP</span></p>
<?php
}