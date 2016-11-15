<?php
/**
 * Loop Name: Left Aligned Medium
 *
 * @package siteorigin-unwind
 * @since siteorigin-unwind 0.9
 * @license GPL 2.0
 */

$post_class = siteorigin_setting( 'blog_search_fallback' ) ? 'has-fallback-image' : '';
?>

<?php
if ( have_posts() ) :

	if ( is_home() && ! is_front_page() ) : ?>
		<header>
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>
	<?php endif; ?>

	<div class="left-medium-loop">

	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
			<?php if ( has_post_thumbnail() || siteorigin_setting( 'blog_search_fallback' ) ) : ?>
				<div class="entry-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( '360x238-crop' ); ?>
						<?php elseif ( siteorigin_setting( 'blog_search_fallback' ) ) : ?>
							<?php echo wp_get_attachment_image( siteorigin_setting( 'blog_search_fallback' ), '360x238-crop', false, '' ); ?>
						<?php endif; ?>
					</a>
				</div>
			<?php endif; ?>

			<div class="entry-content">
				<header class="entry-header">
					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php siteorigin_unwind_post_meta(); ?>
						</div><!-- .entry-meta -->
					<?php
					endif; ?>

					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			</div>

		</article><!-- #post-## -->

	<?php endwhile; ?>

	</div><!-- .left-medium-loop -->

	<?php siteorigin_unwind_posts_navigation();

else :

	get_template_part( 'template-parts/content', 'none' );

endif; ?>
