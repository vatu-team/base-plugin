<?php

/**
 * Blocks: Static
 *
 * Example Static Block.
 *
 * @package   Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\Example\Blocks;

use Client\BasePlugin\Infrastructure\Block\Block;

final class StaticBlock extends Block
{
	protected string $block_type = 'example/static';

	public function getBlockType(): string
	{
		return $this->block_type;
	}

	public function getPath(): string
	{
		return "{$this->block_type}";
	}
}
