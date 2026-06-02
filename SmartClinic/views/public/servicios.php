<?php
// views/public/servicios.php
$navDark = false;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servicios — SmartClinic</title>
  <link rel="stylesheet" href="../../assets/css/main.css">
  <link rel="stylesheet" href="../../assets/css/servicios.css">
</head>
<body>

<?php include __DIR__ . '/../partials/navbar.php'; ?>

<!-- Page hero -->
<div class="page-hero">
  <div class="container">
    <div class="section-label" style="color:var(--sc-blue-200);justify-content:center;">Lo que ofrece el sistema</div>
    <h1>Servicios</h1>
    <p>Funcionalidades diseñadas para hacer eficiente el día a día de recepción, médicos y administración.</p>
  </div>
</div>

<!-- ════════════════════════════════════════
     SERVICIOS V1.0
════════════════════════════════════════ -->
<section class="section-pad">
  <div class="container">
    <div class="text-center reveal">
      <div class="section-label">Versión actual</div>
      <h2>Funcionalidades de SmartClinic v1.0</h2>
      <p style="max-width:520px;margin:8px auto 0;">Todo lo disponible en esta primera entrega del sistema, enfocado en la gestión diaria de recepción y administración.</p>
    </div>

    <div class="servicios-grid">

      <div class="servicio-card reveal">
        <div class="servicio-icon" style="background:var(--sc-blue-50);">🔐</div>
        <h3>Autenticación con roles</h3>
        <p>Inicio de sesión seguro con roles restrictivos para Administrador y Recepción. Cada usuario accede únicamente a su panel correspondiente.</p>
        <span class="badge badge--blue">v1.0 disponible</span>
      </div>

      <div class="servicio-card reveal reveal-delay-1">
        <div class="servicio-icon" style="background:#E1F5EE;">📋</div>
        <h3>CRUD de pacientes</h3>
        <p>Registro, edición, búsqueda y eliminación de perfiles de pacientes desde el módulo de recepción con todos sus datos básicos.</p>
        <span class="badge badge--green">v1.0 disponible</span>
      </div>

      <div class="servicio-card reveal reveal-delay-2">
        <div class="servicio-icon" style="background:var(--sc-blue-50);">👨‍⚕️</div>
        <h3>CRUD de médicos</h3>
        <p>Gestión completa de perfiles médicos: nombre, especialidad, horarios y estado. Permite asociarlos rápidamente a citas.</p>
        <span class="badge badge--blue">v1.0 disponible</span>
      </div>

      <div class="servicio-card reveal">
        <div class="servicio-icon" style="background:#FAEEDA;">📅</div>
        <h3>Gestión de citas</h3>
        <p>Creación, modificación y cancelación de citas con validación automática para evitar duplicidad de horarios en el mismo médico.</p>
        <span class="badge badge--amber">v1.0 disponible</span>
      </div>

      <div class="servicio-card reveal reveal-delay-1">
        <div class="servicio-icon" style="background:var(--sc-blue-50);">📊</div>
        <h3>Dashboard de métricas</h3>
        <p>Panel de control con resumen de citas del día, médicos activos, pacientes registrados y operaciones recientes.</p>
        <span class="badge badge--blue">v1.0 disponible</span>
      </div>

      <div class="servicio-card reveal reveal-delay-2">
        <div class="servicio-icon" style="background:#E1F5EE;">⚙️</div>
        <h3>Configuración del sistema</h3>
        <p>Pantalla de datos globales de la clínica: nombre, dirección, horario de atención y parámetros generales de configuración.</p>
        <span class="badge badge--green">v1.0 disponible</span>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     ROADMAP DE VERSIONES
════════════════════════════════════════ -->
<section class="versiones section-pad">
  <div class="container">
    <div class="text-center reveal">
      <div class="section-label">Hoja de ruta</div>
      <h2>Evolución del sistema</h2>
      <p style="max-width:480px;margin:8px auto 0;">SmartClinic está diseñado para crecer de forma modular. Lo que no está en v1.0 ya está planificado.</p>
    </div>

    <div class="versiones-grid">

      <!-- V1 -->
      <div class="version-card featured reveal">
        <div class="version-header">
          <span class="version-tag">Versión actual</span>
          <h3>SmartClinic v1.0</h3>
          <p>Gestión de recepción y administración</p>
        </div>
        <div class="version-body">
          <div class="version-item">Autenticación con control de roles</div>
          <div class="version-item">CRUD de pacientes</div>
          <div class="version-item">CRUD de médicos y especialidades</div>
          <div class="version-item">Gestión y agenda de citas</div>
          <div class="version-item">Dashboard administrativo</div>
          <div class="version-item">Páginas públicas informativas</div>
        </div>
      </div>

      <!-- V2 -->
      <div class="version-card reveal reveal-delay-1">
        <div class="version-header">
          <span class="version-tag badge badge--blue">Próxima</span>
          <h3>SmartClinic v2.0</h3>
          <p>Portal de doctores y atención dinámica</p>
        </div>
        <div class="version-body">
          <div class="version-item pending">Portal exclusivo para médicos</div>
          <div class="version-item pending">Agenda dinámica en tiempo real</div>
          <div class="version-item pending">Monitor de sala de espera</div>
          <div class="version-item pending">Historial médico y diagnóstico</div>
          <div class="version-item pending">Generación de recetas digitales</div>
          <div class="version-item pending">Estados de cita en tiempo real</div>
        </div>
      </div>

      <!-- V3 -->
      <div class="version-card reveal reveal-delay-2">
        <div class="version-header">
          <span class="version-tag badge badge--blue">Futura</span>
          <h3>SmartClinic v3.0</h3>
          <p>Portal del paciente y pagos en línea</p>
        </div>
        <div class="version-body">
          <div class="version-item pending">Registro público de pacientes</div>
          <div class="version-item pending">Portal de autoservicio</div>
          <div class="version-item pending">Agendamiento autónomo</div>
          <div class="version-item pending">Pasarela de pago (Stripe/PayPal)</div>
          <div class="version-item pending">Recibos digitales automáticos</div>
          <div class="version-item pending">Historial médico para el paciente</div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script src="/assets/js/main.js"></script>
</body>
</html>
