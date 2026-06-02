<?php

namespace Controllers;

class Nosotros extends PublicController
{
    public function run(): void
    {
        \Utilities\Context::setContext('navDark', true);
        \Utilities\Site::addLink('public/css/nosotros.css');
        \Views\Renderer::render('nosotros', []);
    }
}
