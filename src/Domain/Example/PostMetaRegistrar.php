<?php

/**
 * Service: Example
 *
 * @package   Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\Example;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class PostMetaRegistrar extends Service implements Registrable
{
	protected string $name = 'PostMetaRegistrar';

	/**
	 * @var array<string>
	 */
	private array $meta_list = [
		Meta\ExampleMeta::class,
	];

	public function register(): void
	{
		\add_filter(
			hook_name: 'Vatu.Plugin.Application.Meta',
			callback: [ $this, 'registerMeta' ],
			priority: 10,
			accepted_args: 1
		);
	}

	/**
	 * @param array<string> $meta_list
	 *
	 * @return array<\Client\BasePlugin\Infrastructure\Meta\MetaField|string>
	 */
	public function registerMeta( array $meta_list ): array
	{
		return array_merge( $meta_list, $this->meta_list );
	}
}
