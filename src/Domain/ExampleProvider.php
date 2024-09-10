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

namespace Client\BasePlugin\Domain;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceProvider;

final class ExampleProvider extends ServiceProvider
{
	protected string $identifier = 'Provider';

	/**
	 * Service to be loaded.
	 *
	 * @var array<string>
	 */
	protected array $service_collection = [
		Example\ExampleService::class,
	];
}
