<?php // views/partials/footer.php ?>
<footer id="sc-footer">
  <div class="container">

    <div class="footer-grid">

      <!-- Marca -->
      <div class="footer-brand">
        <div class="nav-logo">
          <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="32" height="32" rx="8" fill="#018DEC"/>
            <path d="M16 7v18M7 16h18" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
          </svg>
          Smart<span>Clinic</span>
        </div>
        <p>Sistema de gestión de citas médicas para centros de salud modernos en Honduras.</p>
      </div>

      <!-- Navegación -->
      <div class="footer-col">
        <h5>Navegación</h5>
        <ul>
          <li><a href="/views/public/landing.php">Inicio</a></li>
          <li><a href="/views/public/nosotros.php">Nosotros</a></li>
          <li><a href="/views/public/servicios.php">Servicios</a></li>
          <li><a href="/views/public/contacto.php">Contacto</a></li>
        </ul>
      </div>

      <!-- Sistema -->
      <div class="footer-col">
        <h5>Sistema</h5>
        <ul>
          <li><a href="/views/auth/login.php">Iniciar sesión</a></li>
          <li><a href="/views/admin/dashboard.php">Panel admin</a></li>
          <li><a href="/views/public/contacto.php">Soporte</a></li>
        </ul>
      </div>

      <!-- Contacto -->
      <div class="footer-col">
        <h5>Contacto</h5>
        <ul>
          <li><a href="mailto:contacto@smartclinic.hn">contacto@smartclinic.hn</a></li>
          <li><a href="tel:+50422345678">+504 2234-5678</a></li>
          <li><span>Tegucigalpa, Honduras</span></li>
        </ul>
      </div>

    </div>

    <div class="footer-bottom">
      <span>&copy; <?= date('Y') ?> SmartClinic — IF361-1801 · Seminario-Taller de Software · UNICAH</span>
      <span>Grupo 3</span>
    </div>

  </div>
</footer>
