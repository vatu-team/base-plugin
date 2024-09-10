<?php

/**
 * Plugin
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2024 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin;

use ThoughtsIdeas\Wordpress\Infrastructure\Main;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceLocator;

final class Plugin extends ServiceLocator implements Main
{
	protected string $identifier = 'Plugin';

	protected string $name = 'Plugin';

	/**
	 * @var array<string>
	 */
	protected array $provider_collection = [
		Application\ApplicationProvider::class,
		Domain\ExampleProvider::class,
		Domain\ExampleBlocks\ExampleBlocksProvider::class,
	];
}
