<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    /** @var Environment */
    protected $twig;

    public function __construct()
    {
        $this->configureTwig();
    }

    private function configureTwig()
    {
        $loader = new FilesystemLoader(__DIR__.'/../../templates');
        if (!$this->twig instanceof Environment) {
            $this->twig = new Environment($loader);
        }
    }

    protected function render(string $template, array $options = [])
    {
        return $this->twig->render($template, $options);
    }
}