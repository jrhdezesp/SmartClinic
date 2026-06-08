# SmartClinic v1.0

![Logo](public/img/logo_full.png)

## Integrantes
- Anyelo Favian Rivera Galindo - 1501200402099
- Carlos Gustavo Luna Acosta - 0301200400911
- Jose Ramon Hernandez Espinal - 0801200306613 - Coordinador
- Maria del Carmen Aguilar Martel - 0801200707818
- Leibo Moisés Raibstein Aguiluz - 0801200104787

## Tecnologías utilizadas
- Código / Controlador: Php + Composer
- Base de Datos / Modelo: MySQL
- Diseño / Vistas: HTML + CSS Custom (LESS) + JavaScript
- DevOps: Docker / XAMPP
- Control de Versiones: Github

## Problema planteado
En consultorios y clínicas independientes, la administración de agendas y datos suele manejarse manualmente o con herramientas fragmentadas.
Esto ocasiona duplicidad de citas, pérdida de información, retrasos notables en salas de espera y fatiga operativa del personal de recepción.

## Solución tecnológica
Un sistema integrado que simplifica, digitaliza y optimiza los procesos básicos de la clínica, desde el primer contacto en recepción.
Desarrollado bajo el patrón MVC, garantiza alta velocidad, consistencia relacional de datos y despliegue local simplificado (XAMPP/Docker).

## Alcance fase actual
- Autenticación de usuarios (Administrador y Recepción).
- Registro, edición y búsqueda de pacientes.
- Gestión de médicos según especialidades.
- Creación y cancelación manual de citas con validación horaria.
- Dashboard operativo con métricas básicas de recepción.

## Distribución del Proyecto
### Estructura principal de carpetas

- `public/`
  - `css/`
  - `css_src/`
  - `img/`
  - `js/`
- `src/`
  - `Controllers/`
  - `Dao/`
  - `Utilities/`
  - `Views/`
- `docs/`
- `README.md`
- `composer.json`