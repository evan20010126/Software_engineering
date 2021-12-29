<?php  //感覺edit_product_1&2可以合併 若需合併再告訴我
    include "db_conn_software.php";
    //input
    $user_account="all";//$_REQUEST["user_account"];
    $product_id=11;//$_REQUEST["product_id"];
    
    $query = ("SELECT  product_id01, product_id02, product_id03, product_id04, product_id05, product_id06, product_id07, product_id08, product_id09, product_id10 FROM package WHERE user_account = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account)); //執行sql語法
    $result = $stmt->fetchAll();
    //echo($result[0][3]);
    //echo json_encode($result);
    //echo(" ");
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
            if($result[0][1]==NULL){//shopping car only one product need to delete it
                //$stmt = $db->prepare("delete from package where user_account = ?");
	            //$result = $stmt->execute(array($user_account));
                $bool = 2;//have user but not find product;
                echo json_encode($bool);
            }       
            else{//shopping car have >=2 product need to reduce it
                for(++$i;$i<=9;$i++){
                    $k = strval($i) ;
                    $k = "product_id0".$k;
                    $s="UPDATE package SET ".$k." = ? WHERE user_account =?";
                    $query = ($s);
                    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
                    $error = $stmt->execute(array($result[0][$i],$user_account)); //執行sql語法
                }
                $query = ("UPDATE package SET product_id10 = ? WHERE user_account = ?");
                $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
                $error = $stmt->execute(array(NULLIF(),$user_account)); //執行sql語法
                $bool = 1;//have user but not find product;
                echo json_encode($bool);
            }
        }
    }

?>