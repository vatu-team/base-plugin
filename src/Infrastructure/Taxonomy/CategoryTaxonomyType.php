<?php

/**
 * Taxonomy Type
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://www.thoughtsandideas.uk/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure\Taxonomy;

abstract class CategoryTaxonomyType implements TaxonomyType
{
	protected string $key = '';

	protected string $content_type = '';

	/**
	 * @var string|array<string>
	 */
	protected string|array $object_types = [];

	public function getObjectTypes(): string|array
	{
		return $this->object_types;
	}

	public function getKey(): string
	{
		return $this->key;
	}

	public function getArgs(): array
	{
		return [
			'label'                           => '',
			'labels'                          => [],
			'description'                     => '',
			'public'                          => false,
			'hierarchical'                    => false,
			'exclude_from_search'             => true,
			'publicly_queryable'              => false,
			'show_ui'                         => false,
			'show_in_menu'                    => false,
			'show_in_nav_menus'               => false,
			'show_in_admin_bar'               => false,
			'show_in_rest'                    => true,
			'rest_base'                       => $this->content_type,
			'rest_namespace'                  => 'wp/v2',
			'rest_controller_class'           => 'WP_REST_Posts_Controller',
			'autosave_rest_controller_class'  => 'WP_REST_Autosaves_Controller',
			'revisions_rest_controller_class' => 'WP_REST_Revisions_Controller',
			'late_route_registration_'        => false,
			'menu_position'                   => null,
			'menu_icon'                       => 'none',
			'capability_type'                 => 'post',
			'capabilities'                    => '',
			'map_meta_cap'                    => false,
			'supports'                        => [
				'title',
				'editor',
			],
			'register_meta_box_cb'            => null,
			'taxonomies'                      => [],
			'has_archive'                     => false,
			'rewrite'                         => false,
			'query_var'                       => '',
			'can_export'                      => true,
			'delete_with_user'                => null,
			'template'                        => [],
			'template_lock'                   => false,
		];
	}

	/**
	 * @return array<string, string>
	 */
	public function getLabels(): array
	{
		return [
			'name'                       => '',
			'singular_name'              => _x( 'Category', 'taxonomy singular name', '' ),
			'search_items'               => __( 'Search Categories', '' ),
			'popular_items'              => __( 'Popular Categories', '' ),
			'all_items'                  => __( 'All Categories', '' ),
			'parent_item'                => __( 'Parent Category', '' ),
			'parent_item_colon'          => __( 'Parent Category:', '' ),
			'name_field_description'     => __( 'The name is how it appears on your site.', '' ),
			'slug_field_description'     => __(
				'The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.',
				''
			),
			'parent_field_description'   => __(
				'The parent category for the category you are creating. Categories can have a hierarchy.',
				''
			),
			'desc_field_description'     => __(
				'The description is not prominent by default; however, some themes may show it.',
				''
			),
			'edit_item'                  => __( 'Edit Category', '' ),
			'view_item'                  => __( 'View Category', '' ),
			'update_item'                => __( 'Update Category', '' ),
			'add_new_item'               => __( 'Add New Category', '' ),
			'new_item_name'              => __( 'New Category Name', '' ),
			'template_name'              => __( 'Category Template', '' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', '' ),
			'add_or_remove_items'        => __( 'Add or remove categories', '' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories', '' ),
			'not_found'                  => __( 'No categories found.', '' ),
			'no_terms'                   => __( 'No categories', '' ),
			'filter_by_item'             => __( 'Filter by category', '' ),
			'items_list_navigation'      => __( 'Categories list navigation', '' ),
			'items_list'                 => __( 'Categories list', '' ),
			'most_used'                  => __( 'Most Used', '' ),
			'back_to_items'              => __( 'Back to Categories', '' ),
			'item_link'                  => __( 'Category Link', '' ),
			'item_link_description'      => __( 'A link to a category.', '' ),
		];
	}
}
