<?php

/**
 * Interface: Taxonomy Type
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://www.thoughtsandideas.uk/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure\Taxonomy;

interface TaxonomyType
{
	/**
	 * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 * @return array<string, mixed>
	 */
	public function getObjectTypes(): array|string;

	/**
	 * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 * @return array<string, mixed>
	 */
	public function getArgs(): array;

	public function getKey(): string;
}
