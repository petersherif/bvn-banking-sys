<?php
$sql = "SELECT * FROM users JOIN accounts WHERE users.auth = 0 AND users.id = accounts.user_id ";
$query = connect()->query($sql);
$row = mysqli_fetch_all($query,MYSQLI_ASSOC);