<?php
    /*---------------------connect database & prepare statement----------------------*/
    include "db_conn_software.php";

    $user_account = $_REQUEST["q"]; //web passing URL q=
    $coupon_code = $_REQUEST["s"]; //web passing URL s=
     
     $query = ("SELECT  product_id01, product_id02, product_id03, product_id04, product_id05, product_id06, product_id07, product_id08, product_id09, product_id10 FROM package WHERE user_account =  ? ");
     $stmt = $db->prepare($query);           //db為db_conn.php新建的連線物件 
     /*$error = $stmt->execute();*/
     $error = $stmt->execute(array($user_account)); //用array去傳進?
     $result = $stmt->fetchAll();                //將所有搜尋結果存於result
     /*---------------------connect database & prepare statement----------------------*/
     $nowtotal = 0;
     if(isset($result[0][0]) == NULL)
     {
         echo json_encode(null);
     }
     else{
        for ($i = 0; $i < 10 && isset($result[0][$i]) !=NULL ; $i++) 
        {
           //array_push($product_arr, $result[0][$i]);  
           $query = ("SELECT product_price FROM product WHERE product_id  =  ? ");
           $stmt = $db->prepare($query);
           $error = $stmt->execute(array($result[0][$i])); //product_arr本身就是陣列
           $newresult = $stmt->fetchAll();
           $nowtotal += $newresult[0][0];
        }
                   //將所有搜尋結果存於result
       /*---------------------connect database & prepare statement----------------------*/
       if(isset($result[0][0]) != NULL){
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
     }  
?>