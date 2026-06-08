<?php

namespace Controllers;

use Views\Renderer;
use Dao\Citas as DaoCitas;
use Dao\Medicos as DaoMedicos;
use Dao\Pacientes as DaoPacientes;
use Utilities\Security;
use Utilities\Site;

class CitasController extends PublicController
{
    private array $viewData = [];

    public function run(): void
    {
        // Requiere autenticación pero no controlador específico
        if (!Security::isLogged()) {
            Site::redirectTo("index.php?page=Sec_Login");
            exit;
        }

        $action = $_GET["action"] ?? "index";
        $action = trim(strval($action));

        switch ($action) {
            case "index":
                $this->index();
                break;

            case "agendar":
                $this->agendar();
                break;

            case "edit":
                $this->edit();
                break;

            case "delete":
                $this->delete();
                break;

            default:
                $this->index();
                break;
        }
    }

    private function index(): void
    {
        $userId = Security::getUserId();
        $canManageCitas = Security::isAuthorized($userId, 'CitasController', 'CTR');
        $isAdmin = $userId === 1 || Security::isInRol($userId, 1);
        $showCrudActions = $canManageCitas || $isAdmin;

        // Todos los usuarios logueados ven todas las citas
        // (sin edición/eliminación si no son admin)
        $this->viewData["citas"] = DaoCitas::getAllCitas();
        $this->viewData["canManageCitas"] = $canManageCitas;
        $this->viewData["showCrudActions"] = $showCrudActions;

        Renderer::render("citas", $this->viewData);
    }

    private function agendar(): void
    {
        // Cualquier usuario logueado puede agendar
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $pacienteId = intval($_POST["paciente_id"] ?? 0);
            $medicoId = intval($_POST["medico_id"] ?? 0);
            $fechaHora = $_POST["fecha_hora"] ?? "";

            if ($pacienteId <= 0 || $medicoId <= 0 || $fechaHora === "") {
                Site::redirectTo("index.php?page=CitasController&action=agendar&error=incomplete");
                exit;
            }

            // Verificar disponibilidad
            if (!DaoCitas::checkDisponibilidad($medicoId, $fechaHora)) {
                Site::redirectTo("index.php?page=CitasController&action=agendar&error=ocupado");
                exit;
            }

            // Estado 1 = Pendiente
            DaoCitas::insertCita($pacienteId, $medicoId, 1, $fechaHora);

            Site::redirectTo("index.php?page=CitasController&action=index&success=1");
            exit;
        }

        $medicos = DaoMedicos::getAllMedicos();
        $pacientes = DaoPacientes::getAllPacientes();
        
        $error = $_GET["error"] ?? "";
        $errorMsg = "";
        if ($error === "ocupado") {
            $errorMsg = "El médico no tiene disponibilidad en ese horario.";
        } elseif ($error === "incomplete") {
            $errorMsg = "Por favor completa todos los campos.";
        }

        Renderer::render("cita_agendar", [
            "medicos" => $medicos,
            "pacientes" => $pacientes,
            "error" => $errorMsg
        ]);
    }

    private function edit(): void
    {
        $this->authorizeCitas();

        $id = intval($_GET["id"] ?? 0);

        if ($id <= 0) {
            Site::redirectTo("index.php?page=CitasController&action=index");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $pacienteId = intval($_POST["paciente_id"] ?? 0);
            $medicoId = intval($_POST["medico_id"] ?? 0);
            $estadoId = intval($_POST["estado_id"] ?? 1);
            $fechaHora = $_POST["fecha_hora"] ?? "";

            DaoCitas::updateCita($id, $pacienteId, $medicoId, $estadoId, $fechaHora);

            Site::redirectTo("index.php?page=CitasController&action=index");
            exit;
        }

        $cita = DaoCitas::getCitaById($id);
        $medicos = DaoMedicos::getAllMedicos();
        $pacientes = DaoPacientes::getAllPacientes();

        Renderer::render("cita_edit", [
            "cita" => $cita,
            "medicos" => $medicos,
            "pacientes" => $pacientes
        ]);
    }

    private function delete(): void
    {
        $this->authorizeCitas();

        $id = intval($_GET["id"] ?? 0);

        if ($id > 0) {
            DaoCitas::deleteCita($id);
        }

        Site::redirectTo("index.php?page=CitasController&action=index");
        exit;
    }

    private function authorizeCitas(): void
    {
        $userId = Security::getUserId();
        $isAdmin = $userId === 1 || Security::isInRol($userId, 1);

        if (!Security::isAuthorized($userId, 'CitasController', 'CTR') && !$isAdmin) {
            Site::redirectTo("index.php?page=CitasController&action=index");
            exit;
        }
    }
}
