<?php
    /*---------------------connect database & prepare statement----------------------*/
    include "db_conn_software.php";
    
    $query = ("select product_id, product_name, product_info, product_pic, product_price from product");    
    $stmt = $db->prepare($query);           //db為db_conn.php新建的連線物件 
    $error = $stmt->execute();
    /*$error = $stmt->execute(array($no));*/
    $result = $stmt->fetchAll();                //將所有搜尋結果存於result
    /*---------------------connect database & prepare statement----------------------*/
    // $output = [];
    // for(var $i = 0; i < $result.length(); i++){
    //     $output[i] = $result[0][]
    // }
    echo json_encode($result);
?>