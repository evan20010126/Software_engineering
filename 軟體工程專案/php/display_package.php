<?php
    /*---------------------connect database & prepare statement----------------------*/
    include "db_conn_software.php";

    $user_account = $_REQUEST["q"]; //web passing URL q=
    
    $query = ("SELECT  product_id01, product_id02, product_id03, product_id04, product_id05, product_id06, product_id07, product_id08, product_id09, product_id10 FROM package WHERE user_account =  ? ");
    $stmt = $db->prepare($query);           //db為db_conn.php新建的連線物件 
    /*$error = $stmt->execute();*/
    $error = $stmt->execute(array($user_account)); //用array去傳進?
    $result = $stmt->fetchAll();                //將所有搜尋結果存於result
    /*---------------------connect database & prepare statement----------------------*/
    $product_arr = array();
    for ($i = 0; $i < count($result[0]); $i++) 
    {
        if (isset($result[0][$i])){
            array_push($product_arr, $result[0][$i]);        
        }
    }
    
    if(count($product_arr) != 0){ //如果購物車裡面有東西才抓說產品的名稱跟價錢
        // $product_arr
        $space = "?"; //因為一定有東西才會跑進來
        for ($i = 1; $i < count($product_arr); $i++){
            $space .= " OR product_id = ? ";
        }
        $query = ("SELECT  product_name,product_price FROM product WHERE product_id = " . $space);
        $stmt = $db->prepare($query);
        $error = $stmt->execute($product_arr); //product_arr本身就是陣列
        $result = $stmt->fetchAll();

    }
    

    echo json_encode($result);
    // json_encode
    [{product_name,product_price} , {...}, {...}]
    //cout << 購物車內的product_
?> 