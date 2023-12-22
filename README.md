# my_blog

app/
├── Http
│   └──Controllers -DBのCRUD操作、バックエンドの処理
├── Model -アソシエーションを定義
├── database
│   └──migrations -テーブルの設計ファイル
├── routes
│   └──api.php -エンドポイントを定義

src/
├── app 
│   ├── apis -バックエンドとのデータの操作
│   ├── page.tsx -実際に表示するWebページ
│   ├── layout.tsx -アプリのタイトルやメタタグ、SEO対策など
├── components
│   ├── base -headerやfooterなどの基礎的なレイアウトを置く
│   ├── layout -ユーザ用のレイアウトや管理者用のレイアウトを置く
│   └── elements - ボタンやリンクなど最小単位のレウアウトを置く
├── const
│   └── site.js
├── features
│   └── blog -例
│       ├── styles -デザインを置く
│       ├── components -ページに表示するレイアウトを置く
├── type
│   └── type.ts -型定義