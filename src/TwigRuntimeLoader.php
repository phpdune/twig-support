<?php

declare(strict_types=1);

namespace Dune\Support;

use Twig\RuntimeLoader\RuntimeLoaderInterface;
use Dune\Support\TwigRuntimeAction;

class TwigRuntimeLoader implements RuntimeLoaderInterface
{
    public function load(string $class)
    {
        if(TwigRuntimeAction::class === $class) {
            return new $class();
        }
        return null;
    }
}
