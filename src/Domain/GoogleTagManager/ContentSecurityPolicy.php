<?php

/**
 * Google Tag Manager Snippets.
 *
 * @package   Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0
 * @copyright 2025 Vatu Ltd.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\GoogleTagManager;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class ContentSecurityPolicy extends Service implements Registrable
{
	protected string $name = 'ContentSecurityPolicy';

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
			hook_name: 'site-config.csp.style-src',
			callback: [
				$this,
				'setStyleSrc',
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
			hook_name: 'site-config.csp.font-src',
			callback: [
				$this,
				'setFontSrc',
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
			"'unsafe-inline'",
			'https://*.googletagmanager.com',
			'https://googletagmanager.com',
			'https://tagmanager.google.com',
			'https://*.googletagmanager.com',
		];

		$script_src = array_merge( $script_src, $domains );

		return array_unique( $script_src );
	}

	/**
	 * @param array<string> $style_src Current style-src CSP values.
	 * @return array<string>
	 */
	public function setStyleSrc( array $style_src ): array
	{
		$domains = [
			'https://googletagmanager.com',
			'https://tagmanager.google.com',
			'https://fonts.googleapis.com',
		];

		$style_src = array_merge( $style_src, $domains );

		return array_unique( $style_src );
	}

	/**
	 * @param array<string> $image_src Current img-src CSP values.
	 * @return array<string>
	 */
	public function setImageSrc( array $image_src ): array
	{
		$domains = [
			'https://www.googletagmanager.com',
			'https://googletagmanager.com',
			'https://ssl.gstatic.com',
			'https://www.gstatic.com',
			'https://*.google-analytics.com',
			'https://*.googletagmanager.com',
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
		$google_analytics_domains = [
			'https://*.google-analytics.com',
			'https://*.analytics.google.com',
			'https://*.googletagmanager.com',
		];

		$connect_src = array_merge( $connect_src, $google_analytics_domains );

		return array_unique( $connect_src );
	}

	/**
	 * @param array<string> $font_src Current font-src CSP values.
	 * @return array<string>
	 */
	public function setFontSrc( array $font_src ): array
	{
		$domains = [
			'data:',
			'https://fonts.gstatic.com',
		];

		$font_src = array_merge( $font_src, $domains );

		return array_unique( $font_src );
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
