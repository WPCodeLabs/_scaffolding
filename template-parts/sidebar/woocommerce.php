<?php do_action( '_s_before_sidebar_primary' ); ?>

<?php if ( is_active_sidebar( 'sidebar-woocommerce' ) ) : ?>

	<aside id="secondary" class="widget-area">

		<div class="widget-wrapper sticky">

			<?php dynamic_sidebar( 'sidebar-woocommerce' ); ?>

		</div>

	</aside>

<?php endif; ?>

<?php do_action( '_s_after_sidebar_primary' ); ?>