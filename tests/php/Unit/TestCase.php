<?php

/**
 * Test Case.
 *
 * @package   Vatu\Wordpress\Tests
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0
 * @copyright 2022-2024 Vatu Ltd.
 */

declare(strict_types=1);

namespace Client\BasePlugin\Tests\Unit;

use Brain\Monkey;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Yoast\PHPUnitPolyfills\TestCases\TestCase as YoastTestCase;

class TestCase extends YoastTestCase
{
	// Adds Mockery expectations to the PHPUnit assertions count.
	use MockeryPHPUnitIntegration;

	public function setUp(): void
	{
		parent::setUp();
		Monkey\setUp();
	}

	public function tearDown(): void
	{
		Monkey\tearDown();
		parent::tearDown();
	}
}
