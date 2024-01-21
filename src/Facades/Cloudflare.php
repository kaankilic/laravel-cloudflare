<?php
namespace Kaankilic\LaravelCloudflare\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the cloudflare facade class.
 *
 * @author Kaan Kilic <bl4cksta@gmail.com>
 */
class Cloudflare extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cloudflare';
    }
}
