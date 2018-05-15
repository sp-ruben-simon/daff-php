<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace coopy;

use \php\Boot;

class Ordering {
	/**
	 * @var bool
	 */
	public $ignore_parent;
	/**
	 * @var \Array_hx
	 */
	public $order;


	/**
	 * @return void
	 */
	public function __construct () {
		#coopy/Ordering.hx:18: characters 9-34
		$this->order = new \Array_hx();
		#coopy/Ordering.hx:19: characters 9-30
		$this->ignore_parent = false;
	}


	/**
	 * @param int $l
	 * @param int $r
	 * @param int $p
	 * 
	 * @return void
	 */
	public function add ($l, $r, $p = -2) {
		#coopy/Ordering.hx:32: lines 32-35
		if ($p === null) {
			#coopy/Ordering.hx:32: lines 32-35
			$p = -2;
		}
		#coopy/Ordering.hx:33: characters 9-34
		if ($this->ignore_parent) {
			#coopy/Ordering.hx:33: characters 28-34
			$p = -2;
		}
		#coopy/Ordering.hx:34: characters 9-36
		$_this = $this->order;
		#coopy/Ordering.hx:34: characters 9-36
		$x = new Unit($l, $r, $p);
		#coopy/Ordering.hx:34: characters 9-36
		$_this->arr[$_this->length] = $x;
		#coopy/Ordering.hx:34: characters 9-36
		++$_this->length;

	}


	/**
	 * @return \Array_hx
	 */
	public function getList () {
		#coopy/Ordering.hx:43: characters 9-21
		return $this->order;
	}


	/**
	 * @return void
	 */
	public function ignoreParent () {
		#coopy/Ordering.hx:77: characters 9-29
		$this->ignore_parent = true;
	}


	/**
	 * @param \Array_hx $lst
	 * 
	 * @return void
	 */
	public function setList ($lst) {
		#coopy/Ordering.hx:54: characters 9-20
		$this->order = $lst;
	}


	/**
	 * @return string
	 */
	public function toString () {
		#coopy/Ordering.hx:63: characters 9-31
		$txt = "";
		#coopy/Ordering.hx:64: lines 64-67
		$_g1 = 0;
		#coopy/Ordering.hx:64: lines 64-67
		$_g = $this->order->length;
		#coopy/Ordering.hx:64: lines 64-67
		while ($_g1 < $_g) {
			#coopy/Ordering.hx:64: lines 64-67
			$_g1 = $_g1 + 1;
			#coopy/Ordering.hx:64: characters 14-15
			$i = $_g1 - 1;
			#coopy/Ordering.hx:65: characters 13-33
			if ($i > 0) {
				#coopy/Ordering.hx:65: characters 22-33
				$txt = ($txt??'null') . ", ";
			}
			#coopy/Ordering.hx:66: characters 13-28
			$txt = ($txt??'null') . (\Std::string(($this->order->arr[$i] ?? null))??'null');
		}

		#coopy/Ordering.hx:68: characters 9-19
		return $txt;
	}


	public function __toString() {
		return $this->toString();
	}
}


Boot::registerClass(Ordering::class, 'coopy.Ordering');
