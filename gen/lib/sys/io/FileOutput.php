<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace sys\io;

use \haxe\io\Eof;
use \haxe\io\Output;
use \php\Boot;
use \php\_Boot\HxException;
use \haxe\io\Bytes;
use \haxe\io\Error;

class FileOutput extends Output {
	/**
	 * @var mixed
	 */
	public $__f;


	/**
	 * @param mixed $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:33: characters 3-10
		$this->__f = $f;
	}


	/**
	 * @param int $c
	 * 
	 * @return void
	 */
	public function writeByte ($c) {
		#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:37: characters 3-31
		$r = fwrite($this->__f, chr($c));
		#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:38: characters 3-23
		if ($r === false) {
			#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:38: characters 18-23
			throw new HxException(Error::Custom("An error occurred"));
		}
	}


	/**
	 * @param Bytes $b
	 * @param int $p
	 * @param int $l
	 * 
	 * @return int
	 */
	public function writeBytes ($b, $p, $l) {
		#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:42: characters 11-28
		$s = null;
		#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:42: characters 11-28
		if (($p < 0) || ($l < 0) || (($p + $l) > $b->length)) {
			#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:42: characters 11-28
			throw new HxException(Error::OutsideBounds());
		} else {
			#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:42: characters 11-28
			$s = substr($b->b->s, $p, $l);
		}
		#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:42: characters 3-29
		$s1 = $s;
		#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:43: characters 3-22
		if (feof($this->__f)) {
			#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:43: characters 17-22
			throw new HxException(new Eof());
		}
		#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:44: characters 3-29
		$r = fwrite($this->__f, $s1, $l);
		#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:45: characters 3-23
		if ($r === false) {
			#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:45: characters 18-23
			throw new HxException(Error::Custom("An error occurred"));
		}
		#/usr/local/lib/haxe/std/php/_std/sys/io/FileOutput.hx:46: characters 3-11
		return $r;
	}
}


Boot::registerClass(FileOutput::class, 'sys.io.FileOutput');