<?php

namespace Controllers;

class Landing extends PublicController
{
    public function run(): void
    {
        if (\Utilities\Security::isLogged()) {
            \Utilities\Site::redirectTo('index.php?page=Home');
            return;
        }

        \Utilities\Context::setContext('navDark', true);
        \Utilities\Site::addLink('public/css/landing.css');
        \Views\Renderer::render('landing', []);
    }
}
