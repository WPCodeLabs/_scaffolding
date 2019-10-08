<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-entry' ); ?>>

	<?php if( _s_is_fl_builder() == false ) : ?>

		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		</header>

	<?php endif; ?>

	<div class="entry-content">

		<?php _s_the_post_thumbnail( 'aligncenter' ); ?>

		<?php the_content(); ?>

	</div>

</article>

<?php do_action( '_s_comments' ); ?>