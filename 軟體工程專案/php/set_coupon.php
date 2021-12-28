<?php
    include "db_conn_software.php";
    //$boss_account = $_REQUEST["boss_acc"];
    $coupon_code = $_POST["coupon_code"];//Line4~Line6前端需同步
    $num = $_POST["num"];
    $is_persentoff= $_POST["is_persentoff"];

    $query = ("INSERT INTO coupon VALUES(?,?,?)");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($coupon_code,$num,$is_persentoff)); //執行sql語法
    $result = $stmt->fetchAll();
    //echo json_encode($result);
    //預設不用回傳值
?>
