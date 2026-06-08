<?php
namespace Controllers;

use Views\Renderer;
use Dao\Medicos as DaoMedicos;
use Dao\Especialidad as DaoEspecialidad;
use Utilities\Security;
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
        $search = trim(strval($_GET["search"] ?? ""));
        $especialidad = trim(strval($_GET["especialidad"] ?? ""));
        $medicos = DaoMedicos::getAllMedicos();

        if ($search !== "" || $especialidad !== "") {
            $searchLower = strtolower($search);
            $especialidadLower = strtolower($especialidad);
            $medicos = array_filter($medicos, function ($item) use ($searchLower, $especialidadLower) {
                $matchSearch = $searchLower === "" ||
                    strpos(strtolower($item["nombres"] ?? ""), $searchLower) !== false ||
                    strpos(strtolower($item["apellidos"] ?? ""), $searchLower) !== false ||
                    strpos(strtolower($item["nombre_especialidad"] ?? ""), $searchLower) !== false ||
                    strpos(strtolower($item["num_colegiatura"] ?? ""), $searchLower) !== false;
                $matchEspecialidad = $especialidadLower === "" ||
                    strpos(strtolower($item["nombre_especialidad"] ?? ""), $especialidadLower) !== false;
                return $matchSearch && $matchEspecialidad;
            });
        }

        $this->viewData["medicos"] = array_values($medicos);
        $this->viewData["showCrudActions"] = Security::isAuthorized(Security::getUserId(), 'MedicosController', 'CTR');
        $this->viewData["canSchedule"] = Security::isLogged() && !$this->viewData["showCrudActions"];
        $this->viewData["searchValue"] = $search;
        $this->viewData["especialidadFilter"] = $especialidad;
        $especialidades = DaoEspecialidad::getAllEspecialidades();
        $this->viewData["especialidades"] = array_merge([
            [
                "id" => 0,
                "nombre_especialidad" => "Todas",
                "selected" => $especialidad === ""
            ]
        ], array_map(function ($especialidadItem) use ($especialidad) {
            $especialidadItem["selected"] = strcasecmp($especialidadItem["nombre_especialidad"], $especialidad) === 0;
            return $especialidadItem;
        }, $especialidades));
        Renderer::render("medicos", $this->viewData);
    }

    private function create(): void
    {
        $this->authorizeCrud();

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

    private function authorizeCrud(): void
    {
        if (!Security::isAuthorized(Security::getUserId(), 'MedicosController', 'CTR')) {
            Site::redirectTo("index.php?page=MedicosController&action=index");
            exit;
        }
    }

    private function edit(): void
    {
        $this->authorizeCrud();

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
        foreach ($especialidades as &$especialidad) {
            $especialidad['selected'] = intval($especialidad['id']) === intval($medico['especialidad_id']);
        }
        unset($especialidad);

        Renderer::render(
            "medico_edit",
            ["medico" => $medico, "especialidades" => $especialidades]
        );
    }

    private function delete(): void
    {
        $this->authorizeCrud();

        $id = intval($_GET["id"] ?? 0);

        if ($id > 0) {
            DaoMedicos::deleteMedico($id);
        }

        Site::redirectTo("index.php?page=MedicosController&action=index");
        exit;
    }
}
