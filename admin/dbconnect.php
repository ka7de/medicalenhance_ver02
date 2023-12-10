<?php
try{
    $pdo = new PDO('mysql:dbname=xs631747_medicalenhance;host=localhost;charset=utf8','xs631747_manager','mdehmanager');
    // $db = new PDO('mysql:dbname=medicalenhance;host=localhost;charset=utf8','root','root');
    // print('データベースの接続に成功しました。');
} catch(PDOException $e){
    print('DB接続エラー：' . $e->getMessage());
}
?>