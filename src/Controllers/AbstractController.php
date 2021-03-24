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

        $this->twig->addGlobal('app', $_SESSION);
    }

    protected function render(string $template, array $options = [])
    {
        return $this->twig->render($template, $options);
    }

    protected function redirect(string $url)
    {
        header('Location: '.$url);
    }
}
