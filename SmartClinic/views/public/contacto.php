<?php
// views/public/contacto.php
$navDark = false;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto — SmartClinic</title>
  <link rel="stylesheet" href="../../assets/css/main.css">
  <link rel="stylesheet" href="../../assets/css/contacto.css">
</head>
<body>

<?php include __DIR__ . '/../partials/navbar.php'; ?>

<!-- Page hero -->
<div class="page-hero">
  <div class="container">
    <div class="section-label" style="color:var(--sc-blue-200);justify-content:center;">Estamos para ayudarte</div>
    <h1>Contacto</h1>
    <p>¿Tienes preguntas sobre SmartClinic? Escríbenos y te responderemos a la brevedad.</p>
  </div>
</div>

<!-- ════════════════════════════════════════
     CONTACTO PRINCIPAL
════════════════════════════════════════ -->
<section class="section-pad">
  <div class="container">
    <div class="contacto-layout">

      <!-- Info -->
      <div class="contacto-info reveal">

        <div>
          <div class="section-label">Información de contacto</div>
          <h2 style="margin-bottom:8px;">Encuéntranos aquí</h2>
          <p style="font-size:14px;margin-bottom:24px;">Proyecto académico desarrollado en UNICAH, Tegucigalpa.</p>
        </div>

        <div class="info-item">
          <div class="info-icon">📍</div>
          <div class="info-text">
            <h4>Dirección</h4>
            <p>Universidad Católica de Honduras<br>Tegucigalpa, Honduras</p>
          </div>
        </div>

        <div class="info-item">
          <div class="info-icon">✉️</div>
          <div class="info-text">
            <h4>Correo electrónico</h4>
            <p>grupo3.smartclinic@unicah.edu.hn</p>
          </div>
        </div>

        <div class="info-item">
          <div class="info-icon">🕐</div>
          <div class="info-text">
            <h4>Horario de atención</h4>
            <p>Lunes a Viernes: 7:00 AM – 5:00 PM<br>Sábados: 8:00 AM – 12:00 PM</p>
          </div>
        </div>

        <div class="info-item">
          <div class="info-icon">🐙</div>
          <div class="info-text">
            <h4>Repositorio GitHub</h4>
            <p><a href="https://github.com/jrhdezesp/SmartClinic/tree/main/SmartClinic" style="color:var(--sc-blue-700);font-weight:500;">SmartClinic/SmartClinic at main · jrhdezesp/SmartClinic</a></p>
          </div>
        </div>

        <div class="mapa-placeholder">
          <div style="font-size:32px;margin-bottom:8px;">🗺️</div>
          <p>Universidad Católica de Honduras<br>Tegucigalpa, Francisco Morazán</p>
        </div>

      </div>

      <!-- Formulario -->
      <div class="contacto-form reveal reveal-delay-1">
        <h3 style="margin-bottom:4px;">Envíanos un mensaje</h3>
        <p style="font-size:14px;margin-bottom:24px;">Completa el formulario y te responderemos pronto.</p>

        <form id="contactoForm" novalidate>

          <div class="form-row">
            <div class="form-group">
              <label for="nombre">Nombre completo *</label>
              <input type="text" id="nombre" name="nombre" placeholder="Juan Pérez" required>
            </div>
            <div class="form-group">
              <label for="email">Correo electrónico *</label>
              <input type="email" id="email" name="email" placeholder="juan@correo.com" required>
            </div>
          </div>

          <div class="form-group">
            <label for="asunto">Asunto *</label>
            <select id="asunto" name="asunto" required>
              <option value="">Selecciona un asunto</option>
              <option>Consulta sobre el sistema</option>
              <option>Reporte de error</option>
              <option>Solicitud de acceso</option>
              <option>Colaboración académica</option>
              <option>Otro</option>
            </select>
          </div>

          <div class="form-group">
            <label for="mensaje">Mensaje *</label>
            <textarea id="mensaje" name="mensaje" placeholder="Describe tu consulta o mensaje..." required></textarea>
          </div>

          <button type="submit" class="btn-submit" id="btnSubmit">
            Enviar mensaje
          </button>

          <div class="form-alert success" id="alertSuccess">
            ✅ ¡Mensaje enviado correctamente! Te contactaremos pronto.
          </div>
          <div class="form-alert error" id="alertError">
            ⚠️ Por favor completa todos los campos requeridos.
          </div>

        </form>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════
     FAQ
════════════════════════════════════════ -->
<section class="faq section-pad">
  <div class="container">
    <div class="text-center reveal">
      <div class="section-label">Preguntas frecuentes</div>
      <h2>¿Tienes dudas?</h2>
    </div>

    <div class="faq-list">

      <div class="faq-item reveal">
        <button class="faq-question">
          ¿Cómo accedo al sistema SmartClinic?
          <span class="faq-arrow">▼</span>
        </button>
        <div class="faq-answer">
          <p>El acceso es mediante usuario y contraseña. El administrador del sistema crea las cuentas para el personal. Dirígete a <strong>Iniciar sesión</strong> en la barra de navegación y usa las credenciales que te proporcionó tu administrador.</p>
        </div>
      </div>

      <div class="faq-item reveal reveal-delay-1">
        <button class="faq-question">
          ¿Qué roles existen en la versión actual?
          <span class="faq-arrow">▼</span>
        </button>
        <div class="faq-answer">
          <p>En la v1.0 existen dos roles: <strong>Administrador</strong> (gestiona usuarios, configuración y métricas generales) y <strong>Recepción</strong> (gestiona pacientes, médicos y citas). Los roles de Doctor y Paciente llegarán en v2.0 y v3.0.</p>
        </div>
      </div>

      <div class="faq-item reveal reveal-delay-2">
        <button class="faq-question">
          ¿Qué necesito para ejecutar SmartClinic?
          <span class="faq-arrow">▼</span>
        </button>
        <div class="faq-answer">
          <p>Solo necesitas <strong>Docker Desktop</strong> instalado en tu máquina. El sistema está contenedorizado — corre el <code>docker-compose up</code> desde la raíz del proyecto y el sistema levanta automáticamente con PHP, MySQL y el servidor web.</p>
        </div>
      </div>

      <div class="faq-item reveal reveal-delay-3">
        <button class="faq-question">
          ¿Puedo ver el código fuente del proyecto?
          <span class="faq-arrow">▼</span>
        </button>
        <div class="faq-answer">
          <p>Sí. El código está disponible en el repositorio de GitHub del Grupo 3. Consulta el README para instrucciones de instalación local. El proyecto es académico y está documentado conforme a los estándares del curso IF361-1801.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/contacto.js"></script>
</body>
</html>
