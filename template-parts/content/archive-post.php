<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry archive-entry' ); ?>>

	<header class="entry-header">

		<div class="entry-info">

			<?php _s_category_info(); ?>

		</div>

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<div class="entry-meta">

			<?php _s_posted_on( '' ); ?>

			<?php _s_posted_by( 'by' ); ?>

		</div>

	</header>

	<div class="entry-content">

		<?php _s_the_post_thumbnail( 'aligncenter' ); ?>

		<?php _s_blog_archive_content( 'excerpt' ); ?>

	</div>

	<footer class="entry-footer">

		<aside class="entry-meta">

			<?php _s_tag_info( 'Tags' ); ?>

			<?php _s_comment_info( '—' ); ?>

		</aside>

	</footer>

</article>
