<?php

function _s_include_archive_description() {

	if( !is_archive() ) {
		return false;
	}

	$archive_slug = _s_get_archive_slug();

	_s_get_template_part( 'components', "description-{$archive_slug}" );
}
add_action( '_s_before_loop', '_s_include_archive_description' );