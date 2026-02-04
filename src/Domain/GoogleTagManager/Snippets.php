<?php

/**
 * Google Tag Manager Snippets.
 *
 * @package   Client\BasePlugin\
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2025 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\GoogleTagManager;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class Snippets extends Service implements Registrable
{
	protected string $name = 'Snippets';

	private string $google_tag_manager_container_id = '';

	private string $nonce;

	public function __construct( string $hook_prefix )
	{
		parent::__construct( $hook_prefix );
		$this->google_tag_manager_container_id = \defined( 'GOOGLE_TAG_MANAGER_CONTAINER_ID' ) && constant(
			'GOOGLE_TAG_MANAGER_CONTAINER_ID'
		) !== null
			? constant( 'GOOGLE_TAG_MANAGER_CONTAINER_ID' )
			: '';
		$this->nonce                           = $this->setNonce();
	}

	public function register(): void
	{
		if ( ! $this->isNeeded() ) {
			return;
		}

		add_action(
			hook_name:'wp_head',
			callback: [
				$this,
				'renderHead',
			],
			// Renders after `wp_enqueue_scripts` to allow GTM data layers to be registered.
			priority: 2,
			accepted_args: 0
		);

		add_action(
			hook_name:'wp_body_open',
			callback: [
				$this,
				'renderBody',
			],
			priority: 1,
			accepted_args: 0
		);

		// add_filter(
		// 	hook_name: 'site-config.csp.script-src',
		// 	callback: [
		// 		$this,
		// 		'setScriptNonce',
		// 	],
		// 	priority: 10,
		// 	accepted_args: 1
		// );
	}

	public function isNeeded(): bool
	{
		return $this->hasContainerId() && $this->isProductionEnvironment();
	}

	public function renderHead(): void
	{
		\printf(
			"<!-- Google Tag Manager -->
<script nonce='%s'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','%s');</script>
<!-- End Google Tag Manager -->",
			esc_attr( $this->nonce ),
			esc_attr( $this->google_tag_manager_container_id )
		);
	}

	public function renderBody(): void
	{
		printf(
			'<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=%s" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->',
			esc_attr( text: $this->google_tag_manager_container_id )
		);
	}

	/**
	 * @param array<string> $script_src
	 * @return array<string>
	 */
	public function setScriptNonce( array $script_src ): array
	{
		$script_src[] = "'nonce-{$this->nonce}'";

		return $script_src;
	}

	private function hasContainerId(): bool
	{
		return ! empty( $this->google_tag_manager_container_id );
	}

	private function isProductionEnvironment(): bool
	{
		if ( ! \defined( constant_name: 'WP_ENVIRONMENT_TYPE' ) ) {
			return true;
		}

		/* Allow staging for testing purposes - remove on go live */
		/** @phpstan-ignore function.impossibleType */
		return \in_array(
			needle: WP_ENVIRONMENT_TYPE,
			haystack: [ 'production', 'staging' ],
			strict: true
		);
	}

	private function setNonce(): string
	{
		return wp_create_nonce( action: -1 );
	}
}
