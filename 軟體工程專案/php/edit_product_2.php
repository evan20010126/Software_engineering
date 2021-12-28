<?php  //感覺edit_product_1&2可以合併 若需合併再告訴我
    include "db_conn_software.php";
    
    $boss_account = $_REQUEST["q"]; //Line5~11前端需要與後端參數對應
    $product_id = $_POST["id"];
    $product_name = $_POST["product_name"];
    $product_info = $_POST["product_info"];
    $product_pic = $_POST["product_pic"];
    $product_price = $_POST["product_price"];
    $product_supply = $_POST["product_supply"];

    $query = ("UPDATE product SET product_name=?, product_info=?, product_pic=?,product_price=?, product_supply WHERE id =?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();

    echo json_encode($result);
?>