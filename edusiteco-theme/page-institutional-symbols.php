<?php

/**
 * Template Name: Símbolos Institucionales
 * Description: Plantilla para mostrar los símbolos institucionales del colegio
 */
?>

<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="relative h-[50vh] bg-cover bg-center flex items-center justify-center text-white"
        style="background-image: linear-gradient(rgba(51, 102, 204, 0.85), rgba(51, 102, 204, 0.9)), url('<?php echo esc_url(get_theme_mod('simbolos_hero_image', get_template_directory_uri() . '/assets/images/hero-simbolos.jpg')); ?>');">
        <div class="relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4"><?php the_title(); ?></h1>
            <p class="text-xl md:text-2xl opacity-90">
                <?php echo esc_html(get_theme_mod('simbolos_subtitle', 'Emblemas que nos identifican y nos unen como comunidad educativa')); ?>
            </p>
        </div>
    </section>

    <!-- Escudo Institucional -->
    <?php
    $o = get_option('info_colegio_settings');
    $escudo = isset($o['escudo']) ? $o['escudo'] : ['imagen' => '', 'titulo' => '', 'descripcion' => ''];
    ?>
    <section class="py-16 md:py-20 bg-white dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-12">

                <!-- Imagen del escudo -->
                <div class="lg:w-2/5 text-center">
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 shadow-lg flex justify-center items-center">
                        <?php if (!empty($escudo['imagen'])): ?>
                            <img
                                src="<?php echo esc_url($escudo['imagen']); ?>"
                                alt="<?php echo esc_attr($escudo['titulo'] ?: 'Escudo Institucional'); ?>"
                                class=" max-w-[320px] md:max-w-[400px] w-full h-auto mx-auto object-contain">
                        <?php else: ?>
                            <img
                                src="https://placehold.co/400x400/CCCCCF/4F494B?text=Escudo+Institucional"
                                alt="Escudo Institucional"
                                class="max-w-[320px] md:max-w-[400px] w-full h-auto mx-auto object-contain">
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Texto del escudo -->
                <div class="lg:w-3/5">
                    <div class="text-center lg:text-left">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-6">
                            <?php echo esc_html($escudo['titulo'] ?: 'Escudo Institucional'); ?>
                        </h2>

                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                                <?php
                                echo !empty($escudo['descripcion'])
                                    ? wp_kses_post($escudo['descripcion'])
                                    : 'Nuestro escudo representa la identidad y valores de la institución. Los colores azul y blanco simbolizan la sabiduría y la pureza. El libro abierto representa el conocimiento, la antorcha la luz del aprendizaje, y el laurel el éxito académico.';
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Bandera Institucional -->
    <?php
    $o = get_option('info_colegio_settings');
    $bandera = isset($o['bandera']) ? $o['bandera'] : ['imagen' => '', 'titulo' => '', 'descripcion' => ''];
    ?>
    <section class="py-16 md:py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                <div class="lg:w-2/5 text-center">
                    <div class="bg-white dark:bg-gray-900 rounded-2xl p-4 shadow-lg">
                        <?php if (!empty($bandera['imagen'])): ?>
                            <img
                                src="<?php echo esc_url($bandera['imagen']); ?>"
                                alt="<?php echo esc_attr($bandera['titulo'] ?: 'Bandera Institucional'); ?>"
                                class="w-80 h-64 mx-auto object-cover">
                        <?php else: ?>
                            <img
                                src="https://placehold.co/1200x600/cccccf/4f494b?text=Bandera+Institucional"
                                alt="Bandera Institucional"
                                class="w-80 h-64 mx-auto object-cover">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="lg:w-3/5">
                    <div class="text-center lg:text-left">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-6">
                            <?php echo esc_html($bandera['titulo'] ?: 'Bandera Institucional'); ?>
                        </h2>
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                                <?php echo !empty($bandera['descripcion'])
                                    ? wp_kses_post($bandera['descripcion'])
                                    : 'La bandera de nuestro colegio está compuesta por tres franjas horizontales: azul, blanco y verde. El azul representa la justicia y la verdad, el blanco simboliza la paz y la pureza de ideales, y el verde refleja la esperanza y el crecimiento.';
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Himno Institucional -->
    <?php
    $o = get_option('info_colegio_settings');

    $himno_letra = isset($o['himno']['letra']) && !empty($o['himno']['letra'])
        ? $o['himno']['letra']
        : "Coro:\n¡Oh [Nombre del colegio], faro de saber!\nDonde la juventud aprende a crecer.\nCon honor y valor, siempre hacia el ideal,\nFormando carácter con ética y moral.\n\nEstrofa I:\nEn tus aulas de luz, donde el estudio reina,\nSe forjan los pilares de una patria buena.\nCon esfuerzo y tesón, con amor y afán,\nCumpliendo con deber, el futuro alcanzar.\n\nEstrofa II:\nTus colores al viento, bandera de honor,\nInspiran en nosotros noble y gran valor.\nTus profesores guían con sabia dirección,\nSiembran en nuestras almas sana educación.";
    ?>
    <section class="py-16 md:py-20 bg-white dark:bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Encabezado -->
            <div class="text-center mb-12">
                <div class="w-20 h-20 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl text-blue-600 dark:text-blue-400">🎵</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    <?php echo esc_html(get_theme_mod('himno_title', 'Nuestro Himno')); ?>
                </h2>
            </div>

            <!-- Reproductor de Audio -->
            <?php if (get_theme_mod('himno_audio_url')): ?>
                <div class="bg-blue-50 dark:bg-blue-900/30 rounded-xl p-6 mb-8 shadow-md">
                    <div class="flex items-center justify-center space-x-4">
                        <audio
                            controls
                            class="w-full max-w-md"
                            aria-label="<?php echo esc_attr(get_theme_mod('himno_audio_label', 'Audio del Himno')); ?>">
                            <source src="<?php echo esc_url(get_theme_mod('himno_audio_url')); ?>" type="audio/mpeg">
                            <?php echo esc_html__('Tu navegador no soporta el elemento de audio.', 'edusiteco'); ?>
                        </audio>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Letra del Himno (adaptada a la antigua versión) -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-8 md:p-12 shadow-lg">
                <div class="prose dark:prose-invert max-w-none mx-auto">

                    <div class="text-center text-lg text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                        <?php echo nl2br(wp_kses_post($himno_letra)); ?>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- Lema Institucional -->
    <?php
    $o = get_option('info_colegio_settings');
    ?>
<section style="padding:4rem 0; background: linear-gradient(90deg,#2563eb 0%, #1e40af 100%); color:#fff;">
  <div style="max-width:64rem; margin:0 auto; padding:0 1rem; text-align:center;">

    <h2 style="font-size:1.875rem; font-weight:700; margin-bottom:2rem;">
      <?php echo esc_html($o['lema']['titulo'] ?? 'Nuestro Lema'); ?>
    </h2>

    <div style="
      background: rgba(255,255,255,0.12);
      -webkit-backdrop-filter: blur(8px);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255,255,255,0.18);
      border-radius:18px;
      padding:2rem 2.5rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.12);
      display: inline-block;
      width: 100%;
      max-width: 720px;
    ">
      <blockquote style="font-size:1.5rem; font-style:italic; margin:0 0 1.25rem; color: #ffffff;">
        "<?php echo esc_html($o['lema']['texto'] ?? 'Saber, Honor y Disciplina'); ?>"
      </blockquote>

      <div style="border-top:1px solid rgba(255,255,255,0.12); padding-top:1rem; margin-top:0.5rem;">
        <p style="font-size:1rem; color: rgba(255,255,255,0.92); margin:0 auto; max-width:60ch; line-height:1.6;">
          <?php echo wp_kses_post($o['lema']['explicacion'] ?? 'Nuestro lema representa los tres pilares...'); ?>
        </p>
      </div>
    </div>

  </div>
</section>

</main>

<?php get_footer(); ?>