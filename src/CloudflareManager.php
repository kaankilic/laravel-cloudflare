<?php
namespace Kaankilic\LaravelCloudflare;
use Kaankilic\LaravelCloudflare\Factories\CloudflareFactory;
use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
class CloudflareManager extends AbstractManager{
	protected $factory;
	protected $config;
	protected $connections = [];
	protected $extensions = [];
	public function __construct(Repository $config, CloudflareFactory $factory){
		$this->config = $config;
		$this->factory = $factory;
	}
	protected function createConnection(array $config){
		return $this->factory->make($config);
	}
	protected function getConfigName(){
		return 'cloudflare';
	}
	public function getFactory(){
		return $this->factory;
	}
	public function __call(string $method, array $parameters)
    {
        return $this->connection()->$method(...$parameters);
    }
}
?>
