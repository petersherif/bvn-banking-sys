<?php
$sql = "SELECT * FROM users WHERE auth != 0";
$query = connect()->query($sql);
$row = mysqli_fetch_all($query,MYSQLI_ASSOC);