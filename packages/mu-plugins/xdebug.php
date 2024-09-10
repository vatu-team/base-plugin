<?php

/**
 * Plugin Name: xDebug Configuration
 * Plugin URI: https://www.thoughtsandideas.uk
 * Description: Helper when working with xDebug.
 * Version: 1.0.0
 * Author: Thoughts & Ideas
 * Author URI: https://www.thoughtsandideas.uk/
 * License: GPL3
 *
 * @package   ThoughtsIdeas/Wordpress/MuPlugin/Xdebug
 * @copyright 2023 Vatu
 */

declare(strict_types=1);

add_action(
	'init',
	function () {
			wp_deregister_script( 'heartbeat' );
	}
);
