kurulum için ".env" dosyası oluşturulup ".env.example" dan içeriği klonlanabilir.
-windows için wsl içinde proje ana dizininde
    "composer install" komutu çalıştırılarak gerekli paketler yüklenir.
    ardından "./vendor/bin/sail up" komutuyla docker ayağa kaldırılır.
-docker konteynır içine girdikten sonra "php artisan migrate --seed" komutuyla örnek datalarla birlikte veritabanı tabloları oluşturulur. (database/seeders/UserSeeder.php dosyası içinde örnek kullanıcı bilgilerine erişilebilir.)

Kullanıcı api üzerinden email ve şifre ile istek gönderdiğinde geri dönen token ile diğer işlemlerini yapabilir. Expire date ayarlamadım ancak istenirse config/sanctum.php içinde "expiration" değeri düzenlenebilir.

Dönen token header da "Authorization" key'e eklenir (Örn. "Bearer 3|BWIL9XHCCQt5Rc9wWtQBafWd7LDzyzRcAWGPqFR8") ve user-admin işlemleri yapılabilir.

API dökümanantasyonu için /docs dizinini kontrol ediniz.