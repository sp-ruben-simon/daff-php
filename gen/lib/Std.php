<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

use \php\Boot;

class Std {
	/**
	 * @param mixed $v
	 * @param mixed $t
	 * 
	 * @return bool
	 */
	static public function is ($v, $t) {
		#/usr/local/lib/haxe/std/php/_std/Std.hx:32: characters 3-23
		return Boot::is($v, $t);
	}


	/**
	 * @param string $x
	 * 
	 * @return float
	 */
	static public function parseFloat ($x) {
		#/usr/local/lib/haxe/std/php/_std/Std.hx:67: characters 3-35
		$result = floatval($x);
		#/usr/local/lib/haxe/std/php/_std/Std.hx:68: characters 3-33
		if (!Boot::equal($result, 0)) {
			#/usr/local/lib/haxe/std/php/_std/Std.hx:68: characters 20-33
			return $result;
		}
		#/usr/local/lib/haxe/std/php/_std/Std.hx:70: characters 3-22
		$x = ltrim($x);
		#/usr/local/lib/haxe/std/php/_std/Std.hx:71: characters 3-53
		$firstCharIndex = (((0 >= strlen($x) ? "" : $x[0])) === "-" ? 1 : 0);
		#/usr/local/lib/haxe/std/php/_std/Std.hx:72: characters 3-47
		$charCode = (($firstCharIndex < 0) || ($firstCharIndex >= strlen($x)) ? null : ord($x[$firstCharIndex]));
		#/usr/local/lib/haxe/std/php/_std/Std.hx:74: lines 74-76
		if ($charCode === 46) {
			#/usr/local/lib/haxe/std/php/_std/Std.hx:75: characters 15-47
			$index = $firstCharIndex + 1;
			#/usr/local/lib/haxe/std/php/_std/Std.hx:75: characters 15-47
			$charCode = (($index < 0) || ($index >= strlen($x)) ? null : ord($x[$index]));
		}
		#/usr/local/lib/haxe/std/php/_std/Std.hx:78: lines 78-82
		if (($charCode !== null) && ($charCode >= 48) && ($charCode <= 57)) {
			#/usr/local/lib/haxe/std/php/_std/Std.hx:79: characters 4-14
			return 0.0;
		} else {
			#/usr/local/lib/haxe/std/php/_std/Std.hx:81: characters 4-20
			return NAN;
		}
	}


	/**
	 * @param string $x
	 * 
	 * @return int
	 */
	static public function parseInt ($x) {
		#/usr/local/lib/haxe/std/php/_std/Std.hx:48: lines 48-63
		if (is_numeric($x)) {
			#/usr/local/lib/haxe/std/php/_std/Std.hx:49: characters 4-31
			return intval($x, 10);
		} else {
			#/usr/local/lib/haxe/std/php/_std/Std.hx:51: characters 4-23
			$x = ltrim($x);
			#/usr/local/lib/haxe/std/php/_std/Std.hx:52: characters 4-54
			$firstCharIndex = (((0 >= strlen($x) ? "" : $x[0])) === "-" ? 1 : 0);
			#/usr/local/lib/haxe/std/php/_std/Std.hx:53: characters 4-53
			$firstCharCode = (($firstCharIndex < 0) || ($firstCharIndex >= strlen($x)) ? null : ord($x[$firstCharIndex]));
			#/usr/local/lib/haxe/std/php/_std/Std.hx:54: lines 54-56
			if (!(($firstCharCode !== null) && ($firstCharCode >= 48) && ($firstCharCode <= 57))) {
				#/usr/local/lib/haxe/std/php/_std/Std.hx:55: characters 5-16
				return null;
			}
			#/usr/local/lib/haxe/std/php/_std/Std.hx:57: characters 21-49
			$index = $firstCharIndex + 1;
			#/usr/local/lib/haxe/std/php/_std/Std.hx:57: characters 4-50
			$secondChar = (($index < 0) || ($index >= strlen($x)) ? "" : $x[$index]);
			#/usr/local/lib/haxe/std/php/_std/Std.hx:58: lines 58-62
			if (($secondChar === "x") || ($secondChar === "X")) {
				#/usr/local/lib/haxe/std/php/_std/Std.hx:59: characters 5-31
				return intval($x, 0);
			} else {
				#/usr/local/lib/haxe/std/php/_std/Std.hx:61: characters 5-32
				return intval($x, 10);
			}
		}
	}


	/**
	 * @param mixed $s
	 * 
	 * @return string
	 */
	static public function string ($s) {
		#/usr/local/lib/haxe/std/php/_std/Std.hx:40: characters 3-27
		return Boot::stringify($s);
	}
}


Boot::registerClass(Std::class, 'Std');