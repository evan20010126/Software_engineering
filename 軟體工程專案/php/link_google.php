<?php
require_once('vendor/autoload.php');

//C:\xampp\php\PEAR download ->  composer require google/apiclient # apt install composer

// https://developers.google.com/identity/protocols/googlescopes
// * Google_Service_Oauth2::USERINFO_EMAIL = https://www.googleapis.com/auth/userinfo.email
// * Google_Service_Oauth2::USERINFO_PROFILE = https://www.googleapis.com/auth/userinfo.profile
// * $gclient->addScope(['https://www.googleapis.com/auth/userinfo.email', Google_Service_Oauth2::USERINFO_PROFILE]);
$gclient = new Google_Client();
$gclient->setAuthConfig('credentials.json');
$gclient->setAccessType('offline'); // offline access
$gclient->setIncludeGrantedScopes(true); // incremental auth
$gclient->addScope([Google_Service_Oauth2::USERINFO_EMAIL, Google_Service_Oauth2::USERINFO_PROFILE]);
$gclient->setRedirectUri('http://ntoucise.ddns.net/%e8%bb%9f%e9%ab%94%e5%b7%a5%e7%a8%8b%e5%b0%88%e6%a1%88/food_menu.html'); // 寫憑證設定：「已授權的重新導向 URI 」的網址

$google_login_url = $gclient->createAuthUrl(); // 取得要點擊登入的網址

// 登入後，導回來的網址會有 code 的參數
if (isset($_GET['code']) && $gclient->authenticate($_GET['code'])) {
    $token = $gclient->getAccessToken(); // 取得 Token
    // $token data: [
    // 'access_token' => string
    // 'expires_in' => int 3600
    // 'scope' => string 'https://www.googleapis.com/auth/userinfo.email openid https://www.googleapis.com/auth/userinfo.profile' (length=102)
    // 'created' => int 1550000000
    // ];
    $gclient->setAccessToken($token); // 設定 Token

    $oauth = new Google_Service_Oauth2($gclient);
    $profile = $oauth->userinfo->get();

    $uid = $profile->id; // Primary key
    print_r($profile); // 自行取需要的內容來使用囉~
    echo json_encode($profile);
} else {
    // 直接導向登入網址
    header('Location: ' . $google_login_url);
    exit;
}
?>