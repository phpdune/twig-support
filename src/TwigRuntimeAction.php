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

use NumberFormatter;

class TwigRuntimeAction
{
    /**
     * truncate filter for twig
     *
     * @param string $string
     * @param int $length = 50
     * @param string $ellipsis = ...
     *
     * @return string
     */
    public function truncate(string $string, int $length = 50, string $ellipsis = '...'): string
    {
        if (strlen($string) > $length) {
            return substr(trim($string), 0, $length) . $ellipsis;
        }
        return $string;
    }
    /**
     * slug filter for twig
     *
     * @param string $string
     *
     * @return string
     */
    public function slug(string $string): string
    {
        $string = strtolower($string);
        $string = str_replace(' ', '-', $string);
        $string = str_replace('_', '-', $string);
        $string = str_replace('--', '-', $string);
        $string = str_replace('__', '-', $string);
        return $string;
    }
    /**
     * currency filter for twing
     * example : {{ price|currency }} output $272.00 value
     *
     * @param int|float $string
     * @param string $currencyCode = 'USD'
     *
     * @return string
     */
    public function currency(int|float $string, string $currencyCode = 'USD'): string|bool
    {
        $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($string, $currencyCode);
    }

}
