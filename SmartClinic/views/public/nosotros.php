<?php
// views/public/nosotros.php
$navDark = false;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nosotros — SmartClinic</title>
  <link rel="stylesheet" href="../../assets/css/main.css">
  <link rel="stylesheet" href="../../assets/css/nosotros.css">
</head>
<body>

<?php include __DIR__ . '/../partials/navbar.php'; ?>

<!-- Page hero -->
<div class="page-hero">
  <div class="container">
    <div class="section-label" style="color:var(--sc-blue-200);justify-content:center;">Conoce el proyecto</div>
    <h1>Nosotros</h1>
    <p>Somos el Grupo 3 del curso IF361-1801 — Seminario-Taller de Software, UNICAH. SmartClinic nació para resolver un problema real en clínicas pequeñas de Honduras.</p>
  </div>
</div>

<!-- ════════════════════════════════════════
     MISIÓN / VISIÓN / VALORES
════════════════════════════════════════ -->
<section class="section-pad">
  <div class="container">
    <div class="text-center reveal">
      <div class="section-label">Identidad del proyecto</div>
      <h2>Misión, Visión y Valores</h2>
    </div>
    <div class="mvv-grid">

      <div class="mvv-card reveal">
        <div class="mvv-icon">🎯</div>
        <h3>Misión</h3>
        <p>Desarrollar un sistema de gestión de citas médicas que reduzca el error humano, elimine la duplicidad de registros y agilice los procesos de recepción en centros de salud pequeños en Honduras.</p>
      </div>

      <div class="mvv-card reveal reveal-delay-1">
        <div class="mvv-icon">🔭</div>
        <h3>Visión</h3>
        <p>Convertirnos en el sistema de referencia para la digitalización de clínicas privadas en Centroamérica, escalando desde la gestión básica de citas hasta expedientes clínicos completos y pagos en línea.</p>
      </div>

      <div class="mvv-card reveal reveal-delay-2">
        <div class="mvv-icon">⭐</div>
        <h3>Valores</h3>
        <p>Confiabilidad en cada dato registrado. Transparencia en el proceso de atención. Compromiso con el bienestar del paciente y la eficiencia del personal médico.</p>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     EQUIPO
════════════════════════════════════════ -->
<section class="team section-pad">
  <div class="container">
    <div class="text-center reveal">
      <div class="section-label">Quiénes lo construyeron</div>
      <h2>Equipo de Desarrollo</h2>
      <p style="max-width:480px;margin:8px auto 0;">Cinco estudiantes de Ingeniería en Ciencias de la Computación divididos en roles del mundo real.</p>
    </div>

    <div class="team-grid">

      <div class="team-card reveal">
        <div class="team-avatar">JH</div>
        <h4>José Hernández</h4>
        <p>Coordinador General</p>
        <span class="team-role badge badge--blue">Supervisión · Correcciones</span>
      </div>

      <div class="team-card reveal reveal-delay-1">
        <div class="team-avatar">CL</div>
        <h4>Carlos Luna</h4>
        <p>Desarrollador Back-End</p>
        <span class="team-role badge badge--blue">PHP · MySQL · MVC</span>
      </div>

      <div class="team-card reveal reveal-delay-2">
        <div class="team-avatar">MH</div>
        <h4>Martín Henríquez</h4>
        <p>Desarrollador Front-End</p>
        <span class="team-role badge badge--blue">HTML · CSS · JS</span>
      </div>

      <div class="team-card reveal">
        <div class="team-avatar">MA</div>
        <h4>María Aguilar</h4>
        <p>Desarrolladora Back-End</p>
        <span class="team-role badge badge--blue">PHP · MySQL</span>
      </div>

      <div class="team-card reveal reveal-delay-1">
        <div class="team-avatar">LR</div>
        <h4>Leibo Raibstein</h4>
        <p>Desarrollador Front-End</p>
        <span class="team-role badge badge--blue">Bootstrap · UI/UX</span>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     STACK TECNOLÓGICO
════════════════════════════════════════ -->
<section class="section-pad">
  <div class="container">
    <div class="text-center reveal">
      <div class="section-label">Arquitectura MVC</div>
      <h2>Stack tecnológico</h2>
      <p style="max-width:500px;margin:8px auto 0;">Tecnologías elegidas por su robustez, facilidad de despliegue con Docker y curva de aprendizaje adecuada al equipo.</p>
    </div>

    <div class="stack-grid">

      <div class="stack-item reveal">
        <div class="stack-icon">🌐</div>
        <h5>HTML5</h5>
        <p>Estructura semántica de vistas</p>
        <span class="badge badge--blue">Vista (MVC)</span>
      </div>

      <div class="stack-item reveal reveal-delay-1">
        <div class="stack-icon">🎨</div>
        <h5>CSS3 + Bootstrap</h5>
        <p>Estilo, layout responsive y componentes</p>
        <span class="badge badge--blue">Vista (MVC)</span>
      </div>

      <div class="stack-item reveal reveal-delay-2">
        <div class="stack-icon">⚡</div>
        <h5>JavaScript</h5>
        <p>Interactividad del cliente</p>
        <span class="badge badge--blue">Vista (MVC)</span>
      </div>

      <div class="stack-item reveal reveal-delay-3">
        <div class="stack-icon">🐘</div>
        <h5>PHP</h5>
        <p>Lógica del servidor y controladores</p>
        <span class="badge badge--blue">Controlador + Modelo</span>
      </div>

      <div class="stack-item reveal">
        <div class="stack-icon">🗄️</div>
        <h5>MySQL</h5>
        <p>Base de datos relacional</p>
        <span class="badge badge--blue">Modelo (MVC)</span>
      </div>

      <div class="stack-item reveal reveal-delay-1">
        <div class="stack-icon">🐳</div>
        <h5>Docker</h5>
        <p>Contenedores para despliegue</p>
        <span class="badge badge--blue">DevOps</span>
      </div>

      <div class="stack-item reveal reveal-delay-2">
        <div class="stack-icon">🔀</div>
        <h5>Git</h5>
        <p>Control de versiones del código</p>
        <span class="badge badge--blue">Control de versiones</span>
      </div>

      <div class="stack-item reveal reveal-delay-3">
        <div class="stack-icon">🐙</div>
        <h5>GitHub</h5>
        <p>Repositorio remoto del equipo</p>
        <span class="badge badge--blue">Colaboración</span>
      </div>

    </div>
  </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script src="/assets/js/main.js"></script>
</body>
</html>
