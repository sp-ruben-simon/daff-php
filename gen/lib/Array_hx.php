<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

use \php\_Boot\HxClosure;
use \_Array\ArrayIterator;
use \php\_Boot\HxException;
use \php\Boot;

final class Array_hx implements \ArrayAccess {
	/**
	 * @var mixed
	 */
	public $arr;
	/**
	 * @var int
	 */
	public $length;


	/**
	 * @param mixed $arr
	 * 
	 * @return Array_hx
	 */
	static public function wrap ($arr) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:222: characters 3-23
		$a = new Array_hx();
		#/usr/local/lib/haxe/std/php/_std/Array.hx:223: characters 3-14
		$a->arr = $arr;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:224: characters 3-31
		$a->length = count($arr);
		#/usr/local/lib/haxe/std/php/_std/Array.hx:225: characters 3-11
		return $a;
	}


	/**
	 * @return void
	 */
	public function __construct () {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:33: characters 9-36
		$this1 = [];
		#/usr/local/lib/haxe/std/php/_std/Array.hx:33: characters 3-36
		$this->arr = $this1;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:34: characters 3-13
		$this->length = 0;
	}


	/**
	 * @param Array_hx $a
	 * 
	 * @return Array_hx
	 */
	public function concat ($a) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:38: characters 3-46
		return Array_hx::wrap(array_merge($this->arr, $a->arr));
	}


	/**
	 * @return Array_hx
	 */
	public function copy () {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:42: characters 3-19
		return Array_hx::wrap($this->arr);
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return Array_hx
	 */
	public function filter ($f) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:46: characters 3-35
		$result = [];
		#/usr/local/lib/haxe/std/php/_std/Array.hx:47: lines 47-51
		$_g1 = 0;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:47: lines 47-51
		$_g = $this->length;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:47: lines 47-51
		while ($_g1 < $_g) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:47: lines 47-51
			$_g1 = $_g1 + 1;
			#/usr/local/lib/haxe/std/php/_std/Array.hx:47: characters 7-8
			$i = $_g1 - 1;
			#/usr/local/lib/haxe/std/php/_std/Array.hx:48: lines 48-50
			if ($f($this->arr[$i])) {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:49: characters 5-24
				$result[] = $this->arr[$i];
			}
		}

		#/usr/local/lib/haxe/std/php/_std/Array.hx:52: characters 3-22
		return Array_hx::wrap($result);
	}


	/**
	 * @param mixed $x
	 * @param int $fromIndex
	 * 
	 * @return int
	 */
	public function indexOf ($x, $fromIndex = null) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:56: lines 56-63
		if (($fromIndex === null) && !($x instanceof HxClosure) && !(is_int($x) || is_float($x))) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:57: characters 4-50
			$index = array_search($x, $this->arr, true);
			#/usr/local/lib/haxe/std/php/_std/Array.hx:58: lines 58-62
			if ($index === false) {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:59: characters 5-14
				return -1;
			} else {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:61: characters 5-17
				return $index;
			}
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:64: lines 64-69
		if ($fromIndex === null) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:65: characters 4-17
			$fromIndex = 0;
		} else {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:67: characters 4-42
			if ($fromIndex < 0) {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:67: characters 23-42
				$fromIndex = $fromIndex + $this->length;
			}
			#/usr/local/lib/haxe/std/php/_std/Array.hx:68: characters 4-36
			if ($fromIndex < 0) {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:68: characters 23-36
				$fromIndex = 0;
			}
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:70: lines 70-74
		while ($fromIndex < $this->length) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:71: lines 71-72
			if (Boot::equal($this->arr[$fromIndex], $x)) {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:72: characters 5-21
				return $fromIndex;
			}
			#/usr/local/lib/haxe/std/php/_std/Array.hx:73: characters 4-15
			$fromIndex = $fromIndex + 1;
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:75: characters 3-12
		return -1;
	}


	/**
	 * @param int $pos
	 * @param mixed $x
	 * 
	 * @return void
	 */
	public function insert ($pos, $x) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:79: characters 3-11
		$this->length++;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:80: characters 3-56
		array_splice($this->arr, $pos, 0, [$x]);
	}


	/**
	 * @return object
	 */
	public function iterator () {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:85: characters 3-33
		return new ArrayIterator($this);
	}


	/**
	 * @param string $sep
	 * 
	 * @return string
	 */
	public function join ($sep) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:89: characters 3-62
		return implode($sep, array_map("strval", $this->arr));
	}


	/**
	 * @param mixed $x
	 * @param int $fromIndex
	 * 
	 * @return int
	 */
	public function lastIndexOf ($x, $fromIndex = null) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:93: characters 3-71
		if (($fromIndex === null) || ($fromIndex >= $this->length)) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:93: characters 49-71
			$fromIndex = $this->length - 1;
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:94: characters 3-41
		if ($fromIndex < 0) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:94: characters 22-41
			$fromIndex = $fromIndex + $this->length;
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:95: lines 95-99
		while ($fromIndex >= 0) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:96: lines 96-97
			if (Boot::equal($this->arr[$fromIndex], $x)) {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:97: characters 5-21
				return $fromIndex;
			}
			#/usr/local/lib/haxe/std/php/_std/Array.hx:98: characters 4-15
			$fromIndex = $fromIndex - 1;
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:100: characters 3-12
		return -1;
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return Array_hx
	 */
	public function map ($f) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:104: characters 3-35
		$result = [];
		#/usr/local/lib/haxe/std/php/_std/Array.hx:105: lines 105-107
		$_g1 = 0;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:105: lines 105-107
		$_g = $this->length;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:105: lines 105-107
		while ($_g1 < $_g) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:105: lines 105-107
			$_g1 = $_g1 + 1;
			#/usr/local/lib/haxe/std/php/_std/Array.hx:105: characters 7-8
			$i = $_g1 - 1;
			#/usr/local/lib/haxe/std/php/_std/Array.hx:106: characters 4-26
			$result[] = $f($this->arr[$i]);
		}

		#/usr/local/lib/haxe/std/php/_std/Array.hx:108: characters 3-22
		return Array_hx::wrap($result);
	}


	/**
	 * @param int $offset
	 * 
	 * @return bool
	 */
	public function offsetExists ($offset) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:190: characters 3-25
		return $offset < $this->length;
	}


	/**
	 * @param int $offset
	 * 
	 * @return mixed
	 */
	public function &offsetGet ($offset) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:195: lines 195-199
		try {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:196: characters 4-22
			return $this->arr[$offset];
		} catch (\Throwable $__hx__caught_e) {
			$__hx__real_e = ($__hx__caught_e instanceof HxException ? $__hx__caught_e->e : $__hx__caught_e);
			$e = $__hx__real_e;
			#/usr/local/lib/haxe/std/php/_std/Array.hx:198: characters 4-15
			return null;
		}
	}


	/**
	 * @param int $offset
	 * @param mixed $value
	 * 
	 * @return void
	 */
	public function offsetSet ($offset, $value) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:204: lines 204-209
		if ($this->length <= $offset) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:205: lines 205-207
			if ($this->length < $offset) {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:206: characters 5-50
				$this->arr = array_pad($this->arr, $offset + 1, null);
			}
			#/usr/local/lib/haxe/std/php/_std/Array.hx:208: characters 4-23
			$this->length = $offset + 1;
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:210: characters 3-22
		$this->arr[$offset] = $value;
	}


	/**
	 * @param int $offset
	 * 
	 * @return void
	 */
	public function offsetUnset ($offset) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:215: lines 215-218
		if (($offset >= 0) && ($offset < $this->length)) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:216: characters 4-39
			array_splice($this->arr, $offset, 1);
			#/usr/local/lib/haxe/std/php/_std/Array.hx:217: characters 4-12
			--$this->length;
		}
	}


	/**
	 * @return mixed
	 */
	public function pop () {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:112: characters 3-27
		if ($this->length > 0) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:112: characters 19-27
			$this->length--;
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:113: characters 3-31
		return array_pop($this->arr);
	}


	/**
	 * @param mixed $x
	 * 
	 * @return int
	 */
	public function push ($x) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:117: characters 3-18
		$this->arr[$this->length] = $x;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:118: characters 3-18
		return ++$this->length;
	}


	/**
	 * @param mixed $x
	 * 
	 * @return bool
	 */
	public function remove ($x) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:122: lines 122-128
		$_g1 = 0;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:122: lines 122-128
		$_g = $this->length;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:122: lines 122-128
		while ($_g1 < $_g) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:122: lines 122-128
			$_g1 = $_g1 + 1;
			#/usr/local/lib/haxe/std/php/_std/Array.hx:122: characters 8-9
			$i = $_g1 - 1;
			#/usr/local/lib/haxe/std/php/_std/Array.hx:123: lines 123-127
			if (Boot::equal($this->arr[$i], $x)) {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:124: characters 5-35
				array_splice($this->arr, $i, 1);
				#/usr/local/lib/haxe/std/php/_std/Array.hx:125: characters 5-13
				$this->length--;
				#/usr/local/lib/haxe/std/php/_std/Array.hx:126: characters 5-16
				return true;
			}
		}

		#/usr/local/lib/haxe/std/php/_std/Array.hx:129: characters 3-15
		return false;
	}


	/**
	 * @param int $len
	 * 
	 * @return void
	 */
	public function resize ($len) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:180: lines 180-184
		if ($this->length < $len) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:181: characters 4-42
			$this->arr = array_pad($this->arr, $len, null);
		} else if ($this->length > $len) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:183: characters 4-47
			array_splice($this->arr, $len, $this->length - $len);
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:185: characters 3-15
		$this->length = $len;
	}


	/**
	 * @return void
	 */
	public function reverse () {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:133: characters 3-34
		$this->arr = array_reverse($this->arr);
	}


	/**
	 * @return mixed
	 */
	public function shift () {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:137: characters 3-27
		if ($this->length > 0) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:137: characters 19-27
			$this->length--;
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:138: characters 3-33
		return array_shift($this->arr);
	}


	/**
	 * @param int $pos
	 * @param int $end
	 * 
	 * @return Array_hx
	 */
	public function slice ($pos, $end = null) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:142: characters 3-29
		if ($pos < 0) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:142: characters 16-29
			$pos = $pos + $this->length;
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:143: characters 3-23
		if ($pos < 0) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:143: characters 16-23
			$pos = 0;
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:144: lines 144-153
		if ($end === null) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:145: characters 4-45
			return Array_hx::wrap(array_slice($this->arr, $pos));
		} else {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:147: characters 4-30
			if ($end < 0) {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:147: characters 17-30
				$end = $end + $this->length;
			}
			#/usr/local/lib/haxe/std/php/_std/Array.hx:148: lines 148-152
			if ($end <= $pos) {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:149: characters 5-14
				return new Array_hx();
			} else {
				#/usr/local/lib/haxe/std/php/_std/Array.hx:151: characters 5-57
				return Array_hx::wrap(array_slice($this->arr, $pos, $end - $pos));
			}
		}
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public function sort ($f) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:157: characters 3-15
		usort($this->arr, $f);
	}


	/**
	 * @param int $pos
	 * @param int $len
	 * 
	 * @return Array_hx
	 */
	public function splice ($pos, $len) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:161: characters 3-25
		if ($len < 0) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:161: characters 16-25
			return new Array_hx();
		}
		#/usr/local/lib/haxe/std/php/_std/Array.hx:162: characters 3-57
		$result = Array_hx::wrap(array_splice($this->arr, $pos, $len));
		#/usr/local/lib/haxe/std/php/_std/Array.hx:163: characters 3-9
		$tmp = $this;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:163: characters 3-26
		$tmp->length = $tmp->length - $result->length;
		#/usr/local/lib/haxe/std/php/_std/Array.hx:164: characters 3-16
		return $result;
	}


	/**
	 * @return string
	 */
	public function toString () {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:172: characters 3-36
		$strings = [];
		#/usr/local/lib/haxe/std/php/_std/Array.hx:173: lines 173-175
		foreach (($this->arr) as $index => $value) {
			#/usr/local/lib/haxe/std/php/_std/Array.hx:174: characters 4-42
			$val = Boot::stringify($value);
			#/usr/local/lib/haxe/std/php/_std/Array.hx:174: characters 4-42
			$strings[$index] = $val;
		};
		#/usr/local/lib/haxe/std/php/_std/Array.hx:176: characters 3-50
		return "[" . (implode(",", $strings)??'null') . "]";
	}


	/**
	 * @param mixed $x
	 * 
	 * @return void
	 */
	public function unshift ($x) {
		#/usr/local/lib/haxe/std/php/_std/Array.hx:168: characters 3-40
		$this->length = array_unshift($this->arr, $x);
	}


	public function __toString() {
		return $this->toString();
	}
}


Boot::registerClass(Array_hx::class, 'Array');
