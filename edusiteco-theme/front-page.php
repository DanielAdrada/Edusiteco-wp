<?php

/**
 * The main template file for the front page
 *
 * @package edusiteco
 */

get_header();
?>

<main id="primary" class="site-main">

	<!-- Hero Section - Carrusel -->
	<section class="hero-section relative bg-gray-100">
		<div class="swiper-container overflow-hidden">
			<div class="swiper-wrapper">
				<?php
				// Query para los comunicados destacados
				$comunicados_destacados = new WP_Query(array(
					'post_type' => 'comunicado',
					'posts_per_page' => 4,
					'meta_query' => array(
						array(
							'key' => '_es_destacado',
							'value' => '1',
							'compare' => '=',
						),
					),
				));

				if ($comunicados_destacados->have_posts()):
					while ($comunicados_destacados->have_posts()):
						$comunicados_destacados->the_post();
						$has_thumbnail = has_post_thumbnail();
						$background_style = '';
						if ($has_thumbnail) {
							$background_style = 'style="background-image: url(\'' . esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')) . '\')"';
						}
				?>
						<div class="swiper-slide relative">
							<div class="bg-cover bg-center h-96 lg:h-[600px] <?php echo !$has_thumbnail ? 'bg-gray-700' : ''; ?>"
								<?php echo $background_style; ?>>

								<?php if (!$has_thumbnail): ?>
									<div class="absolute inset-0 bg-gradient-custom bg-opacity-50"></div>
								<?php endif; ?>

								<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
									<div class="text-white max-w-2xl">
										<span
											class="<?php echo $has_thumbnail ? 'bg-brand-primary text-white' : 'bg-white text-brand-primary' ?> px-3 py-1 rounded-md text-sm font-bold mb-4 inline-block">Comunicado</span>
										<h2 class="text-4xl lg:text-6xl font-bold font-display mb-4 line-clamp-2">
											<?php the_title(); ?>
										</h2>
										<div class="text-xl lg:text-2xl mb-8 line-clamp-3">
											<?php the_excerpt(); ?>
										</div>
										<a href="<?php the_permalink(); ?>"
											class="bg-white hover:bg-gray-100 text-brand-primary px-8 py-3 rounded-lg font-semibold text-lg transition-colors inline-block">
											Leer más
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php
					endwhile;
					wp_reset_postdata();
				else:
					// Fallback: si no hay comunicados destacados, muestra un slide por defecto
					?>
					<div class="swiper-slide relative">
						<div class="bg-cover bg-center h-96 lg:h-[600px]"
							style="background-image: url('<?php echo get_theme_file_uri("assets/img/hero.jpg"); ?>')">
							<div class="absolute inset-0 bg-gradient-custom bg-opacity-40"></div>
							<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
								<div class="text-white max-w-2xl">
									<h1 class="text-4xl lg:text-6xl font-bold font-display mb-4">Bienvenidos a
										<?php echo get_bloginfo('name'); ?>
									</h1>
									<p class="text-xl lg:text-2xl mb-8">Formando líderes para el futuro con excelencia
										académica y valores</p>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<!-- Navigation -->
			<div class="swiper-button-next text-white mr-4"></div>
			<div class="swiper-button-prev text-white ml-4"></div>
			<div class="swiper-pagination"></div>
		</div>
	</section>

	<!-- Sección de Comunicados -->
	<section class="py-16 bg-background-light dark:bg-background-dark">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="text-center mb-12">
				<h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">
					Comunicados Recientes</h2>
				<p class="text-text-light dark:text-text-dark max-w-2xl mx-auto">Mantente informado sobre las
					últimas noticias y anuncios de nuestra institución</p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
				<?php
				// Query para los últimos 4 comunicados
				$comunicados = new WP_Query(array(
					'post_type' => 'comunicado',
					'posts_per_page' => 4,
				));

				if ($comunicados->have_posts()):
					while ($comunicados->have_posts()):
						$comunicados->the_post();
				?>
						<article
							class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-border-light dark:border-border-dark">
							<?php if (has_post_thumbnail()): ?>
								<div class="h-48 overflow-hidden">
									<img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>"
										class="w-full h-full object-cover" />
								</div>
							<?php else: ?>
								<div class="h-48 relative overflow-hidden">
									<!-- Fondo con SVG -->
									<div
										class="h-full bg-brand-primary text-white/10 transition-transform duration-500 group-hover:scale-105">
										<svg viewBox="0 0 1000 500" fill="currentColor" class="w-full h-full">
											<circle cx="200" cy="100" r="80" opacity="0.1" />
											<circle cx="800" cy="150" r="120" opacity="0.05" />
											<circle cx="400" cy="400" r="100" opacity="0.08" />
										</svg>
									</div>
									<!-- Texto superpuesto -->
									<div class="absolute inset-0 flex items-center justify-center p-4 text-white">
										<div class="text-center">
											<span class="block text-lg font-semibold">Comunicado</span>
											<span
												class="block text-sm opacity-80 uppercase font-bold"><?php echo get_bloginfo('name'); ?></span>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<div class="p-6">
								<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2 line-clamp-2">
									<a href="<?php the_permalink(); ?>" class="hover:text-brand-primary transition-colors">
										<?php the_title(); ?>
									</a>
								</h3>

								<div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
									<span class="material-icons text-xs mr-1">event</span>
									<time datetime="<?php echo get_the_date('c'); ?>">
										<?php echo get_the_date(); ?>
									</time>
								</div>

								<p class="text-text-light dark:text-text-dark text-sm line-clamp-3">
									<?php echo wp_trim_words(get_the_excerpt(), 15); ?>
								</p>

								<a href="<?php the_permalink(); ?>"
									class="inline-block mt-4 text-brand-primary hover:text-brand-secondary font-semibold text-sm transition-colors">
									Leer más →
								</a>
							</div>
						</article>
					<?php
					endwhile;
					wp_reset_postdata();
				else:
					?>
					<!-- Comunicados de ejemplo cuando no hay posts -->
					<?php for ($i = 1; $i <= 4; $i++): ?>
						<article
							class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-border-light dark:border-border-dark">
							<div class="h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
								<span class="text-gray-400 dark:text-gray-500 material-icons text-4xl">article</span>
							</div>
							<div class="p-6">
								<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2">
									Comunicado Importante <?php echo $i; ?>
								</h3>
								<div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
									<span class="material-icons text-xs mr-1">event</span>
									<time><?php echo date('j M Y'); ?></time>
								</div>
								<p class="text-text-light dark:text-text-dark text-sm">
									Información relevante sobre actividades y anuncios de la institución educativa.
								</p>
								<a href="#"
									class="inline-block mt-4 text-brand-primary hover:text-brand-secondary font-semibold text-sm transition-colors">
									Leer más →
								</a>
							</div>
						</article>
					<?php endfor; ?>
				<?php endif; ?>
			</div>

			<div class="text-center">
				<a href="<?php echo get_post_type_archive_link('comunicado'); ?>"
					class="bg-brand-primary hover:bg-brand-secondary text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
					Ver todos los comunicados
					<span class="material-icons ml-2">arrow_forward</span>
				</a>
			</div>
		</div>
	</section>

	<!-- Sección de Sedes -->
	<section id="campuses" class="py-16 bg-gray-50 dark:bg-gray-900">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="text-center mb-12">
				<h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">
					Nuestras Sedes</h2>
				<p class="text-lg text-text-light dark:text-text-dark max-w-2xl mx-auto">Conoce nuestras instalaciones y
					ubicaciones estratégicas</p>
			</div>

			<?php
			$o = get_option('info_colegio_settings');
			$sedes = isset($o['sedes']) && is_array($o['sedes']) ? $o['sedes'] : [];
			?>

			<section class="py-16 md:py-20 bg-gray-50 dark:bg-gray-900">
				<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

					<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
						<?php if (!empty($sedes)) : ?>
							<?php foreach ($sedes as $sede) : ?>
								<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark">

									<!-- Imagen de la sede -->
									<?php if (!empty($sede['imagen'])) : ?>
										<div class="h-48 overflow-hidden">
											<img src="<?php echo esc_url($sede['imagen']); ?>"
												alt="<?php echo esc_attr($sede['nombre']); ?>"
												class="w-full h-full object-cover">
										</div>
									<?php else : ?>
										<div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
											<span class="text-white material-icons text-6xl">school</span>
										</div>
									<?php endif; ?>

									<div class="p-6">
										<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">
											<?php echo esc_html($sede['nombre']); ?>
										</h3>

										<div class="space-y-2 text-sm text-text-light dark:text-text-dark">
											<?php if (!empty($sede['direccion'])) : ?>
												<div class="flex items-start">
													<span class="material-icons text-primary text-base mr-2 mt-0.5">location_on</span>
													<span><?php echo esc_html($sede['direccion']); ?></span>
												</div>
											<?php endif; ?>

											<?php if (!empty($sede['telefono'])) : ?>
												<div class="flex items-center">
													<span class="material-icons text-primary text-base mr-2">phone</span>
													<span><?php echo esc_html($sede['telefono']); ?></span>
												</div>
											<?php endif; ?>

											<?php if (!empty($sede['horario'])) : ?>
												<div class="flex items-center">
													<span class="material-icons text-primary text-base mr-2">schedule</span>
													<span><?php echo esc_html($sede['horario']); ?></span>
												</div>
											<?php endif; ?>
										</div>

									</div>
								</div>
							<?php endforeach; ?>
						<?php else : ?>
							<p class="text-center text-gray-600 dark:text-gray-400 col-span-3">
								No se han agregado sedes aún.
							</p>
						<?php endif; ?>
					</div>
				</div>
			</section>

			<?php
			$o = get_option('info_colegio_settings');
			?>

			<!-- =========================== -->
			<!-- SECCIÓN: NUESTRA INSTITUCIÓN -->
			<!-- =========================== -->
			<?php
			// Helper para obtener texto de historia (soporta string plano o array con campos)
			function obtener_historia_para_mostrar($o)
			{
				// caso 1: historia como string simple
				if (!empty($o['historia']) && is_string($o['historia'])) {
					return wp_trim_words(wp_kses_post($o['historia']), 60, '...');
				}

				// caso 2: historia como array con campos 'resumen','parrafo1','parrafo2'
				if (!empty($o['historia']) && is_array($o['historia'])) {
					// Si hay 'resumen' úsalo
					if (!empty($o['historia']['resumen'])) {
						return wp_kses_post($o['historia']['resumen']);
					}
					// Si hay parrafos, concatenarlos y recortar
					$text = '';
					if (!empty($o['historia']['parrafo1'])) $text .= $o['historia']['parrafo1'] . ' ';
					if (!empty($o['historia']['parrafo2'])) $text .= $o['historia']['parrafo2'] . ' ';
					if ($text !== '') return wp_trim_words(wp_kses_post($text), 60, '...');
				}

				// fallback: vacío
				return '';
			}
			// Obtener historia y valores normalizados
			$historia_text = obtener_historia_para_mostrar($o);
			$history_url = 'http://localhost:8881/?page_id=9';

			?>
			<!-- =========================== -->
			<!-- SECCIÓN: NUESTRA INSTITUCIÓN -->
			<!-- =========================== -->
			<section id="about" class="py-16 bg-background-light dark:bg-background-dark">
				<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

					<!-- Título principal -->
					<div class="text-center mb-12">
						<h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">
							<?php echo esc_html($o['institucion']['titulo'] ?? 'Nuestra Institución'); ?>
						</h2>
						<p class="text-lg text-text-light dark:text-text-dark max-w-2xl mx-auto">
							<?php echo esc_html($o['institucion']['subtitulo'] ?? 'Comprometidos con la excelencia educativa y la formación integral'); ?>
						</p>
					</div>

					<!-- Historia -->
					<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
						<div>
							<h3 class="text-2xl font-bold text-text-light dark:text-text-dark mb-6 font-display">
								Nuestra Historia
							</h3>

							<?php if (!empty($historia_text)): ?>
								<p class="text-lg italic text-primary mb-6 leading-relaxed">
									<?php echo $historia_text; ?>
								</p>
							<?php else: ?>
								<p class="text-text-light dark:text-text-dark mb-4 leading-relaxed">
									<?php echo 'Aún no se ha definido la historia institucional.'; ?>
								</p>
							<?php endif; ?>

							<?php
							// Si hay campos separados, mostrarlos debajo (parrafo1/parrafo2) sin duplicar si ya vinieron como string
							if (!empty($o['historia']) && is_array($o['historia'])):
								if (!empty($o['historia']['parrafo1'])): ?>
									<p class="text-text-light dark:text-text-dark mb-4 leading-relaxed">
										<?php echo wp_kses_post($o['historia']['parrafo1']); ?>
									</p>
								<?php endif;
								if (!empty($o['historia']['parrafo2'])): ?>
									<p class="text-text-light dark:text-text-dark leading-relaxed">
										<?php echo wp_kses_post($o['historia']['parrafo2']); ?>
									</p>
							<?php endif;
							endif;
							?>
							<!-- Enlace Leer más -->
							<a href="<?php echo esc_url($history_url); ?>"
								class="mt-6 inline-block text-brand-primary hover:text-brand-secondary hover:underline underline-offset-2 font-semibold transition-colors">
								Leer más ...
							</a>
						</div>

						<div class="bg-gray-200 dark:bg-gray-700 h-80 rounded-lg flex items-center justify-center overflow-hidden">
							<?php if (!empty($o['inicio']['imagen'])): ?>
								<img src="<?php echo esc_url($o['inicio']['imagen']); ?>"
									alt="Imagen Página de Inicio"
									class="object-cover w-full h-full">
							<?php else: ?>
								<span class="text-gray-400 dark:text-gray-500 material-icons text-6xl">
									image
								</span>
							<?php endif; ?>
						</div>
					</div>

					<!-- Misión / Visión / Valores -->
					<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

						<!-- Misión -->
						<div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-border-light dark:border-border-dark">
							<div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
								<!-- SVG de misión traído desde la página original -->
								<svg viewBox="0 0 24 24" class="w-10 h-10" fill="#3B82F6">
									<path d="M17 3H7A2 2 0 005 5v14a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2zm0 16H7V5h10v14zM9 7h6v2H9V7zm0 4h6v2H9v-2zm0 4h4v2H9v-2z" />
								</svg>
							</div>

							<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Misión</h3>

							<?php if (!empty($o['mision_resumen'])): ?>
								<p class="text-primary italic text-sm mb-3">
									<?php echo wp_kses_post($o['mision_resumen']); ?>
								</p>
							<?php endif; ?>

							<p class="text-text-light dark:text-text-dark text-sm leading-relaxed">
								<?php echo wp_kses_post($o['mision'] ?? 'Formar ciudadanos íntegros y competentes mediante una educación de calidad.'); ?>
							</p>
						</div>


						<!-- Visión -->
						<div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-border-light dark:border-border-dark">
							<div class="w-16 h-16 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center mx-auto mb-4">
								<!-- SVG de visión traído desde la página original -->
								<svg viewBox="0 0 24 24" class="w-10 h-10" fill="#E2BD38">
									<path d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 12a5 5 0 110-10 5 5 0 010 10zm0-8a3 3 0 100 6 3 3 0 000-6z" />
								</svg>
							</div>

							<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Visión</h3>

							<?php if (!empty($o['vision_resumen'])): ?>
								<p class="text-accent italic text-sm mb-3">
									<?php echo wp_kses_post($o['vision_resumen']); ?>
								</p>
							<?php endif; ?>

							<p class="text-text-light dark:text-text-dark text-sm leading-relaxed">
								<?php echo wp_kses_post($o['vision'] ?? 'Ser reconocidos como la institución educativa líder en innovación pedagógica y formación integral.'); ?>
							</p>
						</div>

						<!-- Valores -->
						<?php
						// Obtener opción
						$o = get_option('info_colegio_settings');
						$valores_raw = $o['valores'] ?? [];

						// Normalizar valores a array de títulos
						$valores_norm = [];

						if (!empty($valores_raw)) {
							if (is_array($valores_raw)) {
								$first = reset($valores_raw);
								if (is_string($first)) {
									foreach ($valores_raw as $v) {
										if (trim($v) !== '') {
											$valores_norm[] = $v;
										}
									}
								} else {
									foreach ($valores_raw as $item) {
										if (is_array($item)) {
											$titulo = $item['titulo'] ?? $item['title'] ?? $item['nombre'] ?? $item['nombre_valor'] ?? null;
											if (!$titulo) {
												foreach ($item as $k => $v) {
													if (is_string($v) && trim($v) !== '') {
														$titulo = $v;
														break;
													}
												}
											}
											if ($titulo) {
												$valores_norm[] = $titulo;
											}
										} elseif (is_string($item) && trim($item) !== '') {
											$valores_norm[] = $item;
										}
									}
								}
							}
						}

						// Si no hay valores definidos, usar valores por defecto
						if (empty($valores_norm)) {
							$valores_norm = ['Respeto', 'Responsabilidad', 'Honestidad', 'Excelencia'];
						}
						?>
						<!-- Valores -->
						<div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-border-light dark:border-border-dark">

							<div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
								<!-- Ícono SVG rojo tal como en la página original -->
								<svg viewBox="0 0 24 24" class="w-10 h-10" fill="#E11D48">
									<path d="M12 21s-6.716-4.935-9.657-9.172A5.985 5.985 0 016 3a5.982 5.982 0 016 3 5.982 5.982 0 016-3 5.985 5.985 0 013.657 8.828C18.716 16.065 12 21 12 21z" />
								</svg>
							</div>

							<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Valores</h3>

							<?php if (!empty($o['valores_resumen'])): ?>
								<p class="text-green-600 italic text-sm mb-3">
									<?php echo wp_kses_post($o['valores_resumen']); ?>
								</p>
							<?php endif; ?>

							<ul class="text-text-light dark:text-text-dark text-sm space-y-2 text-left">
								<?php foreach ($valores_norm as $valor): ?>
									<li class="flex items-center">
										<span class="material-icons text-primary text-sm mr-2">check_circle</span>
										<?php echo esc_html($valor); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- Llamado a la acción -->
			<section class="py-16 bg-[hsl(var(--color-brand-primary))]">
				<?php
				$contact_page = get_page_by_path('contactanos');
				$contact_url = $contact_page ? get_permalink($contact_page->ID) : '#';
				?>
				<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
					<h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
						Únete a Nuestra Comunidad Educativa
					</h2>
					<p class="text-xl text-white mb-8 max-w-2xl mx-auto">
						Descubre todo lo que tenemos para ofrecer y forma parte de la familia institucional
					</p>
					<div class="flex flex-col sm:flex-row gap-4 justify-center">
						<a href="<?php echo esc_url($contact_url); ?>"
							class="bg-white text-[hsl(var(--color-brand-primary))] px-8 py-3 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
							Contactanos
						</a>
						<a href="<?php echo get_post_type_archive_link('comunicado'); ?>"
							class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-white hover:text-[hsl(var(--color-brand-primary))] transition-all duration-300 transform hover:scale-105">
							Ver Últimas Noticias
						</a>
					</div>
				</div>
			</section>

</main><!-- #main -->

<?php
get_footer();
