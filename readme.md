# (開発中)laravelで作った掲示板

# laravelで作った掲示板(REST設計にしてあります)

クローンしましょう  
1. `git clone https://github.com/YaCpotato/laravel-bulltin.git`  
  
データベースにテーブルを作ります  
2. `php artisan migrate`  
  
データベースにデフォルトの値をセットしましょう(seeding)  
3. `php artisan db:seed`  
4. `php artisan serve`で起動

http://localhost:8888

で掲示板へいける

20190620  
テスト用にSeederファイルを編集。次IDの仕組みを編集

20190622  
投稿に階層レベルを持たせることにより、親子関係の表現、リプライらしい仕組みを持たせた。
