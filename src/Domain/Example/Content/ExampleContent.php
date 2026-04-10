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

namespace Client\BasePlugin\Domain\Example\Content;

use Client\BasePlugin\Infrastructure\Content\ContentSettings;
use Client\BasePlugin\Infrastructure\Content\PostContentType;

final class ExampleContent extends PostContentType
{
	protected string $content_type = 'example';

	public function getContentType(): string
	{
		return $this->content_type;
	}

	public function getContentArgs(): array
	{
		return ( new ContentSettings(
			post_type: $this->getContentType(),
			label: __( 'Example', 'base-plugin' ),
			labels: [
				'singular_name' => __( 'Example', 'base-plugin' ),
				'menu_name'     => __( 'Example', 'base-plugin' ),
			],
			public: true,
			publicly_queryable: true,
			capability_type: 'page',
			hierarchical: true,
			exclude_from_search: true,
			show_in_menu: true,
			show_in_admin_bar: false,
			show_ui: true,
			rewrite: [
				'slug'       => 'example',
				'with_front' => false,
			],
			has_archive: true,
			menu_icon: 'dashicons-smiley'
		) )->toArray();
	}
}
