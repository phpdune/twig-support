<?php

/*
 * This file is part of Dune Framework.
 *
 * (c) Abhishek B <phpdune@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
