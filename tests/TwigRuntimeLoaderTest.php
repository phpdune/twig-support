<?php

namespace Dune\Support\Tests;

use PHPUnit\Framework\TestCase;
use Dune\Support\TwigRuntimeLoader;
use Dune\Support\TwigRuntimeAction;

class TwigRuntimeLoaderTest extends TestCase
{
    protected $loader;

    protected function setUp(): void
    {
        $this->loader = new TwigRuntimeLoader();
    }
    public function testLoadFunction()
    {
        $this->assertInstanceOf(TwigRuntimeAction::class, $this->loader->load(TwigRuntimeAction::class));
    }
    public function testLoadFunctionWhenFails()
    {
        $this->assertNull($this->loader->load('Unknown'));
    }
}
