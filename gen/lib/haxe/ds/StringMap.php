<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace haxe\ds;

use \haxe\IMap;
use \php\Boot;

class StringMap implements IMap {
	/**
	 * @var mixed
	 */
	public $data;


	/**
	 * @return void
	 */
	public function __construct () {
		#/usr/local/lib/haxe/std/php/_std/haxe/ds/StringMap.hx:34: characters 10-32
		$this1 = [];
		#/usr/local/lib/haxe/std/php/_std/haxe/ds/StringMap.hx:34: characters 3-32
		$this->data = $this1;
	}
}


Boot::registerClass(StringMap::class, 'haxe.ds.StringMap');