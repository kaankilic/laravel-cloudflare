## Introduction
Through its dedicated connection, laravel-Cloudflare offers a seamless and expressive solution for integrating the CloudFlare API into Laravel applications. This package provides a straightforward and reliable interface for connecting to the Cloudflare v4 API, making it the simplest and most stable choice for Laravel developers.

# Installation
To initiate the integration of Laravel-Cloudflare, employ Composer to include the package in your project's dependencies:

```bash
composer require kaankilic/laravel-cloudflare
```

To integrate Laravel-Cloudflare, include the registration of its **ServiceProvider** in your config/app.php configuration file after installation:
```bash
Kaankilic\LaravelCloudflare\Providers\CloudflareServiceProvider::class,
```

Additionally, include the Cloudflare facade in the aliases array within your application's configuration file:
```bash
'Cloudflare' => Kaankilic\LaravelCloudflare\Facades\Cloudflare::class
```

Finally, please make sure to publish the configuration file.
```bash
php artisan vendor:publish --provider="Kaankilic\LaravelCloudflare\Providers\CloudflareServiceProvider::class"
```

This command will generate the configurations for your project.

## Contributions
I am the creator and single contributor to the project. So, Feel free to contribute something useful to me. Please use GitHub for reporting bugs, and making comments or suggestions

## License
Laravel-Cloudflare is open-sourced software licensed under the MIT
