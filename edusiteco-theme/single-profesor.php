<?php get_header(); ?>

<main id="primary" class="site-main">
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>

                <header class="entry-header mb-8 ">
                    <?php the_title('<h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-text-dark mb-4">', '</h1>'); ?>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        <span>Publicado el <?php echo get_the_date(); ?></span>
                    </div>
                </header>

                <?php if (has_post_thumbnail()): ?>
                    <div class="mb-10 flex justify-center">
                        <?php the_post_thumbnail('medium', ['class' => 'w-64 h-64 object-cover rounded-full shadow-lg']); ?>
                    </div>
                <?php endif; ?>

                <div class="prose dark:prose-invert lg:prose-xl max-w-none mx-auto text-text-light dark:text-text-dark">
                    <?php the_content(); ?>
                </div>
                <?php
                // Obtener el usuario asociado al profesor
                $teacher_user_id = get_post_meta(get_the_ID(), '_teacher_user_id', true);

                if ($teacher_user_id) :

                    $args = [
                        'post_type'      => 'comunicado',
                        'posts_per_page' => -1,
                        'post_status'    => 'publish',
                        'post__not_in' => [ get_the_ID() ],
                        'meta_query'     => [
                            [
                                'key'   => '_teacher_user_id',
                                'value' => $teacher_user_id,
                            ]
                        ],
                    ];

                    $teacher_posts = new WP_Query($args);

                    if ($teacher_posts->have_posts()) :
                ?>
                        <section class="mt-14 border-t border-gray-200 dark:border-gray-700 pt-8">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-text-dark mb-6">
                                Comunicados del profesor
                            </h2>

                            <ul class="space-y-4">
                                <?php while ($teacher_posts->have_posts()) : $teacher_posts->the_post(); ?>
                                    <li class="p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                        <a href="<?php the_permalink(); ?>" class="text-lg font-semibold text-brand-primary hover:underline">
                                            <?php the_title(); ?>
                                        </a>
                                        <p class="text-sm text-gray-500 mt-1">
                                            <?php echo get_the_date(); ?>
                                        </p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </section>
                <?php
                        wp_reset_postdata();
                    endif;
                endif;
                ?>

                <footer class="entry-footer mt-12">
                    <?php
                    $profesores_url = get_permalink(109); // Página Profesores real
                    ?>

                    <a
                        href="<?php echo esc_url($profesores_url); ?>"
                        class="group text-brand-primary hover:text-brand-secondary font-medium flex items-center gap-2 transition-colors">
                        <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform"
                            viewBox="0 0 24 24" fill="none">
                            <path d="M6 12H18M6 12L11 7M6 12L11 17"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                        <span class="group-hover:underline">Volver a Profesores</span>
                    </a>
                </footer>

        <?php endwhile;
        endif; ?>
    </article>

</main>

<?php get_footer(); ?>