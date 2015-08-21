<?php namespace jtaurus\autoinstantiator;

use ReflectionClass;
use Exception;

class Autoinstantiator{
	

	public function build($className){
		$dependenciesArray = array();

		$reflectorInstance = new ReflectionClass($className);

		if(!$reflectorInstance->isInstantiable()){
			throw new Exception("Cannot initialize this because it's not a concrete class");
		}

		if($reflectorInstance->getConstructor() == NULL || count($reflectorInstance->getConstructor()->getParameters()) == 0){
			//echo "Pusty konstruktor wiec zwracamy nowa instancje klasy.";
			return new $className;
		}

		foreach($reflectorInstance->getConstructor()->getParameters() as $oneParameter){
			// if has a concrete class typehinted, call build method on it and add it to dependencies array
			if($oneParameter->getClass() != null){
				$dependenciesArray[] = $this->build($oneParameter->getClass()->name);
			}
			else{
				// if it has no typehint, check if it has a default value, if it does, add it to the dependencies array
				if($oneParameter->isOptional()){
					$dependenciesArray[] = $oneParameter->getDefaultValue();
				}
				else{
					//if it has no typehint nor a default value, throw new exception
					throw new Exception("Unable to figure out what parameter: " . $oneParameter->name . " is ");
				}
			}
			
		}
		return (new ReflectionClass($className))->newInstanceArgs($dependenciesArray);
	}
}