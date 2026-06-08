<?php

namespace Controllers\Security;

use Controllers\PrivateController;
use Views\Renderer;
use Dao\Security\Funciones as DaoFunciones;
use Utilities\Site;
use Utilities\Validators;

// CRUD de una funcion/permiso del sistema
class Funcion extends PrivateController
{
    private $viewData = [];
    private $mode = "DSP";
    private $modeDescriptions = [
        "DSP" => "Detalle de la Función %s",
        "INS" => "Nueva Función",
        "UPD" => "Editar Función %s",
        "DEL" => "Eliminar Función %s"
    ];
    private $readonly = "";
    private $showCommitBtn = true;
    private $originalFncod = "";
    private $funcion = [
        "fncod" => "",
        "fndsc" => "",
        "fnest" => "ACT",
        "fntyp" => "FNC"
    ];

    // =============================
    // RUN
    // =============================
    public function run(): void
    {
        try {
            // Controla ciclo CRUD de una funcion de seguridad
            $this->getData();
            if ($this->isPostBack() && $this->validateData()) {
                $this->handlePost();
            }
            $this->setViewData();
            Renderer::render("security/funcion", $this->viewData);
        } catch (\Exception $ex) {
            Site::redirectToWithMsg(
                "index.php?page=Security_Funciones",
                $ex->getMessage()
            );
        }
    }

    // =============================
    // GETDATA
    // =============================
    private function getData(): void
    {
        $this->mode = $_GET["mode"] ?? "NOF";
        // Carga datos base segaUn modo y codigo solicitado
        if (!isset($this->modeDescriptions[$this->mode])) {
            throw new \Exception("Modo inválido");
        }
        $this->readonly = ($this->mode === "DEL" || $this->mode === "DSP") ? "readonly" : "";
        $this->showCommitBtn = $this->mode !== "DSP";

        if ($this->mode !== "INS") {
            $funcionData = DaoFunciones::getFuncionById($_GET["id"]);
            if (!$funcionData) {
                throw new \Exception("Función no encontrada");
            }
            $this->funcion = array_merge($this->funcion, $funcionData);
            $this->originalFncod = $this->funcion["fncod"];
        }
    }

    // =============================
    // VALIDATEDATA
    // =============================
    private function validateData(): bool
    {
        $errors = [];
        // Valida campos requeridos del formulario
        $this->funcion["fncod"] = trim($_POST["fncod"] ?? "");
        $this->originalFncod = trim($_POST["fncod_original"] ?? $this->originalFncod);
        $this->funcion["fndsc"] = trim($_POST["fndsc"] ?? "");
        $this->funcion["fnest"] = $_POST["fnest"] ?? "ACT";
        $this->funcion["fntyp"] = $_POST["fntyp"] ?? "FNC";

        if (Validators::IsEmpty($this->funcion["fncod"])) {
            $errors["fncod_error"] = "Código de función requerido";
        }
        if (Validators::IsEmpty($this->funcion["fndsc"])) {
            $errors["fndsc_error"] = "Descripción requerida";
        }
        if (!in_array($this->funcion["fnest"], ["ACT", "INA"])) {
            $errors["fnest_error"] = "Estado inválido";
        }
        // Validar tipo, puedes definir una lista de tipos permitidos
        $allowedTypes = ["MNU", "FNC", "CTL"]; // Ajusta según tus necesidades
        if (!in_array($this->funcion["fntyp"], $allowedTypes)) {
            $errors["fntyp_error"] = "Tipo inválido";
        }

        if (count($errors) > 0) {
            foreach ($errors as $k => $v) {
                $this->funcion[$k] = $v;
            }
            return false;
        }
        return true;
    }

    // =============================
    // HANDLEPOST
    // =============================
    private function handlePost(): void
    {
        switch ($this->mode) {
            // Ejecuta la operacion correspondiente al modo actual
            case "INS":
                DaoFunciones::insertFuncion(
                    $this->funcion["fncod"],
                    $this->funcion["fndsc"],
                    $this->funcion["fnest"],
                    $this->funcion["fntyp"]
                );
                Site::redirectToWithMsg("index.php?page=Security_Funciones", "Función creada correctamente");
                break;
            case "UPD":
                DaoFunciones::updateFuncion(
                    $this->funcion["fncod"],
                    $this->funcion["fndsc"],
                    $this->funcion["fnest"],
                    $this->funcion["fntyp"],
                    $this->originalFncod
                );
                Site::redirectToWithMsg("index.php?page=Security_Funciones", "Función actualizada correctamente");
                break;
            case "DEL":
                DaoFunciones::deleteFuncion($this->funcion["fncod"]);
                Site::redirectToWithMsg("index.php?page=Security_Funciones", "Función eliminada correctamente");
                break;
        }
    }

    // =============================
    // SETVIEWDATA
    // =============================
    private function setViewData(): void
    {
        $this->viewData["FormTitle"] = sprintf($this->modeDescriptions[$this->mode], $this->funcion["fncod"]);
        $this->viewData["mode"] = $this->mode;
        $this->viewData["field_readonly"] = ($this->mode === "DEL" || $this->mode === "DSP");
        $this->viewData["show_commit"] = ($this->mode !== "DSP");
        $this->viewData["is_delete"] = ($this->mode === "DEL");

        // Prepara datos para renderizar formulario
        $estadoKey = "fnest_" . strtolower($this->funcion["fnest"]);
        $this->funcion[$estadoKey] = "selected";

        $tipoKey = "fntyp_" . strtolower($this->funcion["fntyp"]);
        $this->funcion[$tipoKey] = "selected";
        $this->funcion["fncod_original"] = $this->originalFncod;

        $this->viewData = array_merge($this->viewData, $this->funcion);
    }
}
