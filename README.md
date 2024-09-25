<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Тестовое задание

Для разворота нужно:
- скопировать .env.example в .env 
- указать в .env полный путь до корня проекта в свойстве DB_DATABASE

Далее выполнить команды:
- php artisan key:generate
- php artisan migrate (create database? yes)
- php artisan db:seed

Апи для регионов:
- post: /api/regions body: {"name":"region name"} Response (200): {Объект региона с id}.
- delete: /api/regions/{id} body: n/a Response (200):  n/a

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
