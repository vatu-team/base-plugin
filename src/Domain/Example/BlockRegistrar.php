<?php

/**
 * Registrar: Block Registrar
 *
 * @package   Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\Example;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class BlockRegistrar extends Service implements Registrable
{
	protected string $name = 'BlockRegistrar';

	/**
	 * @var array<string>
	 */
	protected array $block_list = [
		Blocks\DynamicBlock::class,
		Blocks\StaticBlock::class,
	];

	public function register(): void
	{
		\add_filter(
			hook_name: 'Vatu.Plugin.Application.Blocks',
			callback: [ $this, 'registerBlock' ],
			priority: 10,
			accepted_args: 1
		);
	}

	/**
	 * @param array<string> $block_list
	 *
	 * @return array<\Client\BasePlugin\Infrastructure\Block\Block|string>
	 */
	public function registerBlock( array $block_list ): array
	{
		return \array_merge( $block_list, $this->block_list );
	}
}
