# CSRF-simulation

# 概要
CSRF(cross-site request forgery)をローカル環境で発生させる。
CSRFはフォームの自動送信によって行い、フォーム内のCSRF TOKENあり・なしで比較する。
ローカルで３ポート(8000: 攻撃元サイト, 9000: CSRF TOKENなしサイト, 10000: CSRF TOKEN ありサイト)を使用し、サイトにログインしてセッション情報をcookieに保持させてからCSRFを実行する。
<br>

## DEMO
 - CSRF TOKENなしのサイトの場合、ログインに悪意あるサイトにアクセスすると投稿一覧に勝手に投稿される

![image](https://github.com/user-attachments/assets/888b6f1e-8a54-43d3-afdb-16cc5d8c35e7)
![image](https://github.com/user-attachments/assets/1a07a51f-2ff2-440b-bfcf-fd9073cd19db)
<br>

- CSRF TOKENありのサイトの場合、悪意あるサイトにアクセスしてもCSRF TOKENが無いため投稿が拒否される
![image](https://github.com/user-attachments/assets/888b6f1e-8a54-43d3-afdb-16cc5d8c35e7)
![image](https://github.com/user-attachments/assets/52ff1607-298a-4c07-b296-8b5ec70f501d)



<br>

## 環境
- os: ubuntu
- 言語: PHP8.1
<br>

## 手順
1. リポジトリのクローン
 - `git clone https://github.com/yoshiya-m/CSRF-simulation.git`
<br>

2. PHPのインストール
 - `sudo apt update`
 - `sudo apt install php`
<br>

3. ターミナルでCSRF-SIMULATIONディレクトリ配下に移動
<br>

4. コマンドで3つPHPサーバを立てる
 - `php -S localhost:8000 -t bad_site/`
 - `php -S localhost:9000 -t no_csrf_token/`
 - `php -S localhost:10000 -t csrf_token/`
<br>

5. まずはCSRF対策なしのサイト(ポート9000)にログイン
 - `http://localhost:9000/login.php` にブラウザでアクセス
 - ユーザ名とパスワード欄に `test` を入力し、「ログイン成功！」と表示されればOK。
<br>

6. CSRF攻撃を行うサイト(ポート8000)にアクセスし、CSRF TOKENを使用しないサイト(ポート9000)に攻撃する
 - `http://localhost:8000/to-9000.php` にブラウザでアクセス
 - `CSRFが成功するとhttp://localhost:9000/login.php` に遷移し、投稿一覧にメッセージが追加される
 - ログインしていませんと表示されたら、再度手順 5でログインする
<br>

7. まずはCSRF対策なしのサイト(ポート10000)にログイン
 - `http://localhost:10000/login.php` にブラウザでアクセス
 - ユーザ名とパスワード欄に `test` を入力し、「ログイン成功！」と表示されればOK。
<br>

8. CSRF攻撃を行うサイト(ポート8000)にアクセスし、CSRF TOKENを使用しているサイト(ポート10000)に攻撃する
 - `http://localhost:8000/to-10000.php` にブラウザでアクセス
 - 成功の場合、csrf tokenが正しくない旨の表示がされる
 - ログインしていませんと表示されたら、再度手順 7でログインする




