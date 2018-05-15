<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace coopy;

use \php\Boot;
use \php\_NativeArray\NativeArrayIterator;
use \haxe\ds\IntMap;

class Mover {
	/**
	 * @param \Array_hx $isrc
	 * @param \Array_hx $idest
	 * 
	 * @return \Array_hx
	 */
	static public function move ($isrc, $idest) {
		#coopy/Mover.hx:66: characters 9-37
		$len = $isrc->length;
		#coopy/Mover.hx:67: characters 9-39
		$len2 = $idest->length;
		#coopy/Mover.hx:68: characters 9-56
		$in_src = new IntMap();
		#coopy/Mover.hx:69: characters 9-57
		$in_dest = new IntMap();
		#coopy/Mover.hx:70: lines 70-72
		$_g1 = 0;
		#coopy/Mover.hx:70: lines 70-72
		$_g = $len;
		#coopy/Mover.hx:70: lines 70-72
		while ($_g1 < $_g) {
			#coopy/Mover.hx:70: lines 70-72
			$_g1 = $_g1 + 1;
			#coopy/Mover.hx:70: characters 14-15
			$i = $_g1 - 1;
			#coopy/Mover.hx:71: characters 13-32
			$in_src->data[$isrc[$i]] = $i;
		}

		#coopy/Mover.hx:73: lines 73-75
		$_g11 = 0;
		#coopy/Mover.hx:73: lines 73-75
		$_g2 = $len2;
		#coopy/Mover.hx:73: lines 73-75
		while ($_g11 < $_g2) {
			#coopy/Mover.hx:73: lines 73-75
			$_g11 = $_g11 + 1;
			#coopy/Mover.hx:73: characters 14-15
			$i1 = $_g11 - 1;
			#coopy/Mover.hx:74: characters 13-34
			$in_dest->data[$idest[$i1]] = $i1;
		}

		#coopy/Mover.hx:76: characters 9-49
		$src = new \Array_hx();
		#coopy/Mover.hx:77: characters 9-50
		$dest = new \Array_hx();
		#coopy/Mover.hx:78: characters 9-21
		$v = null;
		#coopy/Mover.hx:79: lines 79-82
		$_g12 = 0;
		#coopy/Mover.hx:79: lines 79-82
		$_g3 = $len;
		#coopy/Mover.hx:79: lines 79-82
		while ($_g12 < $_g3) {
			#coopy/Mover.hx:79: lines 79-82
			$_g12 = $_g12 + 1;
			#coopy/Mover.hx:79: characters 14-15
			$i2 = $_g12 - 1;
			#coopy/Mover.hx:80: characters 13-24
			$v = ($isrc->arr[$i2] ?? null);
			#coopy/Mover.hx:81: characters 13-47
			if (array_key_exists($v, $in_dest->data)) {
				#coopy/Mover.hx:81: characters 36-47
				$src->arr[$src->length] = $v;
				#coopy/Mover.hx:81: characters 36-47
				++$src->length;
			}
		}

		#coopy/Mover.hx:83: lines 83-86
		$_g13 = 0;
		#coopy/Mover.hx:83: lines 83-86
		$_g4 = $len2;
		#coopy/Mover.hx:83: lines 83-86
		while ($_g13 < $_g4) {
			#coopy/Mover.hx:83: lines 83-86
			$_g13 = $_g13 + 1;
			#coopy/Mover.hx:83: characters 14-15
			$i3 = $_g13 - 1;
			#coopy/Mover.hx:84: characters 13-25
			$v = ($idest->arr[$i3] ?? null);
			#coopy/Mover.hx:85: characters 13-47
			if (array_key_exists($v, $in_src->data)) {
				#coopy/Mover.hx:85: characters 35-47
				$dest->arr[$dest->length] = $v;
				#coopy/Mover.hx:85: characters 35-47
				++$dest->length;
			}
		}

		#coopy/Mover.hx:88: characters 9-43
		return Mover::moveWithoutExtras($src, $dest);
	}


	/**
	 * @param \Array_hx $units
	 * 
	 * @return \Array_hx
	 */
	static public function moveUnits ($units) {
		#coopy/Mover.hx:26: characters 9-50
		$isrc = new \Array_hx();
		#coopy/Mover.hx:27: characters 9-51
		$idest = new \Array_hx();
		#coopy/Mover.hx:28: characters 9-38
		$len = $units->length;
		#coopy/Mover.hx:29: characters 9-29
		$ltop = -1;
		#coopy/Mover.hx:30: characters 9-29
		$rtop = -1;
		#coopy/Mover.hx:31: characters 9-56
		$in_src = new IntMap();
		#coopy/Mover.hx:32: characters 9-57
		$in_dest = new IntMap();
		#coopy/Mover.hx:33: lines 33-41
		$_g1 = 0;
		#coopy/Mover.hx:33: lines 33-41
		$_g = $len;
		#coopy/Mover.hx:33: lines 33-41
		while ($_g1 < $_g) {
			#coopy/Mover.hx:33: lines 33-41
			$_g1 = $_g1 + 1;
			#coopy/Mover.hx:33: characters 14-15
			$i = $_g1 - 1;
			#coopy/Mover.hx:34: characters 13-40
			$unit = ($units->arr[$i] ?? null);
			#coopy/Mover.hx:35: lines 35-40
			if (($unit->l >= 0) && ($unit->r >= 0)) {
				#coopy/Mover.hx:36: characters 17-47
				if ($ltop < $unit->l) {
					#coopy/Mover.hx:36: characters 34-47
					$ltop = $unit->l;
				}
				#coopy/Mover.hx:37: characters 17-47
				if ($rtop < $unit->r) {
					#coopy/Mover.hx:37: characters 34-47
					$rtop = $unit->r;
				}
				#coopy/Mover.hx:38: characters 17-35
				$in_src->data[$unit->l] = $i;
				#coopy/Mover.hx:39: characters 17-36
				$in_dest->data[$unit->r] = $i;
			}
		}

		#coopy/Mover.hx:42: characters 9-27
		$v = null;
		#coopy/Mover.hx:43: lines 43-46
		$_g11 = 0;
		#coopy/Mover.hx:43: lines 43-46
		$_g2 = $ltop + 1;
		#coopy/Mover.hx:43: lines 43-46
		while ($_g11 < $_g2) {
			#coopy/Mover.hx:43: lines 43-46
			$_g11 = $_g11 + 1;
			#coopy/Mover.hx:43: characters 14-15
			$i1 = $_g11 - 1;
			#coopy/Mover.hx:44: characters 13-26
			$v = ($in_src->data[$i1] ?? null);
			#coopy/Mover.hx:45: characters 13-38
			if ($v !== null) {
				#coopy/Mover.hx:45: characters 26-38
				$isrc->arr[$isrc->length] = $v;
				#coopy/Mover.hx:45: characters 26-38
				++$isrc->length;
			}
		}

		#coopy/Mover.hx:47: lines 47-50
		$_g12 = 0;
		#coopy/Mover.hx:47: lines 47-50
		$_g3 = $rtop + 1;
		#coopy/Mover.hx:47: lines 47-50
		while ($_g12 < $_g3) {
			#coopy/Mover.hx:47: lines 47-50
			$_g12 = $_g12 + 1;
			#coopy/Mover.hx:47: characters 14-15
			$i2 = $_g12 - 1;
			#coopy/Mover.hx:48: characters 13-27
			$v = ($in_dest->data[$i2] ?? null);
			#coopy/Mover.hx:49: characters 13-39
			if ($v !== null) {
				#coopy/Mover.hx:49: characters 26-39
				$idest->arr[$idest->length] = $v;
				#coopy/Mover.hx:49: characters 26-39
				++$idest->length;
			}
		}

		#coopy/Mover.hx:51: characters 9-45
		return Mover::moveWithoutExtras($isrc, $idest);
	}


	/**
	 * @param \Array_hx $src
	 * @param \Array_hx $dest
	 * 
	 * @return \Array_hx
	 */
	static public function moveWithoutExtras ($src, $dest) {
		#coopy/Mover.hx:92: characters 9-49
		if ($src->length !== $dest->length) {
			#coopy/Mover.hx:92: characters 38-49
			return null;
		}
		#coopy/Mover.hx:93: characters 9-37
		if ($src->length <= 1) {
			#coopy/Mover.hx:93: characters 28-37
			return new \Array_hx();
		}
		#coopy/Mover.hx:95: characters 9-36
		$len = $src->length;
		#coopy/Mover.hx:96: characters 9-56
		$in_src = new IntMap();
		#coopy/Mover.hx:97: characters 9-57
		$blk_len = new IntMap();
		#coopy/Mover.hx:98: characters 9-61
		$blk_src_loc = new IntMap();
		#coopy/Mover.hx:99: characters 9-62
		$blk_dest_loc = new IntMap();
		#coopy/Mover.hx:100: lines 100-102
		$_g1 = 0;
		#coopy/Mover.hx:100: lines 100-102
		$_g = $len;
		#coopy/Mover.hx:100: lines 100-102
		while ($_g1 < $_g) {
			#coopy/Mover.hx:100: lines 100-102
			$_g1 = $_g1 + 1;
			#coopy/Mover.hx:100: characters 14-15
			$i = $_g1 - 1;
			#coopy/Mover.hx:101: characters 13-31
			$in_src->data[$src[$i]] = $i;
		}

		#coopy/Mover.hx:103: characters 9-26
		$ct = 0;
		#coopy/Mover.hx:104: characters 9-34
		$in_cursor = -2;
		#coopy/Mover.hx:105: characters 9-34
		$out_cursor = 0;
		#coopy/Mover.hx:106: characters 9-24
		$next = null;
		#coopy/Mover.hx:107: characters 9-28
		$blk = -1;
		#coopy/Mover.hx:108: characters 9-21
		$v = null;
		#coopy/Mover.hx:109: lines 109-123
		while ($out_cursor < $len) {
			#coopy/Mover.hx:110: characters 13-33
			$v = ($dest->arr[$out_cursor] ?? null);
			#coopy/Mover.hx:111: characters 13-29
			$next = ($in_src->data[$v] ?? null);
			#coopy/Mover.hx:112: lines 112-119
			if ($next !== ($in_cursor + 1)) {
				#coopy/Mover.hx:113: characters 17-24
				$blk = $v;
				#coopy/Mover.hx:114: characters 17-23
				$ct = 1;
				#coopy/Mover.hx:115: characters 17-42
				$blk_src_loc->data[$blk] = $next;
				#coopy/Mover.hx:116: characters 17-49
				$blk_dest_loc->data[$blk] = $out_cursor;
			} else {
				#coopy/Mover.hx:118: characters 17-21
				$ct = $ct + 1;
			}
			#coopy/Mover.hx:120: characters 13-32
			$blk_len->data[$blk] = $ct;
			#coopy/Mover.hx:121: characters 13-29
			$in_cursor = $next;
			#coopy/Mover.hx:122: characters 13-25
			$out_cursor = $out_cursor + 1;
		}
		#coopy/Mover.hx:125: characters 9-50
		$blks = new \Array_hx();
		#coopy/Mover.hx:126: characters 19-33
		$k = new NativeArrayIterator(array_keys($blk_len->data));
		#coopy/Mover.hx:126: characters 19-33
		while ($k->hasNext()) {
			#coopy/Mover.hx:126: characters 9-52
			$k1 = $k->next();
			#coopy/Mover.hx:126: characters 37-49
			$blks->arr[$blks->length] = $k1;
			#coopy/Mover.hx:126: characters 37-49
			++$blks->length;
		}

		#coopy/Mover.hx:127: lines 127-131
		usort($blks->arr, function ($a, $b)  use (&$blk_len) {
			#coopy/Mover.hx:128: characters 17-58
			$diff = ($blk_len->data[$b] ?? null) - ($blk_len->data[$a] ?? null);
			#coopy/Mover.hx:129: characters 17-38
			if ($diff === 0) {
				#coopy/Mover.hx:129: characters 30-38
				$diff = $a - $b;
			}
			#coopy/Mover.hx:130: characters 17-28
			return $diff;
		});
		#coopy/Mover.hx:133: characters 9-51
		$moved = new \Array_hx();
		#coopy/Mover.hx:135: lines 135-156
		while ($blks->length > 0) {
			#coopy/Mover.hx:136: characters 29-41
			if ($blks->length > 0) {
				#coopy/Mover.hx:136: characters 29-41
				$blks->length--;
			}
			#coopy/Mover.hx:136: characters 13-42
			$blk1 = array_shift($blks->arr);
			#coopy/Mover.hx:137: characters 13-42
			$blen = $blks->length;
			#coopy/Mover.hx:138: characters 13-58
			$ref_src_loc = ($blk_src_loc->data[$blk1] ?? null);
			#coopy/Mover.hx:139: characters 13-60
			$ref_dest_loc = ($blk_dest_loc->data[$blk1] ?? null);
			#coopy/Mover.hx:140: characters 13-34
			$i1 = $blen - 1;
			#coopy/Mover.hx:141: lines 141-155
			while ($i1 >= 0) {
				#coopy/Mover.hx:142: characters 17-42
				$blki = ($blks->arr[$i1] ?? null);
				#coopy/Mover.hx:143: characters 17-64
				$blki_src_loc = ($blk_src_loc->data[$blki] ?? null);
				#coopy/Mover.hx:144: characters 17-69
				$to_left_src = $blki_src_loc < $ref_src_loc;
				#coopy/Mover.hx:145: characters 17-81
				$to_left_dest = ($blk_dest_loc->data[$blki] ?? null) < $ref_dest_loc;
				#coopy/Mover.hx:146: lines 146-153
				if ($to_left_src !== $to_left_dest) {
					#coopy/Mover.hx:147: characters 21-50
					$ct1 = ($blk_len->data[$blki] ?? null);
					#coopy/Mover.hx:148: lines 148-151
					$_g11 = 0;
					#coopy/Mover.hx:148: lines 148-151
					$_g2 = $ct1;
					#coopy/Mover.hx:148: lines 148-151
					while ($_g11 < $_g2) {
						#coopy/Mover.hx:148: lines 148-151
						$_g11 = $_g11 + 1;
						#coopy/Mover.hx:148: characters 26-27
						$j = $_g11 - 1;
						#coopy/Mover.hx:149: characters 25-54
						$moved->arr[$moved->length] = ($src->arr[$blki_src_loc] ?? null);
						#coopy/Mover.hx:149: characters 25-54
						++$moved->length;

						#coopy/Mover.hx:150: characters 25-39
						$blki_src_loc = $blki_src_loc + 1;
					}

					#coopy/Mover.hx:152: characters 21-37
					$blks->splice($i1, 1);
				}
				#coopy/Mover.hx:154: characters 17-20
				$i1 = $i1 - 1;
			}
		}
		#coopy/Mover.hx:157: characters 9-21
		return $moved;
	}
}


Boot::registerClass(Mover::class, 'coopy.Mover');