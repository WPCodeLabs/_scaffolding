<?php do_action( '_s_start' ); ?>

<?php get_header(); ?>

	<div id="primary" class="content-area">

		<?php do_action( '_s_before_container' ); ?>

		<div class="container">

			<?php do_action( '_s_before_main' ); ?>

			<main id="main" class="site-main">

				<?php do_action( '_s_loop' ); ?>

			</main>

			<?php do_action( '_s_after_main' ); ?>

			<?php get_sidebar(); ?>

		</div>

		<?php do_action( '_s_after_container' ); ?>

	</div>

<?php get_footer(); ?>

<?php do_action( '_s_end' ); ?>

