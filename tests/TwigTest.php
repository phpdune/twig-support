<?php

namespace Dune\Support\Tests;

use PHPUnit\Framework\TestCase;
use Dune\Support\Twig;

class TwigTest extends TestCase
{
    protected $twig;

    protected function setUp(): void
    {
        $dir = dirname(__DIR__);
        $this->twig = new Twig($dir);
    }

    public function testRenderFunction()
    {
        $value = $this->twig->render('/tests/twigfile/test.twig', [
          'name' => 'Dune'
          ]);
        $expected = 'The Dune Framework!';
        $this->assertEquals($expected, $value);
    }
    public function testRenderBlockFunction()
    {
        $value = $this->twig->renderBlock('/tests/twigfile/block.twig', 'test', [
           'name' => 'testing'
          ]);
        $expected = 'testing';
        $this->assertStringContainsString($expected, $value);
    }
}
