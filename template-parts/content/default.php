<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-entry' ); ?>>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header>

	<div class="entry-content">

		<?php the_content(); ?>

	</div>

</article>

<?php do_action( '_s_comments' ); ?>