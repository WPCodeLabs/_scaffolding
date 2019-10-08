<?php do_action( '_s_before_sidebar_primary' ); ?>

<?php if ( is_active_sidebar( 'sidebar-primary' ) ) : ?>

	<aside id="secondary" class="widget-area stickysidebar" data-sticky-element=".widget-wrapper">

		<div class="widget-wrapper">

			<?php dynamic_sidebar( 'sidebar-primary' ); ?>

		</div>

	</aside>

<?php endif; ?>

<?php do_action( '_s_after_sidebar_primary' ); ?>