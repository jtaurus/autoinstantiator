<?php namespace jtaurus\autoinstantiator;

class Foo{

	public $bazInstance;

	public function __construct(Baz $bazInstance){
		$this->bazInstance = $bazInstance;
	}

}