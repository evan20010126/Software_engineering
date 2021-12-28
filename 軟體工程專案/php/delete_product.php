<?php
	include "db_conn_software.php";
	
	//使用prepare的寫法
    $product_id = $_REQUEST["q"]; //前端要給我產品ID多少,傳入值"q"需與後端相同
    $stmt = $db->prepare("delete from product where product_id=?");
	$result = $stmt->execute(array($product_id));
	
	//直接刪除的寫法
	//$result=$db->exec("delete from employee where ID='00557888' ");
?>