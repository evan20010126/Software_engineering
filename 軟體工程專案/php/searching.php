<?php
	//連線到資料庫 
	require_once('db_conn_software.php');
	if(empty($_POST['searching_bar'])){ //SDD文件沒有搜尋欄這個資料結構 
        echo '請輸入欲查詢品項名稱<br>'; //這邊先給它叫做searching_bar
		exit(); //啊我不知道這個echo有沒有存在的必要@@
	}

	$product_name = $_POST['product_name'];
	$product_info = $_POST['product_info'];
	$product_pic = $_POST['product_pic'];
	$product_price = $_POST['product_price'];
	$sql = sprintf(
        //帶入參數: %s , %d
        "SELECT product_name, product_info, product_pic, product_price FROM Product WHERE product_name ='product_name%' ",
        $product_name,
        $product_info,
        $product_pic,
		$product_price
    );
	echo $sql . '<br>';

    //執行結果儲存再 $result這個變數中
    $result = $edit -> query($sql);
    if(!$result){
        die($edit->error);
    }

    header("Location: ");//會自動跳轉的地方 但不知道要跳到哪個頁面暫時為空

?>