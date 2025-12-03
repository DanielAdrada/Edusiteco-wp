<?php

if (!defined('ABSPATH'))
    exit;

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('accessibility-style', plugin_dir_url(__FILE__) . 'assets/css/accessibility.css');
    wp_enqueue_script('accessibility-script', plugin_dir_url(__FILE__) . 'assets/js/accessibility.js', ['jquery'], false, true);
});

add_action('wp_footer', function () { ?>
    <div id="accessibility-menu" class="accessibility-menu" role="region" aria-label="Menú de accesibilidad">
        <button id="accessibility-toggle" aria-label="Abrir menú de accesibilidad" role="button">♿</button>
        <div id="accessibility-panel" class="accessibility-panel" aria-hidden="true">
            <button class="acc-btn" id="increase-text" aria-label="Aumentar tamaño de texto" role="button">A+</button>
            <button class="acc-btn" id="decrease-text" aria-label="Disminuir tamaño de texto" role="button">A-</button>
            <button class="acc-btn" id="toggle-daltonic" aria-label="Modo daltónico" role="button">Modo Daltónico</button>
            <button class="acc-btn" id="toggle-gray" aria-label="Modo gris" role="button">Modo Gris</button>
            <button class="acc-btn" id="toggle-contrast" aria-label="Alto contraste" role="button">Contraste</button>
            <button class="acc-btn" id="toggle-talkback" aria-label="Activar TalkBack" role="button">🔊 TalkBack</button>
            <button id="increase-spacing" class="acc-btn">Aumentar espaciado</button>
            <button id="decrease-spacing" class="acc-btn">Disminuir espaciado</button>
            <button id="dyslexia-font" class="acc-btn">Fuente Disléxicos</button>
            <button id="sign-font" class="acc-btn">Fuente de Señas</button>
            <button id="big-cursor" class="acc-btn">Aumentar cursor</button>
            <button id="reading-line" class="acc-btn">Línea de lectura</button>
            <button id="highlight-links" class="acc-btn">Resaltar enlaces</button>
            <button id="relay-center" class="acc-btn">Centro de relevo</button>
            <button class="acc-btn reset-btn" id="reset-accessibility" aria-label="Restablecer ajustes" role="button">♻️
                Restablecer</button>

        </div>
    </div>
<?php });
