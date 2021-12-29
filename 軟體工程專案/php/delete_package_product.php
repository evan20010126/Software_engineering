<?php  
    include "db_conn_software.php";
    //input
    $user_account = $_REQUEST["user_account"];//"407";
    $product_name = $_REQUEST["product_name"];

    $query = ("SELECT product_id FROM product WHERE product_name = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($product_name)); //執行sql語法
    $result = $stmt->fetchAll();

    $product_id =$result[0][0]  ;
    
    //check cost
    $query = ("SELECT  product_price FROM product WHERE product_id = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($product_id)); //執行sql語法
    $result = $stmt->fetchAll();
    $cost = $result[0][0];

    $query = ("SELECT  product_id01, product_id02, product_id03, product_id04, product_id05, product_id06, product_id07, product_id08, product_id09, product_id10 ,cost FROM package WHERE user_account = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account)); //執行sql語法
    $result = $stmt->fetchAll();
    
    $cost = $result[0][10] - $cost ;

    if($result == NULL){
        $bool = -1;//not find user
        echo json_encode($bool);
    }
    else{
        $i = 0;
        for(;$i<10;$i++){
            if($result[0][$i]==$product_id)break;
        }
        if($i==10){
            $bool = 0;//have user but not find product;
            echo json_encode($bool);
        }
        else{
            if($result[0][1]==NULL){
                $stmt = $db->prepare("delete from package where user_account = ?");
	            $result = $stmt->execute(array($user_account));
                $bool = 2;//shopping car only one product need to delete it
                echo json_encode($bool);
            }       
            else{
                for(++$i;$i<=9;$i++){
                    $k = strval($i) ;
                    $k = "product_id0".$k;
                    $s="UPDATE package SET ".$k." = ? WHERE user_account =?";
                    $query = ($s);
                    $stmt = $db->prepare($query);    
                    $error = $stmt->execute(array($result[0][$i],$user_account)); 
                }
                $query = ("UPDATE package SET product_id10 = ? WHERE user_account = ?");
                $stmt = $db->prepare($query);     
                $error = $stmt->execute(array(NULL,$user_account)); 

                $query = ("UPDATE package SET cost = ? WHERE user_account = ?");
                $stmt = $db->prepare($query);     
                $error = $stmt->execute(array($cost,$user_account));

                $bool = 1;//shopping car have >=2 product need to reduce it
                echo json_encode($bool);
            }
        }
    }
//call back
//-1 : //not find user
// 0 : //have user but not find product;
// 1 : //shopping car have >=2 product need to reduce it
// 2 : //shopping car only one product need to delete it
?>



