<?php
    session_start();
    $user =  $_SESSION['user']; //資料庫使用者名稱
    echo json_encode($user);
?>