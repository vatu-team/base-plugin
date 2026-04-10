<?php

/**
 * Content: Blocks
 *
 * @package   Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\Example\Taxonomy;

use Client\BasePlugin\Infrastructure\Taxonomy\CategoryTaxonomyType;
use Client\BasePlugin\Infrastructure\Taxonomy\TaxonomySettings;

final class ExampleTaxonomy extends CategoryTaxonomyType
{
	protected string $key = 'example_category';

	/**
	 * @var array<string>|string
	 */
	protected array|string $object_types = [ 'example' ];

	public function getArgs(): array
	{
		return ( new TaxonomySettings(
			taxonomy: $this->getKey(),
			public: true,
			hierarchical: true,
			labels: [
				'name'          => __( 'Example Cat', 'base-plugin' ),
				'singular_name' => __( 'Example Cat', 'base-plugin' ),
				'menu_name'     => __( 'Example Cat', 'base-plugin' ),
			],
			rewrite: [ 'slug' => 'example-category' ]
		) )->toArray();
	}
}
