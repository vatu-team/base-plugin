<?php

/**
 * Service: Content Registrar
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

final class ContentRegistrar extends Service implements Registrable
{
	protected string $name = 'ContentType';

	/**
	 * @var array<string>
	 */
	private array $content_list = [
		Content\ExampleContent::class,
	];

	public function register(): void
	{
		\add_filter(
			hook_name: 'Vatu.Plugin.Application.Content',
			callback: [ $this, 'registerContent' ],
			priority: 10,
			accepted_args: 1
		);
	}

	/**
	 * @param array<string> $content_list
	 *
	 * @return array<\Client\BasePlugin\Infrastructure\Content\ContentType|string>
	 */
	public function registerContent( array $content_list ): array
	{
		return array_merge( $content_list, $this->content_list );
	}
}
