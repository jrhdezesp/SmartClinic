<?php
namespace Controllers;

use Views\Renderer;
use Dao\Medicos as DaoMedicos;
use Dao\Especialidad as DaoEspecialidad;
use Utilities\Site;

class MedicosController extends PublicController
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
        $this->viewData["medicos"] = DaoMedicos::getAllMedicos();
        Renderer::render("medicos", $this->viewData);
    }

    private function create(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            DaoMedicos::insertMedico(
                intval($_POST["especialidad_id"] ?? 0),
                $_POST["nombres"] ?? "",
                $_POST["apellidos"] ?? "",
                $_POST["num_colegiatura"] ?? "",
                $_POST["telefono"] ?? ""
            );

            Site::redirectTo("index.php?page=MedicosController&action=index");
            exit;
        }

        $especialidades = DaoEspecialidad::getAllEspecialidades();
        Renderer::render("medico_create", ["especialidades" => $especialidades]);
    }

    private function edit(): void
    {
        $id = intval($_GET["id"] ?? 0);

        if ($id <= 0) {
            Site::redirectTo("index.php?page=MedicosController&action=index");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            DaoMedicos::updateMedico(
                $id,
                intval($_POST["especialidad_id"] ?? 0),
                $_POST["nombres"] ?? "",
                $_POST["apellidos"] ?? "",
                $_POST["num_colegiatura"] ?? "",
                $_POST["telefono"] ?? ""
            );

            Site::redirectTo("index.php?page=MedicosController&action=index");
            exit;
        }

        $medico = DaoMedicos::getMedicoById($id);
        $especialidades = DaoEspecialidad::getAllEspecialidades();

        Renderer::render(
            "medico_edit",
            ["medico" => $medico, "especialidades" => $especialidades]
        );
    }

    private function delete(): void
    {
        $id = intval($_GET["id"] ?? 0);

        if ($id > 0) {
            DaoMedicos::deleteMedico($id);
        }

        Site::redirectTo("index.php?page=MedicosController&action=index");
        exit;
    }
}
