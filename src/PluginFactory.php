<?php

/**
 * Plugin Factory.
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2024 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin;

final class PluginFactory
{
	private static null|Plugin $plugin = null;

	/**
	 * Create and return an instance of the plugin.
	 */
	public static function create(
		string $hook_prefix
	): Plugin {
		if ( is_null( self::$plugin ) ) {
			self::$plugin = new Plugin( hook_prefix: $hook_prefix );
		}

		return self::$plugin;
	}
}
