## Introduction
Laravel-Cloudflare offers a seamless and expressive solution for integrating the CloudFlare API into Laravel applications through its dedicated connection. This package provides a straightforward and reliable interface for connecting to the Cloudflare v4 API, making it the simplest and most stable choice for Laravel developers.

# Installation
To get started with Laravel-Cloudflare, use Composer to add the package to your project's dependencies:

```bash
composer require kaankilic/laravel-cloudflare
```
After installing the Laravel-Cloudflare,register the `ServiceProvider` in your config/app.php configuration file:

```bash
Kaankilic\LaravelCloudflare\Providers\CloudflareServiceProvider::class,
```

Also, add the Cloudflare facade to the aliases array in your app configuration file:

```bash
'Cloudflare' => Kaankilic\LaravelCloudflare\Facades\Cloudflare::class
```

Lastly, Publish the config file.
```bash
php artisan vendor:publish --provider="Kaankilic\LaravelCloudflare\Providers\CloudflareServiceProvider::class"
```

This command will generate the configrations on your project.

## Contributions
I am the creator and single contributor of the project. So, Feel free to contribute something useful. Please use Github for reporting bugs, and making comments or suggestions

## License
Laravel-Cloudflare is open-sourced software licensed under the MIT
