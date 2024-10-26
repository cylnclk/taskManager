<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Görev Yönetimi Task

Projeyi çalıştırmak için veri tabanı işlemini yapmanız yeterlidir.
<br>
<code>php artisan migrate</code>
<br>
<code>php artisan db:seed</code>

Seeder işleminde userlar eklenmiştir. Aynı zamanda register olarak sisteme login olabilirsiniz.

Kullanıcı login olduktan sonra görev ekleyebilmektedir.
Eklediği görev kendisine atanıyor. Görevi düzenleme sayfasında başka kullanıcıya atayabilir.
Kendisine atalı olmayan görevleri anasayfada göremez.

