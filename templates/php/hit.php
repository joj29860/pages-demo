<?php

$db_host = 'localhost';
$db_name = 'project_stock';
$db_user = 'root';
$db_pass = '';

//來源data source name
$dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $db_host, $db_name);

//連接mysql(需要寫設定)
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
];

//可能會連接失敗(catch後面是如果沒成功時的回應)
try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
} catch (PDOException $ex) {
    echo 'Ex:' . $ex->getMessage();
}

//下sql語法
$sql = "SELECT link, art FROM `article2` WHERE date = '2021-06-03' ORDER BY push DESC LIMIT 7";
//設定變數rows(很多行所以是rows:檔案從pdo來>執行一個查詢>比對所有資料，相符就存到變數rows裡)
$rows = $pdo->query($sql)->fetchAll();

//複製貼上表頭；CORS問題(可能會不允許其他伺服器來提取資料)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

//最後印出,會有編碼問題，所以要轉，傳遞時才不會有亂碼
echo json_encode([
    'data' => $rows,
], JSON_UNESCAPED_UNICODE);

?>
