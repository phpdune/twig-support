<?php

declare(strict_types=1);

namespace Dune\Support;

class TwigRuntimeAction
{
    /**
     * asset function, to get the link of css/js things in public/asset folder
     *
     * @param string $path
     *
     * @return string
     */
    public function assetFunction(string $path): string
    {
        return "asset/{$path}";
    }
       /**
        * finding route path by its name
        *
        * @param string $path
        * @param array $args[]
        *
        * @return null|string
        */
    public function routeFunction(string $route, array $args = []): ?string
    {
        $result = route($route, $args);
        return $result;
    }
       /**
        * get last value of the input fields
        *
        * @param string $na.
        *
        * @return null|string
        */
    public function oldFunction(string $name): ?string
    {
        return old($name);
    }
       /**
        * to set custom http request method | PUT | PATH | DELETE
        *
        * @param string $na.
        *
        * @return null|string
        */
      public function methodFunction(string $method): string
      {
          return method($method);
      }

}
