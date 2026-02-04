<?php

/**
 * Google Ads Content Security Policy.
 *
 * @package   Client\BasePlugin\
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0
 * @copyright 2025 Vatu Ltd.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\GoogleTagManager;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class GoogleAdsContentSecurityPolicy extends Service implements Registrable
{
	protected string $name = 'AdsCsp';

	public function register(): void
	{
		add_filter(
			hook_name: 'site-config.csp.script-src',
			callback: [
				$this,
				'setScriptSrc',
			],
			priority: 10,
			accepted_args: 1
		);

		add_filter(
			hook_name: 'site-config.csp.img-src',
			callback: [
				$this,
				'setImageSrc',
			],
			priority: 10,
			accepted_args: 1
		);

		add_filter(
			hook_name: 'site-config.csp.connect-src',
			callback: [
				$this,
				'setConnectSrc',
			],
			priority: 10,
			accepted_args: 1
		);

		add_filter(
			hook_name: 'site-config.csp.frame-src',
			callback: [
				$this,
				'setFrameSrc',
			],
			priority: 10,
			accepted_args: 1
		);
	}

	/**
	 * @param array<string> $script_src Current script-src CSP values.
	 * @return array<string>
	 */
	public function setScriptSrc( array $script_src ): array
	{
		$domains = [
			'https://www.googleadservices.com',
			'https://www.google.com',
			'https://www.googletagmanager.com',
			'https://pagead2.googlesyndication.com',
			'https://googleads.g.doubleclick.net',
		];

		$script_src = array_merge( $script_src, $domains );

		return array_unique( $script_src );
	}

	/**
	 * @param array<string> $image_src Current img-src CSP values.
	 * @return array<string>
	 */
	public function setImageSrc( array $image_src ): array
	{
		$domains = [
			'https://www.googletagmanager.com',
			'https://googleads.g.doubleclick.net',
			'https://www.google.com',
			'https://pagead2.googlesyndication.com',
			'https://www.googleadservices.com',
			'https://google.com',
			'https://www.google.co.uk',
		];

		$image_src = array_merge( $image_src, $domains );

		return array_unique( $image_src );
	}

	/**
	 * @param array<string> $connect_src Current connect-src CSP values.
	 * @return array<string>
	 */
	public function setConnectSrc( array $connect_src ): array
	{
		$domains = [
			'https://pagead2.googlesyndication.com',
			'https://www.googleadservices.com',
			'https://googleads.g.doubleclick.net',
			'https://www.google.com',
			'https://google.com',
			'https://www.google.co.uk',
		];

		$connect_src = array_merge( $connect_src, $domains );

		return array_unique( $connect_src );
	}

	/**
	 * @param array<string> $frame_src Current frame-src CSP values.
	 * @return array<string>
	 */
	public function setFrameSrc( array $frame_src ): array
	{
		$domains = [
			'https://www.googletagmanager.com',
		];

		$frame_src = array_merge( $frame_src, $domains );

		return array_unique( $frame_src );
	}
}
