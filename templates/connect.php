<?php

$db_host = 'localhost';
$db_name = 'project_stock';
$db_user = 'root';
$db_pass = '';

$dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $db_host, $db_name);

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
];

try {
    // $conn = new PDO($dsn,$dbuser,$dbpasswd);
    // $conn->exec("SET CHARACTER SET utf8");
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
} 
catch (PDOException $ex) {
    echo 'Ex:' . $ex->getMessage();
}

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$MTitle = $_POST['MTitle'];
$MContext = $_POST['MContext'];

$sql = "INSERT INTO messages (Name, Email, MTitle, MContext) VALUES (?,?,?,?)";

try
{
    $sth = $pdo->prepare($sql);    
    if($sth)
    {
        //直到這個步驟才會執行 SQL 語法，返回 bool(true)
        $result = $sth->execute([$Name, $Email, $MTitle, $MContext]);
        if($result)//true or false
        {
        $result = 'success';
        // echo json_encode($result);
        // return;
        
        header("Location: aboutus_test.html");
        }
        else
        {
        $result = 'failed';
        // echo json_encode($result);
        // return;
        }
    }
}

catch(PDOException $ex)
{
    echo "執行預存程序失敗. ".$ex->getMessage();
}
?>
?>
