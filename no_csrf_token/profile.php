<?php
/* CSRF TOKEN なし */


session_start();


// ユーザーがログインしているか確認
if (isset($_SESSION['username'])) {
    echo '<h1>このサイトはCSRF TOKENを使用していません。</h1>';
    echo 'ようこそ ' . $_SESSION['username'] . ' さん';
    echo '<br><a href="logout.php">ログアウト</a>';


} else {
    echo 'ログインしていません';
    echo '<br><a href="login.php">ログイン画面へ</a>';
    exit;
}


?>

<!-- messageを投稿できるformを作成 -->
<h1>メッセージを投稿できます</h1>
<form method="post" action="save-message.php">
    <!-- csrf token -->
     <input type="hidden" name="csrf_token" value="<?php echo  $_SESSION['csrf_token'];?>">
    ユーザー名: <input type="text" name="username">
    メッセージ: <input type="text" name="message">
    <input type="submit" value="投稿">
</form>
<h1>投稿一覧</h1>
<?php
// 保存されているデータを読み取る
$file = './message-data.txt';
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        list ($username, $message, $date) = explode('|', $line);
        echo "<p><strong>username: $username</strong><br>
              message: $message<br>
              date: $date<br>
              </p><hr>";
    }
} else {
    echo "<p>ファイルが見つかりませんでした。";
}


?>
