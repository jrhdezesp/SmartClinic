<?php

namespace Controllers;

class Landing extends PublicController
{
    public function run(): void
    {
        \Utilities\Context::setContext('navDark', true);
        \Utilities\Site::addLink('public/css/landing.css');
        \Views\Renderer::render('landing', []);
    }
}
