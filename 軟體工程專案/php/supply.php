<?php
    include "db_conn_software.php";
	$product_id = $_POST["product_id"];//Line3,4前端需與後端對照
	$product_supply = $_POST["product_supply"];

	$query = ("UPDATE product SET product_supply=? WHERE product_id=?");

	$stmt = $db->prepare($query);
	$result=$stmt->execute(array($product_supply,$product_id));
?>