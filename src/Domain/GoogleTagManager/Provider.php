<?php

/**
 * Provider: Google Tag Manager
 *
 * @package   Client\BasePlugin\
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0
 * @copyright 2025 Vatu Ltd.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\GoogleTagManager;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceProvider;

final class Provider extends ServiceProvider
{
	protected string $identifier = 'GoogleTagManager';

	/**
	 * Service to be loaded.
	 *
	 * @var array<string>
	 */
	protected array $service_collection = [
		ContentSecurityPolicy::class,
		GoogleAdsContentSecurityPolicy::class,
		Snippets::class,
	];
}
