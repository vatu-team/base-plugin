<?php

/**
 * Interface: Block Type
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://www.thoughtsandideas.uk/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure\Block;

interface BlockType
{
	/**
	 * @phpstan-return lowercase-string&non-empty-string
	 */
	public function getBlockType(): string;

	/**
	 * phpcs:ignore SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
	 * @return array<string, mixed>
	 */
	public function getBlockArgs(): array;

	public function getPath(): string;
}
