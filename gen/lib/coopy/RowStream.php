<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace coopy;

use \haxe\ds\StringMap;
use \php\Boot;

interface RowStream {
	/**
	 * @return \Array_hx
	 */
	public function fetchColumns () ;


	/**
	 * @return StringMap
	 */
	public function fetchRow () ;
}


Boot::registerClass(RowStream::class, 'coopy.RowStream');
