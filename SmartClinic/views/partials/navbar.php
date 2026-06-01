<?php
// views/partials/navbar.php
// Uso: include __DIR__ . '/../partials/navbar.php';
// Variable opcional: $navDark = true  → navbar transparente sobre hero oscuro
$navDark = $navDark ?? false;
?>
<nav id="sc-navbar" class="<?= $navDark ? 'nav-dark' : '' ?>">
  <div class="container nav-inner">

    <!-- Logo -->
    <a href="/views/public/landing.php" class="nav-logo">
      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="32" height="32" rx="8" fill="#018DEC"/>
        <path d="M16 7v18M7 16h18" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
        <rect x="4" y="10" width="24" height="12" rx="4" fill="none" stroke="#fff" stroke-width="1.5" opacity=".4"/>
      </svg>
      Smart<span>Clinic</span>
    </a>

    <!-- Links -->
    <ul class="nav-links">
      <li><a href="/views/public/landing.php"   class="<?= (basename($_SERVER['PHP_SELF']) === 'landing.php')   ? 'active' : '' ?>">Inicio</a></li>
      <li><a href="/views/public/nosotros.php"  class="<?= (basename($_SERVER['PHP_SELF']) === 'nosotros.php')  ? 'active' : '' ?>">Nosotros</a></li>
      <li><a href="/views/public/servicios.php" class="<?= (basename($_SERVER['PHP_SELF']) === 'servicios.php') ? 'active' : '' ?>">Servicios</a></li>
      <li><a href="/views/public/contacto.php"  class="<?= (basename($_SERVER['PHP_SELF']) === 'contacto.php')  ? 'active' : '' ?>">Contacto</a></li>
    </ul>

    <!-- CTA -->
    <a href="/views/auth/login.php" class="nav-cta">Iniciar sesión</a>

    <!-- Hamburger -->
    <button class="nav-toggle" id="navToggle" aria-label="Menú">
      <span></span><span></span><span></span>
    </button>

  </div>

  <!-- Mobile menu -->
  <div class="nav-mobile" id="navMobile">
    <ul>
      <li><a href="/views/public/landing.php">Inicio</a></li>
      <li><a href="/views/public/nosotros.php">Nosotros</a></li>
      <li><a href="/views/public/servicios.php">Servicios</a></li>
      <li><a href="/views/public/contacto.php">Contacto</a></li>
      <li><a href="/views/auth/login.php" class="nav-cta">Iniciar sesión</a></li>
    </ul>
  </div>
</nav>
