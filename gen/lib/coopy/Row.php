<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace coopy;

use \php\Boot;

interface Row {
	/**
	 * @param int $c
	 * 
	 * @return string
	 */
	public function getRowString ($c) ;


	/**
	 * @return bool
	 */
	public function isPreamble () ;
}


Boot::registerClass(Row::class, 'coopy.Row');
