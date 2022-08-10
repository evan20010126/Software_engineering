<?php
require_once('vendor/autoload.php');
header('Access-Control-Allow-Origin:*' );
header('Access-Control-Allow-Methods:*' );

//header('Content-Type: application/json; charset=UTF-8');
/*
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
$gclient->setRedirectUri('http://ntou.ddns.net/%e8%bb%9f%e9%ab%94%e5%b7%a5%e7%a8%8b%e5%b0%88%e6%a1%88/food_menu.html'); // 寫憑證設定：「已授權的重新導向 URI 」的網址

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
}*/
$client = new Google_Client();
// 代入從 API console 下載下來的 client_secret
$client->setAuthConfig('credentials.json');

// 加入需要的權限（Google Drive API）
// 也可以使用 url，例如：https://www.googleapis.com/auth/drive.metadata.readonly
$client->addScope(['profile', Google_Service_Drive::DRIVE_METADATA_READONLY]);

// 設定 redirect URI，登入認證完成會導回此頁
//$client->setRedirectUri('http://ntou.ddns.net/%e8%bb%9f%e9%ab%94%e5%b7%a5%e7%a8%8b%e5%b0%88%e6%a1%88/food_menu.html');
$client->setRedirectUri('https://reurl.cc/mGloRA');


// 不需要透過使用者介面就可以 refresh token
$client->setAccessType('offline');
// 支援 Incremental Authorization 漸進式擴大授權範圍
$client->setIncludeGrantedScopes(true);

// 產生登入用的 URL
$authUrl = $client->createAuthUrl();
// 導至登入認證畫面
header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));

$client = new Google_Client();
// 代入從 API console 下載下來的 client_secret
$client->setAuthConfig('client_secret.json');

// Authorization code
$code = $_GET['code'];
$client->authenticate($code);

// 取得 Access Token
$accessToken = $client->getAccessToken();
$client = new Google_Client();
// 代入 Access Token
$client->setAccessToken($accessToken);

// 取得使用者資訊
//$oauth = new Google_Service_Oauth2($client);
//$userinfoObj = $oauth->userinfo->get();
$service = new Google_Service_Oauth2($client);
$user_info = $service->userinfo->get();

$open_id = $user_info->id;
$_SESSION['user']=$oauth;

//session_start();
//$_SESSION['user']=$oauth;
//echo json_encode($oauth);
// 取得 Google Drive 檔案清單
$drive = new Google_Service_Drive($client);
$results = $drive->files->listFiles([]);

if (count($results->getFiles()) === 0) {
    session_start();
    $_SESSION['user']='No files found.';
    echo ('No files found.');
} 
else {
    echo "Files：" . PHP_EOL;
    foreach ($results->getFiles() as $file) {
        echo ($file->getName() . PHP_EOL);
    }
}
$_SESSION['user']=$file->getName() . PHP_EOL;
?>