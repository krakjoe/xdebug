--TEST--
Test for bug #567: xdebug_debug_zval() and xdebug_debug_zval_stdout() don't work (< PHP 7.1, ZTS)
--SKIPIF--
<?php
require __DIR__ . '/utils.inc';
check_reqs('PHP < 7.1; ZTS');
?>
--INI--
xdebug.default_enable=1
xdebug.overload_var_dump=2
--FILE--
<?php
function func(){
	$a="hoge";
	xdebug_debug_zval( 'a' );
	xdebug_debug_zval_stdout( 'a' );
}

func();
?>
--EXPECT--
a: (refcount=1, is_ref=0)='hoge'
a: (refcount=1, is_ref=0)='hoge'(29)
