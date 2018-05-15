<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3988422)
 */

namespace coopy;

use \php\Boot;
use \php\_Boot\HxString;

class DiffRender {
	/**
	 * @var bool
	 */
	public $open;
	/**
	 * @var bool
	 */
	public $pretty_arrows;
	/**
	 * @var string
	 */
	public $section;
	/**
	 * @var string
	 */
	public $td_close;
	/**
	 * @var string
	 */
	public $td_open;
	/**
	 * @var \Array_hx
	 */
	public $text_to_insert;


	/**
	 * @param int $x
	 * @param int $y
	 * @param View $view
	 * @param mixed $raw
	 * @param string $vcol
	 * @param string $vrow
	 * @param string $vcorner
	 * @param CellInfo $cell
	 * @param int $offset
	 * 
	 * @return void
	 */
	static public function examineCell ($x, $y, $view, $raw, $vcol, $vrow, $vcorner, $cell, $offset = 0) {
		#coopy/DiffRender.hx:136: lines 136-249
		if ($offset === null) {
			#coopy/DiffRender.hx:136: lines 136-249
			$offset = 0;
		}
		#coopy/DiffRender.hx:137: characters 9-39
		$nested = $view->isHash($raw);
		#coopy/DiffRender.hx:138: characters 9-27
		$cell->category = "";
		#coopy/DiffRender.hx:139: characters 9-36
		$cell->category_given_tr = "";
		#coopy/DiffRender.hx:140: characters 9-28
		$cell->separator = "";
		#coopy/DiffRender.hx:141: characters 9-35
		$cell->pretty_separator = "";
		#coopy/DiffRender.hx:142: characters 9-32
		$cell->conflicted = false;
		#coopy/DiffRender.hx:143: characters 9-29
		$cell->updated = false;
		#coopy/DiffRender.hx:144: characters 9-67
		$cell->meta = $cell->pvalue = $cell->lvalue = $cell->rvalue = null;
		#coopy/DiffRender.hx:145: characters 9-25
		$cell->value = $raw;
		#coopy/DiffRender.hx:146: characters 9-39
		$cell->pretty_value = $cell->value;
		#coopy/DiffRender.hx:147: characters 9-34
		if ($vrow === null) {
			#coopy/DiffRender.hx:147: characters 25-34
			$vrow = "";
		}
		#coopy/DiffRender.hx:148: characters 9-34
		if ($vcol === null) {
			#coopy/DiffRender.hx:148: characters 25-34
			$vcol = "";
		}
		#coopy/DiffRender.hx:149: lines 149-156
		if ((strlen($vrow) >= 3) && (((0 >= strlen($vrow) ? "" : $vrow[0])) === "@") && (((1 >= strlen($vrow) ? "" : $vrow[1])) !== "@")) {
			#coopy/DiffRender.hx:150: characters 13-43
			$idx = HxString::indexOf($vrow, "@", 1);
			#coopy/DiffRender.hx:151: lines 151-155
			if ($idx >= 0) {
				#coopy/DiffRender.hx:152: characters 17-49
				$cell->meta = HxString::substr($vrow, 1, $idx - 1);
				#coopy/DiffRender.hx:153: characters 17-54
				$vrow = HxString::substr($vrow, $idx + 1, strlen($vrow));
				#coopy/DiffRender.hx:154: characters 17-39
				$cell->category = "meta";
			}
		}
		#coopy/DiffRender.hx:157: characters 9-43
		$removed_column = false;
		#coopy/DiffRender.hx:158: lines 158-160
		if ($vrow === ":") {
			#coopy/DiffRender.hx:159: characters 13-35
			$cell->category = "move";
		}
		#coopy/DiffRender.hx:161: lines 161-163
		if (($vrow === "") && ($offset === 1) && ($y === 0)) {
			#coopy/DiffRender.hx:162: characters 13-36
			$cell->category = "index";
		}
		#coopy/DiffRender.hx:164: lines 164-169
		if (HxString::indexOf($vcol, "+++") >= 0) {
			#coopy/DiffRender.hx:165: characters 13-59
			$cell->category_given_tr = $cell->category = "add";
		} else if (HxString::indexOf($vcol, "---") >= 0) {
			#coopy/DiffRender.hx:167: characters 13-62
			$cell->category_given_tr = $cell->category = "remove";
			#coopy/DiffRender.hx:168: characters 13-34
			$removed_column = true;
		}
		#coopy/DiffRender.hx:170: lines 170-245
		if ($vrow === "!") {
			#coopy/DiffRender.hx:171: characters 13-35
			$cell->category = "spec";
		} else if ($vrow === "@@") {
			#coopy/DiffRender.hx:173: characters 13-37
			$cell->category = "header";
		} else if ($vrow === "...") {
			#coopy/DiffRender.hx:175: characters 13-34
			$cell->category = "gap";
		} else if ($vrow === "+++") {
			#coopy/DiffRender.hx:177: lines 177-179
			if (!$removed_column) {
				#coopy/DiffRender.hx:178: characters 17-38
				$cell->category = "add";
			}
		} else if ($vrow === "---") {
			#coopy/DiffRender.hx:181: characters 13-37
			$cell->category = "remove";
		} else if (HxString::indexOf($vrow, "->") >= 0) {
			#coopy/DiffRender.hx:183: lines 183-244
			if (!$removed_column) {
				#coopy/DiffRender.hx:184: characters 17-62
				$tokens = \Array_hx::wrap(explode("!", $vrow));
				#coopy/DiffRender.hx:185: characters 17-42
				$full = $vrow;
				#coopy/DiffRender.hx:186: characters 17-47
				$part = ($tokens->arr[1] ?? null);
				#coopy/DiffRender.hx:187: characters 17-44
				if ($part === null) {
					#coopy/DiffRender.hx:187: characters 33-44
					$part = $full;
				}
				#coopy/DiffRender.hx:188: characters 17-53
				$str = $view->toString($cell->value);
				#coopy/DiffRender.hx:189: characters 17-40
				if ($str === null) {
					#coopy/DiffRender.hx:189: characters 32-40
					$str = "";
				}
				#coopy/DiffRender.hx:190: lines 190-243
				if ($nested || (HxString::indexOf($str, $part) >= 0)) {
					#coopy/DiffRender.hx:191: characters 21-49
					$cat = "modify";
					#coopy/DiffRender.hx:192: characters 21-36
					$div = $part;
					#coopy/DiffRender.hx:194: lines 194-204
					if ($part !== $full) {
						#coopy/DiffRender.hx:195: lines 195-199
						if ($nested) {
							#coopy/DiffRender.hx:196: characters 29-76
							$cell->conflicted = $view->hashExists($raw, "theirs");
						} else {
							#coopy/DiffRender.hx:198: characters 29-67
							$cell->conflicted = HxString::indexOf($str, $full) >= 0;
						}
						#coopy/DiffRender.hx:200: lines 200-203
						if ($cell->conflicted) {
							#coopy/DiffRender.hx:201: characters 29-39
							$div = $full;
							#coopy/DiffRender.hx:202: characters 29-45
							$cat = "conflict";
						}
					}
					#coopy/DiffRender.hx:205: characters 21-40
					$cell->updated = true;
					#coopy/DiffRender.hx:206: characters 21-41
					$cell->separator = $div;
					#coopy/DiffRender.hx:207: characters 21-48
					$cell->pretty_separator = $div;
					#coopy/DiffRender.hx:208: lines 208-225
					if ($nested) {
						#coopy/DiffRender.hx:209: lines 209-216
						if ($cell->conflicted) {
							#coopy/DiffRender.hx:210: characters 39-65
							$tokens1 = $view->hashGet($raw, "before");
							#coopy/DiffRender.hx:211: characters 39-63
							$tokens2 = $view->hashGet($raw, "ours");
							#coopy/DiffRender.hx:210: lines 210-212
							$tokens = \Array_hx::wrap([
								$tokens1,
								$tokens2,
								$view->hashGet($raw, "theirs"),
							]);
						} else {
							#coopy/DiffRender.hx:214: characters 39-65
							$tokens3 = $view->hashGet($raw, "before");
							#coopy/DiffRender.hx:214: lines 214-215
							$tokens = \Array_hx::wrap([
								$tokens3,
								$view->hashGet($raw, "after"),
							]);
						}
					} else {
						#coopy/DiffRender.hx:218: characters 25-77
						$cell->pretty_value = $view->toString($cell->pretty_value);
						#coopy/DiffRender.hx:219: characters 25-76
						if ($cell->pretty_value === null) {
							#coopy/DiffRender.hx:219: characters 54-76
							$cell->pretty_value = "";
						}
						#coopy/DiffRender.hx:220: lines 220-224
						if ($cell->pretty_value === $div) {
							#coopy/DiffRender.hx:221: characters 29-45
							$tokens = \Array_hx::wrap([
								"",
								"",
							]);
						} else {
							#coopy/DiffRender.hx:223: characters 38-66
							$_this = $cell->pretty_value;
							#coopy/DiffRender.hx:223: characters 38-66
							$tokens = \Array_hx::wrap(($div === "" ? str_split($_this) : explode($div, $_this)));
						}
					}
					#coopy/DiffRender.hx:226: characters 21-64
					$pretty_tokens = $tokens;
					#coopy/DiffRender.hx:227: lines 227-230
					if ($tokens->length >= 2) {
						#coopy/DiffRender.hx:228: characters 25-75
						$pretty_tokens[0] = DiffRender::markSpaces(($tokens->arr[0] ?? null), ($tokens->arr[1] ?? null));
						#coopy/DiffRender.hx:229: characters 25-75
						$pretty_tokens[1] = DiffRender::markSpaces(($tokens->arr[1] ?? null), ($tokens->arr[0] ?? null));
					}
					#coopy/DiffRender.hx:231: lines 231-235
					if ($tokens->length >= 3) {
						#coopy/DiffRender.hx:232: characters 25-61
						$ref = ($pretty_tokens->arr[0] ?? null);
						#coopy/DiffRender.hx:233: characters 25-69
						$pretty_tokens[0] = DiffRender::markSpaces($ref, ($tokens->arr[2] ?? null));
						#coopy/DiffRender.hx:234: characters 25-69
						$pretty_tokens[2] = DiffRender::markSpaces(($tokens->arr[2] ?? null), $ref);
					}
					#coopy/DiffRender.hx:236: characters 21-70
					$cell->pretty_separator = chr(8594);
					#coopy/DiffRender.hx:237: characters 21-82
					$cell->pretty_value = $pretty_tokens->join($cell->pretty_separator);
					#coopy/DiffRender.hx:238: characters 21-65
					$cell->category_given_tr = $cell->category = $cat;
					#coopy/DiffRender.hx:239: characters 21-60
					$offset1 = ($cell->conflicted ? 1 : 0);
					#coopy/DiffRender.hx:240: characters 21-49
					$cell->lvalue = ($tokens->arr[$offset1] ?? null);
					#coopy/DiffRender.hx:241: characters 21-51
					$cell->rvalue = ($tokens->arr[$offset1 + 1] ?? null);
					#coopy/DiffRender.hx:242: characters 21-65
					if ($cell->conflicted) {
						#coopy/DiffRender.hx:242: characters 42-65
						$cell->pvalue = ($tokens->arr[0] ?? null);
					}
				}
			}
		}
		#coopy/DiffRender.hx:246: lines 246-248
		if (($x === 0) && ($offset > 0)) {
			#coopy/DiffRender.hx:247: characters 13-61
			$cell->category_given_tr = $cell->category = "index";
		}
	}


	/**
	 * @param string $sl
	 * @param string $sr
	 * 
	 * @return string
	 */
	static public function markSpaces ($sl, $sr) {
		#coopy/DiffRender.hx:252: characters 9-30
		if ($sl === $sr) {
			#coopy/DiffRender.hx:252: characters 21-30
			return $sl;
		}
		#coopy/DiffRender.hx:253: characters 9-44
		if (($sl === null) || ($sr === null)) {
			#coopy/DiffRender.hx:253: characters 35-44
			return $sl;
		}
		#coopy/DiffRender.hx:254: characters 9-59
		$slc = \StringTools::replace($sl, " ", "");
		#coopy/DiffRender.hx:255: characters 9-59
		$src = \StringTools::replace($sr, " ", "");
		#coopy/DiffRender.hx:256: characters 9-32
		if ($slc !== $src) {
			#coopy/DiffRender.hx:256: characters 23-32
			return $sl;
		}
		#coopy/DiffRender.hx:257: characters 9-43
		$slo = "";
		#coopy/DiffRender.hx:258: characters 9-26
		$il = 0;
		#coopy/DiffRender.hx:259: characters 9-26
		$ir = 0;
		#coopy/DiffRender.hx:260: lines 260-276
		while ($il < strlen($sl)) {
			#coopy/DiffRender.hx:261: characters 13-45
			$cl = (($il < 0) || ($il >= strlen($sl)) ? "" : $sl[$il]);
			#coopy/DiffRender.hx:262: characters 13-34
			$cr = "";
			#coopy/DiffRender.hx:263: lines 263-265
			if ($ir < strlen($sr)) {
				#coopy/DiffRender.hx:264: characters 22-35
				$cr = (($ir < 0) || ($ir >= strlen($sr)) ? "" : $sr[$ir]);
			}
			#coopy/DiffRender.hx:266: lines 266-275
			if ($cl === $cr) {
				#coopy/DiffRender.hx:267: characters 17-26
				$slo = ($slo??'null') . ($cl??'null');
				#coopy/DiffRender.hx:268: characters 17-21
				$il = $il + 1;
				#coopy/DiffRender.hx:269: characters 17-21
				$ir = $ir + 1;
			} else if ($cr === " ") {
				#coopy/DiffRender.hx:271: characters 17-21
				$ir = $ir + 1;
			} else {
				#coopy/DiffRender.hx:273: characters 17-49
				$slo = ($slo??'null') . (chr(9251)??'null');
				#coopy/DiffRender.hx:274: characters 17-21
				$il = $il + 1;
			}
		}
		#coopy/DiffRender.hx:277: characters 9-19
		return $slo;
	}


	/**
	 * @param Table $tab
	 * @param View $view
	 * @param int $x
	 * @param int $y
	 * 
	 * @return CellInfo
	 */
	static public function renderCell ($tab, $view, $x, $y) {
		#coopy/DiffRender.hx:296: characters 9-46
		$cell = new CellInfo();
		#coopy/DiffRender.hx:297: characters 9-63
		$corner = $view->toString($tab->getCell(0, 0));
		#coopy/DiffRender.hx:298: characters 9-49
		$off = ($corner === "@:@" ? 1 : 0);
		#coopy/DiffRender.hx:300: lines 300-308
		DiffRender::examineCell($x, $y, $view, $tab->getCell($x, $y), $view->toString($tab->getCell($x, $off)), $view->toString($tab->getCell($off, $y)), $corner, $cell, $off);
		#coopy/DiffRender.hx:309: characters 9-20
		return $cell;
	}


	/**
	 * @return void
	 */
	public function __construct () {
		#coopy/DiffRender.hx:22: characters 9-45
		$this->text_to_insert = new \Array_hx();
		#coopy/DiffRender.hx:23: characters 9-21
		$this->open = false;
		#coopy/DiffRender.hx:24: characters 9-29
		$this->pretty_arrows = true;
	}


	/**
	 * @param string $mode
	 * 
	 * @return void
	 */
	public function beginRow ($mode) {
		#coopy/DiffRender.hx:62: characters 9-24
		$this->td_open = "<td";
		#coopy/DiffRender.hx:63: characters 9-27
		$this->td_close = "</td>";
		#coopy/DiffRender.hx:64: characters 9-37
		$row_class = "";
		#coopy/DiffRender.hx:65: lines 65-68
		if ($mode === "header") {
			#coopy/DiffRender.hx:66: characters 13-28
			$this->td_open = "<th";
			#coopy/DiffRender.hx:67: characters 13-31
			$this->td_close = "</th>";
		}
		#coopy/DiffRender.hx:69: characters 9-25
		$row_class = $mode;
		#coopy/DiffRender.hx:70: characters 9-34
		$tr = "<tr>";
		#coopy/DiffRender.hx:71: lines 71-73
		if ($row_class !== "") {
			#coopy/DiffRender.hx:72: characters 13-52
			$tr = "<tr class=\"" . ($row_class??'null') . "\">";
		}
		#coopy/DiffRender.hx:74: characters 9-19
		$this->insert($tr);
	}


	/**
	 * @return void
	 */
	public function beginTable () {
		#coopy/DiffRender.hx:42: characters 9-28
		$this->insert("<table>\x0A");
		#coopy/DiffRender.hx:43: characters 9-23
		$this->section = null;
	}


	/**
	 * @return void
	 */
	public function completeHtml () {
		#coopy/DiffRender.hx:465: lines 465-470
		$this->text_to_insert->insert(0, "<!DOCTYPE html>\x0A<html>\x0A<head>\x0A<meta charset='utf-8'>\x0A<style TYPE='text/css'>\x0A");
		#coopy/DiffRender.hx:471: characters 9-45
		$this->text_to_insert->insert(1, $this->sampleCss());
		#coopy/DiffRender.hx:472: lines 472-476
		$this->text_to_insert->insert(2, "</style>\x0A</head>\x0A<body>\x0A<div class='highlighter'>\x0A");
		#coopy/DiffRender.hx:477: lines 477-480
		$_this = $this->text_to_insert;
		#coopy/DiffRender.hx:477: lines 477-480
		$_this->arr[$_this->length] = "</div>\x0A</body>\x0A</html>\x0A";
		#coopy/DiffRender.hx:477: lines 477-480
		++$_this->length;

	}


	/**
	 * @return void
	 */
	public function endRow () {
		#coopy/DiffRender.hx:92: characters 9-26
		$this->insert("</tr>\x0A");
	}


	/**
	 * @return void
	 */
	public function endTable () {
		#coopy/DiffRender.hx:97: characters 9-25
		$this->setSection(null);
		#coopy/DiffRender.hx:98: characters 9-29
		$this->insert("</table>\x0A");
	}


	/**
	 * @return string
	 */
	public function html () {
		#coopy/DiffRender.hx:108: characters 9-39
		return $this->text_to_insert->join("");
	}


	/**
	 * @param string $str
	 * 
	 * @return void
	 */
	public function insert ($str) {
		#coopy/DiffRender.hx:38: characters 9-33
		$_this = $this->text_to_insert;
		#coopy/DiffRender.hx:38: characters 9-33
		$_this->arr[$_this->length] = $str;
		#coopy/DiffRender.hx:38: characters 9-33
		++$_this->length;
	}


	/**
	 * @param string $txt
	 * @param string $mode
	 * 
	 * @return void
	 */
	public function insertCell ($txt, $mode) {
		#coopy/DiffRender.hx:78: characters 9-41
		$cell_decorate = "";
		#coopy/DiffRender.hx:79: lines 79-81
		if ($mode !== "") {
			#coopy/DiffRender.hx:80: characters 13-54
			$cell_decorate = " class=\"" . ($mode??'null') . "\"";
		}
		#coopy/DiffRender.hx:82: characters 9-42
		$this->insert(($this->td_open??'null') . ($cell_decorate??'null') . ">");
		#coopy/DiffRender.hx:83: lines 83-87
		if ($txt !== null) {
			#coopy/DiffRender.hx:84: characters 13-24
			$this->insert($txt);
		} else {
			#coopy/DiffRender.hx:86: characters 13-27
			$this->insert("null");
		}
		#coopy/DiffRender.hx:88: characters 9-25
		$this->insert($this->td_close);
	}


	/**
	 * @param Table $tab
	 * 
	 * @return DiffRender
	 */
	public function render ($tab) {
		#coopy/DiffRender.hx:321: characters 9-33
		$tab = Coopy::tablify($tab);
		#coopy/DiffRender.hx:322: characters 9-53
		if (($tab->get_width() === 0) || ($tab->get_height() === 0)) {
			#coopy/DiffRender.hx:322: characters 42-53
			return $this;
		}
		#coopy/DiffRender.hx:323: characters 9-40
		$render = $this;
		#coopy/DiffRender.hx:324: characters 9-28
		$render->beginTable();
		#coopy/DiffRender.hx:325: characters 9-35
		$change_row = -1;
		#coopy/DiffRender.hx:326: characters 9-46
		$cell = new CellInfo();
		#coopy/DiffRender.hx:327: characters 9-38
		$view = $tab->getCellView();
		#coopy/DiffRender.hx:328: characters 9-63
		$corner = $view->toString($tab->getCell(0, 0));
		#coopy/DiffRender.hx:329: characters 9-49
		$off = ($corner === "@:@" ? 1 : 0);
		#coopy/DiffRender.hx:330: lines 330-332
		if ($off > 0) {
			#coopy/DiffRender.hx:331: characters 13-57
			if (($tab->get_width() <= 1) || ($tab->get_height() <= 1)) {
				#coopy/DiffRender.hx:331: characters 46-57
				return $this;
			}
		}
		#coopy/DiffRender.hx:333: lines 333-366
		$_g1 = 0;
		#coopy/DiffRender.hx:333: lines 333-366
		$_g = $tab->get_height();
		#coopy/DiffRender.hx:333: lines 333-366
		while ($_g1 < $_g) {
			#coopy/DiffRender.hx:333: lines 333-366
			$_g1 = $_g1 + 1;
			#coopy/DiffRender.hx:333: characters 14-17
			$row = $_g1 - 1;
			#coopy/DiffRender.hx:335: characters 13-37
			$open = false;
			#coopy/DiffRender.hx:337: characters 13-68
			$txt = $view->toString($tab->getCell($off, $row));
			#coopy/DiffRender.hx:338: characters 13-36
			if ($txt === null) {
				#coopy/DiffRender.hx:338: characters 28-36
				$txt = "";
			}
			#coopy/DiffRender.hx:339: characters 13-65
			DiffRender::examineCell($off, $row, $view, $txt, "", $txt, $corner, $cell, $off);
			#coopy/DiffRender.hx:340: characters 13-51
			$row_mode = $cell->category;
			#coopy/DiffRender.hx:341: lines 341-343
			if ($row_mode === "spec") {
				#coopy/DiffRender.hx:342: characters 17-33
				$change_row = $row;
			}
			#coopy/DiffRender.hx:344: lines 344-348
			if (($row_mode === "header") || ($row_mode === "spec") || ($row_mode === "index") || ($row_mode === "meta")) {
				#coopy/DiffRender.hx:345: characters 17-35
				$this->setSection("head");
			} else {
				#coopy/DiffRender.hx:347: characters 17-35
				$this->setSection("body");
			}
			#coopy/DiffRender.hx:350: characters 13-38
			$render->beginRow($row_mode);
			#coopy/DiffRender.hx:352: lines 352-364
			$_g3 = 0;
			#coopy/DiffRender.hx:352: lines 352-364
			$_g2 = $tab->get_width();
			#coopy/DiffRender.hx:352: lines 352-364
			while ($_g3 < $_g2) {
				#coopy/DiffRender.hx:352: lines 352-364
				$_g3 = $_g3 + 1;
				#coopy/DiffRender.hx:352: characters 18-19
				$c = $_g3 - 1;
				#coopy/DiffRender.hx:353: lines 353-361
				DiffRender::examineCell($c, $row, $view, $tab->getCell($c, $row), ($change_row >= 0 ? $view->toString($tab->getCell($c, $change_row)) : ""), $txt, $corner, $cell, $off);
				#coopy/DiffRender.hx:362: lines 362-363
				$render->insertCell(($this->pretty_arrows ? $cell->pretty_value : $cell->value), $cell->category_given_tr);
			}

			#coopy/DiffRender.hx:365: characters 13-28
			$render->endRow();
		}

		#coopy/DiffRender.hx:367: characters 9-26
		$render->endTable();
		#coopy/DiffRender.hx:368: characters 9-20
		return $this;
	}


	/**
	 * @param Tables $tabs
	 * 
	 * @return DiffRender
	 */
	public function renderTables ($tabs) {
		#coopy/DiffRender.hx:372: characters 9-53
		$order = $tabs->getOrder();
		#coopy/DiffRender.hx:373: lines 373-375
		if (($order->length === 0) || $tabs->hasInsDel()) {
			#coopy/DiffRender.hx:374: characters 13-31
			$this->render($tabs->one());
		}
		#coopy/DiffRender.hx:376: lines 376-384
		$_g1 = 1;
		#coopy/DiffRender.hx:376: lines 376-384
		$_g = $order->length;
		#coopy/DiffRender.hx:376: lines 376-384
		while ($_g1 < $_g) {
			#coopy/DiffRender.hx:376: lines 376-384
			$_g1 = $_g1 + 1;
			#coopy/DiffRender.hx:376: characters 14-15
			$i = $_g1 - 1;
			#coopy/DiffRender.hx:377: characters 13-33
			$name = ($order->arr[$i] ?? null);
			#coopy/DiffRender.hx:378: characters 13-46
			$tab = $tabs->get($name);
			#coopy/DiffRender.hx:379: characters 13-40
			if ($tab->get_height() <= 1) {
				#coopy/DiffRender.hx:379: characters 32-40
				continue;
			}
			#coopy/DiffRender.hx:380: characters 13-27
			$this->insert("<h3>");
			#coopy/DiffRender.hx:381: characters 13-25
			$this->insert($name);
			#coopy/DiffRender.hx:382: characters 13-30
			$this->insert("</h3>\x0A");
			#coopy/DiffRender.hx:383: characters 13-24
			$this->render($tab);
		}

		#coopy/DiffRender.hx:385: characters 9-20
		return $this;
	}


	/**
	 * @return string
	 */
	public function sampleCss () {
		#coopy/DiffRender.hx:394: lines 394-455
		return ".highlighter .add { \x0A  background-color: #7fff7f;\x0A}\x0A\x0A.highlighter .remove { \x0A  background-color: #ff7f7f;\x0A}\x0A\x0A.highlighter td.modify { \x0A  background-color: #7f7fff;\x0A}\x0A\x0A.highlighter td.conflict { \x0A  background-color: #f00;\x0A}\x0A\x0A.highlighter .spec { \x0A  background-color: #aaa;\x0A}\x0A\x0A.highlighter .move { \x0A  background-color: #ffa;\x0A}\x0A\x0A.highlighter .null { \x0A  color: #888;\x0A}\x0A\x0A.highlighter table { \x0A  border-collapse:collapse;\x0A}\x0A\x0A.highlighter td, .highlighter th {\x0A  border: 1px solid #2D4068;\x0A  padding: 3px 7px 2px;\x0A}\x0A\x0A.highlighter th, .highlighter .header, .highlighter .meta {\x0A  background-color: #aaf;\x0A  font-weight: bold;\x0A  padding-bottom: 4px;\x0A  padding-top: 5px;\x0A  text-align:left;\x0A}\x0A\x0A.highlighter tr.header th {\x0A  border-bottom: 2px solid black;\x0A}\x0A\x0A.highlighter tr.index td, .highlighter .index, .highlighter tr.header th.index {\x0A  background-color: white;\x0A  border: none;\x0A}\x0A\x0A.highlighter .gap {\x0A  color: #888;\x0A}\x0A\x0A.highlighter td {\x0A  empty-cells: show;\x0A}\x0A";
	}


	/**
	 * @param string $str
	 * 
	 * @return void
	 */
	public function setSection ($str) {
		#coopy/DiffRender.hx:47: characters 9-33
		if ($str === $this->section) {
			#coopy/DiffRender.hx:47: characters 27-33
			return;
		}
		#coopy/DiffRender.hx:48: lines 48-52
		if ($this->section !== null) {
			#coopy/DiffRender.hx:49: characters 13-26
			$this->insert("</t");
			#coopy/DiffRender.hx:50: characters 13-28
			$this->insert($this->section);
			#coopy/DiffRender.hx:51: characters 13-26
			$this->insert(">\x0A");
		}
		#coopy/DiffRender.hx:53: characters 9-22
		$this->section = $str;
		#coopy/DiffRender.hx:54: lines 54-58
		if ($this->section !== null) {
			#coopy/DiffRender.hx:55: characters 13-25
			$this->insert("<t");
			#coopy/DiffRender.hx:56: characters 13-28
			$this->insert($this->section);
			#coopy/DiffRender.hx:57: characters 13-26
			$this->insert(">\x0A");
		}
	}


	/**
	 * @return string
	 */
	public function toString () {
		#coopy/DiffRender.hx:117: characters 9-22
		return $this->html();
	}


	/**
	 * @param bool $flag
	 * 
	 * @return void
	 */
	public function usePrettyArrows ($flag) {
		#coopy/DiffRender.hx:34: characters 9-29
		$this->pretty_arrows = $flag;
	}


	public function __toString() {
		return $this->toString();
	}
}


Boot::registerClass(DiffRender::class, 'coopy.DiffRender');
