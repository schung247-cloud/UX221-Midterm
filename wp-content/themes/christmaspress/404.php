<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package ChristmasPress
 * @since ChristmasPress 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

        <article id="post-0" class="post error404 not-found">
            <header class="entry-header">
                <h1 class="entry-title">
                    <?php echo esc_html__( 'Oops! That page can’t be found.', 'christmaspress' ); ?>
                </h1>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <p>
                    <?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'christmaspress' ); ?>
                </p>

                <?php get_search_form(); ?>

                <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

                <div class="widget">
                    <h2 class="widgettitle">
                        <?php echo esc_html__( 'Most Used Categories', 'christmaspress' ); ?>
                    </h2>
                    <ul>
                        <?php
                        wp_list_categories( array(
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                            'show_count' => 1,
                            'title_li'   => '',
                            'number'     => 10,
                        ) );
                        ?>
                    </ul>
                </div><!-- .widget -->

                <?php
                /* translators: %1$s: smiley face */
                $archive_content = '<p>' . sprintf(
                    esc_html__( 'Try looking in the monthly archives. %1$s', 'christmaspress' ),
                    convert_smilies( ':)' )
                ) . '</p>';
                the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                ?>

                <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

            </div><!-- .entry-content -->
        </article><!-- .post .error404 -->

    </div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
