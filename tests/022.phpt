--TEST--
init method call
--SKIPIF--
<?php include("skipif.inc") ?>
--INI--
uopz.disable=0
--FILE--
<?php
class Foo {
	public function method() {
		return false;
	}
}

class Bar {
	public function method() {
		return true;
	}
}

$foo = new Foo();

var_dump($foo->method());

uopz_set_mock(Foo::class, Bar::class);

var_dump($foo->method());
?>
--EXPECTF--
bool(false)
bool(true)
