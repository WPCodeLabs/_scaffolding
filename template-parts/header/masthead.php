<?php do_action( '_s_before_masthead' ); ?>

<?php _s_get_template_part( 'sidebar', 'before-header' ); ?>

<header id="masthead" class="site-header">

	<div class="masthead-inner">

		<div class="container">

			<?php _s_get_template_part( 'header', 'site-branding' ); ?>

			<?php _s_get_template_part( 'header', 'navbar' ); ?>

		</div>

	</div>

</header>

<?php do_action( '_s_after_masthead' ); ?>