<?php
session_start();

// セッションを破棄してログアウト
session_destroy();
echo 'ログアウトしました';
echo '<br><a href="login.php">ログインページへ</a>';
?>
