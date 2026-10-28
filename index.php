<?php
$NOINDEX = false;

define('ALKES_MAIL',    'soporte@alkes.mx');
define('ALKES_TEL',     '+523339460097');
define('ALKES_TEL_TXT', '333 946 0097');


if (!defined('SY_SITIO'))    { define('SY_SITIO', 'https://syspower.alkes.mx'); }
if (!defined('SY_APP'))      { define('SY_APP', 'https://app.syspower.alkes.mx'); }
if (!defined('SY_WHATSAPP')) { define('SY_WHATSAPP', 'https://wa.me/523339460097'); }

/** Redes oficiales de Alkes. */
function sy_redes()
{
    return array(
        array('n' => 'Facebook',  'u' => 'https://www.facebook.com/alkes.mx'),
        array('n' => 'Instagram', 'u' => 'https://www.instagram.com/alkes.mx'),
        array('n' => 'LinkedIn',  'u' => 'https://www.linkedin.com/company/alkes-mx'),
        array('n' => 'TikTok',    'u' => 'https://www.tiktok.com/@alkes.mx'),
    );
}

/** Mensaje de partida para pedir informes. */
function sy_url_informes()
{
    return 'mailto:' . ALKES_MAIL . '?subject=' . rawurlencode('Informes de SysPower');
}

/** Mensaje de partida para pedir una demostración guiada. */
function sy_url_agendar()
{
    return 'mailto:' . ALKES_MAIL . '?subject=' . rawurlencode('Demostración guiada de SysPower');
}

/** Logo en dos versiones; el CSS muestra la que corresponde al tema. */
function sy_logo($px = 34)
{
    $px = (int) $px;
    return '<img class="logo logo--claro" src="assets/img/logo.png" alt="" width="' . $px . '" height="' . $px . '">'
         . '<img class="logo logo--oscuro" src="assets/img/logo-blanco.png" alt="" width="' . $px . '" height="' . $px . '">';
}

/**
 * Captura dentro de una ventana de navegador. Si existe la versión oscura se
 * pintan las dos y el CSS muestra la del tema activo.
 */
function sy_ventana($archivo, $alt, $w, $h, $url = 'app.syspower.alkes.mx', $carga = 'lazy')
{
    $existe = is_file(__DIR__ . '/' . $archivo);
    $osc    = preg_replace('/\.(png|jpe?g|webp)$/i', '-oscuro.$1', $archivo);
    $hayOsc = $osc !== $archivo && is_file(__DIR__ . '/' . $osc);
    $o  = '<figure class="win">';
    $o .= '<div class="win__bar"><span class="win__dots" aria-hidden="true"><i></i><i></i><i></i></span>';
    $o .= '<span class="win__url">' . a_e($url) . '</span></div>';
    $o .= '<div class="win__shot" style="--ar:' . (int) $w . ' / ' . (int) $h . '">';
    if ($existe) {
        $o .= '<img src="' . a_e($archivo) . '" alt="' . a_e($alt) . '"' . ($hayOsc ? ' data-tema-img="claro"' : '')
            . ' width="' . (int) $w . '" height="' . (int) $h . '" loading="' . a_e($carga) . '" decoding="async">';
        if ($hayOsc) {
            $o .= '<img src="' . a_e($osc) . '" alt="' . a_e($alt) . '" data-tema-img="oscuro"'
                . ' width="' . (int) $w . '" height="' . (int) $h . '" loading="' . a_e($carga) . '" decoding="async">';
        }
    } else {
        $o .= '<div class="win__falta"><b>Captura pendiente</b><code>' . a_e($archivo) . '</code></div>';
    }
    return $o . '</div></figure>';
}

/** Diálogo con las credenciales del demo. */
function sy_dialogo_demo($url_app)
{
    $h  = '<dialog id="demoDialog" aria-labelledby="demoTitulo"><div class="dlg">';
    $h .= '<h2 id="demoTitulo">Acceso al demo</h2>';
    $h .= '<p>Entra a la empresa de demostración con estas credenciales. Su controlador es de ejemplo: no hay un equipo real conectado.</p>';
    $h .= '<dl class="dlg__creds"><div><dt>Usuario</dt><dd>demo@alkes.mx</dd></div>';
    $h .= '<div><dt>Contraseña</dt><dd>Demo@Alkes2026</dd></div></dl>';
    $h .= '<p>Para una demostración guiada escríbenos a <a href="' . a_e(sy_url_agendar()) . '">' . ALKES_MAIL . '</a>, '
        . 'llama al <a href="tel:' . ALKES_TEL . '">' . ALKES_TEL_TXT . '</a> o usa '
        . '<a href="' . SY_WHATSAPP . '" target="_blank" rel="noopener">WhatsApp</a>.</p>';
    $h .= '<div class="dlg__foot"><a class="btn btn--primary" href="' . a_e($url_app) . '" target="_blank" rel="noopener">Ir a la app' . a_icon('external') . '</a>';
    $h .= '<button class="btn btn--line" type="button" data-close-demo>Cerrar</button></div>';
    return $h . '</div></dialog>';
}

/** Preguntas frecuentes: la misma lista alimenta la sección y el JSON-LD. */
function sy_faq()
{
    return array(
        array('q' => '¿Qué es SysPower?',
              'a' => 'Un controlador que se instala en tu sitio, con cinco salidas de 120 V a 10 A, y un panel web desde el que apagas, enciendes y reinicias a distancia los equipos conectados: routers, DVR, switches y servidores pequeños.'),
        array('q' => '¿Qué pasa si un equipo está completamente trabado y no responde?',
              'a' => 'Es el escenario donde SysPower más ayuda. El corte es físico: el relé interrumpe la corriente del equipo sin pasar por su sistema. No importa si está congelado o colgado.'),
        array('q' => '¿Cuánto cuesta?',
              'a' => 'SysPower no tiene planes publicados. Escríbenos a ' . ALKES_MAIL . ' o llama al ' . ALKES_TEL_TXT . ': nos cuentas cuántos sitios y equipos quieres controlar y te enviamos los informes.'),
        array('q' => '¿Qué incluye el servicio?',
              'a' => 'El controlador, el panel web, el historial, el soporte y las actualizaciones. El hardware va incluido en la renta, sin anticipo ni compra inicial del equipo, y tiene garantía.'),
        array('q' => '¿Qué necesita el sitio para la instalación?',
              'a' => 'Una toma eléctrica estándar de 120 V, conexión a internet por cable (Ethernet) o WiFi y espacio para el controlador cerca de los equipos. No requiere VPN ni abrir puertos hacia el exterior.'),
        array('q' => '¿Qué pasa si se cae el internet del sitio?',
              'a' => 'El controlador recibe las órdenes cuando reporta al panel. Si el enlace se cae, no llegan órdenes nuevas hasta que se restablece; entonces recuperas el control desde el panel.'),
        array('q' => '¿Qué pasa si se va la luz en el sitio?',
              'a' => 'Si se va la luz, el sistema se reinicia solo cuando vuelve la energía.'),
        array('q' => '¿Se puede operar el panel sin saber nada técnico?',
              'a' => 'Sí. Ves tus equipos con su nombre, eliges cuál reiniciar y listo. Cada usuario opera según su rol: administrador, operador o visor.'),
        array('q' => '¿Queda registro de quién hizo qué?',
              'a' => 'Sí. Cada acción de energía, cada cambio y cada nota queda en el historial del controlador, con quién, qué y cuándo.'),
        array('q' => '¿Qué pasa si el hardware se daña?',
              'a' => 'El servicio incluye garantía de hardware. Si el controlador falla, lo atendemos para restablecer la operación.'),
        array('q' => 'Soy integrador o sysadmin. ¿Cómo encaja SysPower en mis instalaciones?',
              'a' => 'Lo instalas en el sitio del cliente y queda disponible para su operación diaria, con acceso multiusuario y roles. Para conocer el modelo de distribución, escríbenos.'),
        array('q' => '¿Puedo probarlo?',
              'a' => 'Sí, con el demo y sus credenciales de prueba. Su controlador es de ejemplo, sin un equipo real conectado.'),
    );
}

/** Datos estructurados. Todo sale de lo que la página dice; sin precios, reseñas ni calificaciones. */
function sy_jsonld($seo = array())
{
    $faq = array();
    foreach (sy_faq() as $f) {
        $faq[] = array('@type' => 'Question', 'name' => $f['q'],
                       'acceptedAnswer' => array('@type' => 'Answer', 'text' => $f['a']));
    }
    $redes = array();
    foreach (sy_redes() as $r) { $redes[] = $r['u']; }

    $g = array(
        '@context' => 'https://schema.org',
        '@graph' => array(
            array('@type' => 'Organization', '@id' => ALKES_SITIO . '/#org', 'name' => 'Alkes', 'url' => ALKES_SITIO,
                  'email' => ALKES_MAIL, 'telephone' => ALKES_TEL, 'sameAs' => $redes),
            array('@type' => 'WebSite', '@id' => SY_SITIO . '/#web', 'name' => 'SysPower', 'url' => SY_SITIO . '/',
                  'inLanguage' => 'es-MX', 'publisher' => array('@id' => ALKES_SITIO . '/#org')),
            array('@type' => 'SoftwareApplication', '@id' => SY_SITIO . '/#app', 'name' => 'SysPower',
                  'applicationCategory' => 'BusinessApplication', 'operatingSystem' => 'Web',
                  'description' => 'Reinicio físico remoto de equipos críticos: controlador con cinco salidas de 120 V y panel web para apagar, encender y reiniciar routers, DVR, switches y servidores.',
                  'url' => SY_SITIO . '/', 'inLanguage' => 'es-MX', 'image' => SY_SITIO . '/assets/img/og-image.png',
                  'publisher' => array('@id' => ALKES_SITIO . '/#org')),
            array('@type' => 'FAQPage', '@id' => SY_SITIO . '/#faq', 'mainEntity' => $faq),
        ),
    );
    $g = seo_enriquecer($g, $seo);
    return json_encode($g, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG);
}

if (!defined('ALKES_SITIO'))    { define('ALKES_SITIO', 'https://alkes.mx'); }
if (!defined('ALKES_CENTRAL'))  { define('ALKES_CENTRAL', 'https://contratar.alkes.mx'); }
if (!defined('ALKES_MAIL'))     { define('ALKES_MAIL', 'gquintero@alkes.mx'); }
if (!defined('ALKES_TEL'))      { define('ALKES_TEL', '+523339460097'); }
if (!defined('ALKES_TEL_TXT'))  { define('ALKES_TEL_TXT', '333 946 0097'); }

/** Escape de todo dato que entre al HTML. */
function a_e($s) { return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8'); }

/**
 * La familia completa. Alimenta la rejilla de ecosistema del pie.
 * Orden fijo en las seis landings: la firma tiene que ser reconocible.
 */
function a_familia()
{
    return array(
        'smartpend' => array('nombre' => 'SmartPend', 'url' => 'https://smartpend.alkes.mx', 'que' => 'Pendientes y proyectos'),
        'geocheck'  => array('nombre' => 'GeoCheck',  'url' => 'https://geocheck.alkes.mx',  'que' => 'Asistencia por ubicación'),
        'mantis'    => array('nombre' => 'Mantis',    'url' => 'https://mantis.alkes.mx',    'que' => 'Mantenimiento de activos'),
        'syspower'  => array('nombre' => 'SysPower',  'url' => 'https://syspower.alkes.mx',  'que' => 'Energía controlada a distancia'),
        'erp'       => array('nombre' => 'Alkes ERP', 'url' => 'https://erp.alkes.mx',       'que' => 'Gestión empresarial y CFDI'),
    );
}

// ---------------------------------------------------------------------------
// Iconos. Trazo 1.75, viewBox 24×24, currentColor. Decorativos siempre.
// ---------------------------------------------------------------------------
function a_icon($nombre, $clase = '')
{
    static $d = null;
    if ($d === null) { $d = array(
    'arrow'      => '<path d="M5 12h14M13 6l6 6-6 6"/>',
    'check'      => '<path d="M20 6 9 17l-5-5"/>',
    'close'      => '<path d="M18 6 6 18M6 6l12 12"/>',
    'chevron'    => '<path d="m6 9 6 6 6-6"/>',
    'menu'       => '<path d="M4 7h16M4 12h16M4 17h16"/>',
    'moon'       => '<path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8Z"/>',
    'sun'        => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>',
    'external'   => '<path d="M14 4h6v6M20 4l-9 9M18 14v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h5"/>',
    'mail'       => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3.5 7 7.6 5.3a1.6 1.6 0 0 0 1.8 0L20.5 7"/>',
    'phone'      => '<path d="M7 3h3l2 5-2.5 1.5a12 12 0 0 0 5 5L16 12l5 2v3a2 2 0 0 1-2.2 2A16.5 16.5 0 0 1 4 5.2 2 2 0 0 1 6 3Z"/>',
    'globe'      => '<circle cx="12" cy="12" r="9"/><path d="M3.5 9h17M3.5 15h17M12 3a15 15 0 0 1 0 18 15 15 0 0 1 0-18Z"/>',
    'shield'     => '<path d="M12 3 5 6v5.5c0 4.2 2.9 7.6 7 9.5 4.1-1.9 7-5.3 7-9.5V6Z"/><path d="m9 12 2 2 4-4"/>',
    'play'       => '<circle cx="12" cy="12" r="9"/><path d="M10.5 9 15 12l-4.5 3Z"/>',
    'eye'        => '<path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z"/><circle cx="12" cy="12" r="3"/>',
    'lock'       => '<rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/>',
    'clock'      => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5.3l3.3 2"/>',
    'history'    => '<path d="M3.5 12a8.5 8.5 0 1 0 2.6-6.1M3.5 5v4h4"/><path d="M12 7.5v5l3.2 1.9"/>',
    'users'      => '<circle cx="9" cy="8" r="3.2"/><path d="M3 20c0-3.3 2.7-5.5 6-5.5s6 2.2 6 5.5"/><path d="M16 5.3a3.2 3.2 0 0 1 0 6.2M17.5 14.8c2.1.6 3.5 2.3 3.5 4.6"/>',
    'user-check' => '<circle cx="10" cy="8" r="3.2"/><path d="M3.5 20c0-3.3 2.9-5.5 6.5-5.5 1 0 2 .2 2.8.5"/><path d="m15.5 17.5 2 2 4-4"/>',
    'mic'        => '<rect x="9" y="3" width="6" height="11" rx="3"/><path d="M5.5 11.5a6.5 6.5 0 0 0 13 0M12 18v3"/>',
    'tag'        => '<path d="M3.5 11.2V4.5a1 1 0 0 1 1-1h6.7a1 1 0 0 1 .7.3l8.3 8.3a1 1 0 0 1 0 1.4l-6.7 6.7a1 1 0 0 1-1.4 0L3.8 11.9a1 1 0 0 1-.3-.7Z"/><circle cx="7.8" cy="7.8" r="1.3"/>',
    'form'       => '<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h4"/>',
    'report'     => '<path d="M6 3h8l5 5v13a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z"/><path d="M14 3v5h5"/><path d="M9 17v-3M12 17v-5M15 17v-2"/>',
    'calendar'   => '<rect x="3.5" y="5" width="17" height="16" rx="2"/><path d="M3.5 10h17M8 3v4M16 3v4"/>',
    'repeat'     => '<path d="M4 9V8a3 3 0 0 1 3-3h10l-3-3M20 15v1a3 3 0 0 1-3 3H7l3 3"/>',
    'layers'     => '<path d="m12 3 9 5-9 5-9-5Z"/><path d="m3.5 12.5 8.5 4.7 8.5-4.7"/><path d="m3.5 16.8 8.5 4.7 8.5-4.7"/>',
    'filter'     => '<path d="M3.5 5h17l-6.6 7.8V20l-3.8-2.2v-5Z"/>',
    'building'   => '<path d="M4 21V5a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v16"/><path d="M15 10h3a2 2 0 0 1 2 2v9M8 7h3M8 11h3M8 15h3M2.5 21h19"/>',
    'bell'       => '<path d="M6 9a6 6 0 1 1 12 0c0 4 1.5 5.5 2 6H4c.5-.5 2-2 2-6Z"/><path d="M10 19a2 2 0 0 0 4 0"/>',
    'cpu'        => '<rect x="6" y="6" width="12" height="12" rx="2"/><rect x="9.5" y="9.5" width="5" height="5" rx="1"/><path d="M9 3v3M15 3v3M9 18v3M15 18v3M3 9h3M3 15h3M18 9h3M18 15h3"/>',
    'sparkle'    => '<path d="m12 3 1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9Z"/><path d="M18.5 16.5 19 18l1.5.5-1.5.5-.5 1.5-.5-1.5L16.5 18l1.5-.5Z"/>',
    'cloud'      => '<path d="M7 18h10.5a3.5 3.5 0 0 0 .4-7A5.5 5.5 0 0 0 7.3 9.6 4.2 4.2 0 0 0 7 18Z"/>',
    'cloud-check'=> '<path d="M7 17.5h10a3.5 3.5 0 0 0 .4-7A5.5 5.5 0 0 0 7.3 9.1 4.2 4.2 0 0 0 7 17.5Z"/><path d="m9.5 13.5 2 2 3.5-3.5"/>',
    'refresh'    => '<path d="M20 11a8 8 0 0 0-13.8-5.2L3.5 8.5"/><path d="M3.5 4v4.5H8"/><path d="M4 13a8 8 0 0 0 13.8 5.2l2.7-2.7"/><path d="M20.5 20v-4.5H16"/>',
    'checklist'  => '<path d="M9 6h11M9 12h11M9 18h11"/><path d="m3.5 6 1.2 1.2L7 5M3.5 12l1.2 1.2L7 11M3.5 18l1.2 1.2L7 17"/>',
    'geo'        => '<path d="M12 21s7-5.7 7-11a7 7 0 1 0-14 0c0 5.3 7 11 7 11Z"/><circle cx="12" cy="10" r="2.7"/>',
    'target'     => '<circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="4.5"/><circle cx="12" cy="12" r="1"/>',
    'badge'      => '<rect x="3.5" y="4.5" width="17" height="15" rx="2"/><circle cx="9" cy="10.5" r="2.2"/><path d="M5.5 16.5c.5-1.7 1.9-2.6 3.5-2.6s3 .9 3.5 2.6M15 9.5h3.5M15 13h3.5"/>',
    'camera'     => '<path d="M4 7h3l1.5-2h7L17 7h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1Z"/><circle cx="12" cy="13" r="3.6"/>',
    'qr'         => '<rect x="3.5" y="3.5" width="7" height="7" rx="1"/><rect x="13.5" y="3.5" width="7" height="7" rx="1"/><rect x="3.5" y="13.5" width="7" height="7" rx="1"/><path d="M13.5 13.5h3v3h-3zM20.5 13.5v3M17.5 20.5h3M13.5 20.5h1"/>',
    'route'      => '<circle cx="6" cy="18" r="2.5"/><circle cx="18" cy="6" r="2.5"/><path d="M15.5 6H10a4 4 0 0 0 0 8h4a4 4 0 0 1 0 8H8.5"/>',
    'truck'      => '<path d="M3 6h10v10H3zM13 9.5h4l3 3.2V16h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/>',
    'warehouse'  => '<path d="M3 21V8.5L12 4l9 4.5V21"/><path d="M7.5 21v-7h9v7M7.5 17.5h9"/>',
    'factory'    => '<path d="M3 21V10l6 4V10l6 4V6h6v15Z"/><path d="M7 17.5h2M13 17.5h2M18 17.5h1"/>',
    'cart'       => '<path d="M3 4h2.2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.3a1.5 1.5 0 0 0 1.5-1.2L21 8H6"/><circle cx="9.5" cy="20" r="1.4"/><circle cx="17.5" cy="20" r="1.4"/>',
    'invoice'    => '<path d="M5.5 3h13v18l-2.2-1.5-2.1 1.5-2.2-1.5L9.8 21l-2.1-1.5L5.5 21Z"/><path d="M9 8h6M9 12h6"/>',
    'coins'      => '<ellipse cx="9" cy="7" rx="5.5" ry="2.5"/><path d="M3.5 7v5c0 1.4 2.5 2.5 5.5 2.5s5.5-1.1 5.5-2.5V7"/><path d="M14.5 11.4c3 .2 5.2 1.2 5.2 2.4v4.7c0 1.4-2.5 2.5-5.5 2.5s-5.5-1.1-5.5-2.5v-3.6"/>',
    'server'     => '<rect x="3.5" y="4" width="17" height="6.5" rx="1.5"/><rect x="3.5" y="13.5" width="17" height="6.5" rx="1.5"/><path d="M7 7.2h.01M7 16.8h.01"/>',
    'rack'       => '<rect x="4.5" y="3" width="15" height="18" rx="2"/><path d="M4.5 8.5h15M4.5 14h15M8 5.8h.01M8 11.2h.01M8 17.3h.01"/>',
    'ethernet'   => '<path d="M6 10V6.5a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1V10l2 2v5.5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V12Z"/><path d="M8.5 12.5v3M12 12.5v3M15.5 12.5v3"/>',
    'wifi'       => '<path d="M2.5 8.5a15 15 0 0 1 19 0M5.8 12.2a10 10 0 0 1 12.4 0M9.2 15.8a5 5 0 0 1 5.6 0"/><circle cx="12" cy="19.3" r="1.2"/>',
    'power'      => '<path d="M12 3v9"/><path d="M7.3 6.3a8 8 0 1 0 9.4 0"/>',
    'zap'        => '<path d="M13.5 2 5 13.5h6L10.5 22 19 10.5h-6Z"/>',
    'display'    => '<rect x="2.5" y="4" width="19" height="12.5" rx="2"/><path d="M8.5 20.5h7M12 16.5v4"/>',
    'wrench'     => '<path d="M20 5.5a5 5 0 0 1-6.6 6.6L6 19.5a2.1 2.1 0 0 1-3-3l7.4-7.4A5 5 0 0 1 17 2.5l-3 3 1.5 3 3 1.5Z"/>',
    'box'        => '<path d="m12 3 8.5 4.5v9L12 21l-8.5-4.5v-9Z"/><path d="M3.5 7.5 12 12l8.5-4.5M12 12v9"/>',
    'chart'      => '<path d="M4 20V4M4 20h16"/><path d="M8 16.5v-4M12 16.5V8M16 16.5v-6.5"/>',
    'gear'       => '<circle cx="12" cy="12" r="3.2"/><path d="M12 2.5v2.2M12 19.3v2.2M4.2 12H2M22 12h-2.2M6.3 6.3 4.8 4.8M19.2 19.2l-1.5-1.5M6.3 17.7l-1.5 1.5M19.2 4.8l-1.5 1.5"/>',
    'database'   => '<ellipse cx="12" cy="6" rx="7.5" ry="3"/><path d="M4.5 6v12c0 1.7 3.4 3 7.5 3s7.5-1.3 7.5-3V6M4.5 12c0 1.7 3.4 3 7.5 3s7.5-1.3 7.5-3"/>',
    'code'       => '<path d="m8.5 8-5 4 5 4M15.5 8l5 4-5 4M13.5 4.5l-3 15"/>',
    'book'       => '<path d="M4 4.5A1.5 1.5 0 0 1 5.5 3H19v15.5H5.5A1.5 1.5 0 0 0 4 20Z"/><path d="M4 20a1.5 1.5 0 0 0 1.5 1.5H19"/>',
    'search'     => '<circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/>',
    'image'      => '<rect x="3.5" y="4.5" width="17" height="15" rx="2"/><circle cx="8.8" cy="9.8" r="1.6"/><path d="m4 17 4.8-4.5 3.4 3.2 3-2.7 4.8 4.5"/>',
    'alert'      => '<path d="M12 3.5 21 19.5H3Z"/><path d="M12 10v4M12 16.8h.01"/>',
    'restart'    => '<path d="M12 3v5"/><path d="M17.6 6.4a8 8 0 1 1-11.2 0"/>',
    'login'      => '<path d="M14 3.5h4.5a1.5 1.5 0 0 1 1.5 1.5v14a1.5 1.5 0 0 1-1.5 1.5H14"/><path d="M4 12h11M11.5 8.5 15 12l-3.5 3.5"/>',
    'paperclip'  => '<path d="M20 11.5 12.2 19.3a5 5 0 0 1-7-7L12.9 4.4a3.3 3.3 0 0 1 4.7 4.7l-7.7 7.8a1.7 1.7 0 0 1-2.4-2.4l7.2-7.2"/>',
    'github'     => '<path d="M9 19c-4.5 1.4-4.5-2.4-6.5-2.9m13 4.9v-3.5a3 3 0 0 0-.85-2.35c2.85-.3 5.85-1.4 5.85-6.3a4.9 4.9 0 0 0-1.3-3.4 4.6 4.6 0 0 0-.1-3.4s-1.05-.3-3.5 1.3a12 12 0 0 0-6.3 0C6.85.65 5.8.95 5.8.95a4.6 4.6 0 0 0-.1 3.4A4.9 4.9 0 0 0 4.4 7.75c0 4.9 3 6 5.85 6.3a3 3 0 0 0-.85 2.3V20"/>',
    'linkedin'   => '<path d="M15 8.5a5.5 5.5 0 0 1 5.5 5.5v6h-3.5v-6a2 2 0 0 0-4 0v6H9.5V8.8H13v1.9A4.4 4.4 0 0 1 15 8.5Z"/><rect x="2.5" y="8.8" width="3.5" height="11.2"/><circle cx="4.25" cy="4.5" r="1.9"/>',
    ); }
    $p = isset($d[$nombre]) ? $d[$nombre] : $d['check'];
    $c = $clase !== '' ? ' class="' . a_e($clase) . '"' : '';
    return '<svg' . $c . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"'
         . ' stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $p . '</svg>';
}

// ---------------------------------------------------------------------------
// Piezas compartidas
// ---------------------------------------------------------------------------

/** Rejilla del ecosistema para el pie. */
function a_ecosistema_grid($actual)
{
    $h = '<div class="eco-grid" data-reveal>';
    foreach (a_familia() as $k => $p) {
        if ($k === $actual) {
            $h .= '<div class="eco-card" aria-current="page">';
            $h .= '<div><b>' . a_e($p['nombre']) . '</b><span>Estás aquí</span></div></div>';
        } else {
            $h .= '<a class="eco-card" href="' . a_e($p['url']) . '">';
            $h .= '<div><b>' . a_e($p['nombre']) . '</b><span>' . a_e($p['que']) . '</span></div></a>';
        }
    }
    return $h . '</div>';
}

/** Encabezado de sección: índice en el riel + eyebrow + título + entradilla. */
function a_head($idx, $eyebrow, $titulo, $lede = '', $extra = '')
{
    $h  = '<header class="head' . ($extra ? ' ' . a_e($extra) : '') . '" data-reveal>';
    $h .= '<p class="idx head__idx">' . a_e($idx) . '</p>';
    $h .= '<div class="head__main">';
    if ($eyebrow !== '') { $h .= '<p class="eyebrow">' . a_e($eyebrow) . '</p>'; }
    $h .= '<h2>' . $titulo . '</h2>';
    if ($lede !== '')    { $h .= '<p class="lede">' . a_e($lede) . '</p>'; }
    return $h . '</div></header>';
}

/**
 * Hueco de captura.
 * Si el archivo existe se pinta la imagen; si no, un marco con la ruta y las
 * dimensiones que debe tener, para sustituirlo sin adivinar nada.
 */
function a_shot($archivo, $alt, $w, $h, $pie = '', $fig = '', $clase = '')
{
    $ruta   = __DIR__ . '/' . $archivo;
    $existe = is_file($ruta);
    $osc    = preg_replace('/\.(png|jpe?g|webp)$/i', '-oscuro.$1', $archivo);
    $existeOsc = $osc !== $archivo && is_file(__DIR__ . '/' . $osc);
    $o  = '<figure class="shot' . ($existe ? '' : ' shot--pendiente')
        . ($clase ? ' ' . a_e($clase) : '') . '" data-reveal>';
    $o .= '<div class="shot__box ticks">';
    $o .= '<div class="shot__frame" style="--ar: ' . (int) $w . ' / ' . (int) $h . '">';
    if ($existe) {
        $o .= '<img src="' . a_e($archivo) . '" alt="' . a_e($alt) . '"'
            . ($existeOsc ? ' data-theme-img="light"' : '')
            . ' width="' . (int) $w . '" height="' . (int) $h . '" loading="lazy" decoding="async">';
        if ($existeOsc) {
            $o .= '<img src="' . a_e($osc) . '" alt="' . a_e($alt) . '" data-theme-img="dark"'
                . ' width="' . (int) $w . '" height="' . (int) $h . '" loading="lazy" decoding="async">';
        }
    } else {
        $o .= '<div class="shot__pending">' . a_icon('image')
            . '<b>Captura pendiente</b>'
            . '<code>' . a_e($archivo) . '</code>'
            . '<small>' . (int) $w . ' × ' . (int) $h . ' px</small></div>';
    }
    $o .= '</div></div>';
    if ($pie !== '') {
        $o .= '<figcaption class="shot__cap">';
        if ($fig !== '') { $o .= '<span class="mono">' . a_e($fig) . '</span>'; }
        $o .= '<span>' . a_e($pie) . '</span></figcaption>';
    }
    return $o . '</figure>';
}

/** Conmutador de tema. Muestra el icono de lo que va a activar. */
function a_tema($clase = 'theme-toggle')
{
    return '<button class="' . a_e($clase) . '" type="button" data-theme-toggle aria-label="Cambiar tema">'
         . a_icon('moon', 'i-moon') . a_icon('sun', 'i-sun')
         . '<span class="theme-toggle__label"></span></button>';
}

/** Bloque del autor: la persona real que desarrolla y da soporte. */
function a_autor($cita)
{
    $h  = '<div class="author" data-reveal>';
    $h .= '<img class="author__photo" src="https://gustavoquintero.dev/assets/img/my-profile-image.jpg"'
        . ' alt="Retrato de Gustavo Quintero" width="84" height="84" loading="lazy" decoding="async">';
    $h .= '<div><h3>Gustavo Quintero</h3>';
    $h .= '<p class="author__role">Desarrollo y operación</p>';
    $h .= '<blockquote><p>«' . a_e($cita) . '»</p></blockquote>';
    $h .= '<div class="author__links">';
    $h .= '<a href="mailto:atencion@gustavoquintero.dev">' . a_icon('mail') . 'atencion@gustavoquintero.dev</a>';
    $h .= '<a href="https://gustavoquintero.dev" target="_blank" rel="noopener">' . a_icon('globe')
        . 'gustavoquintero.dev' . a_icon('external') . '</a>';
    $h .= '<a href="https://github.com/GustavoQuinteroC" target="_blank" rel="noopener">' . a_icon('github')
        . 'GitHub' . a_icon('external') . '</a>';
    $h .= '<a href="https://www.linkedin.com/in/gustavo-quintero-81aa18169/" target="_blank" rel="noopener">' . a_icon('linkedin')
        . 'LinkedIn' . a_icon('external') . '</a>';
    $h .= '</div></div></div>';
    return $h;
}

/** Diálogo con las credenciales del demo. */
function a_dialogo_demo($url_app)
{
    $h  = '<dialog id="demoDialog" aria-labelledby="demoTitulo">';
    $h .= '<div class="dlg"><h2 id="demoTitulo">Acceso al demo</h2>';
    $h .= '<p>Entra a la empresa de demostración con estas credenciales.</p>';
    $h .= '<dl class="dlg__creds">';
    $h .= '<div><dt>Usuario</dt><dd>demo@alkes.mx</dd></div>';
    $h .= '<div><dt>Contraseña</dt><dd>Demo@Alkes2026</dd></div>';
    $h .= '</dl>';
    $h .= '<p>Para una demostración guiada, contacta a <strong>Gustavo Quintero</strong> al correo '
        . '<a href="mailto:' . ALKES_MAIL . '">' . ALKES_MAIL . '</a> o al teléfono '
        . '<a href="tel:' . ALKES_TEL . '">' . ALKES_TEL_TXT . '</a>.</p>';
    $h .= '<div class="dlg__foot">';
    $h .= '<a class="btn btn--primary" href="' . a_e($url_app) . '" target="_blank" rel="noopener">Ir a la app' . a_icon('external') . '</a>';
    $h .= '<button class="btn btn--outline" type="button" data-close-demo>Cerrar</button>';
    $h .= '</div></div></dialog>';
    return $h;
}


function a_cache()
{
    static $d = null;
    if ($d !== null) { return $d; }
    $f = __DIR__ . '/planes.cache.json';
    $d = array('producto' => array(), 'planes' => array());
    if (is_file($f)) {
        $j = json_decode((string) @file_get_contents($f), true);
        if (is_array($j)) { $d = $j + $d; }
    }
    return $d;
}

function a_planes()         { $d = a_cache(); return isset($d['planes']) ? $d['planes'] : array(); }
function a_producto_clave() { $d = a_cache(); return isset($d['producto']['clave']) ? $d['producto']['clave'] : ''; }
function a_url_panel()      { $d = a_cache(); return isset($d['producto']['url_panel']) ? $d['producto']['url_panel'] : ALKES_SITIO; }

function a_num($n) { return number_format((float) $n, (floor($n) == $n ? 0 : 2), '.', ','); }

/** Traduce los iconos del catálogo (Bootstrap Icons) al set propio. */
function a_map_icon($bi)
{
    $m = array(
        'bi-people-fill' => 'users',            'bi-cpu-fill' => 'cpu',
        'bi-paperclip' => 'paperclip',          'bi-tools' => 'wrench',
        'bi-arrow-up-circle-fill' => 'refresh', 'bi-clock-history' => 'history',
        'bi-shield-lock' => 'lock',             'bi-box-seam' => 'box',
        'bi-box-seam-fill' => 'box',            'bi-card-checklist' => 'checklist',
        'bi-geo-alt-fill' => 'geo',             'bi-person-badge-fill' => 'badge',
        'bi-file-earmark-bar-graph' => 'report','bi-display-fill' => 'display',
        'bi-ethernet' => 'ethernet',            'bi-hdd-rack-fill' => 'rack',
        'bi-cloud-check-fill' => 'cloud-check',
    );
    return isset($m[$bi]) ? $m[$bi] : 'check';
}

/** Ahorro del plan anual frente a doce mensualidades. Calculado, nunca escrito. */
function a_ahorro_anual()
{
    $m = array(); $a = array();
    foreach (a_planes() as $p) {
        if ($p['periodo'] === 'mensual') { $m[$p['clave']] = (float) $p['precio']; }
        if ($p['periodo'] === 'anual')   { $a[$p['clave']] = (float) $p['precio']; }
    }
    $pcts = array();
    foreach ($a as $k => $precio) {
        if (!empty($m[$k]) && $m[$k] > 0) {
            $full = $m[$k] * 12;
            if ($full > $precio) { $pcts[$k] = (int) round((1 - $precio / $full) * 100); }
        }
    }
    return $pcts ? max($pcts) : 0;
}

/** Rejilla de planes de un periodo. Los de pago único aparecen en ambos. */
function a_grid_planes($periodo)
{
    $items = array();
    foreach (a_planes() as $p) {
        if ($p['periodo'] === $periodo || $p['periodo'] === 'unico') { $items[] = $p; }
    }
    if (!$items) {
        return '<p class="center muted">Por el momento no hay planes publicados. '
             . '<a class="link-arrow" href="mailto:' . ALKES_MAIL . '">Escríbenos' . a_icon('arrow') . '</a></p>';
    }

    $clave  = a_producto_clave();
    $ahorro = a_ahorro_anual();
    $h = '<div class="plans">';

    foreach ($items as $p) {
        $rec = !empty($p['recomendado']);
        $per = $p['periodo'] === 'anual' ? 'MXN / año'
             : ($p['periodo'] === 'unico' ? 'MXN / pago único' : 'MXN / mes');

        $h .= '<div class="plan' . ($rec ? ' plan--rec' : '') . '">';
        $h .= '<div class="plan__head"><h3 class="plan__name">' . a_e($p['nombre']) . '</h3>';
        if ($rec) { $h .= '<span class="plan__tag">Recomendado</span>'; }
        $h .= '</div>';

        $h .= '<p class="plan__price"><span class="plan__cur">$</span>'
            . '<span class="plan__amt">' . a_num($p['precio']) . '</span>'
            . '<span class="plan__per">' . $per . '</span></p>';

        $nota = '';
        if (!empty($p['precio_anterior'])) {
            $nota = 'Antes <s>$' . a_num($p['precio_anterior']) . '</s>';
        } elseif ($p['periodo'] === 'anual') {
            $nota = 'Equivale a $' . a_num(round($p['precio'] / 12)) . ' al mes'
                  . ($ahorro ? ' · ahorras ' . $ahorro . ' %' : '');
        } elseif ($p['periodo'] === 'mensual') {
            $nota = 'Sin permanencia. Cancela cuando quieras.';
        }
        $h .= '<p class="plan__note">' . $nota . '</p>';

        $h .= '<ul class="plan__features">';
        foreach ($p['caracteristicas'] as $c) {
            $h .= '<li>' . a_icon(a_map_icon(isset($c['icono']) ? $c['icono'] : ''))
                . '<div><strong>' . a_e($c['titulo']) . '</strong>';
            if (!empty($c['descripcion'])) { $h .= '<p>' . a_e($c['descripcion']) . '</p>'; }
            $h .= '</div></li>';
        }
        $h .= '</ul>';

        $url = ALKES_CENTRAL . '/?producto=' . urlencode($clave)
             . '&plan=' . urlencode($p['clave'])
             . '&periodo=' . urlencode($p['periodo']);

        $h .= '<a class="btn ' . ($rec ? 'btn--primary' : 'btn--outline') . ' btn--block" href="' . a_e($url) . '">'
            . 'Contratar ' . a_e($p['nombre']) . a_icon('arrow') . '</a>';
        $h .= '</div>';
    }
    return $h . '</div>';
}

if (!defined('SEO_FUNDADOR_ID')) { define('SEO_FUNDADOR_ID', 'https://gustavoquintero.dev/#persona'); }

/** Persona fundadora: la misma entidad que describe gustavoquintero.dev. */
function seo_fundador()
{
    return array(
        '@type' => 'Person', '@id' => SEO_FUNDADOR_ID,
        'name' => 'Gustavo de Jesús Quintero Cerpa', 'alternateName' => 'Gustavo Quintero',
        'jobTitle' => 'Fundador y desarrollador de Alkes',
        'url' => 'https://gustavoquintero.dev/',
        'sameAs' => array('https://www.linkedin.com/in/gustavo-quintero-81aa18169/', 'https://github.com/GustavoQuinteroC'),
        'address' => array('@type' => 'PostalAddress', 'addressLocality' => 'Guadalajara', 'addressRegion' => 'Jalisco', 'addressCountry' => 'MX'),
    );
}

/** Versión publicada más reciente, leída del historial de novedades. */
function seo_version($dir)
{
    $t = (string) file_get_contents($dir . '/index.php');
    return preg_match('/disc__v">v(\d+\.\d+\.\d+)</', $t, $m) ? $m[1] : '';
}

/**
 * Lista de funciones y capturas a partir de los arreglos de la página.
 * Acepta $CAPACIDADES (con 'items' e 'img'), $SOSTIENE y $AVANZADAS.
 */
function seo_de_pagina($sitio, $capacidades, $extras = array())
{
    $funciones = array();
    $capturas = array();
    foreach ((array) $capacidades as $c) {
        if (!empty($c['h3'])) { $funciones[] = $c['h3']; }
        foreach ((array) (isset($c['items']) ? $c['items'] : array()) as $it) {
            if (is_array($it) && isset($it[1])) { $funciones[] = $it[1]; }
        }
        if (!empty($c['img'])) {
            $capturas[] = array_filter(array('@type' => 'ImageObject', 'url' => $sitio . '/' . ltrim($c['img'], '/'),
                                'caption' => isset($c['alt']) ? $c['alt'] : '',
                                'width' => isset($c['w']) ? (int) $c['w'] : null, 'height' => isset($c['h']) ? (int) $c['h'] : null),
                                function ($v) { return $v !== null && $v !== ''; });
        }
    }
    foreach ((array) $extras as $lista) {
        foreach ((array) $lista as $it) {
            if (is_array($it) && isset($it[1])) { $funciones[] = $it[1]; }
        }
    }
    $funciones = array_values(array_unique(array_filter($funciones)));
    return array('funciones' => $funciones, 'capturas' => $capturas);
}

/** Etiquetas extra del <head>. $s: sitio, nombre, titulo, alt, palabras, noindex. */
function seo_head($s)
{
    $e = function ($v) { return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8'); };
    $sitio = $s['sitio'];
    $og = $sitio . '/assets/img/og-image.png';
    $out = array();
    if (empty($s['noindex'])) {
        $out[] = '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">';
        $out[] = '<meta name="googlebot" content="index, follow, max-image-preview:large, max-snippet:-1">';
        $out[] = '<meta name="bingbot" content="index, follow, max-image-preview:large, max-snippet:-1">';
    }
    $out[] = '<meta name="keywords" content="' . $e(implode(', ', $s['palabras'])) . '">';
    $out[] = '<meta name="application-name" content="' . $e($s['nombre']) . '">';
    $out[] = '<meta name="apple-mobile-web-app-title" content="' . $e($s['nombre']) . '">';
    $out[] = '<meta name="creator" content="Gustavo Quintero">';
    $out[] = '<meta name="publisher" content="Alkes">';
    $out[] = '<meta name="classification" content="Software empresarial en la nube">';
    $out[] = '<meta name="language" content="es-MX">';
    $out[] = '<meta name="geo.region" content="MX-JAL">';
    $out[] = '<meta name="geo.placename" content="Guadalajara, Jalisco, México">';
    $out[] = '<meta name="geo.position" content="20.6597;-103.3496">';
    $out[] = '<meta name="ICBM" content="20.6597, -103.3496">';
    $out[] = '<link rel="alternate" hreflang="es-MX" href="' . $sitio . '/">';
    $out[] = '<link rel="alternate" hreflang="es" href="' . $sitio . '/">';
    $out[] = '<link rel="alternate" hreflang="x-default" href="' . $sitio . '/">';
    $out[] = '<link rel="alternate" type="text/markdown" title="Resumen para modelos de lenguaje" href="' . $sitio . '/llms.txt">';
    $out[] = '<link rel="sitemap" type="application/xml" href="' . $sitio . '/sitemap.xml">';
    $out[] = '<link rel="author" href="https://gustavoquintero.dev/">';
    $out[] = '<meta property="og:image:secure_url" content="' . $og . '">';
    $out[] = '<meta property="og:image:type" content="image/png">';
    $out[] = '<meta name="twitter:image:alt" content="' . $e($s['alt']) . '">';
    return implode("\n", $out) . "\n";
}

/**
 * Enriquece el grafo JSON-LD que arma cada landing.
 * $s: sitio, nombre, subcategoria, palabras, version, funciones, capturas,
 *     dispositivos, requisitos, titulo.
 */
function seo_enriquecer($g, $s)
{
    if (empty($s) || empty($g['@graph'])) { return $g; }
    $sitio = $s['sitio'];
    $org = ALKES_SITIO . '/#org';
    foreach ($g['@graph'] as $i => $n) {
        $tipo = isset($n['@type']) ? $n['@type'] : '';
        if ($tipo === 'Organization') {
            $g['@graph'][$i] = array_merge($n, array(
                'alternateName' => array('Alkes Software y Soluciones TI', 'Alkes TI'),
                'description' => 'Empresa de software y soluciones TI en Guadalajara, Jalisco. Desarrolla y opera sistemas en la nube para empresas mexicanas: ERP con CFDI 4.0, pendientes con IA, control de asistencia, mantenimiento y reinicio remoto de equipos.',
                'logo' => array('@type' => 'ImageObject', 'url' => ALKES_SITIO . '/assets/img/logo_alkes.png'),
                'address' => array('@type' => 'PostalAddress', 'addressLocality' => 'Guadalajara', 'addressRegion' => 'Jalisco', 'addressCountry' => 'MX'),
                'areaServed' => array('@type' => 'Country', 'name' => 'México'),
                'founder' => array('@id' => SEO_FUNDADOR_ID),
                'foundingLocation' => array('@type' => 'Place', 'name' => 'Guadalajara, Jalisco, México'),
                'contactPoint' => array('@type' => 'ContactPoint', 'contactType' => 'Ventas y soporte', 'telephone' => ALKES_TEL,
                                        'email' => ALKES_MAIL, 'areaServed' => 'MX', 'availableLanguage' => array('es')),
                'knowsAbout' => array('Software empresarial', 'ERP', 'Facturación electrónica CFDI 4.0', 'Gestión de pendientes',
                                      'Control de asistencia', 'Mantenimiento preventivo', 'Internet de las cosas', 'Inteligencia artificial'),
            ));
        } elseif ($tipo === 'SoftwareApplication') {
            $extra = array(
                'applicationSubCategory' => $s['subcategoria'],
                'keywords' => implode(', ', $s['palabras']),
                'countriesSupported' => 'MX',
                'availableOnDevice' => $s['dispositivos'],
                'browserRequirements' => $s['requisitos'],
                'provider' => array('@id' => $org),
                'creator' => array('@id' => SEO_FUNDADOR_ID),
                'author' => array('@id' => SEO_FUNDADOR_ID),
                'isAccessibleForFree' => false,
                'mainEntityOfPage' => array('@id' => $sitio . '/#pagina'),
            );
            if (!empty($s['version'])) {
                $extra['softwareVersion'] = $s['version'];
                $extra['releaseNotes'] = $sitio . '/#novedades';
            }
            if (!empty($s['funciones'])) { $extra['featureList'] = $s['funciones']; }
            if (!empty($s['capturas'])) { $extra['screenshot'] = $s['capturas']; }
            $g['@graph'][$i] = array_merge($n, $extra);
        } elseif ($tipo === 'WebSite') {
            $g['@graph'][$i] = array_merge($n, array(
                'description' => $s['titulo'],
                'creator' => array('@id' => SEO_FUNDADOR_ID),
                'copyrightHolder' => array('@id' => $org),
            ));
        }
    }
    $g['@graph'][] = array(
        '@type' => 'WebPage', '@id' => $sitio . '/#pagina', 'url' => $sitio . '/', 'name' => $s['titulo'],
        'isPartOf' => array('@id' => $sitio . '/#web'), 'about' => array('@id' => $sitio . '/#app'),
        'mainEntity' => array('@id' => $sitio . '/#app'), 'inLanguage' => 'es-MX',
        'primaryImageOfPage' => array('@type' => 'ImageObject', 'url' => $sitio . '/assets/img/og-image.png', 'width' => 1200, 'height' => 630),
        'breadcrumb' => array('@id' => $sitio . '/#migas'),
        'dateModified' => date('Y-m-d', (int) @filemtime(__DIR__ . '/index.php')),
        'publisher' => array('@id' => $org),
    );
    $g['@graph'][] = array(
        '@type' => 'BreadcrumbList', '@id' => $sitio . '/#migas',
        'itemListElement' => array(
            array('@type' => 'ListItem', 'position' => 1, 'name' => 'Alkes', 'item' => ALKES_SITIO . '/'),
            array('@type' => 'ListItem', 'position' => 2, 'name' => $s['nombre'], 'item' => $sitio . '/'),
        ),
    );
    $g['@graph'][] = seo_fundador();
    return $g;
}


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
// SEO y GEO: datos para seo_head() y seo_enriquecer() (ver seo_head).
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
                        <details class="disc disc--latest" open>
                <summary class="disc__sum">
                    <span class="disc__v">v2.2.0</span>
                    <span class="disc__t">Controlador inactivo, solo consulta</span>
                    <span class="disc__d">26 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Sin acciones por error</strong><p>Un controlador inactivo se puede consultar, imprimir y enviar, pero no encender, apagar, reiniciar ni modificar.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.1.6</span>
                    <span class="disc__t">Foto de perfil y logo más grandes</span>
                    <span class="disc__d">23 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Imágenes de mayor tamaño</strong><p>La foto de perfil y el logo de la empresa aceptan archivos más pesados.</p></div></li>
                    <li><div><strong>Archivos mejor protegidos</strong><p>Las carpetas de archivos ya no se pueden abrir sin iniciar sesión.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.1.5</span>
                    <span class="disc__t">El visor de PDF funciona en el celular</span>
                    <span class="disc__d">16 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>PDF dentro del mismo visor</strong><p>En Chrome para Android y otros navegadores sin visor propio, el PDF ahora se ve en el modal, página por página, con su botón Descargar.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.1.4</span>
                    <span class="disc__t">«Recuérdame» en hasta 5 equipos</span>
                    <span class="disc__d">16 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Cada equipo se recuerda por separado</strong><p>Puedes recordar hasta 5 equipos a la vez; al recordar el sexto se olvida el que lleva más tiempo sin usarse.</p></div></li>
                    <li><div><strong>Lista en Mi perfil</strong><p>En Mi perfil › Seguridad ves tus equipos recordados con navegador, sistema, IP y último uso, y puedes olvidar el que quieras.</p></div></li>
                    <li><div><strong>Más seguro</strong><p>Cerrar sesión olvida solo ese equipo, y cambiar la contraseña o dar de baja a un usuario olvida sus equipos recordados. Cada persona inicia sesión una vez más y vuelve a marcar «Recordarme».</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.1.3</span>
                    <span class="disc__t">Recuperar contraseña y acceso desde el celular</span>
                    <span class="disc__d">16 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Recupera tu contraseña desde el acceso</strong><p>Escribes tu correo, recibes un código de 6 dígitos que vence a los 15 minutos y con él pones tu contraseña nueva.</p></div></li>
                    <li><div><strong>Acceso cómodo en el celular</strong><p>La pantalla de acceso se ajusta a cualquier tamaño, en vertical y en horizontal, sin hacer scroll ni tapar la tarjeta con el teclado.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.1.2</span>
                    <span class="disc__t">Tablas con el mismo control de orden</span>
                    <span class="disc__d">15 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Un solo control de orden</strong><p>El modal de selección ordena con el mismo menú que el resto de las tablas.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.1.1</span>
                    <span class="disc__t">Botones iguales y en el mismo orden en todos los módulos</span>
                    <span class="disc__d">15 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Cada botón, siempre del mismo color</strong><p>Guardar y Borrador en azul, Procesar en verde, Cancelar y Eliminar en rojo, todas las autorizaciones en amarillo, Imprimir y Regresar en gris. Los mismos colores en todos los módulos.</p></div></li>
                    <li><div><strong>Siempre en el mismo orden</strong><p>De izquierda a derecha, por relevancia: primero guardar, luego las acciones, las cancelaciones y las autorizaciones. Al extremo derecho van Enviar, Información y Regresar.</p></div></li>
                    <li><div><strong>Sin menús escondidos</strong><p>Todos los botones están a la vista, uno por uno, rellenos y con su ícono. Ya no hay botones de solo contorno ni menús «Más».</p></div></li>
                    <li><div><strong>Mejor en el celular</strong><p>En pantallas chicas los botones muestran solo su ícono para que quepan, y la acción principal conserva su texto.</p></div></li>
                    <li><div><strong>El botón de correo, más corto</strong><p>Ahora se llama simplemente Enviar.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.1.0</span>
                    <span class="disc__t">Envía la ficha de un controlador por correo</span>
                    <span class="disc__d">15 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>De la ficha al correo</strong><p>Con el botón Enviar mandas la ficha de un controlador: sus puertos, comandos y conexiones recientes. El PDF va como archivo adjunto.</p></div></li>
                    <li><div><strong>Revisas antes de enviar</strong><p>Una ventana te deja escribir los destinatarios, ajustar el asunto y el mensaje, y elegir qué secciones incluye el PDF.</p></div></li>
                    <li><div><strong>Con el nombre de tu empresa</strong><p>El correo sale a nombre de tu empresa, con tu firma y tu pie. Las respuestas llegan al correo que elijas.</p></div></li>
                    <li><div><strong>Con tu propio servidor de correo</strong><p>Si lo prefieres, configura el servidor de correo de tu empresa para que los envíos salgan desde tu dominio y sin el límite de uso justo.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.0.3</span>
                    <span class="disc__t">Formularios más claros, con ícono en cada campo</span>
                    <span class="disc__d">14 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Un ícono en cada campo</strong><p>Cada dato que capturas lleva su ícono al lado izquierdo, para reconocer de un vistazo qué se pide.</p></div></li>
                    <li><div><strong>Nombre y campo en la misma línea</strong><p>El nombre del campo queda a la izquierda y el campo a su derecha, en todos los formularios y ventanas.</p></div></li>
                    <li><div><strong>Tarjetas con título e ícono</strong><p>Cada bloque de una pantalla se identifica con su ícono y su título.</p></div></li>
                    <li><div><strong>Configuración y datos para facturar con el mismo orden</strong><p>Las pantallas de Configuración, suscripción y datos para facturar siguen el mismo acomodo que el resto del sistema.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.0.2</span>
                    <span class="disc__t">Ficha del controlador en PDF</span>
                    <span class="disc__d">14 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Un documento por controlador</strong><p>Su estado en línea, firmware, última conexión y tiempo de funcionamiento, con el estado de cada puerto y el equipo que alimenta.</p></div></li>
                    <li><div><strong>Comandos, conexiones y notas</strong><p>Si quieres, también sus últimos comandos de energía, sus últimas conexiones y las notas del controlador. No incluye las credenciales del dispositivo.</p></div></li>
                    <li><div><strong>Tú eliges qué incluye</strong><p>El botón Imprimir, en la ficha del controlador, abre una ventana donde marcas las secciones y ves cuántos elementos tiene cada una. Recuerda tu última elección.</p></div></li>
                    <li><div><strong>Se ve sin salir de la pantalla</strong><p>El PDF se abre en una ventana, con la opción de descargarlo. Arriba lleva el logo y el nombre de tu empresa; SysPower aparece solo como un crédito discreto al pie.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.0.1</span>
                    <span class="disc__t">Una cuenta, un usuario y un controlador</span>
                    <span class="disc__d">13 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Cada cuenta incluye su controlador</strong><p>Una cuenta corresponde a una empresa, un usuario y un controlador. Cada controlador nuevo es una cuenta nueva.</p></div></li>
                    <li><div><strong>Sin roles ni módulo de usuarios</strong><p>El usuario de la cuenta tiene todos los permisos, así que no hay nada que configurar.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v2.0.0</span>
                    <span class="disc__t">Panel renovado, estado en vivo, avisos y notas en cada controlador</span>
                    <span class="disc__d">12 oct 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Panel renovado de punta a punta</strong><p>El encabezado, el menú y el pie se quedan fijos mientras trabajas, y el panel se usa igual de cómodo en el celular que en la computadora. Tema claro, oscuro o automático, 20 colores de énfasis y un modo compacto.</p></div></li>
                    <li><div><strong>Estado en vivo</strong><p>Todos tus controladores en una sola pantalla: si están en línea, cuándo reportaron por última vez y cómo está cada puerto. Se actualiza sola cada 10 segundos y los que están fuera de línea salen primero.</p></div></li>
                    <li><div><strong>Avisos en la campana, los que tú elijas</strong><p>Te avisa cuando un controlador se desconecta o vuelve, cuando alguien apaga, enciende o reinicia un equipo y cuando dejan una nota. Un interruptor por tipo de aviso decide cuáles recibes.</p></div></li>
                    <li><div><strong>Notas en cada controlador</strong><p>Qué equipo alimenta cada puerto o qué se hizo en la última visita queda escrito en el propio controlador, como una conversación. Se envía con Enter.</p></div></li>
                    <li><div><strong>La ficha del controlador, completa</strong><p>Sus puertos con el estado ordenado y el real, botones de energía que solo se habilitan cuando tienen sentido, su conexión y su historial en línea de tiempo. Se imprime como documento.</p></div></li>
                    <li><div><strong>Un dashboard que dice qué atender</strong><p>Controladores en línea y fuera de línea, acciones de energía del día, equipos encendidos y la actividad reciente, cada uno con su acceso directo.</p></div></li>
                    <li><div><strong>Búsqueda en todo el panel</strong><p>Escribe un controlador, el nombre de un equipo o un usuario en la barra de arriba, desde cualquier pantalla. Solo aparece lo que tú puedes abrir.</p></div></li>
                    <li><div><strong>Manual de usuario dentro del panel</strong><p>La ayuda se abre en la sección de la pantalla donde estás, desde el menú de tu nombre.</p></div></li>
                    <li><div><strong>Más seguridad</strong><p>Se reforzó la protección de las sesiones y de cada acción, y los permisos de cada rol se revisan en todas las pantallas.</p></div></li>
                    </ul>
                </div>
            </details>
            <details class="disc">
                <summary class="disc__sum">
                    <span class="disc__v">v1.0.0</span>
                    <span class="disc__t">Primera versión de SysPower</span>
                    <span class="disc__d">jun 2026</span>
                    <?= a_icon('chevron', 'disc__chev') ?>
                </summary>
                <div class="disc__body">
                    <ul>
                    <li><div><strong>Apaga, enciende y reinicia a distancia</strong><p>Desde el panel ordenas el cambio de un equipo del sitio, como un router, un DVR, un switch o un servidor.</p></div></li>
                    <li><div><strong>Un controlador por sitio</strong><p>Cada controlador tiene 5 puertos, y cada puerto alimenta un equipo. El controlador aplica la orden en su siguiente reporte.</p></div></li>
                    <li><div><strong>Alta con número de serie</strong><p>Registras tu controlador escribiendo su número de serie.</p></div></li>
                    <li><div><strong>Varias empresas</strong><p>Cada empresa ve solo sus controladores.</p></div></li>
                    </ul>
                </div>
            </details>

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
                    <li><a href="/terminos.html">Términos y condiciones</a></li>
                    <li><a href="/privacidad.html">Aviso de privacidad</a></li>
                    <li><a href="/cookies.html">Cookies</a></li>
                    <li><a href="/encargo-de-datos.html">Tratamiento de datos</a></li>
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
