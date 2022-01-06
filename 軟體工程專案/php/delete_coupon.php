<?php
	include "db_conn_software.php";
	
	$coupon_code = $_REQUEST["coupon_code"];

    $stmt = $db->prepare("DELETE FROM coupon where coupon_code=?");
	$result = $stmt->execute(array($coupon_code));
?>