<?php

/**
 * Interface: WordPress Block
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://www.thoughtsandideas.uk/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

abstract class Block extends Service
{
	/**
	 * @var array<string>
	 */
	protected array $block_path_list = [];

	/**
	 * @return array<string>
	 */
	public function getPath(): array
	{
		return $this->block_path_list;
	}

	/**
	 * @param array<string> $block_list
	 *
	 * @return array<Block|string>
	 */
	public function registerBlock( array $block_list ): array
	{
		$block_list[] = $this;

		return $block_list;
	}
}
