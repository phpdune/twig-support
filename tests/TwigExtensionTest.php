<?php

namespace Dune\Support\Tests;

use PHPUnit\Framework\TestCase;
use Dune\Support\TwigExtension;

class TwigExtensionTest extends TestCase
{
    protected $twig;

    protected function setUp(): void
    {
        $this->twig = new TwigExtension();
    }
    public function testTheGetName()
    {
        $expected = 'dune';
        $value = $this->twig->getName();
        $this->assertEquals($expected, $value);
    }
    public function testGetFilters()
    {
        $expected = [
                'truncate',
                'slug',
                'currency',
            ];
        $filters = $this->twig->getFilters();
        for ($i = count($filters) - 1; $i >= 0; $i--) {
            $this->assertEquals($expected[$i], $filters[$i]->getName());
        }
    }
     public function testGetFunctions()
     {
         $expected = [
                 'csrf',
                 'asset',
                 'route',
                 'old',
                 'method',
                 'errorHas',
                 'error'
             ];
         $functions = $this->twig->getFunctions();
         for ($i = count($functions) - 1; $i >= 0; $i--) {
             $this->assertEquals($expected[$i], $functions[$i]->getName());
         }
     }
}
