<?php

namespace atoum\ideHelper\report\fields\runner\failures\execute\unix;

use mageekguy\atoum\report\fields\runner\failures;

class geany extends failures\execute
{
    public function __construct()
    {
        parent::__construct('geany %1$s --line %2$d > /dev/null &');
    }
}
