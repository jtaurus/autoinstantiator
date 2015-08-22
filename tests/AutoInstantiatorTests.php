<?php namespace tests;

require_once("../vendor/autoload.php");


use jtaurus\autoinstantiator\Autoinstantiator;

class AutoInstantiatorTest extends \PHPUnit_Framework_TestCase{

	public function test_instantiation_with_two_other_objects_and_one_default_value(){
		$this->assertInstanceOf("jtaurus\autoinstantiator\ExampleClasses\Bar", (new AutoInstantiator())->build("jtaurus\autoinstantiator\ExampleClasses\Bar"));
	}

	public function test_object_has_correct_dependencies_initialized(){
		$barInstance = (new AutoInstantiator())->build("jtaurus\autoinstantiator\ExampleClasses\Bar");
		$this->assertInstanceOf("jtaurus\autoinstantiator\ExampleClasses\Foo", $barInstance->fooInstance);
		$this->assertInstanceOf("jtaurus\autoinstantiator\ExampleClasses\Baz", $barInstance->bazInstance);
		$this->assertEquals("somethingValue", $barInstance->someString);
	}

	public function test_initializing_object_with_no_parameters_in_constructor(){
		$bazInstance = (new AutoInstantiator())->build("jtaurus\autoinstantiator\ExampleClasses\Baz");
		$this->assertInstanceOf("jtaurus\autoinstantiator\ExampleClasses\Baz", $bazInstance);
	}

	public function test_initializing_object_with_just_one_parameter(){
		$fooInstance = (new AutoInstantiator())->build("jtaurus\autoinstantiator\ExampleClasses\Foo");
		$this->assertInstanceOf("jtaurus\autoinstantiator\ExampleClasses\Foo", $fooInstance);
	}
} 