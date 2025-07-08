<?php

/**
 * Service: Example
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\Example;

use Client\BasePlugin\Infrastructure\Meta\PostMetaField;

final class ExamplePostMetaField extends PostMetaField
{
	protected string $id = 'post_example';

	protected string $type = 'string';

	protected string $description = 'Example Post Meta Field.';

	protected bool $is_single_value = true;

	/**
	 * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 */
	protected mixed $default_value = '';

	/**
	 * @var callable
	 */
	protected $sanitize_callback = 'sanitize_url';

	/**
	 * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 * @var bool|array<mixed>
	 */
	protected bool|array $is_show_in_rest = true;

	protected bool $revisions_enabled = false;
}
