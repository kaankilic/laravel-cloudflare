<?php
namespace Kaankilic\LaravelCloudflare\Factories;
use Kaankilic\LaravelCloudflare\Adapters\GuzzleAdapter;
class AdapterFactory{
	public function make(array $config){
		return $this->createConnector($config);
	}
	public function createConnector($config){
		if (!isset($config['driver'])) {
			throw new \Exception('A driver must be specified.');
		}
		switch($config['driver']){
			case 'guzzle':
				return new GuzzleAdapter($config["token"],$config["email"]);
		}
		throw new \Exception("Unsupported driver [{$config['driver']}].");
	}
}

?>
