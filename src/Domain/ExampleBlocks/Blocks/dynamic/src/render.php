<?php

/**
 * Block: Dynamic
 *
 * @package   Vatu\Wordpress\Plugin\Client\BasePlugin
 * @author    Vatu <hello@vatu.dev>
 * @link      https://vatu.dev/
 * @license   GNU General Public License v3.0 or later
 * @copyright 2023-2024 Vatu Limited.
 */

declare(strict_types=1);

if ( ! isset( $block ) ) {
	return;
}

?>
<p <?php echo get_block_wrapper_attributes(); ?>>
	<?php esc_html_e( 'Dynamic – hello from a dynamic block!', 'base-plugin' ); ?>
</p>
