<?php

/**
 * Service: Content Registrar
 *
 * @package   Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\Example;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class TaxonomyRegistrar extends Service implements Registrable
{
	protected string $name = 'Taxonomy';

	/**
	 * @var array<string>
	 */
	private array $taxonomy_list = [
		Taxonomy\ExampleTaxonomy::class,
	];

	public function register(): void
	{
		\add_filter(
			hook_name: 'Vatu.Plugin.Application.Taxonomy',
			callback: [ $this, 'registerTaxonomy' ],
			priority: 10,
			accepted_args: 1
		);
	}

	/**
	 * @param array<string> $taxonomy_list
	 *
	 * @return array<\Client\BasePlugin\Infrastructure\Taxonomy\TaxonomyType|string>
	 */
	public function registerTaxonomy( array $taxonomy_list ): array
	{
		return array_merge( $taxonomy_list, $this->taxonomy_list );
	}
}
