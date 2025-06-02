<?php

/**
 * Register WordPress Meta
 *

 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2025 Vatu Limited.
 *
 */

declare(strict_types=1);

namespace Client\BasePlugin\Application;

use Client\BasePlugin\Infrastructure\Meta\MetaField;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class Meta extends Service implements Registrable
{
	private const string PREFIX = 'base_plugin_';

	protected string $name = 'Meta';

	/**
	 * @var array<array<string>>
	 */
	private array $meta_provider_list = [];

	/**
	 * @var array<MetaField>
	 */
	private array $meta_list = [];

	public function register(): void
	{
		\add_action(
			hook_name: 'init',
			callback: [
				$this,
				'registerPostMeta',
			],
			priority: 10,
			accepted_args: 0
		);
	}

	public function registerPostMeta(): void
	{

		$this->createMetaList();

		foreach ( $this->meta_list as $meta ) {
			\register_meta(
				object_type: $meta->getMetaType(),
				meta_key: self::PREFIX . $meta->getKey(),
				args: $meta->toArray()
			);
		}
	}

	private function createMetaList(): void
	{
		foreach ( $this->getMetaProviderList() as $meta ) {
			$this->meta_list[] = $this->initMeta( meta: $meta );
		}
	}

	/**
	 * @return array<string>
	 */
	private function getMetaProviderList(): array
	{
		return apply_filters(
			hook_name: $this->getHook(),
			value: $this->meta_provider_list
		);
	}

	/**
	 * Initialize a Meta object.
	 *
	 * @return MetaField
	 */
	private function initMeta( string $meta ): MetaField
	{
		/**
		 * @var MetaField $return
		 */
		$return = new $meta();
		return $return;
	}
}
