<?php
namespace Kaankilic\LaravelCloudflare\Api;
use Kaankilic\LaravelCloudflare\Adapters\Adapter;
class Zones extends Api{
	public function __construct(Adapter $adapter){
		parent::__construct($adapter);
	}
	public function list(){
		$response = $this->adapter->get("zones");
		return $response;
	}
	public function get($zoneID){
		$response = $this->adapter->get("zones/".$zoneID);
		return $response;
	}
	public function dns($zoneID){
		return new DNS($this->adapter,$zoneID);
	}
}
?>
