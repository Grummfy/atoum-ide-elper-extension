<?php

use mageekguy\atoum;
use mageekguy\atoum\scripts;
use atoum\ideHelper\extension;

if (defined('mageekguy\atoum\scripts\runner') === true) {
	scripts\runner::addConfigurationCallable(function (atoum\configurator $script, atoum\runner $runner) {
		$extension = new extension($script);

		$extension->addToRunner($runner);
	});
}
