--TEST--
uopz_extend trait
--INI--
opcache.enable_cli=0
--EXTENSIONS--
uopz
--FILE--
<?php
trait Foo {}
trait Bar {
	public function bar() {}
}

uopz_extend(Foo::class, Bar::class);

class Baz {
	use Foo;
}

if (method_exists(Baz::class, "bar")) {
	echo "OK";
}
?>
--EXPECT--
OK