<?php

// Generated by Haxe
class coopy_Viterbi {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->K = $this->T = 0;
		$this->reset();
		$this->cost = new coopy_SparseSheet();
		$this->src = new coopy_SparseSheet();
		$this->path = new coopy_SparseSheet();
	}}
	public $K;
	public $T;
	public $index;
	public $mode;
	public $path_valid;
	public $best_cost;
	public $cost;
	public $src;
	public $path;
	public function reset() {
		$this->index = 0;
		$this->mode = 0;
		$this->path_valid = false;
		$this->best_cost = 0;
	}
	public function setSize($states, $sequence_length) {
		$this->K = $states;
		$this->T = $sequence_length;
		$this->cost->resize($this->K, $this->T, 0);
		$this->src->resize($this->K, $this->T, -1);
		$this->path->resize(1, $this->T, -1);
	}
	public function assertMode($next) {
		if($next === 0 && $this->mode === 1) {
			$this->index++;
		}
		$this->mode = $next;
	}
	public function addTransition($s0, $s1, $c) {
		$resize = false;
		if($s0 >= $this->K) {
			$this->K = $s0 + 1;
			$resize = true;
		}
		if($s1 >= $this->K) {
			$this->K = $s1 + 1;
			$resize = true;
		}
		if($resize) {
			$this->cost->nonDestructiveResize($this->K, $this->T, 0);
			$this->src->nonDestructiveResize($this->K, $this->T, -1);
			$this->path->nonDestructiveResize(1, $this->T, -1);
		}
		$this->path_valid = false;
		$this->assertMode(1);
		if($this->index >= $this->T) {
			$this->T = $this->index + 1;
			$this->cost->nonDestructiveResize($this->K, $this->T, 0);
			$this->src->nonDestructiveResize($this->K, $this->T, -1);
			$this->path->nonDestructiveResize(1, $this->T, -1);
		}
		$sourced = false;
		if($this->index > 0) {
			$c += $this->cost->get($s0, $this->index - 1);
			$sourced = $this->src->get($s0, $this->index - 1) !== -1;
		} else {
			$sourced = true;
		}
		if($sourced) {
			if($c < $this->cost->get($s1, $this->index) || $this->src->get($s1, $this->index) === -1) {
				$this->cost->set($s1, $this->index, $c);
				$this->src->set($s1, $this->index, $s0);
			}
		}
	}
	public function endTransitions() {
		$this->path_valid = false;
		$this->assertMode(0);
	}
	public function beginTransitions() {
		$this->path_valid = false;
		$this->assertMode(1);
	}
	public function calculatePath() {
		if($this->path_valid) {
			return;
		}
		$this->endTransitions();
		$best = 0;
		$bestj = -1;
		if($this->index <= 0) {
			$this->path_valid = true;
			return;
		}
		{
			$_g1 = 0;
			$_g = $this->K;
			while($_g1 < $_g) {
				$j = $_g1++;
				if(($this->cost->get($j, $this->index - 1) < $best || $bestj === -1) && $this->src->get($j, $this->index - 1) !== -1) {
					$best = $this->cost->get($j, $this->index - 1);
					$bestj = $j;
				}
				unset($j);
			}
		}
		$this->best_cost = $best;
		{
			$_g11 = 0;
			$_g2 = $this->index;
			while($_g11 < $_g2) {
				$j1 = $_g11++;
				$i = $this->index - 1 - $j1;
				$this->path->set(0, $i, $bestj);
				if(!($bestj !== -1 && ($bestj >= 0 && $bestj < $this->K))) {
					haxe_Log::trace("Problem in Viterbi", _hx_anonymous(array("fileName" => "Viterbi.hx", "lineNumber" => 167, "className" => "coopy.Viterbi", "methodName" => "calculatePath")));
				}
				$bestj = $this->src->get($bestj, $i);
				unset($j1,$i);
			}
		}
		$this->path_valid = true;
	}
	public function toString() {
		$this->calculatePath();
		$txt = "";
		{
			$_g1 = 0;
			$_g = $this->index;
			while($_g1 < $_g) {
				$i = $_g1++;
				if($this->path->get(0, $i) === -1) {
					$txt .= "*";
				} else {
					$txt .= _hx_string_rec($this->path->get(0, $i), "");
				}
				if($this->K >= 10) {
					$txt .= " ";
				}
				unset($i);
			}
		}
		$txt .= " costs " . _hx_string_rec($this->getCost(), "");
		return $txt;
	}
	public function length() {
		if($this->index > 0) {
			$this->calculatePath();
		}
		return $this->index;
	}
	public function get($i) {
		$this->calculatePath();
		return $this->path->get(0, $i);
	}
	public function getCost() {
		$this->calculatePath();
		return $this->best_cost;
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m]))
			return call_user_func_array($this->__dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call <'.$m.'>');
	}
	function __toString() { return $this->toString(); }
}
