<?php

namespace Controllers;

// Dashboard principal para usuarios autenticados
class HomeController extends PrivateController
{
    // =============================
    // RUN
    // =============================
    public function run(): void
    {
        $dataView = [];
        $dataView['userName'] = \Utilities\Security::getUser()['userName'] ?? 'Admin';
        \Views\Renderer::render("dashboard", $dataView);
    }
}
