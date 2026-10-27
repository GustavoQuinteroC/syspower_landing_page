<?php
$NOINDEX = false;

require_once __DIR__ . '/_syspower.php';
require_once __DIR__ . '/_seo.php';

$URL_APP = SY_APP;
$PROD    = 'syspower';

$TITULO  = 'SysPower: reinicio físico remoto de equipos críticos | Alkes';
$DESC    = 'Apaga, enciende y reinicia a distancia routers, DVR, switches y servidores desde el navegador. Corte físico por relé, cinco salidas, hardware incluido en la renta y sin anticipo. Pide informes.';
$DESC_OG = 'Reinicia a distancia routers, DVR, switches y servidores con corte físico de energía, desde el navegador y sin VPN.';

/* Capacidades en pestañas. */
$CAPACIDADES = array(
    array('id' => 'energia', 'tab' => 'Energía', 'eyebrow' => 'Apagar, encender y reiniciar',
        'h3' => 'Tres acciones, un clic, desde cualquier lugar',
        'p' => 'El relé corta la corriente del equipo que elijas y la restaura cuando tú decides. Funciona aunque el equipo esté trabado y no responda a nada.',
        'items' => array(
            array('power', 'Apagar: corta la energía al instante', 'Corta la energía del equipo seleccionado al instante.'),
            array('zap', 'Encender: restaura cuando estés listo', 'Restaura la energía cuando estés listo para reiniciar.'),
            array('restart', 'Reiniciar: ciclo completo con un clic', 'Apaga y enciende en secuencia automática con un solo clic.'),
        ),
        'img' => 'assets/img/ficha.jpg', 'alt' => 'Ficha de un controlador SysPower con sus cinco puertos y los botones de energía', 'w' => 1568, 'h' => 621,
        'cap' => 'Ficha del controlador: puertos y botones de energía'),
    array('id' => 'salidas', 'tab' => 'Salidas', 'eyebrow' => 'Salida por salida',
        'h3' => 'Solo se corta lo que tú indicas',
        'p' => 'Cada controlador tiene cinco salidas de 120 V a 10 A. Cada una alimenta un equipo con su nombre, y reinicias solo el afectado, sin tocar el resto del sitio.',
        'items' => array(
            array('rack', 'Cinco salidas, cada equipo con su nombre', 'Router, DVR, switch, servidor: cada uno queda nombrado y listo para reinicio remoto desde el panel.'),
            array('ethernet', 'Conexión por Ethernet o WiFi', 'El controlador reporta al panel por cable o por WiFi; no requiere VPN ni abrir puertos hacia el exterior.'),
            array('cpu', 'Relés industriales', 'El relé interrumpe la energía directamente: no depende del sistema operativo ni de la red del equipo.'),
        ),
        'img' => 'assets/img/estado.jpg', 'alt' => 'Estado en vivo de los controladores SysPower: en línea, último reporte y cada puerto', 'w' => 1568, 'h' => 621,
        'cap' => 'Estado en vivo de todos tus controladores'),
    array('id' => 'control', 'tab' => 'Control', 'eyebrow' => 'Usuarios, historial y avisos',
        'h3' => 'Quién, qué y cuándo, siempre a la vista',
        'p' => 'Cada persona usa su cuenta según su rol y cada acción queda registrada. Los avisos llegan a la campana del panel, los que tú elijas.',
        'items' => array(
            array('users', 'Multiusuario con roles', 'Administrador, operador o visor: cada quien opera únicamente lo que su rol permite.'),
            array('history', 'Historial y trazabilidad', 'Registro de cada acción de energía, cada cambio y cada nota, con quién, qué y cuándo.'),
            array('bell', 'Avisos y notas en cada controlador', 'Te avisa cuando un controlador se desconecta o vuelve y cuando alguien actúa sobre un equipo; las notas quedan en el propio controlador.'),
        ),
        'img' => 'assets/img/historial.jpg', 'alt' => 'Historial de acciones de SysPower con usuario, acción y fecha', 'w' => 1568, 'h' => 621,
        'cap' => 'Historial de acciones por controlador'),
);

/* Casos de uso. */
$CASOS = array(
    array('cart', 'Restaurante con sucursales: DVR de seguridad congelado', 'El dueño lo reinicia desde el celular en segundos, sin mover a nadie. Sin traslado y sin tiempo ciego.'),
    array('building', 'Oficina corporativa: router o switch congelado a las 8 am', 'El sysadmin lo reinicia desde casa antes de salir. La oficina está lista cuando llega el equipo.'),
    array('server', 'MikroTik o servidor pequeño: equipo trabado sin respuesta a SSH', 'Ningún software llega a un equipo congelado. SysPower corta la energía físicamente y la restaura.'),
);

/* Lo que pasa sin control remoto. */
$PROBLEMAS = array(
    array('«Manda a alguien a reiniciarlo»', 'El equipo falló y la solución es esperar a que un técnico llegue, desconecte el cable y lo vuelva a enchufar. Cuesta caro y tarda horas.'),
    array('«Pide a alguien que lo desconecte»', 'El empleado de turno desconecta el cable equivocado. Ahora hay dos problemas en vez de uno, y nadie sabe bien qué apagó.'),
    array('Tiempo muerto real', 'Mientras el equipo no vuelve, se caen ventas, cámaras, acceso a sistemas y atención al cliente: todo lo que depende de esa conexión.'),
    array('Fuera de horario no hay solución', 'El equipo se congela un sábado a la medianoche. Sin control remoto, el problema dura hasta que alguien pueda ir el lunes.'),
);

function sy_items($lista)
{
    $h = '';
    foreach ($lista as $i) {
        $h .= '<div class="item">' . a_icon($i[0]) . '<div><h4>' . a_e($i[1]) . '</h4><p>' . a_e($i[2]) . '</p></div></div>';
    }
    return $h;
}
?>
<?php
// SEO y GEO: datos para seo_head() y seo_enriquecer() (ver _seo.php).
$SEO_PAG = seo_de_pagina(SY_SITIO, isset($CAPACIDADES) ? $CAPACIDADES : array(), array());
$SEO = array(
    'sitio' => SY_SITIO, 'nombre' => 'SysPower', 'titulo' => $TITULO, 'noindex' => $NOINDEX,
    'subcategoria' => 'Control remoto de energía e IoT', 'dispositivos' => 'Computadora, teléfono y tableta', 'requisitos' => 'Navegador web moderno con conexión a internet',
    'alt' => 'Vista de SysPower, software en la nube de Alkes',
    'palabras' => array('reinicio remoto de equipos', 'reiniciar router a distancia', 'reinicio físico remoto', 'control remoto de energía', 'relevador remoto', 'PDU inteligente', 'reinicio de DVR', 'reinicio de servidores', 'IoT ESP32', 'monitoreo de equipos críticos', 'soporte TI remoto', 'sistema en la nube', 'México', 'Guadalajara', 'Alkes'),
    'version' => seo_version(__DIR__), 'funciones' => $SEO_PAG['funciones'], 'capturas' => $SEO_PAG['capturas'],
);
?>
<!doctype html>
<html lang="es" class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= a_e($TITULO) ?></title>

<meta name="description" content="<?= a_e($DESC) ?>">
<meta name="author" content="Alkes">
<meta name="theme-color" content="#061c6b">
<meta name="format-detection" content="telephone=no">
<?php if ($NOINDEX): ?><meta name="robots" content="noindex,nofollow">
<?php endif; ?>
<link rel="canonical" href="<?= SY_SITIO ?>/">

<meta property="og:type" content="website">
<meta property="og:site_name" content="SysPower">
<meta property="og:url" content="<?= SY_SITIO ?>/">
<meta property="og:title" content="<?= a_e($TITULO) ?>">
<meta property="og:description" content="<?= a_e($DESC_OG) ?>">
<meta property="og:image" content="<?= SY_SITIO ?>/assets/img/og-image.png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="SysPower, reinicio físico remoto de equipos críticos">
<meta property="og:locale" content="es_MX">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= a_e($TITULO) ?>">
<meta name="twitter:description" content="<?= a_e($DESC_OG) ?>">
<meta name="twitter:image" content="<?= SY_SITIO ?>/assets/img/og-image.png">
<?= seo_head($SEO) ?>
<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">

<link rel="preload" href="assets/fonts/lexend-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="assets/fonts/source-sans-3-latin.woff2" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="assets/css/syspower.css">

<script type="application/ld+json"><?= sy_jsonld($SEO) ?></script>

<script>
(function () {
    var r = document.documentElement;
    r.className = r.className.replace('no-js', 'js');
    try {
        var t = localStorage.getItem('tema');
        if (t === 'dark' || t === 'light') { r.setAttribute('data-theme', t); }
    } catch (e) {}
})();
</script>
</head>
<body>

<a class="skip" href="#main">Saltar al contenido</a>

<header class="nav" id="nav">
    <div class="container nav__in">
        <a class="brand" href="#inicio"><?= sy_logo(34) ?><span>SysPower</span></a>
        <a class="brand__by" href="<?= ALKES_SITIO ?>">por <strong>Alkes</strong></a>
        <nav class="nav__links" aria-label="Secciones">
            <a class="nav__link" href="#producto">Producto</a>
            <a class="nav__link" href="#capacidades">Cómo funciona</a>
            <a class="nav__link" href="#casos">Casos</a>
            <a class="nav__link" href="#informes">Informes</a>
            <a class="nav__link" href="#preguntas">Preguntas</a>
            <a class="nav__link" href="#novedades">Novedades</a>
            <a class="nav__link" href="#contacto">Contacto</a>
        </nav>
        <div class="nav__actions">
            <?= a_tema() ?>
            <a class="btn btn--line btn--sm" href="<?= a_e($URL_APP) ?>">Iniciar sesión</a>
            <a class="btn btn--primary btn--sm" href="#informes">Pedir informes</a>
        </div>
        <button class="nav__burger" type="button" id="navToggle" aria-expanded="false" aria-controls="navPanel" aria-label="Abrir menú">
            <?= a_icon('menu', 'i-menu') ?><?= a_icon('close', 'i-close') ?>
        </button>
    </div>
    <div class="nav__panel container" id="navPanel">
        <a class="nav__link" href="#producto">Producto</a>
        <a class="nav__link" href="#capacidades">Cómo funciona</a>
        <a class="nav__link" href="#casos">Casos de uso</a>
        <a class="nav__link" href="#informes">Informes</a>
        <a class="nav__link" href="#preguntas">Preguntas</a>
        <a class="nav__link" href="#novedades">Novedades</a>
        <a class="nav__link" href="#contacto">Contacto</a>
        <a class="nav__link" href="#ecosistema">Ecosistema Alkes</a>
        <div class="nav__panel-actions">
            <?= a_tema() ?>
            <a class="btn btn--line" href="<?= a_e($URL_APP) ?>">Iniciar sesión</a>
            <a class="btn btn--primary" href="#informes">Pedir informes</a>
        </div>
    </div>
</header>

<main id="main">

<!-- Hero ------------------------------------------------------------------ -->
<section class="hero" id="inicio">
    <div class="container">
        <div class="hero__grid">
            <div class="hero__body">
                <p class="eyebrow" data-reveal>Reinicio físico remoto para equipos críticos</p>
                <h1 data-reveal>Tu router se congela a las 2 am. Lo reinicias en <em>segundos</em>.</h1>
                <p class="lede" data-reveal>SysPower controla físicamente la energía de tus equipos críticos desde cualquier navegador. Sin visitas, sin VPN, sin esperas.</p>
                <div class="row" data-reveal>
                    <a class="btn btn--primary btn--lg" href="<?= a_e(sy_url_informes()) ?>"><?= a_icon('mail') ?>Pedir informes</a>
                    <a class="btn btn--line btn--lg" href="<?= a_e($URL_APP) ?>" data-open-demo><?= a_icon('play') ?>Probar el demo</a>
                </div>
                <div class="row" data-reveal>
                    <a class="link" href="<?= a_e(sy_url_agendar()) ?>">Agendar demostración guiada<?= a_icon('arrow') ?></a>
                    <a class="link" href="#novedades">Ver novedades<?= a_icon('arrow') ?></a>
                </div>
                <ul class="hero__facts" data-reveal>
                    <li><?= a_icon('check') ?>Hardware incluido en la renta</li>
                    <li><?= a_icon('check') ?>Sin anticipo</li>
                    <li><?= a_icon('check') ?>Sin VPN</li>
                </ul>
            </div>
            <div class="hero__aside" data-reveal>
                <div class="scene" data-scene>
  <svg class="scene__svg" viewBox="0 0 560 420" role="img" aria-label="Animación: a las 2 de la mañana el router de una oficina se congela; una persona abre SysPower en su celular, reinicia la salida del router, el equipo se apaga y se vuelve a encender, regresa el internet y la persona vuelve a dormir tranquila.">
    <rect class="sy-wall" x="0" y="0" width="560" height="330"/><rect class="sy-wall2" x="0" y="252" width="560" height="78"/>
    <rect class="sy-floor" x="0" y="330" width="560" height="90"/><path class="sy-line" d="M0 330H560"/>
    <g class="sy-window"><rect class="sy-glass" x="24" y="22" width="122" height="100" rx="8"/><circle class="sy-st" style="--i:0" cx="44" cy="40" r="1.4"/><circle class="sy-st" style="--i:1" cx="110" cy="34" r="1.2"/><circle class="sy-st" style="--i:2" cx="128" cy="70" r="1.6"/><circle class="sy-st" style="--i:3" cx="86" cy="100" r="1.2"/><circle class="sy-st" style="--i:4" cx="160" cy="22" r="1.2"/><circle class="sy-st" style="--i:5" cx="190" cy="96" r="1.4"/><circle class="sy-st" style="--i:6" cx="270" cy="24" r="1.2"/><circle class="sy-st" style="--i:7" cx="300" cy="100" r="1.4"/>
      <circle class="sy-moon" cx="64" cy="58" r="15"/><circle class="sy-glass" cx="71" cy="53" r="13"/>
      <path class="sy-frame" d="M85 22V122M24 72H146"/><rect class="sy-frame" x="24" y="22" width="122" height="100" rx="8" style="fill:none"/></g>
    <g class="sy-clock"><circle class="sy-cb" cx="230" cy="62" r="25"/><path class="sy-ct" d="M230 41v4M251 62h-4M230 83v-4M209 62h4"/><path class="sy-ch" d="M230 62l11-10"/><path class="sy-ch" d="M230 62V46"/><circle class="sy-ld" cx="230" cy="62" r="2.200"/></g>
    <text class="sy-lbl" x="230" y="104" text-anchor="middle">2:00 am</text>
    <g class="sy-z"><text class="sy-zt" style="--i:0" x="132" y="170">z</text><text class="sy-zt" style="--i:1" x="146" y="150">z</text><text class="sy-zt big" style="--i:2" x="162" y="126">Z</text></g>
    <g class="sy-bed">
      <rect class="sy-hb" x="20" y="190" width="26" height="140" rx="6"/><rect class="sy-pil" x="48" y="206" width="40" height="46" rx="14"/>
      <rect class="sy-pj" x="66" y="214" width="48" height="72" rx="15"/>
      <g class="sy-head"><ellipse class="p2-skin" cx="90" cy="195" rx="15.500" ry="17.500"/><ellipse class="p2-skin" cx="81.500" cy="197" rx="3.200" ry="4.200"/>
        <path class="p2-hair" d="M74.500 197C73.500 184 79 177.500 90 177.500C101 177.500 106.500 185 105.500 192C101 186 95 184.500 89 184.500C83 184.500 78.500 188 77.500 197Z"/>
        <ellipse class="p2-skin" cx="105.600" cy="197.500" rx="2.900" ry="3.300"/><circle class="p2-blush" cx="99" cy="202" r="3.400"/>
        <path class="sy-ec" d="M94 195q3.500 3 7 0"/><g class="sy-eo"><ellipse class="p2-eyew" cx="98" cy="194.500" rx="3.100" ry="3.300"/><circle class="p2-iris" cx="99" cy="194.800" r="1.900"/><circle class="p2-eyew" cx="99.700" cy="194" r=".65"/></g><path class="p2-line" d="M94.500 189.500Q99 187.500 103.500 189"/>
        <path class="sy-mn" d="M95 205h5"/><path class="sy-ms" d="M93.500 203.500Q98 208.500 103 203.500"/></g>
      <rect class="sy-blk" x="44" y="268" width="210" height="50" rx="13"/><path class="sy-fold" d="M60 282H238M60 296H238" />
      <g class="sy-arm"><path class="sc-sleeve sy-sl2" d="M106 226L138 240"/><path class="sc-skin" d="M138 240L160 232"/><circle class="sc-handc" cx="162" cy="231" r="6"/><g class="sy-ph"><rect class="sc-phone" x="160" y="208" width="14" height="26" rx="3"/><rect class="sy-scr" x="162.500" y="211" width="9" height="19" rx="1.500"/></g></g>
      <rect class="sy-hb" x="20" y="318" width="236" height="14" rx="4"/>
    </g>
    <rect class="sy-cab" x="328" y="262" width="220" height="68" rx="6"/><rect class="sy-shelf" x="322" y="254" width="232" height="10" rx="3"/>
    <path class="sy-cable" d="M491 246V256H440Q426 256 426 244"/>
    <g class="sy-router"><rect class="sy-an" x="354" y="190" width="5" height="32" rx="2.500"/><rect class="sy-an" x="412" y="190" width="5" height="32" rx="2.500"/>
      <rect class="sy-rb" x="346" y="220" width="82" height="34" rx="8"/>
      <circle class="sy-rl r0" cx="366" cy="237" r="3.600"/><circle class="sy-rl r1" cx="380" cy="237" r="3.600"/><circle class="sy-rl r2" cx="394" cy="237" r="3.600"/><circle class="sy-rl r3" cx="408" cy="237" r="3.600"/>
      <rect class="sy-dim" x="346" y="220" width="82" height="34" rx="8"/></g>
    <g class="sy-wno"><path class="sy-wf" d="M366 180a24 24 0 0 1 40 0M372 190a15 15 0 0 1 28 0"/><circle class="sy-wd" cx="386" cy="198" r="3"/><path class="sy-x" d="M392 166l14 14M406 166l-14 14"/></g>
    <g class="sy-wok"><path class="sy-wg" style="--i:0" d="M360 172a30 30 0 0 1 52 0"/><path class="sy-wg" style="--i:1" d="M368 182a20 20 0 0 1 36 0"/><path class="sy-wg" style="--i:2" d="M376 192a10 10 0 0 1 20 0"/><circle class="sy-wgd" cx="386" cy="199" r="3"/></g>
    <g class="sy-box"><rect class="sy-bx" x="438" y="204" width="104" height="48" rx="10"/><text class="sy-bt" x="490" y="219" text-anchor="middle">SysPower</text><rect class="sy-sk" x="448" y="232" width="14" height="12" rx="3"/><circle class="sy-sl l0" cx="455" cy="227.500" r="2"/><rect class="sy-sk" x="466" y="232" width="14" height="12" rx="3"/><circle class="sy-sl l1" cx="473" cy="227.500" r="2"/><rect class="sy-sk" x="484" y="232" width="14" height="12" rx="3"/><circle class="sy-sl l2" cx="491" cy="227.500" r="2"/><rect class="sy-sk" x="502" y="232" width="14" height="12" rx="3"/><circle class="sy-sl l3" cx="509" cy="227.500" r="2"/><rect class="sy-sk" x="520" y="232" width="14" height="12" rx="3"/><circle class="sy-sl l4" cx="527" cy="227.500" r="2"/></g>
    <g class="sy-on sc-tag"><rect class="sc-tagb" x="442" y="172" width="100" height="26" rx="13"/><circle class="sc-tagc" cx="458" cy="185" r="7.500"/><path class="sc-ck3" d="M454.500 185l2.500 2.500 4.500-5"/><text class="sc-txt2" x="471" y="190" style="font-size:11.5px">En línea</text></g>
    <g class="sc-card">
      <rect class="sc-cardb" x="326" y="8" width="222" height="148" rx="18"/>
      <rect class="sc-logo" x="340" y="20" width="16" height="16" rx="4"/><path class="sc-ck2" d="M344 28l3 3 5-5.500"/>
      <text class="sc-t0" x="362" y="32.500">SysPower</text><text class="sc-t3" x="534" y="32.500" text-anchor="end">Salidas</text>
      <g class="sy-o o0"><circle class="sy-ob" cx="362" cy="68" r="12"/><path class="sy-op" d="M362 62v6M357.5 64a6.500 6.500 0 1 0 9 0"/></g><g class="sy-o o1"><circle class="sy-ob" cx="400" cy="68" r="12"/><path class="sy-op" d="M400 62v6M395.5 64a6.500 6.500 0 1 0 9 0"/></g><g class="sy-o o2"><circle class="sy-ob" cx="438" cy="68" r="12"/><path class="sy-op" d="M438 62v6M433.5 64a6.500 6.500 0 1 0 9 0"/></g><g class="sy-o o3"><circle class="sy-ob" cx="476" cy="68" r="12"/><path class="sy-op" d="M476 62v6M471.5 64a6.500 6.500 0 1 0 9 0"/></g><g class="sy-o o4"><circle class="sy-ob" cx="514" cy="68" r="12"/><path class="sy-op" d="M514 62v6M509.5 64a6.500 6.500 0 1 0 9 0"/></g><circle class="sy-sel" cx="438" cy="68" r="16"/>
      <text class="sc-t3" x="438" y="94" text-anchor="middle">Router</text>
      <g class="sy-st1"><rect class="sy-pillm" x="340" y="102" width="132" height="20" rx="10"/><circle class="sy-pmc" cx="351" cy="112" r="6"/><path class="sy-xx" d="M348.500 109.500l5 5M353.500 109.500l-5 5"/><text class="sy-pmt" x="362" y="115.500">Router sin respuesta</text></g>
      <g class="sc-chip c1"><rect class="sc-chipb" x="340" y="102" width="112" height="20" rx="10"/><circle class="sc-chipc" cx="351" cy="112" r="6"/><path class="sc-ck3" d="M348 112l2.200 2.200 4-4.400"/><text class="sc-chipt" x="361" y="115.500">Router en línea</text></g>
      <g class="sc-send"><rect class="sc-sendb" x="340" y="128" width="196" height="20" rx="10"/><text class="sc-sendt" x="438" y="142" text-anchor="middle">Reiniciar salida 3</text></g>
      <g class="sc-prog"><rect class="sc-track" x="340" y="128" width="196" height="20" rx="10"/><rect class="sc-fill" x="340" y="128" width="196" height="20" rx="10"/><text class="sy-pt" x="438" y="142" text-anchor="middle">Reiniciando…</text></g>
      <g class="sc-sent"><rect class="sc-sentb" x="340" y="128" width="196" height="20" rx="10"/><circle class="sc-sentc" cx="404" cy="138" r="6.500"/><path class="sc-ck3" d="M400.500 138l2.500 2.500 4.500-5"/><text class="sc-sentt" x="416" y="142">Reiniciada</text></g>
      <circle class="sc-finger" cx="438" cy="74" r="8"/>
    </g>
  </svg>
</div>
                <p class="hero__note"><?= a_icon('power') ?><span><strong>Corte físico de energía</strong>Funciona aunque el equipo esté completamente trabado y no responda a nada.</span></p>
            </div>
        </div>
    </div>
</section>

<!-- Qué es ---------------------------------------------------------------- -->
<section class="section section--tight" id="producto">
    <div class="container">
        <h2 class="sr-only">Qué es SysPower, para quién es y qué resuelve</h2>
        <div class="mosaic" data-reveal>
            <div class="card card--big">
                <p class="eyebrow">Qué es</p>
                <h3>Un controlador y un panel web</h3>
                <p>Un controlador con cinco salidas de 120 V a 10 A que se instala en tu sitio, y un panel web desde el que apagas, enciendes y reinicias a distancia cada equipo conectado.</p>
                <p class="muted">El hardware va incluido en la renta, sin anticipo ni compra inicial. El corte es físico: el relé interrumpe la corriente sin pasar por el sistema del equipo.</p>
            </div>
            <div class="card card--md">
                <p class="eyebrow">Para quién</p>
                <h3>Sitios con equipos que no pueden parar</h3>
                <p class="muted">Sucursales, oficinas y cuartos de servidores pequeños, y también integradores y sysadmins que instalan SysPower en el sitio de sus clientes.</p>
            </div>
            <div class="card card--md">
                <p class="eyebrow">Qué resuelve</p>
                <h3>Esperar a que alguien vaya a desconectarlo</h3>
                <p class="muted">Un router trabado, un DVR congelado o un servidor sin respuesta se reinician desde el navegador, a cualquier hora, sin visitas de emergencia.</p>
            </div>
        </div>
    </div>
</section>

<!-- Cómo funciona --------------------------------------------------------- -->
<section class="section" id="capacidades">
    <div class="container">
        <header class="head" data-reveal>
            <p class="eyebrow">Cómo funciona</p>
            <h2>Se instala una vez y queda listo para operar</h2>
            <p class="lede">El controlador se monta en tu sitio y cualquier usuario autorizado reinicia equipos en segundos desde el panel web, esté donde esté.</p>
        </header>

        <div data-reveal>
            <div class="tabs" role="tablist" aria-label="Qué hace SysPower">
                <?php foreach ($CAPACIDADES as $i => $c): ?>
                <button class="tab" type="button" role="tab" id="tab-<?= a_e($c['id']) ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"<?= $i === 0 ? '' : ' tabindex="-1"' ?> aria-controls="panel-<?= a_e($c['id']) ?>"><?= a_e($c['tab']) ?></button>
                <?php endforeach; ?>
            </div>
            <?php foreach ($CAPACIDADES as $i => $c): ?>
            <div class="cap-panel" role="tabpanel" id="panel-<?= a_e($c['id']) ?>" aria-labelledby="tab-<?= a_e($c['id']) ?>"<?= $i === 0 ? '' : ' hidden' ?>>
                <div class="split">
                    <div class="split__body">
                        <p class="eyebrow"><?= a_e($c['eyebrow']) ?></p>
                        <h3 style="font-size:clamp(1.5rem,1.4vw + 1rem,2rem)"><?= a_e($c['h3']) ?></h3>
                        <p class="muted"><?= a_e($c['p']) ?></p>
                        <ul class="feat-list">
                            <?php foreach ($c['items'] as $it): ?>
                            <li><span class="ico"><?= a_icon($it[0]) ?></span><div><strong><?= a_e($it[1]) ?></strong><p><?= a_e($it[2]) ?></p></div></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="split__media">
                        <?= sy_ventana($c['img'], $c['alt'], $c['w'], $c['h']) ?>
                        <p class="cap"><?= a_e($c['cap']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="group" data-reveal>
            <h3>De la instalación a la operación, en cinco pasos</h3>
            <div class="items items--3"><?= sy_items(array(
                array('rack', '1 · Se instala en tu sitio', 'El controlador queda montado en el sitio y conectado a cada equipo crítico que quieras controlar.'),
                array('ethernet', '2 · Asignas tus equipos', 'Router, DVR, switch, servidor: cada uno queda nombrado y listo para reinicio remoto desde el panel.'),
                array('globe', '3 · Accedes desde donde estés', 'Abres el panel web en tu celular o computadora, sin VPN y sin apps adicionales.'),
                array('restart', '4 · Reinicias con un clic', 'SysPower corta físicamente la energía del equipo afectado y la restaura, sin tocar los demás.'),
                array('checklist', '5 · Queda registro', 'El equipo arranca, el servicio se recupera y el historial registra la acción automáticamente.'),
            )) ?></div>
        </div>
    </div>
</section>

<!-- Casos de uso ----------------------------------------------------------- -->
<section class="section section--sunken" id="casos">
    <div class="container">
        <header class="head" data-reveal>
            <p class="eyebrow">Casos de uso</p>
            <h2>Escenarios donde SysPower marca la diferencia</h2>
            <p class="lede">Desde restaurantes hasta oficinas y cuartos de servidores: si tienes equipos críticos conectados, SysPower los mantiene bajo control.</p>
        </header>
        <div class="group" data-reveal>
            <div class="items items--3"><?= sy_items($CASOS) ?></div>
        </div>
    </div>
</section>

<!-- Por qué SysPower --------------------------------------------------------- -->
<section class="section" id="resultados">
    <div class="container">
        <header class="head" data-reveal>
            <p class="eyebrow">Por qué SysPower</p>
            <h2>Cada minuto sin respuesta cuesta</h2>
            <p class="lede">Un router trabado, un DVR congelado, un servidor sin respuesta. Mientras alguien llega a desconectarlo y volverlo a conectar, tu operación está detenida y tus clientes esperan.</p>
        </header>

        <div class="why" data-reveal>
            <div class="why__col">
                <p class="eyebrow">Con SysPower</p>
                <h3>Control real desde el primer día</h3>
                <p class="muted">Lo instalas una vez y queda listo para operar.</p>
                <ul class="checks">
                    <li><div><strong>Sin esperar a un técnico</strong><p>Reinicias en segundos, a cualquier hora.</p></div></li>
                    <li><div><strong>Cero traslados por reinicios de rutina</strong><p>Los ciclos de energía rutinarios se hacen desde el panel.</p></div></li>
                    <li><div><strong>Control preciso</strong><p>Solo el equipo que elegiste, salida por salida.</p></div></li>
                    <li><div><strong>Tu cliente no nota la caída</strong><p>Recuperas el servicio antes de que el impacto se sienta.</p></div></li>
                    <li><div><strong>Usuarios autorizados sin depender de terceros</strong><p>Acceso multiusuario con roles; cada persona usa su cuenta según sus permisos.</p></div></li>
                    <li><div><strong>Historial auditable por cuenta</strong><p>Quién, qué y cuándo de cada acción.</p></div></li>
                </ul>
            </div>
            <div class="why__col">
                <p class="eyebrow">Sin control remoto</p>
                <p class="muted">Lo que pasa hoy cuando un equipo se congela.</p>
                <div>
                    <?php foreach ($PROBLEMAS as $i => $p): ?>
                    <details class="disc"<?= $i === 0 ? ' open' : '' ?>>
                        <summary class="disc__sum"><span class="disc__t"><?= a_e($p[0]) ?></span><?= a_icon('chevron', 'disc__chev') ?></summary>
                        <div class="disc__body"><p><?= a_e($p[1]) ?></p></div>
                    </details>
                    <?php endforeach; ?>
                </div>
                <div class="dif">
                    <p class="eyebrow">La diferencia SysPower</p>
                    <p class="lede">No ofrecemos solo un aparato, ofrecemos el servicio completo: controlador, panel, soporte y actualizaciones, con soporte directo del equipo que lo desarrolla.</p>
                </div>
            </div>
        </div>

        <div class="facts" data-reveal>
            <div class="fact"><b>5 salidas</b><span>120 V a 10 A cada una.</span></div>
            <div class="fact"><b>Corte físico</b><span>Por relé, no por software.</span></div>
            <div class="fact"><b>Sin VPN</b><span>Desde cualquier navegador.</span></div>
            <div class="fact"><b>Hardware incluido</b><span>En la renta, sin anticipo.</span></div>
        </div>
    </div>
</section>

<!-- Informes --------------------------------------------------------------- -->
<section class="section section--sunken" id="informes">
    <div class="container">
        <header class="head" data-reveal>
            <p class="eyebrow">Informes</p>
            <h2>Cuéntanos tu sitio y te enviamos los informes</h2>
            <p class="lede">SysPower se renta con el hardware incluido, sin anticipo ni compra inicial del equipo. Dinos cuántos sitios y equipos quieres controlar y te enviamos la propuesta.</p>
        </header>
        <div class="team" data-reveal>
            <div>
                <h3>El servicio completo, en una sola renta</h3>
                <p>El controlador con relés industriales, el panel web, el historial, el soporte y las actualizaciones, con garantía de hardware. Escríbenos, llámanos o usa WhatsApp: respondemos en horario hábil.</p>
            </div>
            <div class="team__links">
                <a class="btn btn--primary" href="<?= a_e(sy_url_informes()) ?>"><?= a_icon('mail') ?>Pedir informes</a>
                <a class="btn btn--line" href="tel:<?= ALKES_TEL ?>"><?= a_icon('phone') ?><?= ALKES_TEL_TXT ?></a>
                <a class="btn btn--line" href="<?= SY_WHATSAPP ?>" target="_blank" rel="noopener">WhatsApp<?= a_icon('external') ?></a>
            </div>
        </div>
        <ul class="plan-foot" data-reveal>
            <li><?= a_icon('check') ?>Hardware incluido en la renta</li>
            <li><?= a_icon('check') ?>Sin anticipo ni compra inicial</li>
            <li><?= a_icon('check') ?>Panel web, historial, soporte y actualizaciones</li>
            <li><?= a_icon('check') ?>Garantía de hardware</li>
        </ul>
    </div>
</section>

<!-- Preguntas frecuentes -------------------------------------------------- -->
<section class="section" id="preguntas">
    <div class="container">
        <div class="faq">
            <div class="faq__intro" data-reveal>
                <p class="eyebrow">Preguntas frecuentes</p>
                <h2>Lo que más nos preguntan sobre SysPower</h2>
                <p class="muted">¿Tienes otra duda? Escríbenos a <a href="mailto:<?= ALKES_MAIL ?>"><?= ALKES_MAIL ?></a>.</p>
            </div>
            <div class="faq__list" data-reveal>
                <?php foreach (sy_faq() as $i => $f): ?>
                <details class="disc"<?= $i === 0 ? ' open' : '' ?>>
                    <summary class="disc__sum"><span class="disc__t"><?= a_e($f['q']) ?></span><?= a_icon('chevron', 'disc__chev') ?></summary>
                    <div class="disc__body"><p><?= a_e($f['a']) ?></p></div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Confianza ------------------------------------------------------------- -->
<section class="section section--sunken" id="confianza">
    <div class="container">
        <header class="head" data-reveal>
            <p class="eyebrow">Confianza</p>
            <h2>Un equipo con nombre, correo y teléfono</h2>
            <p class="lede">SysPower es un producto de Alkes. Nuestro equipo desarrolla, opera y da soporte al mismo sistema.</p>
        </header>
        <div class="tiles" data-reveal>
            <div class="tile"><?= a_icon('power') ?><h3>Corte físico, no lógico</h3><p>El relé interrumpe la energía directamente, sin depender del sistema operativo ni de la red del equipo.</p></div>
            <div class="tile"><?= a_icon('rack') ?><h3>Salida por salida</h3><p>Reinicias solo el equipo afectado, sin cortar nada más del sitio.</p></div>
            <div class="tile"><?= a_icon('shield') ?><h3>Producto terminado</h3><p>Con garantía, actualizaciones y soporte incluidos en la renta.</p></div>
            <div class="tile"><?= a_icon('lock') ?><h3>Permisos por rol</h3><p>Administrador, operador o visor: cada persona opera lo que su rol permite.</p></div>
        </div>
        <div class="team" data-reveal>
            <div>
                <h3>Soporte del equipo que construye SysPower</h3>
                <p>Nuestro equipo desarrolla, opera y da soporte a SysPower de principio a fin. Para soporte técnico, una demostración guiada o un módulo a la medida, hablas directamente con el equipo que construye el sistema.</p>
            </div>
            <div class="team__links">
                <a class="btn btn--primary" href="<?= a_e(sy_url_agendar()) ?>"><?= a_icon('mail') ?>Escribir al equipo</a>
                <a class="btn btn--line" href="tel:<?= ALKES_TEL ?>"><?= a_icon('phone') ?><?= ALKES_TEL_TXT ?></a>
                <a class="btn btn--line" href="<?= SY_WHATSAPP ?>" target="_blank" rel="noopener">WhatsApp<?= a_icon('external') ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Novedades ------------------------------------------------------------- -->
<section class="section" id="novedades">
    <div class="container narrow">
        <header class="head" data-reveal>
            <p class="eyebrow">Novedades</p>
            <h2>El panel se mueve, y queda por escrito</h2>
            <p class="lede">Historial público de versiones: lo que se entregó, cuándo y qué cambia en tu operación diaria.</p>
        </header>
        <div data-reveal>
            <?php include __DIR__ . '/_novedades_recientes.php'; ?>
        </div>
    </div>
</section>

<!-- Cierre ---------------------------------------------------------------- -->
<section class="section section--tight">
    <div class="container">
        <div class="cta" data-reveal>
            <div>
                <p class="eyebrow">Empieza hoy</p>
                <h2>¿Listo para tomar el control de tus equipos críticos?</h2>
                <p class="lede">Entra al demo con las credenciales de prueba, o escríbenos y te enviamos los informes para tu sitio.</p>
            </div>
            <div class="cta__act">
                <a class="btn btn--cta btn--lg" href="<?= a_e(sy_url_informes()) ?>"><?= a_icon('mail') ?>Pedir informes</a>
                <a class="btn btn--line btn--lg" href="<?= a_e($URL_APP) ?>" data-open-demo><?= a_icon('play') ?>Probar el demo</a>
                <a class="link" href="<?= a_e(sy_url_agendar()) ?>">Agendar demostración guiada<?= a_icon('arrow') ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Contacto -------------------------------------------------------------- -->
<section class="section section--sunken" id="contacto">
    <div class="container">
        <header class="head" data-reveal>
            <p class="eyebrow">Contacto</p>
            <h2>Hablemos</h2>
            <p class="lede">Informes, demostraciones guiadas, soporte técnico o integración de módulos adicionales. Tu mensaje llega a una bandeja real.</p>
        </header>
        <div class="contact" data-reveal>
            <a class="contact__item" href="mailto:<?= ALKES_MAIL ?>"><?= a_icon('mail') ?><span class="contact__k">Correo</span><span class="contact__v"><?= ALKES_MAIL ?></span><span class="contact__d">Respuesta en horario hábil.</span></a>
            <a class="contact__item" href="tel:<?= ALKES_TEL ?>"><?= a_icon('phone') ?><span class="contact__k">Teléfono</span><span class="contact__v"><?= ALKES_TEL_TXT ?></span><span class="contact__d">Para informes y demostraciones guiadas.</span></a>
            <a class="contact__item" href="<?= SY_WHATSAPP ?>" target="_blank" rel="noopener"><?= a_icon('phone') ?><span class="contact__k">WhatsApp</span><span class="contact__v"><?= ALKES_TEL_TXT ?></span><span class="contact__d">Escríbenos por mensaje.</span></a>
            <a class="contact__item" href="<?= a_e($URL_APP) ?>"><?= a_icon('login') ?><span class="contact__k">Acceso</span><span class="contact__v">app.syspower.alkes.mx</span><span class="contact__d">Entra a tu panel de SysPower.</span></a>
        </div>
        <div class="redes" data-reveal>
            <span class="redes__k">Síguenos</span>
            <?php foreach (sy_redes() as $r): ?>
            <a href="<?= a_e($r['u']) ?>" target="_blank" rel="noopener"><?= a_e($r['n']) ?><?= a_icon('external') ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Ecosistema ------------------------------------------------------------ -->
<section class="section section--tight" id="ecosistema">
    <div class="container">
        <header class="head" data-reveal>
            <p class="eyebrow">Ecosistema Alkes</p>
            <h2>SysPower no está solo</h2>
            <p class="lede">Cinco productos desarrollados, alojados y operados por Alkes. Mismo soporte, misma casa.</p>
        </header>
        <?= a_ecosistema_grid($PROD) ?>
    </div>
</section>

</main>

<footer class="footer">
    <div class="container footer__top">
        <div class="footer__brand">
            <span class="brand"><?= sy_logo(34) ?><span>SysPower</span></span>
            <p>Controlador instalado en tu sitio con control remoto por panel web. Reinicia físicamente routers, DVR, switches y servidores en segundos, desde cualquier lugar, sin necesitar a nadie en sitio.</p>
        </div>
        <div class="footer__cols">
            <div class="footer__col">
                <h2 class="footer__h">Producto</h2>
                <ul>
                    <li><a href="#producto">Qué es</a></li>
                    <li><a href="#capacidades">Cómo funciona</a></li>
                    <li><a href="#casos">Casos de uso</a></li>
                    <li><a href="#informes">Informes</a></li>
                    <li><a href="#preguntas">Preguntas frecuentes</a></li>
                    <li><a href="#novedades">Novedades</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h2 class="footer__h">Accesos</h2>
                <ul>
                    <li><a href="<?= a_e($URL_APP) ?>">Iniciar sesión</a></li>
                    <li><a href="<?= a_e($URL_APP) ?>" data-open-demo>Probar el demo</a></li>
                    <li><a href="<?= a_e(sy_url_informes()) ?>">Pedir informes</a></li>
                    <li><a href="<?= ALKES_SITIO ?>">Alkes</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h2 class="footer__h">Legal</h2>
                <ul>
                    <li><a href="/terminos/">Términos y condiciones</a></li>
                    <li><a href="/privacidad/">Aviso de privacidad</a></li>
                    <li><a href="/cookies/">Cookies</a></li>
                    <li><a href="/encargo-de-datos/">Tratamiento de datos</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h2 class="footer__h">Síguenos</h2>
                <ul>
                    <?php foreach (sy_redes() as $r): ?>
                    <li><a href="<?= a_e($r['u']) ?>" target="_blank" rel="noopener"><?= a_e($r['n']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer__bot">
            <p>© <?= date('Y') ?> Alkes. SysPower es un producto de Alkes. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<?= sy_dialogo_demo($URL_APP) ?>

<script src="assets/js/syspower.js" defer></script>
</body>
</html>
