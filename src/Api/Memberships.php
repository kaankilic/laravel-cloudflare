<?php
namespace Kaankilic\LaravelCloudflare\Api;
class Memberships extends Api{
	public function __construct($adapter){
		parent::__construct($adapter);
	}
	public function list($data){
		$response = $this->adapter->withParameters($data)->get("memberships");
		return $response;
	}
	public function update($membershipID,$data){
		$response = $this->adapter->withParameters($data)->put("memberships/".$membershipID);
		return $response;
	}
	public function delete($membershipID,$data){
		$response = $this->adapter->withParameters($data)->delete("memberships/".$membershipID);
		return $response;
	}
}
?>
