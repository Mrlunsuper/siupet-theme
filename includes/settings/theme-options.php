<?php
/**
 * SiuPet_Theme_Options class
 */
add_filter( 'wpsf_register_settings_siupet_theme_options', 'siupet_theme_options' );

if ( ! function_exists( 'siupet_theme_options' ) ) {

	/**
	 * Register theme options
	 *
	 * @param array $settings Settings array.
	 * @return array Settings array.
	 */
	function siupet_theme_options( $settings ) {
		$settings[] = array(
			'section_id'          => 'general',
			'section_title'       => 'General Settings',
			'section_description' => '',
			'section_order'       => 10,
			'fields'              => array(
				array(
					'id'          => 'facebook_url',
					'title'       => 'Facebook',
					'desc'        => '',
					'placeholder' => '',
					'type'        => 'text',
					'default'     => '',
				),
				array(
					'id'          => 'address',
					'title'       => 'Address',
					'desc'        => '',
					'placeholder' => '',
					'type'        => 'text',
					'default'     => '',
				),
				array(
					'id'          => 'phone',
					'title'       => 'Phone',
					'desc'        => '',
					'placeholder' => '',
					'type'        => 'text',
					'default'     => '',
				),
				array(
					'id'          => 'footer_logo',
					'title'       => 'Logo footer',
					'desc'        => '',
					'placeholder' => '',
					'type'        => 'file',
					'default'     => '',
				),
				array(
					'id'          => 'logo_mobile',
					'title'       => 'Logo mobile',
					'desc'        => '',
					'placeholder' => '',
					'type'        => 'file',
					'default'     => '',
				),
				array(
					'id'          => 'footer_map',
					'title'       => 'Map footer',
					'desc'        => '',
					'placeholder' => '',
					'type'        => 'file',
					'default'     => '',
				),
				array(
					'id'          => 'open_hours',
					'title'       => 'Open hours',
					'desc'        => '',
					'placeholder' => '',
					'type'        => 'textarea',
					'default'     => '',
				),
			),
		);
		return $settings;
	}
}
