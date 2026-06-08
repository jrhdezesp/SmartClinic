<?php

namespace Controllers;

use Dao\Medicos as DaoMedicos;
use Dao\Pacientes as DaoPacientes;
use Utilities\Security;

// Dashboard principal para usuarios autenticados
class HomeController extends PrivateController
{
    // =============================
    // RUN
    // =============================
    public function run(): void
    {
        $medicos = DaoMedicos::getAllMedicos();
        $pacientes = DaoPacientes::getAllPacientes();

        $userId = Security::getUserId();
        $canManageMedicos = Security::isAuthorized($userId, 'MedicosController', 'CTR');
        $canManagePacientes = Security::isAuthorized($userId, 'PacientesController', 'CTR');

        $dataView = [
            'userName' => Security::getUser()['userName'] ?? 'Usuario',
            'fecha_hoy' => date('d/m/Y'),
            'total_medicos' => count($medicos),
            'total_pacientes' => count($pacientes),
            'medicos' => array_slice($medicos, 0, 4),
            'pacientes' => array_slice($pacientes, 0, 5),
            'canManageMedicos' => $canManageMedicos,
            'canManagePacientes' => $canManagePacientes,
            'canSchedule' => Security::isLogged() && !$canManageMedicos,
        ];

        \Views\Renderer::render("dashboard", $dataView);
    }
}
