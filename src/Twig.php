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
     * @var array<string,mixed>|null
     */
    private ?array $config = [];
    /**
     * settings twig environment and adding config settings
     *
     * @param string $path
     * @param array<string,mixed>|null $config
     *
     */
    public function __construct(string $path, ?array $config = [])
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
       */
    public function addExtension(ExtensionInterface $extension): void
    {
        $this->twig->addExtension($extension);
    }
       /**
       * twig file rendering
       *
       * @param string $file
       * @param array<string,mixed> $vars[]
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
       * @param array<string,mixed> $vars[]
       *
       * @return string
       */
    public function renderBlock(string $file, string $block, array $vars = [])
    {
        $template = $this->twig->load($file);
        return $template->renderBlock($block, $vars);
    }
    /**
    * adding RuntimeLoader
    *
    * @param RuntimeLoaderInterface $loader
    *
    */
    public function addRuntimeLoader(RuntimeLoaderInterface $loader): void
    {
        $this->twig->addRuntimeLoader($loader);
    }
    /**
    * getting configuration
    *
    * @return array<string,mixed>
    */
    public function getConfig(): ?array
    {
        return $this->config;
    }
}
