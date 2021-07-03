1.tạo project từ composer
    $ composer create-project laravel/laravel {tên project} 

2.file .htaccess

<!-- 
    Options -MultiViews -Indexes

    RewriteEngine On

    # Handle Authorization Header

    RewriteCond %{HTTP:Authorization} .

    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    

    # Redirect Trailing Slashes If Not A Folder...

    RewriteCond %{REQUEST_FILENAME} !-d

    RewriteCond %{REQUEST_URI} (.+)/$

    RewriteRule ^ %1 [L,R=301]

    

    # Handle Front Controller...

    RewriteCond %{REQUEST_URI} !(\.css|\.js|\.png|\.jpg|\.gif|robots\.txt)$ [NC]

    RewriteCond %{REQUEST_FILENAME} !-d

    RewriteCond %{REQUEST_FILENAME} !-f

    RewriteRule ^ index.php [L]

    

    RewriteCond %{REQUEST_FILENAME} !-d

    RewriteCond %{REQUEST_FILENAME} !-f

    RewriteCond %{REQUEST_URI} !^/public/

    RewriteRule ^(css|js|images)/(.*)$ public/$1/$2 [L,NC]
 -->

3. Kết  nối CSDL
 - sửa tên DB trong file env
 - test kết nối: $ php artisan migrate
4. Laravel authentication
    $composer require laravel/ui
    $php artisan ui vue --auth
5. laravel mix
    $npm install
    $php artisan ui bootstrap
    $php artisan ui bootstrap --auth
    <!--  chạy ui bản 7 nên update mix-->
    $npm install laravel-mix@latest --save-dev 
    (delete file vue)
    $npm run dev
6.  
    tạo model
    $php artisan make:model {tên}
    tạo con troller resource:
    $php artisan make:controller {tên} --resource
    Xem route:list
    $php artisan route::list
7. fun old('') lưu lại dữ liệu nếu k hợp lệ k bị xoá trắng
8. debug câu sql:
 thêm ->toSql(); vào sau rồi DD ra
 ví dụ
$truyen = Truyen::with('danhmuctruyen','TheLoai')->where(
            function ($query) use($tags) {
                for ($i=0; $i < count($tags) ; $i++) { 
                    $query->orWhere('tukhoa','LIKE','%'. $tags[$i].'%');    
                }
            }

        ) ->toSql();
        dd($truyen);

9. end 
appdebug=true;  cho biết lỗi khi dev
false khi up lên host.
chạy code để ẩn error laravel
$php artisan vendor:publish --tag=laravel-errors