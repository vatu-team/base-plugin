<?php

/**
 * Provider: Example
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2024 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\ExampleBlocks;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceProvider;

final class ExampleBlocksProvider extends ServiceProvider
{
	protected string $identifier = 'ExampleBlocks';

	/**
	 * Service to be loaded.
	 *
	 * @var array<string>
	 */
	protected array $service_collection = [
		DynamicBlock::class,
		StaticBlock::class,
	];
}
