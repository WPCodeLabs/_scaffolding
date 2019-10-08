<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry archive-entry' ); ?>>

	<header class="entry-header">

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

	</header>

	<div class="entry-content">

		<?php _s_the_post_thumbnail( 'aligncenter' ); ?>

		<?php _s_blog_archive_content( 'excerpt' ); ?>

	</div>

</article>
