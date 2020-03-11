## Introduction
Laravel-Cloudflare provides an expressive and fluent way to connect CloudFlare API from the Laravel using it's own connection.
Laravel-Cloudflare is the simplest stable profanity filter for Laravel.

# Installation
To get started with Laravel-Cloudflare, use Composer to add the package to your project's dependencies:

```bash
composer require graham-campbell/digitalocean
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
