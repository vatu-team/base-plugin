<?php

/**
 * Provider: Cookie Managment
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\CookieManagement;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\ServiceProvider;

final class CookieYes extends ServiceProvider
{
	protected string $identifier = 'CookieYes';

	/**
	 * Service to be loaded.
	 *
	 * @var array<string>
	 */
	protected array $service_collection = [
		ContentSecurityPolicy::class,
	];
}
