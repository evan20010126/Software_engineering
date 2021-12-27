<?php
    // 設置資料類型 json，編碼格式 utf-8
    //header('Content-Type: application/json; charset=UTF-8');
    include "db_conn_software.php";

    $product_name = @$_POST['product_name'];
	$product_info = @$_POST['product_info'];
	$product_pic = @$_POST['product_pic'];
	$product_price = @$_POST['product_price'];
    $query = ("SELECT product_name, product_info, product_pic, product_price FROM product WHERE product_name ='product_name%'"); //where語法不確定是否正確 但執行出來是沒有錯誤    
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();

    for($i=0;$i<count($result);$i++){
        echo json_encode(array('product_name','product_info','product_pic','product_price'));
    }
?>
