# CSRF-simulation

# 概要
CSRF(cross-site request forgery)をローカル環境で発生させる。
CSRF対策はCSRF TOKENの使用のみで、ある場合とない場合の比較をする。

## 目的
実際に

## 環境
- os: ubuntu
- 言語: PHP8.1

## 手順
1. リポジトリのクローン
 - git clone https://github.com/yoshiya-m/CSRF-simulation.git
2. PHPのインストール
 - sudo apt update
 - sudo apt install php
3. CSRF-SIMULATIONディレクトリ配下に移動
4. コマンドで3つPHPサーバを立てる
 - php -S localhost:8000 -t bad-site/
 - php -S localhost:9000 -t no_csrf_token/
 - php -S localhost:10000 -t csrf_token/
5. まずはCSRF対策なしのサイトでログイン
 - http://localhost:9000 にブラウザでアクセス
 - ユーザ名とパスワード欄に 「test」 を入力してログイン
6. CSRF攻撃を行うサイトにアクセスする
 - http://localhost:8000/to-9000.php にブラウザでアクセス
 - CSRFが成功するとhttp://localhost:9000/profile.phpに遷移
 - 失敗の場合は、再度手順 5 を行う

 

