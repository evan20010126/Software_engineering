<?php
    include "db_conn_software.php";
    $user_account = $_REQUEST["q"]; //web passing URL q=
    $coupon_code = $_REQUEST["s"]; //web passing URL s=
    $T_stamp = $_REQUEST["r"]; //web passing URL r=
    /*---------------------to give sum----------------------*/
    
    $query = ("SELECT  product_id01, product_id02, product_id03, product_id04, product_id05, product_id06, product_id07, product_id08, product_id09, product_id10 FROM package WHERE user_account =  ? ");
    $stmt = $db->prepare($query);           //db為db_conn.php新建的連線物件 
    /*$error = $stmt->execute();*/
    $error = $stmt->execute(array($user_account)); //用array去傳進?
    $result = $stmt->fetchAll();                //將所有搜尋結果存於result
    /*---------------------connect database & prepare statement----------------------*/
    $nowtotal = 0;
    for ($i = 0; $i < 10 && $result[0][$i]!=NULL ; $i++) 
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
   if($result[0][0] != NULL){
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
   }
   //nowtotal : is total price include dis coupon
//------------------------------------------------------------------------------------
    //create product_list
   
    
    $query = ("SELECT  product_id01, product_id02, product_id03, product_id04, product_id05, product_id06, product_id07, product_id08, product_id09, product_id10 FROM package WHERE user_account =  ? ");
    $stmt = $db->prepare($query);           //db為db_conn.php新建的連線物件 
    /*$error = $stmt->execute();*/
    $error = $stmt->execute(array($user_account)); //用array去傳進?
    $result = $stmt->fetchAll();                //將所有搜尋結果存於result
    /*---------------------connect database & prepare statement----------------------*/
    $product_arr = array();
    for ($i = 0; $i < 10 && $result[0][$i]!=NULL ; $i++) 
    {
        array_push($product_arr, $result[0][$i]);        
    }
    //echo json_encode($product_arr);
    //$output_arr = array();
    $k=0;
    $product_list="";
    for($i = 0 ; $i <count($product_arr); $i++){
        if($product_arr[$i]!=-999999){
            $counter=1;
            for($j = 0; $j<count($product_arr); $j++){
                if($product_arr[$i]==$product_arr[$j]&&$i!=$j){
                    $counter++;
                    $product_arr[$j]=-999999;
                }
            }
            $query = ("SELECT  product_name FROM product WHERE product_id = ? ");
            $stmt = $db->prepare($query);
            $error = $stmt->execute(array($product_arr[$i])); //product_arr本身就是陣列
            $result = $stmt->fetchAll();
            if($k!=0){
                $product_list = $product_list . " , ";
            }
            $k++;
            $product_list = $product_list . $result[0][0];;
            $product_list = $product_list . "*";
            $product_list = $product_list . $counter;
            $product_arr[$i]=-999999;
        }
    }


//************************************************************************** 
    //insert to order_list
    $the_order = array();
    array_push($the_order, $user_account, $product_list, $nowtotal, $T_stamp, -1);
    $query = ("INSERT INTO order_list (user_account,product_list,cost,T_stamp,is_finish) VALUES (?, ?, ?, ?, ?)");
    $stmt = $db->prepare($query);
    $result = $stmt->execute($the_order); 



    ///////////把購物車東西全部刪掉的code/////////////////
    $stmt = $db->prepare("delete from package where user_account=?");
	$result = $stmt->execute(array($user_account));
    // json_encode
?>