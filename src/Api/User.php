<?php
namespace Kaankilic\LaravelCloudflare\Api;
use Kaankilic\LaravelCloudflare\Adapters\Adapter;
class User extends Api{
	public function __construct(Adapter $adapter){
		parent::__construct($adapter);
	}
	public function get(){
		$response = $this->adapter->get("user");
		return $response;
	}
	public function edit($data){
		$response = $this->adapter->withParameters($data)->patch("user");
		return $response;
	}
}
?>
