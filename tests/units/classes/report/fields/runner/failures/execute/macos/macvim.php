<?php

namespace atoum\ideHelper\tests\units\report\fields\runner\failures\execute\macos;

use mageekguy\atoum;

class macvim extends atoum\test
{
    public function testClass()
    {
        $this->testedClass->extends('mageekguy\atoum\report\fields\runner\failures\execute');
    }

    public function test__construct()
    {
        $this
            ->if($this->newTestedInstance)
            ->then
                ->string($this->testedInstance->getCommand())->isEqualTo('mvim --remote-silent +%2$s %1$s')
                ->object($this->testedInstance->getAdapter())->isInstanceOf('mageekguy\atoum\adapter')
                ->object($this->testedInstance->getLocale())->isInstanceOf('mageekguy\atoum\locale')
        ;
    }
}
