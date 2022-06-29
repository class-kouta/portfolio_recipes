## レシピメモアプリ

 作れるようになったレシピを記録できるアプリです。


## URL


## 開発した経緯

　PHPの基礎を理解する一環として、フルスクラッチ開発によりメモ帳アプリを作成しました。


## アプリの概要
　和洋中それぞれのジャンルごとにレシピのメモを保存できます。

## 機能一覧
- ユーザー新規登録
- ログイン・ログアウト
  - セッション管理により実現
- 基本的なCRUD機能
- 脆弱性対策
  - XSS対策（フォームから送信された値をhtmlspecialchars関数でサニタイズ）
  - SQLインジェクション対策（SQL文組み立て時にプレースホルダを使用）
  - CSRF対策（フォームから値を送信する際にトークンを付与）

## 使用技術
#### フロントエンド
- HTML,CSS,Bootstrap

#### バックエンド
- PHP7.4.27

#### インフラ
- MySQL

## DB設計（ER図）
