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

namespace Client\BasePlugin\Infrastructure\Block;

abstract class Block implements BlockType
{
	/**
	 * @var lowercase-string&non-empty-string
	 */
	protected string $block_type = 'post';

	public function getBlockType(): string
	{
		return $this->block_type;
	}

	public function getBlockArgs(): array
	{
		return [];
	}

	public function getPath(): string
	{
		return $this->block_type;
	}
}
