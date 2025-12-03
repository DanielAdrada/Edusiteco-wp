<?php
/*
Plugin Name: Edusiteco
Description: Permite configurar y mostrar en el footer la información institucional del colegio (incluye redes sociales y enlaces de interés).
Version: 2.0
Author: Daniel Adrada
*/

if (!defined('ABSPATH')) exit;

// Registrar menú en el admin
add_action('admin_menu', function () {
    add_menu_page(
        'Edusiteco',
        'Edusiteco',
        'manage_options',
        'info-colegio',
        'edusiteco_router',
        'dashicons-welcome-learn-more',
        20
    );

    // Submenú de Bienvenida
    add_submenu_page(
        'info-colegio',
        'Bienvenida',
        'Bienvenida',
        'manage_options',
        'info-colegio-bienvenida',
        'edusiteco_welcome_screen'
    );
});

// Registrar opciones
add_action('admin_init', function () {
    register_setting('info_colegio_group', 'info_colegio_settings');
});

// Cargar scripts de medios
add_action('admin_enqueue_scripts', function ($hook) {
    if (strpos($hook, 'info-colegio') === false) return;

    wp_enqueue_media();
    wp_enqueue_script('jquery');
});

function edusiteco_router()
{
    if (!isset($_GET['setup'])) {
        edusiteco_welcome_screen(); // Bienvenida primero
    } else {
        edusiteco_admin_page(); // Luego las pestañas
    }
}

// Pantalla de bienvenida del plugin
function edusiteco_welcome_screen()
{
?>
    <div class="wrap">
        <h1 style="font-size:32px; font-weight:bold; margin-bottom:10px;">Bienvenido a Edusiteco</h1>

        <p style="font-size:16px; max-width:700px; color:#444; line-height:1.6;">
            Gracias por instalar el plugin <strong>Edusiteco</strong>.
            Este módulo permite gestionar toda la información institucional del colegio
            de forma organizada y visualmente profesional.
            Desde aquí podrás configurar:
        </p>

        <ul style="font-size:15px; color:#333; margin-left:20px; margin-bottom:20px; line-height:1.7;">
            <li>✔ La página de inicio institucional</li>
            <li>✔ Misión, visión y valores</li>
            <li>✔ Directorio de personal</li>
            <li>✔ Historia del colegio</li>
            <li>✔ Símbolos institucionales</li>
            <li>✔ Información de contacto</li>
            <li>✔ Footer y enlaces importantes</li>
        </ul>

        <p style="font-size:15px; color:#444; max-width:700px;">
            Para comenzar, haz clic en el siguiente botón y empieza a llenar la información del colegio.
        </p>

        <a href="<?php echo admin_url('admin.php?page=info-colegio&setup=true'); ?>"
            style="display:inline-block; margin-top:25px; background:#2271b1; color:white;
                  padding:12px 24px; border-radius:5px; font-size:16px; text-decoration:none;">
            👉 Gestionar Información Institucional
        </a>

        <style>
            .wrap {
                background: #fff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            }
        </style>
    </div>
<?php
}

// Renderizar la página del plugin
function edusiteco_admin_page()
{
    $o = get_option('info_colegio_settings');
?>
    <div class="wrap">
        <h1>Configuración de la Información del Colegio</h1>
        <p style="max-width:700px; font-size:14px; color:#555;">
            Desde esta sección puedes ingresar toda la información institucional del colegio dividida por categorías.
            Selecciona una pestaña para editar los datos correspondientes (misión, historia, docentes, símbolos, etc.).
        </p>
        <a href="<?php echo admin_url('admin.php?page=info-colegio-bienvenida'); ?>"
            style="display:inline-block; margin-top:25px; background:#2271b1; color:white;
                  padding:12px 24px; border-radius:5px; font-size:16px; text-decoration:none;">
            👈 Volver a la Bienvenida
        </a>

        <h2 class="nav-tab-wrapper">
            <a href="#tab-paginaInicio" class="nav-tab nav-tab-active">Pagina de Inicio</a>
            <a href="#tab-identidad" class="nav-tab">Misión, Visión y Valores</a>
            <a href="#tab-historia" class="nav-tab">Historia</a>
            <a href="#tab-directorio" class="nav-tab">Directorio</a>
            <a href="#tab-simbolosInstitucionales" class="nav-tab">Símbolos Institucionales</a>
            <a href="#tab-contactanos" class="nav-tab">Contactanos</a>
            <a href="#tab-footer" class="nav-tab">Footer</a>
        </h2>

        <form method="post" action="options.php">
            <?php settings_fields('info_colegio_group'); ?>

            <!-- ===== Secciones con pestañas ===== -->

            <div id="tab-paginaInicio" class="tab-content" style="display:block;">
                <?php include plugin_dir_path(__FILE__) . 'admin/seccion-paginaInicio.php'; ?>
            </div>

            <div id="tab-identidad" class="tab-content" style="display:none;">
                <?php include plugin_dir_path(__FILE__) . 'admin/seccion-identidad.php'; ?>
            </div>

            <div id="tab-directorio" class="tab-content" style="display:none;">
                <?php include plugin_dir_path(__FILE__) . 'admin/seccion-directorio.php'; ?>
            </div>

            <div id="tab-historia" class="tab-content" style="display:none;">
                <?php include plugin_dir_path(__FILE__) . 'admin/seccion-historia.php'; ?>
            </div>

            <div id="tab-simbolosInstitucionales" class="tab-content" style="display:none;">
                <?php include plugin_dir_path(__FILE__) . 'admin/seccion-simbolosInstitucionales.php'; ?>
            </div>

            <div id="tab-contactanos" class="tab-content" style="display:none;">
                <?php include plugin_dir_path(__FILE__) . 'admin/seccion-contactanos.php'; ?>
            </div>

            <div id="tab-footer" class="tab-content" style="display:none;">
                <?php include plugin_dir_path(__FILE__) . 'admin/seccion-footer.php'; ?>
            </div>

            <?php submit_button('Guardar cambios'); ?>
        </form>
    </div>

    <script>
        // ==== Cambiar entre pestañas ====
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.nav-tab');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', e => {
                    e.preventDefault();
                    // Quitar selección anterior
                    tabs.forEach(t => t.classList.remove('nav-tab-active'));
                    contents.forEach(c => c.style.display = 'none');

                    // Activar nueva pestaña
                    tab.classList.add('nav-tab-active');
                    const target = document.querySelector(tab.getAttribute('href'));
                    if (target) target.style.display = 'block';
                });
            });
        });
    </script>

    <style>
        .nav-tab-wrapper {
            margin-bottom: 0;
            border-bottom: 1px solid #ccc;
        }

        .nav-tab {
            font-weight: 500;
            transition: background-color 0.2s ease;
        }

        .nav-tab:hover {
            background: #f0f0f1;
        }

        .nav-tab-active {
            background: #fff;
            border-bottom: 1px solid #fff !important;
        }

        .tab-content {
            background: #fff;
            padding: 25px;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 6px 6px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            animation: fadeIn 0.2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

<?php
}

function edusiteco_remove_admin_footer()
{
    $screen = get_current_screen();

    if ($screen && $screen->id === 'toplevel_page_info-colegio') {
        add_filter('admin_footer_text', '__return_empty_string');
        add_filter('update_footer', '__return_empty_string');
    }
}
add_action('admin_head', 'edusiteco_remove_admin_footer');

// Incluir el módulo de accesibilidad
include_once plugin_dir_path(__FILE__) . 'admin/accesibilidad/wp-accessibility-plugin.php';
