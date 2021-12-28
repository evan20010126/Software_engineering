<?php  //感覺edit_product_1&2可以合併 若需合併再告訴我
    include "db_conn_software.php";
    //input
    $user_account="405";//$_REQUEST["user_account"];
    $product_id=7;//$_REQUEST["product_id"];
    
    $query = ("SELECT  product_id01, product_id02, product_id03, product_id04, product_id05, product_id06, product_id07, product_id08, product_id09, product_id10 FROM package WHERE user_account = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account)); //執行sql語法
    $result = $stmt->fetchAll();

    if($result == NULL){
        $bool = -1;//not find user
        echo json_encode($bool);
    }
    else{
        $i = 0;
        for(;$i<count($result[0]);$i++){
            if($result[0][$i]==$product_id)break;
        }
        if($i==count($result[0])){
            $bool = 0;//have user but not find product;
            echo json_encode($bool);
        }
        else{
            $product_arr = array();
            for ($j = 0; $j < count($result[0]); $j++){
                if (isset($result[0][$i])){
                    array_push($product_arr, $result[0][$i]); 
                }
                else{
                    break;
                }
            }
            echo(count($product_arr));
            echo("  ");
            echo(count($result[0]));
            echo("  ");
            echo($i);
            /*if(count(product_arr)==3){//shopping car only one product need to delete it
                $stmt = $db->prepare("delete from package where user_account = ?");
	            $result = $stmt->execute(array($user_account));
                $bool = 2;//have user but not find product;
                echo json_encode($bool);
            }       
            else{//shopping car have >=2 product need to reduce it
                for(;$i<count($result[0]);$i++){
                    echo($i);
                    $k = $i - 3;
                    strval($var_name);
                    if($k!=10){
                        $k = "0".$k;
                    }
                    $query = ("UPDATE package SET product_id".$k." = ? WHERE user_account =?");
                    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
                    $error = $stmt->execute(array($k,$array[k+1],$user_account)); //執行sql語法
                }
                $bool = 1;//have user but not find product;
                echo json_encode($bool);
            }*/
        }
    }

?>