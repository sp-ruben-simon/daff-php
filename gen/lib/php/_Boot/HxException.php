<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace php\_Boot;

use \php\Boot;

class HxException extends \Exception {
	/**
	 * @var mixed
	 */
	public $e;


	/**
	 * @param mixed $e
	 * 
	 * @return void
	 */
	public function __construct ($e) {
		#/usr/local/lib/haxe/std/php/Boot.hx:888: characters 4-14
		$this->e = $e;
		#/usr/local/lib/haxe/std/php/Boot.hx:889: characters 4-28
		parent::__construct(Boot::stringify($e));
	}
}


Boot::registerClass(HxException::class, 'php._Boot.HxException');
