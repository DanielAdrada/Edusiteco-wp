<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edusiteco
 */

?>
<?php $o = get_option('info_colegio_settings'); ?>
</div>
<!-- #content -->

<footer id="colophon"
	class="site-footer bg-background-light dark:bg-background-dark border-t border-border-light dark:border-border-dark">

	<!-- Sección Principal - 4 Columnas -->
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-6">

			<!-- Columna 1 - Logos Institucionales -->
			<div class="flex flex-col items-center space-y-4">
				<!-- Logo Ministerio de Educación (Parte superior - más grande) -->
				<a href="https://www.mineducacion.gov.co" target="_blank" rel="noopener noreferrer" class="block mb-2">
					<img class="h-20 w-auto object-contain"
						src="<?php echo get_theme_file_uri("assets/img/Logo_Ministerio_de_Educación.png") ?>"
						alt="Logo Ministerio de Educación de Colombia"
						title="Logo Ministerio de Educación de Colombia" />
				</a>

				<!-- Base de la pirámide - Logos más pequeños alineados horizontalmente -->
				<div class="flex items-center justify-center space-x-6 mt-2">
					<!-- Logo Marca Colombia -->
					<a href="https://www.colombia.co" target="_blank" rel="noopener noreferrer" class="block">
						<img class="h-12 w-auto object-contain"
							src="<?php echo get_theme_file_uri("assets/img/Logo_Colombia.png") ?>" alt="Logo Colombia"
							title="Logo Colombia" />
					</a>

					<!-- Logo del Colegio -->
					<div class="flex items-center">
						<?php if (has_custom_logo()): ?>
							<div class="h-12 w-auto">
								<?php the_custom_logo(); ?>
							</div>
						<?php else: ?>
							<a href="<?php echo esc_url(home_url('/')); ?>" class="block">
								<img class="h-12 w-auto object-contain"
									src="<?php echo get_theme_file_uri("assets/img/logoipsum.png") ?>"
									alt="<?php echo "Logo " . esc_attr(get_bloginfo('name')); ?>" />
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<!-- Columna 2 - Información Institucional -->
			<div class="lg:pl-4">
				<h3 class="text-lg font-semibold text-text-light dark:text-text-dark mb-4 font-display uppercase">
					<?php echo esc_html(get_bloginfo('name')); ?>
				</h3>

				<p class="text-text-light dark:text-text-dark text-sm leading-relaxed mb-4">
					<?php
					$description = get_bloginfo('description', 'display');
					if ($description) {
						echo esc_html($description);
					} else {
						echo 'Institución Educativa comprometida con la formación integral de nuestros estudiantes, promoviendo la excelencia académica y los valores ciudadanos.';
					}
					?>
				</p>

				<!-- Redes Sociales -->
                <div class="flex flex-wrap gap-4 mt-6">
                    <?php if (!empty($o['facebook'])): ?>
                        <a href="<?php echo esc_url($o['facebook']); ?>" target="_blank" class="group" aria-label="Facebook">
                            <img class="w-8 h-8 transition-transform duration-300 group-hover:scale-110"
                                 src="<?php echo get_theme_file_uri('assets/svg/facebook.svg'); ?>" alt="Facebook" />
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($o['instagram'])): ?>
                        <a href="<?php echo esc_url($o['instagram']); ?>" target="_blank" class="group" aria-label="Instagram">
                            <img class="w-8 h-8 transition-transform duration-300 group-hover:scale-110"
                                 src="<?php echo get_theme_file_uri('assets/svg/instagram.svg'); ?>" alt="Instagram" />
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($o['twitter'])): ?>
                        <a href="<?php echo esc_url($o['twitter']); ?>" target="_blank" class="group" aria-label="Twitter">
                            <img class="w-8 h-8 transition-transform duration-300 group-hover:scale-110"
                                 src="<?php echo get_theme_file_uri('assets/svg/twitter.svg'); ?>" alt="Twitter" />
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($o['youtube'])): ?>
                        <a href="<?php echo esc_url($o['youtube']); ?>" target="_blank" class="group" aria-label="YouTube">
                            <img class="w-8 h-8 transition-transform duration-300 group-hover:scale-110"
                                 src="<?php echo get_theme_file_uri('assets/svg/youtube.svg'); ?>" alt="YouTube" />
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($o['tiktok'])): ?>
                        <a href="<?php echo esc_url($o['tiktok']); ?>" target="_blank" class="group" aria-label="TikTok">
                            <img class="w-8 h-8 transition-transform duration-300 group-hover:scale-110"
                                 src="<?php echo get_theme_file_uri('assets/svg/tik-tok.svg'); ?>" alt="TikTok" />
                        </a>
                    <?php endif; ?>
                </div>
            </div> 

			<?php
			$o = get_option('info_colegio_settings');
			$c = $o['contacto'] ?? [];
			?>

			<!-- COLUMNA 3 - Contacto -->
			<div class="lg:pl-4">
				<h3 class="text-lg font-semibold text-text-light dark:text-text-dark mb-4 font-display uppercase">Contacto</h3>
				<div class="space-y-3 text-base text-text-light dark:text-text-dark">

					<!-- Dirección -->
					<div class="flex items-start">
						<span class="material-icons text-primary text-lg mr-2 mt-0.5">location_on</span>
						<span>
							<?php echo esc_html($c['direccion'] ?? ''); ?><br>
							<?php echo esc_html($c['barrio'] ?? ''); ?><br>
							<?php echo esc_html($c['ciudad'] ?? ''); ?>
						</span>
					</div>

					<!-- Teléfono -->
					<div class="flex items-center">
						<span class="material-icons text-primary text-lg mr-2">phone</span>
						<span><?php echo esc_html($c['telefono'] ?? ''); ?></span>
					</div>

					<!-- Correo -->
					<div class="flex items-center">
						<span class="material-icons text-primary text-base mr-2">email</span>
						<span class="footer-contact-email">
							<?php echo esc_html($c['correo'] ?? ''); ?>
						</span>
					</div>

					<!-- Horario -->
					<div class="flex items-start">
						<span class="material-icons text-primary text-base mr-2 mt-0.5">schedule</span>
						<span><?php echo esc_html($c['horario'] ?? ''); ?></span>
					</div>
				</div>
			</div>

			<!-- Columna 4 - Enlaces de Interés -->
			<div class="lg:pl-4">
				<h3 class="text-lg font-semibold text-text-light dark:text-text-dark mb-4 font-display uppercase">
					Enlaces de Interés</h3>

				<ul class="space-y-2 text-base">
					<li>
						<a href="#"
							class="text-text-light dark:text-text-dark hover:text-brand-primary transition-colors hover:underline underline-offset-2">
							Política de Tratamiento de Datos
						</a>
					</li>
					<li>
						<a href="#"
							class="text-text-light dark:text-text-dark hover:text-brand-primary transition-colors hover:underline underline-offset-2">
							Mapa del Sitio
						</a>
					</li>
					<li>
						<a href="#"
							class="text-text-light dark:text-text-dark hover:text-brand-primary transition-colors hover:underline underline-offset-2">
							PQRS
						</a>
					</li>
					<li>
						<a href="#"
							class="text-text-light dark:text-text-dark hover:text-brand-primary transition-colors hover:underline underline-offset-2">
							Portal de Transparencia
						</a>
					</li>
					<li>
						<a href="#"
							class="text-text-light dark:text-text-dark hover:text-brand-primary transition-colors hover:underline underline-offset-2">
							Accesibilidad
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Sección Legal -->
	<div class="border-t border-border-light dark:border-border-dark py-6">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
				<!-- Copyright -->
				<div class="text-sm text-text-light dark:text-text-dark">
					&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"
						class="uppercase dark:text-text-dark font-bold hover:text-brand-primary hover:underline underline-offset-1"><?php echo esc_html(get_bloginfo('name')); ?>
					</a>. Todos los derechos reservados.
				</div>

				<!-- Enlaces Legales -->
				<div class="flex flex-wrap justify-center md:justify-end space-x-6 text-sm">
					<p>
						Desarrollado por:
						<a href="https://fup.edu.co/facultad/facultad-de-ingenieria-y-arquitectura/"
							target="_blank"
							class="text-brand-primary dark:text-text-dark hover:text-brand-primary transition-colors hover:underline">
							Facultad de Ingeniería - FUP
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Barra Inferior - GOV.CO -->
	<div class="bg-gov-top py-3">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex justify-center">
				<a href="https://www.gov.co" target="_blank" rel="noopener noreferrer" class="flex items-center">
					<img class="h-6 w-auto" src="<?php echo get_theme_file_uri("assets/img/govco.png") ?>"
						alt="Portal Gobierno de Colombia" />
				</a>
			</div>
		</div>
	</div>
</footer>
<!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>