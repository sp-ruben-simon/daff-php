<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace sys\io;

use \php\Boot;

class File {
	/**
	 * @param string $path
	 * 
	 * @return string
	 */
	static public function getContent ($path) {
		#/usr/local/lib/haxe/std/php/_std/sys/io/File.hx:30: characters 3-33
		return file_get_contents($path);
	}


	/**
	 * @param string $path
	 * @param string $content
	 * 
	 * @return void
	 */
	static public function saveContent ($path, $content) {
		#/usr/local/lib/haxe/std/php/_std/sys/io/File.hx:38: characters 3-35
		file_put_contents($path, $content);
	}
}


Boot::registerClass(File::class, 'sys.io.File');
