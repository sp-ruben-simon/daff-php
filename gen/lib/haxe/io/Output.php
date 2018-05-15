<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace haxe\io;

use \php\Boot;
use \php\_Boot\HxException;
use \haxe\io\_BytesData\Container;

class Output {
	/**
	 * @param int $c
	 * 
	 * @return void
	 */
	public function writeByte ($c) {
		#/usr/local/lib/haxe/std/haxe/io/Output.hx:47: characters 3-8
		throw new HxException("Not implemented");
	}


	/**
	 * @param Bytes $s
	 * @param int $pos
	 * @param int $len
	 * 
	 * @return int
	 */
	public function writeBytes ($s, $pos, $len) {
		#/usr/local/lib/haxe/std/haxe/io/Output.hx:59: lines 59-60
		if (($pos < 0) || ($len < 0) || (($pos + $len) > $s->length)) {
			#/usr/local/lib/haxe/std/haxe/io/Output.hx:60: characters 4-9
			throw new HxException(Error::OutsideBounds());
		}
		#/usr/local/lib/haxe/std/haxe/io/Output.hx:62: characters 3-61
		$b = $s->b;
		#/usr/local/lib/haxe/std/haxe/io/Output.hx:63: characters 3-15
		$k = $len;
		#/usr/local/lib/haxe/std/haxe/io/Output.hx:64: lines 64-78
		while ($k > 0) {
			#/usr/local/lib/haxe/std/haxe/io/Output.hx:68: characters 5-26
			$this->writeByte(ord($b->s[$pos]));
			#/usr/local/lib/haxe/std/haxe/io/Output.hx:76: characters 4-9
			$pos = $pos + 1;
			#/usr/local/lib/haxe/std/haxe/io/Output.hx:77: characters 4-7
			$k = $k - 1;
		}
		#/usr/local/lib/haxe/std/haxe/io/Output.hx:79: characters 3-13
		return $len;
	}


	/**
	 * @param Bytes $s
	 * @param int $pos
	 * @param int $len
	 * 
	 * @return void
	 */
	public function writeFullBytes ($s, $pos, $len) {
		#/usr/local/lib/haxe/std/haxe/io/Output.hx:123: lines 123-127
		while ($len > 0) {
			#/usr/local/lib/haxe/std/haxe/io/Output.hx:124: characters 4-34
			$k = $this->writeBytes($s, $pos, $len);
			#/usr/local/lib/haxe/std/haxe/io/Output.hx:125: characters 4-12
			$pos = $pos + $k;
			#/usr/local/lib/haxe/std/haxe/io/Output.hx:126: characters 4-12
			$len = $len - $k;
		}
	}


	/**
	 * @param string $s
	 * 
	 * @return void
	 */
	public function writeString ($s) {
		#/usr/local/lib/haxe/std/haxe/io/Output.hx:282: characters 11-28
		$s1 = strlen($s);
		#/usr/local/lib/haxe/std/haxe/io/Output.hx:282: characters 3-29
		$b = new Bytes($s1, new Container($s));
		#/usr/local/lib/haxe/std/haxe/io/Output.hx:284: characters 3-31
		$this->writeFullBytes($b, 0, $b->length);
	}
}


Boot::registerClass(Output::class, 'haxe.io.Output');