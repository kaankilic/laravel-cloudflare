<?php
namespace Kaankilic\LaravelCloudflare\Api;
use Kaankilic\LaravelCloudflare\Adapters\Adapter;
class DNS extends Api{
	protected $zoneID;
	public function __construct(Adapter $adapter,$zoneID){
		parent::__construct($adapter);
		$this->zoneID = $zoneID;
	}
	public function list($data=[]){
		$response = $this->adapter->withParameters($data)->get("zones/".$this->zoneID."/dns_records");
		return $response;
	}
	public function create($data){
		$response = $this->adapter->withParameters($data)->post("zones/".$this->zoneID."/dns_records");
		return $response;
	}
	public function update($dnsID,$data){
		$response = $this->adapter->withParameters($data)->put("zones/".$this->zoneID."/dns_records/".$dnsID);
		return $response;
	}
	public function get($dnsID,$data=[]){
		$response = $this->adapter->withParameters($data)->get("zones/".$this->zoneID."/dns_records/".$dnsID);
		return $response;
	}
	public function delete($dnsID){
		$response = $this->adapter->delete("zones/".$this->zoneID."/dns_records/".$dnsID);
		return $response;
	}
	public function __destruct(){
		parent::__destruct();
	}
}
?>
