<?php

do_action( '_s_before_loop' );

if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		_s_get_template_part( 'content' );

	endwhile;

	the_posts_navigation();

elseif( is_404() ) :

	_s_get_template_part( 'content', '404' );

else :

	_s_get_template_part( 'content', 'none' );

endif;

do_action( '_s_after_loop' );
