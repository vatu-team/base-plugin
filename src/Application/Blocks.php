<?php

/**
 * Register WordPress Blocks
 *

 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2024 Vatu Limited.
 *
 */

declare(strict_types=1);

namespace Client\BasePlugin\Application;

use Client\BasePlugin\Infrastructure\Block;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class Blocks extends Service implements Registrable
{
	protected string $name = 'Blocks';

	/**
	 * @var array<array<string>>
	 */
	private array $block_provider_list = [];

	/**
	 * @var array<string>
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
			\register_block_type( block_type: $block );
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
		foreach ( $this->getBlockProviderList() as $class ) {
			$block            = $this->createBlock( $class );
			$this->block_list = array_merge( $this->block_list, $block->getPath() );
		}
	}

	private function createBlock( string|Block $block ): Block
	{
		if ( ! is_string( $block ) ) {
			return $block;
		}

		/**
		 * @var Block $return
		 */
		$return = new $block();
		return $return;
	}
}
