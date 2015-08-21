# autoinstantiator
Demo of automatic object resolution using PHP's reflection API.

# How does it work
Pass a classname to Autoinstantiators build method and receive an object with all of its dependencies instantiated for you:

`$barInstance = (new AutoInstantiator())->build("jtaurus\autoinstantiator\Bar")`

Bars constructor:

`public function __construct(Foo $fooInstance, Baz $bazInstance, $someString = "somethingValue")`

AutoInstantiator will look at specified class constructor. If it has any dependencies that we are able to resolve, it will
add them to dependency array and use ReflectionClass::newInstanceMethod($args) to assemble them into a new instance of a given class.

Works for typehinted parameters and parameters with default values. 

Does not work for parameters that don't have at least one of these things. There is no way of knowing what value should we assign to it.
