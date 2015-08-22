<?php

require("../vendor/autoload.php");

use jtaurus\autoinstantiator\Autoinstantiator;

var_dump((new AutoInstantiator())->build("jtaurus\autoinstantiator\Bar\ExampleClasses"));

