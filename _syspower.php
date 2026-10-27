<?php

define('ALKES_MAIL',    'soporte@alkes.mx');
define('ALKES_TEL',     '+523339460097');
define('ALKES_TEL_TXT', '333 946 0097');

require_once __DIR__ . '/_planes.php';

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
