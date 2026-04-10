<?php

/**
 * Service: Example
 *
 * @package   Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\Example\Meta;

use Client\BasePlugin\Infrastructure\Meta\PostMetaField;

final class ExampleMeta extends PostMetaField
{
	protected string $post_type = 'example';

	protected string $id = 'example_meta';

	protected string $type = 'string';

	protected string $description = 'Example Post Meta Field.';

	protected bool $is_single_value = true;

	/**
	 * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 */
	protected mixed $default_value = 'fallback';

	/**
	 * @var callable
	 */
	protected $sanitize_callback = 'sanitize_text_field';

	/**
	 * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 * @var bool|array<mixed>
	 */
	protected bool|array $is_show_in_rest = true;

	protected bool $revisions_enabled = false;
}
