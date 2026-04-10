<?php

/**
 * Version 1.1.0
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Database\Migrations;

use Client\BasePlugin\Infrastructure\Upgrade;

/* phpcs:ignore Squiz.Classes.ValidClassName.NotCamelCaps */
class Migration_1_0_0 implements Upgrade
{
	public const VERSION = '1.0.0';

	public function upgrade(): void
	{
		\add_action(
			'admin_init',
			[ $this, 'flushRewriteRules' ],
			10,
			0
		);
	}

	public function flushRewriteRules(): void
	{
		\flush_rewrite_rules( false );
	}
}
