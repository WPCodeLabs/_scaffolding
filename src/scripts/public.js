/**
 * Init nav focus
 *
 * Provides keyboard access to navigation items
 */
import navFocus from './include/nav-focus.js';
const _initNavFocus = () => {
	/**
	 * Get all of the buttons on the page
	 */
	let navs = document.getElementsByClassName( 'menu' );

	for( let i = 0; i < navs.length; i++ ) {
		new navFocus( navs[i] );
	}
};
document.addEventListener( 'DOMContentLoaded', _initNavFocus, false );
/**
 * Init Toggle Buttons
 *
 * Toggles elements such as hidden menus, submenus, etc
 */
import toggleButton from './include/toggle-button.js';
const _initButtons = () => {
	/**
	 * Get all of the buttons on the page
	 */
	let buttons = document.getElementsByClassName( 'menu-toggle' );

	for( let i = 0; i < buttons.length; i++ ) {
		new toggleButton( buttons[i] );
	}
	/**
	 * Sub menu toggle buttons
	 */
	let subbuttons = document.getElementsByClassName( 'sub-menu-toggle' );

	for( let i = 0; i < subbuttons.length; i++ ) {
		let submenu = subbuttons[i].closest( 'li' ).querySelector( '.sub-menu' );

		if( submenu ) {
			new toggleButton( subbuttons[i], { targets : submenu } );
		}

	}
};
document.addEventListener( 'DOMContentLoaded', _initButtons, false );

/**
 * Waypoints Scroll Toggle
 *
 * Toggle classes on/off an element based on scroll position
 */
import ScrollToggle from './include/scroll-toggle.js';
const _initWaypoints = () => {
	/**
	 * Elements to be triggerd
	 */
	let toggles = document.getElementsByClassName( 'scrolltoggle' );
	/**
	 * Init each
	 */
	for( let i = 0; i < toggles.length; i++ ) {
		new ScrollToggle( toggles[i] );
	}
}
document.addEventListener( 'DOMContentLoaded', _initWaypoints, false );
/**
 * Sticky Sidebar
 */
import StickySidebar from './include/sticky.js';
const _initStickySidebar = () => {
	/**
	 * Sidebars
	 * @type {[type]}
	 */
	let stickysidebars = document.getElementsByClassName( 'stickysidebar' );
	/**
	 * Init each
	 */
	for( let i = 0; i < stickysidebars.length; i++ ) {
		new StickySidebar( stickysidebars[i] );
	}
}
document.addEventListener( 'DOMContentLoaded', _initStickySidebar, false );
// const _initStickySidebar = () => {

// 	let sidebar,
// 		el,
// 		sticky = {},
// 		options = {
			// bottomSpacing: 20,
			// topSpacing: 20,
			// containerSelector: '.container'
// 		};

// 	const _maybeDoSticky = () => {

// 		/**
// 		 * Maybe initialize the sticky sidebar
// 		 */
// 		if( sidebar.offsetWidth < sidebar.parentElement.offsetWidth ) {
// 			/**
// 			 * Double check that we haven't already done it...
// 			 */
// 			if( sticky._active !== true ) {
// 				/**
// 				 * Init the sticky sidebar
// 				 */
// 				sticky = new StickySidebar( el, options );
// 				/**
// 				 * Set it to active, so we don't have to do it again on resize
// 				 */
// 				sticky._active = true;
// 			} else {
// 				/**
// 				 * Update the calculated diminisions
// 				 */
// 				sticky.updateSticky();
// 			}
// 		}
// 		/**
// 		 * Maybe destroy, if it's active
// 		 */
// 		else if( sticky._active === true ) {
// 			/**
// 			 * Set inactive
// 			 */
// 			sticky._active = false;
// 			/**
// 			 * destroy the instance
// 			 */
// 			sticky.destroy();
// 		}
// 	}

// 	sidebar = document.getElementById( 'secondary' );
// 	/**
// 	 * Bail if we don't have a sidebar
// 	 */
// 	if( sidebar === null ) {
// 		return;
// 	}
// 	/**
// 	 * Get the wrapper that we want to apply the class to
// 	 */
// 	el = sidebar.querySelector( '.sticky' );
// 	/**
// 	 * Bail if we don't have a sticky inner div
// 	 */
// 	if( el === null ) {
// 		return;
// 	}
// 	/**
// 	 * bind events
// 	 */
// 	window.addEventListener( 'resize', _maybeDoSticky );
// 	/**
// 	 * Catch jetpacks jquery event for infinite scroll
// 	 */
// 	jQuery( window ).on( 'post-load', _maybeDoSticky );
// 	/**
// 	 * Fire the function once now
// 	 */
// 	_maybeDoSticky();
// }
// document.addEventListener( 'DOMContentLoaded', _initStickySidebar, false );


// var sidebar = new StickySidebar( '#secondary .widget-wrapper', {
//     bottomSpacing: 20,
//     topSpacing: 20,
//     containerSelector: '.container',
// });




/**
 * Do Masonry sidebar area during certain breakpoints
 */
// const _initSidebar = () => {

// 	var Masonry = require( 'masonry-layout' );

// 	let $widget_area, $container, $masonry, options = {};
// }
// document.addEventListener( 'DOMContentLoaded', _initSidebar, false );


/**
 * Start custom jQuery function here
 */
jQuery(function ($) {
	// 'use strict';
	// window.addEventListener( 'post-load', function(event) {
	// 	console.log(event);
	// });
	// $( window ).on( 'post-load', function(event) {
	// 	console.log('window loaded');
	// });
	/**
	 * Set up our archive grids
	 */
	// ( function(){
	// 	/**
	// 	 * Set widget area
	// 	 */
	// 	$widget_area = $( '#secondary' );
	// 	/**
	// 	 * Handler to init/destroy masonry
	// 	 */
	// 	const _masonry = () => {
	// 		/**
	// 		 * Create if conditions match
	// 		 */
	// 		if( _isFullWidth() === true && $widget_area.hasClass( 'masonry' ) === false ) {
	// 			$widget_area.addClass( 'masonry' ).masonry(options);
	// 		}
	// 		/**
	// 		 * Else destroy
	// 		 */
	// 		else if( _isFullWidth() === false && $widget_area.hasClass( 'masonry' ) ) {
	// 			$widget_area.removeClass( 'masonry' ).masonry( 'destroy' );
	// 		}
	// 	}

	// 	const _isFullWidth = () => {
	// 		if( $widget_area.outerWidth() >= $container.outerWidth() && $container.outerWidth() > 544 ) {
	// 			return true;
	// 		}
	// 		else {
	// 			return false;
	// 		}
	// 	}

	// 	const _init = () => {
	// 		/**
	// 		 * Set widget area
	// 		 */
	// 		$widget_area = $( '#secondary' );
	// 		/**
	// 		 * Bail if we don't have a widget area to use
	// 		 */
	// 		if( !$widget_area.length || $widget_area.find( '.widget' ).length < 2 ) {
	// 			return false;
	// 		}
	// 		/**
	// 		 * Set the container
	// 		 */
	// 		$container = $widget_area.closest( '.container' );
	// 		/**
	// 		 * Set the options
	// 		 */
	// 		options = {
	// 			columnWidth: '.widget',
	// 			itemSelector: '.widget',
	// 			percentPosition: true
	// 		}
	// 		/**
	// 		 * Set the resize handler
	// 		 */
	// 		$( window ).on( 'resize', _masonry );
	// 		/**
	// 		 * Do initial
	// 		 */
	// 		_masonry();
	// 	}
	// 	_init();
	// })();
});

