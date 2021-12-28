<?php  //感覺edit_product_1&2可以合併 若需合併再告訴我
    include "db_conn_software.php";
    
    //Line5~11前端需要與後端參數對應
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_info = $_POST["product_info"];
    $product_pic = $_POST["product_pic"];
    $product_price = $_POST["product_price"];
    $product_supply = $_POST["product_supply"];

    $query = ("UPDATE product SET product_name=?, product_info=?, product_pic=?,product_price=?, product_supply WHERE product_id =?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($product_name,$product_info,$product_pic,$product_price,$product_supply,$product_id)); //執行sql語法
    //$result = $stmt->fetchAll();
    //echo json_encode($result);
?>