<?php

session_start();



// POSTリクエストでない場合は無効
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $message = "無効なリクエストメソッドです\n";
    echo $message;
    exit;
}
// ログインしていない場合は、ログイン求める
if (!isset($_SESSION['username'])) {
    echo session_id();
    $message = "投稿するにはログインする必要があります。\n";
    echo $message;
    exit;
}

// CSRF TOKENがない場合と、間違っている場合
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    echo "csrf tokenが正しくありません";
    exit;
}



$username = htmlspecialchars($_POST['username']);
$message = htmlspecialchars($_POST['message']);
$date = date("Y-m-d H:i:s");

$newLine = "$username|$message|$date\n";
$file = 'message-data.txt';


// 投稿データを保存する
file_put_contents($file, $newLine, FILE_APPEND);
header('Location: profile.php');


