<?php
session_start();

// ユーザー名とパスワードが送信されたかチェック
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 仮にユーザー名とパスワードが一致する場合にログイン
    if ($username === 'test' && $password === 'test') {
        // セッションにユーザー名を保存
        $_SESSION['username'] = $username;
        echo 'ログイン成功!';
        echo '<br><a href="profile.php">プロフィールページ</a>';
    } else {
        echo 'ユーザー名またはパスワードが違います';
    }
} else {
    echo 'ユーザー名とパスワードを入力してください';
}
?>
