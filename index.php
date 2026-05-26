<?php
session_start();

// Entrada principal: enruta al MVC cuando llega ?page=..., o muestra portada paUblica

// Router MVC: si viene page=..., ejecuta el controlador
if (isset($_GET['page']) && trim($_GET['page']) !== '') {
    require __DIR__ . '/vendor/autoload.php';

    try {
        Utilities\Site::configure();
        $pageRequest = Utilities\Site::getPageRequest();
        $instance = new $pageRequest();
        $instance->run();
        exit;
    } catch (Controllers\PrivateNoAuthException $ex) {
        $instance = new Controllers\NoAuth();
        $instance->run();
        exit;
    } catch (Controllers\PrivateNoLoggedException $ex) {
        $redirTo = urlencode(Utilities\Context::getContextByKey('request_uri'));
        Utilities\Site::redirectTo('index.php?page=Sec_Login&redirto=' . $redirTo);
        exit;
    } catch (Exception $ex) {
        Utilities\Site::logError($ex, 500);
        $instance = new Controllers\Error();
        $instance->run();
        exit;
    } catch (Error $ex) {
        Utilities\Site::logError($ex, 500);
        $instance = new Controllers\Error();
        $instance->run();
        exit;
    }
}

// Si no hay page=, mostrar portada estatica
$cart_count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_count += $item['cantidad'];
    }
}

// Variables de sesion para mostrar en HTML
$isLogged = isset($_SESSION['login']) && $_SESSION['login']['isLogged'];
$userName = $_SESSION['userName'] ?? '';
$userEmail = $_SESSION['userEmail'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>SmartClinic | Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --cedro: #1A6F8A;
            --dorado: #67C7B1;
            --arena: #F2F8FB;
            --blanco: #ffffff;
            --gris: #4A6170;
            --sombra: 0 8px 24px rgba(26, 111, 138, 0.18);
            --radio: 18px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: var(--arena);
            color: #333;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--sombra);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .logo-img {
            width: 52px;
            height: 52px;
            object-fit: contain;
        }

        .logo-txt {
            font-size: 1.7rem;
            color: var(--cedro);
            font-weight: 800;
            letter-spacing: 2px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--cedro);
            font-weight: 700;
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .nav-menu a:hover {
            color: var(--dorado);
        }

        .badge {
            background: #1190a8;
            color: white;
            padding: 3px 8px;
            border-radius: 999px;
            font-size: 0.78rem;
            margin-left: 6px;
        }

        .hero {
            min-height: 88vh;
            background:
                radial-gradient(circle at 20% 20%, rgba(103, 199, 177, 0.28), transparent 40%),
                linear-gradient(120deg, rgba(16, 90, 115, 0.75), rgba(103, 199, 177, 0.22)),
                url('img/hero-panel.jpg') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: left;
            padding: 58px 20px;
            color: white;
            position: relative;
        }

        .hero-content {
            width: min(980px, 100%);
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(16, 90, 115, 0.16);
            border-radius: 22px;
            padding: 34px;
            box-shadow: 0 16px 40px rgba(16, 90, 115, 0.14);
            color: #173a46;
        }

        .hero h1 {
            font-size: clamp(2rem, 4.2vw, 3.4rem);
            margin-bottom: 16px;
            max-width: 760px;
            line-height: 1.15;
        }

        .hero p {
            font-size: 1.06rem;
            line-height: 1.8;
            margin-bottom: 26px;
            max-width: 680px;
            color: #173a46;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-main {
            display: inline-block;
            background: var(--dorado);
            color: white;
            padding: 14px 30px;
            border-radius: 999px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
            border: 1px solid transparent;
        }

        .btn-main:hover {
            background: #4fa9a0;
        }

        .btn-ghost {
            display: inline-block;
            background: transparent;
            color: var(--cedro);
            padding: 14px 30px;
            border-radius: 999px;
            font-weight: bold;
            text-decoration: none;
            border: 1px solid rgba(16, 90, 115, 0.45);
            transition: 0.3s;
        }

        .btn-ghost:hover {
            background: rgba(16, 90, 115, 0.1);
        }

        .section {
            padding: 70px 7%;
            text-align: center;
        }

        .section h2 {
            color: var(--cedro);
            font-size: 2rem;
            margin-bottom: 14px;
        }

        .section p {
            color: var(--gris);
            max-width: 700px;
            margin: auto;
            line-height: 1.8;
        }

        .cards {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 28px;
        }

        .card {
            background: white;
            border-radius: var(--radio);
            padding: 30px 20px;
            box-shadow: var(--sombra);
        }

        .card h3 {
            color: var(--cedro);
            margin-bottom: 10px;
        }

        .card p {
            color: var(--gris);
            line-height: 1.6;
        }

        .gallery {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .gallery img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 18px;
            box-shadow: var(--sombra);
        }

        .reviews {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        .review-card {
            background: white;
            border-radius: var(--radio);
            padding: 25px;
            box-shadow: var(--sombra);
            text-align: left;
        }

        .review-card h4 {
            color: var(--cedro);
            margin-bottom: 8px;
        }

        .stars {
            color: #f1b500;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        footer {
            background: var(--cedro);
            color: white;
            text-align: center;
            padding: 35px 20px;
            margin-top: 40px;
        }

        @media(max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                text-align: center;
                padding: 44px 16px;
            }

            .hero-content {
                padding: 24px;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-actions {
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <a href="index.php" class="logo-box">
            <img src="img/logo-cedrika.png" alt="logo SmartClinic" class="logo-img">
            <span class="logo-txt">SmartClinic</span>
        </a>

        <nav class="nav-menu">
            <a href="index.php">Inicio</a>
            <a href="index.php?page=Checkout_Catalogo">Servicios</a>
            <a href="index.php?page=Checkout_Checkout">🩺 Citas <span class="badge"><?php echo $cart_count; ?></span></a>
            <?php if ($isLogged) { ?>
                <a href="index.php?page=Security_Perfil" style="color: var(--cedro); font-weight:700; text-decoration:none;">Hola, <?php echo htmlspecialchars($userName); ?></a>
                <a href="index.php?page=Sec_Logout">Cerrar Sesión</a>
            <?php } else { ?>
                <a href="index.php?page=Sec_Login"><i class="fas fa-sign-in-alt"></i>&nbsp;Iniciar Sesión</a>
                <a href="index.php?page=Sec_Register"><i class="fas fa-sign-in-alt"></i>&nbsp;Crear Cuenta</a>
            <?php } ?>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Atención médica integral con tecnología humana</h1>
            <p>
                SmartClinic te acompaña con servicios de salud confiables, rápidos y personalizados.
                Agenda tus consultas y gestiona tu atención desde un solo lugar.
            </p>
            <div class="hero-actions">
                <a href="index.php?page=Checkout_Catalogo" class="btn-main">Ver servicios</a>
                <?php if (!$isLogged) { ?>
                    <a href="index.php?page=Sec_Login" class="btn-ghost">Ingresar</a>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Servicios de SmartClinic</h2>
        <p>Accede a soluciones médicas diseñadas para brindar seguridad, rapidez y bienestar a tu familia.</p>

        <div class="cards">
            <div class="card">
                <h3>Consultas Médicas</h3>
                <p>Agenda atención presencial y virtual con especialistas en medicina general y diferentes especialidades.</p>
            </div>
            <div class="card">
                <h3>Telemedicina</h3>
                <p>Atención remota para revisiones, segundas opiniones y seguimiento de tratamientos desde casa.</p>
            </div>
            <div class="card">
                <h3>Apoyo Diagnóstico</h3>
                <p>Ordenes de laboratorio, estudios de imagen y resultados digitales en un mismo lugar.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Sobre SmartClinic</h2>
        <p>
            En <strong>SmartClinic</strong> combinamos experiencia médica y herramientas digitales para
            entregar atención cálida, oportuna y accesible. Nuestro enfoque es tu salud integral.
        </p>

        <div class="cards">
            <div class="card">
                <h3>Confianza Clínica</h3>
                <p>Profesionales certificados y procesos que garantizan atención segura en cada consulta.</p>
            </div>
            <div class="card">
                <h3>Atención a tu ritmo</h3>
                <p>Reserva tu cita en línea, recibe recordatorios y accede a tus resultados desde el portal.</p>
            </div>
            <div class="card">
                <h3>Soporte permanente</h3>
                <p>Nuestro equipo te acompaña antes, durante y después de cada servicio de salud.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Entornos de atención</h2>
        <p>Conoce los espacios seguros y modernos donde cuidamos tu salud con calidez humana.</p>

        <div class="gallery">
            <img src="img/ilustracion-sala.jpg" alt="Sala de espera clínica">
            <img src="img/ilustracion-comedor.jpg" alt="Consultorio moderno">
            <img src="img/ilustracion-escritorio.jpg" alt="Atención médica virtual">
        </div>
    </section>

    <section class="section">
        <h2>Testimonios de pacientes</h2>
        <p>La experiencia de nuestros pacientes es parte esencial de nuestra atención en SmartClinic.</p>

        <div class="reviews">
            <div class="review-card">
                <h4>María Fernández</h4>
                <div class="stars">★★★★★</div>
                <p>“Compré un sofá para mi sala y superó mis expectativas. Muy elegante y cómodo.”</p>
            </div>

            <div class="review-card">
                <h4>Carlos Mejía</h4>
                <div class="stars">★★★★★</div>
                <p>“Excelente atención y muebles de muy buena calidad. El comedor quedó hermoso.”</p>
            </div>

            <div class="review-card">
                <h4>Ana López</h4>
                <div class="stars">★★★★★</div>
                <p>“El escritorio que compré combina perfecto con mi espacio de trabajo. Muy recomendado.”</p>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2026 SmartClinic | Salud y Bienestar</p>
    </footer>

</body>

</html>