<?php

namespace Dune\Support\Tests;

use PHPUnit\Framework\TestCase;
use Dune\Support\TwigRuntimeAction;

class TwigRuntimeActionTest extends TestCase
{
    protected $action;

    protected function setUp(): void
    {
        $this->action = new TwigRuntimeAction();
    }

    public function testTruncateFilter()
    {
        $string = 'testing truncate function';
        $expected = 'testing tr...';
        $value = $this->action->truncate($string, 10);
        $this->assertEquals($expected, $value);
    }
    public function testSlugFilter()
    {
        $string = 'This is a text';
        $expected = 'this-is-a-text';
        $value = $this->action->slug($string);
        $this->assertEquals($expected, $value);
    }
    public function testCurrencyFilter()
    {
        $amo = 7528;
        $expected = '$7,528.00';
        $value = $this->action->currency($amo, 'USD');
        $this->assertEquals($expected, $value);
    }
}
