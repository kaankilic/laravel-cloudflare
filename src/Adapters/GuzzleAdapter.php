<?php
namespace Kaankilic\LaravelCloudflare\Adapters;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;
use GuzzleHttp\Cookie\FileCookieJar;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\MessageFormatter;
use Storage;
class GuzzleAdapter implements Adapter{
	const BASE_URL = "https://api.cloudflare.com/client/v4/";
	const DEFAULT_HEADERS = [
		'Content-Type' => 'application/json',
	];
	protected $headers;
	protected $parameters;
	protected $response;
	protected $client;
	public function __construct($token, $email, ClientInterface $client = null){
		if (version_compare(ClientInterface::VERSION, '6') === 1) {
			$this->client = $client ?: new Client(["base_uri" => self::BASE_URL,"debug" => false,"exceptions" => true,'headers' => array_merge(self::DEFAULT_HEADERS,['Authorization' => sprintf('Bearer %s', $token)])]);
		} else {
			$this->client = $client ?: new Client(["base_uri" => self::BASE_URL,"debug" => false,"exceptions" => true]);
			$this->client->setDefaultOption('headers/Authorization', sprintf('Bearer %s', $token));
			foreach(self::DEFAULT_HEADERS as $headers){
				$this->client->setDefaultOption('headers/Content-Type', $headers);
			}
		}
		$verify = $this->withHeaders(["Authorization"=> "Bearer ".$token])->get("user/tokens/verify");
		$this->headers["X-Auth-Key"] = $verify->result->id;
		$this->headers["X-Auth-Email"] = $email;
	}
	public function withParameters(array $parameters = []){
		$this->parameters = $parameters;
		return $this;
	}
	public function withHeaders($headers = []){
		$this->headers = $headers;
		return $this;
	}
	public function cleanParameters(){
		$this->parameters = [];
		return $this;
	}
	public function getHttpHeaders(){
		return $this->headers;
	}
	public function get($endpoint){
		try {
			$response = $this->client->get($endpoint,["query"=>$this->parameters,"headers" => $this->headers]);
			return json_decode((string) $response->getBody());
		}catch(RequestException $ex){
			return json_decode((string) $ex->getResponse()->getBody());
		}
	}
	public function post($endpoint){
		try {
			$data = [
				"headers" => array_merge(self::DEFAULT_HEADERS,$this->headers),
				"json" => $this->parameters,
			];
			$response = $this->client->post($endpoint,$data);
			return json_decode((string) $response->getBody());
		}catch(RequestException $ex){
			return json_decode((string) $ex->getResponse()->getBody());
		}
	}
	public function put($endpoint){
		try {
			$data = [
				"headers" => array_merge(self::DEFAULT_HEADERS,$this->headers),
				"json" => $this->parameters,
			];
			$response = $this->client->put($endpoint,$data);
			return json_decode((string) $response->getBody());
		}catch(RequestException $ex){
			return json_decode((string) $ex->getResponse()->getBody());
		}
	}
	public function delete($endpoint){

		try {
			$data = [
				"headers" => array_merge(self::DEFAULT_HEADERS,$this->headers),
				"json" => $this->parameters,
			];
			$response = $this->client->delete($endpoint,$data);
			return json_decode((string) $response->getBody());
		}catch(RequestException $ex){
			return json_decode((string) $ex->getResponse()->getBody());
		}
	}
}
?>
