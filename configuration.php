<?php

use mageekguy\atoum;
use mageekguy\atoum\scripts;

scripts\runner::addConfigurationCallable(function(atoum\configurator $script, atoum\runner $runner) {
	$extension = new atoum\ideHelper\extension($script);

	$extension->addToRunner($runner);
});
