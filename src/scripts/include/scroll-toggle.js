import '../vendors/noframework.waypoints.js';

export default function( element, options ) {

	/**
	 * Event list we need to listen for to trigger an end
	 */
	const transitionEndTrigger = ['_scrolltoggleEnd', 'webkitAnimationEnd', 'mozAnimationEnd', 'MSAnimationEnd', 'oanimationend', 'animationend', 'transitionend'];
	/**
	 * Positive classlist
	 */
	const states = {
		'up' : {
			'transition' : ['scrollingUp'],
			'complete'   : ['scrollUp'],
		},
		'down' : {
			'transition' : ['scrollingDown'],
			'complete'   : ['scrollDown'],
		},
	};
	/**
	 * Negative classlist
	 */
	const antistates = {
		'up' : {
			'transition' : ['scrollDown', 'scrollingDown', 'scrollUp'],
			'complete'   : ['scrollDown', 'scrollingDown', 'scrollingUp'],
		},
		'down' : {
			'transition' : ['scrollDown', 'scrollingUp', 'scrollUp'],
			'complete'   : ['scrollingDown', 'scrollingUp', 'scrollUp'],
		},
	};
	/**
	 * Generic options
	 */
	let settings = {
		offset : 0
	}
	/**
	 * Function to begin the toggle
	 */
	const _toggleStart = ( direction ) => {
		/**
		 * Set the direction on the element
		 */
		element.direction = direction;
		/**
		 * Remove the classes from any previous states
		 */
		for( let i = 0; i < antistates[direction].transition.length; i++ ) {
			element.classList.remove( antistates[direction].transition[i] );
		}
		/**
		 * Add the class for the current state
		 */
		element.classList.add( states[direction].transition );
		/**
		 * Add an event listener for our transition end triggers
		 */
		for( let i = 0; i < transitionEndTrigger.length; i++ ) {
			element.addEventListener( transitionEndTrigger[i], _toggleEnd, false );
		}
		/**
		 * Set timeout in case ending events dont fire
		 */
		setTimeout( () => {
		    element.dispatchEvent( new CustomEvent( '_scrolltoggleEnd' ) );
		}, 3000 );
	}
	/**
	 * Function to end the transition
	 */
	const _toggleEnd = ( event ) => {
		/**
		 * Destroy the event listener
		 */
		for( let i = 0; i < transitionEndTrigger.length; i++ ) {
			element.removeEventListener( transitionEndTrigger[i], _toggleEnd, false );
		}
		/**
		 * Remove the classes from any previous states
		 */
		for( let i = 0; i < antistates[element.direction].transition.length; i++ ) {
			element.classList.remove( antistates[element.direction].complete[i] );
		}
		/**
		 * Add the class for the current state
		 */
		element.classList.add( states[element.direction].complete );
	}
	/**
	 * Initialize the button
	 */
	const _init = () => {

		settings.offset = element.getAttribute( 'data-scroll-offset' ) || settings.offset;

		new Waypoint( {
			element : element,
			handler : _toggleStart,
			offset : -100
		} );

	};
	return _init();
}