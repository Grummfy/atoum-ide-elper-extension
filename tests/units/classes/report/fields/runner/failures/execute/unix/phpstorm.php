<?php

namespace atoum\ideHelper\tests\units\report\fields\runner\failures\execute\unix;

use mageekguy\atoum;

class phpstorm extends atoum\test
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
            ->if($this->newTestedInstance($command = uniqid()))
            ->then
                ->string($this->testedInstance->getCommand())->isEqualTo($command . ' --line %2$d %1$s &> /dev/null &')
        ;
    }

    public function testGetCommand()
    {
        $this
            ->if($this->newTestedInstance($command = uniqid()))
            ->then
                ->string($this->testedInstance->getCommand())->isEqualTo($command . ' --line %2$d %1$s &> /dev/null &')
        ;
    }

    public function test__toString()
    {
        $this
            ->if($this->newTestedInstance($command = uniqid()))
            ->and($this->testedInstance->setAdapter($adapter = new atoum\test\adapter()))
            ->and($adapter->system = function () {
            })
            ->then
                ->castToString($this->testedInstance)->isEmpty()
                ->adapter($adapter)->call('system')->never()
            ->if($score = new \mock\mageekguy\atoum\runner\score())
            ->and($score->getMockController()->getErrors = [])
            ->and($runner = new atoum\runner())
            ->and($runner->setScore($score))
            ->and($this->testedInstance->handleEvent(atoum\runner::runStart, $runner))
            ->then
                ->castToString($this->testedInstance)->isEmpty()
                ->adapter($adapter)->call('system')->never()
            ->if($this->testedInstance->handleEvent(atoum\runner::runStop, $runner))
            ->then
                ->castToString($this->testedInstance)->isEmpty()
                ->adapter($adapter)->call('system')->never()
            ->if($score->getMockController()->getFailAssertions = $fails = [
                        [
                            'case' => null,
                            'dataSetKey' => null,
                            'class' => $class = uniqid(),
                            'method' => $method = uniqid(),
                            'file' => $file = uniqid(),
                            'line' => $line = rand(1, PHP_INT_MAX),
                            'asserter' => $asserter = uniqid(),
                            'fail' => $fail = uniqid()
                        ],
                        [
                            'case' => null,
                            'dataSetKey' => null,
                            'class' => $otherClass = uniqid(),
                            'method' => $otherMethod = uniqid(),
                            'file' => $otherFile = uniqid(),
                            'line' => $otherLine = rand(1, PHP_INT_MAX),
                            'asserter' => $otherAsserter = uniqid(),
                            'fail' => $otherFail = uniqid()
                        ]
                    ]
                )
            ->and($this->testedInstance->handleEvent(atoum\runner::runStop, $runner))
            ->then
                ->castToString($this->testedInstance)->isEmpty()
                ->adapter($adapter)->call('system')->withArguments($command . ' --line ' . $line . ' ' . $file . ' &> /dev/null &')->once()
                ->adapter($adapter)->call('system')->withArguments($command . ' --line ' . $otherLine . ' ' . $otherFile . ' &> /dev/null &')->once()
        ;
    }

    public function testSetCommand()
    {
        $this
            ->if($this->newTestedInstance(uniqid()))
            ->then
                ->object($this->testedInstance->setCommand($command = uniqid()))->isIdenticalTo($this->testedInstance)
                ->string($this->testedInstance->getCommand())->isEqualTo($command . ' --line %2$d %1$s &> /dev/null &')
        ;
    }

    public function testSetAdapter()
    {
        $this
            ->if($this->newTestedInstance(uniqid()))
            ->then
                ->object($this->testedInstance->setAdapter($adapter = new atoum\adapter()))->isIdenticalTo($this->testedInstance)
                ->object($this->testedInstance->getAdapter())->isEqualTo($adapter)
                ->object($this->testedInstance->setAdapter())->isIdenticalTo($this->testedInstance)
                ->object($this->testedInstance->getAdapter())
                    ->isNotIdenticalTo($adapter)
                    ->isEqualTo(new atoum\adapter())
        ;
    }

    public function testHandleEvent()
    {
        $this
            ->if($this->newTestedInstance(uniqid()))
            ->and($this->testedInstance->setAdapter($adapter = new atoum\test\adapter()))
            ->and($adapter->system = function () {
            })
            ->then
                ->boolean($this->testedInstance->handleEvent(atoum\runner::runStart, new atoum\runner()))->isFalse()
                ->variable($this->testedInstance->getRunner())->isNull()
                ->boolean($this->testedInstance->handleEvent(atoum\runner::runStop, $runner = new atoum\runner()))->isTrue()
                ->object($this->testedInstance->getRunner())->isIdenticalTo($runner)
        ;
    }
}
