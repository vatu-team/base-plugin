<?php

/**
 * Content Labels
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://www.thoughtsandideas.uk/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure\Content;

final class ContentSettings
{
	private bool $exclude_from_search;

	private bool $publicly_queryable;

	private bool $show_ui;

	private bool $show_in_menu;

	private bool $show_in_nav_menus;

	private bool $show_in_admin_bar;

	private string $rest_base;

	private string|bool $query_var;

	/**
	 * @param array<string> $labels
	 * @param string|array<string> $capability_type
	 * @param array<string> $capabilities
	 * @param array<string> $supports
	 * @param array<string> $taxonomies
	 * @param bool|array<string,string|bool|int> $rewrite
	 * @param array<array<mixed>> $template
	 */
	public function __construct(
		private string $post_type,
		private string $label = '',
		private array $labels = [],
		private string $description = '',
		private bool $public = false,
		private bool $hierarchical = false,
		private bool $show_in_rest = true,
		private string $rest_namespace = 'wp/v2',
		private string $rest_controller_class = 'WP_REST_Posts_Controller',
		private string $autosave_rest_controller_class = 'WP_REST_Autosaves_Controller',
		private string $revisions_rest_controller_class = 'WP_REST_Revisions_Controller',
		private bool $late_route_registration = false,
		private null|int $menu_position = null,
		private string $menu_icon = 'none',
		private string|array $capability_type = 'post',
		private array $capabilities = [],
		private bool $map_meta_cap = true,
		private array $supports = [ 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'page-attributes' ],
		private null|string $register_meta_box_cb = null,
		private array $taxonomies = [],
		private bool|string $has_archive = false,
		private bool|array $rewrite = false,
		private bool $can_export = true,
		private bool $delete_with_user = false,
		private array $template = [],
		private string|bool $template_lock = false,
		null|bool $exclude_from_search = null,
		null|bool $publicly_queryable = null,
		null|bool $show_ui = null,
		null|bool $show_in_menu = null,
		null|bool $show_in_nav_menus = null,
		null|bool $show_in_admin_bar = null,
		null|string $rest_base = null,
		null|string|bool $query_var = null
	) {
		$this->exclude_from_search = $exclude_from_search ?? ! $this->public;
		$this->publicly_queryable  = $publicly_queryable ?? $this->public;
		/* phpcs:ignore Universal.Operators.DisallowShortTernary.Found */
		$this->show_ui           = $show_ui ?: $this->public;
		$this->show_in_menu      = $show_in_menu ?? $this->show_ui;
		$this->show_in_nav_menus = $show_in_nav_menus ?? $this->public;
		$this->show_in_admin_bar = $show_in_admin_bar ?? $this->show_in_menu;
		$this->rest_base         = $rest_base ?? $this->post_type;
		$this->query_var         = $query_var ?? $this->post_type;
	}

	/**
	 * @return array<mixed>
	 */
	public function toArray(): array
	{
		return [
			'label'                           => $this->label,
			'labels'                          => $this->labels,
			'description'                     => $this->description,
			'public'                          => $this->public,
			'hierarchical'                    => $this->hierarchical,
			'exclude_from_search'             => $this->exclude_from_search,
			'publicly_queryable'              => $this->publicly_queryable,
			'show_ui'                         => $this->show_ui,
			'show_in_menu'                    => $this->show_in_menu,
			'show_in_nav_menus'               => $this->show_in_nav_menus,
			'show_in_admin_bar'               => $this->show_in_admin_bar,
			'show_in_rest'                    => $this->show_in_rest,
			'rest_base'                       => $this->rest_base,
			'rest_namespace'                  => $this->rest_namespace,
			'rest_controller_class'           => $this->rest_controller_class,
			'autosave_rest_controller_class'  => $this->autosave_rest_controller_class,
			'revisions_rest_controller_class' => $this->revisions_rest_controller_class,
			'late_route_registration'         => $this->late_route_registration,
			'menu_position'                   => $this->menu_position,
			'menu_icon'                       => $this->menu_icon,
			'capability_type'                 => $this->capability_type,
			'capabilities'                    => $this->capabilities,
			'map_meta_cap'                    => $this->map_meta_cap,
			'supports'                        => $this->supports,
			'register_meta_box_cb'            => $this->register_meta_box_cb,
			'taxonomies'                      => $this->taxonomies,
			'has_archive'                     => $this->has_archive,
			'rewrite'                         => $this->rewrite,
			'query_var'                       => $this->query_var,
			'can_export'                      => $this->can_export,
			'delete_with_user'                => $this->delete_with_user,
			'template'                        => $this->template,
			'template_lock'                   => $this->template_lock,
		];
	}
}
