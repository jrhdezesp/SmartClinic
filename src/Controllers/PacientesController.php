<?php
namespace Controllers;

use Views\Renderer;
use Dao\Pacientes as DaoPacientes;
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
    $this->viewData["pacientes"] = DaoPacientes::getAllPacientes();
    Renderer::render("pacientes", $this->viewData);
    }

    private function create(): void
    {
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

    private function edit(): void
    {
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
        $id = intval($_GET["id"] ?? 0);

        if ($id > 0) {
            DaoPacientes::deletePaciente($id);
        }

        Site::redirectTo("index.php?page=PacientesController&action=index");
        exit;
    }
}