<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace php\_Boot;

use \php\Boot;

class HxClosure {
	/**
	 * @var string
	 */
	public $func;
	/**
	 * @var mixed
	 */
	public $target;


	/**
	 * @param mixed $target
	 * @param string $func
	 * 
	 * @return void
	 */
	public function __construct ($target, $func) {
		#/usr/local/lib/haxe/std/php/Boot.hx:834: characters 3-23
		$this->target = $target;
		#/usr/local/lib/haxe/std/php/Boot.hx:835: characters 3-19
		$this->func = $func;
		#/usr/local/lib/haxe/std/php/Boot.hx:837: lines 837-839
		if (is_null($target)) {
			#/usr/local/lib/haxe/std/php/Boot.hx:838: characters 4-9
			throw new HxException("Unable to create closure on `null`");
		}
	}


	/**
	 * @return mixed
	 */
	public function __invoke () {
		#/usr/local/lib/haxe/std/php/Boot.hx:847: characters 3-76
		return call_user_func_array($this->getCallback(), func_get_args());
	}


	/**
	 * @param mixed $newThis
	 * @param mixed $args
	 * 
	 * @return mixed
	 */
	public function callWith ($newThis, $args) {
		#/usr/local/lib/haxe/std/php/Boot.hx:876: characters 3-65
		return call_user_func_array($this->getCallback($newThis), $args);
	}


	/**
	 * @param HxClosure $closure
	 * 
	 * @return bool
	 */
	public function equals ($closure) {
		#/usr/local/lib/haxe/std/php/Boot.hx:869: characters 10-60
		if (Boot::equal($this->target, $closure->target)) {
			#/usr/local/lib/haxe/std/php/Boot.hx:869: characters 39-59
			return $this->func === $closure->func;
		} else {
			#/usr/local/lib/haxe/std/php/Boot.hx:869: characters 10-60
			return false;
		}
	}


	/**
	 * @param mixed $eThis
	 * 
	 * @return mixed
	 */
	public function getCallback ($eThis = null) {
		#/usr/local/lib/haxe/std/php/Boot.hx:854: lines 854-856
		if ($eThis === null) {
			#/usr/local/lib/haxe/std/php/Boot.hx:855: characters 4-18
			$eThis = $this->target;
		}
		#/usr/local/lib/haxe/std/php/Boot.hx:857: lines 857-861
		if (($eThis instanceof \StdClass)) {
			#/usr/local/lib/haxe/std/php/Boot.hx:858: lines 858-860
			if (($eThis instanceof HxAnon)) {
				#/usr/local/lib/haxe/std/php/Boot.hx:859: characters 25-30
				$tmp = $eThis;
				#/usr/local/lib/haxe/std/php/Boot.hx:859: characters 32-36
				$tmp1 = $this->func;
				#/usr/local/lib/haxe/std/php/Boot.hx:859: characters 5-37
				return $tmp->{$tmp1};
			}
		}
		#/usr/local/lib/haxe/std/php/Boot.hx:862: characters 3-39
		return [$eThis, $this->func];
	}
}


Boot::registerClass(HxClosure::class, 'php._Boot.HxClosure');
