<?php

function _s_posted_on( $prefix = '' ) {

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated screen-reader-text" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<span class="posted-on">';

	if( !empty( $prefix ) ) {

		printf( '<span class="meta-label">' . esc_html__( '%1$s', '_scaffolding' ) . ' </span>', $prefix );

	}

	printf(
		esc_html_x( '%s', 'post date', '_scaffolding' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '</span>'; // WPCS: XSS OK.
}

/**
 * Prints HTML with meta information for the current author.
 */
function _s_posted_by( $prefix = '' ) {

	/**
	 * Check for jetpack content options
	 */
	// if( get_theme_support( 'jetpack-content-options' ) && get_option( 'jetpack_content_post_details_author' ) === '' ) {
	// 	return false;
	// }

	echo '<span class="byline">';

	if( !empty( $prefix ) ) {

		printf( '<span class="meta-label">' . esc_html__( '%1$s', '_scaffolding' ) . ' </span>', $prefix );

	}

	printf(
		esc_html_x( '%s', 'post author', '_scaffolding' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '</span>';
}

function _s_category_info( $prefix = '' ) {

	if ( get_post_type() === 'post' ) {

		$categories_list = get_the_category_list( '' );

		if ( $categories_list ) {

			echo '<div class="entry-categories">';

				if( !empty( $prefix ) ) {

					printf( '<span class="meta-label">' . esc_html__( '%1$s', '_scaffolding' ) . ' </span>', $prefix );

				}

				echo $categories_list;

			echo '</div>';

		}
	}
}

function _s_tag_info( $prefix = '' ) {

	if ( get_post_type() === 'post' ) {

		$tags_list = get_the_tag_list( '<ul class="tags-list"><li>','</li><li>','</li></ul>' );

		if ( $tags_list ) {

			echo '<div class="entry-tags">';

				if( !empty( $prefix ) ) {

					printf( '<span class="meta-label">' . esc_html__( '%1$s', '_scaffolding' ) . ' </span>', $prefix );

				}

				echo $tags_list;

			echo '</div>';

		}
	}
}
function _s_comment_info( $prefix = '' ) {
	if ( ( comments_open() || get_comments_number() ) ) {

		echo '<span class="comments-link">';

		if( !empty( $prefix ) ) {

			printf( '<span class="meta-label">' . esc_html__( '%1$s', '_scaffolding' ) . ' </span>', $prefix );

		}

		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', '_scaffolding' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}
}

function _s_the_post_thumbnail( $class='', $size = 'post-thumbnail', $echo = true ) {
	/**
	 * Attempt to get the thumbnail
	 * @var [type]
	 */
	$thumbnail = get_the_post_thumbnail(
		false,
		$size,
		array(
			'alt' => the_title_attribute( array( 'echo' => false ) ),
			'class' => $class,
		)
	);
	// $thumbnail = '';
	/**
	 * Get the view for context
	 */
	$view = _s_get_view();
	/**
	 * If no thumbnail is set, allow filters to set a default ID
	 */
	if( !$thumbnail && $view === 'archive' ) {

		$default = get_theme_support( 'default-post-thumbnail' );

		$default = is_array( $default ) ? $default[0] : false;

		$default = apply_filters( '_s_default_thumbnail', $default );

		if( $default ) {

			$args = array(
				'image' => '',
				'width' => '',
				'height' => '',
			);

			$args = is_array( $default ) ? wp_parse_args( $default, $args ) : $args;
			/**
			 * If we're passed an ID
			 */
			if( intval( $args['image'] ) ) {
				$thumbnail = wp_get_attachment_image(
					$default,
					$size,
					array(
						'alt' => the_title_attribute( array( 'echo' => false ) ),
						'class' => $class,
					)
				);
			}
			/**
			 * If we're passed a string (url)
			 */
			else {
				printf( '<a class="post-thumbnail" href="%s" aria-hidden="true" tabindex="-1"><img src="%s" alt="%s"%s%s%s></a>',
					get_the_permalink(),
					esc_url_raw( $args['image'] ),
					the_title_attribute( array( 'echo' => false ) ),
					!empty( $args['width'] ) ? ' width="' . intval( $args['width'] ) . 'px"' : '',
					!empty( $args['height'] ) ? ' height="' . intval( $args['height'] ) . 'px"' : '',
					!empty( $class ) ? ' class="' . esc_attr( $class ) . '"' : '',
				);
			}
		}

	}
	/**
	 * Maybe output the thumbnail
	 */
	if( $thumbnail ) {

		if( $echo === false ) {
			return $thumbnail;
		}

		else {
			if( $view !== 'single' ) {
				printf( '<a class="post-thumbnail" href="%s" aria-hidden="true" tabindex="-1">%s</a>', get_the_permalink(), $thumbnail );
			}
			/**
			 * We have to double check has_post thumbnail on single views for
			 * avoiding double images when jetpack default thumbnails is enabled
			 */
			else if( has_post_thumbnail() ) {
				printf( '<span class="post-thumbnail">%s</span>', $thumbnail );
			}
		}
	}
}

/**
 * Change content options based on default + jetpack content options
 */
function _s_blog_archive_content( $content = 'content' ) {
	/**
	 * See if we're using jetpack content options
	 */
	if( get_theme_support( 'jetpack-content-options' ) ) {
		$content = get_option( 'jetpack_content_blog_display' );
	}
	/**
	 * Do the appripriate function
	 */
	switch ( $content ) {
		case 'excerpt':
			the_excerpt();
			break;
		default:
			the_content();
			break;
	}
}

function _s_breadcrumbs() {
	if ( function_exists('yoast_breadcrumb') ) {
		echo '<div class="breadcrumb-container">';
			echo '<div class="container">';
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			echo '</div>';
		echo '</div>';
	}
}

function _s_author_bio() {
	/**
	 * Check if we are using jetpack content options, and the option is true
	 */
	if( get_theme_support( 'jetpack-content-options' ) ) {
		if( get_option( 'jetpack_content_author_bio' ) !== '' ) {
			_s_get_template_part( 'components', 'author-box' );
		}
	}
	/**
	 * Do default author box
	 */
	else {
		_s_get_template_part( 'components', 'author-box' );
	}
}

/**
 * Custom content to do similar to 'the_content' but without inteference from
 * other plugins
 */
function _s_the_content( $content ) {
	echo apply_filters( '_s_the_content', $content );
}
add_filter( '_s_the_content', 'wptexturize'        );
add_filter( '_s_the_content', 'convert_smilies'    );
add_filter( '_s_the_content', 'convert_chars'      );
add_filter( '_s_the_content', 'wpautop'            );
add_filter( '_s_the_content', 'shortcode_unautop'  );
add_filter( '_s_the_content', 'prepend_attachment' );