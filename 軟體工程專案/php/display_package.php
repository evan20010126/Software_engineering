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
    if(isset($result[0][0]) == NULL)
    {
        echo json_encode(null);
    }
    else{
        for ($i = 0; $i < 10 && isset($result[0][$i]) !=NULL ; $i++) 
        {
            array_push($product_arr, $result[0][$i]);        
        }
        //echo json_encode($product_arr);
        // $output_arr = array();
        $answer_arr = array();
        for($i = 0 ; $i <count($product_arr); $i++){
            if($product_arr[$i]!=-999999){
                $counter=1;
                for($j = 0; $j<count($product_arr); $j++){
                    if($product_arr[$i]==$product_arr[$j]&&$i!=$j){
                        $counter++;
                        $product_arr[$j]=-999999;
                    }
                }
                $query = ("SELECT  product_name,product_price FROM product WHERE product_id = ? ");
                $stmt = $db->prepare($query);
                $error = $stmt->execute(array($product_arr[$i])); //product_arr本身就是陣列
                $result = $stmt->fetchAll();
                $output_arr[$i]["product_name"] = $result[0][0];
                $output_arr[$i]["product_price"] = $result[0][1];
                $output_arr[$i]["product_number"] = $counter; 
                // 改寫
                $sub_obj["product_name"] = $output_arr[$i]["product_name"];
                $sub_obj["product_price"] = $output_arr[$i]["product_price"];
                $sub_obj["product_number"] = $output_arr[$i]["product_number"];
                array_push($answer_arr, $sub_obj);
                $product_arr[$i]=-999999;
            }
        }
        echo json_encode($answer_arr);
     
        // json_encode
        //[{product_name,product_price} , {...}, {...}]
        //cout << 購物車內的product_
    }
    
?> 
