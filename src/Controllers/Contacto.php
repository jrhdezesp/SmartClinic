<?php

namespace Controllers;

class Contacto extends PublicController
{
    public function run(): void
    {
        \Utilities\Context::setContext('navDark', true);
        \Utilities\Site::addLink('public/css/contacto.css');
        \Utilities\Site::addEndScript('public/js/contacto.js');
        \Views\Renderer::render('contacto', []);
    }
}
