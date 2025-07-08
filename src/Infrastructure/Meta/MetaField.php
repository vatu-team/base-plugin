<?php

/**
 * Interface: Meta Field
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0
 * @copyright 2025 Vatu Ltd.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure\Meta;

interface MetaField
{
	/**
	 * @return array<string|mixed>
	 */
	public function toArray(): array;

	public function getKey(): string;

	public function getMetaType(): string;
}
