<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace coopy;

use \haxe\ds\StringMap;
use \php\Boot;

class SqlTables implements Table {
	/**
	 * @var SqlDatabase
	 */
	public $db;
	/**
	 * @var CompareFlags
	 */
	public $flags;
	/**
	 * @var Table
	 */
	public $t;


	/**
	 * @param SqlDatabase $db
	 * @param CompareFlags $flags
	 * 
	 * @return void
	 */
	public function __construct ($db, $flags) {
		#coopy/SqlTables.hx:14: characters 9-21
		$this->db = $db;
		#coopy/SqlTables.hx:15: characters 9-42
		$helper = $this->db->getHelper();
		#coopy/SqlTables.hx:16: characters 9-46
		$names = $helper->getTableNames($db);
		#coopy/SqlTables.hx:17: characters 9-47
		$allowed = null;
		#coopy/SqlTables.hx:18: characters 9-40
		$count = $names->length;
		#coopy/SqlTables.hx:19: lines 19-30
		if ($flags->tables !== null) {
			#coopy/SqlTables.hx:20: characters 13-45
			$allowed = new StringMap();
			#coopy/SqlTables.hx:21: lines 21-23
			$_g = 0;
			#coopy/SqlTables.hx:21: lines 21-23
			$_g1 = $flags->tables;
			#coopy/SqlTables.hx:21: lines 21-23
			while ($_g < $_g1->length) {
				#coopy/SqlTables.hx:21: characters 18-22
				$name = ($_g1->arr[$_g] ?? null);
				#coopy/SqlTables.hx:21: lines 21-23
				$_g = $_g + 1;
				#coopy/SqlTables.hx:22: characters 17-39
				$allowed->data[$name] = true;
			}

			#coopy/SqlTables.hx:24: characters 13-22
			$count = 0;
			#coopy/SqlTables.hx:25: lines 25-29
			$_g2 = 0;
			#coopy/SqlTables.hx:25: lines 25-29
			while ($_g2 < $names->length) {
				#coopy/SqlTables.hx:25: characters 18-22
				$name1 = ($names->arr[$_g2] ?? null);
				#coopy/SqlTables.hx:25: lines 25-29
				$_g2 = $_g2 + 1;
				#coopy/SqlTables.hx:26: lines 26-28
				if (array_key_exists($name1, $allowed->data)) {
					#coopy/SqlTables.hx:27: characters 21-28
					$count = $count + 1;
				}
			}

		}
		#coopy/SqlTables.hx:31: characters 9-39
		$this->t = new SimpleTable(2, $count + 1);
		#coopy/SqlTables.hx:32: characters 9-30
		$this->t->setCell(0, 0, "name");
		#coopy/SqlTables.hx:33: characters 9-31
		$this->t->setCell(1, 0, "table");
		#coopy/SqlTables.hx:34: characters 9-33
		$v = $this->t->getCellView();
		#coopy/SqlTables.hx:35: characters 9-20
		$at = 1;
		#coopy/SqlTables.hx:36: lines 36-43
		$_g3 = 0;
		#coopy/SqlTables.hx:36: lines 36-43
		while ($_g3 < $names->length) {
			#coopy/SqlTables.hx:36: characters 14-18
			$name2 = ($names->arr[$_g3] ?? null);
			#coopy/SqlTables.hx:36: lines 36-43
			$_g3 = $_g3 + 1;
			#coopy/SqlTables.hx:37: lines 37-39
			if ($allowed !== null) {
				#coopy/SqlTables.hx:38: characters 17-52
				if (!array_key_exists($name2, $allowed->data)) {
					#coopy/SqlTables.hx:38: characters 44-52
					continue;
				}
			}
			#coopy/SqlTables.hx:40: characters 13-33
			$this->t->setCell(0, $at, $name2);
			#coopy/SqlTables.hx:41: characters 13-82
			$this->t->setCell(1, $at, $v->wrapTable(new SqlTable($db, new SqlTableName($name2))));
			#coopy/SqlTables.hx:42: characters 13-17
			$at = $at + 1;
		}

	}


	/**
	 * @return void
	 */
	public function clear () {
	}


	/**
	 * @return Table
	 */
	public function clone () {
		#coopy/SqlTables.hx:96: characters 9-20
		return null;
	}


	/**
	 * @return Table
	 */
	public function create () {
		#coopy/SqlTables.hx:100: characters 9-20
		return null;
	}


	/**
	 * @param int $x
	 * @param int $y
	 * 
	 * @return mixed
	 */
	public function getCell ($x, $y) {
		#coopy/SqlTables.hx:50: characters 9-30
		return $this->t->getCell($x, $y);
	}


	/**
	 * @return View
	 */
	public function getCellView () {
		#coopy/SqlTables.hx:57: characters 9-31
		return $this->t->getCellView();
	}


	/**
	 * @return mixed
	 */
	public function getData () {
		#coopy/SqlTables.hx:92: characters 9-20
		return null;
	}


	/**
	 * @return Meta
	 */
	public function getMeta () {
		#coopy/SqlTables.hx:104: characters 9-46
		return new SimpleMeta($this, true, true);
	}


	/**
	 * @return int
	 */
	public function get_height () {
		#coopy/SqlTables.hx:88: characters 9-24
		return $this->t->get_height();
	}


	/**
	 * @return int
	 */
	public function get_width () {
		#coopy/SqlTables.hx:84: characters 9-23
		return $this->t->get_width();
	}


	/**
	 * @param \Array_hx $fate
	 * @param int $wfate
	 * 
	 * @return bool
	 */
	public function insertOrDeleteColumns ($fate, $wfate) {
		#coopy/SqlTables.hx:76: characters 9-21
		return false;
	}


	/**
	 * @param \Array_hx $fate
	 * @param int $hfate
	 * 
	 * @return bool
	 */
	public function insertOrDeleteRows ($fate, $hfate) {
		#coopy/SqlTables.hx:72: characters 9-21
		return false;
	}


	/**
	 * @return bool
	 */
	public function isResizable () {
		#coopy/SqlTables.hx:61: characters 9-21
		return false;
	}


	/**
	 * @param int $w
	 * @param int $h
	 * 
	 * @return bool
	 */
	public function resize ($w, $h) {
		#coopy/SqlTables.hx:65: characters 9-21
		return false;
	}


	/**
	 * @param int $x
	 * @param int $y
	 * @param mixed $c
	 * 
	 * @return void
	 */
	public function setCell ($x, $y, $c) {
	}


	/**
	 * @return bool
	 */
	public function trimBlank () {
		#coopy/SqlTables.hx:80: characters 9-21
		return false;
	}
}


Boot::registerClass(SqlTables::class, 'coopy.SqlTables');
Boot::registerGetters('coopy\\SqlTables', [
	'width' => true,
	'height' => true
]);
