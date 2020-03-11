<?php
namespace Kaankilic\LaravelCloudflare\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the digitalocean facade class.
 *
 * @author Graham Campbell <graham@alt-three.com>
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
