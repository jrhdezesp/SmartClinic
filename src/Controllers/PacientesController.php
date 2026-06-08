<?php
namespace Controllers;

use Views\Renderer;
use Dao\Pacientes as DaoPacientes;
use Utilities\Security;
use Utilities\Site;

class PacientesController extends PublicController
{
    private array $viewData = [];

    public function run(): void
    {
        $action = $_GET["action"] ?? "index";
        $action = trim(strval($action));

        switch ($action) {
            case "index":
                $this->index();
                break;

            case "create":
                $this->create();
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
        $isAdmin = $userId === 1 || Security::isInRol($userId, 1);
        $showCrudActions = Security::isAuthorized($userId, 'PacientesController', 'CTR') || $isAdmin;

        $search = trim(strval($_GET["search"] ?? ""));
        $pacientes = DaoPacientes::getAllPacientes();
        if ($search !== "") {
            $searchLower = strtolower($search);
            $pacientes = array_filter($pacientes, function ($item) use ($searchLower) {
                return strpos(strtolower($item["identidad"] ?? ""), $searchLower) !== false ||
                    strpos(strtolower($item["nombres"] ?? ""), $searchLower) !== false ||
                    strpos(strtolower($item["apellidos"] ?? ""), $searchLower) !== false ||
                    strpos(strtolower($item["telefono"] ?? ""), $searchLower) !== false ||
                    strpos(strtolower($item["direccion"] ?? ""), $searchLower) !== false;
            });
        }

        $this->viewData["pacientes"] = array_values($pacientes);
        $this->viewData["showCrudActions"] = $showCrudActions;
        $this->viewData["searchValue"] = $search;
        Renderer::render("pacientes", $this->viewData);
    }

    private function create(): void
    {
        $this->authorizeCrud();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            DaoPacientes::insertPaciente(
                $_POST["identidad"] ?? "",
                $_POST["nombres"] ?? "",
                $_POST["apellidos"] ?? "",
                $_POST["fecha_nacimiento"] ?? "",
                $_POST["telefono"] ?? "",
                $_POST["direccion"] ?? ""
            );

            Site::redirectTo("index.php?page=PacientesController&action=index");
            exit;
        }

        Renderer::render("paciente_create", []);
    }

    private function authorizeCrud(): void
    {
        $userId = Security::getUserId();
        $isAdmin = $userId === 1 || Security::isInRol($userId, 1);

        if (!Security::isAuthorized($userId, 'PacientesController', 'CTR') && !$isAdmin) {
            Site::redirectTo("index.php?page=PacientesController&action=index");
            exit;
        }
    }

    private function edit(): void
    {
        $this->authorizeCrud();

        $id = intval($_GET["id"] ?? 0);

        if ($id <= 0) {
            Site::redirectTo("index.php?page=PacientesController&action=index");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            DaoPacientes::updatePaciente(
                $id,
                $_POST["identidad"] ?? "",
                $_POST["nombres"] ?? "",
                $_POST["apellidos"] ?? "",
                $_POST["fecha_nacimiento"] ?? "",
                $_POST["telefono"] ?? "",
                $_POST["direccion"] ?? ""
            );

            Site::redirectTo("index.php?page=PacientesController&action=index");
            exit;
        }

        $paciente = DaoPacientes::getPacienteById($id);

        Renderer::render(
            "paciente_edit",
            ["paciente" => $paciente]
        );
    }

    private function delete(): void
    {
        $this->authorizeCrud();

        $id = intval($_GET["id"] ?? 0);

        if ($id > 0) {
            DaoPacientes::deletePaciente($id);
        }

        Site::redirectTo("index.php?page=PacientesController&action=index");
        exit;
    }
}