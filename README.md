# Sauna-Share
<https://app.hiroka-portfolio.com>
自分が行ったおすすめのサウナを写真と一緒に投稿してシェアできるサイトです。
サウナを楽しむためのグッズの検索も可能です。
レスポンシブ対応しているのでスマホからでも利用することができます。

# 使用技術
- PHP 7.4.15
- Laravel 6.20.26
- MySQL 8.0
- Nginx 1.18.0
- php-fpm
- AWS
  - VPC
  - EC2
  - RDS
  - 画像のアップロードサーバーにS3
  - ACM
  - ELB
  - Route53
- Docker/Docker-compose
- CircleCi CI/CD
- PHPUnit
- 楽天API

# AWS構成図
![aws構成図](https://user-images.githubusercontent.com/70800437/119453408-5d0d3480-bd72-11eb-9dcb-87a1dc7c1215.jpg)

# 機能一覧
- ユーザー登録、ログイン機能
- 投稿、削除機能
  - 写真投稿機能(Ajax)
- お気に入り機能
- フォロー機能
- ページネーション機能
- 楽天APIでの商品検索機能

# テスト
- phpunit
  - 機能テスト(Feature)

# 作成者
- 石村大華
- 法政大学