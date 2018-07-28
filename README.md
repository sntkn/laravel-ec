# laravel-learning
laravel learning

## Memo

- ルーティングを確認するコマンド  
`php artisan route:list`
- authのルーティング  
`vendor/laravel/framework/src/Illuminate/Routing/Router.php::auth()`
に書かれている
- authのコントローラメソッド  `vendor/laravel/framework/src/IlluminateFoundation/Auth`
にあるtraitに書かれている

### PHP trait

- trait呼び出し元で同名メソッドがあると上書きしてしまう(asで別名にすると回避は可能)
- trait複数呼び出しによる同名メソッドの衝突の回避方法は複雑

### Closure table

- カテゴリは閉包テーブルで実装
- カテゴリのパンくずリストを実装
- composer require franzose/closure-table
- php artisan closuretable:make --entity=Category --models-path=app/Models --namespace=App\\Models
- belongsTo() でとってきたオブジェクトからfirst() にしないとモデルクラスにならないのは仕様？

### catalog_search

- ElasticSearchを導入
- https://github.com/elasticquent/Elasticquent
- paginate()は表示のみでクエリ結果には反映されないので、その前に自力でpaginateする必要がある
- @todo complex search, 全文検索(kuromoji), fuzziness

### 残り

- 言語別説明文などの実装
- 金額とレートの実装
- VueでのSPA
