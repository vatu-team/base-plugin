<?php

/**
 * Post Meta Field
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0
 * @copyright 2025 Vatu Ltd.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure\Meta;

abstract class PostMetaField implements MetaField
{
	protected string $id;

	protected string $type;

	protected string $description;

	protected bool $is_single_value;

	/**
     * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 */
	protected mixed $default_value;

	/**
	 * @var callable|null
	 */
	protected $sanitize_callback;

	/**
	 * @var callable|null
	 */
	protected $auth_callback;

	/**
     * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 * @var bool|array<mixed>
	 */
	protected bool|array $is_show_in_rest;

	protected bool $revisions_enabled = false;

	private string $meta_type = 'post';

	protected string $post_type = '';

	public function getMetaType(): string
	{
		return $this->meta_type;
	}

	public function getKey(): string
	{
		return $this->id;
	}

	/**
	 * @return array<string,mixed>
	 */
	public function toArray(): array
	{
		return [
			'object_subtype'    => $this->post_type,
			'type'              => $this->type,
			'description'       => $this->description,
			'single'            => $this->is_single_value,
			'default'           => $this->default_value,
			'sanitize_callback' => $this->sanitize_callback,
			'show_in_rest'      => $this->is_show_in_rest,
			'revisions_enabled' => $this->revisions_enabled,
		];
	}
}
