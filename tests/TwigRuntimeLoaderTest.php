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
use Dune\Support\TwigRuntimeLoader;
use Dune\Support\TwigRuntimeAction;

class TwigRuntimeLoaderTest extends TestCase
{
    protected TwigRuntimeLoader $loader;

    protected function setUp(): void
    {
        $this->loader = new TwigRuntimeLoader();
    }
    public function testLoadFunction(): void
    {
        $this->assertInstanceOf(TwigRuntimeAction::class, $this->loader->load(TwigRuntimeAction::class));
    }
    public function testLoadFunctionWhenFails(): void
    {
        $this->assertNull($this->loader->load('Unknown'));
    }
}
