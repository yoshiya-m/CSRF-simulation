# CSRF-simulation

# 概要
CSRF(cross-site request forgery)をローカル環境で発生させる。
CSRF対策はCSRF TOKENの使用のみで、ある場合とない場合の比較をする。


## 環境
- os: ubuntu
- 言語: PHP8.1

## 手順
1. リポジトリのクローン
 - `git clone https://github.com/yoshiya-m/CSRF-simulation.git`

2. PHPのインストール
 - `sudo apt update`
 - `sudo apt install php`

3. ターミナルでCSRF-SIMULATIONディレクトリ配下に移動

4. コマンドで3つPHPサーバを立てる
 - `php -S localhost:8000 -t bad_site/`
 - `php -S localhost:9000 -t no_csrf_token/`
 - `php -S localhost:10000 -t csrf_token/`

5. まずはCSRF対策なしのサイト(ポート9000)にログイン
 - `http://localhost:9000/login.php` にブラウザでアクセス
 - ユーザ名とパスワード欄に `test` を入力し、「ログイン成功！」と表示されればOK。

6. CSRF攻撃を行うサイト(ポート8000)にアクセスし、CSRF TOKENを使用しないサイト(ポート9000)に攻撃する
 - `http://localhost:8000/to-9000.php` にブラウザでアクセス
 - `CSRFが成功するとhttp://localhost:9000/login.php` に遷移し、投稿一覧にメッセージが追加される
 - ログインしていませんと表示されたら、再度手順 5でログインする

7. まずはCSRF対策なしのサイト(ポート10000)にログイン
 - `http://localhost:10000/login.php` にブラウザでアクセス
 - ユーザ名とパスワード欄に `test` を入力し、「ログイン成功！」と表示されればOK。

8. CSRF攻撃を行うサイト(ポート8000)にアクセスし、CSRF TOKENを使用しているサイト(ポート10000)に攻撃する
 - `http://localhost:8000/to-10000.php` にブラウザでアクセス
 - 成功の場合、csrf tokenが正しくない旨の表示がされる
 - ログインしていませんと表示されたら、再度手順 7でログインする




