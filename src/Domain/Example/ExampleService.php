<?php

/**
 * Service: Example
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2024 Vatu Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Domain\Example;

use ThoughtsIdeas\Wordpress\Infrastructure\Services\Registrable;
use ThoughtsIdeas\Wordpress\Infrastructure\Services\Service;

final class ExampleService extends Service implements Registrable
{
	protected string $name = 'ExampleService';

	public function register(): void
	{
		\add_action(
			'wp_body_open',
			[ $this, 'test' ],
			10,
			0
		);
	}

	public function test(): void
	{
		printf(
			'<!-- %s -->',
			esc_html( "{$this->name}." )
		);
	}
}
