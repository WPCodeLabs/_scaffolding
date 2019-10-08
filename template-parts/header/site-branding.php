<div class="site-branding">

	<?php the_custom_logo(); ?>

	<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

	<?php $_s_description = get_bloginfo( 'description', 'display' ); ?>

	<?php if( $_s_description ) : ?>

		<p class="site-description"><?php echo $_s_description; /* WPCS: xss ok. */ ?></p>

	<?php endif; ?>

</div>