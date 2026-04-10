<?php

/**
 * Upgrade Provider
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Application;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

use const Client\BasePlugin\PLUGIN_FILE;

final class Upgrades extends Service implements Registrable
{
	/* phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase -- WP Options are lowercase */
	private const VERSION_OPTION_KEY = 'base_plugin_core_version';

	protected string $name = 'Upgrade';

	private string $current_version = '0.0.0';

	private string $plugin_version = '0.0.0';

	/**
	 * @var array<string,string>
	 */
	private array $versions = [
		'1.0.0' => \Client\BasePlugin\Database\Migrations\Migration_1_0_0::class,
	];

	public function register(): void
	{
		$this->current_version = get_option( self::VERSION_OPTION_KEY, '0.0.0' );

		$this->plugin_version = get_plugin_data(
			plugin_file: PLUGIN_FILE,
			markup: false,
			translate: false
		)['Version'];

		if ( version_compare( $this->plugin_version, $this->current_version ) === 0 ) {
			return;
		}

		$this->doUpgrades();
	}

	/**
	 * @return array<string>
	 */
	private function getUpgradeList(): array
	{
		return apply_filters(
			$this->getHook(),
			$this->versions
		);
	}

	private function doUpgrades(): void
	{
		$upgrade_handler = array_filter(
			$this->getUpgradeList(),
			function ( $upgrade_handler_version ) {
				return version_compare(
					$this->current_version,
					$upgrade_handler_version,
					'<='
				);
			},
			ARRAY_FILTER_USE_KEY
		);

		if ( empty( $upgrade_handler ) ) {
			$this->upgradeVersionOption();
			return;
		}

		try {
			foreach ( $upgrade_handler as $handler_class ) {
				/**
				 * @var \Client\BasePlugin\Infrastructure\Upgrade $handler
				 */
				$handler = new $handler_class();
				$handler->upgrade();
			}
		} catch ( \Throwable $exception ) {
			// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log, Squiz.PHP.DiscouragedFunctions.Discouraged
			error_log( $exception->getMessage() );
			return;
		}

		$this->upgradeVersionOption();

		// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log, Squiz.PHP.DiscouragedFunctions.Discouraged
		error_log(
			"Upgraded Vatu Base Plugin plugin version: {$this->plugin_version}"
		);
	}

	private function upgradeVersionOption(): bool
	{
		return update_option(
			option: self::VERSION_OPTION_KEY,
			value: $this->plugin_version
		);
	}
}
