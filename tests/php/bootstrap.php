<?php

/**
 * PHPUnit bootstrap file.
 *
 * @package   Vatu\Wordpress\Tests
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0
 * @copyright 2022-2024 Vatu Ltd.
 */

declare(strict_types=1);

$root_dir = dirname( dirname( __DIR__ ) );

require_once $root_dir . '/tools/vendor/autoload.php';
require_once $root_dir . '/vendor/autoload.php';
require_once $root_dir . '/tests/php/Unit/TestCase.php';
