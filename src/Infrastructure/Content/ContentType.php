<?php

/**
 * Interface: Content Type
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://www.thoughtsandideas.uk/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure\Content;

interface ContentType
{
	/**
	 * @phpstan-return lowercase-string&non-empty-string
	 */
	public function getContentType(): string;

	/**
	 * @return array<string, mixed>
	 */
	public function getContentArgs(): array;
}
