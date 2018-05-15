<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace coopy;

use \php\Boot;

class CellInfo {
	/**
	 * @var string
	 */
	public $category;
	/**
	 * @var string
	 */
	public $category_given_tr;
	/**
	 * @var bool
	 */
	public $conflicted;
	/**
	 * @var string
	 */
	public $lvalue;
	/**
	 * @var string
	 */
	public $meta;
	/**
	 * @var string
	 */
	public $pretty_separator;
	/**
	 * @var string
	 */
	public $pretty_value;
	/**
	 * @var string
	 */
	public $pvalue;
	/**
	 * @var mixed
	 */
	public $raw;
	/**
	 * @var string
	 */
	public $rvalue;
	/**
	 * @var string
	 */
	public $separator;
	/**
	 * @var bool
	 */
	public $updated;
	/**
	 * @var string
	 */
	public $value;


	/**
	 * @return void
	 */
	public function __construct () {
	}


	/**
	 * @return string
	 */
	public function toString () {
		#coopy/CellInfo.hx:130: characters 9-35
		if (!$this->updated) {
			#coopy/CellInfo.hx:130: characters 23-35
			return $this->value;
		}
		#coopy/CellInfo.hx:131: characters 9-55
		if (!$this->conflicted) {
			#coopy/CellInfo.hx:131: characters 26-55
			return ($this->lvalue??'null') . "::" . ($this->rvalue??'null');
		}
		#coopy/CellInfo.hx:132: characters 9-54
		return ($this->pvalue??'null') . "||" . ($this->lvalue??'null') . "::" . ($this->rvalue??'null');
	}


	public function __toString() {
		return $this->toString();
	}
}


Boot::registerClass(CellInfo::class, 'coopy.CellInfo');
