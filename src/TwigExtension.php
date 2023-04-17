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
           new TwigFunction('asset', [TwigRuntimeAction::class,'assetFunction']),
           new TwigFunction('route', [TwigRuntimeAction::class,'routeFunction']),
           new TwigExtension('old', TwigRuntimeAction::class, 'oldFunction'),
           new TwigExtension('method', TwigRuntimeAction::class, 'methodFunction')
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
          //
          ];
    }
}
