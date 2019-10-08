<div class="author-box">
	<header class="author-header">
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 48 ); ?>
		</div>
		<div class="author-info">
			<h4 class="author-title"><?php printf( esc_html__( 'Published by %s', '_scaffolding' ), '<span class="author-name">' . get_the_author() . '</span>' ); ?></h4>
			<div class="author-social">
				social links
			</div>
		</div>
	</header>
	<div class="author-content">
		<?php echo apply_filters( '_s_the_content', get_the_author_meta( 'description' ) ); ?>
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php printf( esc_html__( 'View all posts by %s', 'jetpack' ), get_the_author() ); ?>
		</a>
	</div>
</div>