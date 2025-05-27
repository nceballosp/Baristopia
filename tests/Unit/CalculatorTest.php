<?php

namespace Tests\Unit;

use App\Util\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new Calculator();
    }

    public function test_sum_returns_correct_result(): void
    {
        $result = $this->calculator->sum(2, 3);
        $this->assertEquals(5, $result);

        $result = $this->calculator->sum(-1, 1);
        $this->assertEquals(0, $result);

        $result = $this->calculator->sum(0, 0);
        $this->assertEquals(0, $result);
    }

    public function test_isEven_returns_correct_result(): void
    {
        $result = $this->calculator->isEven(2);
        $this->assertTrue($result);

        $result = $this->calculator->isEven(3);
        $this->assertFalse($result);

        $result = $this->calculator->isEven(0);
        $this->assertTrue($result);

        $result = $this->calculator->isEven(-2);
        $this->assertTrue($result);
    }
} 