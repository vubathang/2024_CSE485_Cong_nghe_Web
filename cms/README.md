# Contact Management System

## Requirements

-   php ~ ^8.2
-   composer > v2.6.6

## Usage

1. Clone project
2. Create new database name `cms` in `mysql`
3. Create `.env` file, copy content from [.env.example](./.env.example) to `.env` file and config in `.env`:

-   Config Database

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cms
DB_USERNAME=root
DB_PASSWORD=
```

3. Install package & setup

```bash
composer install
```

4. Create table database

```bash
php artisan migrate
```

5. Initialize data

```bash
php artisan db:seed
```

6. Runs the app in local

```bash
php artisan serve
```

## Credits

-   Vũ Bá Thắng
-   Trịnh Phương Huyền
-   Nguyễn Duy Hoàng
