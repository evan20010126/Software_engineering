<?php
    include "db_conn_software.php";
    
    $searching_bar = $_REQUEST["q"]; //前端要設變數給我ˋˊ
    
    //$product_name = @$_POST['product_name'];
	//$product_info = @$_POST['product_info'];
	//$product_pic = @$_POST['product_pic'];
	//$product_price = @$_POST['product_price'];
    $query = ("SELECT product_name, product_info, product_pic, product_price FROM product WHERE product_name ='q'");   
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();

    echo json_encode($result);
  
?>
