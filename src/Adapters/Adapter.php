<?php
namespace Kaankilic\LaravelCloudflare\Adapters;
interface Adapter
{
	/**
	* @param string $url
	*
	* @throws HttpException
	*
	* @return string
	*/
	public function get($url);

	/**
	* @param string $url
	*
	* @throws HttpException
	*/
	public function delete($url);

	/**
	* @param string       $url
	* @param array|string $content
	*
	* @throws HttpException
	*
	* @return string
	*/
	public function put($url);

	/**
	* @param string       $url
	* @param array|string $content
	*
	* @throws HttpException
	*
	* @return string
	*/
	public function post($url);
}
?>
