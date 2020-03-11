<?php
namespace Kaankilic\LaravelCloudflare\Api;
abstract class Api{
	protected $adapter;
	public function __construct($adapter){
		$this->adapter = $adapter;
	}
	public function setEmail($proxy){
		$this->adapter->setEmail($proxy);
	}
	public function __destruct(){
		$this->adapter->cleanParameters();
	}
}
?>
