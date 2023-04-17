<?php

declare(strict_types=1);

namespace Dune\Support;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Twig\Extension\ExtensionInterface;
use Twig\Loader\LoaderInterface;
use Twig\RuntimeLoader\RuntimeLoaderInterface;
use Dune\Support\TwigExtension;
use Dune\Support\TwigRuntimeLoader;

class Twig
{
    /**
     * Twig\Loader\LoaderInterface instance
     *
     * @var FilesystemLoader
     */
    private FilesystemLoader $loader;
    /**
     * Twig\Environment instance
     *
     * @var Environment
     */
    private Environment $twig;
    /**
     * twig config
     *
     * @var array
     */
    private array $config;
    /**
     * settings twig environment and adding config settings
     *
     * @param string $path
     * @param array $config
     *
     * @return none
     */
    public function __construct(string $path, array $config = [])
    {
        $this->config = $config;
        $this->loader = new FilesystemLoader($path);
        $this->twig = new Environment($this->loader, $config);
        $this->addExtension(new TwigExtension());
        $this->addRuntimeLoader(new TwigRuntimeLoader());

    }
       /**
       * twig custom extension adding
       *
       * @param ExtensionInterface $extension
       *
       * @return none
       */
    public function addExtension(ExtensionInterface $extension): void
    {
        $this->twig->addExtension($extension);
    }
       /**
       * twig file rendering
       *
       * @param string $file
       * @param array $vars[]
       *
       * @return string
       */
    public function render(string $file, array $vars = []): string
    {
        return $this->twig->render($file, $vars);
    }
      /**
       * twig renderBlock
       *
       * @param string $block
       * @param array $vars[]
       *
       * @return string
       */
    public function renederBlock(string $block, array $vars = [])
    {
        return $this->twig->renderBlock($block, $vars);
    }
      /**
    * adding RuntimeLoader
    *
    * @param RuntimeLoaderInterface $loader
    *
    * @return none
    */
    public function addRuntimeLoader(RuntimeLoaderInterface $loader): void
    {
        $this->twig->addRuntimeLoader($loader);
    }
}
