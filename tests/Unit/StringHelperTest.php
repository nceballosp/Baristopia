<?php

namespace Tests\Unit;

use App\Util\StringHelper;
use PHPUnit\Framework\TestCase;

class StringHelperTest extends TestCase
{
    private StringHelper $stringHelper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->stringHelper = new StringHelper();
    }

    public function test_countVowels_returns_correct_count(): void
    {
        $result = $this->stringHelper->countVowels('hello');
        $this->assertEquals(2, $result);

        $result = $this->stringHelper->countVowels('AEIOU');
        $this->assertEquals(5, $result);

        $result = $this->stringHelper->countVowels('xyz');
        $this->assertEquals(0, $result);

        $result = $this->stringHelper->countVowels('');
        $this->assertEquals(0, $result);
    }

    public function test_isUpperCase_returns_correct_result(): void
    {
        $result = $this->stringHelper->isUpperCase('HELLO');
        $this->assertTrue($result);

        $result = $this->stringHelper->isUpperCase('Hello');
        $this->assertFalse($result);

        $result = $this->stringHelper->isUpperCase('123');
        $this->assertTrue($result);

        $result = $this->stringHelper->isUpperCase('');
        $this->assertTrue($result);
    }
} 