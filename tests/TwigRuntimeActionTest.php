<?php

/*
 * This file is part of Dune Framework.
 *
 * (c) Abhishek B <phpdune@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dune\Support\Tests;

use PHPUnit\Framework\TestCase;
use Dune\Support\TwigRuntimeAction;

class TwigRuntimeActionTest extends TestCase
{
    protected TwigRuntimeAction $action;

    protected function setUp(): void
    {
        $this->action = new TwigRuntimeAction();
    }

    public function testTruncateFilter(): void
    {
        $string = 'testing truncate function';
        $expected = 'testing tr...';
        $value = $this->action->truncate($string, 10);
        $this->assertEquals($expected, $value);
    }
    public function testSlugFilter(): void
    {
        $string = 'This is a text';
        $expected = 'this-is-a-text';
        $value = $this->action->slug($string);
        $this->assertEquals($expected, $value);
    }
    public function testCurrencyFilter(): void
    {
        $amo = 7528;
        $expected = '$7,528.00';
        $value = $this->action->currency($amo, 'USD');
        $this->assertEquals($expected, $value);
    }
}
