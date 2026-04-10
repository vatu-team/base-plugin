<?php

/**
 * Asset Resolver:
 *
 * Return the URL of the path relative to the root plugin directory.
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://www.thoughtsandideas.uk/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure;

final class AssetResolver
{
	public static function url( string $path ): string
	{
		return plugins_url( $path, dirname( plugin_basename( __FILE__ ), 2 ) );
	}
}
