<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-entry' ); ?>>

	<header class="entry-header">

		<div class="entry-info">

			<?php _s_category_info(); ?>

		</div>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php _s_posted_on( '' ); ?>

			<?php _s_posted_by( 'by' ); ?>

		</div>

	</header>

	<div class="entry-content">

		<?php _s_the_post_thumbnail( 'aligncenter' ); ?>

		<?php the_content(); ?>

	</div>

	<footer class="entry-footer">

		<?php _s_tag_info( '' ); ?>

		<?php _s_comment_info( '—' ); ?>

	</footer>

</article>

<?php _s_author_bio(); ?>

<?php do_action( '_s_after_entry' ); ?>

<?php do_action( '_s_comments' ); ?>
