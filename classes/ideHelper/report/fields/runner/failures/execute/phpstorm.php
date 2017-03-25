<?php

namespace atoum\ideHelper\report\fields\runner\failures\execute;

use mageekguy\atoum\report\fields\runner\failures;

class phpstorm extends failures\execute
{
	public function __construct($command = null)
	{
		if (empty($command) && $commandFromEnv = getenv('PHPSTORM_PATH'))
		{
			$command = $commandFromEnv;
		}

		parent::__construct($command);
	}

	public function setCommand($command)
	{
		switch (php_uname('s'))
		{
			case 'Windows':
				if (empty($command))
				{
					throw new \RuntimeException('You must defined a path to phpstorm app');
				}

				$command = 'START /B ' . $command . ' > NUL';
				break;
			case 'Darwin':
				$command = $command ?: '/Applications/PhpStorm.app/Contents/MacOS/webide';
				$command .= ' --line %2$d %1$s &> /dev/null &';
				break;
			case 'Linux':
			case 'FreeBSD':
			case 'OpenBSD':
				$command = (empty($command) ? 'pstorm' : $command) . ' --line %2$d %1$s &> /dev/null &';
				break;
		}

		return parent::setCommand($command);
	}
}
