<button class="menu-toggle" id="site-navigation-toggle" aria-controls="primary-menu" aria-expanded="false" data-triggers="#site-navigation"><span class="_s_icon _s_icon-menu"></span><span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'scaffolding' ); ?></span></button>

<nav id="site-navigation" class="main-navigation responsive">

	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'link_before' => '<span class="nav-text" itemprop="name">', 'link_after', '</span>' ) ); ?>

</nav>