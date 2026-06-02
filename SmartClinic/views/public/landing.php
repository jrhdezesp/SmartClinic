<?php
// views/public/landing.php
$navDark = true;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartClinic — Sistema de Gestión de Citas Médicas</title>
  <link rel="stylesheet" href="../../assets/css/landing.css">
  <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>
<?php include __DIR__ . '/../partials/navbar.php'; ?>

<!-- ════════════════════════════════════════
    HERO
════════════════════════════════════════ -->
<section class="hero" id="inicio">
  <div class="hero-bg-dots"></div>
  <div class="container">
    <div class="hero-grid">

      <!-- Texto -->
      <div class="hero-content">
        <div class="hero-tag">Sistema de citas médicas v1.0</div>
        <h1>Tu clínica,<br>organizada <em>sin errores</em></h1>
        <p class="hero-desc">
          SmartClinic digitaliza la gestión de citas médicas en centros de salud pequeños,
          eliminando duplicidades, filas y papeles innecesarios.
        </p>
        <div class="hero-actions">
          <a href="/views/auth/login.php" class="btn btn--light">Iniciar sesión</a>
          <a href="#como-funciona" class="btn btn--outline" style="border-color:rgba(255,255,255,.35);color:#fff;">
            Cómo funciona ↓
          </a>
        </div>
        <div class="hero-stats">
          <div>
            <span class="stat-num">500+</span>
            <span class="stat-label">Pacientes registrados</span>
          </div>
          <div>
            <span class="stat-num">20+</span>
            <span class="stat-label">Médicos activos</span>
          </div>
          <div>
            <span class="stat-num">98%</span>
            <span class="stat-label">Satisfacción</span>
          </div>
        </div>
      </div>

      <!-- Visual -->
      <div class="hero-visual reveal">
        <div class="hero-card-stack">

          <div class="hcard hcard-main">
            <div class="hcard-title">📅 Agenda del día</div>
            <div class="hcard-row">
              <div class="hcard-dot green"></div>
              <div>
                <div class="hcard-row-text">Dr. Rodríguez · 09:00</div>
                <div class="hcard-row-sub">Carlos Mejía — Confirmado</div>
              </div>
            </div>
            <div class="hcard-row">
              <div class="hcard-dot amber"></div>
              <div>
                <div class="hcard-row-text">Dra. López · 10:30</div>
                <div class="hcard-row-sub">Ana Torres — En espera</div>
              </div>
            </div>
            <div class="hcard-row">
              <div class="hcard-dot gray"></div>
              <div>
                <div class="hcard-row-text">Dr. Martínez · 11:00</div>
                <div class="hcard-row-sub">Luis Paz — Pendiente</div>
              </div>
            </div>
          </div>

          <div class="hcard hcard-mini">
            <div style="font-size:18px;margin-bottom:4px;">👨‍⚕️</div>
            <div style="font-weight:700;">12 médicos</div>
            <div style="opacity:.7;font-size:11px;">disponibles hoy</div>
          </div>

          <div class="hcard hcard-mini2">
            <div style="font-size:18px;margin-bottom:4px;">✅</div>
            <div style="font-weight:700;">Cita registrada</div>
            <div style="opacity:.7;font-size:11px;">Sin conflicto de horario</div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     FEATURES
════════════════════════════════════════ -->
<section class="features section-pad" id="features">
  <div class="container">
    <div class="features-intro text-center reveal">
      <div class="section-label">¿Qué resolvemos?</div>
      <h2>Todo lo que tu clínica necesita</h2>
      <p>Un sistema completo para administrar pacientes, médicos y citas sin complicaciones.</p>
    </div>

    <div class="features-grid">

      <div class="fcard reveal">
        <div class="fcard-icon">📋</div>
        <h3>Registro de pacientes</h3>
        <p>Crea, edita y consulta expedientes de pacientes de manera rápida y segura desde recepción.</p>
        <div style="margin-top:14px;">
          <span class="badge badge--blue">CRUD Pacientes</span>
        </div>
      </div>

      <div class="fcard reveal reveal-delay-1">
        <div class="fcard-icon">👨‍⚕️</div>
        <h3>Directorio de médicos</h3>
        <p>Gestiona los perfiles médicos, especialidades y horarios disponibles para agendar citas.</p>
        <div style="margin-top:14px;">
          <span class="badge badge--blue">CRUD Médicos</span>
        </div>
      </div>

      <div class="fcard reveal reveal-delay-2">
        <div class="fcard-icon">📅</div>
        <h3>Gestión de citas</h3>
        <p>Agenda, modifica y cancela citas con validación automática para evitar conflictos de horario.</p>
        <div style="margin-top:14px;">
          <span class="badge badge--blue">Agenda v1.0</span>
        </div>
      </div>

      <div class="fcard reveal reveal-delay-1">
        <div class="fcard-icon">🔒</div>
        <h3>Control de acceso</h3>
        <p>Roles diferenciados para Administrador y Recepción. Cada usuario ve solo lo que le corresponde.</p>
        <div style="margin-top:14px;">
          <span class="badge badge--blue">Roles v1.0</span>
        </div>
      </div>

      <div class="fcard reveal reveal-delay-2">
        <div class="fcard-icon">📊</div>
        <h3>Dashboard operativo</h3>
        <p>Panel de métricas con citas del día, médicos disponibles y resumen de actividad de la clínica.</p>
        <div style="margin-top:14px;">
          <span class="badge badge--blue">Admin Panel</span>
        </div>
      </div>

      <div class="fcard reveal reveal-delay-3">
        <div class="fcard-icon">🐳</div>
        <h3>Desplegable con Docker</h3>
        <p>El sistema corre en contenedores Docker para garantizar consistencia entre los entornos de desarrollo y producción.</p>
        <div style="margin-top:14px;">
          <span class="badge badge--blue">DevOps</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     CÓMO FUNCIONA
════════════════════════════════════════ -->
<section class="how section-pad" id="como-funciona">
  <div class="container">
    <div class="how-grid">

      <div>
        <div class="section-label reveal">Proceso</div>
        <h2 class="reveal">Así de simple funciona</h2>
        <p class="reveal" style="margin-bottom:32px;">En cuatro pasos, la recepción puede tener una cita agendada sin errores.</p>

        <div class="how-steps">
          <div class="how-step reveal">
            <div class="how-num">1</div>
            <div>
              <h4>Inicia sesión</h4>
              <p>El personal ingresa con su usuario y contraseña. El sistema asigna el panel correspondiente a su rol.</p>
            </div>
          </div>
          <div class="how-step reveal reveal-delay-1">
            <div class="how-num">2</div>
            <div>
              <h4>Registra paciente y médico</h4>
              <p>Si son nuevos, se crean sus perfiles. Si ya existen, se buscan directamente en el directorio.</p>
            </div>
          </div>
          <div class="how-step reveal reveal-delay-2">
            <div class="how-num">3</div>
            <div>
              <h4>Agenda la cita</h4>
              <p>El sistema valida que el horario esté libre y registra la cita con estado "Pendiente".</p>
            </div>
          </div>
          <div class="how-step reveal reveal-delay-3">
            <div class="how-num">4</div>
            <div>
              <h4>Confirmación inmediata</h4>
              <p>La cita aparece en la agenda del día y el médico es notificado automáticamente.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Visual decorativo -->
      <div class="how-visual reveal">
        <div class="how-visual-inner">
          <div class="how-mini-card">
            <div class="icon">🔑</div>
            <strong>Login</strong>
            <span style="font-size:11px;opacity:.7;">Admin · Recepción</span>
          </div>
          <div class="how-mini-card">
            <div class="icon">👤</div>
            <strong>Paciente</strong>
            <span style="font-size:11px;opacity:.7;">Registrado</span>
          </div>
          <div class="how-mini-card">
            <div class="icon">📅</div>
            <strong>Cita</strong>
            <span style="font-size:11px;opacity:.7;">Sin conflicto</span>
          </div>
          <div class="how-mini-card">
            <div class="icon">✅</div>
            <strong>Confirmada</strong>
            <span style="font-size:11px;opacity:.7;">En agenda</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     CTA BANNER
════════════════════════════════════════ -->
<section class="cta-banner reveal">
  <div class="container">
    <h2>¿Listo para modernizar tu clínica?</h2>
    <p>Empieza ahora mismo. Sin instalaciones complicadas — solo Docker y listo.</p>
    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
      <a href="/views/auth/login.php"    class="btn btn--light">Acceder al sistema</a>
      <a href="/views/public/contacto.php" class="btn" style="background:var(--sc-white);color:var(--sc-blue-900);">Contáctanos</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script src="/assets/js/main.js"></script>
</body>
</html>
