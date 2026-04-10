<?php

/**
 * Taxonomy Labels
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://www.thoughtsandideas.uk/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure\Taxonomy;

final class TaxonomySettings
{
	private bool $publicly_queryable;

	private bool $show_ui;

	private bool $show_in_menu;

	private null|bool $show_in_nav_menus = null;

	private null|string $rest_base = null;

	private bool $show_in_quick_edit;

	private string|bool $query_var;

	/**
	 * @param array<string> $labels
	 * @param array<string> $capabilities
	 * @param array<string> $args
	 * @param array<string>| null $default_term
	 * @param bool|array<string> $rewrite
	 */
	public function __construct(
		private string $taxonomy,
		private array $labels = [],
		private string $description = '',
		private bool $public = false,
		private bool $hierarchical = false,
		private bool $show_in_rest = true,
		private string $rest_namespace = 'wp/v2',
		private string $rest_controller_class = 'WP_REST_Terms_Controller',
		private bool $show_tagcloud = false,
		private bool $show_admin_column = false,
		private null|string $meta_box_cb = null,
		private null|string $meta_box_sanitize_cb = null,
		private array $capabilities = [],
		private bool|array $rewrite = false,
		private null|string $update_count_callback = null,
		private null|array $default_term = null,
		private bool $sort = false,
		private array $args = [],
		null|bool $publicly_queryable = null,
		null|bool $show_ui = null,
		null|bool $show_in_menu = null,
		null|bool $show_in_nav_menus = null,
		null|string $rest_base = null,
		null|bool $show_in_quick_edit = null,
		null|string|bool $query_var = null
	) {
		$this->publicly_queryable = $publicly_queryable ?? $this->public;
		$this->show_ui            = $show_ui ?? $this->public;
		$this->show_in_menu       = $show_in_menu ?? $this->show_ui;
		$this->show_in_nav_menus  = $show_in_nav_menus ?? $this->public;
		$this->rest_base          = $rest_base ?? $this->taxonomy;
		$this->show_in_quick_edit = $show_in_quick_edit ?? $this->show_ui;
		$this->query_var          = $query_var ?? $this->taxonomy;
	}

	/**
	 * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 * @return array<mixed>
	 */
	public function toArray(): array
	{
		return [
			'labels'                => $this->labels,
			'description'           => $this->description,
			'public'                => $this->public,
			'publicly_queryable'    => $this->publicly_queryable,
			'hierarchical'          => $this->hierarchical,
			'show_ui'               => $this->show_ui,
			'show_in_menu'          => $this->show_in_menu,
			'show_in_nav_menus'     => $this->show_in_nav_menus,
			'show_in_rest'          => $this->show_in_rest,
			'rest_base'             => $this->rest_base,
			'rest_namespace'        => $this->rest_namespace,
			'rest_controller_class' => $this->rest_controller_class,
			'show_tagcloud'         => $this->show_tagcloud,
			'show_in_quick_edit'    => $this->show_in_quick_edit,
			'show_admin_column'     => $this->show_admin_column,
			'meta_box_cb'           => $this->meta_box_cb,
			'meta_box_sanitize_cb'  => $this->meta_box_sanitize_cb,
			'capabilities'          => $this->capabilities,
			'rewrite'               => $this->rewrite,
			'query_var'             => $this->query_var,
			'update_count_callback' => $this->update_count_callback,
			'default_term'          => $this->default_term,
			'sort'                  => $this->sort,
			'args'                  => $this->args,
		];
	}
}
