# SmartClinic v1.1

![Logo](public/img/logo_full.png)

![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-Ready-2496ED?logo=docker&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-2.x-885630?logo=composer&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-3-1572B6?logo=css3&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-5-E34F26?logo=html5&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-8.x-FB7A24?logo=xampp&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6%2B-F7DF1E?logo=javascript&logoColor=black)
![License](https://img.shields.io/badge/License-MIT-green)

## Integrantes
- Anyelo Favian Rivera Galindo - 1501200402099
- Carlos Gustavo Luna Acosta - 0301200400911
- Jose Ramon Hernandez Espinal - 0801200306613 - Coordinador
- Maria del Carmen Aguilar Martel - 0801200707818
- Leibo Moisés Raibstein Aguiluz - 0801200104787

## Tecnologías utilizadas
- **Backend**: PHP 8.1+ + Composer (MVC propio)
- **Base de Datos**: MySQL 8.0
- **Frontend**: HTML5, CSS3 (LESS), JavaScript vanilla (ES6+)
- **DevOps**: Docker / XAMPP
- **Control de versiones**: Git + GitHub

## Problema planteado
En consultorios y clínicas independientes, la administración de agendas y datos suele manejarse manualmente o con herramientas fragmentadas. Esto ocasiona duplicidad de citas, pérdida de información, retrasos notables en salas de espera y fatiga operativa del personal de recepción.

## Solución tecnológica
Sistema integrado **MVC** que digitaliza y optimiza los procesos de recepción: pacientes, médicos, citas y dashboard operativo.  
**Destaca por:** alta velocidad, consistencia relacional, despliegue local simplificado (Docker/XAMPP) y **seguridad por capas** (rate limiting, sanitización centralizada, CSRF, validación estricta de transiciones de estado).

---

## ✨ Novedades v1.1 (Mejoras recientes)

| Área | Mejora |
|------|--------|
| 🔐 **Seguridad** | Rate limiting en login (5 intentos / 15 min), sanitización centralizada (`Validators`), protección CSRF, validación de email/password robusta |
| 📅 **Citas** | Auto-cancelación de citas "pendientes" >1h pasadas, máquina de estados controlada (no saltos inválidos), modo solo lectura en citas pasadas/finalizadas |
| 📱 **Dashboard** | 100% responsive (móvil ≤480px, tablet ≤980px, desktop), tablas con scroll horizontal, calendario compacto, hero adaptativo |
| 🧹 **Calidad** | Sanitización/validación en **todo** CRUD (pacientes, médicos, usuarios, roles, funciones, perfil), tipos estrictos, logging de errores |
| 🧭 **UX** | Menú lateral reordenado (Perfil más accesible), feedback visual claro en formularios |

---

## Alcance funcional

### Gestión de usuarios y seguridad
- Autenticación con **rate limiting anti-fuerza bruta** y logging de intentos
- Roles y permisos granulares (RBAC): Admin / Recepción / Personalizable
- Perfil de usuario editable (nombre, contraseña)
- Administración de usuarios, roles, funciones y permisos con validación estricta

### Módulo Pacientes
- Registro, edición, búsqueda y listado paginado
- Validación: identidad alfanumérica, fechas, teléfonos, direcciones

### Módulo Médicos
- CRUD completo con especialidades
- Validación: colegiatura, nombres, teléfono, especialidad obligatoria

### Módulo Citas
- Agendar / Editar / Cancelar con validación horaria y disponibilidad
- **Auto-cancelación automática** de citas "Pendiente" tras 1 hora de no-show
- **Flujo de estados controlado**: Pendiente → Confirmada → Completada / Cancelada / No Asistió
- **Modo solo lectura** automático en citas pasadas o estado final
- API de horarios disponibles (AJAX)

### Dashboard Operativo
- Métricas: citas hoy, pacientes totales, médicos activos, ocupación
- Calendario semanal interactivo (navegación mes/año, vista día)
- Próximas citas y alertas
- **Totalmente responsive**: usable en móvil, tablet y escritorio

---

## 🚀 Instalación

### Opción A: Docker (recomendado)
```bash
git clone https://github.com/tu-usuario/SmartClinic.git
cd SmartClinic
docker compose up -d
# App: http://localhost:8080  |  DB: localhost:3306
```

### Opción B: XAMPP / Local
```bash
# 1. Clonar en htdocs
git clone https://github.com/tu-usuario/SmartClinic.git

# 2. Instalar dependencias
composer install

# 3. Importar BD
mysql -u root -p < docs/smartclinic_1p.sql

# 4. Configurar .env
cp .env.example .env
# editar DB_HOST, DB_NAME, DB_USER, DB_PASS

# 5. Apache: DocumentRoot → public/
```

---

## 📁 Estructura del proyecto
```
SmartClinic/
├── public/                 # DocumentRoot (css, js, img, index.php)
├── src/
│   ├── Controllers/        # Controladores MVC (HTTP → Lógica)
│   ├── Dao/                # Acceso a datos (PDO, prepared statements)
│   ├── Utilities/          # Validators, Security, Context, Site, Renderer
│   └── Views/              # Plantillas PHP (templates/)
├── docs/                   # SQL, diagramas, docs técnicos
├── data/                   # Archivos generados (login_attempts.json, etc.)
├── docker-compose.yml
├── Dockerfile
├── composer.json
└── README.md
```

---

## 📸 Capturas de pantalla

| Dashboard (Desktop) | Dashboard (Móvil) | Citas - Modo lectura |
|---------------------|-------------------|----------------------|
| ![Dashboard](public/img/Screenshots/Dashboard_Desktop.png) | ![Mobile](public/img/Screenshots/Dashboard_Mobile.png) | ![Readonly](public/img/Screenshots/Citas_ModoLectura.png) |

---

## 📄 Licencia
MIT License — ver [LICENSE](LICENSE) para detalles.

---

## 🙌 Créditos
Desarrollado por el equipo **SmartClinic** como proyecto académico / solución real para clínicas independientes.