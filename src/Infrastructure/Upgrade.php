<?php

/**
 * Upgrade Interface.
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Thoughts & Ideas <hello@thoughtsandideas.uk>
 * @link      https://www.thoughtsandideas.uk/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2026 Thoughts & Ideas Limited.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Infrastructure;

interface Upgrade
{
	public function upgrade(): void;
}
