<?php

/**
 * Template Name: Directorio Institucional
 */
get_header();
?>

<main class="site-main bg-gray-50 dark:bg-gray-900 transition-colors duration-300" role="main">
    <!-- Hero Section -->
    <section class="hero-directorio relative bg-gradient-to-r from-blue-900 to-blue-700 dark:from-blue-950 dark:to-blue-800 text-white py-20 px-4 overflow-hidden" aria-labelledby="directorio-title">
        <!-- Patrón decorativo SVG animado -->
        <div class="absolute inset-0 opacity-10" aria-hidden="true">
            <svg viewBox="0 0 1000 500" fill="currentColor" class="w-full h-full">
                <circle cx="200" cy="100" r="80" class="animate-float" />
                <circle cx="800" cy="150" r="120" class="animate-float animation-delay-1000" />
                <circle cx="400" cy="400" r="100" class="animate-float animation-delay-2000" />
            </svg>
        </div>

        <div class="relative z-10 max-w-6xl mx-auto text-center">
            <h1 id="directorio-title" class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate-fade-in-up font-plus-jakarta">
                Directorio Institucional
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto animate-fade-in-up animation-delay-200 font-plus-jakarta font-light">
                Conoce a las personas y áreas que hacen posible el funcionamiento de nuestra institución educativa.
            </p>
            <div class="animate-fade-in-up animation-delay-400">
                <a href="#equipo-directivo" class="scroll-button inline-flex items-center justify-center w-12 h-12 bg-white bg-opacity-20 rounded-full text-white hover:bg-opacity-30 transition-all duration-300 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-700" aria-label="Ir al equipo directivo">
                    <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Equipo Directivo -->
    <?php
    $o = get_option('info_colegio_settings');
    $directivos = $o['directivos'] ?? [];
    ?>

    <?php if (!empty($directivos)) : ?>
        <section id="equipo-directivo" class="py-16 px-4 bg-white dark:bg-gray-800 transition-colors duration-300">
            <div class="max-w-6xl mx-auto">

                <!-- Título -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                        Equipo Directivo
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto font-plus-jakarta">
                        Liderazgo comprometido con la excelencia educativa y el bienestar de nuestra comunidad
                    </p>
                </div>

                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <?php foreach ($directivos as $d) : ?>

                        <article class="bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up border border-gray-200 dark:border-gray-600">
                            <div class="p-6">

                                <div class="flex flex-col items-center text-center">

                                    <!-- FOTO o INICIALES -->
                                    <div class="w-24 h-24 rounded-full overflow-hidden flex items-center justify-center text-white text-xl font-bold mb-4 
                                        <?php echo !empty($d['foto']) ? 'bg-gray-300 dark:bg-gray-600' : 'bg-brand-primary-600 dark:bg-brand-primary-500'; ?>">

                                        <?php if (!empty($d['foto'])) : ?>
                                            <img src="<?php echo esc_url($d['foto']); ?>"
                                                alt="<?php echo esc_attr($d['nombre']); ?>"
                                                class="w-full h-full object-cover">
                                        <?php else : ?>
                                            <?php echo strtoupper(substr($d['nombre'] ?? 'ND', 0, 2)); ?>
                                        <?php endif; ?>
                                    </div>

                                    <!-- NOMBRE y CARGO -->
                                    <header class="mb-4">
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">
                                            <?php echo esc_html($d['nombre']); ?>
                                        </h3>

                                        <p class="text-brand-primary-600 dark:text-brand-primary-400 font-semibold font-plus-jakarta">
                                            <?php echo esc_html($d['cargo']); ?>
                                        </p>
                                    </header>

                                    <!-- DESCRIPCIÓN -->
                                    <?php if (!empty($d['descripcion'])) : ?>
                                        <div class="mb-6">
                                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                                                <?php echo esc_html($d['descripcion']); ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>

                                    <!-- CORREO / TELÉFONO -->
                                    <footer class="flex space-x-4">

                                        <?php if (!empty($d['correo'])) : ?>
                                            <a href="mailto:<?php echo esc_attr($d['correo']); ?>"
                                                class="w-10 h-10 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center 
                                              text-brand-primary-600 dark:text-brand-primary-400 
                                              hover:bg-brand-primary-600 dark:hover:bg-brand-primary-500 
                                              hover:text-white transition-all duration-300 transform hover:scale-110"
                                                aria-label="Enviar correo">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                </svg>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($d['telefono'])) : ?>
                                            <a href="tel:<?php echo esc_attr($d['telefono']); ?>"
                                                class="w-10 h-10 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center 
                                              text-brand-primary-600 dark:text-brand-primary-400 
                                              hover:bg-brand-primary-600 dark:hover:bg-brand-primary-500 
                                              hover:text-white transition-all duration-300 transform hover:scale-110"
                                                aria-label="Llamar">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                </svg>
                                            </a>
                                        <?php endif; ?>

                                    </footer>
                                </div>

                            </div>
                        </article>

                    <?php endforeach; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php
    $o = get_option('info_colegio_settings');
    $areas = $o['areas'] ?? [];
    ?>

    <?php if (!empty($areas)) : ?>
        <!-- Coordinaciones y Áreas -->
        <section class="coordinaciones-section bg-gray-50 dark:bg-gray-800 py-16 px-4 transition-colors duration-300" aria-labelledby="coordinaciones-title">
            <div class="max-w-6xl mx-auto">

                <!-- TÍTULO -->
                <div class="text-center mb-12">
                    <h2 id="coordinaciones-title" class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                        Coordinaciones y Áreas
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto font-plus-jakarta">
                        Especialistas dedicados al desarrollo integral de nuestros estudiantes
                    </p>
                </div>

                <!-- GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    <?php
                    $delay = 100;
                    foreach ($areas as $a) :
                    ?>

                        <article
                            class="group bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg 
                           transition-all duration-300 transform hover:-translate-y-1 
                           border-t-4 border-blue-600 dark:border-blue-500 hover:border-accent 
                           animate-fade-in-up"
                            style="animation-delay: <?php echo $delay; ?>ms">

                            <div class="p-6 text-center">

                                <!-- ÍCONO / FOTO / INICIALES -->
                                <div class="w-14 h-14 bg-gray-100 dark:bg-gray-600 rounded-full 
                                    flex items-center justify-center text-blue-600 
                                    dark:text-blue-400 mb-4 mx-auto 
                                    transition-all duration-300 
                                    group-hover:bg-blue-600 dark:group-hover:bg-blue-500 
                                    group-hover:text-white group-hover:rotate-12">

                                    <?php if (!empty($a['foto'])) : ?>
                                        <img src="<?php echo esc_url($a['foto']); ?>"
                                            alt="<?php echo esc_attr($a['nombre']); ?>"
                                            class="w-14 h-14 rounded-full object-cover">
                                    <?php else : ?>
                                        <span class="text-lg font-bold">
                                            <?php echo strtoupper(substr($a['nombre'] ?? 'ND', 0, 2)); ?>
                                        </span>
                                    <?php endif; ?>

                                </div>

                                <!-- NOMBRE DEL ÁREA -->
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">
                                    <?php echo esc_html($a['cargo']); ?>
                                </h3>

                                <!-- NOMBRE DEL COORDINADOR -->
                                <p class="text-gray-600 dark:text-gray-300 mb-3 font-plus-jakarta">
                                    <?php echo esc_html($a['nombre']); ?>
                                </p>

                                <!-- CORREO -->
                                <?php if (!empty($a['correo'])) : ?>
                                    <a href="mailto:<?php echo esc_attr($a['correo']); ?>"
                                        class="text-blue-600 dark:text-blue-400 font-medium 
                                      hover:text-blue-800 dark:hover:text-blue-300 
                                      transition-colors duration-300 font-plus-jakarta 
                                      focus:outline-none focus:underline">
                                        <?php echo esc_html($a['correo']); ?>
                                    </a>
                                <?php endif; ?>

                            </div>
                        </article>

                    <?php
                        $delay += 100;
                    endforeach;
                    ?>

                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- conatactos generales -->
    <?php
    $o = get_option('info_colegio_settings');
    $contactos = $o['contactos'] ?? [];
    ?>

    <?php if (!empty($contactos)) : ?>
        <section class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-700 py-16 px-4 transition-colors duration-300" aria-labelledby="contactos-generales-title">
            <div class="max-w-6xl mx-auto">

                <!-- Título -->
                <div class="text-center mb-12">
                    <h2 id="contactos-generales-title" class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                        Contactos Generales
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto font-plus-jakarta">
                        Estamos aquí para atenderte y resolver tus inquietudes
                    </p>
                </div>

                <!-- GRID -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">

                    <?php
                    $delay = 100;
                    foreach ($contactos as $c):
                        $titulo = esc_html($c['titulo'] ?? '');
                        $descripcion = esc_html($c['descripcion'] ?? '');
                        $valor_raw = $c['valor'] ?? '';
                        $valor = esc_html($valor_raw);
                        $display_val = esc_html($valor_raw);
                        $display_val = str_replace(
                            ['@', '.', '-', '_'],
                            ['@&#8203;', '.&#8203;', '-&#8203;', '_&#8203;'],
                            $display_val
                        );
                        $common_classes = 'block w-full max-w-full text-blue-600 dark:text-blue-400 font-medium hover:text-blue-800 dark:hover:text-blue-300 transition duration-300 font-plus-jakarta';
                        $wrap_style = 'style="word-break: break-word; word-break: break-all; overflow-wrap: anywhere; white-space: normal; hyphens:auto;"';

                        // Preparo icono + link HTML seguro y con wrapping forzado
                        if (filter_var($valor_raw, FILTER_VALIDATE_EMAIL)) {
                            $icono = '
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>';
                            $link_html = '<a href="mailto:' . esc_attr($valor_raw) . '" class="' . $common_classes . '" ' . $wrap_style . '>' . $display_val . '</a>';
                        } elseif (preg_match("/^\+?\d[\d\s\-]{6,}$/", $valor_raw)) {
                            $icono = '
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>';
                            $link_html = '<a href="tel:' . esc_attr($valor_raw) . '" class="block w-full max-w-full text-blue-600 dark:text-blue-400 font-medium hover:text-blue-800 dark:hover:text-blue-300 transition duration-300 font-plus-jakarta break-all whitespace-normal">' . esc_html($valor_raw) . '</a>';
                        } else {
                            $icono = '
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>';
                            $link_html = '<a href="https://maps.google.com/?q=' . urlencode($valor_raw) . '" target="_blank" rel="noopener" class="block w-full max-w-full text-blue-600 dark:text-blue-400 font-medium hover:text-blue-800 dark:hover:text-blue-300 transition duration-300 font-plus-jakarta break-all whitespace-normal">' . esc_html($valor_raw) . '</a>';
                        }
                    ?>

                        <!-- Tarjeta dinámica: añado min-w-0 y overflow-hidden para que el grid restrinja el ancho -->
                        <article class="min-w-0 overflow-hidden bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 animate-fade-in-up" style="animation-delay: <?= $delay ?>ms">
                            <div class="p-6 text-center group">

                                <!-- Icono -->
                                <div class="w-16 h-16 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 mb-4 mx-auto transition-all duration-300 group-hover:bg-blue-600 dark:group-hover:bg-blue-500 group-hover:text-white group-hover:scale-110">
                                    <?= $icono ?>
                                </div>

                                <!-- Título -->
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">
                                    <?= $titulo ?>
                                </h3>

                                <!-- Descripción -->
                                <p class="text-gray-600 dark:text-gray-300 mb-4 font-plus-jakarta">
                                    <?= $descripcion ?>
                                </p>

                                <!-- Enlace / valor (ahora con block + break-all) -->
                                <div class="mx-auto" style="max-width:100%;">
                                    <?= $link_html ?>
                                </div>
                            </div>
                        </article>

                    <?php
                        $delay += 100;
                    endforeach;
                    ?>

                </div>

                <!-- Botón final -->
                <div class="text-center mt-12 animate-fade-in-up" style="animation-delay: <?= $delay + 100 ?>ms">
                    <a href="/contacto" class="cta-button inline-flex items-center bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg font-plus-jakarta">
                        Contáctanos
                        <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

            </div>
        </section>
    <?php endif; ?>
    
    <script>
        // JavaScript para animaciones al hacer scroll
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer para animaciones al hacer scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observar elementos con animación
            const animatedElements = document.querySelectorAll('.animate-fade-in-up');
            animatedElements.forEach(function(el) {
                el.style.animationPlayState = 'paused';
                observer.observe(el);
            });

            // Smooth scroll para el botón del hero
            const scrollButton = document.querySelector('.scroll-button');
            if (scrollButton) {
                scrollButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector('#equipo-directivo');
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            }

            // Mejorar accesibilidad del teclado
            const focusableElements = document.querySelectorAll('a, button, [tabindex]:not([tabindex="-1"])');
            focusableElements.forEach(function(el) {
                el.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        this.click();
                    }
                });
            });
        });
    </script>

    <?php get_footer(); ?>