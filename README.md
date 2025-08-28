### TODO: больше инфы, сделать покрасивее и читабельнее =)
- Создать и настроить .env файл (.env.example готов по сути, ничего менять не нужно)
- Из папки проекта выполнить:
```bash
docker compose up -d --build
```
- Зайти в контейнер php
- Выполнить
```bash
composer install
```
- Далее последовательно (в контейнере):
```bash
php artisan key:generate
```
```bash
php artisan migrate
```
```bash
php artisan db:seed
```
```bash
npm install
```
```bash
npm run dev
```
Перейти по [ссылке](http://localhost:8001/)
