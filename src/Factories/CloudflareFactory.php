<?php
namespace Kaankilic\LaravelCloudflare\Factories;
use Kaankilic\LaravelCloudflare\Cloudflare;
class CloudflareFactory{
	protected $adapter;
	public function __construct(AdapterFactory $adapter){
		$this->adapter = $adapter;
	}
	public function make(array $config){
		$adapter = $this->createAdapter($config);
		return new Cloudflare($adapter);
	}
	public function createAdapter(array $config){
		return $this->adapter->make($config);
	}
	public function getAdapter(){
		return $this->adapter;
	}
}
?>
