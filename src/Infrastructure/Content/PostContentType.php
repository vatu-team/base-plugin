<?php

/**
 * Post Content Type
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://www.thoughtsandideas.uk/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure\Content;

abstract class PostContentType implements ContentType
{
	/**
	 * @var lowercase-string&non-empty-string
	 */
	protected string $content_type = 'post';

	public function getContentType(): string
	{
		return $this->content_type;
	}

	/**
	 * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 * @return array<mixed>
	 */
	public function getContentArgs(): array
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
			'name'                     => '',
			'singular_name'            => 'Post',
			'add_new'                  => __( 'Add Post', '' ),
			'add_new_item'             => __( 'Add Post', '' ),
			'edit_item'                => __( 'Edit Post', '' ),
			'new_item'                 => __( 'New Post', '' ),
			'view_item'                => __( 'View item', '' ),
			'view_items'               => __( 'View Items', '' ),
			'search_items'             => __( ' Search Posts', '' ),
			'not_found'                => __( 'No posts found', '' ),
			'not_found_in_trash'       => __( 'No posts found in Trash', '' ),
			'parent_item_colon'        => __( 'Parent page:', '' ),
			'all_items'                => __( 'All Posts', '' ),
			'archives'                 => __( 'Post Archives', '' ),
			'attributes'               => __( 'Post Attributes', '' ),
			'insert_into_item'         => __( 'Insert into post', '' ),
			'uploaded_to_this_item'    => __( 'Uploaded to this post', '' ),
			'menu_name'                => '',
			'filter_items_list'        => __( 'Filter posts list', '' ),
			'items_list_navigation'    => __( 'Posts list navigation', '' ),
			'items_list'               => __( 'Posts list', '' ),
			'item_published'           => __( 'Post published.', '' ),
			'item_published_privately' => __( 'Post published privately.', '' ),
			'item_reverted_to_draft'   => __( 'Post reverted to draft.', '' ),
			'item_trashed'             => __( 'Post trashed.', '' ),
			'item_scheduled'           => __( 'Post scheduled', '' ),
			'item_updated'             => __( 'Post updated.', '' ),
			'item_link'                => __( 'Post Link', '' ),
			'item_link_description'    => __( 'A link to a post.', '' ),
		];
	}
}
