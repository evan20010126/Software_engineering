<?php
	include "db_conn_software.php";
	
	$product_name = $_REQUEST['product_name'];

    $query = ("SELECT product_id FROM product WHERE product_name = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($product_name)); //執行sql語法
    $result = $stmt->fetchAll();
    $val = $result[0][0];

	//使用prepare的寫法
    $product_id = $val; //前端要給我產品ID多少,傳入值"q"需與後端相同
    $stmt = $db->prepare("delete from product where product_id=?");
	$result = $stmt->execute(array($product_id));
	
?>