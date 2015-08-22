<?php namespace jtaurus\autoinstantiator\ExampleClasses;

class Foo{

	public $bazInstance;

	public function __construct(Baz $bazInstance){
		$this->bazInstance = $bazInstance;
	}

}