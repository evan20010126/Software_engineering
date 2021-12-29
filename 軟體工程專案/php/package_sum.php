<?php
    /*---------------------connect database & prepare statement----------------------*/
    include "db_conn_software.php";

    $user_account = $_REQUEST["q"]; //web passing URL q=
    $coupon_code = $_REQUEST["s"]; //web passing URL s=
    $query = ("SELECT cost FROM package WHERE user_account =  ? ");
    $stmt = $db->prepare($query);           //db為db_conn.php新建的連線物件 
    /*$error = $stmt->execute();*/
    $error = $stmt->execute(array($user_account)); //用array去傳進?
    $result = $stmt->fetchAll();                //將所有搜尋結果存於result
    /*---------------------connect database & prepare statement----------------------*/
    if($result != NULL){
        $nowtotal = $result[0][0];
        if ($coupon_code != NULL){
            $query = ("SELECT  * FROM coupon WHERE coupon_code = ? ");
            $stmt = $db->prepare($query);
            $error = $stmt->execute(array($coupon_code)); 
            $result = $stmt->fetchAll();
            if(isset($result[0])){
                if($result[0]["is_persentoff"] == 1){
                    $nowtotal = ceil($nowtotal * $result[0]["num"]);
                }
                else{
                    $nowtotal = $nowtotal - $result[0]["num"];
                }
            }
        }
        echo json_encode($nowtotal);
    }
?>