<?php
namespace Kaankilic\Pinrobot\Exceptions;
use Exception;
use ReflectionClass;
class ExceptionManager{
	protected static $error = null;
	const KNOWN_EXCEPTIONS = [
		1 => BoardAlreadyExists::class,
		3 => AuthorizationFailed::class,
		9 => BlockedSpamPin::class,
		79 => AccountDoesNotExists::class,
		40 => BoardNotFound::class,
		83 => AccountSuspended::class
	];
	public static function handle($error){
		if(!array_key_exists((int) $error["code"],self::KNOWN_EXCEPTIONS)){
			throw new PinterestException($error["message"],$error["code"]);
		}
		foreach(self::KNOWN_EXCEPTIONS as $code => $exception){
			if($code == $error["code"]){
				if(isset($error['message_detail'])){
					$error["message"] .= $error['message_detail'];
				}
				$reflection = new ReflectionClass($exception);
				$args = array(
					$error["message"],
					$error["code"]
				);
				$object = $reflection->newInstanceArgs($args);
				throw new $object;
			}
		}
	}
}
?>
