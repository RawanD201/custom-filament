<<<<<<< HEAD
# custom-filament
=======
# archive-traffic-online
- a simple archiving application for archiving `import` and `export` documents for traffic purpose.

<p align="center">
    <img src="https://user-images.githubusercontent.com/41773797/131910226-676cb28a-332d-4162-a6a8-136a93d5a70f.png" alt="Banner" style="width: 100%; max-width: 800px;" />
</p>

<p align="center">
    <a href="https://laravel.com"><img alt="Laravel v9.x" src="https://img.shields.io/badge/Laravel-v9.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://laravel-livewire.com"><img alt="Livewire v2.x" src="https://img.shields.io/badge/Livewire-v2.x-FB70A9?style=for-the-badge"></a>
    <a href="https://php.net"><img alt="PHP 8.0" src="https://img.shields.io/badge/PHP-8.0-777BB4?style=for-the-badge&logo=php"></a>
</p>

## Development

```bash
./setup.sh
```

## Deployment

- Fresh server? run server setup by running `deploy/setup.sh` script.



### Database Setup

```bash
# Login to database
mysql -u root -p

# Change mysql's root user password
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Your Password';

# Flush Cache
FLUSH PRIVILEGES;

# Create Database
CREATE DATABASE 'Your Database';

```

---

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
>>>>>>> 8aa0097 (init)
