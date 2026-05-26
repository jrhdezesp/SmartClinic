<?php

namespace Controllers\Checkout;

use Controllers\PublicController;

class Catalogo extends PublicController
{
    public function run(): void
    {
        // Obtener productos desde el DAO
        $productResponse = \Dao\Products\Products::getProducts();
        $productosDB = $productResponse["products"] ?? [];

        // 🔥 MAPEAR CAMPOS PARA LA VISTA {{ }}
        $producto = array();

        foreach ($productosDB as $p) {
            $producto[] = array(
                "productId" => $p["productId"] ?? $p["id"] ?? "",
                "productName" => $p["productName"] ?? $p["nombre"] ?? "",
                "productDescription" => $p["productDescription"] ?? $p["descripcion"] ?? "",
                "productPrice" => $p["productPrice"] ?? $p["precio"] ?? 0,
                "productStock" => $p["productStock"] ?? $p["stock"] ?? 0,
                "productImgUrl" => $p["productImgUrl"] ?? $p["imagen"] ?? ""
            );
        }

        // 🔹 Obtener carrito (si está logueado)
        $carretilla = array();
        if (\Utilities\Security::isLogged()) {
            $carretilla = \Dao\Cart\Cart::getAll(\Utilities\Security::getUserId());
        }

        // 🔹 Convertir carrito a array asociativo
        $carrAssoc = array();
        foreach ($carretilla as $carr) {
            $carrAssoc[$carr["productId"]] = $carr;
        }

        // 🔹 Marcar productos que ya están en el carrito
        foreach ($producto as &$prod) {
            $prod["enCarretilla"] = isset($carrAssoc[$prod["productId"]]);
        }

        // Renderizar vista
        \Views\Renderer::render("catalogo", array(
            "productos" => $producto
        ));
    }
}
