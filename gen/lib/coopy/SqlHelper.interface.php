<?php

// Generated by Haxe
interface coopy_SqlHelper {
	function getTableNames($db);
	function countRows($db, $name);
	function getRowIDs($db, $name);
	function insert($db, $name, $vals);
	function delete($db, $name, $conds);
	function update($db, $name, $conds, $vals);
	function attach($db, $tag, $resource_name);
	function alterColumns($db, $name, $columns);
}
