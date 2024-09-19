<?php

/**
 * PHP Stan: Constants
 *
 * @package Vatu\WordPress\Tests
 *
 * phpcs:disable Squiz.PHP.DiscouragedFunctions,NeutronStandard.Constants.DisallowDefine
 * phpcs:disable SlevomatCodingStandard.Namespaces.NamespaceDeclaration.DisallowedBracketedSyntax
 * phpcs:disable SlevomatCodingStandard.Namespaces.RequireOneNamespaceInFile.MoreNamespacesInFile
 */

declare(strict_types=1);

namespace {
	define( 'WP_ENV', 'development' );
	define( 'WP_ENVIRONMENT_TYPE', 'development' );

	define( 'WPINC', 'wp-includes' );
}

namespace Client\BasePlugin {
	const BLOCK_DIR = '/example';
}
