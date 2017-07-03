<?php
/**
 * Template part for displaying grid posts
 *
 * @package siteorigin-unwind
 * @since siteorigin-unwind 1.1 
 * @license GPL 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-entry' ); ?>>

	<?php if ( has_post_thumbnail() && siteorigin_setting( 'blog_featured_archive' ) ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'aligncenter' ) ); ?>
			</a>
			<div class="entry-cats">
				<?php the_category( ' ' ); ?>
			</div>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php siteorigin_unwind_post_meta( false ); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( siteorigin_setting( 'blog_archive_content' ) == 'excerpt' ) the_excerpt();
			else the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'siteorigin-unwind' ) . '</span>',
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

</article>
