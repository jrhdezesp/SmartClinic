<?php

namespace Dao\Security;

use Dao\Table;

// DAO de roles para busquedas y mantenimiento administrativo
class Roles extends Table
{
    // =============================
    // GETROLES
    // =============================
    public static function getRoles(
        string $partialName = "",
        string $status = "",
        string $orderBy = "",
        bool $orderDescending = false,
        int $page = 0,
        int $itemsPerPage = 10
    ): array {
        // Lista roles con filtros, orden y paginacion
        $sql = "SELECT * FROM roles WHERE 1=1 ";
        $countSql = "SELECT COUNT(*) as total FROM roles WHERE 1=1 ";
        $params = [];

        if ($partialName !== "") {
            $sql .= " AND (rolNombre LIKE :partialName OR rolDescripcion LIKE :partialName) ";
            $countSql .= " AND (rolNombre LIKE :partialName OR rolDescripcion LIKE :partialName) ";
            $params["partialName"] = "%" . $partialName . "%";
        }

        if ($status !== "") {
            $sql .= " AND rolStatus = :status ";
            $countSql .= " AND rolStatus = :status ";
            $params["status"] = $status;
        }

        // Validar orderBy para evitar inyeccion SQL
        $allowedOrderFields = ["rolId", "rolNombre", "rolStatus"];
        if ($orderBy !== "" && in_array($orderBy, $allowedOrderFields)) {
            $sql .= " ORDER BY " . $orderBy;
            if ($orderDescending) {
                $sql .= " DESC";
            }
        }

        // Obtener total de registros
        $totalResult = self::obtenerUnRegistro($countSql, $params);
        $total = $totalResult["total"] ?? 0;

        // Paginacion
        if ($itemsPerPage > 0) {
            $offset = $page * $itemsPerPage;
            $sql .= " LIMIT $offset, $itemsPerPage";
        }

        $registros = self::obtenerRegistros($sql, $params);

        return [
            "roles" => $registros,
            "total" => $total,
            "page" => $page,
            "itemsPerPage" => $itemsPerPage
        ];
    }

    // =============================
    // GETROLEBYID
    // =============================
    public static function getRoleById(string $rolId): array|false
    {
        // Devuelve un rol puntual por ID
        $sql = "SELECT * FROM roles WHERE rolId = :rolId";
        $params = ["rolId" => $rolId];
        return self::obtenerUnRegistro($sql, $params);
    }

    // =============================
    // INSERTROLE
    // =============================
    public static function insertRole(
        string $rolNombre,
        string $rolDescripcion,
        string $rolStatus
    ): int {
        // Inserta un nuevo rol en catalogo de seguridad
        $sql = "INSERT INTO roles (rolNombre, rolDescripcion, rolStatus)
                VALUES (:rolNombre, :rolDescripcion, :rolStatus)";
        $params = [
            "rolNombre" => $rolNombre,
            "rolDescripcion" => $rolDescripcion,
            "rolStatus" => $rolStatus
        ];
        return self::executeNonQuery($sql, $params);
    }

    // =============================
    // UPDATEROLE
    // =============================
    public static function updateRole(
        string $rolId,
        string $rolNombre,
        string $rolDescripcion,
        string $rolStatus
    ): int {
        // Actualiza nombre, descripcion y estado del rol
        $sql = "UPDATE roles
                SET rolNombre = :rolNombre,
                    rolDescripcion = :rolDescripcion,
                    rolStatus = :rolStatus
                WHERE rolId = :rolId";
        $params = [
            "rolId" => $rolId,
            "rolNombre" => $rolNombre,
            "rolDescripcion" => $rolDescripcion,
            "rolStatus" => $rolStatus
        ];
        return self::executeNonQuery($sql, $params);
    }

    // =============================
    // DELETEROLE
    // =============================
    public static function deleteRole(string $rolId): int
    {
        // Elimina rol por ID
        $sql = "DELETE FROM roles WHERE rolId = :rolId";
        $params = ["rolId" => $rolId];
        return self::executeNonQuery($sql, $params);
    }
}
