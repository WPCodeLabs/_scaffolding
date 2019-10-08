<?php if ( is_active_sidebar( 'before_header' ) ) : ?>

	<aside id="before-header-widgets" class="widget-area">

		<?php dynamic_sidebar( 'before_header' ); ?>

	</aside>

<?php endif; ?>