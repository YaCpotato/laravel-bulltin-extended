# laravelで作った掲示板

# laravelで作った掲示板(REST設計にしてあります)

クローンしましょう  
1. `git clone https://github.com/YaCpotato/laravel-bulltin.git`  
  
データベースにテーブルを作ります  
2. `php artisan migrate`  
  
データベースにデフォルトの値をセットしましょう(seeding)  
3. `php artisan db:seed`  
  
MAMPを開く
htdocs下にフォルダを作った場合、該当フォルダのserver.phpをクリックする。

http://localhost:8888/server.php/post

で掲示板へいける
