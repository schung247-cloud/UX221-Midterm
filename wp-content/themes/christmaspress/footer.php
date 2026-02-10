<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package ChristmasPress
 * @since ChristmasPress 1.0
 */
?>

</div><!-- #main .site-main -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <?php do_action( 'christmaspress_credits' ); ?>
        <a href="https://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'christmaspress' ); ?>" rel="generator">
            <?php printf( __( 'Proudly powered by %s', 'christmaspress' ), 'WordPress' ); ?>
        </a>
        <span class="sep"> | </span>
        <?php
        printf(
            __( 'Theme: %1$s by %2$s.', 'christmaspress' ),
            'ChristmasPress',
            apply_filters(
                'christmaspress_credit',
                '<a href="https://christmaswebmaster.com/" rel="designer">ChristmasWebmaster</a>'
            )
        );
        ?>
    </div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->

</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>
