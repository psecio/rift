<?php

namespace App\View;
use \Psr\Http\Message\ResponseInterface;

class TemplateView extends \Slim\Views\Twig
{
    protected $container;

    public function render(ResponseInterface $response, $template, $data = [])
    {
        $this->container = $this['container'];

        if (isset($_SESSION['user'])) {
            $data['username'] = $_SESSION['user']['username'];
        }

        parent::render($response, $template, $data);
    }
}
