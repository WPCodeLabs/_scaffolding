import '../vendors/sticky-sidebar.js';

export default function( element ) {

	/**
	 * The actual element to apply the sticky class to
	 */
	let sticky = element;
	/**
	 * Generic options
	 */
	let settings = {
		bottomSpacing : element.getAttribute( 'data-sticky-bottom' ) || 20,
		topSpacing : element.getAttribute( 'data-sticky-top' ) || 20,
		// containerSelector : element.getAttribute( 'data-sticky-container' ) || '.container'
	}
	/**
	 * Check if it's active
	 */
	let active = false;
	/**
	 * Maybe do sticky, depending on width
	 */
	const _maybeDoSticky = () => {
		/**
		 * Maybe initialize the sticky sidebar
		 */
		if( element.offsetWidth < element.parentElement.offsetWidth ) {

			/**
			 * Double check that we haven't already done it...
			 */
			if( active === false ) {
				/**
				 * Set it to active, so we don't have to do it again on resize
				 */
				active = true;
				/**
				 * Init the sticky sidebar
				 */
				sticky = new StickySidebar( sticky, settings );

			} else {
				/**
				 * Update the calculated diminisions
				 */
				sticky.updateSticky();
			}
		}
		/**
		 * Maybe destroy, if it's active
		 */
		else if( active === true ) {
			/**
			 * Set inactive
			 */
			active = false;
			/**
			 * destroy the instance
			 */
			sticky.destroy();
		}
	}
	/**
	 * Kick it off
	 */
	const _init = () => {
		/**
		 * Maybe apply to inner element
		 */
		if( element.getAttribute( 'data-sticky-element' ) ) {
			sticky = element.querySelector( element.getAttribute( 'data-sticky-element' ) );
		}
		/**
		 * Make sure we have an element
		 */
		if( !sticky ) {
			return;
		}
		/**
		 * Set resize event
		 */
		window.addEventListener( 'resize', _maybeDoSticky );
		/**
		 * Catch jetpacks infinite scroll event
		 */
		jQuery( window ).on( 'post-load', _maybeDoSticky );
		/**
		 * Maybe do right away
		 */
		_maybeDoSticky();
	};
	return _init();
}