<?php namespace jtaurus\autoinstantiator;

class Bar{

	public $fooInstance;
	public $bazInstance;
	public $someString;
	
	public function __construct(Foo $fooInstance, Baz $bazInstance, $someString = "somethingValue"){
		$this->fooInstance = $fooInstance;
		$this->bazInstance = $bazInstance;
		$this->someString = $someString;
	}
}