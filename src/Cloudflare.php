<?php
namespace Kaankilic\LaravelCloudflare;
use Kaankilic\LaravelCloudflare\Api\Zones;
class Cloudflare{
	protected $adapter;
	public function __construct($adapter){
		$this->adapter = $adapter;
	}
	public function zones(){
		return new Zones($this->adapter);
	}
}
?>
