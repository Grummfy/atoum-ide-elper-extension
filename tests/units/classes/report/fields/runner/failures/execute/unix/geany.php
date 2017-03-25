<?php

namespace atoum\ideHelper\tests\units\report\fields\runner\failures\execute\unix;

use mageekguy\atoum;

class geany extends atoum\test
{
    public function testClass()
    {
        $this
            ->testedClass->isSubclassOf('mageekguy\atoum\report\fields\runner\failures\execute')
        ;
    }

    public function test__construct()
    {
        $this
            ->if($this->newTestedInstance)
            ->then
                ->string($this->testedInstance->getCommand())->isEqualTo('geany %1$s --line %2$d > /dev/null &')
        ;
    }
}
