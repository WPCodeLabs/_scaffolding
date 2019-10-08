<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-entry' ); ?>>

	<div class="entry-content">

		<?php the_content(); ?>

	</div>

</article>

<?php do_action( '_s_comments' ); ?>