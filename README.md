# Bagaimana cara menjalankan aplikasi PHP ini?

Untuk menjalankan aplikasi PHP ini, Anda perlu menginstal PHP dan beberapa dependensi lainnya pada komputer lokal Anda. Anda juga perlu menginstal database MySQL dan mengatur pengaturan database Anda di file `.env`.

## Persyaratan

- [PHP](https://www.php.net/manual/en/install.php) &mdash; versi 7.3 atau lebih tinggi
- [Composer](https://getcomposer.org/)
- Sebuah Database MySQL

## Set up the PHP app

1. Clone repository ini ke komputer lokal Anda:

```bash
git clone https://github.com/tantowijh/mini-zero.git mini-zero
```

2. Navigate into the folder and install the dependencies:

```bash
cd mini-zero
composer install
```

3. Copy file `.env.example` ke `.env`:

```bash
cp .env.example .env
```

4. Edit file `.env` dan ubah pengaturan database sesuai dengan pengaturan database Anda:

```bash
DB_HOST=
DB_USERNAME=
DB_PASSWORD=
DB_NAME=
DB_PORT=
MYSQL_ATTR_SSL_CA=
```


5. Jalankan Aplikasi:

```bash
php -S localhost:8000
```

Buka aplikasi di browser Anda: [http://localhost:8000](http://localhost:8000).