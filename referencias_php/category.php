<?php
get_header();

?>

<main class="container-xxl">
    <h1 class="categoria"><?php the_category(', '); ?></h1>
    <div class="articulosHome">
        <div class="row mb-3 text-center grilla">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="col-md-4 themed-grid-col">
                        <h3 class="postmetadata"><?php the_category(', '); ?></h3>
                        <h2 class="tituloNota"><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
                        <?php
                        add_filter('the_author_posts_link', function ($link) {
                            return str_replace('rel="author"', 'rel="author" class="autor"', $link);
                        });
                        ?>
                        <p>Por <?php
                                if (function_exists('coauthors_posts_links')) {
                                    coauthors_posts_links();
                                } else {
                                    the_author_posts_link();
                                }
                                ?></p>
                    </article>
                <?php endwhile;
            else : ?>
                <!-- The very first "if" tested to see if there were any Posts to -->
                <!-- display.  This "else" part tells what do if there weren't any. -->
                <p><?php esc_html_e('No se encontraron artículos de esa categoría'); ?></p>

                <!-- REALLY stop The Loop. -->
            <?php endif; ?>
        </div>
    </div>
    <?php

    include 'footer.php';
    ?>