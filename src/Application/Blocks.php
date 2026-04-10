<?php

/**
 * Register WordPress Blocks
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Application;

use Client\BasePlugin\Infrastructure\Block\BlockType;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

use const Client\BasePlugin\BLOCK_DIR;

final class Blocks extends Service implements Registrable
{
	protected string $name = 'Blocks';

	/**
	 * @var array<array<string>>
	 */
	private array $block_provider_list = [];

	/**
	 * @var array<BlockType>
	 */
	private array $block_list = [];

	public function register(): void
	{
		\add_action(
			hook_name: 'init',
			callback: [ $this, 'registerBlockList' ],
			priority: 10,
			accepted_args: 1
		);
	}

	public function registerBlockList(): void
	{
		$this->createBlockList();

		foreach ( $this->block_list as $block ) {
			\register_block_type(
				block_type: BLOCK_DIR . '/' . $block->getBlockType() . '/block.json'
			);
		}
	}

	/**
	 * @return array<string>
	 */
	private function getBlockProviderList(): array
	{
		return apply_filters(
			$this->getHook(),
			$this->block_provider_list
		);
	}

	private function createBlockList(): void
	{
		foreach ( $this->getBlockProviderList() as $block ) {
			$this->block_list[] = $this->initBlock( $block );
		}
	}

	private function initBlock( string|BlockType $block ): BlockType
	{
		/**
		 * @var BlockType $return
		 */
		$return = new $block();
		return $return;
	}
}
