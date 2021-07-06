# Sauna-Share
自分が行ったおすすめのサウナ・銭湯・温泉を写真と一緒に投稿してシェアできるサイトです。
実際に私の友人もユーザー登録をして使用しています。


【アプリURL】

<https://app.hiroka-portfolio.com>

![トップページ](https://user-images.githubusercontent.com/70800437/119858439-6ef7fe80-bf4f-11eb-85d7-f40af7453599.png)

# AWS構成図
![aws構成図](https://user-images.githubusercontent.com/70800437/119453408-5d0d3480-bd72-11eb-9dcb-87a1dc7c1215.jpg)

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



`レスポンシブ対応`しているのでスマホからでも利用可能。

`楽天商品検索API`を導入してサウナを楽しむためのグッズが検索可能。

開発の後半から、GitHubの`Issues`と`Pull Request`を用いて、`疑似チーム開発`のようにバグの修正や機能追加を実施。

`パスワードのHASH化`、`常時SSL化`、.`envなどの秘匿情報をGitHubにアップしない`などのセキュリティ面の強化。

テストは、`phpUnit`で`Featureテスト`を記述。

WEBサーバーに、Apacheよりも高速で且つ高負荷に耐えられる`Nginx`を使用。

`AWS`を用いたインフラの構築、開発環境に`docker`と`docker-compose`を導入、`CircleCI`を使ったCI/CDパイプライン、GitHubの`Issues`と`Pull request`を活用した擬似チーム開発など、実際に開発現場を意識して取り組んだ。


# 機能一覧
- ユーザー登録、ログイン機能
- 記事投稿、編集、削除機能
  - 写真投稿、削除機能
- お気に入り機能
- フォローアンフォロー機能
- ページネーション機能
- 楽天APIでの商品検索機能

# テスト
- PHPUnit
  - 機能テスト(Feature)
