<?php

/**
 * Blocks: Static
 *
 * Example Static Block.
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2024 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\ExampleBlocks;

use Client\BasePlugin\Infrastructure\Block;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;

final class StaticBlock extends Block implements Registrable
{
	protected string $name = 'DynamicBlock';

	/**
	 * @var array<string>
	 */
	protected array $block_path_list = [
		'/static',
	];

	public function register(): void
	{
		add_filter(
			hook_name: 'Vatu.Plugin.Application.Blocks',
			callback: [ $this, 'registerBlock' ],
			priority: 10,
			accepted_args: 1
		);
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
