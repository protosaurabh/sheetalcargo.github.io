<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Transportation 1.0
	 *
	 * @return void
	 */
	function transportation_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'transportation-columns-overlap',
				'label' => esc_html__( 'Overlap', 'transportation' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'transportation-border',
				'label' => esc_html__( 'Borders', 'transportation' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'transportation-border',
				'label' => esc_html__( 'Borders', 'transportation' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'transportation-border',
				'label' => esc_html__( 'Borders', 'transportation' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'transportation-image-frame',
				'label' => esc_html__( 'Frame', 'transportation' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'transportation-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'transportation' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'transportation-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'transportation' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'transportation-border',
				'label' => esc_html__( 'Borders', 'transportation' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'transportation-separator-thick',
				'label' => esc_html__( 'Thick', 'transportation' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'transportation-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'transportation' ),
			)
		);
	}
	add_action( 'init', 'transportation_register_block_styles' );
}
