<?php

namespace App\Core;

class Request
{
    protected $get;

    protected $post;

    protected $server;

    protected $files;

    protected $cookies;

    protected $session;

    public function __construct(?array $get = [], ?array $post = [], ?array $server = [], ?array $files = [], ?array $cookies = [], ?array $session = [])
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
        $this->files = $files;
        $this->cookies = $cookies;
        $this->session = $session;
    }

    public static function createFromGlobals()
    {
        return new self($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE, $_SESSION);
    }

    public function isMethod(string $methodTarged)
    {
        return $this->server['REQUEST_METHOD'] === $methodTarged;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function getGet(string $key = null)
    {
        return $key ? $this->get[$key] : $this->get;
    }
}
