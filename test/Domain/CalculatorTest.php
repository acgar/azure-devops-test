<?php

use Acgar\AzureDevops\Domain\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    public function testAdd()
    {
        $calc = new Calculator();
        $this->assertEquals(10, $calc->add(5, 5));
    }

    public function testSub()
    {
        $calc = new Calculator();
        $this->assertEquals(0, $calc->sub(5, 5));
    }

}
