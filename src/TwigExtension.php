<?php

declare(strict_types=1);

namespace Dune\Support;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Twig\TwigFilter;
use Dune\Support\TwigRuntimeAction;

class TwigExtension extends AbstractExtension
{
    /**
     * @param none
     *
     * @return string
     */
    public function getName(): string
    {
        return 'dune';
    }
      /**
       * @param none
       *
       * @return array
       */
    public function getFunctions(): array
    {

        return [
           new TwigFunction('csrf', 'csrf'),
           new TwigFunction('asset', 'asset'),
           new TwigFunction('route', 'route'),
           new TwigFunction('old', 'old'),
           new TwigFunction('method', 'method'),
           new TwigFunction('errorHas', 'errorHas'),
           new TwigFunction('error', 'error')

          ];

    }
      /**
       * @param none
       *
       * @return array
       */
    public function getFilters(): array
    {
        return [
           new TwigFilter('truncate', [TwigRuntimeAction::class,'truncate']),
           new TwigFilter('slug', [TwigRuntimeAction::class,'slug']),
           new TwigFilter('currency', [TwigRuntimeAction::class,'currency'])
          ];
    }
}
