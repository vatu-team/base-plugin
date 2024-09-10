<?php

/**
 * Interface: WordPress Block
 *
 * @package   ThoughtsIdeas\WordPress\Infrastructure\Contracts
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://thoughtsandideas.uk/
 * @version   1.0.0
 * @license   MIT
 * @copyright (c) 2022-2024 Thoughts & Ideas Limited.
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
}
