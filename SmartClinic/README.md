# SmartClinic v1.0

**Sistema de Gestión de Citas Médicas**  
IF361-1801 – Seminario-Taller de Software · UNICAH · Grupo 3

---

## Requisitos

- Docker Desktop instalado
- Git

## Levantar el proyecto

Repositorio: [SmartClinic/SmartClinic at main · jrhdezesp/SmartClinic](https://github.com/jrhdezesp/SmartClinic/tree/main/SmartClinic)

```bash
git clone https://github.com/jrhdezesp/SmartClinic.git
cd SmartClinic
docker-compose up --build
```

Accede en: `http://localhost:8080`

## Estructura de archivos

```
SmartClinic/
├── public/              ← Punto de entrada
│   └── assets/          ← CSS, JS, imágenes
├── views/
│   ├── public/          ← Páginas públicas (Inicio, Nosotros, Servicios, Contacto)
│   ├── partials/        ← Navbar y footer reutilizables
│   ├── auth/            ← Login / Logout
│   └── admin/           ← Dashboard, CRUDs
├── controllers/         ← Lógica PHP (MVC)
├── models/              ← Modelos de datos
├── config/              ← BD y enrutamiento (NO subir database.php)
└── docker/              ← Configuración Docker
```

## Equipo

| Nombre           | Rol         |
| ---------------- | ----------- |
| José Hernández   | Coordinador |
| Carlos Luna      | Back-End    |
| Martín Henríquez | Front-End   |
| María Aguilar    | Back-End    |
| Leibo Raibstein  | Front-End   |
| Anyelo Rivera    | Front-End   |

## Variables de entorno

Copia `config/database.example.php` → `config/database.php` y llena tus credenciales. **Nunca subas `database.php` a GitHub.**
