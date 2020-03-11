<?php
namespace Kaankilic\LaravelCloudflare\Api;
class Accounts extends Api{
	public function __construct($adapter){
		parent::__construct($adapter);
	}
	public function list($data){
		$response = $this->adapter->withParameters($data)->get("accounts");
		return $response;
	}
	public function get($accountID,$data){
		$response = $this->adapter->withParameters($data)->get("accounts/".$accountID);
		return $response;
	}
	public function update($accountID,$data){
		$response = $this->adapter->withParameters($data)->put("accounts/".$accountID);
		return $response;
	}
}
?>
