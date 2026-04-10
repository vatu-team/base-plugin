<?php

/**
 * Register WordPress Taxonomy
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Application;

use Client\BasePlugin\Infrastructure\Taxonomy\TaxonomyType;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class Taxonomy extends Service implements Registrable
{
	protected string $name = 'Taxonomy';

	/**
	 * @var array<array<string>>
	 */
	private array $taxonomy_provider_list = [];

	/**
	 * @var array<TaxonomyType>
	 */
	private array $taxonomy_list = [];

	public function register(): void
	{
		\add_action(
			hook_name: 'init',
			callback: [
				$this,
				'registerTaxonomyType',
			],
			priority: 5,
			accepted_args: 0
		);
	}

	public function registerTaxonomyType(): void
	{
		$this->createTaxonomyList();

		foreach ( $this->taxonomy_list as $taxonomy ) {
			\register_taxonomy(
				taxonomy: $taxonomy->getKey(),
				object_type: $taxonomy->getObjectTypes(),
				args: $taxonomy->getArgs()
			);
		}
	}

	private function createTaxonomyList(): void
	{
		foreach ( $this->getTaxonomyList() as $taxonomy ) {
			$this->taxonomy_list[] = $this->initTaxonomy( taxonomy: $taxonomy );
		}
	}

	/**
	 * @return array<string>
	 */
	private function getTaxonomyList(): array
	{
		return apply_filters(
			hook_name: $this->getHook(),
			value: $this->taxonomy_provider_list
		);
	}

	/**
	 * Initialize a Meta object.
	 *
	 * @return TaxonomyType
	 */
	private function initTaxonomy( string $taxonomy ): TaxonomyType
	{
		/**
		 * @var TaxonomyType $return
		 */
		$return = new $taxonomy();
		return $return;
	}
}
