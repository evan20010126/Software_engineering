<?php
    include "db_conn_software.php";
	$product_name = $_REQUEST['product_name'];//Line3,4前端需與後端對照
	$product_supply = $_REQUEST["product_supply"];

	/*----- 用product_name搜尋product_id -----*/
	$query = ("SELECT product_id FROM product WHERE product_name = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($product_name)); //執行sql語法
    $result = $stmt->fetchAll();
    $val = $result[0][0];
	$product_id = $val;

	/*----- 更新產品供需 -----*/
	$query = ("UPDATE product SET product_supply=? WHERE product_id=?");
	$stmt = $db->prepare($query);
	$result=$stmt->execute(array($product_supply,$product_id));
?>