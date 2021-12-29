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

    if($result == NULL){
        $query = ("INSERT INTO package (user_account, product_id01, cost)VALUES (?,?,?)");
        $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
        $error = $stmt->execute(array($user_account,$product_id,$cost)); //執行sql語法
        $bool = 0;//not find user creat
        echo json_encode($bool);
    }
    else{
        $i = 0;
        for(;$i<10;$i++){
            if($result[0][$i]==NULL)break;
        }
        if($i==10){
            $bool = -1;//full can't put any thing
            echo json_encode($bool);
        }
        else{
            $i++;
            $k = strval($i) ;
            if($i<10){
                $k = "product_id0".$k;
            }
            else{
                $k = "product_id".$k;
            }
            $s="UPDATE package SET ".$k." = ? WHERE user_account =?";
            $query = ($s);
            $stmt = $db->prepare($query);    
            $error = $stmt->execute(array($product_id , $user_account));
            //recost
            $cost+=$result[0][10];
            $s="UPDATE package SET cost = ? WHERE user_account =?";
            $query = ($s);
            $stmt = $db->prepare($query);    
            $error = $stmt->execute(array($cost , $user_account));

            $bool = 1;//have user update product
            echo json_encode($bool);
        }
    }
//call back
//-1 : //full can't put any thing
// 0 : //not find user
// 1 : //have user update product
?>



